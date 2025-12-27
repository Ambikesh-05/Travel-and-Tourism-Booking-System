<?php include "PHP/config.php"; ?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <title>All Tours - Travel Booking System</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <style>
    * {
      margin: 0;
      padding: 0;
      box-sizing: border-box;
    }

    body {
      font-family: 'Segoe UI', Arial, sans-serif;
      background: url('Images/Maldives.jpg') no-repeat center center/cover;
      background-attachment: fixed;
      color: #fff;
      line-height: 1.6;
      position: relative;
      min-height: 100vh;
    }

    /* Overlay */
    body::before {
      content: "";
      position: fixed;
      inset: 0;
      background: rgba(0, 0, 0, .55);
      z-index: 0;
    }

    /* ===== HEADER (ROYAL) ===== */
    header {
      background: linear-gradient(135deg, #020617, #0f172a, #020617);
      color: #ffd700;
      padding: 20px 0;
      text-align: center;
      box-shadow: 0 8px 30px rgba(0, 0, 0, .8);
      position: relative;
      z-index: 2;
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
      font-size: 14px;
      font-weight: 700;
      transition: .3s;
      z-index: 3;
    }

    .admin-btn:hover {
      transform: scale(1.05);
    }

    /* ===== TOURS ===== */
    #tours {
      position: relative;
      z-index: 1;
      padding: 100px 20px;
      max-width: 1400px;
      margin: auto;
    }

    .section-title {
      text-align: center;
      font-size: 38px;
      font-weight: 800;
      margin-bottom: 45px;
      text-transform: uppercase;
      letter-spacing: 3px;
      color: #fff;
    }

    .tour-grid {
      display: grid;
      grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
      gap: 25px;
    }

    /* ===== CARD ===== */
    .tour-card {
      background: rgba(255, 255, 255, .18);
      backdrop-filter: blur(10px);
      border-radius: 14px;
      overflow: hidden;
      border: 1px solid rgba(255, 255, 255, .25);
      transition: .4s;
    }

    .tour-card:hover {
      transform: translateY(-8px) scale(1.02);
      box-shadow: 0 15px 35px rgba(255, 215, 0, .4);
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
      transition: .3s;
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
      font-weight: bold;
      border-radius: 8px;
      text-decoration: none;
      width: max-content;
    }

    /* ===== FOOTER (ROYAL) ===== */
    footer {
      background: linear-gradient(135deg, #020617, #0f172a, #020617);
      color: #cbd5f5;
      text-align: center;
      padding: 22px;
      margin-top: 60px;
      position: relative;
      z-index: 2;
      border-top: 1px solid rgba(255, 215, 0, .4);
    }

    /* ===== RESPONSIVE ===== */
    @media(max-width:600px) {
      .tour-grid {
        grid-template-columns: 1fr;
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
        <li><a href="index.php">Home</a></li>
        <li><a href="php/about.php">About</a></li>
        <li><a href="php/contact.php">Contact</a></li>
        <li><a href="php/login.php">Login</a></li>
      </ul>
    </nav>
  </header>

  <section id="tours">
    <h2 class="section-title">All Available Tours</h2>

    <div class="tour-grid">
      <?php
      $q = mysqli_query($conn, "SELECT * FROM tours");
      while ($row = mysqli_fetch_assoc($q)) {
      ?>
        <div class="tour-card">
          <img src="Images/<?= $row['image']; ?>" alt="<?= $row['name']; ?>">
          <h3><?= $row['name']; ?></h3>
          <p><?= $row['description']; ?></p>
          <p class="price">₹<?= $row['price']; ?></p>
          <a href="php/booking_form.php?id=<?= $row['id']; ?>" class="btn">Book Now</a>
        </div>
      <?php } ?>
    </div>

    <a href="index.php" class="view-tours-btn">← Back to Home</a>
  </section>

  <footer>
    <p>&copy; 2025 Travel Booking System. All rights reserved.</p>
  </footer>

</body>

</html>