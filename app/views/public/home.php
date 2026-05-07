<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>College CMS | Home</title>

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Bootstrap Icons -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Fraunces:opsz,wght@9..144,500;9..144,700;9..144,900&family=Inter:wght@400;500;600;700;800&display=swap" rel="stylesheet">

    <style>
        :root {
            --bg-main: #052017;
            --bg-dark: #03140f;
            --emerald-dark: #073824;
            --emerald-mid: #0d5a3a;
            --emerald-glow: #1dbf73;
            --gold: #f5c84b;
            --gold-soft: rgba(245, 200, 75, 0.16);
            --gold-border: rgba(245, 200, 75, 0.28);
            --text-main: #fff8e7;
            --text-muted: rgba(255, 248, 231, 0.72);
            --card-bg: rgba(7, 56, 36, 0.55);
            --border-soft: rgba(255, 255, 255, 0.10);
            --danger-soft: rgba(220, 53, 69, 0.08);
            --danger-border: rgba(220, 53, 69, 0.32);
            --shadow-gold: 0 22px 65px rgba(245, 200, 75, 0.22);
            --shadow-dark: 0 28px 80px rgba(0, 0, 0, 0.45);
        }

        * {
            box-sizing: border-box;
        }

        html {
            scroll-behavior: smooth;
        }

        body {
            margin: 0;
            font-family: 'Inter', system-ui, sans-serif;
            background: var(--bg-main);
            color: var(--text-main);
            overflow-x: hidden;
        }

        h1, h2, h3, h4, h5 {
            font-family: 'Fraunces', serif;
            letter-spacing: -0.03em;
        }

        a {
            text-decoration: none;
        }

        /* Navbar */
        .custom-navbar {
            background: rgba(3, 20, 15, 0.88);
            backdrop-filter: blur(18px);
            border-bottom: 1px solid var(--border-soft);
        }

        .navbar-brand {
            display: flex;
            align-items: center;
            gap: 10px;
            font-family: 'Fraunces', serif;
            font-size: 22px;
            font-weight: 800;
            color: var(--gold) !important;
        }

        .brand-icon {
            width: 38px;
            height: 38px;
            border-radius: 14px;
            background: linear-gradient(135deg, #ffe27a, #f1b82d);
            color: #06331f;
            display: grid;
            place-items: center;
            box-shadow: var(--shadow-gold);
        }

        .navbar-nav .nav-link {
            color: var(--text-muted) !important;
            font-size: 14px;
            font-weight: 500;
            margin: 0 12px;
            position: relative;
            transition: 0.3s ease;
        }

        .navbar-nav .nav-link:hover {
            color: var(--text-main) !important;
        }

        .navbar-nav .nav-link::after {
            content: "";
            position: absolute;
            left: 0;
            bottom: 2px;
            width: 0;
            height: 1px;
            background: var(--gold);
            transition: 0.3s ease;
        }

        .navbar-nav .nav-link:hover::after {
            width: 100%;
        }

        .btn-login {
            border: none;
            border-radius: 50px;
            background: linear-gradient(135deg, #ffe27a, #f0b92e);
            color: #07331f !important;
            font-weight: 700;
            padding: 10px 24px;
            box-shadow: var(--shadow-gold);
            transition: 0.3s ease;
        }

        .btn-login:hover {
            transform: translateY(-2px) scale(1.03);
            opacity: 0.95;
        }

        /* Hero */
        .hero-section {
            position: relative;
            min-height: 92vh;
            display: flex;
            align-items: center;
            overflow: hidden;
            background:
                radial-gradient(circle at 15% 15%, rgba(29, 191, 115, 0.28), transparent 35%),
                radial-gradient(circle at 85% 25%, rgba(245, 200, 75, 0.18), transparent 32%),
                radial-gradient(circle at 55% 85%, rgba(13, 90, 58, 0.65), transparent 38%),
                linear-gradient(135deg, #052017, #06311f 50%, #03140f);
            background-size: 180% 180%;
            animation: meshMove 18s ease-in-out infinite;
        }

        .hero-section::before {
            content: "";
            position: absolute;
            inset: 0;
            background-image: url("data:image/svg+xml,%3Csvg viewBox='0 0 200 200' xmlns='http://www.w3.org/2000/svg'%3E%3Cfilter id='n'%3E%3CfeTurbulence type='fractalNoise' baseFrequency='0.8' numOctaves='2'/%3E%3C/filter%3E%3Crect width='100%25' height='100%25' filter='url(%23n)' opacity='0.18'/%3E%3C/svg%3E");
            opacity: 0.13;
            pointer-events: none;
        }

        .floating-blob {
            position: absolute;
            border-radius: 50%;
            filter: blur(70px);
            pointer-events: none;
            opacity: 0.6;
        }

        .blob-one {
            width: 430px;
            height: 430px;
            background: rgba(29, 191, 115, 0.26);
            top: -120px;
            left: -120px;
            animation: floatOne 14s ease-in-out infinite;
        }

        .blob-two {
            width: 380px;
            height: 380px;
            background: rgba(245, 200, 75, 0.18);
            right: -80px;
            top: 100px;
            animation: floatTwo 17s ease-in-out infinite;
        }

        .blob-three {
            width: 320px;
            height: 320px;
            background: rgba(13, 90, 58, 0.5);
            left: 42%;
            bottom: -80px;
            animation: pulseGlow 7s ease-in-out infinite;
        }

        .hero-content {
            position: relative;
            z-index: 2;
            padding: 90px 0;
        }

        .year-badge {
            display: inline-flex;
            align-items: center;
            gap: 9px;
            padding: 8px 16px;
            border-radius: 50px;
            background: var(--gold-soft);
            color: var(--gold);
            border: 1px solid var(--gold-border);
            font-size: 12px;
            font-weight: 700;
            text-transform: uppercase;
            letter-spacing: 1.7px;
            margin-bottom: 28px;
        }

        .year-dot {
            width: 7px;
            height: 7px;
            border-radius: 50%;
            background: var(--gold);
            box-shadow: 0 0 18px var(--gold);
            animation: blinkDot 1.5s infinite;
        }

        .hero-title {
            font-size: clamp(46px, 7vw, 82px);
            line-height: 1.04;
            font-weight: 900;
            margin-bottom: 24px;
        }

        .gold-text {
            background: linear-gradient(135deg, #fff0a8, #f5c84b, #d9961f);
            -webkit-background-clip: text;
            background-clip: text;
            color: transparent;
            font-style: italic;
        }

        .hero-subtitle {
            color: var(--text-muted);
            font-size: 18px;
            line-height: 1.8;
            max-width: 620px;
            margin-bottom: 36px;
        }

        .btn-hero-primary {
            border: none;
            border-radius: 50px;
            background: linear-gradient(135deg, #ffe27a, #f0b92e);
            color: #07331f;
            font-weight: 800;
            padding: 14px 30px;
            box-shadow: var(--shadow-gold);
            transition: 0.3s ease;
        }

        .btn-hero-primary:hover {
            transform: translateY(-3px) scale(1.03);
            color: #07331f;
        }

        .btn-hero-outline {
            border-radius: 50px;
            border: 1px solid var(--gold-border);
            color: var(--text-main);
            font-weight: 700;
            padding: 14px 30px;
            transition: 0.3s ease;
        }

        .btn-hero-outline:hover {
            background: rgba(255, 255, 255, 0.08);
            color: var(--text-main);
            transform: translateY(-3px);
        }

        /* Core Module Card */
        .hero-card {
            position: relative;
            background: rgba(5, 32, 23, 0.66);
            backdrop-filter: blur(22px);
            border: 1px solid var(--gold-border);
            border-radius: 30px;
            box-shadow: var(--shadow-dark);
            overflow: hidden;
        }

        .hero-card::before {
            content: "";
            position: absolute;
            inset: -1px;
            border-radius: 30px;
            background: linear-gradient(135deg, rgba(245, 200, 75, 0.22), transparent 45%);
            z-index: -1;
        }

        .hero-card .card-body {
            padding: 32px;
        }

        .module-count {
            font-size: 12px;
            color: var(--text-muted);
            letter-spacing: 2px;
        }

        .feature-card {
            height: 100%;
            background: rgba(255, 255, 255, 0.045);
            border: 1px solid var(--border-soft);
            border-radius: 22px;
            color: var(--text-main);
            transition: 0.35s ease;
            overflow: hidden;
        }

        .feature-card:hover {
            transform: translateY(-7px);
            border-color: var(--gold-border);
            background: rgba(255, 255, 255, 0.075);
            box-shadow: var(--shadow-gold);
        }

        .feature-icon {
            width: 48px;
            height: 48px;
            border-radius: 16px;
            background: var(--gold-soft);
            color: var(--gold);
            display: grid;
            place-items: center;
            font-size: 22px;
            margin-bottom: 14px;
            transition: 0.3s ease;
        }

        .feature-card:hover .feature-icon {
            background: linear-gradient(135deg, #ffe27a, #f0b92e);
            color: #07331f;
            transform: scale(1.08);
        }

        .feature-card h6 {
            font-size: 14px;
            font-weight: 700;
            margin: 0;
        }

        /* Team */
        .team-section {
            padding: 90px 0;
            background:
                radial-gradient(circle at 20% 20%, rgba(245, 200, 75, 0.08), transparent 28%),
                linear-gradient(180deg, var(--bg-main), var(--bg-dark));
        }

        .team-card {
            background: rgba(5, 32, 23, 0.72);
            border: 1px solid var(--border-soft);
            border-radius: 32px;
            color: var(--text-main);
            box-shadow: var(--shadow-dark);
            backdrop-filter: blur(18px);
        }

        .section-kicker {
            color: var(--gold);
            font-size: 12px;
            font-weight: 800;
            text-transform: uppercase;
            letter-spacing: 4px;
            margin-bottom: 14px;
        }

        .section-title {
            font-size: clamp(36px, 5vw, 58px);
            font-weight: 900;
            margin-bottom: 16px;
        }

        .section-subtitle {
            color: var(--text-muted);
            max-width: 650px;
            margin: 0 auto 26px;
            line-height: 1.7;
        }

        .guide-box {
            display: inline-block;
            background: var(--gold-soft);
            border: 1px solid var(--gold-border);
            border-radius: 22px;
            padding: 18px 28px;
            margin-bottom: 38px;
        }

        .guide-box small {
            color: var(--text-muted);
            display: block;
            margin-bottom: 4px;
        }

        .guide-box strong {
            color: var(--gold);
            font-family: 'Fraunces', serif;
            font-size: 20px;
        }

        .developer-item {
            display: flex;
            align-items: center;
            gap: 16px;
            padding: 18px;
            border-radius: 20px;
            background: rgba(255, 255, 255, 0.045);
            border: 1px solid var(--border-soft);
            margin-bottom: 14px;
            transition: 0.32s ease;
        }

        .developer-item:hover {
            transform: translateY(-4px);
            border-color: var(--gold-border);
            background: rgba(255, 255, 255, 0.075);
        }

        .developer-avatar {
            width: 52px;
            height: 52px;
            border-radius: 17px;
            flex-shrink: 0;
            background: linear-gradient(135deg, #ffe27a, #f0b92e);
            color: #07331f;
            display: grid;
            place-items: center;
            font-family: 'Fraunces', serif;
            font-weight: 900;
            box-shadow: var(--shadow-gold);
        }

        .developer-name {
            font-weight: 800;
            color: var(--text-main);
            margin-bottom: 2px;
        }

        .developer-role {
            color: var(--text-muted);
            font-size: 14px;
        }

        /* Warning */
        .warning-section {
            padding-bottom: 80px;
            background: var(--bg-dark);
        }

        .warning-card {
            position: relative;
            overflow: hidden;
            border-radius: 28px;
            background: var(--danger-soft);
            border: 1px solid var(--danger-border);
            color: var(--text-main);
        }

        .warning-card::before {
            content: "";
            position: absolute;
            left: 0;
            top: 0;
            bottom: 0;
            width: 7px;
            background: linear-gradient(180deg, #ffe27a, #f0b92e);
        }

        .warning-title {
            color: var(--gold);
            font-size: 24px;
            font-weight: 800;
        }

        .warning-card p {
            color: var(--text-muted);
            line-height: 1.7;
        }

        /* Footer */
        .public-footer {
            background: #020d0a;
            border-top: 1px solid var(--border-soft);
            color: var(--text-muted);
        }

        /* Reveal Animation */
        .reveal {
            opacity: 0;
            transform: translateY(34px);
            transition: 0.9s cubic-bezier(0.22, 1, 0.36, 1);
        }

        .reveal.show {
            opacity: 1;
            transform: translateY(0);
        }

        .reveal-scale {
            opacity: 0;
            transform: scale(0.94);
            transition: 0.85s cubic-bezier(0.22, 1, 0.36, 1);
        }

        .reveal-scale.show {
            opacity: 1;
            transform: scale(1);
        }

        .delay-1 { transition-delay: 0.1s; }
        .delay-2 { transition-delay: 0.2s; }
        .delay-3 { transition-delay: 0.3s; }
        .delay-4 { transition-delay: 0.4s; }
        .delay-5 { transition-delay: 0.5s; }
        .delay-6 { transition-delay: 0.6s; }

        @keyframes meshMove {
            0%, 100% {
                background-position: 0% 0%;
            }
            50% {
                background-position: 80% 45%;
            }
        }

        @keyframes floatOne {
            0%, 100% {
                transform: translate(0, 0) scale(1);
            }
            50% {
                transform: translate(55px, -30px) scale(1.08);
            }
        }

        @keyframes floatTwo {
            0%, 100% {
                transform: translate(0, 0) scale(1);
            }
            50% {
                transform: translate(-45px, 35px) scale(1.12);
            }
        }

        @keyframes pulseGlow {
            0%, 100% {
                transform: scale(1);
                opacity: 0.42;
            }
            50% {
                transform: scale(1.1);
                opacity: 0.7;
            }
        }

        @keyframes blinkDot {
            0%, 100% {
                opacity: 0.4;
            }
            50% {
                opacity: 1;
            }
        }

        @media (max-width: 991px) {
            .hero-section {
                min-height: auto;
            }

            .hero-content {
                padding: 70px 0;
            }

            .hero-card {
                margin-top: 20px;
            }

            .navbar-nav {
                padding-top: 18px;
            }

            .navbar-nav .nav-link {
                margin: 6px 0;
            }

            .btn-login {
                margin-top: 10px;
                display: inline-block;
            }
        }

        @media (max-width: 575px) {
            .hero-title {
                font-size: 42px;
            }

            .hero-subtitle {
                font-size: 16px;
            }

            .btn-hero-primary,
            .btn-hero-outline {
                width: 100%;
                text-align: center;
                margin-bottom: 10px;
            }

            .hero-card .card-body {
                padding: 22px;
            }

            .developer-item {
                align-items: flex-start;
            }
        }
    </style>
</head>
<body>

<!-- Navbar -->
<nav class="navbar navbar-expand-lg navbar-dark custom-navbar sticky-top">
    <div class="container">
        <a class="navbar-brand" href="/college/public/index.php">
            <span class="brand-icon">
                <i class="bi bi-stars"></i>
            </span>
            College CMS
        </a>

        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#mainNavbar">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="mainNavbar">
            <ul class="navbar-nav ms-auto align-items-lg-center">
                <li class="nav-item">
                    <a class="nav-link" href="/college/public/index.php">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#about">About</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#contact">Contact</a>
                </li>
                <li class="nav-item ms-lg-3">
                    <a class="btn btn-login" href="/college/public/index.php?url=login">Login</a>
                </li>
            </ul>
        </div>
    </div>
</nav>

<!-- Hero Section -->
<section class="hero-section">
    <div class="floating-blob blob-one"></div>
    <div class="floating-blob blob-two"></div>
    <div class="floating-blob blob-three"></div>

    <div class="container hero-content">
        <div class="row align-items-center g-5">
            <div class="col-lg-7">
                <div class="reveal">
                    <div class="year-badge">
                        <span class="year-dot"></span>
                        Academic Year 2026
                    </div>
                </div>

                <h1 class="hero-title reveal delay-1">
                    Welcome to <br>
                    <span class="gold-text">College CMS</span>
                </h1>

                <p class="hero-subtitle reveal delay-2">
                    A smart, secure and beautifully organized platform for managing students,
                    faculty, admissions, attendance, results and academic records — all in one place.
                </p>

                <div class="reveal delay-3">
                    <a href="/college/public/index.php?url=login" class="btn btn-hero-primary me-md-2">
                        Login to Portal
                        <i class="bi bi-arrow-right ms-1"></i>
                    </a>

                    <a href="#about" class="btn btn-hero-outline">
                        Explore Features
                    </a>
                </div>
            </div>

            <div class="col-lg-5">
                <div class="card hero-card reveal-scale">
                    <div class="card-body">
                        <div class="d-flex align-items-center justify-content-between mb-4">
                            <h3 class="mb-0">Core Modules</h3>
                            <span class="module-count">06</span>
                        </div>

                        <div class="row g-3">
                            <div class="col-6">
                                <div class="card feature-card reveal-scale delay-1">
                                    <div class="card-body text-center">
                                        <div class="feature-icon mx-auto">
                                            <i class="bi bi-people-fill"></i>
                                        </div>
                                        <h6>User Management</h6>
                                    </div>
                                </div>
                            </div>

                            <div class="col-6">
                                <div class="card feature-card reveal-scale delay-2">
                                    <div class="card-body text-center">
                                        <div class="feature-icon mx-auto">
                                            <i class="bi bi-journal-check"></i>
                                        </div>
                                        <h6>Admissions</h6>
                                    </div>
                                </div>
                            </div>

                            <div class="col-6">
                                <div class="card feature-card reveal-scale delay-3">
                                    <div class="card-body text-center">
                                        <div class="feature-icon mx-auto">
                                            <i class="bi bi-mortarboard-fill"></i>
                                        </div>
                                        <h6>Student Module</h6>
                                    </div>
                                </div>
                            </div>

                            <div class="col-6">
                                <div class="card feature-card reveal-scale delay-4">
                                    <div class="card-body text-center">
                                        <div class="feature-icon mx-auto">
                                            <i class="bi bi-person-workspace"></i>
                                        </div>
                                        <h6>Faculty Module</h6>
                                    </div>
                                </div>
                            </div>

                            <div class="col-6">
                                <div class="card feature-card reveal-scale delay-5">
                                    <div class="card-body text-center">
                                        <div class="feature-icon mx-auto">
                                            <i class="bi bi-calendar-check-fill"></i>
                                        </div>
                                        <h6>Attendance</h6>
                                    </div>
                                </div>
                            </div>

                            <div class="col-6">
                                <div class="card feature-card reveal-scale delay-6">
                                    <div class="card-body text-center">
                                        <div class="feature-icon mx-auto">
                                            <i class="bi bi-card-checklist"></i>
                                        </div>
                                        <h6>Results</h6>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Developer Team Section -->
<section id="about" class="team-section">
    <div class="container">
        <div class="card team-card reveal">
            <div class="card-body p-4 p-lg-5">
                <div class="text-center">
                    <div class="section-kicker">The Makers</div>
                    <h2 class="section-title">Developer Team</h2>

                    <p class="section-subtitle">
                        This CMS was completely developed under academic guidance and team collaboration.
                    </p>

                    <div class="guide-box">
                        <small>Developed under the guidelines of</small>
                        <strong>Athar Shaikh</strong>
                        <small>Founder of DharwadHubliTutors</small>
                    </div>
                </div>

                <div class="row justify-content-center">
                    <div class="col-lg-10">
                        <div class="row g-3">

                            <div class="col-md-6">
                                <div class="developer-item">
                                    <div class="developer-avatar">MS</div>
                                    <div>
                                        <div class="developer-name">Mohammad Saad Mirjanavar</div>
                                        <div class="developer-role">User Management Module</div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="developer-item">
                                    <div class="developer-avatar">MY</div>
                                    <div>
                                        <div class="developer-name">Mohammed Shakir Ali Yadwad</div>
                                        <div class="developer-role">Admission Module</div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="developer-item">
                                    <div class="developer-avatar">SY</div>
                                    <div>
                                        <div class="developer-name">Shaziya Yaragatti</div>
                                        <div class="developer-role">Student Module</div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="developer-item">
                                    <div class="developer-avatar">JB</div>
                                    <div>
                                        <div class="developer-name">Jabeen Bepari</div>
                                        <div class="developer-role">Student Module</div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="developer-item">
                                    <div class="developer-avatar">TM</div>
                                    <div>
                                        <div class="developer-name">Taslim Meeranavar</div>
                                        <div class="developer-role">Faculty Module</div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="developer-item">
                                    <div class="developer-avatar">BA</div>
                                    <div>
                                        <div class="developer-name">Bibi Asiya Karnool</div>
                                        <div class="developer-role">Faculty Module</div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="developer-item">
                                    <div class="developer-avatar">RM</div>
                                    <div>
                                        <div class="developer-name">Rubina Makandar</div>
                                        <div class="developer-role">Faculty Module</div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="developer-item">
                                    <div class="developer-avatar">FB</div>
                                    <div>
                                        <div class="developer-name">Farhat Bahadur</div>
                                        <div class="developer-role">Cyber Security Management</div>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
</section>

<!-- Warning Section -->
<section id="contact" class="warning-section">
    <div class="container">
        <div class="card warning-card reveal">
            <div class="card-body p-4 p-lg-5 text-center">
                <h5 class="warning-title mb-3">
                    <i class="bi bi-exclamation-triangle-fill me-2"></i>
                    Warning Notice
                </h5>
                <p class="mb-0 mx-auto" style="max-width: 850px;">
                    Unauthorized access, modification, misuse, or distribution of this College CMS
                    and its data is strictly prohibited. This project is intended for academic and
                    educational use only.
                </p>
            </div>
        </div>
    </div>
</section>

<!-- Footer -->
<footer class="public-footer py-4">
    <div class="container text-center">
        <small>© 2026 College CMS. Crafted with care. All rights reserved.</small>
    </div>
</footer>

<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

<!-- Scroll Reveal JS -->
<script>
    document.addEventListener("DOMContentLoaded", function () {
        const revealElements = document.querySelectorAll(".reveal, .reveal-scale");

        const revealObserver = new IntersectionObserver(function (entries) {
            entries.forEach(function (entry) {
                if (entry.isIntersecting) {
                    entry.target.classList.add("show");
                    revealObserver.unobserve(entry.target);
                }
            });
        }, {
            threshold: 0.15,
            rootMargin: "0px 0px -8% 0px"
        });

        revealElements.forEach(function (element) {
            revealObserver.observe(element);
        });
    });
</script>

</body>
</html>