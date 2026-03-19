@extends('layouts.front')
@section('content')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/css/select2.min.css">

<header>
    <h1>Contact Us</h1>
    <p>
        We'd love to hear from you. Send us a message and we'll respond as soon as possible.
    </p>
</header>

<main>
    <section class="contact-section">
        <div class="contact-container">
            <div class="contact-info">
                <div class="info-card">
                    <svg class="contact-icon" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path d="M12 2C8.13 2 5 5.13 5 9c0 5.25 7 13 7 13s7-7.75 7-13c0-3.87-3.13-7-7-7zm0 9.5c-1.38 0-2.5-1.12-2.5-2.5s1.12-2.5 2.5-2.5 2.5 1.12 2.5 2.5-1.12 2.5-2.5 2.5z" fill="var(--primary)" />
                    </svg>
                    <h3>Visit Us</h3>
                    <p>Upper Spring<br>Nairobi, Kenya</p>
                </div>

                <div class="info-card">
                    <svg class="contact-icon" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path d="M6.62 10.79c1.44 2.83 3.76 5.14 6.59 6.59l2.2-2.2c.27-.27.67-.36 1.02-.24 1.12.37 2.33.57 3.57.57.55 0 1 .45 1 1V20c0 .55-.45 1-1 1-9.39 0-17-7.61-17-17 0-.55.45-1 1-1h3.5c.55 0 1 .45 1 1 0 1.25.2 2.45.57 3.57.11.35.03.74-.25 1.02l-2.2 2.2z" fill="var(--primary)" />
                    </svg>
                    <h3>Call Us</h3>
                    <p>+254 701 583 807</p>
                </div>

                <div class="info-card">
                    <svg class="contact-icon" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path d="M20 4H4c-1.1 0-1.99.9-1.99 2L2 18c0 1.1.9 2 2 2h16c1.1 0 2-.9 2-2V6c0-1.1-.9-2-2-2zm0 4l-8 5-8-5V6l8 5 8-5v2z" fill="var(--primary)" />
                    </svg>
                    <h3>Email Us</h3>
                    <p>info@masterguidetools.com</p>
                </div>
            </div>

            <div class="contact-form">
                @if(session('success'))
                <div class="alert success">
                    {{ session('success') }}
                </div>
                @endif
                <form action="/contact" method="POST">
                    @csrf
                    <small class="text-danger mb-3">Fields marked * are required.</small>
                    <div class="form-group">
                        <label for="name">Name *</label>
                        <input type="text" id="name" name="name" required>
                    </div>

                    <div class="form-group">
                        <label for="email">Email *</label>
                        <input type="email" id="email" name="email" required>
                    </div>
                    <div class="form-group">
                        <label for="phone">Phone Number</label>
                        <input id="phone" type="text"
                            class="form-control @error('phone') is-invalid @enderror" name="phone"
                            value="{{ old('phone') }}" autocomplete="phone" minlength="9"
                            maxlength="13">
                        <small class="text-danger" id="errorPhone" style="display:none;">Only
                            digits(0-9)
                            are required</small>
                    </div>
                    <div class="form-group">
                        <label for="">How could you like us get back to you?</label>
                        <select name="" id="" class="form-control">
                            <option value="email">Email</option>
                            <option value="Call">Call</option>
                            <option value="SMS">SMS</option>
                            <option value="Whatsapp">Whatsapp</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="subject">Subject *</label>
                        <input type="text" id="subject" name="subject" required>
                    </div>

                    <div class="form-group">
                        <label for="message">Message *</label>
                        <textarea id="message" name="message" rows="6" required></textarea>
                    </div>

                    <button type="submit" class="submit-btn">Send Message</button>
                </form>
            </div>
        </div>
    </section>
</main>

<footer>
    <p>Thank you for reaching out. We value your feedback and suggestions.</p>
</footer>

<style>
    .contact-section {
        padding: 48px 0;
    }

    .contact-container {
        display: grid;
        grid-template-columns: 1fr 1fr;
        gap: 48px;
        max-width: 1000px;
        margin: 0 auto;
    }

    .contact-info {
        display: flex;
        flex-direction: column;
        gap: 24px;
    }

    .info-card {
        background: var(--card);
        border-radius: var(--radius);
        padding: 28px;
        box-shadow: var(--shadow);
        border: 1px solid rgba(0, 0, 0, 0.06);
        text-align: center;
    }

    .contact-icon {
        width: 48px;
        height: 48px;
        margin-bottom: 16px;
    }

    .info-card h3 {
        margin: 0 0 8px;
        font-size: 1.25rem;
    }

    .info-card p {
        margin: 0;
        color: var(--muted);
    }

    .contact-form {
        background: var(--card);
        border-radius: var(--radius);
        padding: 32px;
        box-shadow: var(--shadow);
        border: 1px solid rgba(0, 0, 0, 0.06);
    }

    .form-group {
        margin-bottom: 20px;
    }

    .form-group label {
        display: block;
        margin-bottom: 6px;
        font-weight: 600;
        color: var(--dark);
    }

    .form-group input,
    .form-group textarea {
        width: 100%;
        padding: 12px;
        border: 1px solid #ddd;
        border-radius: 6px;
        font-family: var(--font);
        font-size: 1rem;
        transition: border-color 0.3s;
    }

    .form-group input:focus,
    .form-group textarea:focus {
        outline: none;
        border-color: var(--primary);
    }

    .submit-btn {
        width: 100%;
        padding: 14px;
        background: var(--primary);
        color: var(--light);
        border: none;
        border-radius: var(--radius);
        font-size: 1rem;
        font-weight: 600;
        cursor: pointer;
        transition: background 0.3s;
    }

    .submit-btn:hover {
        background: #1e6b1e;
    }

    .alert {
        padding: 12px;
        border-radius: 6px;
        margin-bottom: 20px;
        font-weight: 500;
    }

    .alert.success {
        background: rgba(34, 139, 34, 0.1);
        color: var(--primary);
        border: 1px solid rgba(34, 139, 34, 0.2);
    }

    @media (max-width: 768px) {
        .contact-container {
            grid-template-columns: 1fr;
            gap: 32px;
        }

        .contact-form {
            padding: 24px;
        }

        .info-card {
            padding: 20px;
        }
    }
</style>
@endsection