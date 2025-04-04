<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title><?= esc($book['title']) ?> - Book Details | GyanMala</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
  <style>
    body {
      background: linear-gradient(120deg, #f9f7f6, #f0e3ca);
      font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
      color: #333;
    }

    .book-container {
      max-width: 900px;
      margin: 50px auto;
      background: #fff;
      border-radius: 15px;
      box-shadow: 0 10px 40px rgba(0, 0, 0, 0.12);
      overflow: hidden;
      padding: 30px;
      transition: all 0.3s ease;
    }

    .book-container:hover {
      box-shadow: 0 20px 50px rgba(0, 0, 0, 0.18);
    }

    .book-title {
      font-family: 'Playfair Display', serif;
      font-size: 3rem;
      color: #6a4f33;
      margin-bottom: 20px;
      text-transform: uppercase;
      letter-spacing: 1px;
    }

    .book-meta p {
      font-size: 1.1rem;
      margin-bottom: 12px;
      color: #6a4f33;
    }

    .book-meta strong {
      color: #9c6b38;
    }

    .book-cover {
      width: 100%;
      max-width: 300px;
      border-radius: 10px;
      box-shadow: 0 5px 15px rgba(0, 0, 0, 0.15);
      transition: transform 0.3s ease;
    }

    .book-cover:hover {
      transform: scale(1.05);
    }

    .description {
      margin-top: 25px;
      color: #555;
    }

    .btn-back {
      margin-top: 30px;
      padding: 10px 30px;
      border-radius: 30px;
      border: 2px solid #c19a6b;
      background-color: #f0e3ca;
      color: #6a4f33;
      font-weight: bold;
      transition: all 0.3s ease;
    }

    .btn-back:hover {
      background-color: #c19a6b;
      color: white;
      transform: translateY(-5px);
    }

    .book-flex {
      display: flex;
      gap: 40px;
      align-items: flex-start;
      flex-wrap: wrap;
    }

    .book-flex img {
      margin-bottom: 20px;
    }

    @media (max-width: 768px) {
      .book-flex {
        flex-direction: column;
        align-items: center;
      }

      .book-cover {
        max-width: 80%;
        margin-bottom: 20px;
      }
    }
  </style>
</head>
<body>

<div class="container">
  <div class="book-container">
    <div class="book-flex">
      <!-- Book Cover -->
      <img src="<?= esc($book['cover_image']) ?>" alt="Book Cover" class="book-cover">

      <div class="book-meta">
        <h1 class="book-title"><?= esc($book['title']) ?></h1>
        <p><strong>Author:</strong> <?= esc($book['author']) ?></p>
        <p><strong>Genre:</strong> <?= esc($book['genre']) ?></p>
        <p><strong>Published Year:</strong> <?= esc($book['published_year']) ?></p>
        <p><strong>Rating:</strong> <?= esc($book['rating']) ?></p>
      </div>
    </div>

    <div class="description mt-4">
      <h5><strong>Description:</strong></h5>
      <p><?= esc($book['description']) ?></p>
    </div>

    <!-- Flash Message Section -->
    <?php if (session()->getFlashdata('message')): ?>
      <div class="alert alert-success mt-4"><?= session()->getFlashdata('message') ?></div>
    <?php endif; ?>
    <?php if (session()->getFlashdata('errors')): ?>
      <div class="alert alert-danger mt-3">
        <?php foreach (session()->getFlashdata('errors') as $err): ?>
          <div><?= esc($err) ?></div>
        <?php endforeach; ?>
      </div>
    <?php endif; ?>

    <!-- ? REVIEW FORM -->
    <div class="mt-5">
      <h4>Leave a Review</h4>
<?php if (session()->get('logged_in')): ?>
  <form method="post" action="<?= site_url('books/submitReview') ?>">
    <?= csrf_field() ?>
    <input type="hidden" name="book_slug" value="<?= esc($book['slug']) ?>">

    <div class="mb-3">
      <label class="form-label">You are reviewing as <strong><?= esc(session()->get('fullname')) ?></strong></label>
    </div>

    <div class="mb-3">
      <label for="comment" class="form-label">Your Comment</label>
      <textarea name="comment" class="form-control" rows="3" required></textarea>
    </div>

    <div class="mb-3">
      <label for="rating" class="form-label">Rating (0-5)</label>
      <input type="number" name="rating" class="form-control" min="0" max="5" step="0.1" required>
    </div>

    <button type="submit" class="btn btn-primary">Submit Review</button>
  </form>
<?php else: ?>
  <div class="alert alert-warning mt-3">
    You must be logged in to submit a review.
    <a href="<?= site_url('/user') ?>" class="btn btn-outline-primary btn-sm ms-2">Login / Register</a>
  </div>
	<?php endif; ?>
</div>

    <!-- ?? DISPLAY USER REVIEWS -->
    <div class="mt-5">
      <h4>User Reviews</h4>
      <?php if (!empty($reviews)): ?>
        <ul class="list-group">
          <?php foreach ($reviews as $rev): ?>
            <li class="list-group-item">
              <div class="fw-bold"><?= esc($rev['reviewer']) ?> <span class="text-muted">(<?= esc($rev['rating']) ?>/5)</span></div>
              <div><?= esc($rev['comment']) ?></div>
            </li>
          <?php endforeach; ?>
        </ul>
      <?php else: ?>
        <p class="text-muted">No reviews yet. Be the first to review this book!</p>
      <?php endif; ?>
    </div>

    <!-- Back -->
    <div class="text-center">
      <a href="<?= site_url('/books') ?>" class="btn btn-back mt-4">Back to Book Collection</a>
    </div>
  </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
