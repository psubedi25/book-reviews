<h2><?= esc($book['title']) ?></h2>

<p><strong>Author:</strong> <?= esc($book['author']) ?></p>
<p><strong>Genre:</strong> <?= esc($book['genre']) ?></p>
<p><strong>Published Year:</strong> <?= esc($book['published_year']) ?></p>
<p><strong>Rating:</strong> <?= esc($book['rating']) ?></p>
<img src="<?= esc($book['cover_image']) ?>"  ></img>
<p><?= esc($book['description']) ?></p>
