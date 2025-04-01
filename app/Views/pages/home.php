<!DOCTYPE html>
<html lang="ne">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>GyanMala - Nepali Literature</title>
    <!-- Bootstrap 5 CDN -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }

        body {
            background-color: #f5f3ef;
        }

        .hero {
            height: 100vh;
            background: linear-gradient(rgba(0, 0, 0, 0.6), rgba(0, 0, 0, 0.6)),
                        url('https://images.unsplash.com/photo-1495446815901-a7297e633e8d?ixlib=rb-1.2.1&auto=format&fit=crop&w=1350&q=80');
            background-size: cover;
            background-position: center;
            display: flex;
            align-items: center;
            justify-content: center;
            text-align: center;
            color: white;
            padding: 20px;
        }

        .hero-content {
            max-width: 800px;
        }

        h1 {
            font-size: 4rem;
            margin-bottom: 20px;
            font-family: 'Playfair Display', serif;
            text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.7);
        }

        .tagline {
            font-size: 1.5rem;
            margin-bottom: 30px;
            letter-spacing: 1px;
        }

        .cta-button {
            padding: 15px 40px;
            font-size: 1.2rem;
            background-color: #c19a6b;
            color: white;
            border: none;
            border-radius: 30px;
            cursor: pointer;
            transition: all 0.3s ease;
            text-transform: uppercase;
            letter-spacing: 2px;
        }

        .cta-button:hover {
            background-color: #a37d56;
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.2);
        }

        .featured-reviews {
            padding: 50px 20px;
            background-color: #ffffff;
        }

        .reviews-container {
            max-width: 1200px;
            margin: 0 auto;
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
            gap: 30px;
        }

        .review-card {
            background: white;
            border-radius: 10px;
            overflow: hidden;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }

        .review-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.2);
        }

        .book-cover {
            width: 100%;
            height: 400px;
            object-fit: cover;
        }

        .review-content {
            padding: 20px;
        }

        .book-title {
            font-size: 1.3rem;
            margin-bottom: 10px;
            color: #333;
        }

        .book-author {
            color: #666;
            margin-bottom: 15px;
        }

        .review-excerpt {
            color: #444;
            line-height: 1.6;
            margin-bottom: 15px;
        }

        .rating {
            color: #c19a6b;
            font-weight: bold;
        }

        .explore-content {
            background-color: #fff;
            padding: 30px;
            max-width: 900px;
            margin: 50px auto;
            border-radius: 10px;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
            line-height: 1.6;
        }

        @media (max-width: 768px) {
            h1 {
                font-size: 2.5rem;
            }

            .tagline {
                font-size: 1.2rem;
            }

            .cta-button {
                padding: 12px 30px;
                font-size: 1.1rem;
            }

            .hero {
                height: 80vh;
            }

            .reviews-container {
                gap: 20px;
            }

            .review-card {
                padding: 15px;
            }

            .book-title {
                font-size: 1.1rem;
            }

            .review-content {
                padding: 15px;
            }
        }

        /* Navbar Hover Effect */
    .navbar-nav .nav-link:hover {
        color: #ff8800 !important;
        text-decoration: underline;
        transition: all 0.3s ease;
    }

     .section-title {
    text-align: center;
    font-size: 2em;
    margin: 1.5rem 0;
    color: #333;
    font-weight: bold;
}

     
    </style>
</head>
<body>

<!-- Enhanced Bootstrap Navbar -->
<nav class="navbar navbar-expand-lg bg-body-tertiary">   
         <div class="container-fluid">
        <a class="navbar-brand fw-bold text-uppercase" href="#" style="letter-spacing: 1px; color: #a37d56;">GyanMala</a>
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
            <form class="d-flex" role="search" method="get" action="https://mi-linux.wlv.ac.uk/~2306946/ci4-book-reviews/public/googlebooks/search">
    <input class="form-control me-2" type="search" name="q" placeholder="Search Books" aria-label="Search" required>
    <button class="btn btn-outline-success" type="submit">Search</button>
</form>
            <a href="https://mi-linux.wlv.ac.uk/~2306946/ci4-book-reviews/public/user" class="ms-3">
                <img src="https://cdn-icons-png.flaticon.com/512/149/149071.png" alt="User" width="32" height="32" class="rounded-circle border border-1 border-secondary shadow-sm">
            </a>
        </div>
    </div>
</nav>

<!-- Hero Section -->
<section class="hero">
    <div class="hero-content">
        <h1>GyanMala</h1>
        <p class="tagline">"From the Peaks of the Himalayas to the Depths of Mystery  Experience the Wonders of Nepali Literature."</p>
        <button class="cta-button" onclick="showExploreContent()">Explore Categories</button>
    </div>
</section>

<!-- Featured Reviews -->
<section class="featured-reviews">
    <!-- Centered Title -->
    <h2 class="section-title">Pillars of Nepali Literature</h2>

    <div class="reviews-container">
        <!-- Author Cards -->
        <div class="review-card">
            <img src="https://mi-linux.wlv.ac.uk/~2306946/ci4-book-reviews/public/uploads/1h.jpeg" class="book-cover" alt="Parijat">            <div class="review-content">
                <h3 class="book-title">Parijat</h3>
                <p class="book-author">Real Name: Bishnu Kumari Waiba</p>
                <p class="review-excerpt">A revolutionary writer known for her novel <em>Shirish Ko Phool</em>, Parijat’s works explore themes of existentialism, feminism, and Nepali society.</p>
            </div>
        </div>

        <div class="review-card">
            <img src="https://mi-linux.wlv.ac.uk/~2306946/ci4-book-reviews/public/uploads/2h.jpeg" class="book-cover" alt="Laxmi Prasad Devkota">
            <div class="review-content">
                <h3 class="book-title">The "Mahakavi" of Nepal</h3> 
                <p class="book-author">Real Name: Laxmi Prasad Devkota</p>
                <p class="review-excerpt">A literary genius, Devkota wrote classics like <em>Muna Madan</em>, redefining Nepali poetry and storytelling with profound emotional depth.</p>
            </div>
        </div>

        <div class="review-card">
            <img src="https://mi-linux.wlv.ac.uk/~2306946/ci4-book-reviews/public/uploads/3h.jpeg" class="book-cover" alt="B.P. Koirala">
            <div class="review-content">
                <h3 class="book-title">B.P. Koirala</h3>
                <p class="book-author">A Writer and Political Visionary</p>
                <p class="review-excerpt">An influential novelist and statesman, Koirala’s works like <em>Sumnima</em> and <em>Hitler ra Yahudi</em> showcase deep psychological and philosophical themes.</p>
            </div>
        </div>
    </div>
</section>
<!-- Explore Section -->
<div id="explore-section" class="explore-content" style="display: none;">
    <h2>Explore Nepali Literature</h2>
    <p>Welcome to GyanMala, a place where you can dive deep into various genres of Nepali literature. Whether you are a fan of classic poetry, thrilling horror, captivating mystery, heartwarming romance, or exploring historical tales, we have something for every literature enthusiast!</p>
    
    <p><strong>Poetry:</strong> Enjoy the timeless beauty of Nepali poetry, filled with deep emotions and cultural resonance.</p>
    <p><strong>Horror:</strong> Experience the chilling and spine-tingling stories that will keep you awake at night.</p>
    <p><strong>Mystery:</strong> Immerse yourself in gripping mysteries and thrilling tales that will keep you guessing till the end.</p>
    <p><strong>Romance:</strong> Fall in love with beautiful romantic stories that touch the heart and soul.</p>
    <p><strong>Historical:</strong> Explore historical events and figures through the power of storytelling and narration.</p>

    <p>So, what are you waiting for? Start exploring the categories now and get lost in the world of Nepali literature!</p>
</div>

<!-- Bootstrap JS Bundle -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

<script>
    function showExploreContent() {
        const section = document.getElementById('explore-section');
        section.style.display = 'block';
        section.scrollIntoView({ behavior: 'smooth' });
    }
</script>

</body>
</html>
