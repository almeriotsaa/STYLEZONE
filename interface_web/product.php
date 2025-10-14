<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Product Detail | Stylezone</title>
  <style>
    body {
      font-family: Arial, sans-serif;
      background: #fff;
      color: #111;
      margin: 0;
      padding: 0;
    }

    .navbar {
      display: flex;
      justify-content: flex-start;
      align-items: center;
      padding: 20px 60px;
      border-bottom: 1px solid #ddd;
    }

    .logo {
      font-weight: bold;
      letter-spacing: 1px;
    }

    .product-page {
      display: flex;
      gap: 60px;
      padding: 60px;
      max-width: 1200px;
      margin: auto;
    }

    .product-gallery {
      flex: 1;
      display: flex;
      flex-direction: column;
      align-items: center;
    }

    .main-image {
      width: 80%;
      border-radius: 4px;
      transition: transform 0.3s ease;
      cursor: zoom-in;
    }

    .main-image:hover {
      transform: scale(1.02);
    }

    .thumbnail-list {
      display: flex;
      gap: 15px;
      margin-top: 20px;
      justify-content: center;
    }

    .thumbnail-list img {
      width: 90px;
      height: 100px;
      border: 1px solid #ddd;
      border-radius: 4px;
      cursor: pointer;
      transition: transform 0.2s ease, border-color 0.2s ease;
    }

    .thumbnail-list img:hover {
      transform: scale(1.05);
      border-color: #000;
    }

    .thumbnail-list img.active {
      border: 2px solid #000;
    }

    .product-info {
      flex: 1;
      display: flex;
      flex-direction: column;
    }

    .product-title {
      font-size: 22px;
      font-weight: bold;
      margin-bottom: 10px;
    }

    .product-desc {
      font-size: 15px;
      color: #555;
      margin-bottom: 15px;
      text-align: justify;
    }

    .price-stock {
      display: flex;
      align-items: center;
      gap: 20px;
      margin-bottom: 15px;
      font-size: 16px;
    }

    .price {
      font-weight: bold;
      color: #000;
    }

    .stock {
      color: #333;
    }

    .add-btn {
      background: none;
      border: 1px solid #000;
      padding: 12px;
      width: 180px;
      cursor: pointer;
      margin: 15px 0;
      transition: 0.3s;
    }

    .add-btn:hover {
      background: #000;
      color: #fff;
    }

    .size-options {
      display: none;
      margin-top: 10px;
      animation: fadeIn 0.3s ease-in-out;
    }

    @keyframes fadeIn {
      from { opacity: 0; transform: translateY(-10px); }
      to { opacity: 1; transform: translateY(0); }
    }

    .size-options p {
      margin-bottom: 10px;
      font-weight: bold;
    }

    .sizes {
      display: flex;
      flex-wrap: wrap;
      gap: 10px;
    }

    .sizes button {
      border: 1px solid #000;
      background: #fff;
      padding: 10px 18px;
      cursor: pointer;
      transition: 0.3s;
    }

    .sizes button:hover,
    .sizes button.active {
      background: #000;
      color: #fff;
    }

    .quantity-control {
      display: none;
      align-items: center;
      gap: 10px;
      margin-top: 25px;
      margin-bottom: 25px;
    }

    .quantity-control button {
      width: 35px;
      height: 35px;
      border: 1px solid #000;
      background: #fff;
      font-size: 18px;
      cursor: pointer;
      transition: 0.3s;
    }

    .quantity-control button:hover {
      background: #000;
      color: #fff;
    }

    .quantity-control span {
      width: 40px;
      text-align: center;
      font-weight: bold;
      font-size: 16px;
    }

    .cart-btn {
      display: none;
      background: #111;
      color: #fff;
      border: none;
      padding: 14px;
      width: 220px;
      font-size: 15px;
      cursor: pointer;
      transition: 0.3s;
      border-radius: 6px;
      box-shadow: 0 3px 8px rgba(0, 0, 0, 0.15);
    }

    .cart-btn:hover {
      background: #333;
      transform: scale(1.04);
      box-shadow: 0 4px 10px rgba(0, 0, 0, 0.25);
    }

    /* Modal (popup image) */
    .modal {
      display: none;
      position: fixed;
      z-index: 9999;
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
      border-radius: 8px;
      cursor: zoom-in;
      transition: transform 0.3s ease;
    }

    .modal-content.zoomed {
      transform: scale(1.8);
      cursor: zoom-out;
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

    @media (max-width: 900px) {
      .product-page {
        flex-direction: column;
        padding: 30px;
      }
      .add-btn, .cart-btn {
        width: 100%;
      }
      .main-image {
        width: 100%;
      }
    }
  </style>
</head>
<body>
  <header class="navbar">
    <h1 class="logo">STYLEZONE</h1>
  </header>

  <main class="product-page">
    <section class="product-gallery">
      <img id="mainImage" src="https://www.consortium.co.uk/media/catalog/product/cache/1/small_image/790x/040ec09b1e35df139433887a97daa66f/p/o/polar-skate-co-mitchell-flannel-shirt-blue-brown-psc-sp23-37_0000_cat.jpg" alt="Product" class="main-image" />

      <div class="thumbnail-list">
        <img class="active" src="https://www.consortium.co.uk/media/catalog/product/cache/1/small_image/790x/040ec09b1e35df139433887a97daa66f/p/o/polar-skate-co-mitchell-flannel-shirt-blue-brown-psc-sp23-37_0000_cat.jpg" alt="thumb1" />
        <img src="https://www.consortium.co.uk/media/catalog/product/cache/1/small_image/790x/040ec09b1e35df139433887a97daa66f/p/o/polar-skate-co-mitchell-flannel-shirt-blue-brown-psc-sp23-37_0001_1.jpg" alt="thumb2" />
        <img src="https://www.consortium.co.uk/media/catalog/product/cache/1/small_image/790x/040ec09b1e35df139433887a97daa66f/p/o/polar-skate-co-mitchell-flannel-shirt-blue-brown-psc-sp23-37_0002_2.jpg" alt="thumb3" />
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

      <button class="add-btn" id="addBtn">ADD</button>

      <div class="size-options" id="sizeOptions">
        <p>Select Size</p>
        <div class="sizes">
          <button>XS</button>
          <button>S</button>
          <button>M</button>
          <button>L</button>
          <button>XL</button>
          <button>XXL</button>
        </div>
      </div>

      <div class="quantity-control" id="quantityControl">
        <button id="minusBtn">-</button>
        <span id="quantity">1</span>
        <button id="plusBtn">+</button>
      </div>

      <button class="cart-btn" id="cartBtn">Add to Cart</button>
    </section>
  </main>

  <!-- Modal for Image Zoom -->
  <div class="modal" id="imageModal">
    <span class="close-btn" id="closeModal">&times;</span>
    <img class="modal-content" id="modalImg" alt="Zoomed Image">
  </div>

  <script>
    const mainImage = document.getElementById('mainImage');
    const thumbnails = document.querySelectorAll('.thumbnail-list img');
    const addBtn = document.getElementById('addBtn');
    const sizeOptions = document.getElementById('sizeOptions');
    const sizeButtons = document.querySelectorAll('.sizes button');
    const minusBtn = document.getElementById('minusBtn');
    const plusBtn = document.getElementById('plusBtn');
    const quantitySpan = document.getElementById('quantity');
    const cartBtn = document.getElementById('cartBtn');
    const quantityControl = document.getElementById('quantityControl');
    const modal = document.getElementById('imageModal');
    const modalImg = document.getElementById('modalImg');
    const closeModal = document.getElementById('closeModal');

    thumbnails.forEach(thumb => {
      thumb.addEventListener('click', () => {
        thumbnails.forEach(img => img.classList.remove('active'));
        thumb.classList.add('active');
        mainImage.src = thumb.src;
      });
    });

    addBtn.addEventListener('click', () => {
      sizeOptions.style.display = 'block';
      addBtn.style.display = 'none';
    });

    sizeButtons.forEach(button => {
      button.addEventListener('click', () => {
        sizeButtons.forEach(btn => btn.classList.remove('active'));
        button.classList.add('active');
        quantityControl.style.display = 'flex';
        cartBtn.style.display = 'block';
      });
    });

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

    cartBtn.addEventListener('click', () => {
      const selectedSize = document.querySelector('.sizes button.active');
      if (!selectedSize) {
        alert('Please select a size before adding to cart.');
        return;
      }
      alert(`Added ${quantity}x (${selectedSize.textContent}) to cart!`);
    });

    // Image popup
    mainImage.addEventListener('click', () => {
      modal.style.display = 'flex';
      modalImg.src = mainImage.src;
    });

    closeModal.addEventListener('click', () => {
      modal.style.display = 'none';
      modalImg.classList.remove('zoomed');
    });

    modalImg.addEventListener('click', () => {
      modalImg.classList.toggle('zoomed');
    });

    window.addEventListener('click', (e) => {
      if (e.target === modal) {
        modal.style.display = 'none';
        modalImg.classList.remove('zoomed');
      }
    });
  </script>
</body>
</html>
