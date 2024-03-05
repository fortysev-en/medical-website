<?php

include 'db_connect.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $email = $_POST['email'];
    $order_name = $_POST['order_name'];
    $amount = $_POST['amount'];

    if (isset($_POST['order_datetime'])) {
        $order_datetime = $_POST['order_datetime'];
    } else {
        $order_datetime = NULL;
    }
    
    $sql = "INSERT INTO orders (email, order_name, amount, order_datetime) VALUES ('$email', '$order_name', '$amount', '$order_datetime')";
    if (mysqli_query($conn, $sql)) {
        $message = "Order placed successfully!";
        echo $message;
        exit();
    } else {
        $message = "Error while submitting!";
        echo $message;
        exit();
    }
}
?>
