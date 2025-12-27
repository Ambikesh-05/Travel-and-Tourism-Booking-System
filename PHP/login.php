<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <title>Login - Travel Booking</title>
  <meta name="viewport" content="width=device-width, initial-scale=1" />

  <style>
    * {
      box-sizing: border-box;
    }

    html,
    body {
      height: 100%;
    }

    body {
      margin: 0;
      font-family: "Segoe UI", Tahoma, Geneva, Verdana, sans-serif;
      color: #eaeaea;
      background: url("../Images/Jaisalmer.jpg") no-repeat center center / cover;
      position: relative;
      display: flex;
      align-items: center;
      justify-content: center;
      padding: 24px;
    }

    body::before {
      content: "";
      position: absolute;
      inset: 0;
      background: rgba(0, 0, 0, 0.65);
    }

    .login-card {
      position: relative;
      z-index: 1;
      width: 372px;
      background: rgba(0, 0, 0, 0.68);
      border: 1px solid rgba(255, 255, 255, 0.08);
      border-radius: 14px;
      backdrop-filter: blur(10px);
      padding: 28px;
      box-shadow: 0 8px 28px rgba(0, 0, 0, 0.8);
    }

    .brand {
      display: flex;
      gap: 10px;
      align-items: center;
      margin-bottom: 18px;
    }

    .brand-logo {
      width: 28px;
      height: 28px;
      border-radius: 6px;
      background: linear-gradient(135deg, #facc15, #f59e0b);
    }

    .brand-title {
      font-size: 19px;
      font-weight: 600;
      color: #fde68a;
    }

    .login-title {
      margin: 0 0 18px;
      font-size: 18px;
      color: #fff7cc;
    }

    .field {
      margin-bottom: 16px;
    }

    .label {
      font-size: 12px;
      color: #a7a7a7;
      margin-bottom: 8px;
      display: block;
    }

    .input {
      width: 100%;
      height: 46px;
      border-radius: 10px;
      border: 1px solid rgba(255, 255, 255, 0.08);
      background: rgba(18, 18, 18, 0.7);
      color: #fff7cc;
      padding: 0 14px;
      outline: none;
    }

    .input:focus {
      border-color: #facc15;
      box-shadow: 0 0 0 3px rgba(250, 204, 21, 0.25);
    }

    /* ===== PASSWORD + EYE ===== */
    .password-row {
      position: relative;
    }

    .password-row .input {
      padding-right: 46px;
    }

    .toggle-eye {
      position: absolute;
      right: 8px;
      top: 50%;
      transform: translateY(-50%);
      width: 34px;
      height: 34px;
      display: grid;
      place-items: center;
      border-radius: 9px;
      background: rgba(255, 255, 255, 0.06);
      border: 1px solid rgba(255, 255, 255, 0.09);
      cursor: pointer;
      color: #fde68a;
    }

    .eye-icon {
      width: 18px;
      height: 18px;
    }

    .btn {
      width: 100%;
      height: 46px;
      border-radius: 10px;
      border: none;
      background: linear-gradient(135deg, #fde68a, #f59e0b);
      color: #1f2937;
      font-size: 15px;
      font-weight: 700;
      cursor: pointer;
      margin-top: 6px;
    }

    .sub {
      margin-top: 12px;
      text-align: center;
      font-size: 13px;
      color: #a7a7a7;
    }

    .sub a {
      color: #facc15;
      font-weight: 600;
      text-decoration: none;
    }
  </style>
</head>

<body>

  <div class="login-card">
    <div class="brand">
      <div class="brand-logo"></div>
      <div class="brand-title">Travel Booking</div>
    </div>

    <h2 class="login-title">Sign in to your account</h2>

    <form action="login.php" method="post">

      <div class="field">
        <label class="label">Email</label>
        <input class="input" type="email" name="email" required>
      </div>

      <div class="field">
        <label class="label">Password</label>
        <div class="password-row">
          <input class="input" type="password" name="password" id="password" required>
          <button type="button" class="toggle-eye" id="togglePassword">
            <svg class="eye-icon" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.7">
              <path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z" />
              <circle cx="12" cy="12" r="3" />
            </svg>
          </button>
        </div>
      </div>

      <button class="btn" type="submit" name="login">Login</button>

      <a href="../index.php" class="btn" style="display:block;text-align:center;line-height:46px;text-decoration:none;margin-top:10px;">
        Back to Home
      </a>

    </form>

    <p class="sub">Don’t have an account? <a href="register.php">Register</a></p>
  </div>

  <script>
    const passwordField = document.getElementById("password");
    const toggleBtn = document.getElementById("togglePassword");

    let visible = false;

    const eyeOpen = `
    <svg class="eye-icon" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.7">
      <path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"/>
      <circle cx="12" cy="12" r="3"/>
    </svg>`;

    const eyeOff = `
    <svg class="eye-icon" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.7">
      <path d="M17.94 17.94A10.94 10.94 0 0 1 12 20C5 20 1 12 1 12a21.8 21.8 0 0 1 5.06-6.06M9.9 4.24A10.94 10.94 0 0 1 12 4c7 0 11 8 11 8a21.8 21.8 0 0 1-3.63 4.77"/>
      <line x1="2" y1="2" x2="22" y2="22"/>
    </svg>`;

    toggleBtn.addEventListener("click", () => {
      visible = !visible;
      passwordField.type = visible ? "text" : "password";
      toggleBtn.innerHTML = visible ? eyeOff : eyeOpen;
    });
  </script>

</body>

</html>

<?php
if (isset($_POST['login'])) {
  include 'config.php';

  $email = $_POST['email'];
  $password = $_POST['password'];

  $sql = "SELECT * FROM users WHERE email='$email'";
  $result = mysqli_query($conn, $sql);

  if ($row = mysqli_fetch_assoc($result)) {
    if ($row['password'] === $password) {
      $_SESSION['user_id'] = $row['id'];
      $_SESSION['user_name'] = $row['name'];
      echo "<script>alert('Login Successful'); window.location.href='../index.php';</script>";
    } else {
      echo "<script>alert('Wrong Password');</script>";
    }
  } else {
    echo "<script>alert('User not found');</script>";
  }
}
?>