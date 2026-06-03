@extends('layouts.app')

@section('content')

<style>
/* ============================================ */
/* ULTRA PREMIUM CSS - UNMATCHED QUALITY       */
/* ============================================ */

/* ==================== ROOT VARIABLES SUPER PREMIUM ==================== */
:root {
    /* Extended Color Palette */
    --primary-deep: #0A2A44;
    --primary-rich: #0B3B5E;
    --primary-mid: #0F4C6B;
    --primary-light: #15607A;
    --accent-gold: #C6A43B;
    --accent-gold-light: #E0C268;
    --accent-gold-dark: #9B7E2A;
    --accent-rose: #D4A5A5;
    --accent-teal: #2C8C8C;
    --neutral-100: #FFFFFF;
    --neutral-200: #F8F9FA;
    --neutral-300: #E9ECEF;
    --neutral-400: #DEE2E6;
    --neutral-500: #ADB5BD;
    --neutral-600: #6C757D;
    --neutral-700: #495057;
    --neutral-800: #343A40;
    --neutral-900: #212529;
    
    /* Advanced Gradients */
    --gradient-hero-prestige: linear-gradient(135deg, rgba(10,42,68,0.85) 0%, rgba(11,59,94,0.75) 50%, rgba(21,96,122,0.65) 100%);
    --gradient-glass: linear-gradient(135deg, rgba(255,255,255,0.95) 0%, rgba(248,249,250,0.98) 100%);
    --gradient-gold-premium: linear-gradient(120deg, #9B7E2A 0%, #E0C268 35%, #FFF2B5 50%, #E0C268 65%, #9B7E2A 100%);
    --gradient-dark-luxury: linear-gradient(145deg, #0A2A44 0%, #061F33 100%);
    
    /* Extended Shadows */
    --shadow-2xl: 0 25px 50px -12px rgba(0,0,0,0.25);
    --shadow-3xl: 0 35px 60px -15px rgba(0,0,0,0.3);
    --shadow-gold-glow: 0 0 30px rgba(198,164,59,0.4);
    --shadow-inner-premium: inset 0 1px 3px rgba(0,0,0,0.05), inset 0 -1px 0 rgba(0,0,0,0.02);
    --shadow-neumorph: 20px 20px 40px rgba(0,0,0,0.05), -20px -20px 40px rgba(255,255,255,0.8);
    
    /* Animation Speeds */
    --transition-smooth: all 0.5s cubic-bezier(0.4, 0, 0.2, 1);
    --transition-bounce-premium: all 0.6s cubic-bezier(0.68, -0.55, 0.265, 1.55);
    --transition-glass: all 0.7s cubic-bezier(0.16, 1, 0.3, 1);
}

/* ==================== GLOBAL SUPER PREMIUM ==================== */
* {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
}

html {
    scroll-behavior: smooth;
    scroll-padding-top: 100px;
}

body {
    font-family: 'Inter', -apple-system, BlinkMacSystemFont, 'Segoe UI', sans-serif;
    background: var(--neutral-200);
    color: var(--neutral-800);
    line-height: 1.7;
    overflow-x: hidden;
    position: relative;
}

/* Animated Background Pattern */
body::before {
    content: '';
    position: fixed;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background-image: 
        radial-gradient(circle at 20% 30%, rgba(198,164,59,0.02) 0%, transparent 50%),
        radial-gradient(circle at 80% 70%, rgba(11,59,94,0.02) 0%, transparent 50%);
    pointer-events: none;
    z-index: -1;
}

/* ==================== SCROLLBAR SUPER PREMIUM ==================== */
::-webkit-scrollbar {
    width: 12px;
    height: 12px;
}

::-webkit-scrollbar-track {
    background: var(--neutral-300);
    border-radius: 20px;
}

::-webkit-scrollbar-thumb {
    background: linear-gradient(180deg, var(--accent-gold) 0%, var(--accent-gold-dark) 100%);
    border-radius: 20px;
    border: 2px solid var(--neutral-300);
}

::-webkit-scrollbar-thumb:hover {
    background: linear-gradient(180deg, var(--accent-gold-light) 0%, var(--accent-gold) 100%);
}

/* ==================== TYPOGRAPHY SUPER PREMIUM ==================== */
h1, h2, h3, h4, h5, h6 {
    font-family: 'Cormorant Garamond', 'Inter', serif;
    font-weight: 500;
    letter-spacing: -0.02em;
}

.gradient-text-premium {
    background: var(--gradient-gold-premium);
    -webkit-background-clip: text;
    background-clip: text;
    color: transparent;
    background-size: 200% auto;
    animation: shimmerText 3s linear infinite;
}

@keyframes shimmerText {
    0% { background-position: 0% 0%; }
    100% { background-position: 200% 0%; }
}

/* ==================== HERO SLIDER ULTRA PREMIUM ==================== */
.hero-section {
    height: 100vh;
    position: relative;
    overflow: hidden;
    margin-top: 0;
    perspective: 1000px;
}

.slides-container {
    position: relative;
    width: 100%;
    height: 100%;
}

.slide {
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background-size: cover;
    background-position: center;
    background-repeat: no-repeat;
    opacity: 0;
    transform: scale(1.1);
    transition: opacity 1.8s cubic-bezier(0.4, 0, 0.2, 1), transform 10s cubic-bezier(0.4, 0, 0.2, 1);
    z-index: 1;
}

.slide.active {
    opacity: 1;
    z-index: 2;
    transform: scale(1);
}

/* Premium Slide Overlays */
.slide::after {
    content: '';
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background: linear-gradient(135deg, rgba(10,42,68,0.75) 0%, rgba(0,0,0,0.3) 100%);
    z-index: 1;
}

/* Slide Backgrounds dengan efek parallax */
.slide-1 { background-image: url('/image/home/tele1.jpg'); }
.slide-2 { background-image: url('/image/home/efrata5.jpg'); }
.slide-3 { background-image: url('/image/home/sihotang2.jpg'); }
.slide-4 { background-image: url('/image/home/sihotang3.jpg'); }
.slide-5 { background-image: url('/image/home/efrata1.jpg'); }

.hero-content {
    position: absolute;
    z-index: 20;
    bottom: 20%;
    left: 0;
    right: 0;
    text-align: center;
    color: white;
    padding: 0 20px;
    transform: translateY(30px);
    opacity: 0;
    animation: heroContentRise 1s cubic-bezier(0.4, 0, 0.2, 1) forwards;
    animation-delay: 0.5s;
}

@keyframes heroContentRise {
    to {
        opacity: 1;
        transform: translateY(0);
    }
}

.hero-subtitle {
    font-size: 0.8rem;
    letter-spacing: 0.4em;
    text-transform: uppercase;
    margin-bottom: 20px;
    font-weight: 400;
    opacity: 0.9;
    text-shadow: 0 2px 10px rgba(0,0,0,0.3);
    position: relative;
    display: inline-block;
}

.hero-subtitle::before,
.hero-subtitle::after {
    content: '✦';
    position: absolute;
    top: 50%;
    transform: translateY(-50%);
    font-size: 0.7rem;
    color: var(--accent-gold);
    opacity: 0;
    transition: all 0.5s ease;
}

.hero-subtitle::before {
    left: -30px;
}

.hero-subtitle::after {
    right: -30px;
}

.hero-section:hover .hero-subtitle::before,
.hero-section:hover .hero-subtitle::after {
    opacity: 1;
    left: -25px;
    right: -25px;
}

.hero-title {
    font-size: 5rem;
    font-weight: 600;
    font-family: 'Cormorant Garamond', serif;
    line-height: 1.15;
    margin-bottom: 25px;
    text-shadow: 0 5px 25px rgba(0,0,0,0.4);
    background: linear-gradient(135deg, #FFFFFF 0%, #F5E6B8 50%, #FFFFFF 100%);
    -webkit-background-clip: text;
    background-clip: text;
    color: transparent;
    background-size: 200% auto;
    animation: titleShine 5s ease-in-out infinite;
}

@keyframes titleShine {
    0%, 100% { background-position: 0% 0%; }
    50% { background-position: 100% 0%; }
}

@media (max-width: 992px) {
    .hero-title { font-size: 3.5rem; }
}
@media (max-width: 768px) {
    .hero-title { font-size: 2.5rem; }
}
@media (max-width: 480px) {
    .hero-title { font-size: 1.8rem; }
}

.hero-divider {
    width: 80px;
    height: 2px;
    background: var(--accent-gold);
    margin: 0 auto 30px;
    position: relative;
}

.hero-divider::before,
.hero-divider::after {
    content: '';
    position: absolute;
    width: 8px;
    height: 8px;
    background: var(--accent-gold);
    border-radius: 50%;
    top: 50%;
    transform: translateY(-50%);
}

.hero-divider::before { left: -15px; }
.hero-divider::after { right: -15px; }

.hero-btn {
    display: inline-block;
    background: linear-gradient(135deg, var(--accent-gold) 0%, var(--accent-gold-dark) 100%);
    color: var(--primary-deep);
    padding: 16px 48px;
    font-size: 0.75rem;
    letter-spacing: 0.3em;
    text-transform: uppercase;
    transition: all 0.5s cubic-bezier(0.68, -0.55, 0.265, 1.55);
    text-decoration: none;
    font-weight: 700;
    border-radius: 50px;
    border: none;
    cursor: pointer;
    position: relative;
    overflow: hidden;
    z-index: 1;
}

.hero-btn::before {
    content: '';
    position: absolute;
    top: 0;
    left: -100%;
    width: 100%;
    height: 100%;
    background: linear-gradient(90deg, transparent, rgba(255,255,255,0.4), transparent);
    transition: left 0.6s ease;
    z-index: -1;
}

.hero-btn:hover::before {
    left: 100%;
}

.hero-btn:hover {
    background: white;
    color: var(--primary-deep);
    transform: translateY(-5px) scale(1.05);
    letter-spacing: 0.4em;
    box-shadow: 0 20px 40px rgba(0,0,0,0.3);
}

/* Premium Slider Dots */
.slider-dots {
    position: absolute;
    bottom: 40px;
    left: 50%;
    transform: translateX(-50%);
    display: flex;
    gap: 15px;
    z-index: 20;
}

.dot {
    width: 12px;
    height: 12px;
    border-radius: 50%;
    background: rgba(255,255,255,0.4);
    cursor: pointer;
    transition: all 0.4s cubic-bezier(0.68, -0.55, 0.265, 1.55);
    position: relative;
}

.dot::before {
    content: '';
    position: absolute;
    top: -4px;
    left: -4px;
    right: -4px;
    bottom: -4px;
    border-radius: 50%;
    border: 1px solid var(--accent-gold);
    transform: scale(0);
    transition: transform 0.3s ease;
}

.dot.active {
    background: var(--accent-gold);
    width: 30px;
    border-radius: 20px;
}

.dot.active::before {
    transform: scale(1);
}

.dot:hover {
    background: var(--accent-gold);
    transform: scale(1.2);
}

/* Premium Scroll Indicator */
.scroll-indicator {
    position: absolute;
    bottom: 40px;
    left: 50%;
    transform: translateX(-50%);
    z-index: 20;
    animation: bounce 2.5s infinite;
    cursor: pointer;
    display: flex;
    flex-direction: column;
    align-items: center;
    gap: 10px;
    opacity: 0.7;
    transition: opacity 0.3s ease;
}

.scroll-indicator:hover {
    opacity: 1;
}

.scroll-indicator span {
    font-size: 0.65rem;
    letter-spacing: 0.2em;
    text-transform: uppercase;
    color: white;
}

.scroll-indicator .mouse {
    width: 26px;
    height: 42px;
    border: 2px solid white;
    border-radius: 20px;
    position: relative;
}

.scroll-indicator .mouse::before {
    content: '';
    position: absolute;
    top: 8px;
    left: 50%;
    transform: translateX(-50%);
    width: 3px;
    height: 8px;
    background: white;
    border-radius: 2px;
    animation: scrollWheel 1.5s infinite;
}

@keyframes scrollWheel {
    0% { opacity: 1; transform: translateX(-50%) translateY(0); }
    80% { opacity: 0; transform: translateX(-50%) translateY(15px); }
    100% { opacity: 0; transform: translateX(-50%) translateY(15px); }
}

/* ==================== SECTIONS PREMIUM ==================== */
.section {
    padding: 100px 0;
    position: relative;
    overflow: hidden;
}

.section-white {
    background: linear-gradient(135deg, #FFFFFF 0%, #F8F9FA 100%);
}

.section-light {
    background: linear-gradient(135deg, #F0F4F8 0%, #E8EEF5 100%);
}

.container {
    max-width: 1280px;
    margin: 0 auto;
    padding: 0 32px;
}

@media (max-width: 768px) {
    .container { padding: 0 20px; }
    .section { padding: 70px 0; }
}

/* Premium Section Title */
.section-title {
    text-align: center;
    margin-bottom: 80px;
    position: relative;
}

.section-title h2 {
    font-size: 2.8rem;
    font-family: 'Cormorant Garamond', serif;
    font-weight: 500;
    color: var(--primary-deep);
    position: relative;
    display: inline-block;
    margin-bottom: 20px;
}

.section-title h2 .title-accent {
    color: var(--accent-gold);
    font-style: italic;
}

.section-title .divider {
    width: 70px;
    height: 3px;
    background: linear-gradient(90deg, var(--accent-gold), var(--accent-gold-light), var(--accent-gold));
    margin: 0 auto;
    border-radius: 3px;
    position: relative;
    transition: width 0.5s ease;
}

.section-title:hover .divider {
    width: 120px;
}

.section-title .divider::before,
.section-title .divider::after {
    content: '';
    position: absolute;
    width: 10px;
    height: 10px;
    background: var(--accent-gold);
    border-radius: 50%;
    top: 50%;
    transform: translateY(-50%);
}

.section-title .divider::before { left: -20px; }
.section-title .divider::after { right: -20px; }

.section-title p {
    color: var(--neutral-600);
    max-width: 650px;
    margin: 25px auto 0;
    font-size: 1rem;
    line-height: 1.8;
}

@media (max-width: 768px) {
    .section-title h2 { font-size: 2rem; }
    .section-title p { font-size: 0.9rem; }
}

/* ==================== STATS PREMIUM ==================== */
.stats-grid {
    display: flex;
    justify-content: space-between;
    text-align: center;
    flex-wrap: wrap;
    gap: 30px;
}

.stat-item {
    flex: 1;
    min-width: 150px;
    padding: 30px 20px;
    background: var(--neutral-100);
    border-radius: 24px;
    transition: all 0.5s cubic-bezier(0.68, -0.55, 0.265, 1.55);
    box-shadow: var(--shadow-2xl);
    position: relative;
    overflow: hidden;
    backdrop-filter: blur(10px);
    background: rgba(255,255,255,0.95);
}

.stat-item::before {
    content: '';
    position: absolute;
    top: 0;
    left: -100%;
    width: 100%;
    height: 100%;
    background: linear-gradient(90deg, transparent, rgba(198,164,59,0.1), transparent);
    transition: left 0.6s ease;
}

.stat-item:hover::before {
    left: 100%;
}

.stat-item:hover {
    transform: translateY(-15px);
    box-shadow: 0 30px 50px rgba(0,0,0,0.12);
    background: white;
}

.stat-number {
    font-size: 3rem;
    font-family: 'Cormorant Garamond', serif;
    font-weight: 600;
    background: var(--gradient-gold-premium);
    -webkit-background-clip: text;
    background-clip: text;
    color: transparent;
    margin-bottom: 10px;
}

.stat-label {
    font-size: 0.7rem;
    letter-spacing: 0.2em;
    text-transform: uppercase;
    color: var(--neutral-600);
    font-weight: 600;
}

/* ==================== ABOUT PREMIUM ==================== */
.about-grid {
    display: flex;
    align-items: center;
    gap: 70px;
    flex-wrap: wrap;
}

.about-content {
    flex: 1;
}

.about-content h3 {
    font-size: 2.2rem;
    font-family: 'Cormorant Garamond', serif;
    font-weight: 500;
    margin-bottom: 25px;
    color: var(--primary-deep);
    position: relative;
}

.about-content h3::after {
    content: '';
    position: absolute;
    bottom: -10px;
    left: 0;
    width: 60px;
    height: 2px;
    background: var(--accent-gold);
    transition: width 0.5s ease;
}

.about-content:hover h3::after {
    width: 100px;
}

.about-content p {
    color: var(--neutral-600);
    line-height: 1.9;
    margin-bottom: 20px;
    font-size: 0.95rem;
}

.about-image {
    flex: 1;
    border-radius: 30px;
    overflow: hidden;
    box-shadow: 0 30px 50px rgba(0,0,0,0.15);
    transition: all 0.6s cubic-bezier(0.68, -0.55, 0.265, 1.55);
    position: relative;
}

.about-image::before {
    content: '';
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background: linear-gradient(135deg, rgba(198,164,59,0.2), transparent);
    opacity: 0;
    transition: opacity 0.5s ease;
    z-index: 1;
}

.about-image:hover::before {
    opacity: 1;
}

.about-image:hover {
    transform: scale(1.02) translateY(-10px);
    box-shadow: 0 40px 60px rgba(0,0,0,0.2);
}

.about-image img {
    width: 100%;
    height: auto;
    display: block;
    transition: transform 0.7s ease;
}

.about-image:hover img {
    transform: scale(1.05);
}

/* ==================== DESTINASI SUPER PREMIUM ==================== */
.destinasi-list {
    display: flex;
    flex-direction: column;
    gap: 100px;
}

.destinasi-item {
    display: flex;
    align-items: center;
    gap: 80px;
    flex-wrap: wrap;
    transition: all 0.5s ease;
}

.destinasi-item.reverse {
    flex-direction: row-reverse;
}

@media (max-width: 992px) {
    .destinasi-item, .destinasi-item.reverse {
        flex-direction: column;
        gap: 40px;
    }
}

.destinasi-image {
    flex: 1;
    border-radius: 32px;
    overflow: hidden;
    box-shadow: 0 25px 45px rgba(0,0,0,0.12);
    transition: all 0.6s cubic-bezier(0.68, -0.55, 0.265, 1.55);
    position: relative;
}

.destinasi-image::after {
    content: '';
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background: linear-gradient(135deg, rgba(0,0,0,0.1), transparent);
    opacity: 0;
    transition: opacity 0.5s ease;
}

.destinasi-image:hover::after {
    opacity: 1;
}

.destinasi-image:hover {
    transform: translateY(-15px);
    box-shadow: 0 35px 55px rgba(0,0,0,0.2);
}

.destinasi-image img {
    width: 100%;
    height: auto;
    display: block;
    transition: transform 0.8s ease;
}

.destinasi-image:hover img {
    transform: scale(1.06);
}

.destinasi-content {
    flex: 1;
}

.destinasi-number {
    font-size: 0.75rem;
    letter-spacing: 0.3em;
    color: var(--accent-gold);
    margin-bottom: 15px;
    text-transform: uppercase;
    font-weight: 600;
    position: relative;
    display: inline-block;
}

.destinasi-number::before {
    content: '';
    position: absolute;
    bottom: -3px;
    left: 0;
    width: 0;
    height: 1px;
    background: var(--accent-gold);
    transition: width 0.4s ease;
}

.destinasi-item:hover .destinasi-number::before {
    width: 100%;
}

.destinasi-content h3 {
    font-size: 2.2rem;
    font-family: 'Cormorant Garamond', serif;
    font-weight: 500;
    margin-bottom: 15px;
    color: var(--primary-deep);
    transition: all 0.3s ease;
}

.destinasi-item:hover .destinasi-content h3 {
    transform: translateX(10px);
    color: var(--accent-gold);
}

.destinasi-location {
    font-size: 0.75rem;
    letter-spacing: 0.15em;
    color: var(--neutral-500);
    margin-bottom: 20px;
    text-transform: uppercase;
    font-weight: 500;
}

.destinasi-desc {
    color: var(--neutral-600);
    line-height: 1.9;
    margin-bottom: 25px;
    font-size: 0.95rem;
}

.destinasi-tags {
    display: flex;
    flex-wrap: wrap;
    gap: 12px;
    margin-bottom: 35px;
}

.destinasi-tags span {
    background: rgba(198,164,59,0.1);
    padding: 6px 18px;
    font-size: 0.7rem;
    color: var(--primary-deep);
    border-radius: 50px;
    transition: all 0.4s cubic-bezier(0.68, -0.55, 0.265, 1.55);
    cursor: pointer;
    font-weight: 500;
    border: 1px solid rgba(198,164,59,0.2);
}

.destinasi-tags span:hover {
    background: var(--accent-gold);
    color: white;
    transform: translateY(-3px);
    box-shadow: 0 8px 20px rgba(198,164,59,0.3);
}

.destinasi-link {
    display: inline-block;
    border: 1px solid var(--accent-gold);
    color: var(--accent-gold);
    padding: 12px 32px;
    font-size: 0.7rem;
    letter-spacing: 0.2em;
    text-transform: uppercase;
    text-decoration: none;
    transition: all 0.5s cubic-bezier(0.68, -0.55, 0.265, 1.55);
    border-radius: 50px;
    background: transparent;
    position: relative;
    overflow: hidden;
    font-weight: 600;
}

.destinasi-link::before {
    content: '→';
    position: absolute;
    right: -30px;
    top: 50%;
    transform: translateY(-50%);
    transition: right 0.4s ease;
    opacity: 0;
}

.destinasi-link:hover::before {
    right: 20px;
    opacity: 1;
}

.destinasi-link:hover {
    background: var(--accent-gold);
    color: var(--primary-deep);
    letter-spacing: 0.3em;
    transform: translateY(-3px);
    padding-right: 50px;
    box-shadow: 0 10px 25px rgba(198,164,59,0.3);
}

/* ==================== MAPS PREMIUM ==================== */
.map-card {
    border-radius: 32px;
    overflow: hidden;
    box-shadow: 0 20px 40px rgba(0,0,0,0.08);
    background: white;
    transition: all 0.5s ease;
}

.map-card:hover {
    transform: translateY(-8px);
    box-shadow: 0 30px 50px rgba(0,0,0,0.12);
}

.map-card iframe {
    width: 100%;
    height: 550px;
    border: 0;
    filter: grayscale(0.1) contrast(1.02);
    transition: filter 0.5s ease;
}

.map-card:hover iframe {
    filter: grayscale(0) contrast(1.05);
}

@media (max-width: 992px) {
    .map-card iframe { height: 400px; }
}
@media (max-width: 768px) {
    .map-card iframe { height: 320px; }
}
@media (max-width: 480px) {
    .map-card iframe { height: 280px; }
}

.map-info {
    padding: 35px 40px;
    background: linear-gradient(135deg, var(--primary-deep) 0%, var(--primary-rich) 100%);
    color: white;
}

.maps-locations {
    display: flex;
    gap: 25px;
    flex-wrap: wrap;
    justify-content: center;
    margin-bottom: 25px;
}

.maps-location-item {
    display: flex;
    align-items: center;
    gap: 12px;
    background: rgba(255,255,255,0.1);
    padding: 10px 24px;
    border-radius: 50px;
    transition: all 0.4s cubic-bezier(0.68, -0.55, 0.265, 1.55);
    cursor: pointer;
    backdrop-filter: blur(5px);
}

.maps-location-item:hover {
    background: var(--accent-gold);
    transform: translateY(-3px);
    box-shadow: 0 10px 20px rgba(0,0,0,0.2);
}

.maps-location-item i {
    font-size: 1rem;
    transition: all 0.3s ease;
}

.maps-location-item:hover i {
    transform: rotate(360deg) scale(1.2);
    color: var(--primary-deep);
}

.maps-location-item span {
    font-size: 0.85rem;
    font-weight: 500;
}

.maps-note {
    text-align: center;
    font-size: 0.75rem;
    opacity: 0.8;
    display: flex;
    align-items: center;
    justify-content: center;
    gap: 8px;
}

.maps-note i {
    color: var(--accent-gold);
    animation: pulse 2s infinite;
}

@keyframes pulse {
    0%, 100% { opacity: 1; }
    50% { opacity: 0.5; transform: scale(0.9); }
}

/* ==================== CTA PREMIUM ==================== */
.cta-section {
    background: linear-gradient(135deg, #0A2A44 0%, #0B3B5E 50%, #0F4C6B 100%);
    padding: 90px 0;
    text-align: center;
    position: relative;
    overflow: hidden;
}

.cta-section::before {
    content: '';
    position: absolute;
    top: -50%;
    left: -50%;
    width: 200%;
    height: 200%;
    background: radial-gradient(circle, rgba(198,164,59,0.08) 0%, transparent 70%);
    animation: rotateSlow 30s linear infinite;
}

@keyframes rotateSlow {
    from { transform: rotate(0deg); }
    to { transform: rotate(360deg); }
}

.cta-content {
    max-width: 650px;
    margin: 0 auto;
    position: relative;
    z-index: 2;
}

.cta-content h3 {
    font-size: 2.4rem;
    font-family: 'Cormorant Garamond', serif;
    font-weight: 500;
    margin-bottom: 25px;
    color: white;
}

.cta-content .divider {
    width: 60px;
    height: 2px;
    background: var(--accent-gold);
    margin: 0 auto 25px;
    transition: width 0.5s ease;
}

.cta-content:hover .divider {
    width: 100px;
}

.cta-content p {
    color: rgba(255,255,255,0.8);
    margin-bottom: 40px;
    font-size: 1rem;
    line-height: 1.8;
}

.cta-btn {
    display: inline-block;
    background: linear-gradient(135deg, var(--accent-gold) 0%, var(--accent-gold-dark) 100%);
    color: var(--primary-deep);
    padding: 16px 48px;
    font-size: 0.75rem;
    letter-spacing: 0.25em;
    text-transform: uppercase;
    transition: all 0.5s cubic-bezier(0.68, -0.55, 0.265, 1.55);
    text-decoration: none;
    border-radius: 50px;
    font-weight: 700;
    position: relative;
    overflow: hidden;
}

.cta-btn::before {
    content: '';
    position: absolute;
    top: 0;
    left: -100%;
    width: 100%;
    height: 100%;
    background: linear-gradient(90deg, transparent, rgba(255,255,255,0.4), transparent);
    transition: left 0.6s ease;
}

.cta-btn:hover::before {
    left: 100%;
}

.cta-btn:hover {
    background: white;
    transform: translateY(-5px);
    letter-spacing: 0.35em;
    box-shadow: 0 20px 35px rgba(0,0,0,0.2);
}

@media (max-width: 768px) {
    .cta-content h3 { font-size: 1.8rem; }
    .cta-btn { padding: 12px 32px; font-size: 0.65rem; }
}

/* ==================== RESPONSIVE ADJUSTMENTS ==================== */
@media (max-width: 992px) {
    .destinasi-content h3 { font-size: 1.8rem; }
    .about-content h3 { font-size: 1.8rem; }
}

@media (max-width: 768px) {
    .stats-grid { flex-direction: column; align-items: center; }
    .stat-item { width: 80%; margin: 0 auto; }
    .destinasi-content h3 { font-size: 1.5rem; }
    .destinasi-tags span { font-size: 0.65rem; padding: 5px 14px; }
}

@media (max-width: 480px) {
    .section-title h2 { font-size: 1.6rem; }
    .destinasi-content h3 { font-size: 1.3rem; }
    .destinasi-desc { font-size: 0.85rem; }
    .maps-location-item { padding: 6px 16px; }
    .maps-location-item span { font-size: 0.7rem; }
}
</style>

<!-- ==================== HERO SLIDER ==================== -->
<section class="hero-section" id="home">
    <div class="slides-container">
        <div class="slide slide-1 active"></div>
        <div class="slide slide-2"></div>
        <div class="slide slide-3"></div>
        <div class="slide slide-4"></div>
        <div class="slide slide-5"></div>
    </div>
    
    <div class="slider-dots">
        <div class="dot active" data-slide="0"></div>
        <div class="dot" data-slide="1"></div>
        <div class="dot" data-slide="2"></div>
        <div class="dot" data-slide="3"></div>
        <div class="dot" data-slide="4"></div>
    </div>
    
    <div class="hero-content">
        <div>
                <div class="hero-subtitle">Global Geopark</div>
                <h1 class="hero-title">TELE · EFRATA · SIHOTANG</h1>
            <div class="hero-divider"></div>
            <a href="#destinasi" class="hero-btn">Jelajahi Sekarang ya</a>
        </div>
    </div>
    
    <div class="scroll-indicator" onclick="document.getElementById('destinasi').scrollIntoView({behavior:'smooth'})">
        <span>SCROLL</span>
        <div class="line"></div>
    </div>
</section>

<!-- ==================== STATISTICS ==================== -->
<section class="section section-white">
    <div class="container">
        <div class="stats-grid">

            <div class="stat-item" data-aos="zoom-in" data-aos-duration="800">
                <div class="stat-number">{{ $jumlahDestinasi }}</div>
                <div class="stat-label">GEOSITES</div>
            </div>

            <div class="stat-item" data-aos="zoom-in" data-aos-duration="800" data-aos-delay="100">
                <div class="stat-number">74.000</div>
                <div class="stat-label">TAHUN SEJARAH</div>
            </div>

            <div class="stat-item" data-aos="zoom-in" data-aos-duration="800" data-aos-delay="200">
                <div class="stat-number">15+</div>
                <div class="stat-label">WARISAN BUDAYA</div>
            </div>

            <div class="stat-item" data-aos="zoom-in" data-aos-duration="800" data-aos-delay="300">
                <div class="stat-number">100+</div>
                <div class="stat-label">UMKM LOKAL</div>
            </div>

        </div>
    </div>
</section>

<!-- ==================== ABOUT ==================== -->
<section class="section section-light" id="about">
    <div class="container">
        <div class="about-grid">
            <div class="about-content" data-aos="fade-right" data-aos-duration="1000">
                <h3>Warisan Geologi Kelas Dunia</h3>
                <p>Danau Toba, terbentuk dari letusan supervolcano 74.000 tahun lalu, adalah danau vulkanik terbesar di dunia. Diakui UNESCO sebagai Global Geopark pada tahun 2020.</p>
                <p>Kawasan ini menyimpan nilai geologi luar biasa, keanekaragaman hayati, dan warisan budaya Batak yang autentik. Tiga geosite unggulan di Pulau Sibandang menanti Anda jelajahi.</p>
            </div>
            <div class="about-image" data-aos="fade-left" data-aos-duration="1000">
                <img src="/image/efrata/tobaa.jpg" alt="Danau Toba">
            </div>
        </div>
    </div>
</section>

<!-- ==================== DESTINASI ==================== -->
<section id="destinasi" class="section section-white">
    <div class="container">
        <div class="section-title" data-aos="fade-up" data-aos-duration="800">
            <h2>KAWASAN WISATA TELE-EFRATA-SIHOTANG</h2>
            <div class="divider"></div>
            <p>Menjelajahi Keindahan 5 Geosite Caldera Danau Toba yang Memukau</p>
        </div>
        <div class="destinasi-list">
            
            <!-- TELE -->
            <div class="destinasi-item" data-aos="fade-up" data-aos-duration="1000">
                <div class="destinasi-image">
                    <img src="/image/tele/tele1.jpg" alt="Tele">
                </div>
                <div class="destinasi-content">
                    <div class="destinasi-number">01 — GEOSITE</div>
                    <h3>Tele</h3>
                    <div class="destinasi-location">Desa Turpuk Limbong, Kecamatan Harian, Kabupaten Samosir, Sumatera Utara</div>
                    <p class="destinasi-desc">Tele merupakan salah satu geosite unggulan di kawasan Geopark Kaldera Toba yang terkenal dengan Menara Pandang Tele, sebuah titik terbaik untuk menikmati panorama Danau Toba, Pulau Samosir, dan perbukitan kaldera yang memukau. Tele menawarkan perpaduan keindahan alam, nilai geologi, dan pengalaman wisata yang menjadi daya tarik utama bagi pengunjung.</p>
                    <a href="{{ url('/geosite/tele') }}" class="destinasi-link">Jelajahi Lebih Lanjut →</a>
                </div>
            </div>
            
            <!-- EFRATA-->
            <div class="destinasi-item reverse" data-aos="fade-up" data-aos-duration="1000" data-aos-delay="200">
                <div class="destinasi-image">
                    <img src="/image/efrata/efrata5.jpg" alt="Efrata">
                </div>
                <div class="destinasi-content">
                    <div class="destinasi-number">02 — GEOSITE</div>
                    <h3>Efrata</h3>
                    <div class="destinasi-location">Desa Sosor Dolok, Kecamatan Harian, Kabupaten Samosir, Provinsi Sumatera Utara.</div>
                    <p class="destinasi-desc">Air Terjun Efrata adalah salah satu geosite menarik di kawasan Geopark Kaldera Toba yang dikenal karena bentuk air terjunnya yang melebar menyerupai tirai alami. Air Terjun Efrata menawarkan panorama alam yang menenangkan dan menjadi tujuan favorit wisatawan yang ingin menikmati keindahan alam Danau Toba dari sudut yang berbeda.</p>
                    <a href="{{ url('/geosite/efrata') }}" class="destinasi-link">Jelajahi Lebih Lanjut →</a>
                </div>
            </div>
            
            <!-- SIHOTANG-->
            <div class="destinasi-item" data-aos="fade-up" data-aos-duration="1000" data-aos-delay="400">
                <div class="destinasi-image">
                    <img src="/image/sihotang/sihotang2.jpg" alt="Sihotang">
                </div>
                <div class="destinasi-content">
                    <div class="destinasi-number">03 — GEOSITE</div>
                    <h3>Sihotang</h3>
                    <div class="destinasi-location">Sihotang, kecamatan Harian Kabupaten Samosir, Sumatera utara</div>
                    <p class="destinasi-desc">Sihotang merupakan salah satu geosite di kawasan Geopark Kaldera Toba yang menawarkan panorama perbukitan hijau dan pemandangan Danau Toba yang memukau. Kawasan ini dikenal dengan bentang alamnya yang unik serta menjadi lokasi yang ideal untuk menikmati keindahan kaldera dan suasana alam yang masih asri.</p>
                    <a href="{{ url('/geosite/sihotang') }}" class="destinasi-link">Jelajahi Lebih Lanjut →</a>
                </div>
            </div>

                        <!-- SIBEABEA -->
            <div class="destinasi-item reverse" data-aos="fade-up" data-aos-duration="1000" data-aos-delay="600">
                <div class="destinasi-image">
                    <img src="/image/sibeabea/sibeabea.jpg" alt="Sibeabea">
            </div>
            <div class="destinasi-content">
                <div class="destinasi-number">04 — GEOSITE</div>
                    <h3>Sibeabea</h3>
                <div class="destinasi-location">
                    Kecamatan Harian, Kabupaten Samosir, Sumatera Utara
                </div>
                    <p class="destinasi-desc">
                        Sibea-Bea merupakan salah satu destinasi unggulan di kawasan Geopark Kaldera Toba yang dikenal dengan panorama Danau Toba yang memukau serta keberadaan Patung Yesus Kristus yang menjadi ikon wisata religi. Kawasan ini menawarkan perpaduan keindahan alam, nilai spiritual, dan bentang geologi khas Kaldera Toba yang menarik bagi wisatawan dari berbagai daerah.
                    </p>
                    <a href="{{ url('/geosite/sibeabea') }}" class="destinasi-link">
                        Jelajahi Lebih Lanjut →
                    </a>
                </div>
            </div>

            <!-- HOLBUNG -->
            <div class="destinasi-item" data-aos="fade-up" data-aos-duration="1000" data-aos-delay="400">
                <div class="destinasi-image">
                    <img src="/image/holbung/Holbung.jpg" alt="Holbung">
                </div>
                <div class="destinasi-content">
                <div class="destinasi-number">05 — GEOSITE</div>
                    <h3>Holbung</h3>
                <div class="destinasi-location">
                    Desa Dolok Raja, Kecamatan Harian, Kabupaten Samosir, Sumatera Utara
                </div>
                    <p class="destinasi-desc">
                        Bukit Holbung merupakan salah satu destinasi wisata alam populer di kawasan Geopark Kaldera Toba yang terkenal dengan perbukitan hijau yang membentang indah di tepi Danau Toba. Tempat ini menawarkan panorama alam yang memukau, suasana yang tenang, serta menjadi lokasi favorit wisatawan untuk menikmati pemandangan dan mengabadikan momen.
                    </p>
                    <a href="{{ url('/geosite/holbung') }}" class="destinasi-link">
                        Jelajahi Lebih Lanjut →
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="section section-light">
    <div class="container">
            <div class="section-title" data-aos="fade-up" data-aos-duration="800">
            <h2>Lokasi 5 Geosite</h2>
            <div class="divider"></div>
            <p>Tele, Efrata, Sihotang, Sibeabea, Holbung</p>
        </div>
        
        <div class="map-card" data-aos="zoom-in" data-aos-duration="1000">
            <iframe 
                src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3989.0!2d98.8835095!3d2.4339262!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x302e0415b8f7da39%3A0xc6beb74287f355a5!2sPulau%20Sibandang!5e0!3m2!1sid!2sid!4v1700000000000!5m2!1sid!2sid" 
                allowfullscreen="" 
                loading="lazy" 
                referrerpolicy="no-referrer-when-downgrade">
            </iframe>
            <div class="map-info">
                <div class="maps-locations">
                        <div class="maps-location-item" onclick="window.open('https://www.google.com/maps?q=Tele+Tower+Samosir', '_blank')">
                            <i class="fas fa-location-dot"></i>
                                <span>Menara Pandang Tele</span>
                    </div>
                    <div class="maps-location-item" onclick="window.open('https://www.google.com/maps?q=Efrata+Waterfall+Samosir', '_blank')">
                        <i class="fas fa-location-dot"></i>
                        <span>Air Terjun Efrata</span>
                    </div>
                    <div class="maps-location-item" onclick="window.open('https://www.google.com/maps?q=Sihotang+Samosir', '_blank')">
                        <i class="fas fa-location-dot"></i>
                        <span>Desa Sihotang</span>
                    </div>
                    <div class="maps-location-item" onclick="window.open('https://www.google.com/maps?q=Sibeabea+Samosir', '_blank')">
                        <i class="fas fa-location-dot"></i>
                        <span>Sibeabea</span>
                    </div>
                    <div class="maps-location-item" onclick="window.open('https://www.google.com/maps?q=Bukit+Holbung+Samosir', '_blank')">
                        <i class="fas fa-location-dot"></i>
                        <span>Bukit Holbung</span>
                    </div>
                </div>
                </div>
                <div class="maps-note">
                    <i class="fas fa-map-marker-alt"></i>
                    <span>Klik lokasi untuk melihat peta detail</span>
                </div>
            </div>
        </div>
    </div>
</section>

<script>
    // ==================== HERO SLIDER ====================
    let currentSlide = 0;
    const slides = document.querySelectorAll('.slide');
    const dots = document.querySelectorAll('.dot');
    let slideInterval;
    const slideCount = slides.length;

    function showSlide(index) {
        slides.forEach((slide, i) => {
            slide.classList.remove('active');
            if (dots[i]) dots[i].classList.remove('active');
        });
        
        slides[index].classList.add('active');
        if (dots[index]) dots[index].classList.add('active');
        currentSlide = index;
    }

    function nextSlide() {
        let next = (currentSlide + 1) % slideCount;
        showSlide(next);
    }

    function startSlider() {
        if (slideInterval) clearInterval(slideInterval);
        slideInterval = setInterval(nextSlide, 5000);
    }

    dots.forEach((dot, index) => {
        dot.addEventListener('click', () => {
            clearInterval(slideInterval);
            showSlide(index);
            startSlider();
        });
    });

    startSlider();

    // ==================== SMOOTH SCROLL ====================
    document.querySelectorAll('a[href^="#"]').forEach(anchor => {
        anchor.addEventListener('click', function(e) {
            e.preventDefault();
            const target = document.querySelector(this.getAttribute('href'));
            if (target) {
                target.scrollIntoView({ behavior: 'smooth', block: 'start' });
            }
        });
    });
    
    // ==================== ADDITIONAL ANIMATION ON SCROLL ====================
    const observerOptions = {
        threshold: 0.1,
        rootMargin: '0px 0px -50px 0px'
    };
    
    const observer = new IntersectionObserver((entries) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                entry.target.style.opacity = '1';
                entry.target.style.transform = 'translateY(0)';
            }
        });
    }, observerOptions);
    
    document.querySelectorAll('.stat-item, .destinasi-item, .map-card').forEach(el => {
        el.style.opacity = '0';
        el.style.transform = 'translateY(30px)';
        el.style.transition = 'all 0.8s ease';
        observer.observe(el);
    });
</script>

<script src="https://unpkg.com/aos@next/dist/aos.js"></script>
<link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />
<script>AOS.init({ duration: 800, once: true, offset: 50 });</script>

@endsection