<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>College CMS | Login</title>

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Bootstrap Icons -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Fraunces:opsz,wght@9..144,600;9..144,700;9..144,900&family=Inter:wght@400;500;600;700;800&display=swap" rel="stylesheet">

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
            --border-soft: rgba(255, 255, 255, 0.12);
            --shadow-gold: 0 22px 65px rgba(245, 200, 75, 0.22);
            --shadow-dark: 0 28px 80px rgba(0, 0, 0, 0.48);
        }

        * {
            box-sizing: border-box;
        }

        body {
            min-height: 100vh;
            margin: 0;
            font-family: 'Inter', system-ui, sans-serif;
            color: var(--text-main);
            background:
                radial-gradient(circle at 15% 18%, rgba(29, 191, 115, 0.26), transparent 34%),
                radial-gradient(circle at 88% 18%, rgba(245, 200, 75, 0.16), transparent 30%),
                radial-gradient(circle at 55% 88%, rgba(13, 90, 58, 0.60), transparent 36%),
                linear-gradient(135deg, #052017, #06311f 50%, #03140f);
            background-size: 180% 180%;
            animation: meshMove 18s ease-in-out infinite;
            overflow-x: hidden;
        }

        body::before {
            content: "";
            position: fixed;
            inset: 0;
            background-image: url("data:image/svg+xml,%3Csvg viewBox='0 0 200 200' xmlns='http://www.w3.org/2000/svg'%3E%3Cfilter id='n'%3E%3CfeTurbulence type='fractalNoise' baseFrequency='0.8' numOctaves='2'/%3E%3C/filter%3E%3Crect width='100%25' height='100%25' filter='url(%23n)' opacity='0.18'/%3E%3C/svg%3E");
            opacity: 0.12;
            pointer-events: none;
            z-index: 0;
        }

        h1, h2, h3, h4, h5 {
            font-family: 'Fraunces', serif;
            letter-spacing: -0.03em;
        }

        a {
            text-decoration: none;
        }

        .floating-blob {
            position: fixed;
            border-radius: 50%;
            filter: blur(75px);
            pointer-events: none;
            opacity: 0.62;
            z-index: 1;
        }

        .blob-one {
            width: 390px;
            height: 390px;
            background: rgba(29, 191, 115, 0.25);
            top: -110px;
            left: -120px;
            animation: floatOne 14s ease-in-out infinite;
        }

        .blob-two {
            width: 340px;
            height: 340px;
            background: rgba(245, 200, 75, 0.18);
            right: -90px;
            top: 120px;
            animation: floatTwo 17s ease-in-out infinite;
        }

        .blob-three {
            width: 300px;
            height: 300px;
            background: rgba(13, 90, 58, 0.55);
            left: 43%;
            bottom: -100px;
            animation: pulseGlow 7s ease-in-out infinite;
        }

        /* Navbar */
        .custom-navbar {
            position: relative;
            z-index: 5;
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

        .btn-back-home {
            border-radius: 50px;
            border: 1px solid var(--gold-border);
            color: var(--text-main);
            font-weight: 700;
            padding: 9px 18px;
            transition: 0.3s ease;
        }

        .btn-back-home:hover {
            background: var(--gold-soft);
            border-color: var(--gold-border);
            color: var(--gold);
            transform: translateY(-2px);
        }

        /* Login Layout */
        .portal-wrapper {
            position: relative;
            z-index: 3;
            min-height: calc(100vh - 72px);
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 55px 15px;
        }

        .portal-card {
            width: 100%;
            max-width: 465px;
            position: relative;
            background: rgba(5, 32, 23, 0.72);
            backdrop-filter: blur(24px);
            border: 1px solid var(--gold-border);
            border-radius: 32px;
            box-shadow: var(--shadow-dark);
            padding: 38px;
            animation: fadeUp 0.9s cubic-bezier(0.22, 1, 0.36, 1) both;
        }

        .portal-card::before {
            content: "";
            position: absolute;
            inset: -1px;
            border-radius: 32px;
            background: linear-gradient(135deg, rgba(245, 200, 75, 0.22), transparent 45%);
            z-index: -1;
        }

        .login-icon {
            width: 66px;
            height: 66px;
            border-radius: 22px;
            background: linear-gradient(135deg, #ffe27a, #f0b92e);
            color: #07331f;
            display: grid;
            place-items: center;
            font-size: 30px;
            margin: 0 auto 18px;
            box-shadow: var(--shadow-gold);
        }

        .portal-heading {
            color: var(--text-main);
            font-size: 34px;
            font-weight: 900;
            margin-bottom: 8px;
        }

        .portal-subtext {
            color: var(--text-muted);
            font-size: 15px;
            margin-bottom: 28px;
        }

        .form-label {
            color: var(--text-main);
            font-weight: 700;
            font-size: 14px;
            margin-bottom: 8px;
        }

        .input-group-custom {
            position: relative;
        }

        .input-icon {
            position: absolute;
            left: 16px;
            top: 50%;
            transform: translateY(-50%);
            color: var(--gold);
            z-index: 2;
            font-size: 17px;
        }

        .form-control {
            height: 52px;
            border-radius: 16px;
            border: 1px solid var(--border-soft);
            background: rgba(255, 255, 255, 0.06);
            color: var(--text-main);
            padding-left: 46px;
            font-weight: 500;
            transition: 0.3s ease;
        }

        .form-control:focus {
            background: rgba(255, 255, 255, 0.08);
            color: var(--text-main);
            border-color: var(--gold-border);
            box-shadow: 0 0 0 4px rgba(245, 200, 75, 0.12);
        }

        .form-control::placeholder {
            color: rgba(255, 248, 231, 0.42);
        }

        .text-danger {
            display: block;
            margin-top: 6px;
            font-size: 13px;
        }

        .btn-login-submit {
            height: 52px;
            border: none;
            border-radius: 50px;
            background: linear-gradient(135deg, #ffe27a, #f0b92e);
            color: #07331f;
            font-weight: 900;
            letter-spacing: 0.2px;
            box-shadow: var(--shadow-gold);
            transition: 0.3s ease;
        }

        .btn-login-submit:hover {
            transform: translateY(-3px) scale(1.02);
            color: #07331f;
            opacity: 0.96;
        }

        .portal-links {
            text-align: center;
            margin-top: 22px;
            padding-top: 20px;
            border-top: 1px solid var(--border-soft);
        }

        .portal-links small {
            color: var(--text-muted) !important;
        }

        .portal-links a {
            color: var(--gold);
            font-weight: 800;
        }

        .portal-links a:hover {
            color: #ffe27a;
        }

        .alert {
            border-radius: 16px;
            font-size: 14px;
            border: none;
            font-weight: 600;
        }

        .alert-danger {
            background: rgba(220, 53, 69, 0.14);
            color: #ffb3bd;
            border: 1px solid rgba(220, 53, 69, 0.28);
        }

        .alert-warning {
            background: rgba(255, 193, 7, 0.14);
            color: #ffe08a;
            border: 1px solid rgba(255, 193, 7, 0.28);
        }

        .alert-success {
            background: rgba(25, 135, 84, 0.16);
            color: #9af0bf;
            border: 1px solid rgba(25, 135, 84, 0.30);
        }

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

        @keyframes fadeUp {
            from {
                opacity: 0;
                transform: translateY(34px) scale(0.96);
            }
            to {
                opacity: 1;
                transform: translateY(0) scale(1);
            }
        }

        @media (max-width: 575px) {
            .portal-card {
                padding: 28px 22px;
                border-radius: 26px;
            }

            .portal-heading {
                font-size: 29px;
            }

            .navbar-brand {
                font-size: 19px;
            }

            .btn-back-home {
                font-size: 13px;
                padding: 8px 14px;
            }
        }
    </style>
</head>
<body>

<div class="floating-blob blob-one"></div>
<div class="floating-blob blob-two"></div>
<div class="floating-blob blob-three"></div>

<nav class="navbar navbar-dark custom-navbar">
    <div class="container">
        <a class="navbar-brand" href="/college/public/index.php">
            <span class="brand-icon">
                <i class="bi bi-stars"></i>
            </span>
            College CMS
        </a>

        <a href="/college/public/index.php" class="btn btn-back-home btn-sm">
            <i class="bi bi-arrow-left me-1"></i>
            Back to Home
        </a>
    </div>
</nav>

<section class="portal-wrapper">
    <div class="portal-card">

        <div class="login-icon">
            <i class="bi bi-shield-lock-fill"></i>
        </div>

        <h3 class="portal-heading text-center">Login to College CMS</h3>
        <p class="portal-subtext text-center">Use your account credentials to continue.</p>

        <!-- EXISTING ERRORS -->
        <?php if (isset($_GET['error']) && $_GET['error'] === 'invalid_credentials'): ?>
            <div class="alert alert-danger">Invalid email or password.</div>
        <?php endif; ?>

        <?php if (isset($_GET['error']) && $_GET['error'] === 'missing_fields'): ?>
            <div class="alert alert-warning">Please enter email and password.</div>
        <?php endif; ?>

        <?php if (isset($_GET['error']) && $_GET['error'] === 'admin_registration_closed'): ?>
            <div class="alert alert-warning">Admin registration is closed because an admin account already exists.</div>
        <?php endif; ?>

        <?php if (isset($_GET['success']) && $_GET['success'] === 'admin_registered'): ?>
            <div class="alert alert-success">Admin account created successfully. Please login.</div>
        <?php endif; ?>

        <!-- BACKEND VALIDATION ERRORS -->
        <?php if (isset($_GET['error']) && $_GET['error'] === 'invalid_email'): ?>
            <div class="alert alert-danger">Your email should be like example@gmail.com</div>
        <?php endif; ?>

        <?php if (isset($_GET['error']) && $_GET['error'] === 'invalid_password'): ?>
            <div class="alert alert-danger">
                Password must be exactly 8 characters with uppercase, lowercase, number & special character
            </div>
        <?php endif; ?>

        <form action="/college/public/index.php?url=login" method="POST">

            <!-- EMAIL -->
            <div class="mb-3">
                <label class="form-label">Email / Login ID</label>
                <div class="input-group-custom">
                    <i class="bi bi-envelope-fill input-icon"></i>
                    <input 
                        type="email" 
                        name="email" 
                        id="email" 
                        class="form-control" 
                        placeholder="example@gmail.com"
                        required
                    >
                </div>
                <small id="emailError" class="text-danger"></small>
            </div>

            <!-- PASSWORD -->
            <div class="mb-4">
                <label class="form-label">Password</label>
                <div class="input-group-custom">
                    <i class="bi bi-lock-fill input-icon"></i>
                    <input 
                        type="password" 
                        name="password" 
                        id="password" 
                        class="form-control" 
                        placeholder="Enter your password"
                        required
                    >
                </div>
                <small id="passwordError" class="text-danger"></small>
            </div>

            <button type="submit" class="btn btn-login-submit w-100">
                Login
                <i class="bi bi-arrow-right ms-1"></i>
            </button>
        </form>

        <?php if (!empty($allowAdminRegister)): ?>
            <div class="portal-links">
                <small>No admin account yet?</small><br>
                <a href="/college/public/index.php?url=register-admin">Register Admin</a>
            </div>
        <?php endif; ?>

    </div>
</section>

<!-- JAVASCRIPT VALIDATION -->
<script>
document.getElementById("email").addEventListener("blur", function () {
    const email = this.value;
    const emailError = document.getElementById("emailError");

    const emailPattern = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;

    if (!emailPattern.test(email)) {
        emailError.innerText = "Your email should be like example@gmail.com";
    } else {
        emailError.innerText = "";
        document.getElementById("password").focus();
    }
});

document.getElementById("password").addEventListener("input", function () {
    const password = this.value;
    const passwordError = document.getElementById("passwordError");

    const pattern = /^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[\W_]).{8}$/;

    if (!pattern.test(password)) {
        passwordError.innerText = "Password must be exactly 8 chars with uppercase, lowercase, number & special character";
    } else {
        passwordError.innerText = "";
    }
});
</script>

</body>
</html>