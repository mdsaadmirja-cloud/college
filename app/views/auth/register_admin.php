<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>College CMS | Register Admin</title>

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

        .btn-back-login {
            border-radius: 50px;
            border: 1px solid var(--gold-border);
            color: var(--text-main);
            font-weight: 700;
            padding: 9px 18px;
            transition: 0.3s ease;
        }

        .btn-back-login:hover {
            background: var(--gold-soft);
            border-color: var(--gold-border);
            color: var(--gold);
            transform: translateY(-2px);
        }

        /* Register Layout */
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
            max-width: 850px;
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

        .register-icon {
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
            font-size: 36px;
            font-weight: 900;
            margin-bottom: 8px;
        }

        .portal-subtext {
            color: var(--text-muted);
            font-size: 15px;
            margin-bottom: 30px;
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

        .btn-register-submit {
            height: 54px;
            border: none;
            border-radius: 50px;
            background: linear-gradient(135deg, #ffe27a, #f0b92e);
            color: #07331f;
            font-weight: 900;
            letter-spacing: 0.2px;
            box-shadow: var(--shadow-gold);
            transition: 0.3s ease;
        }

        .btn-register-submit:hover {
            transform: translateY(-3px) scale(1.015);
            color: #07331f;
            opacity: 0.96;
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

        @media (max-width: 767px) {
            .portal-card {
                padding: 28px 22px;
                border-radius: 26px;
            }

            .portal-heading {
                font-size: 30px;
            }

            .navbar-brand {
                font-size: 19px;
            }

            .btn-back-login {
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

            <a href="/college/public/index.php?url=login" class="btn btn-back-login btn-sm">
                <i class="bi bi-arrow-left me-1"></i>
                Back to Login
            </a>
        </div>
    </nav>

    <section class="portal-wrapper">
        <div class="portal-card register-card">

            <div class="register-icon">
                <i class="bi bi-person-plus-fill"></i>
            </div>

            <h3 class="portal-heading text-center">Register First Admin</h3>
            <p class="portal-subtext text-center">Create the initial admin account for College CMS.</p>

            <?php if (isset($_GET['error']) && $_GET['error'] === 'invalid_input'): ?>
                <div class="alert alert-danger">Please fill all required fields.</div>
            <?php endif; ?>

            <?php if (isset($_GET['error']) && $_GET['error'] === 'password_mismatch'): ?>
                <div class="alert alert-danger">Password and confirm password do not match.</div>
            <?php endif; ?>

            <?php if (isset($_GET['error']) && $_GET['error'] === 'register_failed'): ?>
                <div class="alert alert-danger">Admin registration failed. Email may already exist.</div>
            <?php endif; ?>

            <form action="/college/public/index.php?url=register-admin" method="POST" id="adminRegisterForm">
                <div class="row g-3">

                    <div class="col-md-6">
                        <label class="form-label">First Name</label>
                        <div class="input-group-custom">
                            <i class="bi bi-person-fill input-icon"></i>
                            <input 
                                type="text" 
                                name="first_name" 
                                id="first_name" 
                                class="form-control"
                                placeholder="Enter first name"
                                required 
                                minlength="2" 
                                maxlength="50"
                            >
                        </div>
                        <small class="text-danger d-none" id="firstNameError">
                            First name should contain only letters and spaces.
                        </small>
                    </div>

                    <div class="col-md-6">
                        <label class="form-label">Last Name</label>
                        <div class="input-group-custom">
                            <i class="bi bi-person input-icon"></i>
                            <input 
                                type="text" 
                                name="last_name" 
                                id="last_name" 
                                class="form-control"
                                placeholder="Enter last name"
                                maxlength="50"
                            >
                        </div>
                        <small class="text-danger d-none" id="lastNameError">
                            Last name should contain only letters and spaces.
                        </small>
                    </div>

                    <div class="col-md-6">
                        <label class="form-label">Phone</label>
                        <div class="input-group-custom">
                            <i class="bi bi-telephone-fill input-icon"></i>
                            <input 
                                type="text" 
                                name="phone" 
                                id="phone" 
                                class="form-control"
                                placeholder="10 digit phone number"
                                maxlength="10"
                            >
                        </div>
                        <small class="text-danger d-none" id="phoneError">
                            Phone number must contain only 10 digits.
                        </small>
                    </div>

                    <div class="col-md-6">
                        <label class="form-label">Email</label>
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
                        <small class="text-danger d-none" id="emailError">
                            Enter a valid email address.
                        </small>
                    </div>

                    <div class="col-md-6">
                        <label class="form-label">Password</label>
                        <div class="input-group-custom">
                            <i class="bi bi-lock-fill input-icon"></i>
                            <input 
                                type="password" 
                                name="password" 
                                id="password" 
                                class="form-control" 
                                placeholder="Create password"
                                required
                            >
                        </div>
                        <small class="text-danger d-none" id="passwordError">
                            Password must be minimum 8 characters and include uppercase, lowercase, number, and special character.
                        </small>
                    </div>

                    <div class="col-md-6">
                        <label class="form-label">Confirm Password</label>
                        <div class="input-group-custom">
                            <i class="bi bi-shield-lock-fill input-icon"></i>
                            <input 
                                type="password" 
                                name="confirm_password" 
                                id="confirm_password" 
                                class="form-control" 
                                placeholder="Confirm password"
                                required
                            >
                        </div>
                        <small class="text-danger d-none" id="confirmPasswordError">
                            Password and confirm password do not match.
                        </small>
                    </div>

                </div>

                <button type="submit" class="btn btn-register-submit w-100 mt-4">
                    Register Admin
                    <i class="bi bi-arrow-right ms-1"></i>
                </button>
            </form>

        </div>
    </section>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

    <!-- EXISTING JAVASCRIPT VALIDATION -->
    <script>
        function allowOnlyLetters(inputId) {
            const input = document.getElementById(inputId);

            input.addEventListener('input', function() {
                this.value = this.value.replace(/[^A-Za-z\s]/g, '');
            });
        }

        function allowOnlyNumbers(inputId) {
            const input = document.getElementById(inputId);

            input.addEventListener('input', function() {
                this.value = this.value.replace(/[^0-9]/g, '');
            });
        }

        allowOnlyLetters('first_name');
        allowOnlyLetters('last_name');
        allowOnlyNumbers('phone');

        document.getElementById('adminRegisterForm').addEventListener('submit', function(e) {
            let isValid = true;

            const namePattern = /^[A-Za-z\s]{2,50}$/;
            const optionalNamePattern = /^[A-Za-z\s]{0,50}$/;
            const phonePattern = /^[0-9]{10}$/;
            const passwordPattern = /^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[^A-Za-z0-9]).{8,}$/;

            const firstName = document.getElementById('first_name');
            const lastName = document.getElementById('last_name');
            const phone = document.getElementById('phone');
            const email = document.getElementById('email');
            const password = document.getElementById('password');
            const confirmPassword = document.getElementById('confirm_password');

            document.querySelectorAll('.text-danger').forEach(function(error) {
                error.classList.add('d-none');
            });

            if (!namePattern.test(firstName.value.trim())) {
                document.getElementById('firstNameError').classList.remove('d-none');
                isValid = false;
            }

            if (lastName.value.trim() !== '' && !optionalNamePattern.test(lastName.value.trim())) {
                document.getElementById('lastNameError').classList.remove('d-none');
                isValid = false;
            }

            if (phone.value.trim() !== '' && !phonePattern.test(phone.value.trim())) {
                document.getElementById('phoneError').classList.remove('d-none');
                isValid = false;
            }

            if (!email.checkValidity()) {
                document.getElementById('emailError').classList.remove('d-none');
                isValid = false;
            }

            if (!passwordPattern.test(password.value)) {
                document.getElementById('passwordError').classList.remove('d-none');
                isValid = false;
            }

            if (password.value !== confirmPassword.value) {
                document.getElementById('confirmPasswordError').classList.remove('d-none');
                isValid = false;
            }

            if (!isValid) {
                e.preventDefault();
            }
        });
    </script>

</body>

</html>