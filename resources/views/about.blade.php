@extends('layouts.front')
@section('content')
<header>
    <h1>About Master Guide Tools</h1>
    <p>
        Learn more about our mission to empower youth leaders worldwide.
    </p>
</header>

<main>
    <section class="grid">
        <article class="card">
            <svg class="about-icon" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                <path d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm-2 15l-5-5 1.41-1.41L10 14.17l7.59-7.59L19 8l-9 9z" fill="var(--primary)"/>
            </svg>
            <h3>Our Mission</h3>
            <p>
                To provide accessible, high-quality training resources that help young people develop leadership skills and make a positive impact in their communities.
            </p>
        </article>

        <article class="card">
            <svg class="about-icon" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                <path d="M16 4c0-1.11-.89-2-2-2h-4c-1.11 0-2 .89-2 2v4H5c-1.11 0-2 .89-2 2v11c0 1.11.89 2 2 2h14c1.11 0 2-.89 2-2V10c0-1.11-.89-2-2-2h-3V4zm-6 2h4V4h-4v2zm8 7v7H6v-7h12z" fill="var(--primary)"/>
            </svg>
            <h3>Our Story</h3>
            <p>
                Founded by experienced youth leaders, Master Guide Tools was created to address the need for organized, mobile-friendly training materials in youth organizations.
            </p>
        </article>

        <article class="card">
            <svg class="about-icon" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                <path d="M12 12c2.21 0 4-1.79 4-4s-1.79-4-4-4-4 1.79-4 4 1.79 4 4 4zm0 2c-2.67 0-8 1.34-8 4v2h16v-2c0-2.66-5.33-4-8-4z" fill="var(--primary)"/>
            </svg>
            <h3>Our Team</h3>
            <p>
                A dedicated team of educators, developers, and youth workers committed to creating tools that inspire and equip the next generation of leaders.
            </p>
        </article>
    </section>

    <section style="margin-top: 44px;">
        <div class="card">
            <h3>Why Choose Master Guide Tools?</h3>
            <ul style="margin: 0; padding-left: 18px; color: var(--muted);">
                <li>Comprehensive curriculum covering essential leadership skills</li>
                <li>User-friendly mobile app with offline capabilities</li>
                <li>Progress tracking and award system to motivate learners</li>
                <li>Customizable content for different organizations and cultures</li>
                <li>Regular updates with new materials and features</li>
            </ul>
        </div>
    </section>
</main>

<footer>
    <p>Have questions? <a href="/contact">Contact us</a> to learn more.</p>
</footer>

<style>
    .about-icon {
        width: 64px;
        height: 64px;
        margin-bottom: 16px;
    }
</style>
@endsection