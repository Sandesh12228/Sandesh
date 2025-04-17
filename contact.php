<?php
// Start the session
session_start();

// Database connection would typically be included here
// include 'includes/db_connect.php';

// Form submission handling
$message = '';
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Simple validation
    if (!empty($_POST['name']) && !empty($_POST['email']) && !empty($_POST['message'])) {
        // In a real application, you would:
        // 1. Sanitize inputs
        // 2. Validate email format
        // 3. Save to database or send email
        
        // Simulate success (in a real app, you'd verify the message was actually sent)
        $message = '<div class="alert alert-success">Thank you for your message! We will get back to you soon.</div>';
        
        // Clear form data after successful submission
        $_POST = array();
    } else {
        $message = '<div class="alert alert-danger">Please fill in all required fields.</div>';
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact Us - Sandesh Art Gallery</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="css/index.css">
    <!-- Font Awesome for icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        .contact-info-card {
            transition: transform 0.3s;
            height: 100%;
        }
        
        .contact-info-card:hover {
            transform: translateY(-5px);
        }
        
        .map-container {
            height: 400px;
            width: 100%;
        }
        
        .form-control:focus {
            border-color: #6c757d;
            box-shadow: 0 0 0 0.25rem rgba(108, 117, 125, 0.25);
        }
        
        .contact-icon {
            width: 60px;
            height: 60px;
            display: flex;
            align-items: center;
            justify-content: center;
            border-radius: 50%;
            background-color: #f8f9fa;
            margin: 0 auto 1rem;
            color: #0d6efd;
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
                        <a class="nav-link active" href="contact.php">Contact Us</a>
                    </li>
                    
                    <?php
                    // Check if user is logged in
                    if(isset($_SESSION['user_id']) && !empty($_SESSION['user_id'])) {
                        // User is logged in - show username and logout
                        $username = isset($_SESSION['username']) ? $_SESSION['username'] : 'User';
                    ?>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            <?php if(isset($_SESSION['user_avatar']) && !empty($_SESSION['user_avatar'])): ?>
                                <img src="<?php echo $_SESSION['user_avatar']; ?>" alt="User Avatar" class="user-avatar">
                            <?php else: ?>
                                <i class="fas fa-user-circle me-1"></i>
                            <?php endif; ?>
                            <?php echo htmlspecialchars($username); ?>
                        </a>
                        <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="userDropdown">
                            <li><a class="dropdown-item" href="profile.php"><i class="fas fa-user me-2"></i>My Profile</a></li>
                            <li><a class="dropdown-item" href="my-favorites.php"><i class="fas fa-heart me-2"></i>My Favorites</a></li>
                            <?php if(isset($_SESSION['is_admin']) && $_SESSION['is_admin']): ?>
                                <li><a class="dropdown-item" href="admin/dashboard.php"><i class="fas fa-tachometer-alt me-2"></i>Admin Dashboard</a></li>
                            <?php endif; ?>
                            <li><hr class="dropdown-divider"></li>
                            <li><a class="dropdown-item" href="logout.php"><i class="fas fa-sign-out-alt me-2"></i>Logout</a></li>
                        </ul>
                    </li>
                    <?php } else { ?>
                        <!-- User is not logged in - show login and register links -->
                        <li class="nav-item">
                            <a class="nav-link" href="login.php"><i class="fas fa-sign-in-alt me-1"></i> Login</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="register.php"><i class="fas fa-user-plus me-1"></i> Register</a>
                        </li>
                    <?php } ?>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Page Header -->
    <header class="bg-light py-5">
        <div class="container px-4 px-lg-5">
            <div class="text-center">
                <h1 class="display-4 fw-bolder">Contact Us</h1>
                <p class="lead fw-normal text-muted mb-0">We'd love to hear from you</p>
            </div>
        </div>
    </header>

    <!-- Contact Information -->
    <section class="py-5">
        <div class="container">
            <div class="row gx-4 gx-lg-5 mb-5">
                <div class="col-md-4 mb-4 mb-md-0">
                    <div class="card contact-info-card h-100">
                        <div class="card-body text-center">
                            <div class="contact-icon">
                                <i class="fas fa-map-marker-alt fa-2x"></i>
                            </div>
                            <h5 class="card-title">Our Location</h5>
                            <p class="card-text">
                                No 317/1/A,uruwala,Nedungamuwa.
                            </p>
                            <a href="https://goo.gl/maps/123" target="_blank" class="btn btn-outline-primary mt-2">Get Directions</a>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 mb-4 mb-md-0">
                    <div class="card contact-info-card h-100">
                        <div class="card-body text-center">
                            <div class="contact-icon">
                                <i class="fas fa-phone-alt fa-2x"></i>
                            </div>
                            <h5 class="card-title">Phone Number</h5>
                            <p class="card-text">
                                Main:  +9478 248 8138
                                <br>
                                Support: 
                               +9475 751 2485
                            </p>
                            <a href="tel: +9478 248 8138"
                             class="btn btn-outline-primary mt-2">Call Us</a>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card contact-info-card h-100">
                        <div class="card-body text-center">
                            <div class="contact-icon">
                                <i class="fas fa-envelope fa-2x"></i>
                            </div>
                            <h5 class="card-title">Email Address</h5>
                            <p class="card-text">
                                General Inquiries:<br>
                                artbysandesh@gmail.com
                            
                            </p>
                            <a href="mailto:info@sandeshgallery.com" class="btn btn-outline-primary mt-2">Email Us</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Contact Form and Map -->
    <section class="py-5 bg-light">
        <div class="container">
            <div class="row gx-4 gx-lg-5">
                <div class="col-lg-6 mb-4 mb-lg-0">
                    <h2 class="mb-4">Send Us a Message</h2>
                    <?php echo $message; ?>
                    <form id="contactForm" method="post" action="contact.php">
                        <div class="mb-3">
                            <label for="name" class="form-label">Your Name</label>
                            <input type="text" class="form-control" id="name" name="name" required 
                                value="<?php echo isset($_POST['name']) ? htmlspecialchars($_POST['name']) : ''; ?>">
                        </div>
                        <div class="mb-3">
                            <label for="email" class="form-label">Your Email</label>
                            <input type="email" class="form-control" id="email" name="email" required
                                value="<?php echo isset($_POST['email']) ? htmlspecialchars($_POST['email']) : ''; ?>">
                        </div>
                        <div class="mb-3">
                            <label for="subject" class="form-label">Subject</label>
                            <input type="text" class="form-control" id="subject" name="subject"
                                value="<?php echo isset($_POST['subject']) ? htmlspecialchars($_POST['subject']) : ''; ?>">
                        </div>
                        <div class="mb-3">
                            <label for="message" class="form-label">Your Message</label>
                            <textarea class="form-control" id="message" name="message" rows="5" required><?php echo isset($_POST['message']) ? htmlspecialchars($_POST['message']) : ''; ?></textarea>
                        </div>
                        <div class="d-grid">
                            <button type="submit" class="btn btn-primary btn-lg">Send Message</button>
                        </div>
                    </form>
                </div>
                <div class="col-lg-6">
                    <h2 class="mb-4">Visit Our Gallery</h2>
                    <div class="map-container rounded">
                        <!-- A placeholder for the map, in a real application you would use Google Maps or similar -->
                        <!-- This is a placeholder image simulating a map -->
                        <div class="bg-secondary h-100 d-flex align-items-center justify-content-center text-white">
                            <div class="text-center">
                                <i class="fas fa-map-marked-alt fa-4x mb-3"></i>
                                <h5>Gallery Location</h5>
                                <p class="mb-0">Map would be displayed here in a real application</p>
                            </div>
                        </div>
                    </div>
                    <div class="mt-4">
                        <h5>Gallery Hours</h5>
                        <ul class="list-group">
                            <li class="list-group-item d-flex justify-content-between align-items-center">
                                Monday - Friday
                                <span>10:00 AM - 6:00 PM</span>
                            </li>
                            <li class="list-group-item d-flex justify-content-between align-items-center">
                                Saturday
                                <span>11:00 AM - 7:00 PM</span>
                            </li>
                            <li class="list-group-item d-flex justify-content-between align-items-center">
                                Sunday
                                <span>12:00 PM - 5:00 PM</span>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- FAQs Section -->
    <section class="py-5">
        <div class="container">
            <h2 class="text-center mb-5">Frequently Asked Questions</h2>
            <div class="row justify-content-center">
                <div class="col-lg-8">
                    <div class="accordion" id="accordionFAQ">
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="headingOne">
                                <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                    How can I submit my artwork for consideration?
                                </button>
                            </h2>
                            <div id="collapseOne" class="accordion-collapse collapse show" aria-labelledby="headingOne" data-bs-parent="#accordionFAQ">
                                <div class="accordion-body">
                                    Artists interested in exhibiting at Sandesh Art Gallery can submit their portfolio for consideration by emailing high-quality images of their work to <strong>artists@sandeshgallery.com</strong> along with a brief artist statement and CV. Our curatorial team reviews submissions quarterly.
                                </div>
                            </div>
                        </div>
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="headingTwo">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                    Do you offer art appraisal services?
                                </button>
                            </h2>
                            <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo" data-bs-parent="#accordionFAQ">
                                <div class="accordion-body">
                                    Yes, we offer professional art appraisal services for insurance, estate planning, and donation purposes. Our team of certified appraisers specializes in contemporary art. Please contact us at <strong>appraisals@sandeshgallery.com</strong> for more information and pricing.
                                </div>
                            </div>
                        </div>
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="headingThree">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                                    Can I rent your gallery space for private events?
                                </button>
                            </h2>
                            <div id="collapseThree" class="accordion-collapse collapse" aria-labelledby="headingThree" data-bs-parent="#accordionFAQ">
                                <div class="accordion-body">
                                    Yes, our gallery space is available for private events such as corporate functions, receptions, and special celebrations. The unique setting among fine artworks creates a memorable atmosphere for your event. For availability and pricing, please email <strong>events@sandeshgallery.com</strong>.
                                </div>
                            </div>
                        </div>
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="headingFour">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseFour" aria-expanded="false" aria-controls="collapseFour">
                                    Do you ship artwork internationally?
                                </button>
                            </h2>
                            <div id="collapseFour" class="accordion-collapse collapse" aria-labelledby="headingFour" data-bs-parent="#accordionFAQ">
                                <div class="accordion-body">
                                    Yes, we ship artwork worldwide. International shipping costs vary based on size, weight, and destination. All artworks are professionally packed to ensure safe delivery. Please note that any import duties or taxes are the responsibility of the buyer. Contact <strong>shipping@sandeshgallery.com</strong> for a shipping quote.
                                </div>
                            </div>
                        </div>
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="headingFive">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseFive" aria-expanded="false" aria-controls="collapseFive">
                                    Do you offer art consultation services?
                                </button>
                            </h2>
                            <div id="collapseFive" class="accordion-collapse collapse" aria-labelledby="headingFive" data-bs-parent="#accordionFAQ">
                                <div class="accordion-body">
                                    Yes, our art consultants can help you build or expand your collection based on your aesthetic preferences, space requirements, and budget. We work with private collectors, corporations, interior designers, and architects. Schedule a consultation by emailing <strong>consultation@sandeshgallery.com</strong> or calling our gallery.
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Newsletter Section -->
    <section class="newsletter-section py-5 bg-light">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-8 text-center">
                    <h2>Stay Connected</h2>
                    <p class="lead mb-4">Subscribe to our newsletter for updates on new artworks, exhibitions, and special events.</p>
                    <form class="newsletter-form" action="subscribe.php" method="post">
                        <div class="input-group mb-3">
                            <input type="email" class="form-control" placeholder="Your email address" aria-label="Email" name="email" required>
                            <button class="btn btn-primary" type="submit">Subscribe</button>
                        </div>
                        <div class="form-text text-center">We respect your privacy and will never share your information.</div>
                    </form>
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
                        class="text-white">artbysandeshartgallery@gmail.com
                        </a></p>
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

    <!-- Back to Top Button -->
    <a href="#" class="back-to-top" id="backToTop">
        <i class="fas fa-arrow-up"></i>
    </a>

    <!-- Scripts -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        // Back to top button
        const backToTopButton = document.getElementById('backToTop');
        
        window.addEventListener('scroll', () => {
            if (window.pageYOffset > 300) {
                backToTopButton.classList.add('show');
            } else {
                backToTopButton.classList.remove('show');
            }
        });
        
        backToTopButton.addEventListener('click', (e) => {
            e.preventDefault();
            window.scrollTo({top: 0, behavior: 'smooth'});
        });

        // Form validation
        document.getElementById('contactForm').addEventListener('submit', function(event) {
            let isValid = true;
            const name = document.getElementById('name').value.trim();
            const email = document.getElementById('email').value.trim();
            const message = document.getElementById('message').value.trim();
            
            if (name === '') {
                isValid = false;
            }
            
            if (email === '' || !email.includes('@')) {
                isValid = false;
            }
            
            if (message === '') {
                isValid = false;
            }
            
            if (!isValid) {
                event.preventDefault();
                alert('Please fill in all required fields with valid information.');
            }
        });
    </script>
</body>
</html>