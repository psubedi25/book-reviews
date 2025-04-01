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
        <!-- Book Title and Details -->
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

    <!-- Back Button -->
    <div class="text-center">
      <a href="<?= site_url('/books') ?>" class="btn btn-back">Back to Book Collection</a>
    </div>
  </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
