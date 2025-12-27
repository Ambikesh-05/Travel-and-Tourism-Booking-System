<?php
session_start();
include 'config.php';

// Check login
if (!isset($_SESSION['user_id'])) {
    echo "<script>alert('Please login first!'); window.location.href='login.php';</script>";
    exit();
}

if (!isset($_GET['id'])) {
    echo "<script>alert('No tour selected!'); window.location.href='../index.php';</script>";
    exit();
}

$tour_id = intval($_GET['id']);
?>

<!DOCTYPE html>
<html>

<head>
    <title>Booking Form</title>
    <style>
        body {
            margin: 0;
            padding: 0;
            font-family: 'Segoe UI', sans-serif;

            /* Beautiful Travel Background */
            background: url('../Images/Bookingformbg.jpg') no-repeat center center/cover;


            height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;

            position: relative;
        }

        /* Dark Transparent Overlay */
        body::before {
            content: "";
            position: absolute;
            inset: 0;
            background: rgba(0, 0, 0, 0.45);
            backdrop-filter: blur(2px);
        }

        .booking-container {
            width: 350px;
            /* Smaller form */
            padding: 25px;
            border-radius: 15px;

            position: relative;
            z-index: 2;

            background: rgba(255, 255, 255, 0.20);
            backdrop-filter: blur(10px);
            box-shadow: 0 8px 30px rgba(0, 0, 0, 0.3);

            animation: fadeIn 0.9s ease-in-out;
        }

        h2 {
            text-align: center;
            color: #fff;
            font-size: 26px;
            margin-bottom: 12px;
            text-shadow: 0 0 6px rgba(255, 255, 255, 0.6);
        }

        label {
            color: #fff;
            font-size: 14px;
            margin-bottom: 4px;
            display: block;
            font-weight: bold;
        }

        input,
        textarea,
        select {
            width: 100%;
            padding: 10px;
            margin: 7px 0 13px 0;

            border-radius: 8px;
            border: none;
            outline: none;

            background: rgba(255, 255, 255, 0.9);
            font-size: 15px;

            box-shadow: 0 2px 6px rgba(0, 0, 0, 0.2);
        }

        textarea {
            height: 70px;
        }

        button {
            width: 100%;
            padding: 12px;
            font-size: 17px;
            border: none;

            background: linear-gradient(135deg, #00b4d8, #0077b6);
            color: white;

            border-radius: 10px;
            cursor: pointer;
            font-weight: bold;

            transition: 0.3s;
            box-shadow: 0 5px 12px rgba(0, 0, 0, 0.2);
        }

        button:hover {
            transform: scale(1.05);
            background: linear-gradient(135deg, #0077b6, #00b4d8);
        }

        @keyframes fadeIn {
            from {
                opacity: 0;
                transform: translateY(20px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }
    </style>
</head>

<body>

    <div class="booking-container">

        <h2>Book Your Trip</h2>

        <form action="process_booking.php" method="POST">

            <input type="hidden" name="tour_id" value="<?php echo $tour_id; ?>">

            <label>Full Name</label>
            <input type="text" name="name" required>

            <label>Email</label>
            <input type="email" name="email" required>

            <label>Phone</label>
            <input type="text" name="phone" required>

            <label>Members</label>
            <select name="members" required>
                <option value="" selected disabled>Select Members</option>
                <?php for ($i = 1; $i <= 10; $i++) { ?>
                    <option value="<?php echo $i; ?>"><?php echo $i; ?> Person(s)</option>
                <?php } ?>
            </select>

            <label>Address</label>
            <textarea name="address" required></textarea>

            <button type="submit">Confirm Booking</button>

        </form>

    </div>

</body>

</html>