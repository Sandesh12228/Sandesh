<?php
// Start the session
session_start();

// Database connection would typically be included here
// include 'includes/db_connect.php';
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>About Us - Sandesh Art Gallery</title>
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
                        <a class="nav-link" href="index.php">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="gallery.php">Gallery</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" href="about.php">About Us</a>
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

   

    <!-- Our Story Section -->
    <section class="our-story-section py-5">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-md-6 mb-4 mb-md-0">
                    <img src="https://scontent.fcmb3-2.fna.fbcdn.net/v/t39.30808-6/486569091_644185461695499_1461450870222764622_n.jpg?_nc_cat=102&ccb=1-7&_nc_sid=833d8c&_nc_eui2=AeG98hjyZMijBcXI9FnOr0DpC5rLAGFxNocLmssAYXE2h56hWEHk81EYuUIOXnR2ONLwWneAip-owaQrotFfT4nx&_nc_ohc=Olq6fKIwdhAQ7kNvwHMZXp2&_nc_oc=Adm7BqZhesPnHLRPw8GuJ-9QEJZE0S1L4FG_iEKn4BU0vu2wq5x2axYc7-4uP5YCjsAKrSgyudDI0oLdaN4I2A29&_nc_zt=23&_nc_ht=scontent.fcmb3-2.fna&_nc_gid=xmpJrLeOw4K-tiEAa-BgPA&oh=00_AfHBBnnovfrw--uyUriCdxs7PgDtoFrARzE6Ul_nzr2zKw&oe=680122E1" alt="Gallery History" class="img-fluid rounded shadow">
                </div>
                <div class="col-md-6">
                    <div class="section-title mb-4">
                        <span class="subtitle">Our Story</span>
                        <h2>The Journey of Sandesh Art Gallery</h2>
                    </div>
                    <p>Sandesh Art Gallery was founded in 2016 by Sandesh Karunarathna, a passionate artist with a vision to create a space where both established and emerging artists could showcase their work to a wider audience.</p>
                    <p>What began as a small exhibition space in Sri Lanka has grown into a respected gallery known for its diverse collection and commitment to promoting artistic talent. Over the years, we have expanded our reach and now feature artworks from talented artists across the country and beyond.</p>
                    <p>Our gallery has hosted numerous successful exhibitions, art workshops, and cultural events, becoming a vibrant hub for the local art community. We take pride in our contribution to the arts and our role in connecting artists with art lovers and collectors.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Mission & Vision Section -->
    <section class="mission-vision-section py-5 bg-light">
        <div class="container">
            <div class="row justify-content-center mb-5">
                <div class="col-md-8 text-center">
                    <div class="section-title">
                        <span class="subtitle">Our Purpose</span>
                        <h2>Mission & Vision</h2>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6 mb-4">
                    <div class="card h-100 border-0 shadow">
                        <div class="card-body">
                            <div class="text-center mb-4">
                                <i class="fas fa-bullseye fa-3x text-primary"></i>
                                <h3 class="mt-3">Our Mission</h3>
                            </div>
                            <p>At Sandesh Art Gallery, our mission is to showcase exceptional artistic talent, foster a vibrant art community, and make art accessible to everyone. We strive to:</p>
                            <ul>
                                <li>Provide a platform for artists to showcase their work and reach new audiences</li>
                                <li>Curate diverse collections that represent various artistic styles and cultural perspectives</li>
                                <li>Foster appreciation for art through exhibitions, workshops, and educational programs</li>
                                <li>Support emerging artists in developing their careers and artistic practice</li>
                                <li>Create meaningful connections between artists, collectors, and art enthusiasts</li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 mb-4">
                    <div class="card h-100 border-0 shadow">
                        <div class="card-body">
                            <div class="text-center mb-4">
                                <i class="fas fa-eye fa-3x text-primary"></i>
                                <h3 class="mt-3">Our Vision</h3>
                            </div>
                            <p>Our vision is to become a leading art gallery known for discovering and nurturing artistic talent, while making art an integral part of community life. We envision:</p>
                            <ul>
                                <li>A thriving artistic ecosystem where artists of all backgrounds can flourish</li>
                                <li>A gallery that serves as a cultural landmark and destination for art lovers</li>
                                <li>Strong partnerships with educational institutions, local businesses, and community organizations</li>
                                <li>Innovative exhibitions and programs that push artistic boundaries and engage diverse audiences</li>
                                <li>A sustainable business model that supports artists fairly while making art collecting accessible</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Meet the Team Section -->
    <section class="team-section py-5">
        <div class="container">
            <div class="row justify-content-center mb-5">
                <div class="col-md-8 text-center">
                    <div class="section-title">
                        <span class="subtitle">The People Behind the Gallery</span>
                        <h2>Meet Our Team</h2>
                        <p class="lead">Our dedicated team brings together expertise in art, curation, business, and education to create exceptional experiences for artists and visitors alike.</p>
                    </div>
                </div>
            </div>
            <div class="row">
                    <div class="team-member text-center">
                        <div class="member-photo mb-3">
                            <img src="https://media.licdn.com/dms/image/v2/D4D03AQFTh_9BFeIsug/profile-displayphoto-shrink_200_200/profile-displayphoto-shrink_200_200/0/1677464725397?e=2147483647&v=beta&t=J2H8Bq99Gi9as7_DeAdj0nJeAbjDqhYnne2o0Rv7HkY" alt="Sandesh " class="img-fluid rounded-circle shadow" style="width: 200px; height: 200px; object-fit: cover;">
                        </div>
                        <div class="member-info">
                            <h5>Naditha Sandesh </h5>
                            <p class="text-muted">Founder & Creative Director</p>
                            <div class="social-icons">
                                <a href="#" class="text-primary me-2"><i class="fab fa-facebook-f"></i></a>
                                <a href="#" class="text-primary me-2"><i class="fab fa-instagram"></i></a>
                                <a href="#" class="text-primary"><i class="fab fa-linkedin-in"></i></a>
                            </div>
                        </div>
                    </div>
            </div>
        </div>
    </section>

    <!-- Gallery Features Section -->
    <section class="features-section py-5 bg-light">
        <div class="container">
            <div class="row justify-content-center mb-5">
                <div class="col-md-8 text-center">
                    <div class="section-title">
                        <span class="subtitle">What We Offer</span>
                        <h2>Gallery Features</h2>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-4 mb-4">
                    <div class="feature-card text-center p-4 h-100 bg-white rounded shadow">
                        <div class="feature-icon mb-3">
                            <i class="fas fa-palette fa-3x text-primary"></i>
                        </div>
                        <h4>Diverse Art Collection</h4>
                        <p>Explore our wide range of artworks including paintings, sculptures, photography, and digital art from both established and emerging artists.</p>
                    </div>
                </div>
                <div class="col-md-4 mb-4">
                    <div class="feature-card text-center p-4 h-100 bg-white rounded shadow">
                        <div class="feature-icon mb-3">
                            <i class="fas fa-calendar-alt fa-3x text-primary"></i>
                        </div>
                        <h4>Regular Exhibitions</h4>
                        <p>Visit our regular exhibitions featuring themed collections, solo artist showcases, and collaborative displays throughout the year.</p>
                    </div>
                </div>
                <div class="col-md-4 mb-4">
                    <div class="feature-card text-center p-4 h-100 bg-white rounded shadow">
                        <div class="feature-icon mb-3">
                            <i class="fas fa-chalkboard-teacher fa-3x text-primary"></i>
                        </div>
                        <h4>Art Workshops</h4>
                        <p>Participate in our educational workshops where artists share their techniques and expertise with art enthusiasts of all skill levels.</p>
                    </div>
                </div>
                <div class="col-md-4 mb-4">
                    <div class="feature-card text-center p-4 h-100 bg-white rounded shadow">
                        <div class="feature-icon mb-3">
                            <i class="fas fa-handshake fa-3x text-primary"></i>
                        </div>
                        <h4>Artist Representation</h4>
                        <p>We proudly represent and support talented artists, helping them connect with collectors and expand their reach in the art world.</p>
                    </div>
                </div>
                <div class="col-md-4 mb-4">
                    <div class="feature-card text-center p-4 h-100 bg-white rounded shadow">
                        <div class="feature-icon mb-3">
                            <i class="fas fa-users fa-3x text-primary"></i>
                        </div>
                        <h4>Community Engagement</h4>
                        <p>We actively engage with the local community through art-related events, partnerships with schools, and cultural initiatives.</p>
                    </div>
                </div>
                <div class="col-md-4 mb-4">
                    <div class="feature-card text-center p-4 h-100 bg-white rounded shadow">
                        <div class="feature-icon mb-3">
                            <i class="fas fa-shopping-cart fa-3x text-primary"></i>
                        </div>
                        <h4>Art Acquisition Services</h4>
                        <p>Our expert team provides guidance and assistance for art collectors and enthusiasts looking to purchase artworks for their collections.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Achievements Section -->
    <section class="achievements-section py-5">
        <div class="container">
            <div class="row justify-content-center mb-5">
                <div class="col-md-8 text-center">
                    <div class="section-title">
                        <span class="subtitle">Our Milestones</span>
                        <h2>Gallery Achievements</h2>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-3 col-6 mb-4">
                    <div class="achievement-card text-center p-3">
                        <div class="achievement-icon mb-3">
                            <i class="fas fa-paint-brush fa-3x text-primary"></i>
                        </div>
                        <h2 class="achievement-number">500+</h2>
                        <p>Artworks Exhibited</p>
                    </div>
                </div>
                <div class="col-md-3 col-6 mb-4">
                    <div class="achievement-card text-center p-3">
                        <div class="achievement-icon mb-3">
                            <i class="fas fa-user-tie fa-3x text-primary"></i>
                        </div>
                        <h2 class="achievement-number">50+</h2>
                        <p>Featured Artists</p>
                    </div>
                </div>
                <div class="col-md-3 col-6 mb-4">
                    <div class="achievement-card text-center p-3">
                        <div class="achievement-icon mb-3">
                            <i class="fas fa-award fa-3x text-primary"></i>
                        </div>
                        <h2 class="achievement-number">25+</h2>
                        <p>Special Exhibitions</p>
                    </div>
                </div>
                <div class="col-md-3 col-6 mb-4">
                    <div class="achievement-card text-center p-3">
                        <div class="achievement-icon mb-3">
                            <i class="fas fa-users fa-3x text-primary"></i>
                        </div>
                        <h2 class="achievement-number">10K+</h2>
                        <p>Gallery Visitors</p>
                    </div>
                </div>
            </div>
            <div class="row mt-4">
                <div class="col-md-12">
                    <div class="timeline">
                        <div class="timeline-item">
                            <div class="timeline-date">2016</div>
                            <div class="timeline-content">
                                <h5>Gallery Founded</h5>
                                <p>Sandesh Art Gallery was established with a small exhibition space showcasing local artists.</p>
                            </div>
                        </div>
                        <div class="timeline-item">
                            <div class="timeline-date">2018</div>
                            <div class="timeline-content">
                                <h5>First Major Exhibition</h5>
                                <p>Hosted our first major exhibition "Contemporary Visions" featuring 15 emerging artists.</p>
                            </div>
                        </div>
                        <div class="timeline-item">
                            <div class="timeline-date">2020</div>
                            <div class="timeline-content">
                                <h5>Gallery Expansion</h5>
                                <p>Expanded our gallery space to include a dedicated sculpture area and digital art section.</p>
                            </div>
                        </div>
                        <div class="timeline-item">
                            <div class="timeline-date">2022</div>
                            <div class="timeline-content">
                                <h5>International Recognition</h5>
                                <p>Received recognition as one of the top emerging art galleries in South Asia.</p>
                            </div>
                        </div>
                        <div class="timeline-item">
                            <div class="timeline-date">2024</div>
                            <div class="timeline-content">
                                <h5>Online Platform Launch</h5>
                                <p>Launched our comprehensive online platform to showcase artworks to a global audience.</p>
                            </div>
                        </div>
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