<?php
include "admin_auth.php";
include "../PHP/config.php";

/* COUNTS */
$tours = mysqli_fetch_assoc(mysqli_query($conn, "SELECT COUNT(*) AS total FROM tours"));
$bookings = mysqli_fetch_assoc(mysqli_query($conn, "SELECT COUNT(*) AS total FROM bookings"));
$users = mysqli_fetch_assoc(mysqli_query($conn, "SELECT COUNT(*) AS total FROM users"));
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>Admin Dashboard</title>
<meta name="viewport" content="width=device-width, initial-scale=1">

<style>
/* ===== RESET ===== */
*{
    margin:0;
    padding:0;
    box-sizing:border-box;
}

/* ===== BODY ===== */
body{
    font-family:'Segoe UI',sans-serif;
    background:url('../Images/Udaipur.jpg') no-repeat center center/cover;
    background-size:cover;
    min-height:100vh;
    position:relative;
}

/* DARK OVERLAY */
body::before{
    content:"";
    position:absolute;
    inset:0;
    background:rgba(0,0,0,0.65);
    z-index:0;
}

/* ===== HEADER ===== */
header{
    position:sticky;
    top:0;
    z-index:10;
    background:linear-gradient(135deg,#020617,#0f172a,#020617);
    padding:20px 0;
    text-align:center;
    box-shadow:0 10px 35px rgba(0,0,0,0.85);
    border-bottom:1px solid rgba(255,215,0,0.35);
}

header h1{
    color:#ffd700;
    font-size:30px;
    letter-spacing:2px;
    font-weight:800;
}

/* ===== CONTAINER ===== */
.container{
    position:relative;
    z-index:1;
    max-width:1200px;
    margin:60px auto;
    padding:35px;
    background:rgba(0,0,0,0.68);
    backdrop-filter:blur(10px);
    border-radius:22px;
    box-shadow:0 35px 70px rgba(0,0,0,0.65);
}

/* ===== CARDS ===== */
.cards{
    display:grid;
    grid-template-columns:repeat(auto-fit,minmax(260px,1fr));
    gap:25px;
    margin-bottom:40px;
}

.card{
    background:rgba(0,0,0,0.68);
    padding:35px 25px;
    border-radius:22px;
    text-align:center;
    border:1px solid rgba(255,215,0,0.25);
}

.card h2{
    margin:0;
    font-size:42px;
    color:#ffd700;
    font-weight:900;
}

.card p{
    margin-top:12px;
    color:#e5e7eb;
    font-size:16px;
    letter-spacing:0.8px;
}

/* ===== LINKS ===== */
.links{
    text-align:center;
}

.links a{
    display:inline-block;
    margin:10px 12px;
    padding:14px 26px;
    background:linear-gradient(135deg,#facc15,#f59e0b);
    color:#020617;
    text-decoration:none;
    font-weight:800;
    letter-spacing:1px;
    border-radius:8px;
    transition:0.3s ease;
}

.links a:hover{
    transform:translateY(-3px);
}

/* LOGOUT SPECIAL */
.links a:last-child{
    background:linear-gradient(135deg,#dc2626,#ef4444);
    color:#fff;
}

/* ===== RESPONSIVE ===== */
@media(max-width:900px){
    header h1{font-size:24px;}
    .card h2{font-size:34px;}
}
</style>
</head>

<body>

<header>
    <h1>👑 Admin Dashboard</h1>
</header>

<div class="container">

    <div class="cards">

        <div class="card">
            <h2><?= $tours['total']; ?></h2>
            <p>Total Tours</p>
        </div>

        <div class="card">
            <h2><?= $bookings['total']; ?></h2>
            <p>Total Bookings</p>
        </div>

        <div class="card">
            <h2><?= $users['total']; ?></h2>
            <p>Total Users</p>
        </div>

    </div>

    <div class="links">
        <a href="manage_tours.php">Manage Tours</a>
        <a href="bookings.php">View Bookings</a>
        <a href="users.php">Users</a>
        <a href="logout.php">Logout</a>
    </div>

</div>

</body>
</html>
