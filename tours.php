<?php include "PHP/config.php"; ?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <title>All Tours - Travel Booking System</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">

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
      min-height: 100vh;
    }

    body::before {
      content: "";
      position: fixed;
      inset: 0;
      background: rgba(0, 0, 0, 0.55);
      z-index: 0;
    }

    header {
      background: linear-gradient(135deg, #020617, #0f172a, #020617);
      color: #ffd700;
      padding: 20px 0;
      text-align: center;
      box-shadow: 0 8px 30px rgba(0, 0, 0, 0.8);
      position: relative;
      z-index: 2;
      border-bottom: 1px solid rgba(255, 215, 0, 0.4);
    }

    .logo {
      font-size: 28px;
      font-weight: 800;
      letter-spacing: 2px;
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
      margin-bottom: 25px;
      letter-spacing: 3px;
    }

    .search-bar {
      max-width: 700px;
      margin: 0 auto 45px;
      position: relative;
    }

    .search-bar input {
      width: 100%;
      padding: 16px 20px 16px 45px;
      border-radius: 40px;
      border: none;
      outline: none;
      font-size: 16px;
      background: rgba(255, 255, 255, 0.95);
      box-shadow: 0 6px 20px rgba(0, 0, 0, 0.35);
    }

    .search-bar i {
      position: absolute;
      top: 50%;
      left: 15px;
      transform: translateY(-50%);
      color: #888;
      font-size: 18px;
    }

    .tour-grid {
      display: grid;
      grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
      gap: 25px;
    }

    .tour-card {
      background: rgba(255, 255, 255, 0.18);
      backdrop-filter: blur(10px);
      border-radius: 14px;
      overflow: hidden;
      border: 1px solid rgba(255, 255, 255, 0.25);
      min-height: 380px;
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
      text-align: center;
      width: fit-content;
    }

    footer {
      background: linear-gradient(135deg, #020617, #0f172a, #020617);
      color: #cbd5f5;
      text-align: center;
      padding: 22px;
      margin-top: 60px;
      border-top: 1px solid rgba(255, 215, 0, 0.4);
    }
  </style>
</head>

<body>

  <header>
    <h1 class="logo">Welcome to Travel & Tourism Booking</h1>
    <a href="admin/login.php" class="admin-btn">Admin</a>
  </header>

  <section id="tours">
    <h2 class="section-title">All Available Tours</h2>

    <div class="search-bar">
      <i class="fa fa-search"></i>
      <input type="text" id="searchInput" placeholder="Search tours by name, description or price...">
    </div>

    <div class="tour-grid" id="tourGrid">
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
  </section>

  <footer>
    <p>&copy; 2025 Travel Booking System. All rights reserved.</p>
  </footer>

  <script>
    const searchInput = document.getElementById("searchInput");
    const tourGrid = document.getElementById("tourGrid");
    const cards = Array.from(document.querySelectorAll(".tour-card"));

    searchInput.addEventListener("keyup", function() {
      const value = searchInput.value.toLowerCase();

      // clear grid
      tourGrid.innerHTML = "";

      // filter cards
      const matched = cards.filter(card => card.innerText.toLowerCase().includes(value));

      // show only matched cards
      matched.forEach(card => {
        tourGrid.appendChild(card);
        card.style.display = "block"; // keep same size
      });
    });
  </script>

</body>

</html>