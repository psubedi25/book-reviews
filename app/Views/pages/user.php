<!DOCTYPE html>
<html lang="ne">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>User Login/Register - GyanMala</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
  <style>
    body {
      background-color: #f5f3ef;
      font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
    }

    .form-container {
      max-width: 900px;
      margin: 50px auto;
      background: #fff;
      border-radius: 10px;
      box-shadow: 0 5px 15px rgba(0,0,0,0.1);
      padding: 30px;
    }

    .form-header {
      text-align: center;
      margin-bottom: 30px;
    }

    .form-header h2 {
      color: #a37d56;
      margin-bottom: 10px;
    }

    .nav-tabs .nav-link.active {
      background-color: #c19a6b !important;
      color: white !important;
      border: none;
    }

    .nav-tabs .nav-link {
      color: #a37d56;
      font-weight: 500;
    }

    .btn-custom {
      background-color: #c19a6b;
      color: white;
    }

    .btn-custom:hover {
      background-color: #a37d56;
    }

    @media (max-width: 768px) {
      .form-container {
        margin: 20px;
        padding: 20px;
      }
    }
  </style>
</head>
<body>

<div class="form-container">
  <div class="form-header">
    <h2>Welcome to GyanMala</h2>
    <p>Please login or create a new account</p>
  </div>

  <!-- Tab navigation -->
  <ul class="nav nav-tabs justify-content-center mb-4" id="formTabs" role="tablist">
    <li class="nav-item" role="presentation">
      <button class="nav-link active" id="login-tab" data-bs-toggle="tab" data-bs-target="#login" type="button" role="tab">Login</button>
    </li>
    <li class="nav-item" role="presentation">
      <button class="nav-link" id="register-tab" data-bs-toggle="tab" data-bs-target="#register" type="button" role="tab">Register</button>
    </li>
  </ul>

  <!-- Tab contents -->
<div class="tab-content" id="formTabsContent">
  <!-- Login Form -->
  <div class="tab-pane fade show active" id="login" role="tabpanel">
    <form action="<?= base_url('/user/login') ?>" method="POST">
    <?= csrf_field() ?>

      <div class="mb-3">
        <label for="loginUsername" class="form-label">Username or Email</label>
        <input type="text" class="form-control" id="loginUsername" name="username" required>
      </div>
      <div class="mb-3">
        <label for="loginPassword" class="form-label">Password</label>
        <input type="password" class="form-control" id="loginPassword" name="password" required>
      </div>
      <div class="d-grid">
        <button type="submit" class="btn btn-custom">Login</button>
      </div>
    </form>
  </div>

  <!-- Register Form -->
  <div class="tab-pane fade" id="register" role="tabpanel">
    <form action="<?= base_url('/user/register') ?>" method="POST">

    <?= csrf_field() ?>

      <div class="mb-3">
        <label for="fullname" class="form-label">Full Name</label>
        <input type="text" class="form-control" id="fullname" name="fullname" required>
      </div>
      <div class="mb-3">
        <label for="regEmail" class="form-label">Email Address</label>
        <input type="email" class="form-control" id="regEmail" name="email" required>
      </div>
      <div class="mb-3">
        <label for="regUsername" class="form-label">Choose Username</label>
        <input type="text" class="form-control" id="regUsername" name="username" required>
      </div>
      <div class="mb-3">
        <label for="regPassword" class="form-label">Choose Password</label>
        <input type="password" class="form-control" id="regPassword" name="password" required>
      </div>
      <div class="d-grid">
        <button type="submit" class="btn btn-custom">Register</button>
      </div>
    </form>
  </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
