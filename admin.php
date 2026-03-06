<?php
session_start();
include "db.php";

if (isset($_POST['badd'])) {
    $name = $_POST['bname'];
    $price = $_POST['bprice'];
    $image = $_POST['bimage'];
    $sql = "INSERT INTO breakfast (item_name, price, image) VALUES ('$name', '$price', '$image')";
    $result = mysqli_query($conn, $sql);

    if (!$result) {
        die("Query Failed: " . mysqli_error($conn));
    } else {
        echo "<script>alert('Food item added successfully!');window.location.href = 'admindash.php'</script>;";
    }
}

if (isset($_POST['dadd'])) {
    $name = $_POST['dname'];
    $price = $_POST['dprice'];
    $image = $_POST['dimage'];
    $sql = "INSERT INTO dinner (item_name, price, image) VALUES ('$name', '$price', '$image')";
    $result = mysqli_query($conn, $sql);

    if (!$result) {
        die("Query Failed: " . mysqli_error($conn));
    } else {

        echo "<script>window.location.href = 'admindash.php'</script>;";
    }
}

if (isset($_POST['ladd'])) {
    $name = $_POST['lname'];
    $price = $_POST['lprice'];
    $image = $_POST['limage'];
    $sql = "INSERT INTO lunch (item_name, price, image) VALUES ('$name', '$price', '$image')";
    $result = mysqli_query($conn, $sql);

    if (!$result) {
        die("Query Failed: " . mysqli_error($conn));
    } else {

        echo "<script>window.location.href = 'admindash.php'</script>;";
    }
}

if (isset($_POST['deadd'])) {

    $name = $_POST['dename'];
    $price = $_POST['deprice'];
    $image = $_POST['deimage'];
    $sql = "INSERT INTO desserts (item_name, price, image) VALUES ('$name', '$price', '$image')";
    $result = mysqli_query($conn, $sql);

    if (!$result) {
        die("Query Failed: " . mysqli_error($conn));
    } else {

        echo "<script>window.location.href = 'admindash.php'</script>;";
    }
}
