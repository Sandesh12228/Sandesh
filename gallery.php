<?php
// Start the session
session_start();

// Database connection would typically be included here
//include 'includes/database_connection.php'

// Sample artwork data (this would typically come from a database)
$artworks = [
    [
        'id' => 1,
        'title' => 'Single Pencil Portrait',
        'image' => 'https://scontent.fcmb3-2.fna.fbcdn.net/v/t39.30808-6/487159087_645595891554456_323828545303756807_n.jpg?_nc_cat=109&ccb=1-7&_nc_sid=833d8c&_nc_eui2=AeFsBcLAszw8HPpDA0MxYmF83DqYAf9MXWncOpgB_0xdaVBpNHvgPBByCV9gW8tl6UJaP_l8Bnvrm7dyiSBmDBlN&_nc_ohc=kbTp2-Qh4CgQ7kNvwGYm1bz&_nc_oc=AdkXEgLFcbrQjBGS_-frYSDrvdlwWzLGIcIQxOi4frBwBTFanMfhVp35ZJrqgoo37nFNCRQZ1FvBGCtlqv65s20R&_nc_zt=23&_nc_ht=scontent.fcmb3-2.fna&_nc_gid=JQ9AOu7EjmHH1OOGRTHlvA&oh=00_AfGK6pUUwzVSqy_deSmu0Pt-jl9F00PvmDiGNNzTBxcp4Q&oe=68011779',
        'description' => 'ආදරේට දුන්න තෑග්ගක් 😍 මෙ නංගිට Art එක හම්බුනාට පස්සෙ මට කෝල් එකක් අරන්ම චිත්‍රෙ ලස්සනයි කියල හොද comment එකක් දුන්න 😌🤍 ඔයත් එයාට ආදරෙ නම් දෙන්න චිත්‍රයක් 😏',
        'artist' => 'Sandesh',
        'category' => 'drawing',
        'price' => '12000',
        'date_created' => '2023-09-15',
        'url' => 'https://web.facebook.com/photo/?fbid=621474163966629&set=pb.100083121522598.-2207520000'
    ],
    [
        'id' => 2,
        'title' => 'Lasted Commission Drawing',
        'image' => 'https://scontent.fcmb3-2.fna.fbcdn.net/v/t39.30808-6/486376140_644905748290137_997495530812592351_n.jpg?stp=dst-jpg_s720x720_tt6&_nc_cat=102&ccb=1-7&_nc_sid=833d8c&_nc_eui2=AeGZAAMwatqwnG08j2pfCbn7BxwNw_ALnZ0HHA3D8AudnQ11wOrJFYQ7z6cyh8iclxqRmUPTt_N5fNFzM1W1ZxAK&_nc_ohc=aztUemkF520Q7kNvwGwVcD5&_nc_oc=Adl-7sBvk8_48Jj9LvbTPlbKQESKFs6E4mEfAmYnDfDDHORp5GNJ9n35in2z65PWmkykyRoQe_nCZ-fobYD1nK_A&_nc_zt=23&_nc_ht=scontent.fcmb3-2.fna&_nc_gid=dDkmTQY14ACgZXdWqZl63w&oh=00_AfHYwdnJkicf6s7xMOOJEhD0TELoKKqSQMcfrz64kQDnNw&oe=68011D0A',
        'description' => 'Photo එකෙ white Area හින්ද Cam එකටවත් Capture කරන්න මාර අමාරුයි.ඇස් දෙකෙන්ම බලන්න ඕන ලස්සන ..',
        'artist' => 'Sandesh',
        'category' => 'drawing',
        'price' => '15000',
        'date_created' => '2023-10-20',
        'url' => 'https://web.facebook.com/photo?fbid=602871865826859&set=a.249533131160736'
    ],
    [
        'id' => 3,
        'title' => 'Family Art',
        'image' => 'https://scontent.fcmb3-2.fna.fbcdn.net/v/t39.30808-6/485984168_643855178395194_5622030851949307098_n.jpg?_nc_cat=103&ccb=1-7&_nc_sid=833d8c&_nc_eui2=AeGIXdGkcPnL8cXK9bCpFzhtDcdtVhVgr2gNx21WFWCvaKT1kVCpW0FyK8Bd7vWN8b19MyYFvC3J7bydz2rwySk6&_nc_ohc=j5aPa7D0AJgQ7kNvwHdy9xZ&_nc_oc=AdlvyVaDTmpV78rxKlfYRje7ZGQ3KrDGSygbpzSSsCBBuxxcrKJuvA4OMZy6jTVaN8TT4veG5plK85vWnjlNBXt9&_nc_zt=23&_nc_ht=scontent.fcmb3-2.fna&_nc_gid=jgN07goQrD2yyYvYoGWCBg&oh=00_AfEb0CZfnsKbNizQI2UEZZUeErzyTGh8bPkhUwOwrrvc-w&oe=68011A08',
        'description' => 'ඇණවුමක් සදහා මම නිර්මාණය කරපු Family Art එකක් ❤️🥺 එක එක්කෙනාගෙ පොටො වෙන වෙනම අරන් ඇන්දෙ 🧑‍🎨 100% මිනිරන් On Fabriano Paper ✨️',
        'artist' => 'Sandesh',
        'category' => 'drawing',
        'price' => '25000',
        'date_created' => '2023-11-05',
        'url' => 'https://web.facebook.com/photo/?fbid=554830440631002&set=a.249533131160736'
    ],
    [
        'id' => 4,
        'title' => 'Landscape Painting',
        'image' => 'images/autumnal-lake-in-a-mountain-valley-photo.jpeg',
        'description' => 'A beautiful landscape painting capturing the serene beauty of Sri Lankan countryside.',
        'artist' => 'Sandesh',
        'category' => 'painting',
        'price' => '18000',
        'date_created' => '2023-12-10',
        'url' => '#'
    ],
    [
        'id' => 5,
        'title' => 'Hypher Realistic Portrait Drawing',
        'image' => 'images/2.png',
        'description' => 'Detailed portrait drawing created with precision and care.',
        'artist' => 'Sandesh',
        'category' => 'drawing',
        'price' => '20000',
        'date_created' => '2024-01-15',
        'url' => '#'
    ],
    [
        'id' => 6,
        'title' => 'Watercolor Scenery',
        'image' => 'images/istockphoto-543463718-612x612.jpg',
        'description' => 'Delicate watercolor painting showcasing vibrant colors and flowing technique.',
        'artist' => 'Sandesh',
        'category' => 'painting',
        'price' => '16000',
        'date_created' => '2024-02-20',
        'url' => '#'
    ],
    [
        'id' => 7,
        'title' => 'Abstract Composition',
        'image' => 'images/COLOURBOX14275509.jpg',
        'description' => 'Modern abstract composition exploring form, color, and emotion.',
        'artist' => 'Guest Artist',
        'category' => 'digital',
        'price' => '22000',
        'date_created' => '2024-03-10',
        'url' => '#'
    ],
    [
        'id' => 8,
        'title' => 'Nature Photography',
        'image' => 'images/istockphoto-1406974336-612x612.jpg',
        'description' => 'Stunning nature photography capturing the wild beauty of Sri Lanka.',
        'artist' => 'Guest Artist',
        'category' => 'photography',
        'price' => '14000',
        'date_created' => '2024-03-25',
        'url' => '#'
    ],
    [
        'id' => 9,
        'title' => 'Clay Sculpture',
        'image' => 'images/05BERNINI-superJumbo.jpg',
        'description' => 'Hand-crafted clay sculpture with intricate details and textures.',
        'artist' => 'Guest Artist',
        'category' => 'sculpture',
        'price' => '30000',
        'date_created' => '2024-04-05',
        'url' => '#'
    ]
];

// Filter by category if set
$category = isset($_GET['category']) ? $_GET['category'] : '';
$filtered_artworks = [];

if (!empty($category)) {
    foreach ($artworks as $artwork) {
        if ($artwork['category'] == $category) {
            $filtered_artworks[] = $artwork;
        }
    }
} else {
    $filtered_artworks = $artworks;
}

// Sort options
$sort = isset($_GET['sort']) ? $_GET['sort'] : 'newest';
if ($sort == 'price_low') {
    usort($filtered_artworks, function($a, $b) {
        return $a['price'] <=> $b['price'];
    });
} else if ($sort == 'price_high') {
    usort($filtered_artworks, function($a, $b) {
        return $b['price'] <=> $a['price'];
    });
} else {
    // Default sort by newest
    usort($filtered_artworks, function($a, $b) {
        return strtotime($b['date_created']) <=> strtotime($a['date_created']);
    });
}
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gallery - Sandesh Art Gallery</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="css/index.css">
    <link rel="stylesheet" href="css/gallery.css">
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
                        <a class="nav-link active" href="gallery.php">Gallery</a>
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

    

    <!-- Main Gallery Content -->
    <div class="container">
        <!-- Filters Section -->
        <section class="filter-section mb-5">
            <div class="row">
                <div class="col-lg-6">
                    <h4>Filter by Category</h4>
                    <div class="d-flex flex-wrap">
                        <a href="gallery.php" class="btn btn-outline-primary filter-btn <?php echo empty($category) ? 'active' : ''; ?>">All</a>
                        <a href="gallery.php?category=painting" class="btn btn-outline-primary filter-btn <?php echo $category == 'painting' ? 'active' : ''; ?>">Paintings</a>
                        <a href="gallery.php?category=drawing" class="btn btn-outline-primary filter-btn <?php echo $category == 'drawing' ? 'active' : ''; ?>">Drawings</a>
                        <a href="gallery.php?category=sculpture" class="btn btn-outline-primary filter-btn <?php echo $category == 'sculpture' ? 'active' : ''; ?>">Sculptures</a>
                        <a href="gallery.php?category=photography" class="btn btn-outline-primary filter-btn <?php echo $category == 'photography' ? 'active' : ''; ?>">Photography</a>
                        <a href="gallery.php?category=digital" class="btn btn-outline-primary filter-btn <?php echo $category == 'digital' ? 'active' : ''; ?>">Digital Art</a>
                    </div>
                </div>
                <div class="col-lg-6">
                    <h4>Sort By</h4>
                    <div class="d-flex">
                        <a href="gallery.php<?php echo !empty($category) ? '?category='.$category.'&sort=newest' : '?sort=newest'; ?>" class="btn btn-outline-secondary filter-btn <?php echo $sort == 'newest' ? 'active' : ''; ?>">
                            <i class="fas fa-calendar-alt me-1"></i> Newest
                        </a>
                        <a href="gallery.php<?php echo !empty($category) ? '?category='.$category.'&sort=price_low' : '?sort=price_low'; ?>" class="btn btn-outline-secondary filter-btn <?php echo $sort == 'price_low' ? 'active' : ''; ?>">
                            <i class="fas fa-sort-amount-down-alt me-1"></i> Price: Low to High
                        </a>
                        <a href="gallery.php<?php echo !empty($category) ? '?category='.$category.'&sort=price_high' : '?sort=price_high'; ?>" class="btn btn-outline-secondary filter-btn <?php echo $sort == 'price_high' ? 'active' : ''; ?>">
                            <i class="fas fa-sort-amount-up-alt me-1"></i> Price: High to Low
                        </a>
                    </div>
                </div>
            </div>
            
            <!-- Search bar -->
            <div class="mt-4">
                <h4>Search</h4>
                <div class="input-group">
                    <input type="text" id="search-input" class="form-control" placeholder="Search by title, artist, or description...">
                    <button class="btn btn-primary" id="search-button">
                        <i class="fas fa-search"></i> Search
                    </button>
                </div>
            </div>
        </section>

        <!-- Results info -->
        <div class="d-flex justify-content-between align-items-center mb-4">
            <p class="mb-0"><strong><?php echo count($filtered_artworks); ?></strong> artworks found
            <?php if (!empty($category)): ?>
                in <strong><?php echo ucfirst($category); ?></strong> category
            <?php endif; ?>
            </p>
            <div class="view-toggle">
                <button class="btn btn-sm btn-outline-secondary me-2 active" id="grid-view-btn">
                    <i class="fas fa-th"></i> Grid
                </button>
                <button class="btn btn-sm btn-outline-secondary" id="list-view-btn">
                    <i class="fas fa-list"></i> List
                </button>
            </div>
        </div>

        <!-- Gallery Grid -->
        <div class="row" id="gallery-grid">
            <?php foreach ($filtered_artworks as $artwork): ?>
            <div class="col-lg-4 col-md-6 gallery-item">
                <div class="artwork-card">
                    <div class="position-relative">
                        <img src="<?php echo htmlspecialchars($artwork['image']); ?>" class="artwork-image" alt="<?php echo htmlspecialchars($artwork['title']); ?>">
                        <span class="price-badge">Rs. <?php echo number_format($artwork['price']); ?></span>
                    </div>
                    <div class="artwork-info">
                        <h5><?php echo htmlspecialchars($artwork['title']); ?></h5>
                        <p class="text-muted">By <?php echo htmlspecialchars($artwork['artist']); ?></p>
                        <span class="badge bg-secondary category-badge"><?php echo htmlspecialchars($artwork['category']); ?></span>
                        <p class="mt-2"><?php echo substr(htmlspecialchars($artwork['description']), 0, 100) . '...'; ?></p>
                        <div class="artwork-actions">
                            <a href="artwork-details.php?id=<?php echo $artwork['id']; ?>" class="btn btn-primary btn-sm">View Details</a>
                            <?php if(isset($_SESSION['user_id'])): ?>
                                <button class="favorite-btn" data-artwork-id="<?php echo $artwork['id']; ?>">
                                    <i class="far fa-heart"></i>
                                </button>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            </div>
            <?php endforeach; ?>
        </div>

        <!-- Gallery List View (Hidden by default) -->
        <div class="list-group d-none" id="gallery-list">
            <?php foreach ($filtered_artworks as $artwork): ?>
            <div class="list-group-item list-group-item-action gallery-item">
                <div class="row align-items-center">
                    <div class="col-md-3">
                        <img src="<?php echo htmlspecialchars($artwork['image']); ?>" class="img-fluid rounded" alt="<?php echo htmlspecialchars($artwork['title']); ?>">
                    </div>
                    <div class="col-md-9">
                        <div class="d-flex w-100 justify-content-between">
                            <h5 class="mb-1"><?php echo htmlspecialchars($artwork['title']); ?></h5>
                            <span class="badge bg-primary">Rs. <?php echo number_format($artwork['price']); ?></span>
                        </div>
                        <p class="mb-1"><?php echo htmlspecialchars($artwork['description']); ?></p>
                        <div class="d-flex justify-content-between align-items-center mt-2">
                            <div>
                                <small class="text-muted">By <?php echo htmlspecialchars($artwork['artist']); ?></small>
                                <span class="badge bg-secondary ms-2 category-badge"><?php echo htmlspecialchars($artwork['category']); ?></span>
                                <small class="text-muted ms-2">Added: <?php echo date('M d, Y', strtotime($artwork['date_created'])); ?></small>
                            </div>
                            <div>
                                <a href="artwork-details.php?id=<?php echo $artwork['id']; ?>" class="btn btn-primary btn-sm">View Details</a>
                                <?php if(isset($_SESSION['user_id'])): ?>
                                    <button class="favorite-btn" data-artwork-id="<?php echo $artwork['id']; ?>">
                                        <i class="far fa-heart"></i>
                                    </button>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <?php endforeach; ?>
        </div>

        <!-- Pagination -->
        <nav aria-label="Gallery pagination" class="my-5">
            <ul class="pagination justify-content-center">
                <li class="page-item disabled">
                    <a class="page-link" href="#" tabindex="-1" aria-disabled="true">Previous</a>
                </li>
                <li class="page-item active"><a class="page-link" href="#">1</a></li>
                <li class="page-item"><a class="page-link" href="#">2</a></li>
                <li class="page-item"><a class="page-link" href="#">3</a></li>
                <li class="page-item">
                    <a class="page-link" href="#">Next</a>
                </li>
            </ul>
        </nav>
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
    // Toggle view between grid and list
    document.getElementById('grid-view-btn').addEventListener('click', function() {
        document.getElementById('gallery-grid').classList.remove('d-none');
        document.getElementById('gallery-list').classList.add('d-none');
        document.getElementById('grid-view-btn').classList.add('active');
        document.getElementById('list-view-btn').classList.remove('active');
    });

    document.getElementById('list-view-btn').addEventListener('click', function() {
        document.getElementById('gallery-grid').classList.add('d-none');
        document.getElementById('gallery-list').classList.remove('d-none');
        document.getElementById('grid-view-btn').classList.remove('active');
        document.getElementById('list-view-btn').classList.add('active');
    });

    // Search functionality
    document.getElementById('search-button').addEventListener('click', function() {
        const searchTerm = document.getElementById('search-input').value.toLowerCase();
        const artworks = document.querySelectorAll('.gallery-item');
        
        artworks.forEach(function(artwork) {
            const title = artwork.querySelector('h5').textContent.toLowerCase();
            const description = artwork.querySelector('p').textContent.toLowerCase();
            const artist = artwork.querySelector('.text-muted').textContent.toLowerCase();
            
            if (title.includes(searchTerm) || description.includes(searchTerm) || artist.includes(searchTerm)) {
                artwork.style.display = '';
            } else {
                artwork.style.display = 'none';
            }
        });
    });

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