<?php
// ===== Koneksi ke Database =====
$host = "localhost";
$user = "root";
$pass = "";
$db   = "ecommerce";

$conn = new mysqli($host, $user, $pass, $db);
if ($conn->connect_error) {
  die("Koneksi gagal: " . $conn->connect_error);
}

// ===== Ambil Data Users =====
$sql = "SELECT * FROM users ORDER BY user_id ASC";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Users | Stylezone Admin</title>
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap" rel="stylesheet">
  <style>
    /* ===== General Styles ===== */
    
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
  </style>
</head>
<body>

  <!-- ===== Sidebar ===== -->
  <div class="sidebar">
    <h2>STYLEZONE</h2>
    <a href="dashboard.php" class="nav-item">🏠 Dashboard</a>
    <a href="products.php" class="nav-item">🛍️ Products</a>
    <a href="users.php" class="nav-item active">👤 Users</a>
    <a href="orders.php" class="nav-item">📦 Orders</a>
    <a href="settings.php" class="nav-item">⚙️ Settings</a>
  </div>

  <!-- ===== Main Content ===== -->
  <div class="main">
    <div class="glass-box">
      <h1>Manage Users</h1>
      <button class="btn btn-add">+ Add User</button>

      <table>
        <thead>
          <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Email</th>
            <th>Role</th>
            <th>Actions</th>
          </tr>
        </thead>
        <tbody>
          <?php if ($result->num_rows > 0): ?>
            <?php while ($row = $result->fetch_assoc()): ?>
              <tr>
                <td><?= $row['user_id'] ?></td>
                <td><?= htmlspecialchars($row['name']) ?></td>
                <td><?= htmlspecialchars($row['email']) ?></td>
                <td><?= ucfirst($row['role']) ?></td>
                <td>
                  <div class="action-buttons">
                    <button class="btn btn-edit">Edit</button>
                    <button class="btn btn-delete">Delete</button>
                  </div>
                </td>
              </tr>
            <?php endwhile; ?>
          <?php else: ?>
            <tr>
              <td colspan="5" style="text-align:center;">No users found.</td>
            </tr>
          <?php endif; ?>
        </tbody>
      </table>
    </div>
  </div>

</body>
</html>

<?php $conn->close(); ?>
