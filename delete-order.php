<?php
session_start();
include 'db.php';

$user_id = $_SESSION['user_id'];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $order_id = $_POST['order_id'];
 
    $sql = "DELETE FROM orders WHERE id = '$order_id' AND user_id = '$user_id'";

    
    if (mysqli_query($conn, $sql)) {
        // Order deleted successfully
        header('Location: ' . $_SERVER['HTTP_REFERER']); 
        exit;
    } else {
        // Error deleting order
        echo "Error deleting order: " . mysqli_error($conn);
    }
}
?>
