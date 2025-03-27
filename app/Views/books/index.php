<h2 style="text-align:center; margin-bottom: 30px;"><?= esc($title) ?></h2>

<!-- AJAX output display -->
<p id="ajaxBook" style="padding: 15px; background: #fdfdfd; border-left: 4px solid #007BFF; border-radius: 5px; margin-bottom: 30px;"></p>

<?php if ($books_list !== []): ?>
    <div class="book-grid">
        <?php foreach ($books_list as $book): ?>
            <div class="book-card">
                <img src="<?= esc($book['cover_image']) ?>" alt="Cover" class="book-cover">

                <div class="book-details">
                    <h3><?= esc($book['title']) ?></h3>
                    <p><strong>Author:</strong> <?= esc($book['author']) ?></p>
                    <p><strong>Genre:</strong> <?= esc($book['genre']) ?></p>
                    <p><strong>Year:</strong> <?= esc($book['published_year']) ?></p>
                    <p><strong>Rating:</strong> <?= esc($book['rating']) ?></p>
                    <p><?= esc($book['description']) ?></p>
                </div>

                <div class="book-links">
                    <a href="<?= site_url('books/' . esc($book['slug'], 'url')) ?>" class="btn">View Details</a>
                    <button onclick="getBookData('<?= esc($book['slug'], 'url') ?>')" class="btn ajax">View via AJAX</button>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
<?php else: ?>
    <h3>No Books Found</h3>
    <p>Sorry, we couldn't find any books to show.</p>
<?php endif; ?>

<!-- CSS for styling -->
<style>
    .book-grid {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(260px, 1fr));
        gap: 20px;
        margin-top: 20px;
    }

    @media (min-width: 1200px) {
        .book-grid {
            grid-template-columns: repeat(4, 1fr);
        }
    }

    .book-card {
        border: 1px solid #ddd;
        border-radius: 8px;
        padding: 15px;
        background: #fff;
        transition: box-shadow 0.3s ease;
        display: flex;
        flex-direction: column;
        justify-content: space-between;
    }

    .book-card:hover {
        box-shadow: 0 0 10px rgba(0, 123, 255, 0.2);
    }

    .book-cover {
        width: 100%;
        height: 320px;
        object-fit: cover;
        border-radius: 5px;
        margin-bottom: 10px;
    }

    .book-details {
        flex: 1;
    }

    .book-details h3 {
        margin: 10px 0;
        color: #007BFF;
    }

    .book-links {
        margin-top: 15px;
        display: flex;
        justify-content: space-between;
        gap: 10px;
    }

    .btn {
        background-color: #007BFF;
        color: white;
        padding: 8px 14px;
        border: none;
        border-radius: 4px;
        text-decoration: none;
        font-size: 14px;
        cursor: pointer;
    }

    .btn:hover {
        background-color: #0056b3;
    }

    .btn.ajax {
        background-color: #28a745;
    }

    .btn.ajax:hover {
        background-color: #1e7e34;
    }
</style>

<!-- JavaScript to fetch JSON book data -->
<script>
    function getBookData(slug) {
        fetch("https://mi-linux.wlv.ac.uk/~2306946/ci4-book-reviews/public/ajax/get/" + slug)
            .then(response => response.json())
            .then(book => {
                const ajaxOutput = document.getElementById("ajaxBook");
                ajaxOutput.innerHTML =
                    "<strong>" + book.title + "</strong><br>" +
                    "<strong>Author:</strong> " + book.author + "<br>" +
                    "<strong>Genre:</strong> " + book.genre + "<br>" +
                    "<strong>Published Year:</strong> " + book.published_year + "<br>" +
                    "<strong>Rating:</strong> " + book.rating + "<br>" +
                    "<p>" + book.description + "</p>";

                // Smooth scroll to the top of the ajaxBook section
                ajaxOutput.scrollIntoView({ behavior: "smooth", block: "start" });
            })
            .catch(err => {
                console.error(err);
                document.getElementById("ajaxBook").innerHTML = "Error loading book data.";
            });
    }
</script>
