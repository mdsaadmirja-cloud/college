<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>College CMS | Home</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Syne:wght@400;600;700;800&family=DM+Sans:ital,wght@0,300;0,400;0,500;1,300&display=swap" rel="stylesheet">
    <link href="/college/public/assets/css/public.css" rel="stylesheet">
    <style>
        :root {
            --teal:       #00CFC1;
            --teal-dark:  #00A89A;
            --teal-light: #33E8DB;
            --peach:      #FF6B6B;
            --peach-light:#FFB3B3;
            --white:      #FFFFFF;
            --dark:       #1A1A2E;
            --text-muted: #6B7A8D;
        }

        * { box-sizing: border-box; }

        body {
            font-family: 'DM Sans', sans-serif;
            background: #F7FBFB;
            color: var(--dark);
            overflow-x: hidden;
        }

        /* ── NAVBAR ── */
        .navbar {
            background: var(--white) !important;
            border-bottom: 1px solid rgba(94,206,206,.18);
            padding: 14px 0;
            position: sticky;
            top: 0;
            z-index: 999;
            box-shadow: 0 2px 20px rgba(94,206,206,.12);
        }
        .navbar-brand {
            font-family: 'Syne', sans-serif;
            font-weight: 800;
            font-size: 1.3rem;
            color: var(--teal-dark) !important;
            letter-spacing: -.5px;
        }
        .nav-link {
            font-family: 'DM Sans', sans-serif;
            font-weight: 500;
            font-size: .9rem;
            color: var(--dark) !important;
            letter-spacing: .3px;
            transition: color .2s;
            padding: 6px 14px !important;
        }
        .nav-link:hover { color: var(--teal-dark) !important; }
        .btn-nav-login {
            background: var(--teal);
            color: var(--white) !important;
            border: none;
            border-radius: 50px;
            font-weight: 600;
            font-size: .88rem;
            padding: 8px 22px;
            transition: background .25s, transform .2s;
        }
        .btn-nav-login:hover {
            background: var(--teal-dark);
            transform: translateY(-1px);
            color: var(--white) !important;
        }

        /* ── HERO ── */
        .hero-section {
            background: var(--teal);
            position: relative;
            overflow: hidden;
            padding: 80px 0 90px;
            min-height: 88vh;
            display: flex;
            align-items: center;
        }

        /* organic blobs */
        .hero-section::before,
        .hero-section::after {
            content: '';
            position: absolute;
            border-radius: 50% 40% 60% 40% / 50% 60% 40% 50%;
            z-index: 0;
            opacity: .55;
        }
        .hero-section::before {
            width: 420px; height: 380px;
            background: var(--peach);
            top: -80px; right: -60px;
            animation: blobFloat 8s ease-in-out infinite alternate;
        }
        .hero-section::after {
            width: 300px; height: 260px;
            background: var(--peach-light);
            bottom: -60px; left: 5%;
            border-radius: 60% 40% 50% 60% / 40% 60% 50% 40%;
            animation: blobFloat 10s ease-in-out infinite alternate-reverse;
        }

        .blob-extra {
            position: absolute;
            border-radius: 50% 60% 40% 55% / 55% 40% 60% 50%;
            z-index: 0;
            opacity: .35;
            background: rgba(255,255,255,.4);
            width: 180px; height: 160px;
            top: 40%; left: 52%;
            animation: blobFloat 12s ease-in-out infinite;
        }

        @keyframes blobFloat {
            from { transform: translate(0,0) rotate(0deg) scale(1); }
            to   { transform: translate(18px,22px) rotate(6deg) scale(1.06); }
        }

        .hero-section .container { position: relative; z-index: 1; }

        .hero-title {
            font-family: 'Syne', sans-serif;
            font-weight: 800;
            font-size: clamp(2.4rem, 5vw, 3.6rem);
            color: var(--white);
            line-height: 1.1;
            letter-spacing: -1.5px;
        }
        .hero-subtitle {
            color: rgba(255,255,255,.88);
            font-size: 1.05rem;
            font-weight: 300;
            max-width: 440px;
            line-height: 1.7;
        }
        .btn-hero-primary {
            background: var(--white);
            color: var(--teal-dark);
            border: none;
            border-radius: 50px;
            font-weight: 700;
            font-size: .95rem;
            padding: 13px 30px;
            box-shadow: 0 6px 24px rgba(0,0,0,.12);
            transition: transform .2s, box-shadow .2s;
            font-family: 'DM Sans', sans-serif;
        }
        .btn-hero-primary:hover {
            transform: translateY(-2px);
            box-shadow: 0 10px 32px rgba(0,0,0,.18);
            color: var(--teal-dark);
        }
        .btn-hero-outline {
            background: transparent;
            color: var(--white);
            border: 2px solid rgba(255,255,255,.7);
            border-radius: 50px;
            font-weight: 600;
            font-size: .95rem;
            padding: 12px 28px;
            transition: background .2s, border-color .2s;
            font-family: 'DM Sans', sans-serif;
        }
        .btn-hero-outline:hover {
            background: rgba(255,255,255,.15);
            border-color: var(--white);
            color: var(--white);
        }

        /* ── HERO CARD ── */
        .hero-card {
            background: var(--white);
            border: none;
            border-radius: 24px;
            box-shadow: 0 20px 60px rgba(0,0,0,.14);
            overflow: hidden;
            animation: slideUp .7s cubic-bezier(.22,.68,0,1.2) both;
        }
        @keyframes slideUp {
            from { opacity: 0; transform: translateY(40px); }
            to   { opacity: 1; transform: translateY(0); }
        }
        .hero-card .card-body h4 {
            font-family: 'Syne', sans-serif;
            font-weight: 700;
            color: var(--dark);
            letter-spacing: -.4px;
        }

        .feature-card {
            border: 1.5px solid rgba(94,206,206,.2);
            border-radius: 14px;
            background: #F7FBFB;
            transition: border-color .2s, transform .2s, box-shadow .2s;
            cursor: default;
        }
        .feature-card:hover {
            border-color: var(--teal);
            transform: translateY(-3px);
            box-shadow: 0 8px 20px rgba(94,206,206,.2);
        }
        .feature-card .card-body {
            padding: 16px 10px;
        }
        .feature-icon {
            width: 42px; height: 42px;
            border-radius: 12px;
            background: linear-gradient(135deg, var(--teal-light), var(--teal));
            display: flex; align-items: center; justify-content: center;
            margin-bottom: 10px;
            font-size: 1.15rem;
            color: var(--white);
        }
        .feature-card h6 {
            font-family: 'DM Sans', sans-serif;
            font-weight: 500;
            font-size: .8rem;
            color: var(--dark);
        }

        /* ── SECTION SHARED ── */
        .section-label {
            font-family: 'DM Sans', sans-serif;
            font-size: .75rem;
            font-weight: 600;
            letter-spacing: 2.5px;
            text-transform: uppercase;
            color: var(--teal-dark);
            margin-bottom: 8px;
            display: block;
        }
        .section-title-syne {
            font-family: 'Syne', sans-serif;
            font-weight: 800;
            font-size: clamp(1.6rem, 3vw, 2.2rem);
            color: var(--dark);
            letter-spacing: -.6px;
            margin-bottom: 8px;
        }
        .section-sub {
            color: var(--text-muted);
            font-size: .95rem;
            font-weight: 300;
        }

        /* ── ABOUT / TEAM ── */
        #about { padding: 90px 0; }

        .guide-badge {
            display: inline-flex;
            align-items: center;
            gap: 10px;
            background: linear-gradient(135deg, var(--teal-light) 0%, rgba(242,184,150,.3) 100%);
            border: 1.5px solid rgba(94,206,206,.3);
            border-radius: 60px;
            padding: 12px 22px;
            margin-bottom: 36px;
        }
        .guide-badge .badge-avatar {
            width: 36px; height: 36px;
            border-radius: 50%;
            background: var(--teal);
            display: flex; align-items: center; justify-content: center;
            color: var(--white);
            font-size: 1rem;
            flex-shrink: 0;
        }
        .guide-badge .badge-text strong {
            font-family: 'Syne', sans-serif;
            font-weight: 700;
            font-size: .95rem;
            color: var(--dark);
            display: block;
            line-height: 1.1;
        }
        .guide-badge .badge-text span {
            font-size: .78rem;
            color: var(--text-muted);
        }

        .dev-grid {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 12px;
        }
        @media (min-width: 768px) {
            .dev-grid { grid-template-columns: repeat(4, 1fr); }
        }

        .dev-card {
            background: var(--white);
            border: 1.5px solid rgba(94,206,206,.15);
            border-radius: 16px;
            padding: 18px 14px;
            text-align: center;
            transition: border-color .2s, transform .2s, box-shadow .2s;
        }
        .dev-card:hover {
            border-color: var(--teal);
            transform: translateY(-4px);
            box-shadow: 0 10px 28px rgba(94,206,206,.18);
        }
        .dev-avatar {
            width: 46px; height: 46px;
            border-radius: 50%;
            background: linear-gradient(135deg, var(--teal-light), var(--teal));
            display: flex; align-items: center; justify-content: center;
            margin: 0 auto 10px;
            color: var(--white);
            font-size: 1.1rem;
        }
        .dev-name {
            font-family: 'Syne', sans-serif;
            font-weight: 700;
            font-size: .82rem;
            color: var(--dark);
            margin-bottom: 4px;
            line-height: 1.25;
        }
        .dev-role {
            font-size: .72rem;
            color: var(--teal-dark);
            font-weight: 500;
            background: rgba(94,206,206,.12);
            border-radius: 30px;
            padding: 2px 10px;
            display: inline-block;
        }

        /* ── WARNING ── */
        #contact { padding-bottom: 70px; }
        .warning-card {
            background: linear-gradient(135deg, #FFF5EE, #FFE8D6);
            border: 1.5px solid var(--peach);
            border-radius: 20px;
        }
        .warning-card .card-body { padding: 28px 32px; }
        .warning-title {
            font-family: 'Syne', sans-serif;
            font-weight: 700;
            color: #C0622A;
            font-size: 1rem;
        }
        .warning-card p {
            font-size: .9rem;
            color: #7A4020;
            font-weight: 300;
            line-height: 1.7;
            margin: 0;
        }

        /* ── FOOTER ── */
        .public-footer {
            background: var(--dark);
            color: rgba(255,255,255,.45);
            font-size: .8rem;
            font-family: 'DM Sans', sans-serif;
            padding: 20px 0;
        }

        /* ── RESPONSIVE ── */
        @media (max-width: 991px) {
            .hero-section { padding: 60px 0 70px; min-height: auto; }
        }
    </style>
</head>
<body>

<nav class="navbar navbar-expand-lg sticky-top">
    <div class="container">
        <a class="navbar-brand" href="/college/public/index.php">Nehru BBA & BCA College Hubli</a>

        <button class="navbar-toggler border-0" type="button" data-bs-toggle="collapse" data-bs-target="#mainNavbar">
            <span class="navbar-toggler-icon" style="filter: invert(60%) sepia(50%) saturate(400%) hue-rotate(150deg);"></span>
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
                    <a class="btn-nav-login" href="/college/public/index.php?url=login">Login</a>
                </li>
            </ul>
        </div>
    </div>
</nav>

<section class="hero-section">
    <div class="blob-extra"></div>
    <div class="container">
        <div class="row align-items-center g-4">
            <div class="col-lg-7">
                <span class="section-label" style="color:rgba(255,255,255,.75);">Academic Management Platform</span>
                <h1 class="hero-title mb-3">Welcome to<br>Nehru BBA & BCA College Hubli</h1>
                <p class="hero-subtitle mb-4">
                    A smart, secure and organized platform for managing students, faculty,
                    admissions, attendance, results, and academic records.
                </p>
                <a href="/college/public/index.php?url=login" class="btn-hero-primary me-3">Login to Portal</a>
                <a href="#about" class="btn-hero-outline">Explore Features</a>
            </div>

            <div class="col-lg-5">
                <div class="card hero-card">
                    <div class="card-body p-4">
                        <h4 class="mb-4">Core Modules</h4>
                        <div class="row g-3">
                            <div class="col-6">
                                <div class="card feature-card">
                                    <div class="card-body text-center">
                                        <div class="feature-icon mx-auto"><i class="bi bi-people-fill"></i></div>
                                        <h6 class="mb-0">User Management</h6>
                                    </div>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="card feature-card">
                                    <div class="card-body text-center">
                                        <div class="feature-icon mx-auto"><i class="bi bi-journal-check"></i></div>
                                        <h6 class="mb-0">Admissions</h6>
                                    </div>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="card feature-card">
                                    <div class="card-body text-center">
                                        <div class="feature-icon mx-auto"><i class="bi bi-mortarboard-fill"></i></div>
                                        <h6 class="mb-0">Student Module</h6>
                                    </div>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="card feature-card">
                                    <div class="card-body text-center">
                                        <div class="feature-icon mx-auto"><i class="bi bi-person-workspace"></i></div>
                                        <h6 class="mb-0">Faculty Module</h6>
                                    </div>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="card feature-card">
                                    <div class="card-body text-center">
                                        <div class="feature-icon mx-auto"><i class="bi bi-calendar-check-fill"></i></div>
                                        <h6 class="mb-0">Attendance</h6>
                                    </div>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="card feature-card">
                                    <div class="card-body text-center">
                                        <div class="feature-icon mx-auto"><i class="bi bi-card-checklist"></i></div>
                                        <h6 class="mb-0">Results</h6>
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

<section id="about" class="py-5">
    <div class="container">
        <div class="text-center mb-5">
            <span class="section-label">Our Team</span>
            <h2 class="section-title-syne">Developer Team</h2>
            <p class="section-sub">Built under academic guidance and close team collaboration.</p>
        </div>

        <div class="d-flex justify-content-center mb-5">
            <div class="guide-badge">
                <div class="badge-avatar"><i class="bi bi-person-check-fill"></i></div>
                <div class="badge-text">
                    <strong>Athar Shaikh</strong>
                    <span>Founder, DharwadHubliTutors — Academic Guide</span>
                </div>
            </div>
        </div>

        <div class="dev-grid">
            <div class="dev-card">
                <div class="dev-avatar"><i class="bi bi-people-fill"></i></div>
                <div class="dev-name">Mohammad Saad Mirjanavar</div>
                <span class="dev-role">User Management</span>
            </div>
            <div class="dev-card">
                <div class="dev-avatar"><i class="bi bi-journal-check"></i></div>
                <div class="dev-name">Mohammed Shakir Ali Yadwad</div>
                <span class="dev-role">Admission Module</span>
            </div>
            <div class="dev-card">
                <div class="dev-avatar"><i class="bi bi-mortarboard-fill"></i></div>
                <div class="dev-name">Jabeen Bepari</div>
                <span class="dev-role">Student Module</span>
            </div>
            <div class="dev-card">
                <div class="dev-avatar"><i class="bi bi-mortarboard-fill"></i></div>
                <div class="dev-name">Shaziya Yaragatti</div>
                <span class="dev-role">Student Module</span>
            </div>
            <div class="dev-card">
                <div class="dev-avatar"><i class="bi bi-person-workspace"></i></div>
                <div class="dev-name">Taslim Meeranavar</div>
                <span class="dev-role">Faculty Module</span>
            </div>
            <div class="dev-card">
                <div class="dev-avatar"><i class="bi bi-person-workspace"></i></div>
                <div class="dev-name">Bibi Asiya Karnool</div>
                <span class="dev-role">Faculty Module</span>
            </div>
            <div class="dev-card">
                <div class="dev-avatar"><i class="bi bi-person-workspace"></i></div>
                <div class="dev-name">Rubina Makandar</div>
                <span class="dev-role">Faculty Module</span>
            </div>
            <div class="dev-card">
                <div class="dev-avatar"><i class="bi bi-shield-lock-fill"></i></div>
                <div class="dev-name">Farhat Bahadur</div>
                <span class="dev-role">Cyber Security</span>
            </div>
        </div>
    </div>
</section>

<section id="contact" class="pb-5">
    <div class="container">
        <div class="warning-card card border-0">
            <div class="card-body text-center">
                <h5 class="warning-title mb-2"><i class="bi bi-exclamation-triangle-fill me-2"></i>Warning Message</h5>
                <p>
                    Unauthorized access, modification, misuse, or distribution of this CMS Portal
                    and its data is strictly prohibited. This project is intended for academic and
                    educational use only.
                </p>
            </div>
        </div>
    </div>
</section>

<footer class="public-footer">
    <div class="container text-center">
        <small>© 2026 Nehru BBA & BCA College Hubli. All rights reserved.</small>
    </div>
</footer>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>