<!DOCTYPE html>
<html lang="ne">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>About Us - GyanMala</title>
    <link href="https://unpkg.com/ionicons@4.5.10-0/dist/css/ionicons.min.css" rel="stylesheet">
    <style>
        :root {
            --primary-color: #c19a6b;
            --secondary-color: #2e4a4d;
            --accent-color: #e8d8c4;
            --text-color: #333;
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Merriweather', serif;
        }

        body {
            background: linear-gradient(45deg, #f5f3ef, #f0ede6);
            color: var(--text-color);
            line-height: 1.8;
        }

        header {
            background: linear-gradient(rgba(44,62,80,0.8), rgba(44,62,80,0.8)),
                        url('https://images.unsplash.com/photo-1497633762265-9d179a990aa6?ixlib=rb-1.2.1&auto=format&fit=crop&w=1352&q=80');
            background-size: cover;
            background-position: center;
            color: white;
            padding: 80px 20px 120px;
            text-align: center;
            position: relative;
        }

        header h1 {
            font-size: 3rem;
            font-family: 'Playfair Display', serif;
            margin-bottom: 20px;
            text-shadow: 2px 2px 4px rgba(0,0,0,0.3);
        }

        .header-wave svg {
            position: absolute;
            bottom: -1px;
            left: 0;
            width: 100%;
            height: auto;
        }

        .about-section {
            max-width: 1200px;
            margin: -60px auto 50px;
            background: rgba(255,255,255,0.95);
            padding: 40px;
            border-radius: 15px;
            box-shadow: 0 10px 30px rgba(0,0,0,0.1);
            backdrop-filter: blur(10px);
        }

        .about-section h2 {
            font-size: 2rem;
            color: var(--secondary-color);
            margin-bottom: 30px;
            text-align: center;
            position: relative;
        }

        .about-section h2::after {
            content: '';
            position: absolute;
            bottom: -10px;
            left: 50%;
            transform: translateX(-50%);
            width: 80px;
            height: 3px;
            background: var(--primary-color);
        }

        .about-card {
            display: flex;
            flex-direction: column;
            gap: 20px;
            margin-bottom: 40px;
        }

        .about-card img {
            width: 100%;
            border-radius: 15px;
            box-shadow: 0 8px 15px rgba(0,0,0,0.1);
        }

        .mission-vision {
            display: grid;
            grid-template-columns: 1fr;
            gap: 20px;
            margin: 30px 0;
        }

        .mv-card {
            background: white;
            padding: 25px;
            border-radius: 15px;
            text-align: center;
            transition: transform 0.3s ease;
            border: 2px solid var(--accent-color);
        }

        .mv-card:hover {
            transform: translateY(-8px);
        }

        .mv-card i {
            font-size: 2rem;
            color: var(--primary-color);
            margin-bottom: 15px;
        }

        footer {
            text-align: center;
            padding: 30px 20px;
            background: var(--secondary-color);
            color: white;
        }

        .social-links a {
            color: white;
            font-size: 1.5rem;
            margin: 0 10px;
            transition: color 0.3s ease;
        }

        .social-links a:hover {
            color: var(--primary-color);
        }

        @media (min-width: 768px) {
            .about-card {
                flex-direction: row;
                align-items: center;
            }

            .mission-vision {
                grid-template-columns: repeat(2, 1fr);
            }

            header h1 {
                font-size: 3.5rem;
            }

            .about-section h2 {
                font-size: 2.5rem;
            }
        }

        @media (min-width: 992px) {
            header {
                padding: 100px 20px 150px;
            }
        }
    </style>
</head>
<body>

    <header>
        <h1>About GyanMala</h1>
        <div class="header-wave">
            <svg viewBox="0 0 1200 120" xmlns="http://www.w3.org/2000/svg"><path d="M985.66,92.83C906.67,72,823.78,31,743.84,14.19c-82.26-17.34-168.06-16.33-250.45.39-57.84,11.73-114,31.07-172,41.86A600.21,600.21,0,0,1,0,27.35V120H1200V95.8C1132.19,118.92,1055.71,111.31,985.66,92.83Z" fill="#ffffff"></path></svg>
        </div>
    </header>

    <section class="about-section">
        <h2>Who We Are</h2>
        <div class="about-card">
            <img src="#" alt="Nepali Literature">
            <div>
                <p><strong>GyanMala</strong> is dedicated to Nepali literature, honoring the voices shaping our literary landscape.</p>
                <p>Our platform offers curated reviews and spotlights on influential Nepali writers, making literature accessible to all.</p>
            </div>
        </div>

        <div class="mission-vision">
            <div class="mv-card">
                <i class="icon ion-md-compass"></i>
                <h3>Our Mission</h3>
                <p>Promote and preserve Nepali literature through an engaging digital experience.</p>
            </div>
            <div class="mv-card">
                <i class="icon ion-md-eye"></i>
                <h3>Our Vision</h3>
                <p>Become Nepal's leading literary content platform, nurturing creativity and cultural heritage.</p>
            </div>
        </div>

        <h2>Our Philosophy</h2>
        <p>We believe in literature's power to connect and inspire, bridging Nepal’s literary heritage with its future.</p>
    </section>

</body>
</html>