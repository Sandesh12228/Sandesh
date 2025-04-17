<?php
// Start the session
session_start();

// Include database connection
require_once '../includes/database_connection.php';

// Check if form was submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Get form data
    $email = trim($_POST['email'] ?? '');
    $password = $_POST['password'] ?? '';
    $remember = isset($_POST['remember']);
    
    // Validation
    $errors = [];
    
    // Check email
    if (empty($email)) {
        $errors[] = 'Email is required';
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errors[] = 'Email is not valid';
    }
    
    // Check password
    if (empty($password)) {
        $errors[] = 'Password is required';
    }
    
    // If there are validation errors, redirect back with error message
    if (!empty($errors)) {
        $_SESSION['login_error'] = implode('. ', $errors);
        header('Location: ../login.php');
        exit;
    }
    
    // Check if user exists with the given email
    $stmt = $conn->prepare("SELECT id, username, email, password FROM users WHERE email = ?");
    if ($stmt === false) {
        $_SESSION['login_error'] = 'Database error: ' . $conn->error;
        header('Location: ../login.php');
        exit;
    }
    
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();
    
    if ($result->num_rows === 0) {
        // User not found
        $_SESSION['login_error'] = 'Invalid email or password';
        header('Location: ../login.php');
        exit;
    }
    
    // Get user data
    $user = $result->fetch_assoc();
    $stmt->close();
    
    // Verify password
    if (!password_verify($password, $user['password'])) {
        // Invalid password
        $_SESSION['login_error'] = 'Invalid email or password';
        header('Location: ../login.php');
        exit;
    }
    
    // Set session variables
    $_SESSION['user_id'] = $user['id'];
    $_SESSION['username'] = $user['username'];
    $_SESSION['email'] = $user['email'];
    
    // Set remember me cookie if checked
    if ($remember) {
        // Generate unique token
        $token = bin2hex(random_bytes(32));
        $hashed_token = password_hash($token, PASSWORD_DEFAULT);
        
        // Store token in database
        $expire_date = date('Y-m-d H:i:s', time() + (30 * 24 * 60 * 60)); // 30 days
        
        // Check if remember_tokens table exists, create it if not
        $check_table = $conn->query("SHOW TABLES LIKE 'remember_tokens'");
        if ($check_table->num_rows == 0) {
            $create_table = "CREATE TABLE remember_tokens (
                id INT AUTO_INCREMENT PRIMARY KEY,
                user_id INT NOT NULL,
                token VARCHAR(255) NOT NULL,
                expires_at DATETIME NOT NULL,
                created_at DATETIME DEFAULT CURRENT_TIMESTAMP,
                FOREIGN KEY (user_id) REFERENCES users(id) ON DELETE CASCADE
            )";
            $conn->query($create_table);
        }
        
        $stmt = $conn->prepare("INSERT INTO remember_tokens (user_id, token, expires_at) VALUES (?, ?, ?)");
        if ($stmt) {
            $stmt->bind_param("iss", $user['id'], $hashed_token, $expire_date);
            $stmt->execute();
            $stmt->close();
            
            // Set cookie
            setcookie('remember_token', $token, time() + (30 * 24 * 60 * 60), '/', '', false, true);
            setcookie('remember_user', $user['id'], time() + (30 * 24 * 60 * 60), '/', '', false, true);
        }
    }
    
    // Update last login time
    $stmt = $conn->prepare("UPDATE users SET last_login = NOW() WHERE id = ?");
    if ($stmt) {
        $stmt->bind_param("i", $user['id']);
        $stmt->execute();
        $stmt->close();
    }
    
    // Redirect to dashboard
    header('Location: ../index.php');
    exit;
} else {
    // If not submitted via POST, redirect to login page
    header('Location: ../login.php');
    exit;
}
?>