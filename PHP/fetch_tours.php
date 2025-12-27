<?php
include 'config.php';

$sql = "SELECT * FROM tours";
$result = mysqli_query($conn, $sql);

$tours = [];
while ($row = mysqli_fetch_assoc($result)) {
    $tours[] = $row;
}

header('Content-Type: application/json');
echo json_encode($tours);
?>