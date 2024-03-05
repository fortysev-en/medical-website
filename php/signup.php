<?php

include 'db_connect.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $firstname = $_POST['firstname'];
    $lastname = $_POST['lastname'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $address = $_POST['address'];
    
    $sql = "INSERT INTO users (firstname, lastname, email, password, address) VALUES ('$firstname', '$lastname', '$email', '$password', '$address')";
    if (mysqli_query($conn, $sql)) {
        $message = "Signed-up successfully!";
        echo $message;
        exit();
    } else {
        $message = "Error while submitting!";
        echo $message;
        exit();
    }
}
?>