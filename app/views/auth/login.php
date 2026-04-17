<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>College CMS | Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="/college/public/assets/css/public.css" rel="stylesheet">
</head>
<body>

<nav class="navbar navbar-dark bg-dark">
    <div class="container">
        <a class="navbar-brand" href="/college/public/index.php">College CMS</a>
        <a href="/college/public/index.php" class="btn btn-outline-light btn-sm">Back to Home</a>
    </div>
</nav>

<section class="portal-wrapper">
    <div class="portal-card">
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

        <!-- NEW BACKEND VALIDATION ERRORS -->
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
                <input type="email" name="email" id="email" class="form-control" required>
                <small id="emailError" class="text-danger"></small>
            </div>

            <!-- PASSWORD -->
            <div class="mb-3">
                <label class="form-label">Password</label>
                <input type="password" name="password" id="password" class="form-control" required>
                <small id="passwordError" class="text-danger"></small>
            </div>

            <button type="submit" class="btn btn-primary w-100">Login</button>
        </form>

        <?php if (!empty($allowAdminRegister)): ?>
            <div class="portal-links">
                <small class="text-muted">No admin account yet?</small><br>
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