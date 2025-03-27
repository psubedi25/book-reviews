<!DOCTYPE html>
<html>
<head>
    <title>Google Book Search</title>
</head>
<body>
    <h1>Search for Books</h1>
    <form method="get" action="<?= base_url('googlebooks/search') ?>">
        <input type="text" name="q" placeholder="Enter book title..." value="<?= esc($query ?? '') ?>" required>
        <button type="submit">Search</button>
    </form>

    <?php if (!empty($books)): ?>
        <h2>Results:</h2>
        <ul>
            <?php foreach ($books as $book): ?>
                <li>
                    <strong><?= esc($book['volumeInfo']['title'] ?? 'No Title') ?></strong><br>
                    <?php if (!empty($book['volumeInfo']['authors'])): ?>
                        Author(s): <?= esc(implode(', ', $book['volumeInfo']['authors'])) ?><br>
                    <?php endif; ?>
                    <?php if (!empty($book['volumeInfo']['imageLinks']['thumbnail'])): ?>
                        <img src="<?= esc($book['volumeInfo']['imageLinks']['thumbnail']) ?>" alt="Cover"><br>
                    <?php endif; ?>
                    <p><?= esc($book['volumeInfo']['description'] ?? 'No description available.') ?></p>
                    <hr>
                </li>
            <?php endforeach; ?>
        </ul>
    <?php elseif (isset($query)): ?>
        <p>No results found for "<?= esc($query) ?>".</p>
    <?php endif; ?>
</body>
</html>
