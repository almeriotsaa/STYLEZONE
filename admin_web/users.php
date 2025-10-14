<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Users | Stylezone Admin</title>
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

    /* ===== User Avatar ===== */
    .user-avatar {
      width: 45px;
      height: 45px;
      border-radius: 50%;
      object-fit: cover;
      border: 2px solid rgba(0,0,0,0.1);
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

    /* ===== Status Badge ===== */
    .status {
      display: inline-block;
      font-size: 13px;
      font-weight: 500;
      padding: 6px 10px;
      border-radius: 8px;
    }

    .status.active {
      background: rgba(76, 175, 80, 0.15);
      color: #2e7d32;
    }

    .status.inactive {
      background: rgba(244, 67, 54, 0.15);
      color: #c62828;
    }

    .status.pending {
      background: rgba(255, 193, 7, 0.15);
      color: #f57f17;
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
          <tr>
            <td>1</td>
            <td>Michael Santoso</td>
            <td>michael@example.com</td>
            <td>Admin</td>
            <td>
              <div class="action-buttons">
                <button class="btn btn-edit">Edit</button>
                <button class="btn btn-delete">Delete</button>
              </div>
            </td>
          </tr>
          <tr>
            <td>2</td>
            <td>Jessica Putri</td>
            <td>jessica@example.com</td>
            <td>Customer</td>
            <td>
              <div class="action-buttons">
                <button class="btn btn-edit">Edit</button>
                <button class="btn btn-delete">Delete</button>
              </div>
            </td>
          </tr>
          <tr>
            <td>3</td>
            <td>Andi Pratama</td>
            <td>andi@example.com</td>
            <td>Customer</td>
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
