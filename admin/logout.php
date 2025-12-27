<?php
session_start();

// Destroy all admin session data
session_unset();
session_destroy();

// Redirect ADMIN to MAIN HOME PAGE (index.php)
header("Location: ../index.php");
exit();
?>