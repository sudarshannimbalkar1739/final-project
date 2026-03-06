<?php
session_start();
error_reporting(E_ALL);
ini_set('display_errors', 1);
include 'db.php';

if (!isset($_SESSION['users_id'])) {
    echo "<script>alert('Please login to place an order');window.location='index.php';</script>";
    exit;
}

$user_id = $_SESSION['users_id'];

/* Get user details */
$userQuery = mysqli_query($conn, "SELECT * FROM users WHERE users_id='$user_id'");
$user = mysqli_fetch_assoc($userQuery);

$username = $user['username'];
$email    = $user['email'];
$phone    = $user['phone'];
$address  = $user['address'];

$cartData = $_POST['cartData'];

if (empty($cartData)) {
    die("Cart is empty");
}

$items = explode(",", $cartData);

foreach ($items as $item) {

    list($name, $price, $qty) = explode("|", $item);

    $sql = "INSERT INTO orders 
            (users_id, username, email, phone, address, food_name, price, quantity)
            VALUES 
            ('$user_id', '$username', '$email', '$phone', '$address',
             '$name', '$price', '$qty')";

    if (!mysqli_query($conn, $sql)) {
        die("Order Failed: " . mysqli_error($conn));
    }
}

echo "<script>alert('Order placed successfully!');window.location.href='index.php';</script>";
