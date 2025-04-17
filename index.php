<?php
// Start the session
session_start();

// Database connection would typically be included here
// include 'includes/db_connect.php';

// You might fetch featured artworks from the database
// $featuredArtworks = []; // This would be populated from database
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sandesh Art Gallery</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="css/index.css">
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
                        <a class="nav-link active" href="index.php">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="gallery.php">Gallery</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="contact.php">Contact Us</a>
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

    <!-- Hero Section -->
    <section class="hero-section">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-md-6">
                    <h1>Welcome to Sandesh Art Gallery</h1>
                    <p class="lead">Explore our curated collection of stunning artworks from talented artists around the world.</p>
                    <div class="d-flex gap-3">
                        <a href="gallery.php" class="btn btn-primary btn-lg"><i class="fas fa-paint-brush me-2"></i>Explore Gallery</a>
                        <?php if(!isset($_SESSION['user_id'])): ?>
                            <a href="register.php" class="btn btn-outline-primary btn-lg"><i class="fas fa-user-plus me-2"></i>Join Us</a>
                        <?php endif; ?>
                    </div>
                </div>
                <div class="col-md-6">
                    <img src="images/walpaper.png" alt="Art Gallery" class="img-fluid rounded">
                </div>
            </div>
        </div>
    </section>

    <!-- Featured Artworks -->
    <section class="featured-section py-5">
        <div class="container">
            <h2 class="text-center mb-4">Featured Artworks</h2>
            <div class="row">
                <div class="col-md-4 mb-4">
                    <div class="card">
                        <img src="images/1.png"
                         class="card-img-top" alt="p1">
                        <div class="card-body">
                            <h5 class="card-title">Single Pencil Portrait

                            </h5>
                            <p> Realistic Single Portrait, Handcrafted with Precision 🎨🖤
Capturing not just the likeness, but the personality and emotion of the individual.
Drawn with fine attention to detail on high-quality Fabriano paper, using professional-grade materials for depth and realism.

                            </p>
                            <div class="d-flex justify-content-between align-items-center">
                             
                                <div>
                                    <a href="https://web.facebook.com/photo/?fbid=621474163966629&set=pb.100083121522598.-2207520000"
                                    class="btn btn-sm btn-outline-primary">View Details</a>
                                    <?php if(isset($_SESSION['user_id'])): ?>
                                        <button class="btn btn-sm btn-outline-danger favorite-btn">

                                            <i class="far fa-heart"></i>
                                        </button>
                                    <?php endif; ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 mb-4">
                    <div class="card">
                        <img src="images/2.png"
                        class="card-img-top" alt="Artwork 2">
                        <div class="card-body">
                            <h5 class="card-title">
                            Hypher Realistic Drawing 
                            </h5>
                            <p class="card-text">
                            A Hyper-Realistic Portrait Created with Heart and Precision 🖤✨
Every detail meticulously hand-drawn to capture the true essence and emotion of the subject.
Crafted using premium materials on Fabriano paper, bringing life to every feature, texture, and expression.
A timeless piece that celebrates individuality, depth, and soul. 🎨
                            </p>
                            <div class="d-flex justify-content-between align-items-center">
                           
                                <div>
                                    <a href="https://web.facebook.com/photo?fbid=602871865826859&set=a.249533131160736"
                                     class="btn btn-sm btn-outline-primary">View Details</a>
                                    <?php if(isset($_SESSION['user_id'])): ?>
                                        <button class="btn btn-sm btn-outline-danger favorite-btn">

                                            <i class="far fa-heart"></i>
                                        </button>
                                    <?php endif; ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 mb-4">
                    <div class="card">
                        <img src="https://scontent.fcmb3-2.fna.fbcdn.net/v/t39.30808-6/485984168_643855178395194_5622030851949307098_n.jpg?_nc_cat=103&ccb=1-7&_nc_sid=833d8c&_nc_eui2=AeGIXdGkcPnL8cXK9bCpFzhtDcdtVhVgr2gNx21WFWCvaKT1kVCpW0FyK8Bd7vWN8b19MyYFvC3J7bydz2rwySk6&_nc_ohc=j5aPa7D0AJgQ7kNvwHdy9xZ&_nc_oc=AdlvyVaDTmpV78rxKlfYRje7ZGQ3KrDGSygbpzSSsCBBuxxcrKJuvA4OMZy6jTVaN8TT4veG5plK85vWnjlNBXt9&_nc_zt=23&_nc_ht=scontent.fcmb3-2.fna&_nc_gid=jgN07goQrD2yyYvYoGWCBg&oh=00_AfEb0CZfnsKbNizQI2UEZZUeErzyTGh8bPkhUwOwrrvc-w&oe=68011A08"
                         class="card-img-top" alt="Artwork 3">
                        <div class="card-body">
                            <h5 class="card-title">
                            Family Art 
                            </h5>
                            <p class="card-text">
                            A custom Family Portrait I created for a special order ❤️🥺
Each member was illustrated individually using their own photo 🧑‍🎨
Hand-drawn with 100% gold ink on premium Fabriano paper ✨️

                            </p>
                            <div class="d-flex justify-content-between align-items-center">
                     
                                <div>
                                    <a href="https://web.facebook.com/photo/?fbid=554830440631002&set=a.249533131160736"
                                    class="btn btn-sm btn-outline-primary">View Details</a>
                                    <?php if(isset($_SESSION['user_id'])): ?>
                                        <button class="btn btn-sm btn-outline-danger favorite-btn">
                                            <i class="far fa-heart"></i>
                                        </button>
                                    <?php endif; ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="text-center mt-4">
                <a href="gallery.php" class="btn btn-outline-primary">View All Artworks</a>
            </div>
        </div>
    </section>

    <!-- Categories Section -->
    <section class="categories-section py-5 bg-light">
        <div class="container">
            <h2 class="text-center mb-5">Browse by Category</h2>
            <div class="row g-4">
                <div class="col-md-3 col-6">
                    <a href="gallery.php?category=painting" class="category-card">
                        <div class="card text-center h-100">
                            <div class="card-body">
                                <i class="fas fa-paint-brush fa-3x mb-3 text-primary"></i>
                                <h5 class="card-title">Paintings</h5>
                                <p class="card-text small">Explore oil, acrylic, and watercolor paintings</p>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-md-3 col-6">
                    <a href="gallery.php?category=sculpture" class="category-card">
                        <div class="card text-center h-100">
                            <div class="card-body">
                                <i class="fas fa-drafting-compass fa-3x mb-3 text-primary"></i>
                                <h5 class="card-title">Sculptures</h5>
                                <p class="card-text small">Discover 3D artworks in various materials</p>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-md-3 col-6">
                    <a href="gallery.php?category=photography" class="category-card">
                        <div class="card text-center h-100">
                            <div class="card-body">
                                <i class="fas fa-camera fa-3x mb-3 text-primary"></i>
                                <h5 class="card-title">Photography</h5>
                                <p class="card-text small">View stunning photographic artworks</p>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-md-3 col-6">
                    <a href="gallery.php?category=digital" class="category-card">
                        <div class="card text-center h-100">
                            <div class="card-body">
                                <i class="fas fa-desktop fa-3x mb-3 text-primary"></i>
                                <h5 class="card-title">Digital Art</h5>
                                <p class="card-text small">Experience modern digital creations</p>
                            </div>
                        </div>
                    </a>
                </div>
            </div>
        </div>
    </section>

    <!-- About Section -->
    <section class="about-section py-5">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-md-6">
                    <img src="https://scontent.fcmb3-2.fna.fbcdn.net/v/t39.30808-6/486569091_644185461695499_1461450870222764622_n.jpg?_nc_cat=102&ccb=1-7&_nc_sid=833d8c&_nc_eui2=AeG98hjyZMijBcXI9FnOr0DpC5rLAGFxNocLmssAYXE2h56hWEHk81EYuUIOXnR2ONLwWneAip-owaQrotFfT4nx&_nc_ohc=Olq6fKIwdhAQ7kNvwHMZXp2&_nc_oc=Adm7BqZhesPnHLRPw8GuJ-9QEJZE0S1L4FG_iEKn4BU0vu2wq5x2axYc7-4uP5YCjsAKrSgyudDI0oLdaN4I2A29&_nc_zt=23&_nc_ht=scontent.fcmb3-2.fna&_nc_gid=xmpJrLeOw4K-tiEAa-BgPA&oh=00_AfHBBnnovfrw--uyUriCdxs7PgDtoFrARzE6Ul_nzr2zKw&oe=680122E1"
                     alt="About Our Gallery" class="img-fluid rounded">
                </div>
                <div class="col-md-6">
                    <h2>About Sandesh Art Gallery</h2>
                    <p>Sandesh Art Gallery was established in 2020 with a vision to showcase exceptional artistic talent and provide a platform for artists to reach a wider audience.</p>
                    <p>Our gallery features a diverse collection of paintings, sculptures, photographs, and digital art from both established and emerging artists.</p>
                    <p>We believe in the power of art to inspire, provoke thought, and bring beauty into our lives.</p>
                    <div class="mt-4">
                        <a href="about.php" class="btn btn-outline-primary">Learn More About Us</a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Testimonials Section -->
    <section class="testimonials-section py-5 bg-light">
        <div class="container">
            <h2 class="text-center mb-5">What Our Visitors Say</h2>
            <div class="row">
                <div class="col-md-4 mb-4">
                    <div class="card testimonial-card h-100">
                        <div class="card-body">
                            <div class="testimonial-rating mb-3">
                                <i class="fas fa-star text-warning"></i>
                                <i class="fas fa-star text-warning"></i>
                                <i class="fas fa-star text-warning"></i>
                                <i class="fas fa-star text-warning"></i>
                                <i class="fas fa-star text-warning"></i>
                            </div>
                            <p class="card-text">"The Sandesh Art Gallery offers an incredible selection of artworks. I found a beautiful painting that perfectly complements my living room. Highly recommend!"</p>
                            <div class="testimonial-author d-flex align-items-center mt-3">
                                <div class="testimonial-avatar me-3">
                                    <img src="https://scontent.fcmb3-2.fna.fbcdn.net/v/t39.30808-6/480755171_628572503108991_5572911552399544650_n.jpg?_nc_cat=108&ccb=1-7&_nc_sid=6ee11a&_nc_eui2=AeEsNYX0E12azF_pgwldviWKtF430vuqJIa0XjfS-6okhvEwaMswl-MAPYFMVl2OKBradAZn7lQwluOdviQhp64E&_nc_ohc=aHq1CTvc5EMQ7kNvwED_Cl0&_nc_oc=Adm-Cye_U_wRsBAAj7ZP0X3DDxKSEF9tdzxJugz7ttYDBU9aNNOfqYvh5a3SB3ZLMlCHOHCOeNkoEKo5JvfBsfGc&_nc_zt=23&_nc_ht=scontent.fcmb3-2.fna&_nc_gid=YFnRoTEWrmn7F7CHEJP3Lg&oh=00_AfFra1dsJParHyRGLY17dTd8IHJBHnuK_yWrFlrk7_rALQ&oe=6801315C" alt="Testimonial Author" class="rounded-circle" width="50" height="50">
                                </div>
                                <div>
                                    <h6 class="mb-0">Kushan Kumarasiri</h6>
                                    <small class="text-muted">Software Developer</small>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 mb-4">
                    <div class="card testimonial-card h-100">
                        <div class="card-body">
                            <div class="testimonial-rating mb-3">
                                <i class="fas fa-star text-warning"></i>
                                <i class="fas fa-star text-warning"></i>
                                <i class="fas fa-star text-warning"></i>
                                <i class="fas fa-star text-warning"></i>
                                <i class="fas fa-star text-warning"></i>
                            </div>
                            <p class="card-text">"As an emerging artist, I'm grateful for the platform Sandesh provides. They've helped me reach new audiences and their support has been invaluable for my career."</p>
                            <div class="testimonial-author d-flex align-items-center mt-3">
                                <div class="testimonial-avatar me-3">
                                    <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcR-xtM_wdoUbPR3LC4yi8fF9XXkBGVot-Dohg&s" alt="Testimonial Author" class="rounded-circle" width="50" height="50">
                                </div>
                                <div>
                                    <h6 class="mb-0">Sasindu Dilshan</h6>
                                    <small class="text-muted">Business Partner</small>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 mb-4">
                    <div class="card testimonial-card h-100">
                        <div class="card-body">
                            <div class="testimonial-rating mb-3">
                                <i class="fas fa-star text-warning"></i>
                                <i class="fas fa-star text-warning"></i>
                                <i class="fas fa-star text-warning"></i>
                                <i class="fas fa-star text-warning"></i>
                                <i class="fas fa-star-half-alt text-warning"></i>
                            </div>
                            <p class="card-text">"The gallery's curation is exceptional. Each visit offers a new perspective on contemporary art. The staff is knowledgeable and the exhibitions are always thought-provoking."</p>
                            <div class="testimonial-author d-flex align-items-center mt-3">
                                <div class="testimonial-avatar me-3">
                                    <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcT9QsNNKPOs5EMC4BgohMCnPOeM0cb4BcogBA&s" alt="Testimonial Author" class="rounded-circle" width="50" height="50">
                                </div>
                                <div>
                                    <h6 class="mb-0">Pramuditha Yatawara</h6>
                                    <small class="text-muted">Traverlor</small>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Newsletter Section -->
    <section class="newsletter-section py-5">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-8 text-center">
                    <h2>Stay Updated</h2>
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
                    <p>Showcasing exceptional art from around the world since 2020.</p>
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
    <script src="js/gallery.js"></script>
    <script>
        // Add/remove favorite functionality
        document.querySelectorAll('.favorite-btn').forEach(btn => {
            btn.addEventListener('click', function() {
                const artworkId = this.getAttribute('data-artwork-id');
                const icon = this.querySelector('i');
                
                // Toggle heart icon
                if (icon.classList.contains('far')) {
                    icon.classList.replace('far', 'fas');
                    // Here you would add AJAX call to add to favorites
                    console.log('Added artwork ' + artworkId + ' to favorites');
                } else {
                    icon.classList.replace('fas', 'far');
                    // Here you would add AJAX call to remove from favorites
                    console.log('Removed artwork ' + artworkId + ' from favorites');
                }
            });
        });

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
    </script>
</body>
</html>