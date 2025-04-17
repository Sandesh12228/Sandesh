<?php
// Start the session
session_start();

// Include database connection
require_once 'includes/database_connection.php';

// Initialize error and success message variables
$error = '';
$success = '';

// Process form submission if it exists in the session
if(isset($_SESSION['register_error'])) {
    $error = $_SESSION['register_error'];
    unset($_SESSION['register_error']);
}

if(isset($_SESSION['register_success'])) {
    $success = $_SESSION['register_success'];
    unset($_SESSION['register_success']);
}

// Redirect if user is already logged in
if(isset($_SESSION['user_id']) && !empty($_SESSION['user_id'])) {
    header('Location: index.php');
    exit;
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register - Sandesh Art Gallery</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="css/index.css">
    <!-- Font Awesome for icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        .register-section {
            padding: 80px 0;
            background-color: #f8f9fa;
        }
        .register-card {
            max-width: 600px;
            margin: 0 auto;
            border-radius: 10px;
            box-shadow: 0 8px 20px rgba(0, 0, 0, 0.1);
            overflow: hidden;
        }
        .register-header {
            background-color: #343a40;
            padding: 20px;
            color: white;
            text-align: center;
        }
        .register-body {
            padding: 30px;
        }
        .social-register-btn {
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 10px;
            border-radius: 5px;
            font-weight: 500;
            text-decoration: none;
            margin-bottom: 12px;
            transition: all 0.3s;
        }
        .social-register-btn i {
            margin-right: 10px;
            font-size: 1.2rem;
        }
        .google-btn {
            background: white;
            color: #333;
            border: 1px solid #ddd;
        }
        .google-btn:hover {
            background: #f1f1f1;
        }
        .facebook-btn {
            background: #3b5998;
            color: white;
        }
        .facebook-btn:hover {
            background: #344e86;
        }
        .divider {
            display: flex;
            align-items: center;
            margin: 20px 0;
        }
        .divider-line {
            flex-grow: 1;
            height: 1px;
            background-color: #ddd;
        }
        .divider-text {
            padding: 0 15px;
            color: #6c757d;
        }
        .form-control:focus {
            box-shadow: 0 0 0 0.25rem rgba(13, 110, 253, 0.25);
            border-color: #86b7fe;
        }
        .password-field {
            position: relative;
        }
        .password-toggle {
            position: absolute;
            right: 10px;
            top: 10px;
            cursor: pointer;
            color: #6c757d;
        }
        .password-strength {
            height: 5px;
            margin-top: 5px;
            border-radius: 5px;
            transition: all 0.3s;
        }
        .password-strength-text {
            font-size: 0.8rem;
            margin-top: 5px;
        }
        .password-requirements {
            font-size: 0.85rem;
            margin-top: 10px;
        }
        .requirement {
            margin-bottom: 5px;
        }
        .requirement i {
            margin-right: 5px;
        }
        .requirement.met {
            color: #198754;
        }
        .requirement.unmet {
            color: #6c757d;
        }
    </style>
</head>
<body>
    <!-- Navigation Bar -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container">
        <a class="navbar-brandx d-flex align-items-center" href="#">
                <img src="Navbar/logowallp.png"  class="logo me-2">
            
            </a>
            <a class="navbar-brand" href="index.php">Sandesh Art Gallery</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="index.php">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="gallery.php">Gallery</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="contact.php">Contact Us</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="login.php"><i class="fas fa-sign-in-alt me-1"></i> Login</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" href="register.php"><i class="fas fa-user-plus me-1"></i> Register</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Register Section -->
    <section class="register-section">
        <div class="container">
            <div class="register-card">
                <div class="register-header">
                    <h2><i class="fas fa-user-plus me-2"></i>Create an Account</h2>
                </div>
                <div class="register-body">
                    <!-- Alert Messages -->
                    <?php if (!empty($error)): ?>
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            <i class="fas fa-exclamation-circle me-2"></i><?php echo htmlspecialchars($error); ?>
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    <?php endif; ?>
                    
                    <?php if (!empty($success)): ?>
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            <i class="fas fa-check-circle me-2"></i><?php echo htmlspecialchars($success); ?>
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    <?php endif; ?>
                    
                    <!-- Social Register Buttons -->
                    <div class="social-register mb-4">
                        <a href="#" class="social-register-btn google-btn">
                            <i class="fab fa-google"></i> Sign up with Google
                        </a>
                        <a href="#" class="social-register-btn facebook-btn">
                            <i class="fab fa-facebook-f"></i> Sign up with Facebook
                        </a>
                    </div>
                    
                    <!-- Divider -->
                    <div class="divider">
                        <div class="divider-line"></div>
                        <div class="divider-text">or register with email</div>
                        <div class="divider-line"></div>
                    </div>
                    
                    <!-- Registration Form - Changed action to auth/register.php -->
                    <form action="auth/register.php" method="post" class="mt-4" id="registrationForm">
                        <div class="mb-3">
                            <label for="username" class="form-label">Username</label>
                            <input type="text" class="form-control" id="username" name="username" required>
                            <div class="form-text">Choose a unique username for your profile.</div>
                        </div>
                        <div class="mb-3">
                            <label for="email" class="form-label">Email Address</label>
                            <input type="email" class="form-control" id="email" name="email" required>
                            <div class="form-text">We'll never share your email with anyone else.</div>
                        </div>
                        <div class="mb-3">
                            <label for="password" class="form-label">Password</label>
                            <div class="password-field">
                                <input type="password" class="form-control" id="password" name="password" required>
                                <span class="password-toggle" id="passwordToggle">
                                    <i class="far fa-eye"></i>
                                </span>
                            </div>
                            <div class="password-strength" id="passwordStrength"></div>
                            <div class="password-strength-text" id="passwordStrengthText"></div>
                            <div class="password-requirements mt-2">
                                <div class="requirement unmet" id="lengthReq">
                                    <i class="fas fa-circle"></i> At least 8 characters
                                </div>
                                <div class="requirement unmet" id="uppercaseReq">
                                    <i class="fas fa-circle"></i> At least one uppercase letter
                                </div>
                                <div class="requirement unmet" id="lowercaseReq">
                                    <i class="fas fa-circle"></i> At least one lowercase letter
                                </div>
                                <div class="requirement unmet" id="numberReq">
                                    <i class="fas fa-circle"></i> At least one number
                                </div>
                                <div class="requirement unmet" id="specialReq">
                                    <i class="fas fa-circle"></i> At least one special character
                                </div>
                            </div>
                        </div>
                        <div class="mb-4">
                            <label for="confirm_password" class="form-label">Confirm Password</label>
                            <div class="password-field">
                                <input type="password" class="form-control" id="confirm_password" name="confirm_password" required>
                                <span class="password-toggle" id="confirmPasswordToggle">
                                    <i class="far fa-eye"></i>
                                </span>
                            </div>
                            <div class="form-text" id="passwordMatch"></div>
                        </div>
                        <div class="mb-4">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="terms" name="terms" required>
                                <label class="form-check-label" for="terms">
                                    I agree to the <a href="terms.php" target="_blank">Terms of Service</a> and <a href="privacy.php" target="_blank">Privacy Policy</a>
                                </label>
                            </div>
                        </div>
                        <div class="mb-4">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="newsletter" name="newsletter">
                                <label class="form-check-label" for="newsletter">
                                    Subscribe to our newsletter for updates on new artworks and exhibitions
                                </label>
                            </div>
                        </div>
                        <div class="d-grid">
                            <button type="submit" class="btn btn-primary btn-lg" id="registerButton">
                                <i class="fas fa-user-plus me-2"></i>Create Account
                            </button>
                        </div>
                    </form>
                    
                    <!-- Login Link -->
                    <div class="text-center mt-4">
                        <p>Already have an account? <a href="login.php" class="text-decoration-none">Login here</a></p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    
    <!-- Footer -->
    <footer class="bg-dark text-white py-4">
        <div class="container">
            <div class="row">
                <div class="col-md-4 mb-4 mb-md-0">
                    <h5>Sandesh Art Gallery</h5>
                    <p>Showcasing exceptional art from around the world since 2023.</p>
                    <div class="social-icons mt-3">
                        <a href="#" class="text-white me-3"><i class="fab fa-facebook-f"></i></a>
                        <a href="#" class="text-white me-3"><i class="fab fa-instagram"></i></a>
                        <a href="#" class="text-white me-3"><i class="fab fa-twitter"></i></a>
                        <a href="#" class="text-white"><i class="fab fa-pinterest-p"></i></a>
                    </div>
                </div>
                <div class="col-md-4 mb-4 mb-md-0">
                    <h5>Quick Links</h5>
                    <ul class="list-unstyled">
                        <li><a href="index.php" class="text-white"><i class="fas fa-chevron-right me-2"></i>Home</a></li>
                        <li><a href="gallery.php" class="text-white"><i class="fas fa-chevron-right me-2"></i>Gallery</a></li>
                        <li><a href="about.php" class="text-white"><i class="fas fa-chevron-right me-2"></i>About Us</a></li>
                        <li><a href="contact.php" class="text-white"><i class="fas fa-chevron-right me-2"></i>Contact Us</a></li>
                        <li><a href="artists.php" class="text-white"><i class="fas fa-chevron-right me-2"></i>Artists</a></li>
                    </ul>
                </div>
                <div class="col-md-4">
                    <h5>Contact Information</h5>
                    <address>
                        <p><i class="fas fa-map-marker-alt me-2"></i> 123 Art Street, Creative District<br>Artville, 54321</p>
                        <p><i class="fas fa-phone-alt me-2"></i> (123) 456-7890</p>
                        <p><i class="fas fa-envelope me-2"></i> <a href="mailto:info@sandeshgallery.com" class="text-white">info@sandeshgallery.com</a></p>
                    </address>
                </div>
            </div>
            <hr class="my-4 bg-light">
            <div class="row">
                <div class="col-md-6 text-center text-md-start">
                    <p class="mb-0">&copy; 2025 Sandesh Art Gallery. All rights reserved.</p>
                </div>
                <div class="col-md-6 text-center text-md-end">
                    <p class="mb-0">
                        <a href="privacy.php" class="text-white">Privacy Policy</a> | 
                        <a href="terms.php" class="text-white">Terms of Service</a>
                    </p>
                </div>
            </div>
        </div>
    </footer>

    <!-- Scripts -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        // Password visibility toggle for password field
        document.getElementById('passwordToggle').addEventListener('click', function() {
            const passwordInput = document.getElementById('password');
            const icon = this.querySelector('i');
            
            if (passwordInput.type === 'password') {
                passwordInput.type = 'text';
                icon.classList.replace('fa-eye', 'fa-eye-slash');
            } else {
                passwordInput.type = 'password';
                icon.classList.replace('fa-eye-slash', 'fa-eye');
            }
        });
        
        // Password visibility toggle for confirm password field
        document.getElementById('confirmPasswordToggle').addEventListener('click', function() {
            const confirmPasswordInput = document.getElementById('confirm_password');
            const icon = this.querySelector('i');
            
            if (confirmPasswordInput.type === 'password') {
                confirmPasswordInput.type = 'text';
                icon.classList.replace('fa-eye', 'fa-eye-slash');
            } else {
                confirmPasswordInput.type = 'password';
                icon.classList.replace('fa-eye-slash', 'fa-eye');
            }
        });
        
        // Password strength checker
        const passwordInput = document.getElementById('password');
        const strengthBar = document.getElementById('passwordStrength');
        const strengthText = document.getElementById('passwordStrengthText');
        
        // Password requirement indicators
        const lengthReq = document.getElementById('lengthReq');
        const uppercaseReq = document.getElementById('uppercaseReq');
        const lowercaseReq = document.getElementById('lowercaseReq');
        const numberReq = document.getElementById('numberReq');
        const specialReq = document.getElementById('specialReq');
        
        passwordInput.addEventListener('input', function() {
            const password = this.value;
            let strength = 0;
            
            // Check for length
            if (password.length >= 8) {
                strength += 20;
                lengthReq.classList.replace('unmet', 'met');
                lengthReq.querySelector('i').classList.replace('fa-circle', 'fa-check-circle');
            } else {
                lengthReq.classList.replace('met', 'unmet');
                lengthReq.querySelector('i').classList.replace('fa-check-circle', 'fa-circle');
            }
            
            // Check for uppercase letters
            if (/[A-Z]/.test(password)) {
                strength += 20;
                uppercaseReq.classList.replace('unmet', 'met');
                uppercaseReq.querySelector('i').classList.replace('fa-circle', 'fa-check-circle');
            } else {
                uppercaseReq.classList.replace('met', 'unmet');
                uppercaseReq.querySelector('i').classList.replace('fa-check-circle', 'fa-circle');
            }
            
            // Check for lowercase letters
            if (/[a-z]/.test(password)) {
                strength += 20;
                lowercaseReq.classList.replace('unmet', 'met');
                lowercaseReq.querySelector('i').classList.replace('fa-circle', 'fa-check-circle');
            } else {
                lowercaseReq.classList.replace('met', 'unmet');
                lowercaseReq.querySelector('i').classList.replace('fa-check-circle', 'fa-circle');
            }
            
            // Check for numbers
            if (/[0-9]/.test(password)) {
                strength += 20;
                numberReq.classList.replace('unmet', 'met');
                numberReq.querySelector('i').classList.replace('fa-circle', 'fa-check-circle');
            } else {
                numberReq.classList.replace('met', 'unmet');
                numberReq.querySelector('i').classList.replace('fa-check-circle', 'fa-circle');
            }
            
            // Check for special characters
            if (/[^A-Za-z0-9]/.test(password)) {
                strength += 20;
                specialReq.classList.replace('unmet', 'met');
                specialReq.querySelector('i').classList.replace('fa-circle', 'fa-check-circle');
            } else {
                specialReq.classList.replace('met', 'unmet');
                specialReq.querySelector('i').classList.replace('fa-check-circle', 'fa-circle');
            }
            
            // Update strength bar
            strengthBar.style.width = strength + '%';
            
            // Set the color based on strength
            if (strength < 40) {
                strengthBar.style.backgroundColor = '#dc3545'; // weak - red
                strengthText.textContent = 'Weak';
                strengthText.style.color = '#dc3545';
            } else if (strength < 80) {
                strengthBar.style.backgroundColor = '#ffc107'; // medium - yellow
                strengthText.textContent = 'Medium';
                strengthText.style.color = '#ffc107';
            } else {
                strengthBar.style.backgroundColor = '#198754'; // strong - green
                strengthText.textContent = 'Strong';
                strengthText.style.color = '#198754';
            }
        });
        
        // Check if passwords match
        const confirmPasswordInput = document.getElementById('confirm_password');
        const passwordMatchText = document.getElementById('passwordMatch');
        
        confirmPasswordInput.addEventListener('input', function() {
            const password = passwordInput.value;
            const confirmPassword = this.value;
            
            if (confirmPassword === '') {
                passwordMatchText.textContent = '';
            } else if (password === confirmPassword) {
                passwordMatchText.textContent = 'Passwords match';
                passwordMatchText.style.color = '#198754'; // Green
            } else {
                passwordMatchText.textContent = 'Passwords do not match';
                passwordMatchText.style.color = '#dc3545'; // Red
            }
        });
        
        // Form validation
        const registrationForm = document.getElementById('registrationForm');
        
        registrationForm.addEventListener('submit', function(event) {
            const password = passwordInput.value;
            const confirmPassword = confirmPasswordInput.value;
            const termsCheckbox = document.getElementById('terms');
            
            let isValid = true;
            let errorMessage = '';
            
            // Check password length
            if (password.length < 8) {
                isValid = false;
                errorMessage = 'Password must be at least 8 characters long';
            }
            // Check if passwords match
            else if (password !== confirmPassword) {
                isValid = false;
                errorMessage = 'Passwords do not match';
            }
            // Check if terms are accepted
            else if (!termsCheckbox.checked) {
                isValid = false;
                errorMessage = 'You must agree to the terms and conditions';
            }
            
            if (!isValid) {
                event.preventDefault();
                alert(errorMessage);
            }
        });
        
        // Auto-dismiss alerts after 5 seconds
        window.addEventListener('DOMContentLoaded', () => {
            setTimeout(() => {
                const alerts = document.querySelectorAll('.alert');
                alerts.forEach(alert => {
                    const bsAlert = new bootstrap.Alert(alert);
                    bsAlert.close();
                });
            }, 5000);
        });
    </script>
</body>
</html>