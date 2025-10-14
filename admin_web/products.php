<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Products | Stylezone Admin</title>
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap" rel="stylesheet">
  <style>
    /* ===== General Styles ===== */
    body {
      font-family: 'Poppins', sans-serif;
      background: #f4f5f7;
      margin: 0;
      padding: 0;
      display: flex;
    }

    /* ===== Sidebar ===== */
    .sidebar {
      width: 260px;
      background: #1e1e1e;
      color: #fff;
      height: 100vh;
      padding: 30px 20px;
      box-sizing: border-box;
    }

    .sidebar h2 {
      margin-bottom: 40px;
      font-weight: 700;
    }

    .nav-item {
      display: block;
      padding: 10px 15px;
      border-radius: 10px;
      color: #ccc;
      text-decoration: none;
      margin-bottom: 10px;
      transition: 0.3s;
    }

    .nav-item.active, .nav-item:hover {
      background: rgba(255,255,255,0.1);
      color: #fff;
    }

    /* ===== Main ===== */
    .main {
      flex: 1;
      padding: 30px;
    }

    .glass-box {
      background: rgba(255, 255, 255, 0.2);
      backdrop-filter: blur(10px);
      -webkit-backdrop-filter: blur(10px);
      border-radius: 20px;
      padding: 25px;
      box-shadow: 0 4px 20px rgba(0,0,0,0.05);
      border: 1px solid rgba(255, 255, 255, 0.3);
    }

    h1 {
      margin-bottom: 20px;
      font-size: 24px;
      color: #222;
    }

    /* ===== Table ===== */
    table {
      width: 100%;
      border-collapse: collapse;
      margin-top: 20px;
      table-layout: auto;
    }

    th, td {
      padding: 12px 15px;
      text-align: left;
      vertical-align: middle;
      font-size: 14px;
    }

    th {
      background: rgba(255,255,255,0.15);
      color: #333;
      font-weight: 600;
    }

    tr {
      border-bottom: 1px solid rgba(0,0,0,0.05);
    }

    tr:hover {
      background: rgba(255,255,255,0.25);
    }

    /* ===== Product Image ===== */
    .product-img {
      width: 60px;
      height: 60px;
      object-fit: cover;
      border-radius: 8px;
      border: 1px solid rgba(0,0,0,0.1);
    }

    /* ===== Buttons ===== */
    .btn {
      padding: 7px 12px;
      border: none;
      border-radius: 8px;
      cursor: pointer;
      font-weight: 500;
      transition: 0.2s;
      font-size: 13px;
    }

    .btn-add {
      background: #4CAF50;
      color: white;
      margin-bottom: 15px;
    }

    .btn-edit {
      background: #2196F3;
      color: white;
    }

    .btn-delete {
      background: #f44336;
      color: white;
    }

    .btn:hover {
      opacity: 0.85;
    }

    .action-buttons {
      display: flex;
      gap: 8px;
      align-items: center;
    }

    /* ===== Size Badge ===== */
    .size-container {
      display: flex;
      flex-wrap: wrap;
      gap: 5px;
    }

    .size-badge {
      background: rgba(0, 0, 0, 0.05);
      color: #333;
      font-size: 13px;
      font-weight: 500;
      padding: 5px 10px;
      border-radius: 8px;
    }

  </style>
</head>
<body>

  <!-- ===== Sidebar ===== -->
  <div class="sidebar">
    <h2>STYLEZONE</h2>
    <a href="dashboard.php" class="nav-item">🏠 Dashboard</a>
    <a href="products.php" class="nav-item active">🛍️ Products</a>
    <a href="users.php" class="nav-item">👤 Users</a>
    <a href="orders.php" class="nav-item">📦 Orders</a>
    <a href="settings.php" class="nav-item">⚙️ Settings</a>
  </div>

  <!-- ===== Main Content ===== -->
  <div class="main">
    <div class="glass-box">
      <h1>Manage Products</h1>
      <button class="btn btn-add">+ Add Product</button>

      <table>
        <thead>
          <tr>
            <th>ID</th>
            <th>Image</th>
            <th>Category</th>
            <th>Name</th>
            <th>Description</th>
            <th>Price (IDR)</th>
            <th>Stock</th>
            <th>Size</th>
            <th>Actions</th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <td>1</td>
            <td><img src="https://static.zara.net/assets/public/5392/c7ee/913e4cc69205/e6c6e3bb121b/05955549104-a4/05955549104-a4.jpg?ts=1757002343339&w=472" alt="Product" class="product-img"></td>
            <td>T-Shirt</td>
            <td>Oversized Tee</td>
            <td>Soft cotton material</td>
            <td>199000</td>
            <td>45</td>
            <td>
              <div class="size-container">
                <span class="size-badge">S</span>
                <span class="size-badge">M</span>
                <span class="size-badge">L</span>
                <span class="size-badge">XL</span>
              </div>
            </td>
            <td>
              <div class="action-buttons">
                <button class="btn btn-edit">Edit</button>
                <button class="btn btn-delete">Delete</button>
              </div>
            </td>
          </tr>
          <tr>
            <td>2</td>
            <td><img src="https://static.zara.net/assets/public/5392/c7ee/913e4cc69205/e6c6e3bb121b/05955549104-a4/05955549104-a4.jpg?ts=1757002343339&w=472" alt="Product" class="product-img"></td>
            <td>Hoodie</td>
            <td>Comfy Hoodie</td>
            <td>Warm fleece material</td>
            <td>299000</td>
            <td>30</td>
            <td>
              <div class="size-container">
                <span class="size-badge">M</span>
                <span class="size-badge">L</span>
                <span class="size-badge">XL</span>
              </div>
            </td>
            <td>
              <div class="action-buttons">
                <button class="btn btn-edit">Edit</button>
                <button class="btn btn-delete">Delete</button>
              </div>
            </td>
          </tr>
        </tbody>
      </table>
    </div>
  </div>

</body>
</html>
