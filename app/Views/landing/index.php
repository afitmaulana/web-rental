<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Iwi Rentoos - Rental Kostum</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">
    
    <style>
        /* CSS Reset and Global Styles */
        :root {
            --dark-bg: #111111;
            --card-bg: #333333;
            --text-light: #f0f0f0;
            --text-secondary: #aaaaaa;
            --accent-color: #8A2BE2;
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Poppins', sans-serif;
            background-color: var(--dark-bg);
            color: var(--text-light);
            overflow-x: hidden;
        }

        a {
            color: inherit;
            text-decoration: none;
        }

        /* Header / Navigation Bar */
        header {
            background-color: rgba(17, 17, 17, 0.8);
            backdrop-filter: blur(10px);
            padding: 1rem 0;
            position: fixed;
            width: 100%;
            top: 0;
            z-index: 1000;
            border-bottom: 1px solid #222;
        }

        .nav-container {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 0 5%;
        }

        .logo {
            font-size: 1.5rem;
            font-weight: 700;
            z-index: 1001; /* Agar logo tetap di atas saat menu mobile aktif */
        }

        .logo span {
            color: var(--accent-color);
        }
        
        nav {
            display: flex;
            align-items: center;
        }

        nav ul {
            display: flex;
            list-style: none;
            gap: 2rem;
        }

        nav a {
            font-weight: 500;
            font-size: 0.9rem;
            padding: 0.5rem 1rem;
            border-radius: 5px;
            transition: background-color 0.3s, color 0.3s;
        }

        nav a.active,
        nav a:hover {
            background-color: var(--accent-color);
            color: var(--text-light);
        }

        .header-right {
            display: flex;
            align-items: center;
            gap: 1.5rem;
        }

        .search-bar {
            position: relative;
        }

        .search-bar input {
            background-color: var(--card-bg);
            border: 1px solid #444;
            border-radius: 20px;
            padding: 0.5rem 1rem 0.5rem 2.5rem;
            color: var(--text-light);
            width: 200px;
        }

        .search-bar .search-icon {
            position: absolute;
            left: 15px;
            top: 50%;
            transform: translateY(-50%);
            color: var(--text-secondary);
        }

        .menu-toggle {
            display: none; /* Sembunyikan di desktop */
            flex-direction: column;
            gap: 5px;
            cursor: pointer;
            z-index: 1001;
        }

        .menu-toggle .bar {
            width: 25px;
            height: 3px;
            background-color: var(--text-light);
            border-radius: 2px;
            transition: all 0.3s ease-in-out;
        }

        /* Animasi Tombol Menu (Hamburger ke X) */
        .menu-toggle.active .bar:nth-child(1) {
            transform: translateY(8px) rotate(45deg);
        }
        .menu-toggle.active .bar:nth-child(2) {
            opacity: 0;
        }
        .menu-toggle.active .bar:nth-child(3) {
            transform: translateY(-8px) rotate(-45deg);
        }


        /* Hero Section */
       .hero {
            position: relative;
            width: 100%;
            height: 100vh;
            overflow: hidden;
            margin-top: 70px;
        }

        .hero-slider {
            width: 100%;
            height: 100%;
            position: relative;
        }

        .hero-slide {
            position: absolute;
            inset: 0;
            opacity: 0;
            transition: opacity 0.8s ease;
        }

        .hero-slide.active {
            opacity: 1;
        }

        .hero-slide img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        .hero-caption {
            position: absolute;
            bottom: 80px;
            left: 5%;
            color: white;
            max-width: 600px;
            text-shadow: 0 2px 10px rgba(0,0,0,0.8);
        }

        .hero-caption h1 {
            font-size: 2rem;
            margin-bottom: 1rem;
        }

        .hero-caption p {
            font-size: 1.2rem;
        }

        .slider-dots {
            position: absolute;
            bottom: 30px;
            left: 50%;
            transform: translateX(-50%);
            display: flex;
            gap: 12px;
        }

        .dot {
            width: 12px;
            height: 12px;
            border-radius: 50%;
            background: rgba(255,255,255,0.5);
            cursor: pointer;
        }

        .dot.active {
            width: 30px;
            border-radius: 6px;
            background: orange;
        }

        /* Product Section */
        .product-section {
            padding: 3rem 0;
            width: 100%;
            /* Properti untuk animasi */
            opacity: 0;
            transform: translateY(50px);
            transition: opacity 0.6s ease-out, transform 0.6s ease-out;
        }

        /* Kelas untuk memicu animasi */
        .product-section.visible, footer.visible {
            opacity: 1;
            transform: translateY(0);
        }


        .section-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 0 5%;
            margin-bottom: 1.5rem;
        }

        .section-header h2 {
            font-size: 1.8rem;
        }

        .carousel-wrapper {
            position: relative;
        }

        .carousel {
            display: flex;
            gap: 1.5rem;
            overflow-x: auto;
            padding: 0 5%;
            scroll-behavior: smooth;
            -ms-overflow-style: none;
            scrollbar-width: none;
        }

        .carousel::-webkit-scrollbar {
            display: none;
        }

        .card {
            flex: 0 0 180px;
            text-align: center;
        }

        .card-image {
    width: 100%;
    height: 240px;
    background-color: var(--card-bg);
    border-radius: 10px;
    margin-bottom: 1rem;
    overflow: hidden; /* Penting untuk memotong gambar */
    position: relative;
}

/* Membuat lapisan gambar menggunakan pseudo-element ::before */
.card-image::before {
    content: '';
    position: absolute;
    inset: 0;
    background-image: url('https://via.placeholder.com/180x240/555/FFFFFF?text=Image');
    background-size: cover;
    background-position: center;
    
    /* Kondisi Awal: Gambar sedikit diperbesar */
    transform: scale(1.15);
    /* Transisi untuk animasi yang halus */
    transition: transform 0.4s ease-out;
}

/* Gaya ini akan aktif HANYA JIKA class .card-hovered ditambahkan oleh JS */
.card.card-hovered .card-image::before {
    /* Gambar kembali ke ukuran normal (efek zoom out) */
    transform: scale(1);
}

        .card-title {
            font-weight: 500;
            color: var(--text-secondary);
        }

        .scroll-arrow {
            position: absolute;
            top: 50%;
            transform: translateY(-50%);
            background-color: rgba(138, 43, 226, 0.7);
            color: white;
            width: 40px;
            height: 40px;
            border-radius: 50%;
            display: flex;
            justify-content: center;
            align-items: center;
            font-size: 1.5rem;
            cursor: pointer;
            z-index: 10;
            transition: background-color 0.3s;
        }

        .scroll-arrow:hover {
            background-color: var(--accent-color);
        }

        .scroll-arrow.left {
            left: 2%;
        }

        .scroll-arrow.right {
            right: 2%;
        }

        /* Footer */
        footer {
            text-align: center;
            padding: 4rem 2rem 2rem;
            border-top: 1px solid #222;
            margin-top: 2rem;
            /* Properti untuk animasi */
            opacity: 0;
            transform: translateY(50px);
            transition: opacity 0.6s ease-out, transform 0.6s ease-out;
        }

        .social-icons {
            margin-bottom: 1rem;
            font-size: 1.5rem;
            display: flex;
            justify-content: center;
            gap: 1rem;
        }

        footer p {
            color: var(--text-secondary);
            font-size: 0.9rem;
            line-height: 1.6;
            margin-bottom: 2rem;
        }

        .footer-logo {
            font-size: 2rem;
            font-weight: 700;
            margin-top: 1rem;
        }

        /* =========================================== */
        /* RESPONSIVE DESIGN (MOBILE)        */
        /* =========================================== */
        @media (max-width: 992px) {
            .search-bar input {
                width: 150px;
            }
            nav ul {
                gap: 1rem;
            }
        }


        @media (max-width: 768px) {
            .menu-toggle {
                display: flex; /* Tampilkan tombol menu */
            }

            .header-right {
                gap: 1rem;
            }

            .search-bar {
                display: none; /* Sembunyikan search bar di mobile untuk simpel */
            }

            nav ul {
                position: fixed;
                right: 0;
                top: 0;
                width: 70%;
                height: 100vh;
                background-color: var(--dark-bg);
                flex-direction: column;
                justify-content: center;
                align-items: center;
                gap: 2rem;
                transform: translateX(100%);
                transition: transform 0.3s ease-in-out;
            }

            nav.active ul {
                transform: translateX(0);
            }
            
            .hero-caption h1 {
                font-size: 1.5rem;
            }

            .hero-caption p {
                font-size: 1rem;
            }
            
            .scroll-arrow {
                display: none; /* Sembunyikan panah di mobile, scroll manual lebih natural */
            }
        }

    </style>

</head>

<body>

    <header>
        <div class="nav-container">
            <div class="logo">
                <img src="<?= base_url('assets/images/logo.png') ?>" alt="Livy Rentcos" style="height:60px;">
            </div>
            <nav>
                <ul>
                    <li><a href="#" class="active">HOME</a></li>
                    <li><a href="#">SYARAT&KETENTUAN</a></li>
                    <li><a href="#">CONTACT</a></li>
                    <li><a href="#">ADMIN</a></li>
                </ul>
            </nav>
            <div class="header-right">
                <div class="search-bar">
                    <i class="search-icon">🔍</i>
                    <input type="text" placeholder="Search" />
                </div>
                <div class="menu-toggle">
                    <div class="bar"></div>
                    <div class="bar"></div>
                    <div class="bar"></div>
                </div>
            </div>
        </div>
    </header>

    <section class="hero">
        <div class="hero-slider">
            <div class="hero-slide active">
                <img src="<?= base_url('assets/images/banner1.png') ?>" alt="Hero 1">
                <div class="hero-caption">
                    <h1>RENTAL KOSTUM COSPLAY MURAH PEKALONGAN JATENG</h1>
                    <p>Harga Pelajar Friendly - Bisa Rental Pisahan</p>
                </div>
            </div>
            <div class="hero-slide">
                <img src="<?= base_url('assets/images/banner2.jpg') ?>" alt="Hero 2">
                <div class="hero-caption">
                    <h1>KOSTUM TERBARU</h1>
                    <p>Koleksi kostum anime, game, dan karakter favoritmu</p>
                </div>
            </div>
        </div>

        <div class="slider-dots">
            <div class="dot active"></div>
            <div class="dot"></div>
        </div>
    </section>

    <section class="product-section">
    <div class="section-header">
        <h2>DAFTAR KOSTUM</h2>
    </div>
    <div class="carousel-wrapper">
        <div class="scroll-arrow left">&lt;</div>
        <div class="carousel">
            <div class="card">
                <div class="card-image"></div>
                <p class="card-title">TOMIOKA GIYU</p>
            </div>
            <div class="card">
                <div class="card-image"></div>
                <p class="card-title">HIMMEL</p>
            </div>
            <div class="card">
                <div class="card-image"></div>
                <p class="card-title">FRIEREN</p>
            </div>
            <div class="card">
                <div class="card-image"></div>
                <p class="card-title">GOJO SATORU</p>
            </div>
            <div class="card">
                <div class="card-image"></div>
                <p class="card-title">ASTA</p>
            </div>
            <div class="card">
                <div class="card-image"></div>
                <p class="card-title">YOR FORGER</p>
            </div>
        </div>
        <div class="scroll-arrow right">&gt;</div>
    </div>
</section>

<section class="product-section">
    <div class="section-header">
        <h2>PROPS</h2>
    </div>
    <div class="carousel-wrapper">
        <div class="scroll-arrow left">&lt;</div>
        <div class="carousel">
            <div class="card"><div class="card-image"></div><p class="card-title">KATANA</p></div>
            <div class="card"><div class="card-image"></div><p class="card-title">HIMMEL SWORD</p></div>
            <div class="card"><div class="card-image"></div><p class="card-title">RING ELEMENTAL</p></div>
            <div class="card"><div class="card-image"></div><p class="card-title">JADE SPEAR</p></div>
            <div class="card"><div class="card-image"></div><p class="card-title">CYBER SWORD</p></div>
        </div>
        <div class="scroll-arrow right">&gt;</div>
    </div>
</section>

    <footer>
        <div class="social-icons">
            <i>📷</i>
            <i>👍</i>
        </div>
        <p>
            RENTAL KOSTUM COSPLAY MURAH PEKALONGAN JATENG<br>
            Harga Pelajar Friendly - BISA RENTAL PISAHAN<br>
            Kajen Pekalongan Jawa Tengah<br>
            First rental friendly
        </p>
        <div class="footer-logo">Livy! <span>Rentcos!</span></div>
    </footer>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            /* ================================================= */
            /* NAVBAR TOGGLE UNTUK MOBILE               */
            /* ================================================= */
            const menuToggle = document.querySelector('.menu-toggle');
            const nav = document.querySelector('nav');

            menuToggle.addEventListener('click', () => {
                nav.classList.toggle('active');
                menuToggle.classList.toggle('active');
            });


            /* ================================================= */
            /* ANIMASI SAAT SCROLL (INTERSECTION OBSERVER) */
            /* ================================================= */
            const observer = new IntersectionObserver((entries) => {
                entries.forEach((entry) => {
                    if (entry.isIntersecting) {
                        entry.target.classList.add('visible');
                    }
                });
            }, {
                threshold: 0.1 // Muncul saat 10% bagian terlihat
            });

            const sectionsToAnimate = document.querySelectorAll('.product-section, footer');
            sectionsToAnimate.forEach((el) => observer.observe(el));


            /* HERO SLIDER (Kode Asli) */
            let currentSlide = 0;
            const slides = document.querySelectorAll('.hero-slide');
            const dots = document.querySelectorAll('.dot');

            function showSlide(index) {
                slides.forEach((slide, i) => {
                    slide.classList.remove('active');
                    dots[i].classList.remove('active');
                });
                slides[index].classList.add('active');
                dots[index].classList.add('active');
                currentSlide = index;
            }

            // Auto slide
            setInterval(() => {
                let nextSlide = (currentSlide + 1) % slides.length;
                showSlide(nextSlide);
            }, 4000);

            // Click dot
            dots.forEach((dot, i) => {
                dot.addEventListener('click', () => showSlide(i));
            });

            /* PRODUCT CAROUSEL (Kode Asli, sedikit perbaikan) */
            document.querySelectorAll('.carousel-wrapper').forEach(wrapper => {
                const carousel = wrapper.querySelector('.carousel');
                // Tombol panah kiri dan kanan sekarang berfungsi
                const leftArrow = wrapper.querySelector('.scroll-arrow.left');
                const rightArrow = wrapper.querySelector('.scroll-arrow.right');
                
                if(rightArrow) {
                    rightArrow.addEventListener('click', () => {
                        carousel.scrollBy({ left: 300, behavior: 'smooth' });
                    });
                }
                
                if(leftArrow) {
                    leftArrow.addEventListener('click', () => {
                        carousel.scrollBy({ left: -300, behavior: 'smooth' });
                    });
                }
            });
        });
        
    </script>

</body>
</html>