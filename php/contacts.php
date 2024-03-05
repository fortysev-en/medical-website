<?php

include 'db_connect.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $message = $_POST['message'];
    
    $sql = "INSERT INTO contacts (name, email, phone, message) VALUES ('$name', '$email', '$phone', '$message')";
    if (mysqli_query($conn, $sql)) {
        $message = "Form submitted successfully!";
        echo $message;
        exit();
    } else {
        $message = "Error while submitting!";
        echo $message;
        exit();
    }
}
?>
