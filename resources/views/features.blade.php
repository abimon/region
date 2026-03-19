@extends('layouts.front')
@section('content')
<header>
    <h1>Features of Master Guide Tools</h1>
    <p>
        Discover the powerful features designed to enhance your leadership training experience.
    </p>
</header>

<main>
    <section class="grid">
        <article class="card">
            <svg class="feature-icon-large" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                <path d="M12 2l3.09 6.26L22 9.27l-5 4.87 1.18 6.88L12 17.77l-6.18 3.25L7 14.14 2 9.27l6.91-1.01L12 1z" fill="var(--primary)" />
            </svg>
            <span class="badge">Core Feature</span>
            <h3>Comprehensive Lesson Library</h3>
            <p>
                Access hundreds of structured lessons covering leadership fundamentals, communication skills, project management, and more. Each lesson includes interactive elements and practical exercises.
            </p>
        </article>

        <article class="card">
            <svg class="feature-icon-large" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                <path d="M19 3H5c-1.1 0-2 .9-2 2v14c0 1.1.9 2 2 2h14c1.1 0 2-.9 2-2V5c0-1.1-.9-2-2-2zM9 17H7v-7h2v7zm4-5h-2V7h2v5zm4 3h-2v-3h2v3z" fill="var(--primary)" />
            </svg>
            <span class="badge">Progress Tracking</span>
            <h3>Advanced Analytics Dashboard</h3>
            <p>
                Monitor your learning progress with detailed analytics. View completion rates, time spent on topics, and earn badges for milestones achieved.
            </p>
        </article>

        <article class="card">
            <svg class="feature-icon-large" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                <path d="M19.35 10.04C18.67 6.59 15.64 4 12 4 9.11 4 6.6 5.64 5.35 8.04 2.34 8.36 0 10.91 0 14c0 3.31 2.69 6 6 6h13c2.76 0 5-2.24 5-5 0-2.64-2.05-4.78-4.65-4.96zM17 13l-5 5-5-5h3V9h4v4h3z" fill="var(--primary)" />
            </svg>
            <span class="badge">Offline Access</span>
            <h3>Download & Learn Anywhere</h3>
            <p>
                Download lessons and resources for offline access. Continue your training even in areas with poor internet connectivity.
            </p>
        </article>

        <article class="card">
            <svg class="feature-icon-large" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                <path d="M19.14,12.94c0.04-0.3,0.06-0.61,0.06-0.94c0-0.32-0.02-0.64-0.07-0.94l2.03-1.58c0.18-0.14,0.23-0.41,0.12-0.61 l-1.92-3.32c-0.12-0.22-0.37-0.29-0.59-0.22l-2.39,0.96c-0.5-0.38-1.03-0.7-1.62-0.94L14.4,2.81c-0.04-0.24-0.24-0.41-0.48-0.41 h-3.84c-0.24,0-0.43,0.17-0.47,0.41L9.25,5.35C8.66,5.59,8.12,5.92,7.63,6.29L5.24,5.33c-0.22-0.08-0.47,0-0.59,0.22L2.74,8.87 C2.62,9.08,2.66,9.34,2.86,9.48l2.03,1.58C4.84,11.36,4.82,11.69,4.82,12s0.02,0.64,0.07,0.94l-2.03,1.58 c-0.18,0.14-0.23,0.41-0.12,0.61l1.92,3.32c0.12,0.22,0.37,0.29,0.59,0.22l2.39-0.96c0.5,0.38,1.03,0.7,1.62,0.94l0.36,2.54 c0.05,0.24,0.24,0.41,0.48,0.41h3.84c0.24,0,0.43-0.17,0.47-0.41l0.36-2.54c0.59-0.24,1.13-0.56,1.62-0.94l2.39,0.96 c0.22,0.08,0.47,0,0.59-0.22l1.92-3.32c0.12-0.22,0.07-0.47-0.12-0.61L19.14,12.94z M12,15.6c-1.98,0-3.6-1.62-3.6-3.6 s1.62-3.6,3.6-3.6s3.6,1.62,3.6,3.6S13.98,15.6,12,15.6z" fill="var(--primary)" />
            </svg>
            <span class="badge">Personalization</span>
            <h3>Customizable Experience</h3>
            <p>
                Adapt the app to your preferences with dark/light mode, adjustable font sizes, and personalized learning paths based on your role and interests.
            </p>
        </article>

        <article class="card">
            <svg class="feature-icon-large" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                <path d="M9 12c-1.66 0-3-1.34-3-3s1.34-3 3-3 3 1.34 3 3-1.34 3-3 3zm6 0c-1.66 0-3-1.34-3-3s1.34-3 3-3 3 1.34 3 3-1.34 3-3 3zM9 14c-2.33 0-7 1.17-7 3.5V19h14v-1.5c0-2.33-4.67-3.5-7-3.5zm6 0c-.29 0-.62.02-.97.05 1.16.84 1.97 1.97 1.97 3.45V19h6v-1.5c0-2.33-4.67-3.5-7-3.5z" fill="var(--primary)" />
            </svg>
            <span class="badge">Community</span>
            <h3>Resource Sharing</h3>
            <p>
                Share articles, tips, and success stories with your peers. Build a community of learners and mentors within your organization.
            </p>
        </article>

        <article class="card">
            <svg class="feature-icon-large" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                <path d="M9 11H7v2h2v-2zm4 0h-2v2h2v-2zm4 0h-2v2h2v-2zm2-7h-1V2h-2v2H8V2H6v2H5c-1.1 0-1.99.9-1.99 2L3 20c0 1.1.89 2 2 2h14c1.1 0 2-.9 2-2V6c0-1.1-.9-2-2-2zm0 16H5V9h14v11z" fill="var(--primary)" />
            </svg>
            <span class="badge">Updates</span>
            <h3>Regular Content Updates</h3>
            <p>
                Stay current with regularly updated content, new lessons, and feature enhancements based on user feedback and industry best practices.
            </p>
        </article>
    </section>

    <section style="margin-top: 44px;">
        <div class="card">
            <h3>Technical Specifications</h3>
            <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(200px, 1fr)); gap: 20px; margin-top: 20px;">
                <div>
                    <h4>Platforms</h4>
                    <p> Android, Web</p>
                </div>
                <div>
                    <h4>Languages</h4>
                    <p>English</p>
                </div>
                <div>
                    <h4>Storage</h4>
                    <p>Minimal offline storage required</p>
                </div>
                <div>
                    <h4>Security</h4>
                    <p>End-to-end encryption for user data</p>
                </div>
            </div>
        </div>
    </section>
</main>

<footer>
    <p>Ready to experience these features? <a href="/landing">Get started today</a>.</p>
</footer>

<style>
    .feature-icon-large {
        width: 56px;
        height: 56px;
        margin-bottom: 16px;
        display: block;
        margin-left: auto;
        margin-right: auto;
    }
</style>
@endsection