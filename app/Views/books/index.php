<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title><?= esc($title) ?></title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@600&family=Inter:wght@400;500&display=swap" rel="stylesheet">
  <style>
    body {
      background: linear-gradient(135deg, #f5f7fa, #e4e9f0);
      font-family: 'Inter', sans-serif;
      margin: 0;
    }

    h2 {
      font-family: 'Playfair Display', serif;
      font-size: 2.5rem;
      color: #4a3f35;
      text-align: center;
      margin: 40px 0 20px;
    }

    .book-grid {
      display: grid;
      grid-template-columns: repeat(auto-fit, minmax(240px, 1fr));
      gap: 30px;
      padding: 0 5% 40px;
    }

    .book-card {
      background: #fff;
      border-radius: 15px;
      overflow: hidden;
      box-shadow: 0 10px 20px rgba(0, 0, 0, 0.08);
      transition: 0.3s ease;
      display: flex;
      flex-direction: column;
    }

    .book-card:hover {
      transform: translateY(-5px);
      box-shadow: 0 15px 30px rgba(0, 0, 0, 0.12);
    }

    .book-cover {
      width: 100%;
      height: 250px;
      object-fit: contain;
      background: #f0f0f0;
    }

    .book-details {
      padding: 15px;
      flex-grow: 1;
    }

    .book-details h3 {
      font-size: 1.1rem;
      color: #007BFF;
    }

    .book-details p {
      font-size: 0.9rem;
      color: #555;
      margin-bottom: 6px;
    }

    .book-links {
      display: flex;
      justify-content: space-between;
      padding: 0 15px 15px;
      gap: 10px;
    }

    .btn {
      font-size: 0.85rem;
      padding: 6px 14px;
      font-weight: 500;
    }

    .navbar {
      background: #fff;
      box-shadow: 0 4px 10px rgba(0,0,0,0.05);
    }

    .navbar-brand {
      font-family: 'Playfair Display', serif;
      font-weight: bold;
      color: #a37d56 !important;
      font-size: 1.6rem;
    }

    .add-btn {
      display: inline-block;
      padding: 10px 20px;
      border: 2px solid #007BFF;
      border-radius: 8px;
      color: #007BFF;
      font-weight: 500;
      margin-bottom: 30px;
      text-decoration: none;
    }

    .add-btn:hover {
      background: #007BFF;
      color: #fff;
      text-decoration: none;
    }

    #ajaxBook {
      max-width: 900px;
      margin: 20px auto;
      background: #fff;
      padding: 20px;
      border-left: 5px solid #007BFF;
      border-radius: 8px;
      box-shadow: 0 4px 12px rgba(0, 0, 0, 0.07);
    }
  </style>
</head>
<body>

<nav class="navbar navbar-expand-lg py-3">
  <div class="container-fluid">
    <a class="navbar-brand" href="<?= site_url('/home') ?>">GyanMala</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto">
        <li class="nav-item"><a class="nav-link active" href="<?= site_url('/booklist') ?>">Books</a></li>
        <li class="nav-item"><a class="nav-link" href="<?= site_url('/about') ?>">About Us</a></li>
        <li class="nav-item"><a class="nav-link" href="<?= site_url('/contact') ?>">Contact</a></li>
      </ul>
      <form class="d-flex" method="get" action="<?= site_url('/googlebooks/search') ?>">
        <input class="form-control me-2" type="search" name="q" placeholder="Search Books" required>
        <button class="btn btn-outline-success" type="submit">Search</button>
      </form>
      <a href="<?= site_url('/user') ?>" class="ms-3">
        <img src="https://cdn-icons-png.flaticon.com/512/149/149071.png" width="32" class="rounded-circle border shadow-sm" alt="User">
      </a>
    </div>
  </div>
</nav>

<h2><?= esc($title) ?></h2>

<div class="text-center">
  <a href="<?= site_url('/books/create') ?>" class="add-btn">Add Your Favorite Book</a>
</div>

<p id="ajaxBook"></p>

<!-- ? LOCAL BOOKS -->
<?php if ($books_list): ?>
  <div class="book-grid">
    <?php foreach ($books_list as $book): ?>
      <div class="book-card">
        <img src="<?= esc($book['cover_image']) ?>" alt="Book Cover" class="book-cover">
        <div class="book-details">
          <h3><?= esc($book['title']) ?></h3>
          <p><strong>Author:</strong> <?= esc($book['author']) ?></p>
          <p><strong>Genre:</strong> <?= esc($book['genre']) ?></p>
          <p><strong>Year:</strong> <?= esc($book['published_year']) ?></p>
          <p><strong>Rating:</strong> <?= esc($book['rating']) ?></p>
          <p><?= esc($book['description']) ?></p>
        </div>
        <div class="book-links">
          <a href="<?= site_url('books/' . esc($book['slug'], 'url')) ?>" class="btn btn-primary">View Details</a>
          <button class="btn btn-success" onclick="getBookData('<?= esc($book['slug'], 'url') ?>')">View via AJAX</button>
        </div>
      </div>
    <?php endforeach; ?>
  </div>
<?php endif; ?>

<!-- ? GOOGLE SAVED BOOKS -->
<?php if (!empty($savedBooks)): ?>
  <h2 class="mt-5 mb-3">Books Saved from Google</h2>
  <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 row-cols-lg-4 g-4 px-5">
    <?php foreach ($savedBooks as $book): ?>
      <div class="col">
        <div class="book-card">
          <?php if (!empty($book['thumbnail'])): ?>
            <img src="<?= esc($book['thumbnail']) ?>" alt="Book Cover" class="book-cover">
          <?php else: ?>
            <div class="book-cover bg-secondary text-white d-flex align-items-center justify-content-center">No Image</div>
          <?php endif; ?>
          <div class="book-details">
            <h3><?= esc($book['title']) ?></h3>
            <p><strong>Author:</strong> <?= esc($book['author']) ?></p>
            <p><?= esc($book['description']) ?: '<em>No description available</em>' ?></p>
          </div>
          <div class="book-links">
            <a href="<?= site_url('googlebooks/' . $book['id']) ?>" class="btn btn-primary">View Details</a>
            <button class="btn btn-success" onclick="getGoogleBookData(<?= $book['id'] ?>)">View via AJAX</button>
          </div>
        </div>
      </div>
    <?php endforeach; ?>
  </div>
<?php endif; ?>

<!-- AJAX Scripts -->
<script>
  function getBookData(slug) {
    fetch("<?= site_url('/ajax/get/') ?>" + slug)
      .then(res => res.json())
      .then(book => {
        document.getElementById("ajaxBook").innerHTML = `
          <div class="d-flex flex-wrap gap-4">
            <img src="${book.cover_image}" style="width:200px;" class="rounded shadow-sm" alt="Cover">
            <div>
              <h4>${book.title}</h4>
              <p><strong>Author:</strong> ${book.author}</p>
              <p><strong>Genre:</strong> ${book.genre}</p>
              <p><strong>Year:</strong> ${book.published_year}</p>
              <p><strong>Rating:</strong> ${book.rating}</p>
              <p>${book.description}</p>
            </div>
          </div>
        `;
        ajaxBook.scrollIntoView({ behavior: "smooth" });
      });
  }

  function getGoogleBookData(id) {
    fetch("<?= site_url('/ajax/googlebook/') ?>" + id)
      .then(res => res.json())
      .then(book => {
        document.getElementById("ajaxBook").innerHTML = `
          <div class="d-flex flex-wrap gap-4">
            <img src="${book.thumbnail}" style="width:200px;" class="rounded shadow-sm" alt="Cover">
            <div>
              <h4>${book.title}</h4>
              <p><strong>Author:</strong> ${book.author}</p>
              <p>${book.description}</p>
            </div>
          </div>
        `;
        ajaxBook.scrollIntoView({ behavior: "smooth" });
      });
  }
</script>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
