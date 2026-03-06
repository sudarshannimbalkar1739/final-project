
<?php
session_start();
include "db.php";

if (isset($_POST['adlogin'])) {

    $email = $_POST['ademail'];
    $password = $_POST['adpassword'];

    $sql = "SELECT * FROM admin WHERE ademail='$email' AND password='$password'";
    $result = mysqli_query($conn, $sql);

    if (!$result) {
        die("Query Failed: " . mysqli_error($conn));
    }

    if (mysqli_num_rows($result) == 1) {
        $row = mysqli_fetch_assoc($result);
        $_SESSION['username'] = $row['adusername'];
        header("Location: admindash.php");
        exit();
    }
    echo "<script>window.alert('Enter correct admin details');</script>";
    echo "<script>window.location.href = 'index.php'</script>;";
}
?>