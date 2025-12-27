<?php
session_start();
include 'config.php';

// -------- LOGIN CHECK --------
if (!isset($_SESSION['user_id'])) {
    echo "<script>
            alert('Please login first!');
            window.location.href='login.php';
          </script>";
    exit();
}

// -------- USER EXISTS OR NOT CHECK --------
$user_id = intval($_SESSION['user_id']);

$check_user = mysqli_query($conn, "SELECT id FROM users WHERE id = $user_id");

if (!$check_user || mysqli_num_rows($check_user) == 0) {
    echo "<script>
            alert('No account found! Please register first.');
            window.location.href='register.php';
          </script>";
    exit();
}

// -------- BOOKING PROCESS --------
if (isset($_GET['id'])) {

    $tour_id = intval($_GET['id']);

    // Prevent duplicate booking
    $check_booking = mysqli_query(
        $conn,
        "SELECT id FROM bookings WHERE user_id = $user_id AND tour_id = $tour_id"
    );

    if (mysqli_num_rows($check_booking) > 0) {
        echo "<script>
                alert('You have already booked this tour!');
                window.location.href='../index.php';
              </script>";
        exit();
    }

    // Insert booking
    $sql = "INSERT INTO bookings (user_id, tour_id) VALUES ($user_id, $tour_id)";

    if (mysqli_query($conn, $sql)) {
        echo "<script>
                alert('Booking successful!');
                window.location.href='../index.php';
              </script>";
    } else {
        echo "<script>
                alert('Booking failed: " . mysqli_error($conn) . "');
                window.location.href='../index.php';
              </script>";
    }
} else {

    echo "<script>
            alert('No tour selected!');
            window.location.href='../index.php';
          </script>";
}
?>