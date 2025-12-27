<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <title>About Us - Travel Booking System</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <style>
    /* ================= GLOBAL ================= */
    body {
      font-family: 'Segoe UI', Arial, sans-serif;
      margin: 0;
      color: #2b2b2b;
      line-height: 1.8;
      min-height: 100vh;
      position: relative;
      background: url('../Images/Udaipur.jpg') no-repeat center center fixed;
      background-size: cover;
    }

    a {
      text-decoration: none;
      transition: .3s ease;
    }

    /* ================= HEADER (ROYAL) ================= */
    header {
      position: relative;
      z-index: 2;
      background: linear-gradient(135deg, #020617, #0f172a, #020617);
      color: #ffd700;
      padding: 15px 0;
      text-align: center;
      box-shadow: 0 8px 30px rgba(0, 0, 0, .8);
      border-bottom: 1px solid rgba(255, 215, 0, .4);
    }

    .logo {
      font-size: 26px;
      font-weight: 800;
      letter-spacing: 1.5px;
      margin: 0;
    }

    .nav-links {
      list-style: none;
      display: flex;
      justify-content: center;
      gap: 22px;
      margin: 8px 0 0;
      padding: 0;
      flex-wrap: wrap;
    }

    .nav-links li a {
      color: #e5e7eb;
      padding: 8px 16px;
      border-radius: 6px;
      font-weight: 600;
      font-size: 14px;
    }

    .nav-links li a:hover,
    .nav-links li a.active {
      background: linear-gradient(135deg, #ffd700, #ffb703);
      color: #020617;
    }

    /* ================= MAIN CONTENT ================= */
    main {
      position: relative;
      z-index: 1;
    }

    main::before {
      content: "";
      position: fixed;
      inset: 0;
      background: rgba(0, 0, 0, .45);
      z-index: 0;
    }

    #about {
      position: relative;
      z-index: 2;
      padding: 70px 20px;
      max-width: 1100px;
      margin: auto;
      text-align: center;
    }

    #about h2 {
      font-size: 40px;
      color: #fff;
      margin-bottom: 35px;
      letter-spacing: 3px;
      text-transform: uppercase;
    }

    #about h2::after {
      content: "";
      width: 90px;
      height: 4px;
      background: linear-gradient(135deg, #ffd700, #ffb703);
      display: block;
      margin: 15px auto 0;
      border-radius: 5px;
    }

    .about-content {
      background: rgba(255, 255, 255, .18);
      backdrop-filter: blur(10px);
      padding: 40px 35px;
      border-radius: 20px;
      box-shadow: 0 20px 45px rgba(0, 0, 0, .35);
      margin-bottom: 60px;
    }

    .about-content p {
      font-size: 18px;
      color: #f1f1f1;
      margin-bottom: 20px;
      max-width: 900px;
      margin-left: auto;
      margin-right: auto;
    }

    /* ================= FEATURES ================= */
    .features-box {
      background: rgba(255, 255, 255, .20);
      backdrop-filter: blur(10px);
      padding: 45px 35px;
      border-radius: 22px;
      box-shadow: 0 25px 55px rgba(0, 0, 0, .4);
      text-align: left;
      transition: .4s ease;
    }

    .features-box:hover {
      transform: translateY(-8px);
    }

    .features-box h3 {
      text-align: center;
      font-size: 28px;
      color: #fff;
      margin-bottom: 35px;
      letter-spacing: 1px;
    }

    .features-box ul {
      list-style: none;
      padding: 0;
      margin: 0;
      font-size: 18px;
      color: #f5f5f5;
    }

    .features-box ul li {
      padding-left: 40px;
      margin-bottom: 18px;
      position: relative;
      font-weight: 500;
    }

    .features-box ul li::before {
      content: "✈";
      position: absolute;
      left: 0;
      color: #ffd700;
      font-size: 20px;
      font-weight: bold;
    }

    /* ================= FOOTER (ROYAL) ================= */
    footer {
      position: relative;
      z-index: 3;
      background: linear-gradient(135deg, #020617, #0f172a, #020617);
      color: #cbd5f5;
      text-align: center;
      padding: 18px 10px;
      font-size: 15px;
      letter-spacing: .6px;
      border-top: 1px solid rgba(255, 215, 0, .4);
    }

    /* ================= RESPONSIVE ================= */
    @media(max-width:768px) {
      .logo {
        font-size: 22px;
      }

      #about h2 {
        font-size: 30px;
      }

      .about-content p {
        font-size: 16px;
      }

      .features-box h3 {
        font-size: 22px;
      }

      .features-box ul {
        font-size: 16px;
      }
    }
  </style>
</head>

<body>

  <header>
    <h1 class="logo">Travel & Tourism Booking</h1>
    <nav>
      <ul class="nav-links">
        <li><a href="../index.php">Home</a></li>
        <li><a href="about.php" class="active">About</a></li>
        <li><a href="contact.php">Contact</a></li>
        <li><a href="login.php">Login</a></li>
      </ul>
    </nav>
  </header>

  <main>
    <section id="about">
      <h2>Who We Are</h2>

      <div class="about-content">
        <p>We are a professional travel and tourism booking platform built to deliver smooth and reliable travel experiences.</p>
        <p>Our mission is to simplify travel planning by offering secure bookings, trusted destinations, and curated tour packages.</p>
        <p>With a customer-first approach, we focus on transparency, comfort, and memorable journeys.</p>
        <p>From spiritual destinations to adventure getaways, we help travelers explore the world with confidence.</p>
        <p>Every journey is planned with care, precision, and a commitment to quality service.</p>
      </div>

      <div class="features-box">
        <h3>Why Choose Our Platform?</h3>
        <ul>
          <li>Wide range of verified travel destinations and tour packages</li>
          <li>Secure booking system with instant confirmations</li>
          <li>Affordable pricing with premium travel experiences</li>
          <li>24/7 customer assistance and support</li>
          <li>Professional tour planning and management</li>
          <li>Modern, fast, and user-friendly booking platform</li>
        </ul>
      </div>
    </section>
  </main>

  <footer>
    <p>&copy; 2025 Travel Booking System. All rights reserved.</p>
  </footer>

</body>

</html>