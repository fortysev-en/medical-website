<?php

include 'db_connect.php';

if ($_SERVER["REQUEST_METHOD"] == "GET") {

    $email = $_GET['email'];
    
    $sql = "SELECT * FROM orders WHERE email='$email'";
    $result = mysqli_query($conn, $sql);
    if (mysqli_num_rows($result) > 0) {
        $orders = array();
        
        while($row = mysqli_fetch_assoc($result)) {
            $orders[] = $row;
        }
        $reversed_orders = array_reverse($orders);
        echo json_encode($reversed_orders);
    } else {
        $message = "Error while submitting!";
        echo $message;
        exit();
    }
}
?>
