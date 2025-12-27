<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <title>Contact Us - Travel Booking System</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">

  <style>
    /* ================= GLOBAL ================= */
    body {
      font-family: 'Segoe UI', Arial, sans-serif;
      margin: 0;
      color: #fff;
      min-height: 100vh;
      background: url('../Images/Udaipur.jpg') no-repeat center center fixed;
      background-size: cover;
      position: relative;
    }

    body::before {
      content: "";
      position: absolute;
      inset: 0;
      background: rgba(0, 0, 0, 0.5);
      z-index: 0;
    }

    a {
      text-decoration: none
    }

    /* ================= HEADER (ROYAL SAME AS HOME) ================= */
    header {
      position: relative;
      z-index: 1;
      background: linear-gradient(135deg, #020617, #0f172a, #020617);
      text-align: center;
      padding: 18px 0;
      box-shadow: 0 8px 30px rgba(0, 0, 0, .8);
      border-bottom: 1px solid rgba(255, 215, 0, .4);
    }

    .logo {
      font-size: 26px;
      font-weight: 800;
      margin: 0;
      letter-spacing: 2px;
      color: #ffd700;
    }

    .nav-links {
      list-style: none;
      display: flex;
      justify-content: center;
      gap: 22px;
      margin: 10px 0 0;
      padding: 0;
      flex-wrap: wrap;
    }

    .nav-links li a {
      color: #e5e7eb;
      padding: 8px 16px;
      border-radius: 6px;
      font-size: 14px;
      font-weight: 600;
      transition: .3s ease;
      display: inline-block;
    }

    .nav-links li a:hover,
    .nav-links li a.active {
      background: linear-gradient(135deg, #ffd700, #ffb703);
      color: #020617;
    }

    /* ================= CONTACT ================= */
    #contact {
      position: relative;
      z-index: 1;
      padding: 80px 20px;
      max-width: 800px;
      margin: auto;
      text-align: center;
    }

    #contact h2 {
      font-size: 38px;
      letter-spacing: 3px;
      margin-bottom: 35px;
      text-transform: uppercase;
    }

    #contact h2::after {
      content: "";
      width: 80px;
      height: 4px;
      background: linear-gradient(135deg, #ffd700, #ffb703);
      display: block;
      margin: 15px auto 0;
      border-radius: 5px;
    }

    .contact-card {
      background: rgba(255, 255, 255, .18);
      backdrop-filter: blur(10px);
      padding: 40px 35px;
      border-radius: 22px;
      box-shadow: 0 25px 55px rgba(0, 0, 0, .4);
      transition: .4s ease;
    }

    .contact-card:hover {
      transform: translateY(-6px);
    }

    .contact-item {
      font-size: 18px;
      margin: 18px 0;
      display: flex;
      justify-content: center;
      align-items: center;
      gap: 12px;
      color: #f1f1f1;
    }

    .contact-item span {
      font-weight: 600;
      color: #ffd700;
    }

    .contact-item a {
      color: #ffdd55;
    }

    .contact-item a:hover {
      color: #fff;
      text-decoration: underline;
    }

    .social-section {
      margin-top: 35px;
    }

    .social-section h3 {
      font-size: 22px;
      margin-bottom: 18px;
      color: #ffd700;
    }

    .social-icons {
      display: flex;
      justify-content: center;
      gap: 28px;
    }

    .social-icons a {
      font-size: 32px;
      transition: .3s ease;
    }

    .social-icons a:hover {
      transform: scale(1.2);
    }

    .ig {
      color: #e1306c
    }

    .yt {
      color: #ff0000
    }

    .x {
      color: #000
    }

    .wa {
      color: #25D366
    }

    .call {
      color: #0E9AFE
    }

    .loc {
      color: #ff5252
    }

    /* ================= FOOTER (ROYAL SAME AS HOME) ================= */
    footer {
      position: relative;
      z-index: 1;
      background: linear-gradient(135deg, #020617, #0f172a, #020617);
      text-align: center;
      padding: 20px;
      font-size: 15px;
      margin-top: 80px;
      box-shadow: 0 -8px 30px rgba(0, 0, 0, .8);
      border-top: 1px solid rgba(255, 215, 0, .4);
      color: #cbd5f5;
    }
  </style>
</head>

<body>

  <header>
    <h1 class="logo">Travel & Tourism Booking</h1>
    <nav>
      <ul class="nav-links">
        <li><a href="../index.php">Home</a></li>
        <li><a href="about.php">About</a></li>
        <li><a href="contact.php" class="active">Contact</a></li>
        <li><a href="login.php">Login</a></li>
      </ul>
    </nav>
  </header>

  <section id="contact">
    <h2>Get in Touch</h2>

    <div class="contact-card">

      <div class="contact-item">
        <i class="fa-solid fa-user"></i>
        <span>Name:</span> Ambikesh Pandey
      </div>

      <div class="contact-item">
        <i class="fa-solid fa-envelope"></i>
        <span>Email:</span>
        <a href="mailto:ambikeshpandey2004@gmail.com">ambikeshpandey2004@gmail.com</a>
      </div>

      <div class="contact-item">
        <i class="fa-solid fa-phone call"></i>
        <span>Phone:</span> +91-7380681810
      </div>

      <div class="contact-item">
        <i class="fa-brands fa-whatsapp wa"></i>
        <span>WhatsApp:</span>
        <a href="https://wa.me/917380681810" target="_blank">Chat on WhatsApp</a>
      </div>

      <div class="contact-item">
        <i class="fa-solid fa-location-dot loc"></i>
        <span>Location:</span> Ayodhya, Uttar Pradesh, India - 224189
      </div>

      <div class="social-section">
        <h3>Follow Me</h3>
        <div class="social-icons">
          <a href="#" class="ig"><i class="fa-brands fa-instagram"></i></a>
          <a href="#" class="yt"><i class="fa-brands fa-youtube"></i></a>
          <a href="#" class="x"><i class="fa-brands fa-x-twitter"></i></a>
          <a href="tel:+917380681810" class="call"><i class="fa-solid fa-phone"></i></a>
          <a href="https://wa.me/917380681810" class="wa" target="_blank"><i class="fa-brands fa-whatsapp"></i></a>
        </div>
      </div>

    </div>
  </section>

  <footer>
    <p>&copy; 2025 Travel Booking System. All rights reserved.</p>
  </footer>

</body>

</html>