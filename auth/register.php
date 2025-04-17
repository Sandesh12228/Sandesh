<?php
// Start the session
session_start();

// Include database connection
require_once '../includes/database_connection.php';

// Check if form was submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Get form data
    $username = trim($_POST['username'] ?? '');
    $email = trim($_POST['email'] ?? '');
    $password = $_POST['password'] ?? '';
    $confirm_password = $_POST['confirm_password'] ?? '';
    $newsletter = isset($_POST['newsletter']) ? 1 : 0;
    
    // Validation
    $errors = [];
    
    // Check username
    if (empty($username)) {
        $errors[] = 'Username is required';
    } elseif (strlen($username) < 3 || strlen($username) > 30) {
        $errors[] = 'Username must be between 3 and 30 characters';
    }
    
    // Check email
    if (empty($email)) {
        $errors[] = 'Email is required';
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errors[] = 'Email is not valid';
    }
    
    // Check if email already exists
    $stmt = $conn->prepare("SELECT id FROM users WHERE email = ?");
    if ($stmt === false) {
        $errors[] = 'Database error: ' . $conn->error;
    } else {
        $stmt->bind_param("s", $email);
        $stmt->execute();
        $result = $stmt->get_result();
        
        if ($result->num_rows > 0) {
            $errors[] = 'Email already exists. Please use a different email or try to login.';
        }
        $stmt->close();
    }
    
    // Check username already exists
    if (empty($errors)) {  // Only proceed if no errors so far
        $stmt = $conn->prepare("SELECT id FROM users WHERE username = ?");
        if ($stmt === false) {
            $errors[] = 'Database error: ' . $conn->error;
        } else {
            $stmt->bind_param("s", $username);
            $stmt->execute();
            $result = $stmt->get_result();
            
            if ($result->num_rows > 0) {
                $errors[] = 'Username already exists. Please choose a different username.';
            }
            $stmt->close();
        }
    }
    
    // Check password
    if (empty($password)) {
        $errors[] = 'Password is required';
    } elseif (strlen($password) < 8) {
        $errors[] = 'Password must be at least 8 characters long';
    } elseif (!preg_match('/[A-Z]/', $password)) {
        $errors[] = 'Password must contain at least one uppercase letter';
    } elseif (!preg_match('/[a-z]/', $password)) {
        $errors[] = 'Password must contain at least one lowercase letter';
    } elseif (!preg_match('/[0-9]/', $password)) {
        $errors[] = 'Password must contain at least one number';
    } elseif (!preg_match('/[^A-Za-z0-9]/', $password)) {
        $errors[] = 'Password must contain at least one special character';
    }
    
    // Check if passwords match
    if ($password !== $confirm_password) {
        $errors[] = 'Passwords do not match';
    }
    
    // If there are errors, redirect back with error message
    if (!empty($errors)) {
        $_SESSION['register_error'] = implode('. ', $errors);
        header('Location: ../register.php');
        exit;
    }
    
    // Hash the password
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);
    
    // Get current timestamp
    $created_at = date('Y-m-d H:i:s');
    
    // Prepare the SQL statement
    $stmt = $conn->prepare("INSERT INTO users (username, email, password, newsletter, created_at) VALUES (?, ?, ?, ?, ?)");
    if ($stmt === false) {
        $_SESSION['register_error'] = 'Database error: ' . $conn->error;
        header('Location: ../register.php');
        exit;
    }
    
    $stmt->bind_param("sssis", $username, $email, $hashed_password, $newsletter, $created_at);
    
    // Execute the statement
    if ($stmt->execute()) {
        // Registration successful
        $_SESSION['register_success'] = 'Registration successful! You can now login.';
        header('Location: ../login.php');
        exit;
    } else {
        // Registration failed
        $_SESSION['register_error'] = 'Registration failed. Please try again. Error: ' . $conn->error;
        header('Location: ../register.php');
        exit;
    }
    
    $stmt->close();
} else {
    // If not submitted via POST, redirect to register page
    header('Location: ../register.php');
    exit;
}
?>