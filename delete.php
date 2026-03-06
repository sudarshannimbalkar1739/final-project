<?php
include 'db.php';

if (isset($_SESSION['email'])) {
    $email = $_SESSION['email'];
    $query = "SELECT * FROM admin";
    $admin = mysqli_query($conn, $query);
}

if ($admin['admin_id']) {
    if (isset($_POST['submit'])) {
        $table = $_POST['table_nm'];
        $col_nm = $_POST['col_nm'];
        $id = $_POST['id'];

        if (empty($table) || empty($col_nm) || empty($id)) {
            echo "<script>alert('Invalid request');window.location='admindash.php';</script>";
            exit;
        }

        $sql = "DELETE FROM `$table` WHERE $col_nm = '$id'";
        mysqli_query($conn, $sql);
        echo "<script>alert('Item deleted successfully');window.location='admindash.php';</script>";
    }
    if (!$sql) {
        echo "<script>alert('Error deleting item');window.location='admindash.php';</script>";
        die("Query Failed: " . mysqli_error($conn));
    }
} else {
    if (isset($_POST['submit'])) {
        $table = $_POST['table_nm'];
        $col_nm = $_POST['col_nm'];
        $id = $_POST['id'];

        if (empty($table) || empty($col_nm) || empty($id)) {
            echo "<script>alert('Invalid request');window.location='index.php';</script>";
            exit;
        }

        $sql = "DELETE FROM `$table` WHERE $col_nm = '$id'";
        mysqli_query($conn, $sql);
        echo "<script>alert('Item deleted successfully');window.location='index.php';</script>";
    }
    if (!$sql) {
        echo "<script>alert('Error deleting item');window.location='index.php';</script>";
        die("Query Failed: " . mysqli_error($conn));
    }
}
