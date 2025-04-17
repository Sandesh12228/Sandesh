<?php
// Start the session
session_start();

// Check if user is already logged in
if (isset($_SESSION['user_id'])) {
    header('Location: index.php');
    exit;
}

// Display registration success message if available
$registration_success = $_SESSION['register_success'] ?? '';
unset($_SESSION['register_success']);

// Display login error if available
$login_error = $_SESSION['login_error'] ?? '';
unset($_SESSION['login_error']);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Sandesh Art Gallery</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="css/index.css">
    <link rel="stylesheet" href="css/login.css">
    <!-- Font Awesome for icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
   
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
                        <a class="nav-link active" href="login.php"><i class="fas fa-sign-in-alt me-1"></i> Login</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="register.php"><i class="fas fa-user-plus me-1"></i> Register</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Login Section -->
    <section class="login-section">
        <div class="container">
            <div class="login-card">
                <div class="login-header">
                    <h2><i class="fas fa-sign-in-alt me-2"></i>Login to Your Account</h2>
                </div>
                <div class="login-body">
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
                    
                    <!-- Social Login Buttons -->
                    <div class="social-login mb-4">
                        <a href="#" class="social-login-btn google-btn">
                            <i class="fab fa-google"></i> Continue with Google
                        </a>
                        <a href="#" class="social-login-btn facebook-btn">
                            <i class="fab fa-facebook-f"></i> Continue with Facebook
                        </a>
                    </div>
                    
                    <!-- Divider -->
                    <div class="divider">
                        <div class="divider-line"></div>
                        <div class="divider-text">or login with email</div>
                        <div class="divider-line"></div>
                    </div>
                    
                    <!-- Login Form -->
                    <form action="auth/login.php" method="post" class="mt-4">
                        <div class="mb-3">
                            <label for="email" class="form-label">Email Address</label>
                            <input type="email" class="form-control" id="email" name="email" required>
                        </div>
                        <div class="mb-3">
                            <label for="password" class="form-label">Password</label>
                            <div class="password-field">
                                <input type="password" class="form-control" id="password" name="password" required>
                                <span class="password-toggle" id="passwordToggle">
                                    <i class="far fa-eye"></i>
                                </span>
                            </div>
                        </div>
                        <div class="d-flex justify-content-between align-items-center mb-4">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="rememberMe" name="remember">
                                <label class="form-check-label" for="rememberMe">
                                    Remember me
                                </label>
                            </div>
                            <a href="forgot-password.php" class="text-decoration-none">Forgot password?</a>
                        </div>
                        <div class="d-grid">
                            <button type="submit" class="btn btn-primary btn-lg">
                                <i class="fas fa-sign-in-alt me-2"></i>Login
                            </button>
                        </div>
                    </form>
                    
                    <!-- Registration Link -->
                    <div class="text-center mt-4">
                        <p>Don't have an account? <a href="register.php" class="text-decoration-none">Register now</a></p>
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
                        <a href="https://www.facebook.com/share/1Xffvq4425/" class="text-white me-3"><i class="fab fa-facebook-f"></i></a>
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
                    <p><i class="fas fa-map-marker-alt me-2"></i>No 317/1 ,Uruwala,Nedungamuwa</p>
                        <p><i class="fas fa-phone-alt me-2"></i> +94 782 488 138</p>
                        <p><i class="fas fa-envelope me-2"></i> <a href="mailto:artbysandesh@gmail.com"
                        class="text-white">artbysandeshartgallery@gmail.com</a></p>
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
        // Password visibility toggle
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