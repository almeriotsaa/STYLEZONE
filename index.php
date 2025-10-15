<?php
session_start();
include "./config/connection.php";

if (isset($_SESSION['role'])) {
    if ($_SESSION['role'] == 'admin') {
        header("Location: ./admin_web/dashboard.php");
        exit();
    }
}
$query = "SELECT * FROM products";
$result = mysqli_query($conn, $query);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>E-COMMERCE MODERN</title>

    <!-- BOOTSTRAP & ICONS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" />
    <link rel="stylesheet" href="./style/style.css">
</head>

<body>
    <!-- 🧭 NAVBAR -->
    <nav class="navbar navbar-expand-lg fixed-top glass-navbar">
        <div class="container">
            <a class="navbar-brand fs-4" href="#">STYLEZONE</a>

            <!-- MOBILE TOGGLE -->
            <button class="navbar-toggler border-0" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>

            <!-- MENU -->
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav mx-auto">
                    <li class="nav-item"><a class="nav-link" href="#">HOME</a></li>
                    <li class="nav-item"><a class="nav-link" href="#shop">SHOP</a></li>
                    <li class="nav-item"><a class="nav-link" href="#new_arrival">NEW ARRIVAL</a></li>
                    <li class="nav-item"><a class="nav-link" href="#about">ABOUT</a></li>
                </ul>

                <!-- RIGHT ICONS -->
                <div class="d-flex align-items-center gap-3">
                    <a href="#" class="icon-btn"><i class="bi bi-search"></i></a>
                    <a href="#" id="openCart" class="icon-btn"><i class="bi bi-cart3"></i></a>

                    <?php if (!isset($_SESSION['role'])): ?>
                        <button type="button" class="btn-login" data-bs-toggle="modal" data-bs-target="#loginModal">LOGIN</button>
                    <?php else: ?>
                        <!-- Profile Dropdown -->
                        <div class="profile-dropdown">
                            <button class="profile-btn" id="profileDropdown">
                                <i class="bi bi-person-circle"></i>
                            </button>
                            <div class="dropdown-menu" id="dropdownMenu">
                                <a href="profile.php" class="dropdown-item">
                                    <i class="bi bi-person"></i> MY PROFILE
                                </a>
                                <div class="dropdown-divider"></div>
                                <a href="logout.php" class="dropdown-item" style="color: red;">
                                    <i class="bi bi-box-arrow-right"></i> LOG OUT
                                </a>
                            </div>
                        </div>

                    <?php endif; ?>
                </div>
            </div>
        </div>
    </nav>

    <!-- 🪟 LOGIN MODAL -->
    <div class="modal fade" id="loginModal" tabindex="-1" aria-labelledby="loginModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content p-4 rounded-4 border-0 shadow-lg">
                <div class="modal-header border-0">
                    <h5 class="modal-title fw-bold" id="loginModalLabel">SIGN IN</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>

                <div class="modal-body">
                    <form action="./config/login.php" method="POST">
                        <div class="mb-4">
                            <label class="form-label" for="emailInput">Email Address</label>
                            <input type="email" name="email" id="emailInput" class="form-control" placeholder="Enter your email" required />
                        </div>

                        <div class="mb-4">
                            <label class="form-label" for="passwordInput">Password</label>
                            <input type="password" name="password" id="passwordInput" class="form-control"
                                placeholder="Enter your password" required />
                        </div>

                        <button type="submit" class="btn btn-dark w-100 mb-3">Sign In</button>

                        <div class="text-center">
                            <p>Does not have an account? <a href="#">Register</a></p>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>

    <!-- 🛒 CART SIDEBAR -->
    <div id="cartSidebar" class="cart-sidebar">
        <div class="cart-header">
            <h4>YOUR CART</h4>
            <button class="close-cart">&times;</button>
        </div>

        <div class="cart-items">
            <!-- Contoh item -->
            <div class="cart-item">
                <img src="https://static.zara.net/assets/public/5a2d/d6f1/ae90430fbf6b/a6b46ff892ea/05644385250-a1/05644385250-a1.jpg?w=120"
                    alt="Product">
                <div class="item-details">
                    <p class="item-name">T-SHIRT TEXTURED</p>
                    <p class="item-price">759.900 IDR</p>
                </div>
                <button class="remove-item">&times;</button>
            </div>

            <div class="cart-item">
                <img src="https://static.zara.net/assets/public/5a2d/d6f1/ae90430fbf6b/a6b46ff892ea/05644385250-a1/05644385250-a1.jpg?w=120"
                    alt="Product">
                <div class="item-details">
                    <p class="item-name">LINEN SHIRT</p>
                    <p class="item-price">899.900 IDR</p>
                </div>
                <button class="remove-item">&times;</button>
            </div>
        </div>

        <div class="cart-footer">
            <p class="total">TOTAL: <span>1.659.800 IDR</span></p>
            <button class="btn-checkout">CHECKOUT</button>
        </div>
    </div>


    <!-- 🦸 HERO SECTION -->
    <div class="hero">
        <img src="https://im.uniqlo.com/global-cms/spa/rese48f58ea629bce2832eda95c7353e7d1fr.jpg"
            class="img-fluid w-100 position-absolute top-0 start-0"
            style="z-index:-1; height:100%; object-fit:cover;" />
        <div class="text-center">
            <h1>DISCOVER YOUR STYLE</h1>
            <p class="lead mb-4 text-uppercase">TRENDY FASHION & ACCESSORIES WITH EXCLUSIVE DISCOUNTS</p>
            <a href="#shop" class="btn-shop-now">SHOP NOW</a>
        </div>
    </div>

    <!-- New Arrival Carousel -->
    <div class="container py-5" id="new_arrival">
        <h2 class="section-title">New Arrival</h2>
        <div id="newArrivalCarousel" class="carousel slide" data-bs-ride="carousel">
            <div class="carousel-inner">

                <!-- Slide 1 -->
                <div class="carousel-item active">
                    <div class="row g-4">
                        <div class="col-md-4 col-sm-6">
                            <div class="card product-card">
                                <img src="https://static.zara.net/assets/public/9936/361a/6b324642b558/5c0c8bd7650a/01165360800-p/01165360800-p.jpg?ts=1759934185900&w=375"
                                    class="card-img-top" alt="PRODUCT 1">
                                <div class="card-body p-0 mt-2">
                                    <p class="product-name">JAKET REVERSIBEL DUA SISI BULU IMITASI</p>
                                    <p class="product-price">759.900 IDR</p>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-4 col-sm-6">
                            <div class="card product-card">
                                <img src="https://static.zara.net/assets/public/abb5/33e7/65374e4cbc42/74d9113df97d/09076217099-p/09076217099-p.jpg?ts=1759934199035&w=375"
                                    class="card-img-top" alt="PRODUCT 2">
                                <div class="card-body p-0 mt-2">
                                    <p class="product-name">JAKET MOTIF HEWAN</p>
                                    <p class="product-price">759.900 IDR</p>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-4 col-sm-6">
                            <div class="card product-card">
                                <img src="https://static.zara.net/assets/public/c694/790f/21144d54b2dd/ef2c53d307f8/06147160407-a1/06147160407-a1.jpg?ts=1758285815012&w=375"
                                    class="card-img-top" alt="PRODUCT 3">
                                <div class="card-body p-0 mt-2">
                                    <p class="product-name">JEANS Z1975 RELAXED SLIM LOW RISE</p>
                                    <p class="product-price">759.900 IDR</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Slide 2 -->
                <div class="carousel-item">
                    <div class="row g-4">
                        <div class="col-md-4 col-sm-6">
                            <div class="card product-card">
                                <img src="https://static.zara.net/assets/public/ea81/9987/d4ce498d8705/e1d52795ee7a/04087374412-a5/04087374412-a5.jpg?ts=1758882849951&w=472"
                                    class="card-img-top" alt="PRODUCT 4">
                                <div class="card-body p-0 mt-2">
                                    <p class="product-name">KAUS PATCHES CHAMPION ® X ZARA</p>
                                    <p class="product-price">499.900 IDR</p>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-4 col-sm-6">
                            <div class="card product-card">
                                <img src="https://static.zara.net/assets/public/2173/6908/3ad942618d27/bbc24ed40194/06224356700-a1/06224356700-a1.jpg?ts=1758730469721&w=472"
                                    class="card-img-top" alt="PRODUCT 5">
                                <div class="card-body p-0 mt-2">
                                    <p class="product-name">T-SHIRT GRAFIS HARRY LAMBERT FOR ZARA X DISNEY</p>
                                    <p class="product-price">699.900 IDR</p>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-4 col-sm-6">
                            <div class="card product-card">
                                <img src="https://static.zara.net/assets/public/5392/c7ee/913e4cc69205/e6c6e3bb121b/05955549104-a4/05955549104-a4.jpg?ts=1757002343339&w=472"
                                    class="card-img-top" alt="PRODUCT 6">
                                <div class="card-body p-0 mt-2">
                                    <p class="product-name">CELANA PANJANG SETELAN GARIS</p>
                                    <p class="product-price">899.900 IDR</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

            <!-- Controls -->
            <button class="carousel-control-prev" type="button" data-bs-target="#newArrivalCarousel"
                data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#newArrivalCarousel"
                data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
            </button>
        </div>
    </div>

    <div class="container text-center my-3">

        <!-- Gender Tabs -->
        <ul class="nav justify-content-center category-gender mb-3" id="genderTabs" role="tablist">
            <li class="nav-item" role="presentation">
                <button class="category-btn active" id="women-tab" data-bs-toggle="tab" data-bs-target="#women"
                    type="button" role="tab" aria-controls="women" aria-selected="true">FOR WOMEN</button>
            </li>
            <li class="nav-item" role="presentation">
                <button class="category-btn" id="men-tab" data-bs-toggle="tab" data-bs-target="#men" type="button"
                    role="tab" aria-controls="men" aria-selected="false">FOR MEN</button>
            </li>
        </ul>

        <!-- Product Category Tabs -->
        <ul class="nav justify-content-center product-category-tabs">
            <li class="nav-item"><a class="product-tab active" href="#">T-SHIRT</a></li>
            <li class="nav-item"><a class="product-tab" href="#">SHIRT</a></li>
            <li class="nav-item"><a class="product-tab" href="#">SHOES</a></li>
            <li class="nav-item"><a class="product-tab" href="#">WATCH</a></li>
            <li class="nav-item"><a class="product-tab" href="#">SUNGLASSES</a></li>
            <li class="nav-item"><a class="product-tab" href="#">BAGPACKS</a></li>
        </ul>

    </div>

    <!-- 🛒 PRODUCT SECTION -->
    <div class="container py-5" id="shop">
        <div class="row g-4">
            <?php while ($row = mysqli_fetch_assoc($result)) { ?>
                <div class="col-md-4 col-sm-6">
                    <div class="product-card">
                        <img
                            src="<?= htmlspecialchars($row['image']); ?>"
                            alt="<?= htmlspecialchars($row['name_product']); ?>"
                            class="img-fluid">
                        <p class="product-name"><?= htmlspecialchars($row['name_product']); ?></p>
                        <p class="product-price"><?= number_format($row['price'], 0, ',', '.'); ?> IDR</p>
                    </div>
                </div>
            <?php } ?>
        </div>
    </div>

    <!-- 🦶 FOOTER -->
    <footer class="bg-dark text-light pt-5 pb-3 text-uppercase" id="about">
        <div class="container">
            <div class="row">
                <div class="col-md-4 mb-3">
                    <h5>ABOUT US</h5>
                    <p class="text-muted">YOUR ONE-STOP SHOP FOR TRENDY FASHION, ELECTRONICS, AND MORE.</p>
                </div>
                <div class="col-md-2 mb-3">
                    <h6>SHOP</h6>
                    <ul class="list-unstyled">
                        <li><a href="#">MEN</a></li>
                        <li><a href="#">WOMEN</a></li>
                    </ul>
                </div>
                <div class="col-md-2 mb-3">
                    <h6>HELP</h6>
                    <ul class="list-unstyled">
                        <li><a href="#">FAQ</a></li>
                        <li><a href="#">CONTACT</a></li>
                        <li><a href="#">SHIPPING</a></li>
                        <li><a href="#">RETURNS</a></li>
                    </ul>
                </div>
                <div class="col-md-4 mb-3">
                    <h6>FOLLOW US</h6>
                    <a href="#" class="me-3"><i class="bi bi-facebook"></i></a>
                    <a href="#" class="me-3"><i class="bi bi-instagram"></i></a>
                    <a href="#" class="me-3"><i class="bi bi-twitter"></i></a>
                </div>
            </div>
            <div class="text-center mt-4">
                <p class="mb-0">&copy; 2025 STYLEZONE. ALL RIGHTS RESERVED.</p>
            </div>
        </div>
    </footer>

    <!-- 📜 SCRIPTS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

    <script>
        // NAVBAR SCROLL EFFECT
        window.addEventListener("scroll", function() {
            const navbar = document.querySelector(".navbar");
            navbar.classList.toggle("scrolled", window.scrollY > 50);
        });
    </script>

    <script>
        const openCart = document.getElementById("openCart");
        const cartSidebar = document.getElementById("cartSidebar");
        const closeCart = document.querySelector(".close-cart");

        openCart.addEventListener("click", () => {
            cartSidebar.classList.add("active");
        });

        closeCart.addEventListener("click", () => {
            cartSidebar.classList.remove("active");
        });
    </script>

    <script>
        // Profile Dropdown Functionality
        const profileDropdown = document.getElementById("profileDropdown");
        const dropdownMenu = document.getElementById("dropdownMenu");

        profileDropdown.addEventListener("click", function(e) {
            e.stopPropagation();
            dropdownMenu.classList.toggle("show");
        });

        // Close dropdown when clicking outside
        document.addEventListener("click", function() {
            dropdownMenu.classList.remove("show");
        });

        // Prevent dropdown from closing when clicking inside it
        dropdownMenu.addEventListener("click", function(e) {
            e.stopPropagation();
        });
    </script>

</body>

</html>