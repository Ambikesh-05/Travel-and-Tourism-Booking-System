<?php
include "admin_auth.php";
include "../PHP/config.php";

$sql = "
SELECT 
    bookings.id,
    bookings.name AS customer_name,
    bookings.email,
    bookings.phone,
    bookings.members,
    bookings.address,
    bookings.booking_date,
    tours.name AS destination
FROM bookings
LEFT JOIN tours ON bookings.tour_id = tours.id
ORDER BY bookings.id DESC
";

$result = mysqli_query($conn, $sql);
if (!$result) {
    die("Query Failed: " . mysqli_error($conn));
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>All Bookings | Admin</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Segoe UI', sans-serif;
            background: url('../Images/Udaipur.jpg') no-repeat center center fixed;
            background-size: cover;
            min-height: 100vh;
            position: relative;
        }

        body::before {
            content: "";
            position: absolute;
            inset: 0;
            background: rgba(0, 0, 0, 0.65);
            z-index: 0;
        }

        /* HEADER */
        header {
            position: sticky;
            top: 0;
            z-index: 10;
            background: linear-gradient(135deg, #020617, #0f172a, #020617);
            padding: 18px 0;
            text-align: center;
            box-shadow: 0 8px 30px rgba(0, 0, 0, 0.8);
            border-bottom: 1px solid rgba(255, 215, 0, 0.35);
        }

        header h1 {
            color: #ffd700;
            font-size: 28px;
            letter-spacing: 2px;
            font-weight: 800;
        }

        /* CONTAINER */
        .container {
            position: relative;
            z-index: 1;
            max-width: 1300px;
            margin: 50px auto;
            padding: 30px;
            background: rgba(255, 255, 255, 0.12);
            backdrop-filter: blur(14px);
            border-radius: 12px;
            box-shadow:
                0 30px 60px rgba(0, 0, 0, 0.55),
                inset 0 0 0 1px rgba(255, 255, 255, 0.12);
        }

        .container h2 {
            text-align: center;
            margin-bottom: 30px;
            color: #f8fafc;
            letter-spacing: 1.5px;
        }

        /* TABLE */
        table {
            width: 100%;
            border-collapse: collapse;
            border-radius: 12px;
            overflow: hidden;
        }

        th {
            background: linear-gradient(135deg, #020617, #0f172a);
            color: #ffd700;
            padding: 16px;
            font-size: 14px;
            text-align: left;
        }

        td {
            padding: 14px;
            font-size: 14px;
            color: #e5e7eb;
            border-bottom: 1px solid rgba(255, 255, 255, 0.15);
        }

        tr:hover {
            background: rgba(255, 255, 255, 0.08);
        }

        /* DESTINATION BADGE */
        .badge {
            padding: 6px 14px;
            background: linear-gradient(135deg, #ffd700, #ffb703);
            color: #020617;
            border-radius: 8px;
            font-size: 12px;
            font-weight: 700;
            /* box-shadow: 0 0 14px rgba(255, 215, 0, 0.9); */
        }

        .date {
            font-size: 12px;
            color: #cbd5f5;
        }

        .empty {
            text-align: center;
            color: #f8fafc;
            padding: 25px;
        }

        /* 🔥 BACK BUTTON */
        .back-wrapper {
            text-align: center;
            margin-top: 35px;
        }

        .back-btn {
            display: inline-block;
            background: linear-gradient(135deg, #facc15, #f59e0b);
            color: #020617;
            padding: 14px 30px;
            border-radius: 8px;
            text-decoration: none;
            font-weight: 800;
            letter-spacing: 1px;
            /* box-shadow: 0 0 22px rgba(250, 204, 21, 0.9); */
        }

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
        <h1>👑 Admin Panel – All Bookings</h1>
    </header>

    <div class="container">
        <h2>📋 Booking Records</h2>

        <table>
            <tr>
                <th>ID</th>
                <th>User</th>
                <th>Email</th>
                <th>Phone</th>
                <th>Members</th>
                <th>Destination</th>
                <th>Address</th>
                <th>Booking Date</th>
            </tr>

            <?php if (mysqli_num_rows($result) > 0) { ?>
                <?php while ($row = mysqli_fetch_assoc($result)) { ?>
                    <tr>
                        <td><?= $row['id']; ?></td>
                        <td><?= htmlspecialchars($row['customer_name']); ?></td>
                        <td><?= htmlspecialchars($row['email']); ?></td>
                        <td><?= $row['phone']; ?></td>
                        <td><?= $row['members']; ?></td>
                        <td>
                            <span class="badge">
                                <?= $row['destination'] ? htmlspecialchars($row['destination']) : "N/A"; ?>
                            </span>
                        </td>
                        <td><?= htmlspecialchars($row['address']); ?></td>
                        <td class="date"><?= $row['booking_date']; ?></td>
                    </tr>
                <?php } ?>
            <?php } else { ?>
                <tr>
                    <td colspan="8" class="empty">No bookings found</td>
                </tr>
            <?php } ?>
        </table>

        <!-- ✅ CENTER BACK BUTTON -->
        <div class="back-wrapper">
            <a href="dashboard.php" class="back-btn">⬅ Back to Dashboard</a>
        </div>
    </div>

</body>

</html>