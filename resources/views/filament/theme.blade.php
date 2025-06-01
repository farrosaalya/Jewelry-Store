@php
    $colors = [
        'primary' => [
            50 => '#E7E9EF',
            100 => '#C2C9D6',
            200 => '#9AA5BB',
            300 => '#7281A0',
            400 => '#4F648C',
            500 => '#2C4875',
            600 => '#1A325E',
            700 => '#0D2147',
            800 => '#061332',
            900 => '#02081D',
        ],
        'gold' => [
            50 => '#FDF9E7',
            100 => '#FCF3CF',
            200 => '#F9E79F',
            300 => '#F7DA6F',
            400 => '#F4CE3F',
            500 => '#F1C40F',
            600 => '#C19D0C',
            700 => '#917609',
            800 => '#614E06',
            900 => '#302703',
        ],
    ];
@endphp

<style>
    :root {
        --font-family: 'Inter', sans-serif;
    }

    .fi-simple-layout {
        background: linear-gradient(135deg, {{ $colors['primary'][900] }} 0%, {{ $colors['primary'][700] }} 100%);
        min-height: 100vh;
        display: flex;
        align-items: center;
        justify-content: center;
    }

    .fi-simple-main {
        width: 100%;
        max-width: 28rem;
        margin: 0 auto;
        padding: 2rem;
    }

    .fi-simple-card {
        background: rgba(255, 255, 255, 0.05);
        backdrop-filter: blur(10px);
        border: 1px solid rgba(255, 255, 255, 0.1);
        border-radius: 1rem;
        padding: 2rem;
        box-shadow: 0 25px 50px -12px rgba(0, 0, 0, 0.25);
    }

    .fi-logo {
        color: {{ $colors['gold'][400] }};
        font-size: 1.875rem;
        font-weight: 600;
        text-align: center;
        margin-bottom: 2rem;
        font-family: 'Playfair Display', serif;
    }

    .fi-input {
        background: rgba(255, 255, 255, 0.05) !important;
        border-color: rgba(255, 255, 255, 0.1) !important;
        color: white !important;
        border-radius: 0.5rem !important;
    }

    .fi-input:focus {
        border-color: {{ $colors['gold'][400] }} !important;
        box-shadow: 0 0 0 1px {{ $colors['gold'][400] }} !important;
    }

    .fi-input::placeholder {
        color: rgba(255, 255, 255, 0.4) !important;
    }

    .fi-label {
        color: rgba(255, 255, 255, 0.7) !important;
        font-weight: 500;
    }

    .fi-btn {
        background: {{ $colors['gold'][400] }} !important;
        color: {{ $colors['primary'][900] }} !important;
        font-weight: 600 !important;
        border-radius: 0.5rem !important;
        padding: 0.75rem 1.5rem !important;
        transition: all 0.2s !important;
    }

    .fi-btn:hover {
        background: {{ $colors['gold'][500] }} !important;
        transform: translateY(-1px) !important;
    }

    .fi-checkbox {
        border-color: rgba(255, 255, 255, 0.2) !important;
        background: rgba(255, 255, 255, 0.05) !important;
    }

    .fi-checkbox:checked {
        background: {{ $colors['gold'][400] }} !important;
        border-color: {{ $colors['gold'][400] }} !important;
    }

    .fi-password-input-suffix {
        color: rgba(255, 255, 255, 0.5) !important;
    }

    .fi-password-input-suffix:hover {
        color: rgba(255, 255, 255, 0.8) !important;
    }
</style>

<link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@400;600&display=swap" rel="stylesheet"> 