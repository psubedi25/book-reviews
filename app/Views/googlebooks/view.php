<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title><?= esc($title) ?> - GyanMala</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light p-5">

<div class="container">
    <div class="card shadow-lg mx-auto" style="max-width: 800px;">
        <?php if (!empty($book['thumbnail'])): ?>
            <img src="<?= esc($book['thumbnail']) ?>" alt="Book Cover" class="card-img-top" style="object-fit: contain; height: 400px;">
        <?php endif; ?>
        <div class="card-body">
            <h2 class="card-title"><?= esc($book['title']) ?></h2>
            <h5 class="text-muted mb-3"><?= esc($book['author']) ?></h5>
            <p class="card-text"><?= esc($book['description']) ?></p>
            <a href="<?= site_url('/books') ?>" class="btn btn-outline-primary mt-3">Back to Books</a>
        </div>
    </div>
</div>

</body>
</html>
