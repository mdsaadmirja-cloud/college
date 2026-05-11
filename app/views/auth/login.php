<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>College CMS | Login</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="/college/public/assets/css/public.css" rel="stylesheet">

    <style>

        body{
            background:
                radial-gradient(circle at top right,
                    rgba(255,107,107,0.35),
                    transparent 25%),

                radial-gradient(circle at bottom left,
                    rgba(255,107,107,0.25),
                    transparent 30%),

                linear-gradient(135deg,#00CFC1,#00A89A);

            min-height:100vh;
        }

        .navbar.bg-dark{
            background:#1F2937 !important;
            border-bottom:2px solid rgba(255,107,107,0.3);
        }

        .portal-wrapper{
            min-height:calc(100vh - 70px);
            display:flex;
            align-items:center;
            justify-content:center;
            padding:40px 20px;
        }

        .portal-card{
            width:100%;
            max-width:460px;
            background:#ffffff;
            border-radius:28px;
            padding:40px;
            position:relative;
            overflow:hidden;

            box-shadow:
                0 20px 50px rgba(0,207,193,0.18);
        }

        .portal-card::before{
            content:"";
            position:absolute;
            width:180px;
            height:180px;
            background:rgba(255,107,107,0.25);
            border-radius:50%;
            top:-70px;
            right:-70px;
        }

        .portal-card::after{
            content:"";
            position:absolute;
            width:140px;
            height:140px;
            background:rgba(0,207,193,0.18);
            border-radius:50%;
            bottom:-60px;
            left:-60px;
        }

        .portal-card > *{
            position:relative;
            z-index:2;
        }

        .portal-heading{
            font-weight:700;
            color:#1F2937;
        }

        .portal-subtext{
            color:#6B7280;
            margin-bottom:25px;
        }

        .form-label{
            font-weight:600;
            color:#1F2937;
        }

        .form-control{
            border-radius:14px;
            padding:12px 14px;
            border:1px solid #DCE4EA;
            background:rgba(255,255,255,0.95);
        }

        .form-control:focus{
            border-color:#11D4CF;
            box-shadow:0 0 0 0.2rem rgba(17,212,207,0.18);
        }

        .btn-primary{
            background:#11D4CF;
            border-color:#11D4CF;
            border-radius:14px;
            padding:12px;
            font-weight:700;
        }

        .btn-primary:hover{
            background:#0FA7A3;
            border-color:#0FA7A3;
        }

        .btn-outline-light{
            border-radius:12px;
        }

        .btn-outline-light:hover{
            background:#FFB6C8;
            border-color:#FFB6C8;
            color:#1F2937;
        }

        .alert{
            border:none;
            border-radius:14px;
        }

        .alert-danger{
            background:#FFF1F4;
            color:#D6336C;
        }

        .alert-warning{
            background:#FFF7E8;
            color:#A16207;
        }

        .alert-success{
            background:#ECFDF5;
            color:#047857;
        }

        .portal-links a{
            color:#0FA7A3;
            font-weight:600;
            text-decoration:none;
        }

        .portal-links a:hover{
            color:#FF8FAE;
        }

        .text-danger{
            font-size:0.85rem;
        }

    </style>

</head>
<body>

<nav class="navbar navbar-dark bg-dark">
    <div class="container">
        <a class="navbar-brand fw-bold" href="/college/public/index.php">Nehru BBA & BCA College Hubli</a>

        <a href="/college/public/index.php"
           class="btn btn-outline-light btn-sm">
            Back to Home
        </a>
    </div>
</nav>

<section class="portal-wrapper">

    <div class="portal-card">

        <h3 class="portal-heading text-center">
            Login to Nehru BBA & BCA College Hubli
        </h3>

        <p class="portal-subtext text-center">
            Use your account credentials to continue.
        </p>

        <?php if (isset($_GET['error']) && $_GET['error'] === 'invalid_credentials'): ?>
            <div class="alert alert-danger">Invalid email or password.</div>
        <?php endif; ?>

        <?php if (isset($_GET['error']) && $_GET['error'] === 'missing_fields'): ?>
            <div class="alert alert-warning">Please enter email and password.</div>
        <?php endif; ?>

        <?php if (isset($_GET['error']) && $_GET['error'] === 'admin_registration_closed'): ?>
            <div class="alert alert-warning">
                Admin registration is closed because an admin account already exists.
            </div>
        <?php endif; ?>

        <?php if (isset($_GET['success']) && $_GET['success'] === 'admin_registered'): ?>
            <div class="alert alert-success">
                Admin account created successfully. Please login.
            </div>
        <?php endif; ?>

        <?php if (isset($_GET['error']) && $_GET['error'] === 'invalid_email'): ?>
            <div class="alert alert-danger">
                Your email should be like example@gmail.com
            </div>
        <?php endif; ?>

        <?php if (isset($_GET['error']) && $_GET['error'] === 'invalid_password'): ?>
            <div class="alert alert-danger">
                Password must be exactly 8 characters with uppercase, lowercase, number & special character
            </div>
        <?php endif; ?>

        <form action="/college/public/index.php?url=login" method="POST">

            <div class="mb-3">
                <label class="form-label">Email / Login ID</label>

                <input type="email"
                       name="email"
                       id="email"
                       class="form-control"
                       required>

                <small id="emailError" class="text-danger"></small>
            </div>

            <div class="mb-4">
                <label class="form-label">Password</label>

                <input type="password"
                       name="password"
                       id="password"
                       class="form-control"
                       required>

                <small id="passwordError" class="text-danger"></small>
            </div>

            <button type="submit"
                    class="btn btn-primary w-100">
                Login
            </button>

        </form>

        <?php if (!empty($allowAdminRegister)): ?>

            <div class="portal-links mt-4 text-center">
                <small class="text-muted">
                    No admin account yet?
                </small>
                <br>

                <a href="/college/public/index.php?url=register-admin">
                    Register Admin
                </a>
            </div>

        <?php endif; ?>

    </div>

</section>

<script>

document.getElementById("email").addEventListener("blur", function () {

    const email = this.value;

    const emailError = document.getElementById("emailError");

    const emailPattern = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;

    if (!emailPattern.test(email)) {

        emailError.innerText =
            "Your email should be like example@gmail.com";

    } else {

        emailError.innerText = "";

        document.getElementById("password").focus();
    }
});

document.getElementById("password").addEventListener("input", function () {

    const password = this.value;

    const passwordError =
        document.getElementById("passwordError");

    const pattern =
        /^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[\W_]).{8}$/;

    if (!pattern.test(password)) {

        passwordError.innerText =
            "Password must be exactly 8 chars with uppercase, lowercase, number & special character";

    } else {

        passwordError.innerText = "";
    }
});

</script>

</body>
</html>