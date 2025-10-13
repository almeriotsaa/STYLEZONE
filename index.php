<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>E-COMMERCE MODERN</title>

    <!-- BOOTSTRAP & ICONS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" />

    <style>
        * {
            scroll-behavior: smooth;
            scrollbar-width: none;
        }

        body {
            background-color: #f8f9fa;
            font-family: "Didot", serif;
        }

        /* 🌈 GLASS EFFECT NAVBAR */
        .glass-navbar {
            background: rgba(255, 255, 255, 0.1);
            backdrop-filter: blur(10px);
            border-bottom: 1px solid rgba(255, 255, 255, 0.2);
            transition: all 0.3s ease;
            z-index: 1;
        }

        .navbar.scrolled {
            background: rgba(0, 0, 0, 0.8);
            backdrop-filter: blur(12px);
            transition: all 0.3s ease-in-out;
        }

        /* 🖋 BRAND */
        .navbar-brand {
            color: #fff !important;
            letter-spacing: 0.5px;
        }

        /* 🧭 NAV LINKS */
        .nav-link {
            color: #f8f9fa !important;
            margin: 0 10px;
            position: relative;
            transition: color 0.3s ease;
        }

        .nav-link::after {
            content: "";
            position: absolute;
            width: 0%;
            height: 2px;
            background: white;
            bottom: -3px;
            left: 0;
            transition: width 0.3s ease;
        }

        .nav-link:hover {
            color: white !important;
        }

        .nav-link:hover::after {
            width: 100%;
        }

        /* 🛍 ICONS */
        .icon-btn {
            color: #fff;
            font-size: 1.3rem;
            transition: all 0.3s ease;
        }

        .icon-btn:hover {
            color: white;
            transform: scale(1.1);
        }

        .btn-login {
            background-color: transparent;
            color: white;
            border: 1px solid white;
            text-transform: uppercase;
            letter-spacing: 1px;
            padding: 4px 20px;
            font-weight: 500;
            transition: all 0.3s ease;
            border-radius: 0;
        }

        .btn-login:hover {
            transform: scale(1.1);
        }


        .modal-content {
            border-radius: 0 !important;
        }

        /* Tombol buka cart */
        .cart-btn {
            position: fixed;
            right: 30px;
            bottom: 30px;
            background-color: #000;
            color: #fff;
            font-size: 20px;
            padding: 12px 16px;
            border: none;
            border-radius: 50%;
            cursor: pointer;
            z-index: 1000;
            transition: background 0.3s ease;
        }

        .cart-btn:hover {
            background-color: #333;
        }

        /* Sidebar cart */
        .cart-sidebar {
            position: fixed;
            top: 0;
            right: -400px;
            width: 400px;
            height: 100%;
            background-color: #fff;
            box-shadow: -5px 0 15px rgba(0, 0, 0, 0.1);
            transition: right 0.4s ease;
            z-index: 999;
            display: flex;
            flex-direction: column;
            justify-content: space-between;
        }

        .cart-sidebar.active {
            right: 0;
        }

        /* Header */
        .cart-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 20px;
            border-bottom: 1px solid #ddd;
        }

        .cart-header h4 {
            font-family: 'Playfair Display', serif;
            font-size: 1.2rem;
            letter-spacing: 1px;
        }

        .close-cart {
            background: none;
            border: none;
            font-size: 28px;
            cursor: pointer;
            color: #555;
        }

        /* Item list */
        .cart-items {
            flex-grow: 1;
            overflow-y: auto;
            padding: 15px 20px;
        }

        .cart-item {
            display: flex;
            align-items: center;
            margin-bottom: 15px;
            border-bottom: 1px solid #eee;
            padding-bottom: 10px;
        }

        .cart-item img {
            width: 70px;
            height: auto;
            margin-right: 15px;
        }

        .item-details {
            flex: 1;
        }

        .item-name {
            font-size: 0.9rem;
            font-weight: 500;
            margin-bottom: 5px;
        }

        .item-price {
            color: #555;
            font-size: 0.85rem;
        }

        .remove-item {
            background: none;
            border: none;
            font-size: 22px;
            color: #999;
            cursor: pointer;
            transition: color 0.2s ease;
        }

        .remove-item:hover {
            color: #000;
        }
        
        .cart-footer {
            border-top: 1px solid #ddd;
            padding: 20px;
        }

        .cart-footer .total {
            font-weight: bold;
            margin-bottom: 15px;
        }

        .cart-footer .btn-checkout {
            width: 100%;
            background-color: #000;
            color: #fff;
            padding: 12px;
            border: none;
            border-radius: 0;
            font-family: 'Playfair Display', serif;
            letter-spacing: 1px;
            cursor: pointer;
            transition: background 0.3s ease;
        }

        .cart-footer .btn-checkout:hover {
            background-color: #333;
        }

        /* 🦸 HERO SECTION */
        .hero {
            height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            text-shadow: 0px 2px 10px rgba(0, 0, 0, 0.7);
            position: relative;
        }

        .hero h1 {
            font-size: 3rem;
            font-weight: 700;
        }

        .btn-shop-now {
            background-color: #000;
            color: #fff;
            border: none;
            border-radius: 0;
            padding: 12px 28px;
            font-size: 0.95rem;
            letter-spacing: 1px;
            text-transform: uppercase;
            text-decoration: none;
            display: inline-block;
            transition: all 0.3s ease;
        }

        .btn-shop-now:hover {
            letter-spacing: 1.5px;
            transform: scale(1.1);
        }

        /* 🌸 GENDER TABS */
        .category-gender .category-btn {
            color: #777;
            font-size: 15px;
            font-weight: 500;
            border: none;
            background: none;
            position: relative;
            text-transform: capitalize;
            letter-spacing: 0.5px;
            padding: 6px 18px;
            transition: all 0.3s ease;
        }

        .category-gender .category-btn.active {
            color: #000;
        }

        .category-gender .category-btn.active::after {
            content: "";
            position: absolute;
            bottom: -2px;
            left: 30%;
            width: 40%;
            height: 2px;
            background-color: #444;
        }

        /* 🖤 PRODUCT CATEGORY TABS */
        .product-category-tabs .product-tab {
            color: #000;
            font-weight: 500;
            font-size: 16px;
            border-radius: 0;
            /* Tidak ada lengkungan */
            padding: 8px 20px;
            margin: 0 6px;
            text-decoration: none;
            display: inline-block;
            transition: all 0.2s ease-in-out;
        }

        .product-category-tabs .product-tab.active {
            background-color: #000;
            color: #fff;
        }

        .product-category-tabs .product-tab:hover {
            background-color: #e5e5e5;
            color: #000;
        }

        .product-card {
            border: none;
            background-color: transparent;
            text-align: left;
        }

        .product-card img {
            width: 100%;
            height: auto;
            transition: all 0.3s ease;
        }

        .product-card img:hover {
            opacity: 0.9;
            transform: scale(1.01);
        }

        .product-name {
            font-size: 13px;
            text-transform: uppercase;
            margin-top: 8px;
            color: #000;
        }

        .product-details {
            font-size: 12px;
            color: #777;
        }

        .product-price {
            font-size: 13px;
            color: #000;
        }

        .section-title {
            text-align: center;
            text-transform: uppercase;
            letter-spacing: 3px;
            font-size: 1.8rem;
            margin-bottom: 30px;
        }

        /* 🦶 FOOTER */
        footer a {
            text-decoration: none;
            color: #ddd;
        }

        footer a:hover {
            color: white;
        }
    </style>
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
                    <li class="nav-item"><a class="nav-link" href="#deals">NEW ARRIVAL</a></li>
                    <li class="nav-item"><a class="nav-link" href="#new_arrival">ABOUT</a></li>
                </ul>

                <!-- RIGHT ICONS -->
                <div class="d-flex align-items-center gap-3">
                    <a href="#" class="icon-btn"><i class="bi bi-search"></i></a>
                    <a href="#" id="openCart" class="icon-btn"><i class="bi bi-cart3"></i></a>
                    <button type="button" class="btn-login" data-bs-toggle="modal" data-bs-target="#loginModal">
                        LOGIN
                    </button>

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
                    <form>
                        <!-- EMAIL -->
                        <div class="mb-4">
                            <label class="form-label" for="emailInput">EMAIL ADDRESS</label>
                            <input type="email" id="emailInput" class="form-control" placeholder="ENTER YOUR EMAIL" />
                        </div>

                        <!-- PASSWORD -->
                        <div class="mb-4">
                            <label class="form-label" for="passwordInput">PASSWORD</label>
                            <input type="password" id="passwordInput" class="form-control"
                                placeholder="ENTER YOUR PASSWORD" />
                        </div>

                        <!-- REMEMBER ME -->
                        <div class="d-flex justify-content-between align-items-center mb-4">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="rememberMe" checked />
                                <label class="form-check-label" for="rememberMe">REMEMBER ME</label>
                            </div>
                            <a href="#" class="text-decoration-none">FORGOT PASSWORD?</a>
                        </div>

                        <!-- SUBMIT -->
                        <button type="button" class="btn btn-dark w-100 mb-3">SIGN IN</button>

                        <!-- REGISTER -->
                        <div class="text-center">
                            <p>NOT A MEMBER? <a href="#">REGISTER</a></p>
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
            <a href="#" class="btn-shop-now">SHOP NOW</a>
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
            <div class="col-md-4 col-sm-6">
                <div class="card product-card">
                    <img src="https://static.zara.net/assets/public/5a2d/d6f1/ae90430fbf6b/a6b46ff892ea/05644385250-a1/05644385250-a1.jpg?ts=1759836082573&w=472"
                        class="card-img-top" alt="PRODUCT 1">
                    <div class="card-body p-0 mt-2">
                        <p class="product-name">KAUS OBLONG BERKERAH KANCING BERTEKSTUR</p>
                        <p class="product-price">759.900 IDR</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4 col-sm-6">
                <div class="card product-card">
                    <img src="https://static.zara.net/assets/public/5a2d/d6f1/ae90430fbf6b/a6b46ff892ea/05644385250-a1/05644385250-a1.jpg?ts=1759836082573&w=472"
                        class="card-img-top" alt="PRODUCT 2">
                    <div class="card-body p-0 mt-2">
                        <p class="product-name">T-SHIRT LIGHTWEIGHT LENGAN PANJANG</p>
                        <p class="product-price">759.900 IDR</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4 col-sm-6">
                <div class="card product-card">
                    <img src="https://static.zara.net/assets/public/5a2d/d6f1/ae90430fbf6b/a6b46ff892ea/05644385250-a1/05644385250-a1.jpg?ts=1759836082573&w=472"
                        class="card-img-top" alt="PRODUCT 3">
                    <div class="card-body p-0 mt-2">
                        <p class="product-name">T-SHIRT LIGHTWEIGHT LENGAN PANJANG</p>
                        <p class="product-price">759.900 IDR</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4 col-sm-6">
                <div class="card product-card">
                    <img src="https://static.zara.net/assets/public/5a2d/d6f1/ae90430fbf6b/a6b46ff892ea/05644385250-a1/05644385250-a1.jpg?ts=1759836082573&w=472"
                        class="card-img-top" alt="PRODUCT 3">
                    <div class="card-body p-0 mt-2">
                        <p class="product-name">T-SHIRT LIGHTWEIGHT LENGAN PANJANG</p>
                        <p class="product-price">759.900 IDR</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4 col-sm-6">
                <div class="card product-card">
                    <img src="https://static.zara.net/assets/public/5a2d/d6f1/ae90430fbf6b/a6b46ff892ea/05644385250-a1/05644385250-a1.jpg?ts=1759836082573&w=472"
                        class="card-img-top" alt="PRODUCT 3">
                    <div class="card-body p-0 mt-2">
                        <p class="product-name">T-SHIRT LIGHTWEIGHT LENGAN PANJANG</p>
                        <p class="product-price">759.900 IDR</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4 col-sm-6">
                <div class="card product-card">
                    <img src="https://static.zara.net/assets/public/5a2d/d6f1/ae90430fbf6b/a6b46ff892ea/05644385250-a1/05644385250-a1.jpg?ts=1759836082573&w=472"
                        class="card-img-top" alt="PRODUCT 3">
                    <div class="card-body p-0 mt-2">
                        <p class="product-name">T-SHIRT LIGHTWEIGHT LENGAN PANJANG</p>
                        <p class="product-price">759.900 IDR</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- 🦶 FOOTER -->
    <footer class="bg-dark text-light pt-5 pb-3 text-uppercase">
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
                <p class="mb-0">&copy; 2025 LOGO SHOP. ALL RIGHTS RESERVED.</p>
            </div>
        </div>
    </footer>

    <!-- 📜 SCRIPTS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

    <script>
        // NAVBAR SCROLL EFFECT
        window.addEventListener("scroll", function () {
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

</body>

</html>