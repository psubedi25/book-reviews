<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title><?= esc($title) ?></title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" />
  <style>
    body {
      background: linear-gradient(135deg, #fdfcfb, #e2d1c3);
      font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
    }

    .form-container {
      max-width: 700px;
      margin: 50px auto;
      padding: 40px;
      background-color: #fff;
      border-radius: 12px;
      box-shadow: 0 12px 25px rgba(0, 0, 0, 0.08);
    }

    h2 {
      text-align: center;
      color: #4a3f35;
      font-family: 'Playfair Display', serif;
      margin-bottom: 30px;
    }

    label {
      font-weight: 500;
      margin-top: 10px;
      color: #5c4438;
    }

    .form-control:focus {
      border-color: #c19a6b;
      box-shadow: 0 0 0 0.15rem rgba(193, 154, 107, 0.25);
    }

    .btn-primary {
      background-color: #c19a6b;
      border-color: #c19a6b;
    }

    .btn-primary:hover {
      background-color: #a37d56;
      border-color: #a37d56;
    }

    .btn-outline-secondary {
      border-color: #6c757d;
      color: #6c757d;
    }

    .btn-outline-secondary:hover {
      background-color: #6c757d;
      color: white;
    }

    .alert {
      font-size: 0.95rem;
    }
  </style>
</head>
<body>

<div class="container">
  <div class="form-container">
    <h2><?= esc($title) ?></h2>

    <!-- Flash Error -->
    <?php if (session()->getFlashdata('error')): ?>
      <div class="alert alert-danger">
        <?= session()->getFlashdata('error') ?>
      </div>
    <?php endif; ?>

    <!-- Validation Errors -->
    <?php if (!empty(validation_list_errors())): ?>
      <div class="alert alert-warning">
        <?= validation_list_errors() ?>
      </div>
    <?php endif; ?>

    <!-- Book Form -->
    <form action="<?= site_url('/books') ?>" method="post">
      <?= csrf_field() ?>

      <div class="mb-3">
        <label for="title">Title</label>
        <input type="text" class="form-control" name="title" value="<?= set_value('title') ?>" required>
      </div>

      <div class="mb-3">
        <label for="author">Author</label>
        <input type="text" class="form-control" name="author" value="<?= set_value('author') ?>" required>
      </div>

      <div class="mb-3">
        <label for="genre">Genre</label>
        <input type="text" class="form-control" name="genre" value="<?= set_value('genre') ?>" required>
      </div>

      <div class="mb-3">
        <label for="published_year">Published Year</label>
        <input type="number" class="form-control" name="published_year" value="<?= set_value('published_year') ?>" required>
      </div>

      <div class="mb-3">
        <label for="rating">Rating</label>
        <input type="text" class="form-control" name="rating" value="<?= set_value('rating') ?>" required>
      </div>

      <div class="mb-3">
        <label for="description">Description</label>
        <textarea class="form-control" name="description" rows="4" required><?= set_value('description') ?></textarea>
      </div>

      <div class="text-center mt-4">
        <input type="submit" class="btn btn-primary px-4 py-2" value="Add Book">
      </div>

      <!-- Back to Book List Button -->
      <div class="text-center mt-3">
        <a href="<?= site_url('/books') ?>" class="btn btn-outline-secondary px-4 py-2">
          Back to Book Collection List
        </a>
      </div>

    </form>
  </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
