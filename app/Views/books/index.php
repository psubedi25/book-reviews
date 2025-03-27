<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= esc($title) ?></title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@600&family=Inter:wght@400;500&display=swap" rel="stylesheet">
    <style>
        body {
            margin: 0;
            background: linear-gradient(135deg, #f5f7fa, #e4e9f0);
            font-family: 'Inter', sans-serif;
        }

        h2 {
            font-family: 'Playfair Display', serif;
            font-size: 2.8rem;
            color: #4a3f35;
            text-align: center;
            margin: 50px 0 30px;
        }

        .navbar {
            background-color: rgba(255, 255, 255, 0.95);
            backdrop-filter: blur(8px);
            box-shadow: 0 3px 10px rgba(0, 0, 0, 0.08);
        }

        .navbar-brand {
            font-family: 'Playfair Display', serif;
            color: #a37d56 !important;
            font-size: 1.6rem;
        }

        .nav-link {
            color: #333 !important;
            font-weight: 500;
        }

        .nav-link:hover {
            color: #c19a6b !important;
        }

        .btn-outline-success {
            border-color: #a37d56;
            color: #a37d56;
        }

        .btn-outline-success:hover {
            background-color: #a37d56;
            color: white;
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

        .book-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(240px, 1fr));
            gap: 30px;
            padding: 40px 5%;
        }

        @media (min-width: 1200px) {
            .book-grid {
                grid-template-columns: repeat(4, 1fr);
            }
        }

        .book-card {
            background: rgba(255, 255, 255, 0.9);
            border-radius: 15px;
            overflow: hidden;
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.1);
            transition: all 0.3s ease;
            backdrop-filter: blur(8px);
            display: flex;
            flex-direction: column;
            height: 100%;
        }

        .book-card:hover {
            transform: translateY(-8px);
            box-shadow: 0 15px 30px rgba(0, 0, 0, 0.15);
        }

        .book-cover {
            width: 100%;
            aspect-ratio: 3 / 4;
            object-fit: cover;
            display: block;
            background-color: #f0f0f0;
            border-bottom: 1px solid #eee;
        }

        .book-details {
            padding: 15px;
            flex-grow: 1;
        }

        .book-details h3 {
            font-size: 1.1rem;
            font-weight: 600;
            color: #007BFF;
            margin-bottom: 8px;
        }

        .book-details p {
            font-size: 0.9rem;
            color: #555;
            margin-bottom: 6px;
        }

        .book-links {
            display: flex;
            justify-content: space-between;
            padding: 15px;
            gap: 10px;
        }

        .btn {
            font-size: 0.85rem;
            padding: 6px 14px;
            border-radius: 6px;
            font-weight: 500;
        }

        .btn-primary {
            background-color: #007BFF;
            border: none;
        }

        .btn-success {
            background-color: #28a745;
            border: none;
        }

        .btn-primary:hover {
            background-color: #0056b3;
        }

        .btn-success:hover {
            background-color: #1e7e34;
        }

        .rounded-avatar {
            border: 2px solid #ccc;
            border-radius: 50%;
            width: 32px;
            height: 32px;
        }
    </style>
</head>
<body>

<nav class="navbar navbar-expand-lg py-3">
    <div class="container-fluid">
        <a class="navbar-brand fw-bold text-uppercase" href="#">GyanMala</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link active" href="<?= site_url('/booklist') ?>">Books</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">About Us</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Contact</a>
                </li>
            </ul>
            <form class="d-flex" role="search" method="get" action="<?= site_url('/googlebooks/search') ?>">
                <input class="form-control me-2" type="search" name="q" placeholder="Search Books" required>
                <button class="btn btn-outline-success" type="submit">Search</button>
            </form>
            <a href="#" class="ms-3">
                <img src="https://cdn-icons-png.flaticon.com/512/149/149071.png" class="rounded-avatar shadow-sm" alt="User">
            </a>
        </div>
    </div>
</nav>

<h2><?= esc($title) ?></h2>

<p id="ajaxBook"></p>

<?php if ($books_list !== []): ?>
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
                    <button onclick="getBookData('<?= esc($book['slug'], 'url') ?>')" class="btn btn-success">View via AJAX</button>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
<?php else: ?>
    <h3 class="text-center mt-4">No Books Found</h3>
    <p class="text-center">Sorry, we couldn't find any books to show.</p>
<?php endif; ?>

<script>
    function getBookData(slug) {
        fetch("https://mi-linux.wlv.ac.uk/~2306946/ci4-book-reviews/public/ajax/get/" + slug)
            .then(response => response.json())
            .then(book => {
                const ajaxOutput = document.getElementById("ajaxBook");
                ajaxOutput.innerHTML = `
                    <div class="d-flex flex-wrap gap-4">
                        <img src="${book.cover_image}" alt="Book Cover" style="width: 200px; height: auto; border-radius: 8px; box-shadow: 0 4px 12px rgba(0,0,0,0.1);">
                        <div>
                            <h4>${book.title}</h4>
                            <p><strong>Author:</strong> ${book.author}</p>
                            <p><strong>Genre:</strong> ${book.genre}</p>
                            <p><strong>Published Year:</strong> ${book.published_year}</p>
                            <p><strong>Rating:</strong> ${book.rating}</p>
                            <p>${book.description}</p>
                        </div>
                    </div>
                `;
                ajaxOutput.scrollIntoView({ behavior: "smooth", block: "start" });
            })
            .catch(() => {
                document.getElementById("ajaxBook").innerHTML = "Error loading book data.";
            });
    }
</script>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
