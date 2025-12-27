<?php
session_start();
include 'config.php';

// -------- Login Check --------
if (!isset($_SESSION['user_id'])) {
    echo "<script>alert('Please login first!'); window.location.href='login.php';</script>";
    exit();
}

$user_id = intval($_SESSION['user_id']);

// -------- Check if form is submitted --------
if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    $tour_id = intval($_POST['tour_id']);
    $name    = mysqli_real_escape_string($conn, $_POST['name']);
    $email   = mysqli_real_escape_string($conn, $_POST['email']);
    $phone   = mysqli_real_escape_string($conn, $_POST['phone']);
    $members = intval($_POST['members']);
    $address = mysqli_real_escape_string($conn, $_POST['address']);

    // -------- Prevent Duplicate Booking --------
    $check = mysqli_query($conn, "SELECT * FROM bookings WHERE user_id=$user_id AND tour_id=$tour_id");

    if (mysqli_num_rows($check) > 0) {
        echo "<script>alert('You have already booked this tour!'); window.location.href='../index.php';</script>";
        exit();
    }

    // -------- Insert Booking --------
    $sql = "INSERT INTO bookings (user_id, tour_id, name, email, phone, members, address)
            VALUES ($user_id, $tour_id, '$name', '$email', '$phone', $members, '$address')";

    if (mysqli_query($conn, $sql)) {
        echo "<script>alert('Booking Successful!'); window.location.href='../index.php';</script>";
    } else {
        echo "<script>alert('Booking Failed: " . mysqli_error($conn) . "'); window.location.href='../index.php';</script>";
    }
} else {
    echo "<script>alert('Invalid Request'); window.location.href='../index.php';</script>";
    exit();
}
?>