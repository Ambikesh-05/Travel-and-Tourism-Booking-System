<?php
session_start();
include "../PHP/config.php"; // DB connection

if (isset($_POST['login'])) {

    $username = mysqli_real_escape_string($conn, $_POST['username']);
    $password = mysqli_real_escape_string($conn, $_POST['password']);

    $sql = "SELECT * FROM admin WHERE username='$username' AND password='$password'";
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) == 1) {
        $_SESSION['admin'] = $username;
        header("Location: dashboard.php");
        exit();
    } else {
        echo "<script>alert('Invalid Admin Credentials');</script>";
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Admin Login | Travel Booking</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Segoe UI', Tahoma, sans-serif;
        }

        html,
        body {
            height: 100%;
        }

        body {
            background: url("../Images/Jaisalmer.jpg") no-repeat center center/cover;
            position: relative;
            display: flex;
            justify-content: center;
            align-items: center;
            padding: 24px;
            color: #eaeaea;
        }

        body::before {
            content: "";
            position: absolute;
            inset: 0;
            background: rgba(0, 0, 0, 0.65);
            z-index: 0;
        }

        .login-container {
            position: relative;
            z-index: 1;
            width: 380px;
            background: rgba(0, 0, 0, 0.68);
            border-radius: 14px;
            padding: 35px 30px;
            box-shadow: 0 8px 28px rgba(0, 0, 0, 0.8);
        }

        .login-container h2 {
            text-align: center;
            margin-bottom: 8px;
            color: #fde68a;
            font-size: 26px;
            letter-spacing: 1px;
        }

        .login-container p {
            text-align: center;
            color: #a7a7a7;
            font-size: 14px;
            margin-bottom: 25px;
        }

        .input-group {
            margin-bottom: 18px;
        }

        .input-group label {
            display: block;
            color: #facc15;
            font-size: 14px;
            margin-bottom: 6px;
        }

        .input-group input {
            width: 100%;
            padding: 12px 14px;
            border-radius: 10px;
            border: 1px solid rgba(255, 255, 255, 0.08);
            background: rgba(18, 18, 18, 0.7);
            color: #eaf7fb;
            font-size: 15px;
            transition: 0.3s;
            outline: none;
        }

        .input-group input:focus {
            border-color: #facc15;
            box-shadow: 0 0 0 3px rgba(250, 204, 21, 0.25);
        }

        .login-btn {
            width: 100%;
            padding: 12px;
            background: linear-gradient(135deg, #fde68a, #f59e0b);
            border: none;
            border-radius: 10px;
            color: #1f2937;
            font-size: 16px;
            font-weight: bold;
            cursor: pointer;
            margin-top: 10px;
        }

        .login-btn:hover {
            transform: translateY(-2px);
            box-shadow: 0 10px 25px rgba(250, 204, 21, 0.4);
        }

        .footer-text {
            margin-top: 20px;
            text-align: center;
            font-size: 12px;
            color: #a7a7a7;
        }

        @media(max-width:480px) {
            .login-container {
                width: 90%;
                padding: 30px 20px;
            }
        }
    </style>
</head>

<body>

    <div class="login-container">
        <h2>Admin Login</h2>
        <p>Secure access to admin dashboard</p>

        <form method="post">
            <div class="input-group">
                <label>Username</label>
                <input type="text" name="username" placeholder="Enter admin username" required>
            </div>

            <div class="input-group">
                <label>Password</label>
                <input type="password" name="password" placeholder="Enter admin password" required>
            </div>

            <button type="submit" name="login" class="login-btn">Login</button>
        </form>

        <div class="footer-text">
            © 2025 Travel Booking Admin Panel
        </div>
    </div>

</body>

</html>