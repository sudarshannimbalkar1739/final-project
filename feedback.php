<?php
session_start();
include 'db.php';

if (!isset($_SESSION['users_id'])) {
    die("<script>alert('Login first');window.location='index.php';</script>");
}

$user_id = $_SESSION['users_id'];

/* Get user details */
$userQuery = mysqli_query($conn, "SELECT * FROM users WHERE users_id='$user_id'");
$user = mysqli_fetch_assoc($userQuery);

$username = $user['username'];
$email    = $user['email'];
$rating  = $_POST['rating'];
$message = $_POST['message'];

if (empty($rating) || empty($message)) {
    die("All fields are required");
}

/* Insert Feedback */
$sql = "INSERT INTO feedback (users_id, username, email, rating, message)
        VALUES ('$user_id', '$username', '$email', '$rating', '$message')";

if (mysqli_query($conn, $sql)) {
    echo "<script>alert('Thank you for your feedback!');window.location='index.php';</script>";
} else {
    echo "Error: " . mysqli_error($conn);
}
