<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Dashboard | Stylezone Admin</title>
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap" rel="stylesheet">
  <style>
    body {
      font-family: 'Poppins', sans-serif;
      background: #f4f5f7;
      margin: 0;
      padding: 0;
      display: flex;
    }

    /* Sidebar */
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

    .nav-item.active, .nav-item:hover {
      background: rgba(255,255,255,0.1);
      color: #fff;
    }

    /* Main Content */
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
      margin-bottom: 25px;
    }

    h1 {
      font-size: 24px;
      margin-bottom: 25px;
      color: #222;
    }

    /* Cards */
    .card-container {
      display: flex;
      gap: 20px;
      flex-wrap: wrap;
      margin-bottom: 30px;
    }

    .card {
      flex: 1;
      min-width: 250px;
      background: rgba(255, 255, 255, 0.2);
      border-radius: 20px;
      padding: 20px;
      backdrop-filter: blur(10px);
      border: 1px solid rgba(255,255,255,0.3);
      text-align: center;
      box-shadow: 0 4px 20px rgba(0,0,0,0.05);
    }

    .card h2 {
      font-size: 16px;
      color: #555;
      margin-bottom: 10px;
    }

    .card p {
      font-size: 28px;
      font-weight: 600;
      color: #111;
    }

    /* Table */
    table {
      width: 100%;
      border-collapse: collapse;
    }

    th, td {
      padding: 12px 15px;
      text-align: left;
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

    .status {
      padding: 6px 12px;
      border-radius: 12px;
      font-size: 13px;
      text-transform: capitalize;
    }

    .status.completed {
      background: rgba(46, 204, 113, 0.2);
      color: #27ae60;
    }

    .status.pending {
      background: rgba(241, 196, 15, 0.2);
      color: #f39c12;
    }

  </style>
</head>
<body>

  <!-- Sidebar -->
  <div class="sidebar">
    <h2>STYLEZONE</h2>
    <a href="dashboard.php" class="nav-item active">🏠 Dashboard</a>
    <a href="products.php" class="nav-item">🛍️ Products</a>
    <a href="users.php" class="nav-item">👤 Users</a>
    <a href="orders.php" class="nav-item">📦 Orders</a>
    <a href="settings.php" class="nav-item">⚙️ Settings</a>
  </div>

  <!-- Main -->
  <div class="main">
    <div class="glass-box">
      <h1>Dashboard Overview</h1>

      <div class="card-container">
        <div class="card">
          <h2>Total Products</h2>
          <p>8</p>
        </div>
        <div class="card">
          <h2>Users</h2>
          <p>2</p>
        </div>
        <div class="card">
          <h2>Total Orders</h2>
          <p>2</p>
        </div>
      </div>

      <h1>Recent Orders</h1>
      <table>
        <thead>
          <tr>
            <th>Order ID</th>
            <th>Customer</th>
            <th>Date</th>
            <th>Total</th>
            <th>Status</th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <td>#12345</td>
            <td>John Doe</td>
            <td>Oct 13, 2025</td>
            <td>199.000 IDR</td>
            <td><span class="status completed">completed</span></td>
          </tr>
          <tr>
            <td>#12346</td>
            <td>Jane Smith</td>
            <td>Oct 12, 2025</td>
            <td>199.000 IDR</td>
            <td><span class="status pending">pending</span></td>
          </tr>
        </tbody>
      </table>
    </div>
  </div>

</body>
</html>
