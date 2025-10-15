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
      position: relative;
    }

    .sidebar h2 {
      margin-bottom: 40px;
      font-weight: 700;
      display: flex;
      justify-content: space-between;
      align-items: center;
    }

    .logout-btn {
      background: rgba(255, 255, 255, 0.1);
      border: none;
      color: #fff;
      border-radius: 8px;
      padding: 8px 12px;
      cursor: pointer;
      display: flex;
      align-items: center;
      gap: 6px;
      transition: all 0.3s ease;
      font-size: 14px;
    }

    .logout-btn:hover {
      background: rgba(255, 255, 255, 0.2);
      transform: translateY(-2px);
    }

    .logout-btn:active {
      transform: translateY(0);
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
    <h2>STYLEZONE
      <button class="logout-btn" onclick="logout()">
        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" viewBox="0 0 16 16">
          <path fill-rule="evenodd" d="M10 12.5a.5.5 0 0 1-.5.5h-8a.5.5 0 0 1-.5-.5v-9a.5.5 0 0 1 .5-.5h8a.5.5 0 0 1 .5.5v2a.5.5 0 0 0 1 0v-2A1.5 1.5 0 0 0 9.5 2h-8A1.5 1.5 0 0 0 0 3.5v9A1.5 1.5 0 0 0 1.5 14h8a1.5 1.5 0 0 0 1.5-1.5v-2a.5.5 0 0 0-1 0v2z"/>
          <path fill-rule="evenodd" d="M15.854 8.354a.5.5 0 0 0 0-.708l-3-3a.5.5 0 0 0-.708.708L14.293 7.5H5a.5.5 0 0 0 0 1h9.293l-2.147 2.146a.5.5 0 0 0 .708.708l3-3z"/>
        </svg>
        Logout
      </button>
    </h2>
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

  <script>
    function logout() {
      // Tambahkan logika logout di sini
      if (confirm('Are you sure you want to log out?')) {
        // Redirect ke halaman login atau lakukan proses logout
        window.location.href = '../logout.php';
      }
    }
  </script>

</body>
</html>