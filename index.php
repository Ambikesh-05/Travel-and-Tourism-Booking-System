<?php include "PHP/config.php"; ?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <title>Travel Booking System</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <style>
    * {
      margin: 0;
      padding: 0;
      box-sizing: border-box;
    }

    body {
      font-family: 'Segoe UI', Arial, sans-serif;
      background: #f4f4f4;
      color: #333;
      line-height: 1.6;
    }

    /* ===== HEADER (ROYAL) ===== */
    header {
      background: linear-gradient(135deg, #020617, #0f172a, #020617);
      color: #ffd700;
      padding: 20px 0;
      text-align: center;
      box-shadow: 0 8px 30px rgba(0, 0, 0, .8);
      position: relative;
      z-index: 10;
      border-bottom: 1px solid rgba(255, 215, 0, .4);
    }

    .logo {
      font-size: 28px;
      font-weight: 800;
      letter-spacing: 2px;
    }

    .nav-links {
      list-style: none;
      display: flex;
      justify-content: center;
      gap: 25px;
      margin-top: 12px;
    }

    .nav-links a {
      color: #e5e7eb;
      text-decoration: none;
      padding: 8px 16px;
      border-radius: 6px;
      transition: .3s;
    }

    .nav-links a:hover,
    .nav-links a.active {
      background: linear-gradient(135deg, #ffd700, #ffb703);
      color: #020617;
    }

    .admin-btn {
      position: absolute;
      top: 20px;
      right: 30px;
      background: linear-gradient(135deg, #ffd700, #ffb703);
      color: #020617;
      padding: 8px 16px;
      border-radius: 6px;
      text-decoration: none;
      font-weight: 700;
    }

    /* ===== HERO ===== */
    .hero {
      background: url('Images/Maldives.jpg') no-repeat center center/cover;
      background-attachment: fixed;
      min-height: 150vh;
      position: relative;
      color: #fff;
    }

    .hero::before {
      content: "";
      position: absolute;
      inset: 0;
      background: rgba(0, 0, 0, .55);
      z-index: 0;
    }

    .hero-content {
      position: relative;
      text-align: center;
      padding-top: 220px;
      padding-bottom: 220px;
      z-index: 1;
      animation: fadeIn 2s ease-in-out;
    }

    .hero h2 {
      font-size: 48px;
    }

    .hero p {
      font-size: 20px;
    }

    /* ===== TOURS ===== */
    #tours {
      position: relative;
      z-index: 1;
      max-width: 1200px;
      margin: auto;
      padding: 100px 20px 80px;
      margin-top: -50px;
    }

    #tours h2 {
      text-align: center;
      font-size: 34px;
      color: #fff;
      margin-bottom: 35px;
      letter-spacing: 2px;
    }

    .tour-grid {
      display: grid;
      grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
      gap: 25px;
    }

    /* GOLDEN BLINK */
    @keyframes goldenBlink {
      0% {
        box-shadow: 0 0 12px rgba(255, 215, 0, .3);
      }

      50% {
        box-shadow: 0 0 30px rgba(255, 215, 0, .9);
      }

      100% {
        box-shadow: 0 0 12px rgba(255, 215, 0, .3);
      }
    }

    /* GLASS CARD */
    .tour-card {
      background: rgba(255, 255, 255, .18);
      backdrop-filter: blur(10px);
      border-radius: 14px;
      border: 1px solid rgba(255, 255, 255, .25);
      overflow: hidden;
      transition: .4s;
    }

    .tour-grid:hover .tour-card {
      opacity: .85;
    }

    .tour-grid .tour-card:hover {
      animation: goldenBlink 1.5s infinite;
      transform: translateY(-8px) scale(1.02);
      opacity: 1;
    }

    .tour-card img {
      width: 100%;
      height: 200px;
      object-fit: cover;
    }

    .tour-card h3 {
      margin: 15px;
      color: #ffd700;
    }

    .tour-card p {
      margin: 0 15px 15px;
      color: #f1f1f1;
    }

    .price {
      margin: 0 15px 15px;
      font-weight: bold;
      color: #ffdd55;
    }

    .btn {
      display: inline-block;
      margin: 0 15px 20px;
      padding: 10px 18px;
      background: linear-gradient(135deg, #ffd700, #ffb703);
      color: #000;
      border-radius: 6px;
      text-decoration: none;
      font-weight: 600;
    }

    .btn:hover {
      transform: scale(1.05);
    }

    .view-tours-btn {
      display: block;
      margin: 40px auto 0;
      padding: 14px 28px;
      background: linear-gradient(135deg, #ffd700, #ffb703);
      color: #000;
      font-size: 18px;
      border-radius: 8px;
      text-decoration: none;
      width: max-content;
      font-weight: bold;
    }

    /* ===== FOOTER (ROYAL) ===== */
    footer {
      background: linear-gradient(135deg, #020617, #0f172a, #020617);
      color: #cbd5f5;
      text-align: center;
      padding: 22px;
      border-top: 1px solid rgba(255, 215, 0, .4);
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

  <header>
    <h1 class="logo">Welcome to Travel & Tourism Booking</h1>
    <a href="admin/login.php" class="admin-btn">Admin</a>
    <nav>
      <ul class="nav-links">
        <li><a href="index.php" class="active">Home</a></li>
        <li><a href="php/about.php">About</a></li>
        <li><a href="php/contact.php">Contact</a></li>
        <li><a href="php/login.php">Login</a></li>
      </ul>
    </nav>
  </header>

  <section class="hero">

    <div class="hero-content">
      <h2>Explore the World with Us</h2>
      <p>Book your dream vacation today and make unforgettable memories.</p>
    </div>

    <section id="tours">
      <h2>Available Tours</h2>

      <div class="tour-grid">
        <?php
        $q = mysqli_query($conn, "SELECT * FROM tours LIMIT 3");
        while ($row = mysqli_fetch_assoc($q)) {
        ?>
          <div class="tour-card">
            <img src="Images/<?= $row['image']; ?>">
            <h3><?= $row['name']; ?></h3>
            <p><?= $row['description']; ?></p>
            <p class="price">₹<?= $row['price']; ?></p>
            <a href="php/booking_form.php?id=<?= $row['id']; ?>" class="btn">Book Now</a>
          </div>
        <?php } ?>
      </div>

      <a href="tours.php" class="view-tours-btn">View All Tours</a>
    </section>

  </section>

  <footer>
    <p>&copy; 2025 Travel Booking System. All rights reserved.</p>
  </footer>

</body>

</html>