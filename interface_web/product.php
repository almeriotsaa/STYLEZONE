<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Product Detail | Stylezone</title>
  <style>
    /* Global Styles */
    * {
      margin: 0;
      padding: 0;
      box-sizing: border-box;
      font-family: "Didot", serif;
    }
    
    body {
      background: #fff;
      color: #111;
      line-height: 1.6;
    }
    
    /* Header & Navigation */
    .header {
      border-bottom: 1px solid #eee;
      padding: 15px 0;
    }
    
    .navbar {
      display: flex;
      justify-content: space-between;
      align-items: center;
      max-width: 1200px;
      margin: 0 auto;
      padding: 0 20px;
    }
    
    .logo {
      font-weight: bold;
      font-size: 24px;
      letter-spacing: 1px;
    }
    
    .nav-links {
      display: flex;
      list-style: none;
      gap: 30px;
    }
    
    .nav-links a {
      text-decoration: none;
      color: #111;
      font-size: 14px;
      transition: color 0.3s;
    }
    
    .nav-links a:hover {
      color: #666;
    }
    
    .user-actions {
      display: flex;
      gap: 20px;
    }
    
    /* Product Page Layout */
    .product-page {
      display: flex;
      gap: 60px;
      max-width: 1200px;
      margin: 60px auto;
      padding: 0 20px;
    }
    
    /* Product Gallery */
    .product-gallery {
      flex: 1;
      display: flex;
      flex-direction: column;
      align-items: center;
    }
    
    .main-image {
      width: 100%;
      max-width: 500px;
      border-radius: 4px;
      cursor: pointer;
      transition: transform 0.3s ease;
    }
    
    .main-image:hover {
      transform: scale(1.01);
    }
    
    .thumbnail-list {
      display: flex;
      gap: 15px;
      margin-top: 20px;
      justify-content: center;
    }
    
    .thumbnail-list img {
      width: 80px;
      height: 90px;
      object-fit: cover;
      border: 1px solid #ddd;
      border-radius: 4px;
      cursor: pointer;
      transition: all 0.2s ease;
    }
    
    .thumbnail-list img:hover {
      border-color: #000;
    }
    
    .thumbnail-list img.active {
      border: 2px solid #000;
    }
    
    /* Product Info */
    .product-info {
      flex: 1;
      display: flex;
      flex-direction: column;
    }
    
    .product-title {
      font-size: 24px;
      font-weight: bold;
      margin-bottom: 15px;
    }
    
    .product-desc {
      font-size: 15px;
      color: #555;
      margin-bottom: 20px;
      text-align: justify;
    }
    
    .price-stock {
      display: flex;
      align-items: center;
      gap: 20px;
      margin-bottom: 25px;
      font-size: 16px;
    }
    
    .price {
      font-weight: bold;
      font-size: 20px;
      color: #000;
    }
    
    .stock {
      color: #333;
      font-size: 14px;
    }
    
    /* Size Selection */
    .size-section {
      margin-bottom: 25px;
    }
    
    .size-label {
      display: block;
      margin-bottom: 10px;
      font-weight: bold;
    }
    
    .size-options {
      display: flex;
      flex-wrap: wrap;
      gap: 10px;
    }
    
    .size-btn {
      border: 1px solid #ddd;
      background: #fff;
      padding: 10px 18px;
      cursor: pointer;
      transition: all 0.3s;
      font-size: 14px;
    }
    
    .size-btn:hover {
      border-color: #000;
    }
    
    .size-btn.active {
      background: #000;
      color: #fff;
      border-color: #000;
    }
    
    /* Quantity Control */
    .quantity-section {
      margin-bottom: 25px;
    }
    
    .quantity-label {
      display: block;
      margin-bottom: 10px;
      font-weight: bold;
    }
    
    .quantity-control {
      display: flex;
      align-items: center;
      gap: 10px;
    }
    
    .quantity-btn {
      width: 35px;
      height: 35px;
      border: 1px solid #ddd;
      background: #fff;
      font-size: 18px;
      cursor: pointer;
      transition: all 0.3s;
    }
    
    .quantity-btn:hover {
      background: #f5f5f5;
    }
    
    .quantity-display {
      width: 40px;
      text-align: center;
      font-size: 16px;
    }
    
    /* Add to Cart Button */
    .cart-btn {
      background: #111;
      color: #fff;
      border: none;
      padding: 15px;
      width: 100%;
      max-width: 300px;
      font-size: 15px;
      cursor: pointer;
      transition: all 0.3s;
      margin-top: 10px;
    }
    
    .cart-btn:hover {
      background: #333;
    }
    
    /* Modal for Image Zoom */
    .modal {
      display: none;
      position: fixed;
      z-index: 1000;
      left: 0;
      top: 0;
      width: 100%;
      height: 100%;
      background-color: rgba(0,0,0,0.8);
      justify-content: center;
      align-items: center;
    }
    
    .modal-content {
      max-width: 80%;
      max-height: 80%;
      border-radius: 4px;
      cursor: pointer;
    }
    
    .close-btn {
      position: absolute;
      top: 30px;
      right: 50px;
      color: #fff;
      font-size: 35px;
      cursor: pointer;
      font-weight: bold;
      transition: 0.2s;
    }
    
    .close-btn:hover {
      color: #ccc;
    }
    
    /* Responsive Design */
    @media (max-width: 900px) {
      .product-page {
        flex-direction: column;
        gap: 30px;
        margin: 30px auto;
      }
      
      .navbar {
        flex-direction: column;
        gap: 15px;
      }
      
      .nav-links {
        gap: 15px;
        flex-wrap: wrap;
        justify-content: center;
      }
    }
    
    @media (max-width: 600px) {
      .thumbnail-list img {
        width: 60px;
        height: 70px;
      }
      
      .size-btn {
        padding: 8px 12px;
      }
    }
  </style>
</head>
<body>
  <header class="header">
    <nav class="navbar">
      <h1 class="logo">STYLEZONE</h1> 
    </nav>
  </header>

  <main class="product-page">
    <section class="product-gallery">
      <img id="mainImage" src="https://www.consortium.co.uk/media/catalog/product/cache/1/small_image/790x/040ec09b1e35df139433887a97daa66f/p/o/polar-skate-co-mitchell-flannel-shirt-blue-brown-psc-sp23-37_0000_cat.jpg" alt="Polar Skate Co. Mitchell Flannel Shirt" class="main-image" />

      <div class="thumbnail-list">
        <img class="active" src="https://www.consortium.co.uk/media/catalog/product/cache/1/small_image/790x/040ec09b1e35df139433887a97daa66f/p/o/polar-skate-co-mitchell-flannel-shirt-blue-brown-psc-sp23-37_0000_cat.jpg" alt="Flannel Shirt Front" />
        <img src="https://www.consortium.co.uk/media/catalog/product/cache/1/small_image/790x/040ec09b1e35df139433887a97daa66f/p/o/polar-skate-co-mitchell-flannel-shirt-blue-brown-psc-sp23-37_0001_1.jpg" alt="Flannel Shirt Side" />
        <img src="https://www.consortium.co.uk/media/catalog/product/cache/1/small_image/790x/040ec09b1e35df139433887a97daa66f/p/o/polar-skate-co-mitchell-flannel-shirt-blue-brown-psc-sp23-37_0002_2.jpg" alt="Flannel Shirt Back" />
      </div>
    </section>

    <section class="product-info">
      <h2 class="product-title">Polar Skate Co. Mitchell Flannel Shirt</h2>
      <p class="product-desc">
        Combines classic style with everyday comfort. Made from soft flannel fabric with a subtle check pattern, it features a button-up front, chest pocket with logo, and a relaxed fit perfect for casual wear or layering.
      </p>

      <div class="price-stock">
        <span class="price">Rp 249,000</span>
        <span class="stock">Stock: 30</span>
      </div>

      <div class="size-section">
        <span class="size-label">Select Size</span>
        <div class="size-options">
          <button class="size-btn">XS</button>
          <button class="size-btn">S</button>
          <button class="size-btn active">M</button>
          <button class="size-btn">L</button>
          <button class="size-btn">XL</button>
          <button class="size-btn">XXL</button>
        </div>
      </div>

      <div class="quantity-section">
        <span class="quantity-label">Quantity</span>
        <div class="quantity-control">
          <button class="quantity-btn" id="minusBtn">-</button>
          <span class="quantity-display" id="quantity">1</span>
          <button class="quantity-btn" id="plusBtn">+</button>
        </div>
      </div>

      <button class="cart-btn" id="cartBtn">Add to Cart</button>
    </section>
  </main>

  <!-- Modal for Image Zoom -->
  <div class="modal" id="imageModal">
    <span class="close-btn" id="closeModal">&times;</span>
    <img class="modal-content" id="modalImg" alt="Zoomed Product Image">
  </div>

  <script>
    // DOM Elements
    const mainImage = document.getElementById('mainImage');
    const thumbnails = document.querySelectorAll('.thumbnail-list img');
    const sizeButtons = document.querySelectorAll('.size-btn');
    const minusBtn = document.getElementById('minusBtn');
    const plusBtn = document.getElementById('plusBtn');
    const quantitySpan = document.getElementById('quantity');
    const cartBtn = document.getElementById('cartBtn');
    const modal = document.getElementById('imageModal');
    const modalImg = document.getElementById('modalImg');
    const closeModal = document.getElementById('closeModal');

    // Thumbnail switching
    thumbnails.forEach(thumb => {
      thumb.addEventListener('click', () => {
        thumbnails.forEach(img => img.classList.remove('active'));
        thumb.classList.add('active');
        mainImage.src = thumb.src;
      });
    });

    // Size selection
    sizeButtons.forEach(button => {
      button.addEventListener('click', () => {
        sizeButtons.forEach(btn => btn.classList.remove('active'));
        button.classList.add('active');
      });
    });

    // Quantity control
    let quantity = 1;
    plusBtn.addEventListener('click', () => {
      quantity++;
      quantitySpan.textContent = quantity;
    });

    minusBtn.addEventListener('click', () => {
      if (quantity > 1) {
        quantity--;
        quantitySpan.textContent = quantity;
      }
    });

    // Add to cart
    cartBtn.addEventListener('click', () => {
      const selectedSize = document.querySelector('.size-btn.active');
      if (!selectedSize) {
        alert('Please select a size before adding to cart.');
        return;
      }
      alert(`Added ${quantity}x ${selectedSize.textContent} size to cart!`);
    });

    // Image modal
    mainImage.addEventListener('click', () => {
      modal.style.display = 'flex';
      modalImg.src = mainImage.src;
    });

    closeModal.addEventListener('click', () => {
      modal.style.display = 'none';
    });

    modalImg.addEventListener('click', () => {
      modal.style.display = 'none';
    });

    window.addEventListener('click', (e) => {
      if (e.target === modal) {
        modal.style.display = 'none';
      }
    });
  </script>
</body>
</html>