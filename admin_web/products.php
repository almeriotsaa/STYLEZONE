<?php
include "../config/connection.php";


$query = "SELECT * FROM products";
$result = mysqli_query($conn, $query);
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Products | Stylezone Admin</title>
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

  <style>
    * {
      scroll-behavior: smooth;
      scrollbar-width: none;
    }

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

    .nav-item.active,
    .nav-item:hover {
      background: rgba(255, 255, 255, 0.1);
      color: #fff;
    }

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
      box-shadow: 0 4px 20px rgba(0, 0, 0, 0.05);
      border: 1px solid rgba(255, 255, 255, 0.3);
    }

    h1 {
      margin-bottom: 20px;
      font-size: 24px;
      color: #222;
      font-weight: bold;
    }

    table {
      width: 100%;
      border-collapse: collapse;
      margin-top: 20px;
      table-layout: auto;
    }

    th,
    td {
      padding: 12px 15px;
      text-align: left;
      vertical-align: middle;
      font-size: 14px;
    }

    th {
      background: rgba(255, 255, 255, 0.15);
      color: #333;
      font-weight: 600;
    }

    tr {
      border-bottom: 1px solid rgba(0, 0, 0, 0.05);
    }

    tr:hover {
      background: rgba(255, 255, 255, 0.25);
    }

    .product-img {
      width: 60px;
      height: 60px;
      object-fit: cover;
      border-radius: 8px;
      border: 1px solid rgba(0, 0, 0, 0.1);
    }

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
      <button class="btn btn-add" data-bs-toggle="modal" data-bs-target="#addProductModal">+ Add Product</button>

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
          <?php while ($row = mysqli_fetch_assoc($result)): ?>
            <tr>
              <td><?= htmlspecialchars($row['product_id']); ?></td>
              <td>
                <img src="<?= htmlspecialchars($row['image']); ?>" alt="Product" class="product-img">
              </td>
              <td><?= htmlspecialchars($row['category_id']); ?></td>
              <td><?= htmlspecialchars($row['name_product']); ?></td>
              <td>
                <?php
                $desc = htmlspecialchars($row['description']);
                echo strlen($desc) > 100 ? substr($desc, 0, 100) . '...' : $desc;
                ?>
              </td>
              <td>Rp.<?= number_format($row['price'], 0, ',', '.'); ?></td>
              <td><?= htmlspecialchars($row['stock']); ?></td>
              <td>
                <div class="size-container">
                  <?php
                  $sizes = explode(',', $row['size']);
                  foreach ($sizes as $s) {
                    echo '<span class="size-badge">' . trim($s) . '</span>';
                  }
                  ?>
                </div>
              </td>
              <td>
                <div class="action-buttons">
                  <button class="btn btn-edit">Edit</button>
                  <button class="btn btn-delete">Delete</button>
                </div>
              </td>
            </tr>
          <?php endwhile; ?>
        </tbody>
      </table>
    </div>
  </div>

  <!-- Modal Add Product -->
  <div class="modal fade" id="addProductModal" tabindex="-1" aria-labelledby="addProductModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered">
      <div class="modal-content p-4 rounded-4 border-0 shadow-lg">
        <div class="modal-header border-0">
          <h5 class="modal-title fw-bold" id="addProductModalLabel">Add New Product</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
        </div>

        <div class="modal-body">
          <form action="process_add_product.php" method="POST" enctype="multipart/form-data">

            <div class="mb-3">
              <label for="product_id" class="form-label">Product ID</label>
              <input type="text" name="product_id" id="product_id" class="form-control" placeholder="e.g. CT001" required>
            </div>

            <div class="mb-3">
              <label for="category_id" class="form-label">Category</label>
              <select name="category_id" id="category_id" class="form-select" required>
                <option value="">-- Select Category --</option>
                <optgroup label="MEN">
                  <option value="M001">Tops</option>
                  <option value="M002">Bottoms</option>
                  <option value="M003">Footwear</option>
                  <option value="M004">Accessories</option>
                  <option value="M005">Outerwear</option>
                </optgroup>
                <optgroup label="WOMEN">
                  <option value="W001">Tops</option>
                  <option value="W002">Bottoms</option>
                  <option value="W003">Footwear</option>
                  <option value="W004">Accessories</option>
                  <option value="W005">Outerwear</option>
                </optgroup>
              </select>
            </div>

            <div class="mb-3">
              <label for="name_product" class="form-label">Product Name</label>
              <input type="text" name="name_product" id="name_product" class="form-control" placeholder="Enter product name" required>
            </div>

            <div class="mb-3">
              <label for="description" class="form-label">Description</label>
              <textarea name="description" id="description" class="form-control" rows="3" placeholder="Product description..."></textarea>
            </div>

            <div class="row">
              <div class="col-md-4 mb-3">
                <label for="stock" class="form-label">Stock</label>
                <input type="number" name="stock" id="stock" class="form-control" required>
              </div>

              <div class="col-md-4 mb-3">
                <label for="price" class="form-label">Price (IDR)</label>
                <input type="number" name="price" id="price" class="form-control" required>
              </div>

              <div class="col-md-4 mb-3">
                <label for="size" class="form-label">Available Sizes</label>
                <input type="text" name="size" id="size" class="form-control" placeholder="e.g. XS, S, M, L, XL, XXL">
              </div>
            </div>

            <div class="mb-4">
              <label for="image" class="form-label">Product Image</label>
              <input type="file" name="image" id="image" class="form-control" accept="image/*" required>
            </div>

            <button type="submit" class="btn btn-dark w-100">Add Product</button>
          </form>
        </div>
      </div>
    </div>
  </div>

</body>

</html>