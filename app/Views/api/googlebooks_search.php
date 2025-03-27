<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>GyanMala Book Search</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap 5 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Icons -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">

    <style>
        body {
            background: linear-gradient(135deg, #f9f9f9, #eaf0ff);
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }

        h2 {
            font-weight: bold;
            color: #003366;
        }

        .search-bar {
            max-width: 650px;
            margin: 0 auto 40px;
        }

        .input-group input {
            border-radius: 50px 0 0 50px;
        }

        .input-group button {
            border-radius: 0 50px 50px 0;
        }

        .book-img {
    max-height: 240px;
    width: auto;
    object-fit: contain;
    padding: 12px;
    border-radius: 12px;
    transition: transform 0.4s ease;
}

        .card:hover .book-img {
            transform: scale(1.07);
        }

        .card {
            border: none;
            border-radius: 20px;
            background-color: #ffffff;
            box-shadow: 0 6px 16px rgba(0,0,0,0.1);
            transition: box-shadow 0.3s ease;
        }

        .card:hover {
            box-shadow: 0 12px 24px rgba(0,0,0,0.15);
        }

        .card-title {
            font-size: 1.15rem;
            font-weight: 600;
            color: #003366;
        }

        .card-text {
            font-size: 0.95rem;
            color: #666;
        }

        .placeholder {
            height: 260px;
            background-color: #ddd;
            display: flex;
            align-items: center;
            justify-content: center;
            font-style: italic;
            color: #888;
            border-radius: 12px;
        }

        .btn-primary {
            background-color: #0056b3;
            border: none;
        }

        .btn-primary:hover {
            background-color: #003d80;
        }
    </style>
</head>
<body>
<div class="container py-5">
    <h2 class="text-center mb-4"> GyanMala Book Search</h2>

    <!-- Search Bar -->
    <form method="get" action="<?= base_url('googlebooks/search') ?>" class="search-bar">
        <div class="input-group shadow-sm">
            <input type="text" name="q" class="form-control form-control-lg" placeholder="Search by book title or author..." value="<?= esc($query ?? '') ?>" required>
            <button class="btn btn-primary btn-lg" type="submit">
                <i class="bi bi-search"></i> Search
            </button>
        </div>
    </form>

    <?php if (!empty($books)): ?>
        <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 row-cols-lg-4 g-4">
            <?php foreach ($books as $book): ?>
                <?php
                    $volume = $book['volumeInfo'];
                    $title = $volume['title'] ?? 'No Title';
                    $authors = $volume['authors'] ?? ['Unknown Author'];
                    $imageLinks = $volume['imageLinks'] ?? [];
$thumbnail = $imageLinks['extraLarge'] ??
             $imageLinks['large'] ??
             $imageLinks['medium'] ??
             $imageLinks['small'] ??
             $imageLinks['thumbnail'] ?? null;

// Enhance thumbnail quality if it's a Google Books content URL
if ($thumbnail && str_contains($thumbnail, 'books.google.com/books/content')) {
    $thumbnail = preg_replace('/zoom=\d+/', 'zoom=3', $thumbnail); // Force highest zoom
}

                ?>
                <div class="col">
                    <div class="card h-100 text-center">
                        <?php if ($thumbnail): ?>
                            <img src="<?= esc($thumbnail) ?>" class="book-img" alt="Cover Image">
                        <?php else: ?>
                            <div class="placeholder">No Cover Available</div>
                        <?php endif; ?>
                        <div class="card-body">
                            <h5 class="card-title"><?= esc($title) ?></h5>
                            <p class="card-text"><?= esc(implode(', ', $authors)) ?></p>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    <?php elseif (isset($query)): ?>
        <p class="text-center text-danger mt-4">No results found for "<strong><?= esc($query) ?></strong>"</p>
    <?php endif; ?>
</div>

<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
