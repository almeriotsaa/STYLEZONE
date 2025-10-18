<?php
// Gunakan connection.php yang sudah ada session configuration
include "../config/connection.php";

// Debug session
error_log("=== PAYMENT PROCESS START ===");
error_log("Session ID: " . session_id());
error_log("Session Data: " . print_r($_SESSION, true));

header('Content-Type: application/json');

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    http_response_code(405);
    echo json_encode(['success' => false, 'message' => 'Invalid request method']);
    exit;
}

// CEK SESSION USER - dengan handling yang lebih baik
// session_start();

if (!isset($_SESSION['user_id']) || empty($_SESSION['user_id'])) {
    error_log("USER NOT LOGGED IN - Session data: " . print_r($_SESSION, true));
    
    echo json_encode([
        'success' => false, 
        'message' => 'Please login to continue payment.'
    ]);
    exit;
}

$user_id = $_SESSION['user_id'];
error_log("Processing payment for user_id: " . $user_id);

// Dapatkan data payment
$input = file_get_contents('php://input');
error_log("Raw payment data: " . $input);

$data = json_decode($input, true);

if (!$data || !isset($data['cart_items']) || !isset($data['total_amount'])) {
    echo json_encode(['success' => false, 'message' => 'Invalid payment data']);
    exit;
}

// VALIDASI DATA
if (empty($data['cart_items'])) {
    echo json_encode(['success' => false, 'message' => 'Cart is empty']);
    exit;
}

// PROSES PEMBAYARAN KE DATABASE
try {
    mysqli_begin_transaction($conn);

    // 1. INSERT KE TABEL ORDERS
    $order_date = date('Y-m-d H:i:s');
    $address = "Jl. Merdeka No.123, Jakarta"; // Bisa diambil dari form jika ada
    $shipping = "JNE Regular";
    $total = floatval($data['total_amount']);
    $status = 'pending';

    $order_query = "INSERT INTO orders (user_id, order_date, address, shipping, total, status) 
                   VALUES (?, ?, ?, ?, ?, ?)";
    $order_stmt = mysqli_prepare($conn, $order_query);
    
    if (!$order_stmt) {
        throw new Exception('Failed to prepare order statement: ' . mysqli_error($conn));
    }
    
    mysqli_stmt_bind_param($order_stmt, 'isssds', $user_id, $order_date, $address, $shipping, $total, $status);
    
    if (!mysqli_stmt_execute($order_stmt)) {
        throw new Exception('Failed to create order: ' . mysqli_error($conn));
    }
    
    $order_id = mysqli_insert_id($conn);
    error_log("Order created with ID: " . $order_id);

    // 2. INSERT KE TABEL ORDER_ITEMS
    foreach ($data['cart_items'] as $item) {
        $product_id = intval($item['product_id']);
        $quantity = intval($item['quantity']);
        $price = floatval($item['price']);
        
        // Validasi item
        if ($product_id <= 0 || $quantity <= 0 || $price <= 0) {
            throw new Exception('Invalid item data: product_id=' . $product_id . ', quantity=' . $quantity . ', price=' . $price);
        }
        
        $order_item_query = "INSERT INTO order_items (order_id, product_id, quantity, price) 
                            VALUES (?, ?, ?, ?)";
        $order_item_stmt = mysqli_prepare($conn, $order_item_query);
        
        if (!$order_item_stmt) {
            throw new Exception('Failed to prepare order item statement: ' . mysqli_error($conn));
        }
        
        mysqli_stmt_bind_param($order_item_stmt, 'iiid', $order_id, $product_id, $quantity, $price);
        
        if (!mysqli_stmt_execute($order_item_stmt)) {
            throw new Exception('Failed to insert order item: ' . mysqli_error($conn));
        }
        
        mysqli_stmt_close($order_item_stmt);
    }

    // 3. INSERT KE TABEL PAYMENTS
    $payment_method = mysqli_real_escape_string($conn, $data['payment_method']);
    $payment_status = 'paid'; // Default status untuk pembayaran non-COD
    
    $payment_query = "INSERT INTO payments (order_id, payment_method, amount, payment_date, status) 
                     VALUES (?, ?, ?, ?, ?)";
    $payment_stmt = mysqli_prepare($conn, $payment_query);
    
    if (!$payment_stmt) {
        throw new Exception('Failed to prepare payment statement: ' . mysqli_error($conn));
    }
    
    mysqli_stmt_bind_param($payment_stmt, 'issss', $order_id, $payment_method, $total, $order_date, $payment_status);
    
    if (!mysqli_stmt_execute($payment_stmt)) {
        throw new Exception('Failed to create payment record: ' . mysqli_error($conn));
    }
    
    $payment_id = mysqli_insert_id($conn);
    error_log("Payment created with ID: " . $payment_id);

    // 4. INSERT KE TABEL PAYMENT_DETAILS
    $provider = getPaymentProvider($payment_method);
    $account_number = generateAccountNumber();
    $status_message = 'Pembayaran berhasil diproses';
    
    $payment_detail_query = "INSERT INTO payment_details (payment_id, provider, account_number, status_message, created_at) 
                            VALUES (?, ?, ?, ?, ?)";
    $payment_detail_stmt = mysqli_prepare($conn, $payment_detail_query);
    
    if (!$payment_detail_stmt) {
        throw new Exception('Failed to prepare payment detail statement: ' . mysqli_error($conn));
    }
    
    mysqli_stmt_bind_param($payment_detail_stmt, 'issss', $payment_id, $provider, $account_number, $status_message, $order_date);
    
    if (!mysqli_stmt_execute($payment_detail_stmt)) {
        throw new Exception('Failed to create payment detail: ' . mysqli_error($conn));
    }

    // Commit transaction
    mysqli_commit($conn);
    
    error_log("Payment process completed successfully for order: " . $order_id);
    
    echo json_encode([
        'success' => true, 
        'message' => 'Payment successful! Your order has been placed.', 
        'order_id' => $order_id,
        'payment_id' => $payment_id
    ]);

} catch (Exception $e) {
    // Rollback transaction jika ada error
    mysqli_rollback($conn);
    error_log("PAYMENT ERROR: " . $e->getMessage());
    
    echo json_encode([
        'success' => false, 
        'message' => 'Payment failed: ' . $e->getMessage()
    ]);
} finally {
    // Tutup koneksi
    if (isset($order_stmt)) mysqli_stmt_close($order_stmt);
    if (isset($payment_stmt)) mysqli_stmt_close($payment_stmt);
    if (isset($payment_detail_stmt)) mysqli_stmt_close($payment_detail_stmt);
}

// Helper functions
function getPaymentProvider($payment_method) {
    $providers = [
        'credit_card' => 'VISA/MasterCard',
        'bank_transfer' => 'BCA Virtual Account',
        'ewallet' => 'Gopay',
        'cod' => 'Cash on Delivery'
    ];
    return $providers[$payment_method] ?? 'Unknown Provider';
}

function generateAccountNumber() {
    return 'VA' . rand(1000000000, 9999999999);
}
?>