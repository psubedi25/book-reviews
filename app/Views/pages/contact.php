<!DOCTYPE html>
<html lang="ne">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Contact Us | GyanMala</title>
  <!-- Bootstrap 5 CDN -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"/>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet"/>
  <style>
    body {
      background-color: #f8f4f1;
      font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
    }

    /* Hero Section */
    .hero-image {
      background-image: url('https://images.unsplash.com/photo-1535905748047-14b0f6b62d4a?ixlib=rb-4.0.3&auto=format&fit=crop&w=1350&q=80'); /* Library Image */
      background-size: cover;
      background-position: center;
      height: 300px;
      position: relative;
      border-bottom-left-radius: 30px;
      border-bottom-right-radius: 30px;
    }

    .hero-overlay {
      background-color: rgba(0, 0, 0, 0.55);
      height: 100%;
      width: 100%;
      position: absolute;
      top: 0;
      left: 0;
      border-bottom-left-radius: 30px;
      border-bottom-right-radius: 30px;
    }

    .hero-text {
      position: absolute;
      color: #fff;
      top: 50%;
      left: 50%;
      transform: translate(-50%, -50%);
      text-align: center;
    }

    .hero-text h1 {
      font-size: 2.7rem;
      font-family: 'Playfair Display', serif;
      font-weight: bold;
    }

    .contact-container {
      max-width: 850px;
      margin: 40px auto;
      background: #ffffff;
      padding: 40px 30px;
      border-radius: 15px;
      box-shadow: 0 12px 24px rgba(0, 0, 0, 0.1);
      transform: translateY(-60px);
    }

    .contact-container h2 {
      text-align: center;
      margin-bottom: 30px;
      color: #a16939;
      font-family: 'Playfair Display', serif;
    }

    .form-label {
      font-weight: 600;
      color: #5a4637;
    }

    .form-control {
      border-radius: 10px;
    }

    .form-control:focus {
      box-shadow: 0 0 5px rgba(161, 105, 57, 0.5);
      border-color: #a16939;
    }

    .btn-send {
      background-color: #a16939;
      color: white;
      border-radius: 50px;
      padding: 12px 25px;
      font-size: 1rem;
      font-weight: bold;
    }

    .btn-send:hover {
      background-color: #7a4e2b;
      box-shadow: 0 5px 15px rgba(0, 0, 0, 0.2);
    }

    .form-icon {
      margin-right: 10px;
      color: #a16939;
    }

    @media (max-width: 576px) {
      .hero-text h1 {
        font-size: 1.8rem;
      }

      .contact-container {
        padding: 25px 20px;
        margin: 20px;
        transform: translateY(-30px);
      }

      .btn-send {
        width: 100%;
      }
    }
  </style>
</head>
<body>

<!-- Navbar -->
<nav class="navbar navbar-expand-lg bg-body-tertiary shadow-sm">
  <div class="container-fluid">
    <a class="navbar-brand fw-bold text-uppercase" href="home.php" style="letter-spacing: 1px; color: #a16939;">GyanMala</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item"><a class="nav-link text-dark" href="#">Books</a></li>
        <li class="nav-item"><a class="nav-link text-dark" href="#">About Us</a></li>
        <li class="nav-item"><a class="nav-link active text-dark" aria-current="page" href="#">Contact Us</a></li>
      </ul>
      <form class="d-flex" role="search">
        <input class="form-control me-2" type="search" placeholder="Search Books"/>
        <button class="btn btn-outline-success" type="submit">Search</button>
      </form>
      <a href="#" class="ms-3">
        <img src="https://cdn-icons-png.flaticon.com/512/149/149071.png" alt="User" width="32" height="32" class="rounded-circle border border-secondary shadow-sm"/>
      </a>
    </div>
  </div>
</nav>

<!-- Hero Image Section -->
<div class="hero-image">
  <div class="hero-overlay"></div>
  <div class="hero-text">
    <h1>Get in Touch with GyanMala</h1>
  </div>
</div>

<!-- Contact Form -->
<div class="contact-container">
  <h2>Contact Us</h2>
  <form method="post" action="#">
    <div class="mb-3">
      <label for="name" class="form-label"><i class="bi bi-person form-icon"></i> Your Name *</label>
      <input type="text" class="form-control" id="name" placeholder="Enter your full name" required/>
    </div>
    <div class="mb-3">
      <label for="email" class="form-label"><i class="bi bi-envelope form-icon"></i> Email Address *</label>
      <input type="email" class="form-control" id="email" placeholder="you@example.com" required/>
    </div>
    <div class="mb-3">
      <label for="subject" class="form-label"><i class="bi bi-pencil form-icon"></i> Subject *</label>
      <input type="text" class="form-control" id="subject" placeholder="Enter the subject" required/>
    </div>
    <div class="mb-3">
      <label for="message" class="form-label"><i class="bi bi-chat-text form-icon"></i> Message *</label>
      <textarea class="form-control" id="message" rows="5" placeholder="Write your message here..." required></textarea>
    </div>
    <div class="text-center">
      <button type="submit" class="btn btn-send">Send Message</button>
    </div>
  </form>
</div>

<!-- Bootstrap JS Bundle -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
