<?php
include "admin_auth.php";
include "../PHP/config.php";

$id = intval($_GET['id']);
mysqli_query($conn, "DELETE FROM tours WHERE id=$id");

header("Location: manage_tours.php");
exit;
