@extends('layouts.front')
@section('content')
<header>
    <h1>Master Guide Tools</h1>
    <p>
        A friendly mobile app designed for youth leaders and members to explore training materials, track progress, and discover resources for junior leadership development.
    </p>
</header>

<main>
    <section class="grid">
        <article class="card">
            <span class="badge">Who it's for</span>
            <h3>Club Leaders & Members</h3>
            <p>
                This app supports club members, leaders, and volunteers with structured learning modules, award tracking, and role-based content paths.
            </p>
        </article>

        <article class="card">
            <span class="badge">Key benefit</span>
            <h3>Learn with Confidence</h3>
            <p>
                Users can read lessons, explore articles, and access resources all in one place (even offline). The app helps people stay organized and focused.
            </p>
        </article>

        <article class="card">
            <span class="badge">Easy to use</span>
            <h3>Clear Navigation</h3>
            <p>
                The home screen offers simple tabs for Books, Resources, Articles, Class progress, Account, and Settings.
            </p>
        </article>

        <article class="card">
            <span class="badge">Support features</span>
            <h3>Personalized Experience</h3>
            <p>
                Users can log in to view their own dashboard, track progress, and save preferences like dark mode and font size.
            </p>
        </article>
    </section>

    <section style="margin-top: 44px;">
        <div class="card">
            <h3>How It Works</h3>
            <p>
                The app guides users through a training path with easy-to-read lessons and award tracking. It includes a user-friendly onboarding experience, and it adapts to different screen sizes for mobile and tablet.
            </p>
            <ul style="margin: 0; padding-left: 18px; color: var(--muted);">
                <li>Sign in to access member-only content</li>
                <li>Explore training materials organized by topic</li>
                <li>Track awards and progress in your dashboard</li>
                <li>Switch between light and dark modes</li>
            </ul>
        </div>
    </section>

    <section style="margin-top: 44px;">
        <div class="card">
            <h3>Built For Growth</h3>
            <p>
                Master Guide Tools is designed to be easy for beginners, yet capable enough for leaders that want reliable resources in their pocket.
            </p>
            <p>
                With a focus on clarity, the app uses simple language, clean layout, and big touch targets so anyone can use it without training.
            </p>
        </div>
    </section>
</main>

<footer>
    <p>Need help? Your team can customize the app further with new lessons, modules, and local resources.</p>
</footer>

@endsection