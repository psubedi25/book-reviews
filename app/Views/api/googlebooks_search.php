<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>GyanMala Book Search</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">
    <style>
        body {
            background: linear-gradient(135deg, #f9f9f9, #eaf0ff);
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }
        .search-bar {
            max-width: 650px;
            margin: 0 auto 40px;
        }
        .book-img {
            max-height: 240px;
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
        }
        .card:hover {
            box-shadow: 0 12px 24px rgba(0,0,0,0.15);
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
    </style>
</head>
<body>

<!-- Enhanced Bootstrap Navbar -->
<nav class="navbar navbar-expand-lg bg-body-tertiary">   
    <div class="container-fluid">
        <a class="navbar-brand fw-bold text-uppercase" href="https://mi-linux.wlv.ac.uk/~2306946/ci4-book-reviews/public/home" style="letter-spacing: 1px; color: #a37d56;">GyanMala</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link active text-dark" aria-current="page" href="https://mi-linux.wlv.ac.uk/~2306946/ci4-book-reviews/public/books">Books</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-dark" href="https://mi-linux.wlv.ac.uk/~2306946/ci4-book-reviews/public/about">About Us</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-dark" href="https://mi-linux.wlv.ac.uk/~2306946/ci4-book-reviews/public/contact">Contact Us</a>
                </li>
            </ul>
               <a href="https://mi-linux.wlv.ac.uk/~2306946/ci4-book-reviews/public/user" class="ms-3">
                <img src="https://cdn-icons-png.flaticon.com/512/149/149071.png" alt="User" width="32" height="32" class="rounded-circle border border-1 border-secondary shadow-sm">
            </a>
        </div>
    </div>
</nav>

<div class="container py-5">
    <h2 class="text-center mb-4">GyanMala Book Search</h2>

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
            <?php foreach ($books as $index => $book): ?>
                <?php
                    $volume = $book['volumeInfo'];
                    $title = $volume['title'] ?? 'No Title';
                    $authors = $volume['authors'] ?? ['Unknown Author'];
                    $imageLinks = $volume['imageLinks'] ?? [];
                    $thumbnail = $imageLinks['extraLarge'] ?? $imageLinks['large'] ?? $imageLinks['medium'] ?? $imageLinks['small'] ?? $imageLinks['thumbnail'] ?? null;

                    if ($thumbnail && str_contains($thumbnail, 'books.google.com/books/content')) {
                        $thumbnail = preg_replace('/zoom=\d+/', 'zoom=3', $thumbnail);
                    }
                ?>
                <div class="col">
                    <div class="card h-100 text-center p-2">
                        <?php if ($thumbnail): ?>
                            <img src="<?= esc($thumbnail) ?>" class="book-img" alt="Cover Image">
                        <?php else: ?>
                            <div class="placeholder">No Cover Available</div>
                        <?php endif; ?>

                        <div class="card-body">
                            <h5 class="card-title"><?= esc($title) ?></h5>
                            <p class="card-text"><?= esc(implode(', ', $authors)) ?></p>

                            <!-- Save Button -->
                            <button class="save-book btn btn-success" 
                                    data-id="<?= $index ?>" 
                                    data-title="<?= esc($title) ?>" 
                                    data-author="<?= esc(implode(', ', $authors)) ?>" 
                                    data-description="<?= esc($volume['description'] ?? 'No description available') ?>" 
                                    data-thumbnail="<?= esc($thumbnail) ?>">
                                Save This Book
                            </button>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    <?php elseif (isset($query)): ?>
        <p class="text-center text-danger mt-4">No results found for "<strong><?= esc($query) ?></strong>"</p>
    <?php endif; ?>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

<!-- Include jQuery (necessary for AJAX) -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<script>
    $(document).on('click', '.save-book', function() {
        var bookData = {
            id: $(this).data('id'),
            title: $(this).data('title'),
            author: $(this).data('author'),
            description: $(this).data('description'),
            thumbnail: $(this).data('thumbnail')
        };

        $.ajax({
            url: '<?= site_url('ajax/saveBook') ?>',  // Route to save the book
            method: 'POST',
            data: bookData,
            success: function(response) {
                if(response.status == 'success') {
                    alert(response.message);
                } else {
                    alert('Failed to save the book.');
                }
            },
            error: function() {
                alert('An error occurred while saving the book.');
            }
        });
    });
</script>

</body>
</html>
