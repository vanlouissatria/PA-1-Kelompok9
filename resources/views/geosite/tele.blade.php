<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, viewport-fit=cover">
    <title>Menara Pandang Tele - Geosite Danau Toba</title>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&family=Cormorant+Garamond:wght@400;500;600;700&display=swap" rel="stylesheet">
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
/* ==================== VARIABLES ==================== */
:root {
    --primary: #002F5F;
    --primary-dark: #001a38;
    --primary-light: #004a8a;
    --primary-glow: rgba(0, 47, 95, 0.4);
    --gold: #D4AF37;
    --gold-dark: #B8960F;
    --gold-light: #F3D97A;
    --gold-glow: rgba(212, 175, 55, 0.3);
    --dark: #0a0a1a;
    --gray: #6c757d;
    --gray-light: #eef2f6;
    --white: #ffffff;
    --black: #000000;
    
    /* Gradients */
    --gradient-gold: linear-gradient(135deg, var(--gold-light) 0%, var(--gold) 50%, var(--gold-dark) 100%);
    --gradient-primary: linear-gradient(135deg, var(--primary) 0%, var(--primary-dark) 100%);
    --gradient-hero: linear-gradient(135deg, rgba(0,47,95,0.7) 0%, rgba(0,26,56,0.85) 100%);
    --gradient-card: linear-gradient(135deg, rgba(255,255,255,0.98) 0%, rgba(255,255,255,0.95) 100%);
    
    /* Shadows */
    --shadow-sm: 0 2px 8px rgba(0,0,0,0.04), 0 1px 2px rgba(0,0,0,0.03);
    --shadow-md: 0 8px 24px rgba(0,0,0,0.06), 0 2px 4px rgba(0,0,0,0.02);
    --shadow-lg: 0 20px 40px -12px rgba(0,0,0,0.12), 0 4px 12px rgba(0,0,0,0.04);
    --shadow-xl: 0 35px 60px -15px rgba(0,0,0,0.2), 0 8px 20px rgba(0,0,0,0.08);
    --shadow-gold: 0 20px 40px -12px rgba(212,175,55,0.25);
    --shadow-inset: inset 0 2px 4px rgba(0,0,0,0.02);
    
    /* Transitions */
    --transition-fast: all 0.2s cubic-bezier(0.4, 0, 0.2, 1);
    --transition-base: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
    --transition-slow: all 0.5s cubic-bezier(0.4, 0, 0.2, 1);
    --transition-bounce: all 0.4s cubic-bezier(0.34, 1.2, 0.64, 1);
    
    /* Spacing */
    --section-padding: 120px;
    --section-padding-mobile: 70px;
}

* {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
}

html {
    scroll-behavior: smooth;
    scroll-padding-top: 90px;
}

body {
    font-family: 'Inter', -apple-system, BlinkMacSystemFont, 'Segoe UI', sans-serif;
    color: #1a2a3a;
    line-height: 1.6;
    background: var(--white);
    overflow-x: hidden;
}

.container {
    max-width: 1280px;
    margin: 0 auto;
    padding: 0 32px;
    position: relative;
}

@media (max-width: 768px) {
    .container {
        padding: 0 20px;
    }
}

/* ==================== SELECTION ==================== */
::selection {
    background: var(--gold);
    color: var(--primary-dark);
}

::-moz-selection {
    background: var(--gold);
    color: var(--primary-dark);
}

/* ==================== TYPOGRAPHY ENHANCED ==================== */
h1, h2, h3, h4, h5, h6 {
    font-family: 'Inter', sans-serif;
    font-weight: 700;
    line-height: 1.2;
    letter-spacing: -0.02em;
}

.gradient-text {
    background: var(--gradient-gold);
    -webkit-background-clip: text;
    background-clip: text;
    color: transparent;
}

/* ==================== HEADER 3D ELEGANT ==================== */
.navbar {
    position: fixed;
    top: 0;
    width: 100%;
    background: linear-gradient(135deg, #002F5F 0%, #001a3a 100%);
    z-index: 1000;
    transition: var(--transition-base);
    box-shadow: 0 5px 20px rgba(0,0,0,0.15);
}

.navbar::before {
    content: '';
    position: absolute;
    bottom: 0;
    left: 0;
    right: 0;
    height: 2px;
    background: linear-gradient(90deg, transparent, var(--gold), var(--gold-light), var(--gold), transparent);
}

.navbar.scrolled {
    box-shadow: 0 10px 30px rgba(0,0,0,0.25);
    background: linear-gradient(135deg, #001a3a 0%, #002F5F 100%);
}

.navbar.scrolled::before {
    height: 3px;
    background: linear-gradient(90deg, transparent, var(--gold-light), var(--gold), var(--gold-light), transparent);
}

.nav-container {
    max-width: 1280px;
    margin: 0 auto;
    padding: 14px 32px;
    display: flex;
    justify-content: space-between;
    align-items: center;
}

@media (max-width: 768px) {
    .nav-container {
        padding: 12px 20px;
    }
}

/* Logo dengan border gold */
.nav-logo {
    display: flex;
    align-items: center;
    gap: 15px;
    text-decoration: none;
    padding: 5px 15px 5px 5px;
    border-radius: 50px;
    transition: var(--transition-base);
}

.nav-logo:hover {
    background: rgba(255,255,255,0.05);
    transform: scale(1.02);
}

.nav-logo img {
    height: 45px;
    width: auto;
    object-fit: contain;
    filter: drop-shadow(0 2px 5px rgba(0,0,0,0.2));
    transition: var(--transition-base);
}

.nav-logo:hover img {
    filter: drop-shadow(0 0 8px rgba(212,175,55,0.5));
}

.logo-divider {
    width: 1px;
    height: 35px;
    background: linear-gradient(to bottom, transparent, rgba(212,175,55,0.6), transparent);
}

.logo-text h4 {
    font-size: 1.3rem;
    font-weight: 800;
    margin: 0;
    line-height: 1.2;
    letter-spacing: -0.5px;
    color: white;
    text-shadow: 0 2px 4px rgba(0,0,0,0.2);
}

.logo-text h4 span {
    color: var(--gold);
    text-shadow: 0 0 5px rgba(212,175,55,0.5);
}

.logo-text p {
    font-size: 0.7rem;
    color: rgba(255,255,255,0.7);
    margin: 2px 0 0;
}

/* Nav menu dengan button style */
.nav-menu {
    display: flex;
    gap: 35px;
}

@media (max-width: 768px) {
    .nav-menu {
        display: none;
    }
}

.nav-link {
    text-decoration: none;
    color: white;
    font-weight: 500;
    font-size: 0.95rem;
    transition: var(--transition-base);
    position: relative;
    padding: 8px 0;
}

.nav-link::after {
    content: '';
    position: absolute;
    bottom: 0;
    left: 0;
    width: 0;
    height: 2px;
    background: var(--gold);
    transition: width 0.3s ease;
    box-shadow: 0 0 5px var(--gold);
}

.nav-link:hover::after,
.nav-link.active::after {
    width: 100%;
}

.nav-link:hover {
    color: var(--gold);
    text-shadow: 0 0 5px rgba(212,175,55,0.3);
}

/* ==================== HAMBURGER MENU ANIMATED ==================== */
.hamburger {
    display: none;
    background: none;
    border: none;
    cursor: pointer;
    padding: 8px;
    z-index: 1002;
    position: relative;
}

@media (max-width: 768px) {
    .hamburger {
        display: flex;
        flex-direction: column;
        gap: 6px;
    }
}

.hamburger span {
    display: block;
    width: 26px;
    height: 2.5px;
    background: linear-gradient(90deg, white, var(--gold-light));
    transition: var(--transition-base);
    border-radius: 3px;
}

.hamburger.active span:nth-child(1) {
    transform: rotate(45deg) translate(6px, 6px);
    background: var(--gold);
}

.hamburger.active span:nth-child(2) {
    opacity: 0;
    transform: translateX(10px);
}

.hamburger.active span:nth-child(3) {
    transform: rotate(-45deg) translate(6px, -6px);
    background: var(--gold);
}

.mobile-overlay {
    position: fixed;
    top: 0;
    right: -100%;
    width: 85%;
    max-width: 360px;
    height: 100%;
    background: linear-gradient(145deg, var(--primary) 0%, var(--primary-dark) 100%);
    box-shadow: -20px 0 50px rgba(0,0,0,0.3);
    z-index: 1001;
    transition: 0.4s cubic-bezier(0.32, 0.72, 0, 1);
    padding: 100px 32px 40px;
    display: flex;
    flex-direction: column;
    gap: 24px;
}

.mobile-overlay.active {
    right: 0;
}

.mobile-close {
    position: absolute;
    top: 24px;
    right: 28px;
    font-size: 30px;
    cursor: pointer;
    color: white;
    transition: var(--transition-base);
    width: 44px;
    height: 44px;
    display: flex;
    align-items: center;
    justify-content: center;
    border-radius: 50%;
    background: rgba(255,255,255,0.05);
}

.mobile-close:hover {
    background: rgba(212,175,55,0.2);
    transform: rotate(90deg);
    color: var(--gold);
}

.mobile-link {
    text-decoration: none;
    color: white;
    font-weight: 500;
    font-size: 1.15rem;
    padding: 14px 0;
    border-bottom: 1px solid rgba(255,255,255,0.08);
    transition: var(--transition-fast);
    position: relative;
    overflow: hidden;
}

.mobile-link::before {
    content: '';
    position: absolute;
    left: 0;
    bottom: 0;
    width: 0;
    height: 2px;
    background: var(--gold);
    transition: var(--transition-base);
}

.mobile-link:hover::before {
    width: 100%;
}

.mobile-link:hover {
    color: var(--gold);
    padding-left: 12px;
}

/* ==================== HERO SECTION DRAMATIC ==================== */
.hero {
    height: 100vh;
    min-height: 650px;
    position: relative;
    display: flex;
    align-items: center;
    justify-content: center;
    text-align: center;
    color: white;
    margin-top: 70px;
    overflow: hidden;
}

.hero::before {
    content: '';
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background: url('/image/tele/tele1.jpg');
    background-size: cover;
    background-position: center;
    background-attachment: fixed;
    filter: brightness(0.85);
    z-index: -2;
}

@media (max-width: 768px) {
    .hero::before {
        background-attachment: scroll;
    }
}

.hero::after {
    content: '';
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background: var(--gradient-hero);
    z-index: -1;
}

.hero > div {
    position: relative;
    z-index: 2;
    animation: heroReveal 1s ease-out;
}

@keyframes heroReveal {
    0% {
        opacity: 0;
        transform: translateY(40px);
    }
    100% {
        opacity: 1;
        transform: translateY(0);
    }
}

.hero-title {
    font-size: 4rem;
    font-weight: 800;
    margin-bottom: 24px;
    letter-spacing: -0.02em;
    text-shadow: 0 10px 30px rgba(0,0,0,0.3);
    background: linear-gradient(135deg, #ffffff 0%, #FFE5A0 50%, #ffffff 100%);
    -webkit-background-clip: text;
    background-clip: text;
    color: transparent;
}

@media (max-width: 992px) {
    .hero-title {
        font-size: 3rem;
    }
}

@media (max-width: 768px) {
    .hero-title {
        font-size: 2.2rem;
        margin-bottom: 16px;
    }
}

.hero-subtitle {
    font-size: 1.25rem;
    opacity: 0.95;
    letter-spacing: 0.5px;
    text-shadow: 0 2px 10px rgba(0,0,0,0.3);
    max-width: 650px;
    margin: 0 auto;
    font-weight: 400;
}

@media (max-width: 768px) {
    .hero-subtitle {
        font-size: 1rem;
        padding: 0 20px;
    }
}

.hero-scroll {
    position: absolute;
    bottom: 40px;
    left: 50%;
    transform: translateX(-50%);
    animation: bounce 2s infinite;
    cursor: pointer;
    z-index: 2;
}

.hero-scroll a {
    color: white;
    font-size: 1.5rem;
    transition: var(--transition-base);
    display: flex;
    flex-direction: column;
    align-items: center;
    gap: 8px;
    text-decoration: none;
}

.hero-scroll span {
    font-size: 0.75rem;
    letter-spacing: 1px;
    opacity: 0.7;
}

.hero-scroll i {
    font-size: 1.2rem;
}

@keyframes bounce {
    0%, 100% {
        transform: translateX(-50%) translateY(0);
    }
    50% {
        transform: translateX(-50%) translateY(10px);
    }
}

/* ==================== SECTION STYLES PREMIUM ==================== */
.section {
    padding: var(--section-padding) 0;
    position: relative;
}

@media (max-width: 768px) {
    .section {
        padding: var(--section-padding-mobile) 0;
    }
}

.section:nth-child(even) {
    background: linear-gradient(135deg, var(--gray-light) 0%, #ffffff 100%);
}

.section-title {
    text-align: center;
    margin-bottom: 70px;
    position: relative;
}

.section-title h2 {
    font-size: 2.8rem;
    font-weight: 800;
    background: var(--gradient-primary);
    -webkit-background-clip: text;
    background-clip: text;
    color: transparent;
    margin-bottom: 20px;
    letter-spacing: -0.02em;
}

@media (max-width: 768px) {
    .section-title h2 {
        font-size: 2rem;
    }
}

.divider {
    width: 120px;
    height: 4px;
    background: var(--gradient-gold);
    margin: 0 auto;
    border-radius: 4px;
    position: relative;
}

.divider::before,
.divider::after {
    content: '';
    position: absolute;
    width: 8px;
    height: 8px;
    background: var(--gold);
    border-radius: 50%;
    top: 50%;
    transform: translateY(-50%);
}

.divider::before {
    left: -12px;
}

.divider::after {
    right: -12px;
}

.section-title p {
    margin-top: 28px;
    color: var(--gray);
    max-width: 700px;
    margin-left: auto;
    margin-right: auto;
    font-size: 1.1rem;
    line-height: 1.7;
}

@media (max-width: 768px) {
    .section-title p {
        font-size: 0.95rem;
        padding: 0 16px;
    }
}

/* ============================================ */
/* 1. INFORMASI CARD - PREMIUM ENHANCED        */
/* ============================================ */
.informasi-card {
    display: flex;
    flex-wrap: wrap;
    background: var(--white);
    border-radius: 32px;
    overflow: hidden;
    box-shadow: var(--shadow-lg);
    margin-bottom: 56px;
    transition: var(--transition-bounce);
    border: 1px solid rgba(212, 175, 55, 0.15);
}

.informasi-card:last-child {
    margin-bottom: 0;
}

.informasi-card:hover {
    transform: translateY(-12px);
    box-shadow: var(--shadow-xl);
    border-color: rgba(212, 175, 55, 0.4);
}

.informasi-image {
    flex: 1.2;
    min-width: 350px;
    max-height: 420px;
    overflow: hidden;
    position: relative;
}

@media (max-width: 768px) {
    .informasi-image {
        min-width: 100%;
        max-height: 280px;
    }
}

.informasi-image::after {
    content: '';
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background: linear-gradient(45deg, rgba(0, 47, 95, 0.3), transparent);
    pointer-events: none;
}

.informasi-image img {
    width: 100%;
    height: 100%;
    object-fit: cover;
    transition: transform 0.7s cubic-bezier(0.33, 1, 0.68, 1);
}

.informasi-card:hover .informasi-image img {
    transform: scale(1.08);
}

.informasi-content {
    flex: 1;
    padding: 48px;
    background: var(--gradient-card);
}

@media (max-width: 768px) {
    .informasi-content {
        padding: 32px;
    }
}

.informasi-content h3 {
    font-size: 2rem;
    font-weight: 800;
    background: var(--gradient-primary);
    -webkit-background-clip: text;
    background-clip: text;
    color: transparent;
    margin-bottom: 24px;
    border-left: 5px solid var(--gold);
    padding-left: 24px;
    letter-spacing: -0.02em;
}

@media (max-width: 768px) {
    .informasi-content h3 {
        font-size: 1.6rem;
        padding-left: 20px;
    }
}

@media (max-width: 480px) {
    .informasi-content h3 {
        font-size: 1.3rem;
        padding-left: 16px;
    }
}

.informasi-text {
    color: #2d3e50;
    line-height: 1.8;
    font-size: 1rem;
}

@media (max-width: 768px) {
    .informasi-text {
        font-size: 0.95rem;
        line-height: 1.7;
    }
}

@media (max-width: 480px) {
    .informasi-text {
        font-size: 0.9rem;
        line-height: 1.65;
    }
}

.informasi-text p {
    margin-bottom: 20px;
}

.informasi-text p:last-child {
    margin-bottom: 0;
}

/* ============================================ */
/* 2. GALERI CARD - IMMERSIVE & MODERN         */
/* ============================================ */
.galeri-grid {
    display: grid;
    grid-template-columns: repeat(auto-fill, minmax(340px, 1fr));
    gap: 32px;
    margin-top: 50px;
}

@media (max-width: 768px) {
    .galeri-grid {
        gap: 24px;
        grid-template-columns: repeat(auto-fill, minmax(280px, 1fr));
    }
}

@media (max-width: 480px) {
    .galeri-grid {
        grid-template-columns: 1fr;
        gap: 20px;
    }
}

.galeri-item {
    position: relative;
    border-radius: 28px;
    overflow: hidden;
    cursor: pointer;
    height: 320px;
    box-shadow: var(--shadow-md);
    transition: var(--transition-bounce);
}

@media (max-width: 768px) {
    .galeri-item {
        height: 280px;
    }
}

@media (max-width: 480px) {
    .galeri-item {
        height: 260px;
    }
}

.galeri-item:hover {
    transform: translateY(-12px);
    box-shadow: var(--shadow-xl);
}

.galeri-item img {
    width: 100%;
    height: 100%;
    object-fit: cover;
    transition: transform 0.7s cubic-bezier(0.33, 1, 0.68, 1);
}

.galeri-item:hover img {
    transform: scale(1.12);
}

.galeri-overlay {
    position: absolute;
    bottom: 0;
    left: 0;
    right: 0;
    background: linear-gradient(to top,
            rgba(0, 47, 95, 0.95) 0%,
            rgba(0, 47, 95, 0.7) 50%,
            transparent 100%);
    padding: 32px 24px 24px;
    color: white;
    transform: translateY(100%);
    transition: transform 0.4s cubic-bezier(0.33, 1, 0.68, 1);
}

.galeri-item:hover .galeri-overlay {
    transform: translateY(0);
}

.galeri-overlay h4 {
    font-size: 1.35rem;
    font-weight: 700;
    margin: 0 0 8px;
    letter-spacing: -0.02em;
}

@media (max-width: 768px) {
    .galeri-overlay h4 {
        font-size: 1.2rem;
    }
}

@media (max-width: 480px) {
    .galeri-overlay h4 {
        font-size: 1.1rem;
    }
}

.galeri-overlay p {
    font-size: 0.9rem;
    margin: 0;
    opacity: 0.9;
    line-height: 1.5;
}

@media (max-width: 768px) {
    .galeri-overlay p {
        font-size: 0.85rem;
    }
}

@media (max-width: 480px) {
    .galeri-overlay p {
        font-size: 0.8rem;
    }
}

/* ============================================ */
/* 3. CARD UNTUK FASILITAS, PENGINAPAN, UMKM   */
/* ============================================ */
.grid-umkm,
.grid-penginapan,
.grid-fasilitas {
    display: grid;
    grid-template-columns: repeat(auto-fill, minmax(360px, 1fr));
    gap: 36px;
}

@media (max-width: 768px) {
    .grid-umkm,
    .grid-penginapan,
    .grid-fasilitas {
        grid-template-columns: repeat(auto-fill, minmax(300px, 1fr));
        gap: 28px;
    }
}

@media (max-width: 640px) {
    .grid-umkm,
    .grid-penginapan,
    .grid-fasilitas {
        grid-template-columns: 1fr;
        gap: 24px;
    }
}

/* Card Container Premium */
.card-item {
    background: var(--white);
    border-radius: 28px;
    overflow: hidden;
    box-shadow: var(--shadow-md);
    transition: var(--transition-bounce);
    cursor: pointer;
    border: 1px solid rgba(0, 0, 0, 0.04);
    display: flex;
    flex-direction: column;
    position: relative;
}

.card-item:hover {
    transform: translateY(-12px);
    box-shadow: var(--shadow-xl);
    border-color: rgba(212, 175, 55, 0.25);
}

.card-item:active {
    transform: scale(0.98);
}

/* Garis emas di atas card saat hover */
.card-item::after {
    content: '';
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 5px;
    background: var(--gradient-gold);
    transform: scaleX(0);
    transform-origin: left;
    transition: transform 0.4s ease;
    z-index: 2;
}

.card-item:hover::after {
    transform: scaleX(1);
}

/* Image Wrapper dengan Aspect Ratio Modern */
.card-item .image-wrapper {
    position: relative;
    height: 260px;
    overflow: hidden;
    background: linear-gradient(135deg, #f5f7fa, #e9ecef);
    flex-shrink: 0;
}

@media (max-width: 768px) {
    .card-item .image-wrapper {
        height: 240px;
    }
}

@media (max-width: 480px) {
    .card-item .image-wrapper {
        height: 220px;
    }
}

.card-item img {
    width: 100%;
    height: 100%;
    object-fit: cover;
    transition: transform 0.6s cubic-bezier(0.33, 1, 0.68, 1);
}

.card-item:hover img {
    transform: scale(1.1);
}

/* Category Badge yang Lebih Stylish */
.card-item .category-badge {
    position: absolute;
    top: 18px;
    right: 18px;
    background: rgba(0, 47, 95, 0.92);
    backdrop-filter: blur(8px);
    color: white;
    padding: 6px 16px;
    border-radius: 40px;
    font-size: 0.75rem;
    font-weight: 600;
    letter-spacing: 0.5px;
    border: 1px solid rgba(212, 175, 55, 0.5);
    text-transform: uppercase;
    z-index: 2;
}

@media (max-width: 480px) {
    .card-item .category-badge {
        top: 12px;
        right: 12px;
        padding: 5px 12px;
        font-size: 0.7rem;
    }
}

/* Card Body dengan Tipografi Lebih Jelas */
.card-body {
    padding: 28px;
    flex: 1;
    display: flex;
    flex-direction: column;
}

@media (max-width: 768px) {
    .card-body {
        padding: 24px;
    }
}

@media (max-width: 480px) {
    .card-body {
        padding: 20px;
    }
}

.card-body h4 {
    font-size: 1.4rem;
    font-weight: 700;
    color: var(--primary);
    margin-bottom: 12px;
    transition: var(--transition-fast);
    line-height: 1.3;
    letter-spacing: -0.02em;
}

@media (max-width: 768px) {
    .card-body h4 {
        font-size: 1.25rem;
    }
}

@media (max-width: 480px) {
    .card-body h4 {
        font-size: 1.15rem;
        margin-bottom: 10px;
    }
}

.card-item:hover .card-body h4 {
    color: var(--gold-dark);
}

/* Deskripsi dengan Line Clamp yang Rapi */
.card-body .deskripsi {
    color: #5a6e7c;
    font-size: 0.95rem;
    line-height: 1.65;
    margin-bottom: 20px;
    display: -webkit-box;
    -webkit-line-clamp: 3;
    -webkit-box-orient: vertical;
    overflow: hidden;
    text-overflow: ellipsis;
}

@media (max-width: 768px) {
    .card-body .deskripsi {
        font-size: 0.9rem;
        margin-bottom: 16px;
    }
}

@media (max-width: 480px) {
    .card-body .deskripsi {
        font-size: 0.85rem;
        line-height: 1.6;
        -webkit-line-clamp: 3;
    }
}

/* Informasi Tambahan (lokasi, dll) */
.card-body .info-item {
    display: flex;
    align-items: center;
    gap: 10px;
    margin-top: 12px;
    font-size: 0.9rem;
    color: var(--gray);
}

@media (max-width: 768px) {
    .card-body .info-item {
        font-size: 0.85rem;
        margin-top: 10px;
    }
}

@media (max-width: 480px) {
    .card-body .info-item {
        font-size: 0.8rem;
        gap: 8px;
    }
}

.card-body .info-item i {
    color: var(--gold);
    width: 24px;
    font-size: 1rem;
    text-align: center;
}

@media (max-width: 480px) {
    .card-body .info-item i {
        width: 20px;
        font-size: 0.9rem;
    }
}

/* Harga dengan Font Lebih Menonjol */
.card-body .harga {
    font-weight: 800;
    background: var(--gradient-primary);
    -webkit-background-clip: text;
    background-clip: text;
    color: transparent;
    margin-top: 20px;
    font-size: 1.25rem;
    letter-spacing: -0.3px;
    border-top: 1px dashed rgba(0, 47, 95, 0.1);
    padding-top: 16px;
}

@media (max-width: 768px) {
    .card-body .harga {
        font-size: 1.15rem;
        margin-top: 16px;
        padding-top: 14px;
    }
}

@media (max-width: 480px) {
    .card-body .harga {
        font-size: 1rem;
        margin-top: 14px;
        padding-top: 12px;
    }
}

/* Tombol CTA Tambahan */
.card-body .card-btn {
    display: inline-block;
    margin-top: 18px;
    background: transparent;
    border: 1.5px solid var(--gold);
    color: var(--primary);
    padding: 10px 20px;
    border-radius: 50px;
    font-weight: 600;
    font-size: 0.85rem;
    text-align: center;
    transition: var(--transition-fast);
    cursor: pointer;
    text-decoration: none;
    width: fit-content;
}

@media (max-width: 480px) {
    .card-body .card-btn {
        padding: 8px 16px;
        font-size: 0.8rem;
        margin-top: 14px;
    }
}

.card-body .card-btn:hover {
    background: var(--gold);
    color: var(--primary-dark);
    border-color: var(--gold-dark);
    transform: translateX(5px);
}

/* ============================================ */
/* 4. OPTIONAL: BADGE LOKASI KHUSUS            */
/* ============================================ */
.card-body .lokasi {
    display: flex;
    align-items: center;
    gap: 6px;
    font-size: 0.85rem;
    color: var(--gold-dark);
    margin-top: 8px;
}

.card-body .lokasi i {
    font-size: 0.8rem;
}

/* ============================================ */
/* 5. ANIMASI SMOOTH UNTUK SEMUA CARD          */
/* ============================================ */
.informasi-card,
.galeri-item,
.card-item {
    animation: fadeInUp 0.7s ease backwards;
}

.informasi-card:nth-child(1) { animation-delay: 0.05s; }
.informasi-card:nth-child(2) { animation-delay: 0.1s; }
.galeri-item:nth-child(1) { animation-delay: 0.05s; }
.galeri-item:nth-child(2) { animation-delay: 0.1s; }
.galeri-item:nth-child(3) { animation-delay: 0.15s; }
.galeri-item:nth-child(4) { animation-delay: 0.2s; }
.galeri-item:nth-child(5) { animation-delay: 0.25s; }
.galeri-item:nth-child(6) { animation-delay: 0.3s; }
.card-item:nth-child(1) { animation-delay: 0.05s; }
.card-item:nth-child(2) { animation-delay: 0.1s; }
.card-item:nth-child(3) { animation-delay: 0.15s; }

@keyframes fadeInUp {
    from {
        opacity: 0;
        transform: translateY(40px);
    }
    to {
        opacity: 1;
        transform: translateY(0);
    }
}

/* ==================== MAPS SECTION PREMIUM ==================== */
.maps-container {
    border-radius: 32px;
    overflow: hidden;
    box-shadow: var(--shadow-xl);
    border: 1px solid rgba(212,175,55,0.15);
}

.maps-container iframe {
    width: 100%;
    height: 480px;
    border: 0;
    filter: grayscale(0.1) contrast(1.05);
    transition: filter 0.5s ease;
}

.maps-container:hover iframe {
    filter: grayscale(0) contrast(1.1);
}

@media (max-width: 768px) {
    .maps-container iframe {
        height: 380px;
    }
}

.info-rute {
    background: var(--white);
    padding: 40px;
    border-radius: 32px;
    margin-top: 40px;
    box-shadow: var(--shadow-lg);
    border: 1px solid rgba(212,175,55,0.1);
    transition: var(--transition-base);
}

.info-rute:hover {
    box-shadow: var(--shadow-xl);
    border-color: rgba(212,175,55,0.2);
}

.info-rute h4 {
    color: var(--primary);
    margin-bottom: 24px;
    font-size: 1.4rem;
    font-weight: 800;
    letter-spacing: -0.3px;
}

.info-rute p {
    margin-bottom: 16px;
    line-height: 1.85;
    color: #2d3e50;
}

.info-rute strong {
    color: var(--gold-dark);
}

/* ==================== FOOTER PREMIUM ==================== */
.footer {
    background: linear-gradient(145deg, var(--primary) 0%, var(--primary-dark) 100%);
    color: white;
    padding: 60px 0 28px;
    margin-top: 0;
    position: relative;
}

.footer::before {
    content: '';
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    height: 4px;
    background: var(--gradient-gold);
}

.footer::after {
    content: '';
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    background: radial-gradient(circle at 30% 20%, rgba(212,175,55,0.05), transparent);
    pointer-events: none;
}

.footer-container {
    max-width: 1280px;
    margin: 0 auto;
    padding: 0 32px;
    position: relative;
    z-index: 2;
}

@media (max-width: 768px) {
    .footer-container {
        padding: 0 20px;
    }
}

.footer-content {
    display: flex;
    justify-content: space-between;
    align-items: center;
    flex-wrap: wrap;
    gap: 32px;
    margin-bottom: 48px;
}

@media (max-width: 768px) {
    .footer-content {
        flex-direction: column;
        text-align: center;
        gap: 24px;
    }
}

.footer-logo {
    display: flex;
    align-items: center;
    gap: 20px;
    flex-wrap: wrap;
    justify-content: center;
}

.footer-logo img {
    height: 55px;
    width: auto;
    filter: drop-shadow(0 4px 8px rgba(0,0,0,0.2));
}

.footer-divider {
    width: 1px;
    height: 50px;
    background: linear-gradient(to bottom, transparent, rgba(255,255,255,0.25), rgba(212,175,55,0.5), rgba(255,255,255,0.25), transparent);
}

@media (max-width: 768px) {
    .footer-divider {
        display: none;
    }
}

.footer-text h4 {
    font-size: 1.4rem;
    margin: 0;
    font-weight: 800;
    letter-spacing: -0.3px;
}

.footer-text h4 span {
    background: var(--gradient-gold);
    -webkit-background-clip: text;
    background-clip: text;
    color: transparent;
}

.footer-text p {
    font-size: 0.75rem;
    opacity: 0.65;
    margin: 6px 0 0;
}

.footer-info {
    text-align: right;
}

@media (max-width: 768px) {
    .footer-info {
        text-align: center;
    }
}

.footer-info p {
    margin: 10px 0;
    font-size: 0.9rem;
    opacity: 0.85;
    display: flex;
    align-items: center;
    gap: 10px;
    justify-content: flex-end;
    transition: var(--transition-fast);
}

@media (max-width: 768px) {
    .footer-info p {
        justify-content: center;
    }
}

.footer-info p:hover {
    opacity: 1;
    transform: translateX(-4px);
}

@media (max-width: 768px) {
    .footer-info p:hover {
        transform: translateX(0);
    }
}

.footer-info i {
    color: var(--gold);
    width: 22px;
    font-size: 1rem;
}

.footer-bottom {
    text-align: center;
    padding-top: 28px;
    border-top: 1px solid rgba(255,255,255,0.1);
    font-size: 0.8rem;
    opacity: 0.6;
}

/* ==================== EMPTY STATE ELEGANT ==================== */
.empty-state {
    grid-column: 1 / -1;
    display: flex;
    flex-direction: column;
    align-items: center;
    justify-content: center;
    text-align: center;
    min-height: 360px;
    width: 100%;
    max-width: 520px;
    margin: 50px auto;
    padding: 56px 40px;
    background: var(--white);
    border-radius: 48px;
    box-shadow: var(--shadow-lg);
    transition: var(--transition-bounce);
    border: 1px solid rgba(212,175,55,0.1);
}

.empty-state:hover {
    transform: translateY(-6px);
    box-shadow: var(--shadow-xl);
    border-color: rgba(212,175,55,0.2);
}

.empty-state i {
    font-size: 4.5rem;
    background: var(--gradient-gold);
    -webkit-background-clip: text;
    background-clip: text;
    color: transparent;
    margin-bottom: 24px;
}

.empty-state p {
    font-size: 1.05rem;
    font-weight: 500;
    color: #6c757d;
    margin: 0;
}

/* ==================== ANIMATIONS ==================== */
@keyframes fadeIn {
    from { opacity: 0; }
    to { opacity: 1; }
}

@keyframes fadeInUp {
    from {
        opacity: 0;
        transform: translateY(40px);
    }
    to {
        opacity: 1;
        transform: translateY(0);
    }
}

@keyframes scaleIn {
    from {
        opacity: 0;
        transform: scale(0.95);
    }
    to {
        opacity: 1;
        transform: scale(1);
    }
}

.galeri-item,
.card-item,
.informasi-card {
    animation: fadeInUp 0.7s ease backwards;
}

.galeri-item:nth-child(1) { animation-delay: 0.05s; }
.galeri-item:nth-child(2) { animation-delay: 0.1s; }
.galeri-item:nth-child(3) { animation-delay: 0.15s; }
.galeri-item:nth-child(4) { animation-delay: 0.2s; }
.galeri-item:nth-child(5) { animation-delay: 0.25s; }
.galeri-item:nth-child(6) { animation-delay: 0.3s; }

/* ==================== SCROLLBAR CUSTOM ==================== */
::-webkit-scrollbar {
    width: 10px;
    height: 10px;
}

::-webkit-scrollbar-track {
    background: var(--gray-light);
    border-radius: 10px;
}

::-webkit-scrollbar-thumb {
    background: linear-gradient(135deg, var(--primary) 0%, var(--gold-dark) 100%);
    border-radius: 10px;
}

::-webkit-scrollbar-thumb:hover {
    background: linear-gradient(135deg, var(--gold-dark) 0%, var(--primary) 100%);
}

/* ==================== UTILITY CLASSES ==================== */
.text-gold {
    background: var(--gradient-gold);
    -webkit-background-clip: text;
    background-clip: text;
    color: transparent;
}

.bg-gold {
    background: var(--gradient-gold);
}

.shadow-gold {
    box-shadow: var(--shadow-gold);
}

.glass-effect {
    background: rgba(255,255,255,0.1);
    backdrop-filter: blur(10px);
    -webkit-backdrop-filter: blur(10px);
    border: 1px solid rgba(255,255,255,0.2);
}

/* ==================== RESPONSIVE FIXES ==================== */
@media (max-width: 480px) {
    .nav-logo img {
        height: 32px;
    }
    .logo-text h4 {
        font-size: 1rem;
    }
    .logo-text p {
        font-size: 0.55rem;
    }
    .hero-title {
        font-size: 1.8rem;
    }
    .hero-subtitle {
        font-size: 0.85rem;
    }
    .section-title h2 {
        font-size: 1.6rem;
    }
    .card-item .image-wrapper {
        height: 220px;
    }
    .empty-state {
        padding: 40px 24px;
        margin: 30px auto;
    }
    .empty-state i {
        font-size: 3.5rem;
    }
}
    </style>
</head>
<body>

<!-- ==================== NAVBAR ==================== -->
<div class="navbar" id="navbar">
    <div class="nav-container">
        <div class="nav-logo">
            <img src="/image/logo/logobankindonesia.jpg" alt="Logo Bank Indonesia">
            <div class="logo-divider"></div>
            <img src="/image/logo/del.jpg" alt="Logo Del">
            <div class="logo-divider"></div>
            <div class="logo-text">
                <h4>GEO<span>TOBA</span></h4>
                <p>Geopark Danau Toba</p>
            </div>
        </div>
        <div class="nav-menu">
            <a href="{{ url('/') }}" class="nav-link">Home</a>
            <a href="#informasi" class="nav-link">Informasi</a>
            <a href="#galeri" class="nav-link">Galeri</a>
            <a href="#umkm" class="nav-link">UMKM</a>
            <a href="#penginapan" class="nav-link">Penginapan</a>
            <a href="#fasilitas" class="nav-link">Fasilitas</a>
            <a href="#lokasi" class="nav-link">Lokasi</a>
        </div>
        <button class="hamburger" id="hamburger">
            <span></span><span></span><span></span>
        </button>
    </div>
</div>

<div class="mobile-overlay" id="mobileOverlay">
    <div class="mobile-close" id="mobileClose">&times;</div>
    <a href="{{ url('/') }}" class="mobile-link">Home</a>
    <a href="#informasi" class="mobile-link">Informasi</a>
    <a href="#galeri" class="mobile-link">Galeri</a>
    <a href="#umkm" class="mobile-link">UMKM</a>
    <a href="#penginapan" class="mobile-link">Penginapan</a>
    <a href="#fasilitas" class="mobile-link">Fasilitas</a>
    <a href="#lokasi" class="mobile-link">Lokasi</a>
</div>

<!-- ==================== HERO SECTION ==================== -->
<section class="hero">
    <div data-aos="fade-up">
        <h1 class="hero-title">Menara Pandang Tele</h1>
        <p class="hero-subtitle">Desa Turpuk Limbong · Samosir · UNESCO Global Geopark</p>
    </div>
</section>

<!-- ==================== INFORMASI TELE SECTION ==================== -->
<section id="informasi" class="section">
    <div class="container">
        <div class="section-title" data-aos="fade-up">
            <h2>Informasi & Legenda Tele</h2>
            <div class="divider"></div>
        </div>
        
        @if(isset($informasi) && $informasi->count() > 0)
            @foreach($informasi as $info)
            <div class="informasi-card" data-aos="fade-up">
                @if($info->gambar && file_exists(public_path($info->gambar)))
                    <div class="informasi-image">
                        <img src="{{ asset($info->gambar) }}" alt="{{ $info->judul }}">
                    </div>
                @endif
                <div class="informasi-content">
                    <h3>{{ $info->judul }}</h3>
                    <div class="informasi-text">
                        {!! nl2br(e($info->konten)) !!}
                    </div>
                </div>
            </div>
            @endforeach
        @else
            <div class="informasi-default" data-aos="fade-up">
                <p>Menara Pandang Tele adalah menara pengamatan setinggi 25 meter yang terletak di Desa Turpuk Limbong, Kecamatan Harian, Kabupaten Samosir, Sumatera Utara, pada ketinggian 1.479 meter di atas permukaan laut.</p>
                <p>Terletak di perbukitan dengan udara sejuk, Menara Pandang Tele menjadi spot wajib bagi pelancong yang ingin menikmati panorama alam dan berburu foto Instagramable. Setelah pemekaran wilayah pada 2003, menara ini menjadi bagian dari Kabupaten Samosir dan kini masuk dalam Kawasan Strategis Pariwisata Nasional (KSPN) Danau Toba.</p>
            </div>
        @endif
    </div>
</section>

<!-- ==================== GALERI SECTION ==================== -->
<section id="galeri" class="section" style="background: #f8fafc;">
    <div class="container">
        <div class="section-title" data-aos="fade-up">
            <h2>Galeri Foto Tele</h2>
            <div class="divider"></div>
            <p>Dokumentasi keindahan Menara Pandang Tele</p>
        </div>
        
        <div class="galeri-grid">
            @php
                $galeriTele = App\Models\Galeri::where('kategori', 'tele')->where('status', 1)->orderBy('created_at', 'desc')->get();
            @endphp
            
            @forelse($galeriTele as $item)
            <div class="galeri-item" data-aos="fade-up" data-aos-delay="{{ $loop->index * 50 }}">
                @php
                    $imgSrc = asset($item->gambar);
                    if(!file_exists(public_path($item->gambar))) {
                        $imgSrc = asset('image/default.jpg');
                    }
                @endphp
                <img src="{{ $imgSrc }}" alt="{{ $item->judul }}">
                <div class="galeri-overlay">
                    <h4>{{ $item->judul }}</h4>
                    <p>{{ Str::limit($item->deskripsi, 50) }}</p>
                </div>
            </div>
            @empty
            <div class="empty-state">
                <i class="fas fa-images fa-3x mb-3" style="color: var(--gold);"></i>
                <p>Belum ada foto galeri untuk Tele.</p>
            </div>
            @endforelse
        </div>
    </div>
</section>

<!-- ==================== UMKM SECTION (DIPERBAIKI) ==================== -->
<section id="umkm" class="section">
    <div class="container">
        <div class="section-title" data-aos="fade-up">
            <h2>UMKM Lokal</h2>
            <div class="divider"></div>
            <p>Berbagai produk unggulan dari masyarakat sekitar Menara Pandang Tele</p>
        </div>
        
        <div class="grid-umkm">
            @forelse($umkm as $item)
            <div class="card-item" data-aos="fade-up" data-aos-delay="{{ $loop->index * 50 }}">
                <div class="image-wrapper">
                    @php
                        // Perbaikan path foto UMKM
                        $fotoUrl = asset('image/default-umkm.jpg'); // default
                        if($item->foto_utama) {
                            // Cek apakah file ada di storage
                            $storagePath = storage_path('app/public/' . $item->foto_utama);
                            if(file_exists($storagePath)) {
                                $fotoUrl = asset('storage/' . $item->foto_utama);
                            } else {
                                // Coba cek di public
                                $publicPath = public_path($item->foto_utama);
                                if(file_exists($publicPath)) {
                                    $fotoUrl = asset($item->foto_utama);
                                }
                            }
                        }
                    @endphp
                    <img src="{{ $fotoUrl }}" alt="{{ $item->nama_usaha }}">
                    <span class="category-badge">{{ $item->kategori ?? 'UMKM' }}</span>
                </div>
                <div class="card-body">
                    <h4>{{ $item->nama_usaha }}</h4>
                    <div class="info-item">
                        <i class="fas fa-user"></i>
                        <span>{{ $item->pemilik ?? 'Tidak tersedia' }}</span>
                    </div>
                    <div class="deskripsi">{{ Str::limit($item->deskripsi ?? 'Tidak ada deskripsi', 100) }}</div>
                    <div class="info-item">
                        <i class="fas fa-map-marker-alt"></i>
                        <span>{{ Str::limit($item->alamat ?? 'Lokasi tidak tersedia', 60) }}</span>
                    </div>
                    @if($item->no_telepon)
                    <div class="info-item">
                        <i class="fas fa-phone-alt"></i>
                        <span>{{ $item->no_telepon }}</span>
                    </div>
                    @endif
                </div>
            </div>
            @empty
            <div class="empty-state">
                <i class="fas fa-store fa-3x mb-3" style="color: var(--gold);"></i>
                <p>Belum ada data UMKM.</p>
            </div>
            @endforelse
        </div>
    </div>
</section>

<!-- ==================== PENGINAPAN SECTION (DIPERBAIKI) ==================== -->
<section id="penginapan" class="section" style="background: #f8fafc;">
    <div class="container">
        <div class="section-title" data-aos="fade-up">
            <h2>Penginapan & Homestay</h2>
            <div class="divider"></div>
            <p>Rekomendasi tempat menginap di sekitar kawasan Tele</p>
        </div>
        
        <div class="grid-penginapan">
            @forelse($penginapan as $item)
            <div class="card-item" data-aos="fade-up" data-aos-delay="{{ $loop->index * 50 }}">
                <div class="image-wrapper">
                    @php
                        $gambarUrl = asset('image/default-hotel.jpg');
                        if($item->gambar) {
                            if(file_exists(public_path($item->gambar))) {
                                $gambarUrl = asset($item->gambar);
                            } elseif(file_exists(storage_path('app/public/' . $item->gambar))) {
                                $gambarUrl = asset('storage/' . $item->gambar);
                            }
                        }
                    @endphp
                    <img src="{{ $gambarUrl }}" alt="{{ $item->nama }}">
                </div>
                <div class="card-body">
                    <h4>{{ $item->nama }}</h4>
                    <div class="deskripsi">{{ Str::limit($item->deskripsi ?? 'Tidak ada deskripsi', 80) }}</div>
                    <div class="info-item">
                        <i class="fas fa-map-marker-alt"></i>
                        <span>{{ Str::limit($item->alamat ?? 'Alamat tidak tersedia', 50) }}</span>
                    </div>
                    @if($item->no_telepon)
                    <div class="info-item">
                        <i class="fas fa-phone-alt"></i>
                        <span>{{ $item->no_telepon }}</span>
                    </div>
                    @endif
                    @if($item->harga)
                    <div class="harga">Rp {{ number_format($item->harga, 0, ',', '.') }} <span style="font-size: 0.7rem;">/ malam</span></div>
                    @endif
                </div>
            </div>
            @empty
            <div class="empty-state">
                <i class="fas fa-hotel fa-3x mb-3" style="color: var(--gold);"></i>
                <p>Belum ada data penginapan.</p>
            </div>
            @endforelse
        </div>
    </div>
</section>

<!-- ==================== FASILITAS SECTION (DIPERBAIKI) ==================== -->
<section id="fasilitas" class="section">
    <div class="container">
        <div class="section-title" data-aos="fade-up">
            <h2>Fasilitas Wisata</h2>
            <div class="divider"></div>
            <p>Berbagai fasilitas yang tersedia di Menara Pandang Tele</p>
        </div>
        
        <div class="grid-fasilitas">
            @forelse($fasilitas as $item)
            <div class="card-item" data-aos="fade-up" data-aos-delay="{{ $loop->index * 50 }}">
                <div class="image-wrapper">
                    @php
                        $gambarUrl = asset('image/default-fasilitas.jpg');
                        if($item->gambar) {
                            if(file_exists(public_path($item->gambar))) {
                                $gambarUrl = asset($item->gambar);
                            } elseif(file_exists(storage_path('app/public/' . $item->gambar))) {
                                $gambarUrl = asset('storage/' . $item->gambar);
                            }
                        }
                    @endphp
                    <img src="{{ $gambarUrl }}" alt="{{ $item->nama }}">
                </div>
                <div class="card-body">
                    <h4>{{ $item->nama }}</h4>
                    <div class="deskripsi">{{ Str::limit($item->deskripsi ?? 'Tidak ada deskripsi', 80) }}</div>
                    @if($item->harga)
                    <div class="harga">Rp {{ number_format($item->harga, 0, ',', '.') }}</div>
                    @endif
                </div>
            </div>
            @empty
            <div class="empty-state">
                <i class="fas fa-concierge-bell fa-3x mb-3" style="color: var(--gold);"></i>
                <p>Belum ada data fasilitas.</p>
            </div>
            @endforelse
        </div>
    </div>
</section>

<!-- ==================== LOKASI SECTION ==================== -->
<section id="lokasi" class="section" style="background: #f8fafc;">
    <div class="container">
        <div class="section-title" data-aos="fade-up">
            <h2>Lokasi & Akses</h2>
            <div class="divider"></div>
            <p>Temukan rute menuju Menara Pandang Tele</p>
        </div>
        
        <div class="maps-container" data-aos="fade-up">
            <iframe 
                src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d15943.444458681364!2d98.62135836667979!3d2.552062367800812!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3031d060f0e3180b%3A0xb561ba45f008aa18!2sMenara%20Pandang%20Tele!5e0!3m2!1sid!2sid!4v1778767596787!5m2!1sid!2sid" 
                width="100%" 
                height="400" 
                style="border:0;" 
                allowfullscreen="" 
                loading="lazy">
            </iframe>
        </div>
        
        <div class="info-rute" data-aos="fade-up">
            <h4><i class="fas fa-location-dot"></i> Rute Menuju Menara Pandang Tele</h4>
            <p><strong>Dari Medan:</strong> Perjalanan darat sekitar 5-6 jam melalui Parapat, kemudian menyeberang dengan feri ke Pulau Samosir (sekitar 45 menit). Setelah sampai di Pulau Samosir, perjalanan ke Menara Pandang Tele sekitar 1 jam dari Pelabuhan Tomok.</p>
            <p><strong>Dari Pangururan:</strong> Hanya 22 km dengan waktu tempuh sekitar 40 menit melalui Jalan Lintas Tele–Pangururan.</p>
            <p><strong>Dari Pelabuhan Tomok:</strong> Jarak sekitar 50 km dengan waktu tempuh 1.5 jam.</p>
            <p><strong>Jam Operasional:</strong> 08.00 - 18.00 WIB (Setiap Hari)</p>
            <p><strong>Tiket Masuk:</strong> Rp 15.000 - Rp 25.000 per orang</p>
        </div>
    </div>
</section>

<!-- ==================== FOOTER ==================== -->
<footer class="footer">
    <div class="footer-container">
        <div class="footer-content">
            <div class="footer-logo">
                <img src="/image/logo/logobankindonesia.jpg" alt="Logo Bank Indonesia">
                <div class="footer-divider"></div>
                <img src="/image/logo/del.jpg" alt="Logo Del">
                <div class="footer-divider"></div>
                <div class="footer-text">
                    <h4>GEO<span>TOBA</span></h4>
                    <p>Geopark Danau Toba</p>
                </div>
            </div>
            <div class="footer-info">
                <p><i class="fas fa-map-marker-alt"></i> Desa Turpuk Limbong, Kec. Harian, Kab. Samosir</p>
                <p><i class="fas fa-clock"></i> Buka Setiap Hari: 08.00 - 18.00 WIB</p>
                <p><i class="fas fa-ticket-alt"></i> Tiket Masuk: Rp 15.000 - Rp 25.000</p>
            </div>
        </div>
        <div class="footer-bottom">
            <p>&copy; 2024 Geopark Danau Toba. All rights reserved.</p>
        </div>
    </div>
</footer>

<!-- ==================== SCRIPTS ==================== -->
<script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
<script>
    AOS.init({ 
        duration: 700, 
        once: true, 
        offset: 50,
        disable: 'mobile'
    });

    // Hamburger Menu
    const hamburger = document.getElementById('hamburger');
    const mobileOverlay = document.getElementById('mobileOverlay');
    const mobileClose = document.getElementById('mobileClose');
    
    hamburger.addEventListener('click', () => {
        mobileOverlay.classList.add('active');
        document.body.style.overflow = 'hidden';
    });
    
    const closeMenu = () => {
        mobileOverlay.classList.remove('active');
        document.body.style.overflow = '';
    };
    
    mobileClose.addEventListener('click', closeMenu);
    document.querySelectorAll('.mobile-link').forEach(link => {
        link.addEventListener('click', closeMenu);
    });

    // Active link on scroll
    const sections = document.querySelectorAll('section[id]');
    const navLinks = document.querySelectorAll('.nav-link, .mobile-link');
    
    window.addEventListener('scroll', () => {
        let current = '';
        sections.forEach(section => {
            const top = section.offsetTop - 100;
            if (window.scrollY >= top) current = section.getAttribute('id');
        });
        navLinks.forEach(link => {
            link.classList.remove('active');
            if (link.getAttribute('href') === `#${current}`) link.classList.add('active');
        });
    });

    // Smooth scroll
    document.querySelectorAll('.nav-link[href^="#"], .mobile-link[href^="#"]').forEach(anchor => {
        anchor.addEventListener('click', function(e) {
            e.preventDefault();
            const target = document.querySelector(this.getAttribute('href'));
            if (target) target.scrollIntoView({ behavior: 'smooth' });
            closeMenu();
        });
    });
</script>
</body>
</html>