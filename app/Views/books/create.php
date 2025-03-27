<h2><?= esc($title) ?></h2>

<?= session()->getFlashdata('error') ?>
<?= validation_list_errors() ?>

<form action="https://mi-linux.wlv.ac.uk/~2306946/ci4-book-reviews/public/books" method="post">
    <?= csrf_field() ?>

    <label for="title">Title</label>
    <input type="text" name="title" value="<?= set_value('title') ?>"><br>

    <label for="author">Author</label>
    <input type="text" name="author" value="<?= set_value('author') ?>"><br>

    <label for="genre">Genre</label>
    <input type="text" name="genre" value="<?= set_value('genre') ?>"><br>

    <label for="published_year">Published Year</label>
    <input type="number" name="published_year" value="<?= set_value('published_year') ?>"><br>

    <label for="rating">Rating</label>
    <input type="text" name="rating" value="<?= set_value('rating') ?>"><br>
    	 

    <label for="description">Description</label><br>
    <textarea name="description" cols="40" rows="4"><?= set_value('description') ?></textarea><br>

    <input type="submit" name="submit" value="Add Book">
</form>

