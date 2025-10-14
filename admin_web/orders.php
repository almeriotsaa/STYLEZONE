<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Orders | Stylezone Admin</title>
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
      height: 100vh;
      padding: 30px 20px;
      box-sizing: border-box;
      position: fixed;
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

    /* Main */
    .main {
      flex: 1;
      padding: 30px;
      margin-left: 260px;
      width: calc(100% - 260px);
    }

    .glass-box {
      background: rgba(255,255,255,0.2);
      backdrop-filter: blur(10px);
      border-radius: 20px;
      padding: 25px;
      box-shadow: 0 4px 20px rgba(0,0,0,0.05);
      border: 1px solid rgba(255,255,255,0.3);
    }

    h1 {
      font-size: 24px;
      color: #222;
      margin-bottom: 20px;
    }

    /* Table */
    table {
      width: 100%;
      border-collapse: collapse;
      margin-top: 20px;
    }

    th, td {
      padding: 12px 15px;
      text-align: left;
    }

    th {
      background: rgba(255,255,255,0.15);
      color: #333;
    }

    tr {
      border-bottom: 1px solid rgba(0,0,0,0.05);
    }

    tr:hover {
      background: rgba(255,255,255,0.25);
    }

    /* Buttons */
    .btn {
      padding: 8px 14px;
      border: none;
      border-radius: 8px;
      cursor: pointer;
      font-weight: 500;
      transition: 0.2s;
    }

    .btn-view {
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

    /* ===== Modal (Order Detail) ===== */
    .modal {
      display: none;
      position: fixed;
      z-index: 1000;
      left: 0;
      top: 0;
      width: 100%;
      height: 100%;
      background: rgba(0,0,0,0.5);
      backdrop-filter: blur(3px);
      justify-content: center;
      align-items: center;
    }

    .modal-content {
      background: white;
      backdrop-filter: blur(15px);
      border-radius: 20px;
      padding: 30px;
      width: 500px;
      color: #222;
      position: relative;
      box-shadow: 0 4px 30px rgba(0,0,0,0.3);
      max-height: 80vh;
      overflow-y: auto;
    }

    .modal h2 {
      margin-top: 0;
      color: #000;
      border-bottom: 2px solid rgba(0,0,0,0.1);
      padding-bottom: 10px;
    }

    .modal p {
      margin: 8px 0;
      font-size: 15px;
      color: #222;
    }

    .close-btn {
      position: absolute;
      top: 15px;
      right: 20px;
      background: none;
      border: none;
      font-size: 22px;
      cursor: pointer;
      color: #111;
      transition: 0.2s;
    }

    .close-btn:hover {
      color: #f44336;
    }

    .status {
      display: inline-block;
      padding: 6px 12px;
      border-radius: 8px;
      font-weight: 600;
      font-size: 13px;
    }

    .status.completed { background: #c8e6c9; color: #2e7d32; }
    .status.pending { background: #fff3cd; color: #856404; }
    .status.cancelled { background: #f8d7da; color: #721c24; }
    .status.processing { background: #cce7ff; color: #0066cc; }

    /* Order Items Table in Modal */
    .order-items-table {
      width: 100%;
      margin: 10px 0;
      border-collapse: collapse;
    }
    
    .order-items-table th, 
    .order-items-table td {
      padding: 8px;
      text-align: left;
      border-bottom: 1px solid #eee;
    }
    
    .order-items-table th {
      background-color: #f5f5f5;
    }
    
    .order-items-table tr:last-child td {
      border-bottom: none;
    }
    
    .order-items-table .total-row {
      font-weight: bold;
      background-color: #f9f9f9;
    }

    /* Search and Filter */
    .search-filter {
      display: flex;
      gap: 15px;
      margin-bottom: 20px;
      flex-wrap: wrap;
    }
    
    .search-box, .filter-select {
      padding: 10px 15px;
      border-radius: 8px;
      border: 1px solid #ddd;
      background: white;
    }
    
    .search-box {
      flex: 1;
      min-width: 250px;
    }
    
    .filter-select {
      min-width: 150px;
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
    <a href="orders.php" class="nav-item active">📦 Orders</a>
    <a href="settings.php" class="nav-item">⚙️ Settings</a>
  </div>

  <!-- Main -->
  <div class="main">
    <div class="glass-box">
      <h1>Manage Orders</h1>
      
      <!-- Search and Filter -->
      <div class="search-filter">
        <input type="text" class="search-box" placeholder="Search orders..." id="searchInput">
        <select class="filter-select" id="statusFilter">
          <option value="">All Statuses</option>
          <option value="completed">Completed</option>
          <option value="pending">Pending</option>
          <option value="processing">Processing</option>
          <option value="cancelled">Cancelled</option>
        </select>
      </div>

      <table id="ordersTable">
        <thead>
          <tr>
            <th>Order ID</th>
            <th>Customer</th>
            <th>Order Time</th>
            <th>Price</th>
            <th>Status</th>
            <th>Action</th>
          </tr>
        </thead>

        <tbody id="ordersTableBody">
          <!-- Orders will be populated by JavaScript -->
        </tbody>
      </table>
    </div>
  </div>

  <!-- Modal -->
  <div class="modal" id="orderModal">
    <div class="modal-content">
      <button class="close-btn" onclick="closeModal()">×</button>
      <div id="modalContent">
        <!-- Modal content will be populated by JavaScript -->
      </div>
    </div>
  </div>

  <script>
    // Sample order data - in a real application, this would come from a database
    const orders = [
      {
        id: "#ORD-00123",
        customer: "Michael Santoso",
        orderTime: "2025-10-12 14:30",
        price: "Rp 450.000",
        status: "completed",
        items: [
          { name: "Oversized Tee", size: "M", quantity: 1, price: 199000 },
          { name: "Cargo Pants", size: "L", quantity: 1, price: 251000 }
        ],
        shippingAddress: "Jl. Merdeka No. 45, Bandung",
        paymentMethod: "Credit Card",
        shippingMethod: "JNE Express"
      },
      {
        id: "#ORD-00124",
        customer: "Sarah Johnson",
        orderTime: "2025-10-13 09:15",
        price: "Rp 320.000",
        status: "pending",
        items: [
          { name: "Summer Dress", size: "S", quantity: 1, price: 320000 }
        ],
        shippingAddress: "Jl. Sudirman No. 123, Jakarta",
        paymentMethod: "Bank Transfer",
        shippingMethod: "J&T Express"
      },
      {
        id: "#ORD-00125",
        customer: "David Wilson",
        orderTime: "2025-10-11 16:45",
        price: "Rp 575.000",
        status: "processing",
        items: [
          { name: "Denim Jacket", size: "L", quantity: 1, price: 350000 },
          { name: "Slim Fit Jeans", size: "32", quantity: 1, price: 225000 }
        ],
        shippingAddress: "Jl. Asia Afrika No. 67, Bandung",
        paymentMethod: "Credit Card",
        shippingMethod: "JNE Express"
      }
    ];

    // Populate the orders table
    function populateOrdersTable(ordersToShow = orders) {
      const tableBody = document.getElementById('ordersTableBody');
      tableBody.innerHTML = '';
      
      ordersToShow.forEach(order => {
        const row = document.createElement('tr');
        row.innerHTML = `
          <td>${order.id}</td>
          <td>${order.customer}</td>
          <td>${order.orderTime}</td>
          <td>${order.price}</td>
          <td><span class="status ${order.status}">${order.status.charAt(0).toUpperCase() + order.status.slice(1)}</span></td>
          <td>
            <button class="btn btn-view" onclick="openModal('${order.id}')">View</button>
            <button class="btn btn-delete" onclick="deleteOrder('${order.id}')">Delete</button>
          </td>
        `;
        tableBody.appendChild(row);
      });
    }

    // Open modal with order details
    function openModal(orderId) {
      const order = orders.find(o => o.id === orderId);
      if (!order) return;
      
      const modalContent = document.getElementById('modalContent');
      
      // Calculate total price from items
      const totalPrice = order.items.reduce((sum, item) => sum + (item.price * item.quantity), 0);
      const formattedTotalPrice = new Intl.NumberFormat('id-ID', {
        style: 'currency',
        currency: 'IDR',
        minimumFractionDigits: 0
      }).format(totalPrice);
      
      let itemsHTML = `
        <table class="order-items-table">
          <thead>
            <tr>
              <th>Product</th>
              <th>Size</th>
              <th>Qty</th>
              <th>Price</th>
              <th>Subtotal</th>
            </tr>
          </thead>
          <tbody>
      `;
      
      order.items.forEach(item => {
        const subtotal = item.price * item.quantity;
        const formattedSubtotal = new Intl.NumberFormat('id-ID', {
          style: 'currency',
          currency: 'IDR',
          minimumFractionDigits: 0
        }).format(subtotal);
        
        const formattedPrice = new Intl.NumberFormat('id-ID', {
          style: 'currency',
          currency: 'IDR',
          minimumFractionDigits: 0
        }).format(item.price);
        
        itemsHTML += `
          <tr>
            <td>${item.name}</td>
            <td>${item.size}</td>
            <td>${item.quantity}</td>
            <td>${formattedPrice}</td>
            <td>${formattedSubtotal}</td>
          </tr>
        `;
      });
      
      itemsHTML += `
          <tr class="total-row">
            <td colspan="4" style="text-align: right;">Total:</td>
            <td>${formattedTotalPrice}</td>
          </tr>
        </tbody>
      </table>
      `;
      
      modalContent.innerHTML = `
        <h2>Order Details — ${order.id}</h2>
        <p><strong>Customer:</strong> ${order.customer}</p>
        <p><strong>Order Time:</strong> ${order.orderTime}</p>
        <p><strong>Total Price:</strong> ${formattedTotalPrice}</p>
        <p><strong>Status:</strong> <span class="status ${order.status}">${order.status.charAt(0).toUpperCase() + order.status.slice(1)}</span></p>
        <hr>
        <p><strong>Items:</strong></p>
        ${itemsHTML}
        <p><strong>Shipping Address:</strong> ${order.shippingAddress}</p>
        <p><strong>Payment Method:</strong> ${order.paymentMethod}</p>
        <p><strong>Shipping Method:</strong> ${order.shippingMethod}</p>
      `;
      
      document.getElementById("orderModal").style.display = "flex";
    }

    // Close modal
    function closeModal() {
      document.getElementById("orderModal").style.display = "none";
    }

    // Delete order
    function deleteOrder(orderId) {
      if (confirm(`Are you sure you want to delete order ${orderId}?`)) {
        // In a real application, you would send a request to the server here
        const index = orders.findIndex(o => o.id === orderId);
        if (index !== -1) {
          orders.splice(index, 1);
          populateOrdersTable();
          alert(`Order ${orderId} has been deleted.`);
        }
      }
    }

    // Search and filter functionality
    function filterOrders() {
      const searchTerm = document.getElementById('searchInput').value.toLowerCase();
      const statusFilter = document.getElementById('statusFilter').value;
      
      const filteredOrders = orders.filter(order => {
        const matchesSearch = order.id.toLowerCase().includes(searchTerm) || 
                             order.customer.toLowerCase().includes(searchTerm);
        const matchesStatus = statusFilter === '' || order.status === statusFilter;
        
        return matchesSearch && matchesStatus;
      });
      
      populateOrdersTable(filteredOrders);
    }

    // Initialize the page
    document.addEventListener('DOMContentLoaded', function() {
      populateOrdersTable();
      
      // Add event listeners for search and filter
      document.getElementById('searchInput').addEventListener('input', filterOrders);
      document.getElementById('statusFilter').addEventListener('change', filterOrders);
    });

    // Close modal if clicked outside
    window.onclick = function(event) {
      const modal = document.getElementById("orderModal");
      if (event.target === modal) {
        closeModal();
      }
    }
  </script>
</body>
</html>