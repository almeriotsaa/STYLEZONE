<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Settings | Stylezone Admin</title>
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
            font-size: 24px;
            font-weight: 600;
            color: #ffffff;
            text-transform: uppercase;
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

        /* Main */
        .main {
            flex: 1;
            padding: 30px;
        }

        .glass-box {
            background: rgba(255, 255, 255, 0.2);
            backdrop-filter: blur(10px);
            border-radius: 20px;
            padding: 25px;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.05);
            border: 1px solid rgba(255, 255, 255, 0.3);
            margin-bottom: 25px;
        }

        h1 {
            font-size: 24px;
            margin-bottom: 25px;
            color: #222;
        }

        h2 {
            font-size: 18px;
            color: #333;
        }

        label {
            color: #333;
            font-size: 15px;
        }

        input,
        select {
            width: 100%;
            padding: 10px;
            margin-top: 6px;
            margin-bottom: 15px;
            border-radius: 8px;
            border: 1px solid #ccc;
            outline: none;
            font-size: 14px;
            transition: all 0.3s ease;
        }

        input:focus,
        select:focus {
            border-color: #000;
        }

        .form-section {
            margin-bottom: 35px;
        }

        .btn-save {
            background-color: #000;
            color: #fff;
            padding: 12px 20px;
            border: none;
            border-radius: 8px;
            cursor: pointer;
            font-size: 15px;
            transition: background 0.3s ease;
        }

        .btn-save:hover {
            background-color: #333;
        }

        .divider {
            height: 1px;
            background: rgba(0, 0, 0, 0.1);
            margin: 25px 0;
        }
    </style>
</head>

<body>

    <!-- Sidebar -->
    <div class="sidebar">
        <h2>STYLEZONE</h2>
        <a href="dashboard.php" class="nav-item">🏠 Dashboard</a>
        <a href="products.php" class="nav-item">🛍️ Products</a>
        <a href="users.php" class="nav-item">👤 Users</a>
        <a href="orders.php" class="nav-item">📦 Orders</a>
        <a href="settings.php" class="nav-item active">⚙️ Settings</a>
    </div>

    <!-- Main -->
    <div class="main">
        <div class="glass-box">
            <h1>Admin Settings</h1>

            <!-- Profile Settings -->
            <div class="form-section">
                <h2>👤 Profile Settings</h2>
                <form>
                    <label for="admin-name">Admin Name</label>
                    <input type="text" id="admin-name" placeholder="Enter your name">

                    <label for="admin-email">Email</label>
                    <input type="email" id="admin-email" placeholder="Enter your email">

                    <label for="admin-password">Password</label>
                    <input type="password" id="admin-password" placeholder="Enter new password">

                    <button type="submit" class="btn-save">Save Profile</button>
                </form>
            </div>

            <div class="divider"></div>

            <!-- Store Preferences -->
            <div class="form-section">
                <h2>🏬 Store Preferences</h2>
                <form>
                    <label for="store-name">Store Name</label>
                    <input type="text" id="store-name" placeholder="Stylezone">

                    <label for="currency">Currency</label>
                    <select id="currency">
                        <option>IDR (Rp)</option>
                        <option>USD ($)</option>
                        <option>EUR (€)</option>
                    </select>

                    <label for="timezone">Timezone</label>
                    <select id="timezone">
                        <option>Asia/Jakarta (GMT+7)</option>
                        <option>Asia/Singapore (GMT+8)</option>
                        <option>Europe/London (GMT+0)</option>
                    </select>

                    <button type="submit" class="btn-save">Save Preferences</button>
                </form>
            </div>

            <div class="divider"></div>

            <!-- Notification Settings -->
            <div class="form-section">
                <h2>🔔 Notification Settings</h2>
                <form>
                    <label for="notif">Email Notifications</label>
                    <select id="notif">
                        <option>Enabled</option>
                        <option>Disabled</option>
                    </select>

                    <label for="report">Weekly Sales Report</label>
                    <select id="report">
                        <option>Enabled</option>
                        <option>Disabled</option>
                    </select>

                    <button type="submit" class="btn-save">Save Notifications</button>
                </form>
            </div>

        </div>
    </div>

</body>

</html>