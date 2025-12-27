<?php
include "admin_auth.php";
include "../PHP/config.php";

/* DELETE TOUR */
if(isset($_GET['delete'])){
    $id = intval($_GET['delete']);
    mysqli_query($conn,"DELETE FROM tours WHERE id=$id");
    header("Location: manage_tours.php");
    exit();
}

$tours = mysqli_query($conn,"SELECT * FROM tours ORDER BY id DESC");
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>Manage Tours | Admin</title>
<meta name="viewport" content="width=device-width, initial-scale=1">

<style>
*{
    margin:0;
    padding:0;
    box-sizing:border-box;
}

body{
    font-family:'Segoe UI',sans-serif;
    background:url('../Images/Udaipur.jpg') no-repeat center center fixed;
    background-size:cover;
    min-height:100vh;
    position:relative;
}

body::before{
    content:"";
    position:absolute;
    inset:0;
    background:rgba(0,0,0,0.65);
    z-index:0;
}

/* HEADER */
header{
    position:sticky;
    top:0;
    z-index:10;
    background:linear-gradient(135deg,#020617,#0f172a,#020617);
    padding:18px 0;
    text-align:center;
    box-shadow:0 10px 35px rgba(0,0,0,0.8);
    border-bottom:1px solid rgba(255,215,0,0.35);
}

header h1{
    color:#ffd700;
    font-size:28px;
    letter-spacing:2px;
    font-weight:800;
}

/* CONTAINER */
.container{
    position:relative;
    z-index:1;
    max-width:1250px;
    margin:50px auto;
    padding:30px;
    background:rgba(255,255,255,0.14);
    backdrop-filter:blur(14px);
    border-radius:20px;
    box-shadow:0 30px 65px rgba(0,0,0,0.6);
}

.container h2{
    text-align:center;
    color:#f8fafc;
    margin-bottom:25px;
    letter-spacing:1.5px;
}

/* ADD BUTTON */
a.add{
    display:inline-block;
    margin-bottom:18px;
    background:linear-gradient(135deg,#38bdf8,#0ea5e9);
    color:#020617;
    padding:12px 20px;
    border-radius:8px;
    text-decoration:none;
    font-weight:700;
    /* box-shadow:0 0 18px rgba(56,189,248,0.9); */
}

/* SEARCH */
.search-box{
    margin-bottom:25px;
}
.search-box input{
    width:100%;
    padding:14px 18px;
    border-radius:12px;
    border:none;
    font-size:15px;
    background:rgba(255,255,255,0.85);
}

/* TABLE */
table{
    width:100%;
    border-collapse:collapse;
}
th{
    background:linear-gradient(135deg,#020617,#0f172a);
    color:#ffd700;
    padding:16px;
}
td{
    padding:14px;
    color:#e5e7eb;
    border-bottom:1px solid rgba(255,255,255,0.15);
}
tr:hover{
    background:rgba(255,255,255,0.08);
}
img{
    width:90px;
    border-radius:10px;
}

/* DELETE */
a.delete{
    background:linear-gradient(135deg,#dc2626,#ef4444);
    color:white;
    padding:8px 14px;
    border-radius:8px;
    text-decoration:none;
    font-weight:700;
}

/* 🔥 BACK BUTTON CENTER FIX */
.back-wrapper{
    text-align:center;
    margin-top:30px;
}

.back-btn{
    display:inline-block;
    background:linear-gradient(135deg,#facc15,#f59e0b);
    color:#020617;
    padding:14px 26px;
    border-radius:8px;
    text-decoration:none;
    font-weight:800;
    letter-spacing:1px;
    /* box-shadow:0 0 22px rgba(250,204,21,0.9); */
}
</style>
</head>

<body>

<header>
    <h1>👑 Admin Panel – Manage Tours</h1>
</header>

<div class="container">
    <h2>📦 Tour Management</h2>

    <a href="add_tour.php" class="add">＋ Add New Tour</a>

    <div class="search-box">
        <input type="text" id="searchInput" placeholder="🔍 Search tour by name or price...">
    </div>

    <table id="tourTable">
        <tr>
            <th>ID</th>
            <th>Image</th>
            <th>Name</th>
            <th>Price</th>
            <th>Action</th>
        </tr>

        <?php while($row = mysqli_fetch_assoc($tours)){ ?>
        <tr>
            <td><?= $row['id']; ?></td>
            <td><img src="../Images/<?= $row['image']; ?>"></td>
            <td><?= $row['name']; ?></td>
            <td>₹<?= $row['price']; ?></td>
            <td>
                <a class="delete"
                   onclick="return confirm('Delete this tour?')"
                   href="manage_tours.php?delete=<?= $row['id']; ?>">
                   Delete
                </a>
            </td>
        </tr>
        <?php } ?>
    </table>

    <!-- ✅ CENTERED BACK BUTTON -->
    <div class="back-wrapper">
        <a href="dashboard.php" class="back-btn">⬅ Back to Dashboard</a>
    </div>
</div>

<script>
document.getElementById("searchInput").addEventListener("keyup", function(){
    let filter = this.value.toLowerCase();
    let rows = document.querySelectorAll("#tourTable tr");

    rows.forEach((row,index)=>{
        if(index===0) return;
        row.style.display = row.innerText.toLowerCase().includes(filter) ? "" : "none";
    });
});
</script>

</body>
</html>
