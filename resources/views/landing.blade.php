@extends('layouts.front')
@section('content')
<header>
    <h1>Welcome to Master Guide Tools</h1>
    <p>
        Empowering youth leaders with comprehensive training materials, progress tracking, and essential resources for junior leadership development.
    </p>
    <a href="#features" class="cta-button">Get Started</a>
</header>

<main>
    <section class="hero-section">
        <div class="hero-content">
            <div class="hero-text">
                <h2>Transform Your Leadership Journey</h2>
                <p>Discover a world of structured learning, community support, and personalized growth opportunities designed specifically for youth leaders like you.</p>
                <div class="hero-stats">
                    <div class="stat">
                        <span class="stat-number">500+</span>
                        <span class="stat-label">Lessons</span>
                    </div>
                    <div class="stat">
                        <span class="stat-number">10K+</span>
                        <span class="stat-label">Leaders</span>
                    </div>
                    <div class="stat">
                        <span class="stat-number">50+</span>
                        <span class="stat-label">Countries</span>
                    </div>
                </div>
            </div>
            <div class="hero-visual">
                <svg class="hero-svg" viewBox="0 0 400 300" xmlns="http://www.w3.org/2000/svg">
                    <defs>
                        <linearGradient id="heroGradient" x1="0%" y1="0%" x2="100%" y2="100%">
                            <stop offset="0%" style="stop-color:var(--primary);stop-opacity:0.1" />
                            <stop offset="100%" style="stop-color:#50c878;stop-opacity:0.1" />
                        </linearGradient>
                    </defs>
                    <rect width="400" height="300" fill="url(#heroGradient)" rx="20" />
                    <circle cx="150" cy="120" r="30" fill="var(--primary)" opacity="0.8" />
                    <circle cx="250" cy="120" r="30" fill="var(--primary)" opacity="0.8" />
                    <circle cx="200" cy="180" r="30" fill="var(--primary)" opacity="0.8" />
                    <path d="M130 150 Q150 130 170 150 Q190 170 210 150 Q230 130 250 150 Q270 170 290 150" stroke="var(--primary)" stroke-width="3" fill="none" opacity="0.6" />
                    <text x="200" y="250" text-anchor="middle" fill="var(--dark)" font-size="18" font-weight="bold">Learn • Grow • Lead</text>
                </svg>
            </div>
        </div>
    </section>

    <section id="features" class="grid">
        <article class="card">
            <svg class="feature-icon" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                <path d="M12 2l3.09 6.26L22 9.27l-5 4.87 1.18 6.88L12 17.77l-6.18 3.25L7 14.14 2 9.27l6.91-1.01L12 2z" fill="var(--primary)" />
            </svg>
            <h3>Personalized Dashboard</h3>
            <p>Track your progress, view completed lessons, and manage your account settings.</p>
        </article>

        <article class="card">
            <svg class="feature-icon" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                <path d="M9 11H7v2h2v-2zm4 0h-2v2h2v-2zm4 0h-2v2h2v-2zm2-7h-1V2h-2v2H8V2H6v2H5c-1.1 0-1.99.9-1.99 2L3 20c0 1.1.89 2 2 2h14c1.1 0 2-.9 2-2V6c0-1.1-.9-2-2-2zm0 16H5V9h14v11z" fill="var(--primary)" />
            </svg>
            <h3>Rich Content Library</h3>
            <p>Explore articles, resources, and training materials organized by topic.</p>
        </article>

        <article class="card">
            <svg class="feature-icon" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                <path d="M16 1H4c-1.1 0-2 .9-2 2v14h2V3h12V1zm3 4H8c-1.1 0-2 .9-2 2v14c0 1.1.9 2 2 2h11c1.1 0 2-.9 2-2V7c0-1.1-.9-2-2-2zm0 16H8V7h11v14z" fill="var(--primary)" />
            </svg>
            <h3>Adaptive Interface</h3>
            <p>Switch between light and dark modes, adjust font sizes, and enjoy a responsive design.</p>
        </article>
    </section>

    <section class="cta-section">
        <div class="card">
            <h3>Ready to Start Your Journey?</h3>
            <p>Join thousands of youth leaders who are building their skills with Master Guide Tools.</p>
            <a href="/download-app" class="cta-button" target="_blank"><i class="fab fa-google-play"></i> Download Now</a>
        </div>
    </section>
</main>

<footer>
    <p>&copy; 2024 Master Guide Tools. Empowering the next generation of leaders.</p>
</footer>

<style>
    .cta-button {
        display: inline-block;
        padding: 12px 24px;
        background: var(--primary);
        color: var(--light);
        border-radius: var(--radius);
        font-weight: 600;
        text-decoration: none;
        transition: background 0.3s;
        margin-top: 20px;
    }

    .cta-button:hover {
        background: #1e6b1e;
    }

    .carousel-section {
        margin: 48px 0;
    }

    .carousel {
        position: relative;
        max-width: 800px;
        margin: 0 auto;
        overflow: hidden;
        border-radius: var(--radius);
        box-shadow: var(--shadow);
    }

    .carousel-inner {
        display: flex;
        transition: transform 0.5s ease;
    }

    .carousel-item {
        min-width: 100%;
        display: none;
    }

    .carousel-item.active {
        display: block;
    }

    .carousel-content {
        padding: 60px 40px;
        text-align: center;
        background: var(--card);
    }

    .carousel-svg {
        width: 80px;
        height: 80px;
        margin-bottom: 20px;
    }

    .carousel-control {
        position: absolute;
        top: 50%;
        transform: translateY(-50%);
        background: rgba(255, 255, 255, 0.8);
        border: none;
        width: 40px;
        height: 40px;
        border-radius: 50%;
        cursor: pointer;
        font-size: 18px;
        color: var(--dark);
        transition: background 0.3s;
    }

    .carousel-control:hover {
        background: var(--light);
    }

    .prev {
        left: 10px;
    }

    .next {
        right: 10px;
    }

    .carousel-indicators {
        position: absolute;
        bottom: 20px;
        left: 50%;
        transform: translateX(-50%);
        display: flex;
    }

    .indicator {
        width: 12px;
        height: 12px;
        border-radius: 50%;
        background: rgba(0, 0, 0, 0.3);
        margin: 0 5px;
        cursor: pointer;
        transition: background 0.3s;
    }

    .indicator.active {
        background: var(--primary);
    }

    .feature-icon {
        width: 48px;
        height: 48px;
        margin-bottom: 16px;
    }

    .cta-section {
        margin-top: 48px;
        text-align: center;
    }

    .cta-section .card {
        max-width: 600px;
        margin: 0 auto;
    }

    .hero-section {
        padding: 80px 24px;
        background: linear-gradient(135deg, var(--bg) 0%, rgba(34, 139, 34, 0.05) 100%);
        margin-bottom: 48px;
    }

    .hero-content {
        max-width: 1200px;
        margin: 0 auto;
        display: grid;
        grid-template-columns: 1fr 1fr;
        gap: 60px;
        align-items: center;
    }

    .hero-text h2 {
        font-size: clamp(2rem, 4vw, 3rem);
        margin-bottom: 20px;
        color: var(--dark);
        line-height: 1.2;
    }

    .hero-text p {
        font-size: 1.2rem;
        color: var(--muted);
        margin-bottom: 30px;
        line-height: 1.6;
    }

    .hero-stats {
        display: flex;
        gap: 40px;
        margin-bottom: 30px;
    }

    .stat {
        text-align: center;
    }

    .stat-number {
        display: block;
        font-size: 2.5rem;
        font-weight: bold;
        color: var(--primary);
    }

    .stat-label {
        font-size: 0.9rem;
        color: var(--muted);
        text-transform: uppercase;
        letter-spacing: 1px;
    }

    .cta-button-secondary {
        display: inline-block;
        padding: 14px 28px;
        background: transparent;
        color: var(--primary);
        border: 2px solid var(--primary);
        border-radius: var(--radius);
        font-weight: 600;
        text-decoration: none;
        transition: all 0.3s;
    }

    .cta-button-secondary:hover {
        background: var(--primary);
        color: var(--light);
    }

    .hero-visual {
        text-align: center;
    }

    .hero-svg {
        width: 100%;
        max-width: 400px;
        height: auto;
    }

    @media (max-width: 768px) {
        .hero-content {
            grid-template-columns: 1fr;
            gap: 40px;
            text-align: center;
        }

        .hero-stats {
            justify-content: center;
            gap: 30px;
        }

        .hero-section {
            padding: 60px 24px;
        }

        .carousel-content {
            padding: 40px 20px;
        }

        .carousel-svg {
            width: 60px;
            height: 60px;
        }

        .carousel-control {
            width: 35px;
            height: 35px;
            font-size: 16px;
        }
    }
</style>

<script>
    let currentSlide = 0;
    const slides = document.querySelectorAll('.carousel-item');
    const indicators = document.querySelectorAll('.indicator');

    function showSlide(index) {
        slides.forEach(slide => slide.classList.remove('active'));
        indicators.forEach(ind => ind.classList.remove('active'));

        slides[index].classList.add('active');
        indicators[index].classList.add('active');
    }

    function nextSlide() {
        currentSlide = (currentSlide + 1) % slides.length;
        showSlide(currentSlide);
    }

    function prevSlide() {
        currentSlide = (currentSlide - 1 + slides.length) % slides.length;
        showSlide(currentSlide);
    }

    function goToSlide(index) {
        currentSlide = index;
        showSlide(currentSlide);
    }

    // Auto slide
    setInterval(nextSlide, 5000);
</script>
@endsection