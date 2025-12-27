<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <title>Register - Travel Booking</title>
  <meta name="viewport" content="width=device-width, initial-scale=1" />

  <style>
    * {
      box-sizing: border-box;
    }

    html,
    body {
      height: 100%;
      margin: 0;
      font-family: "Segoe UI", Tahoma, Geneva, Verdana, sans-serif;
      color: #eaeaea;
    }

    body {
      background: url("../Images/Jaisalmer2.jpg") no-repeat center center/cover;
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
      z-index: 0;
    }

    .register-card {
      position: relative;
      z-index: 1;
      width: 372px;
      background: rgba(0, 0, 0, 0.68);
      border: 1px solid rgba(255, 255, 255, 0.08);
      border-radius: 14px;
      backdrop-filter: blur(10px);
      padding: 28px;
    }

    .register-title {
      margin: 0 0 18px;
      font-size: 20px;
      color: #facc15;
      text-align: center;
    }

    .field {
      margin-bottom: 16px;
    }

    .label {
      display: block;
      font-size: 12px;
      color: #facc15;
      margin-bottom: 8px;
    }

    .input {
      width: 100%;
      height: 46px;
      border-radius: 10px;
      border: 1px solid rgba(255, 255, 255, 0.08);
      background: rgba(18, 18, 18, 0.7);
      color: #eaf7fb;
      padding: 0 14px;
      outline: none;
    }

    .input:focus {
      border-color: #facc15;
      box-shadow: 0 0 0 3px rgba(250, 204, 21, 0.25);
    }

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
      border: none;
      border-radius: 10px;
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
      text-decoration: none;
      font-weight: 600;
    }
  </style>
</head>

<body>

  <div class="register-card">
    <h2 class="register-title">Create Account</h2>

    <form action="register.php" method="post">
      <div class="field">
        <label class="label">Name</label>
        <input class="input" type="text" name="name" required>
      </div>

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

      <button class="btn" type="submit" name="register">Register</button>

      <a href="../index.php" class="btn" style="display:block;text-align:center;line-height:46px;text-decoration:none;margin-top:10px;">
        Back to Home
      </a>
    </form>

    <p class="sub">Already have an account? <a href="login.php">Login</a></p>
  </div>

  <script>
    const passwordField = document.getElementById('password');
    const toggleBtn = document.getElementById('togglePassword');
    let visible = false;

    const eyeOpen = `<svg class="eye-icon" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.7">
      <path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"/>
      <circle cx="12" cy="12" r="3"/>
    </svg>`;

    const eyeOff = `<svg class="eye-icon" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.7">
      <path d="M17.94 17.94A10.94 10.94 0 0 1 12 20C5 20 1 12 1 12a21.8 21.8 0 0 1 5.06-6.06M9.9 4.24A10.94 10.94 0 0 1 12 4c7 0 11 8 11 8a21.8 21.8 0 0 1-3.63 4.77"/>
      <line x1="2" y1="2" x2="22" y2="22"/>
    </svg>`;

    toggleBtn.addEventListener('click', () => {
      visible = !visible;
      passwordField.type = visible ? 'text' : 'password';
      toggleBtn.innerHTML = visible ? eyeOff : eyeOpen;
    });
  </script>

</body>

</html>

<?php
if (isset($_POST['register'])) {
  include 'config.php';

  $name = mysqli_real_escape_string($conn, $_POST['name']);
  $email = mysqli_real_escape_string($conn, $_POST['email']);
  $password = mysqli_real_escape_string($conn, $_POST['password']);

  $sql = "INSERT INTO users(name,email,password) VALUES('$name','$email','$password')";
  if (mysqli_query($conn, $sql)) {
    echo "<script>alert('Registration successful! Please login'); window.location.href='login.php';</script>";
  } else {
    echo "<script>alert('Registration failed');</script>";
  }
}
?>