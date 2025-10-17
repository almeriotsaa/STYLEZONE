<?php
session_start();
include "./config/connection.php";

if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}

$order_id = $_GET['order_id'] ?? 0;
$user_id = $_SESSION['user_id'];

// Ambil data order
$order_query = "SELECT o.*, p.method, p.status as payment_status, p.amount 
                FROM orders o 
                LEFT JOIN payments p ON o.order_id = p.order_id 
                WHERE o.order_id = ? AND o.user_id = ?";
$stmt = mysqli_prepare($conn, $order_query);
mysqli_stmt_bind_param($stmt, "ii", $order_id, $user_id);
mysqli_stmt_execute($stmt);
$order_result = mysqli_stmt_get_result($stmt);
$order = mysqli_fetch_assoc($order_result);

if (!$order) {
    die("Order not found");
}

// Ambil items order
$items_query = "SELECT oi.*, p.name, p.price, p.image 
                FROM order_items oi 
                LEFT JOIN products p ON oi.product_id = p.id 
                WHERE oi.order_id = ?";
$stmt_items = mysqli_prepare($conn, $items_query);
mysqli_stmt_bind_param($stmt_items, "i", $order_id);
mysqli_stmt_execute($stmt_items);
$items_result = mysqli_stmt_get_result($stmt_items);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Order Success - STYLEZONE</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css">
</head>
<body>
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card shadow border-0">
                    <div class="card-body p-5">
                        <div class="text-center mb-4">
                            <div class="text-success mb-3">
                                <i class="bi bi-check-circle-fill" style="font-size: 4rem;"></i>
                            </div>
                            <h2 class="card-title fw-bold">Order Successful!</h2>
                            <p class="text-muted">Thank you for your purchase. Your order has been received.</p>
                        </div>
                        
                        <!-- Order Details -->
                        <div class="order-details mb-4 p-4 bg-light rounded">
                            <h5 class="fw-bold mb-3">Order Details</h5>
                            <div class="row">
                                <div class="col-md-6">
                                    <p><strong>Order ID:</strong> #<?php echo $order['order_id']; ?></p>
                                    <p><strong>Order Date:</strong> <?php echo date('F j, Y', strtotime($order['order_date'])); ?></p>
                                    <p><strong>Payment Method:</strong> <?php echo strtoupper(str_replace('_', ' ', $order['method'])); ?></p>
                                </div>
                                <div class="col-md-6">
                                    <p><strong>Total Amount:</strong> Rp <?php echo number_format($order['amount'], 0, ',', '.'); ?></p>
                                    <p><strong>Shipping Cost:</strong> Rp <?php echo number_format($order['shipping'], 0, ',', '.'); ?></p>
                                    <p><strong>Status:</strong> 
                                        <span class="badge bg-<?php echo $order['payment_status'] == 'paid' ? 'success' : 'warning'; ?>">
                                            <?php echo ucfirst($order['payment_status']); ?>
                                        </span>
                                    </p>
                                </div>
                            </div>
                            
                            <!-- Order Items -->
                            <div class="mt-4">
                                <h6 class="fw-bold">Order Items:</h6>
                                <?php while($item = mysqli_fetch_assoc($items_result)): ?>
                                    <div class="d-flex justify-content-between align-items-center border-bottom py-2">
                                        <div>
                                            <span class="fw-medium"><?php echo $item['name']; ?></span>
                                            <small class="text-muted d-block">Qty: <?php echo $item['quantity']; ?> × Rp <?php echo number_format($item['price'], 0, ',', '.'); ?></small>
                                        </div>
                                        <div class="fw-bold">
                                            Rp <?php echo number_format($item['price'] * $item['quantity'], 0, ',', '.'); ?>
                                        </div>
                                    </div>
                                <?php endwhile; ?>
                            </div>
                        </div>
                        
                        <div class="text-center">
                            <a href="index.php" class="btn btn-primary btn-lg px-4 me-2">
                                <i class="bi bi-house me-2"></i>Continue Shopping
                            </a>
                            <a href="profile.php?tab=orders" class="btn btn-outline-secondary btn-lg px-4">
                                <i class="bi bi-list-ul me-2"></i>View My Orders
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>