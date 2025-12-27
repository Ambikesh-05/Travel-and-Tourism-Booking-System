<?php
include 'admin_auth.php';
include '../PHP/config.php';

$q = mysqli_query($conn, "SELECT * FROM users");
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>All Users | Admin</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <style>
        /* ===== RESET ===== */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        /* ===== BODY ===== */
        body {
            font-family: 'Segoe UI', sans-serif;
            background: url('../Images/Udaipur.jpg') no-repeat center center fixed;
            background-size: cover;
            min-height: 100vh;
            position: relative;
        }

        /* DARK OVERLAY */
        body::before {
            content: "";
            position: absolute;
            inset: 0;
            background: rgba(0, 0, 0, 0.65);
            z-index: 0;
        }

        /* ===== HEADER ===== */
        header {
            position: sticky;
            top: 0;
            z-index: 10;
            background: linear-gradient(135deg, #020617, #0f172a, #020617);
            padding: 18px 0;
            text-align: center;
            box-shadow: 0 10px 35px rgba(0, 0, 0, 0.8);
            border-bottom: 1px solid rgba(255, 215, 0, 0.35);
        }

        header h1 {
            color: #ffd700;
            font-size: 28px;
            letter-spacing: 2px;
            font-weight: 800;
        }

        /* ===== CONTAINER ===== */
        .container {
            position: relative;
            z-index: 1;
            max-width: 1100px;
            margin: 50px auto;
            padding: 30px;
            background: rgba(255, 255, 255, 0.14);
            backdrop-filter: blur(14px);
            border-radius: 20px;
            box-shadow: 0 30px 65px rgba(0, 0, 0, 0.6);
        }

        /* ===== TITLE ===== */
        .container h2 {
            text-align: center;
            color: #f8fafc;
            margin-bottom: 25px;
            letter-spacing: 1.5px;
        }

        /* ===== TABLE ===== */
        table {
            width: 100%;
            border-collapse: collapse;
            border-radius: 14px;
            overflow: hidden;
        }

        /* HEAD */
        th {
            background: linear-gradient(135deg, #020617, #0f172a);
            color: #ffd700;
            padding: 16px;
            text-align: left;
            font-size: 14px;
            letter-spacing: 0.6px;
        }

        /* DATA */
        td {
            padding: 14px;
            color: #e5e7eb;
            font-size: 14px;
            border-bottom: 1px solid rgba(255, 255, 255, 0.15);
        }

        /* HOVER */
        tr {
            transition: 0.3s ease;
        }

        tr:hover {
            background: rgba(255, 255, 255, 0.08);
        }

        /* ===== BACK BUTTON ===== */
        .back-wrapper {
            text-align: center;
            margin-top: 35px;
        }

        .back-btn {
            display: inline-block;
            background: linear-gradient(135deg, #facc15, #f59e0b);
            color: #020617;
            padding: 14px 32px;
            border-radius: 8px;
            text-decoration: none;
            font-weight: 800;
            letter-spacing: 1px;
            /* box-shadow: 0 0 22px rgba(250, 204, 21, 0.9); */
            transition: 0.3s ease;
        }

        .back-btn:hover {
            transform: translateY(-3px);
        }

        /* ===== RESPONSIVE ===== */
        @media(max-width:900px) {
            header h1 {
                font-size: 22px;
            }

            th,
            td {
                font-size: 13px;
            }
        }
    </style>
</head>

<body>

    <header>
        <h1>👑 Admin Panel – Users</h1>
    </header>

    <div class="container">
        <h2>👥 Registered Users</h2>

        <table>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Email</th>
            </tr>

            <?php while ($u = mysqli_fetch_assoc($q)) { ?>
                <tr>
                    <td><?= $u['id'] ?></td>
                    <td><?= htmlspecialchars($u['name']) ?></td>
                    <td><?= htmlspecialchars($u['email']) ?></td>
                </tr>
            <?php } ?>
        </table>

        <!-- BACK TO DASHBOARD -->
        <div class="back-wrapper">
            <a href="dashboard.php" class="back-btn">⬅ Back to Dashboard</a>
        </div>
    </div>

</body>

</html>