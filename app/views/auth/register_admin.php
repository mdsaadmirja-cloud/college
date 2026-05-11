<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>College CMS | Register Admin</title>

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
            padding:50px 20px;
        }

        .portal-card{
            width:100%;
            max-width:700px;

            background:#ffffff;

            border-radius:30px;

            padding:42px;

            position:relative;

            overflow:hidden;

            box-shadow:
                0 22px 55px rgba(0,207,193,0.18);
        }

        .portal-card::before{
            content:"";
            position:absolute;

            width:220px;
            height:220px;

            background:rgba(255,107,107,0.20);

            border-radius:50%;

            top:-90px;
            right:-90px;
        }

        .portal-card::after{
            content:"";
            position:absolute;

            width:180px;
            height:180px;

            background:rgba(0,207,193,0.15);

            border-radius:50%;

            bottom:-80px;
            left:-80px;
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
            margin-bottom:28px;
        }

        .form-label{
            font-weight:600;
            color:#1F2937;
            margin-bottom:7px;
        }

        .form-control{
            border-radius:14px;

            padding:12px 14px;

            border:1px solid #DCE4EA;

            background:rgba(255,255,255,0.95);
        }

        .form-control:focus{
            border-color:#11D4CF;

            box-shadow:
                0 0 0 0.2rem rgba(17,212,207,0.18);
        }

        .btn-primary{
            background:#11D4CF;

            border-color:#11D4CF;

            border-radius:14px;

            padding:13px;

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

        .text-danger{
            font-size:0.85rem;
        }

        @media(max-width:768px){

            .portal-card{
                padding:28px;
            }
        }

    </style>

</head>

<body>

<nav class="navbar navbar-dark bg-dark">
    <div class="container">

        <a class="navbar-brand fw-bold"
           href="/college/public/index.php">
            Nehru BBA & BCA College Hubli
        </a>

        <a href="/college/public/index.php?url=login"
           class="btn btn-outline-light btn-sm">
            Back to Login
        </a>

    </div>
</nav>

<section class="portal-wrapper">

    <div class="portal-card register-card">

        <h3 class="portal-heading text-center">
            Register First Admin
        </h3>

        <p class="portal-subtext text-center">
            Create the initial admin account for Nehru BBA & BCA College Hubli.
        </p>

        <?php if (isset($_GET['error']) && $_GET['error'] === 'invalid_input'): ?>
            <div class="alert alert-danger">
                Please fill all required fields.
            </div>
        <?php endif; ?>

        <?php if (isset($_GET['error']) && $_GET['error'] === 'password_mismatch'): ?>
            <div class="alert alert-danger">
                Password and confirm password do not match.
            </div>
        <?php endif; ?>

        <?php if (isset($_GET['error']) && $_GET['error'] === 'register_failed'): ?>
            <div class="alert alert-danger">
                Admin registration failed. Email may already exist.
            </div>
        <?php endif; ?>

        <form action="/college/public/index.php?url=register-admin"
              method="POST"
              id="adminRegisterForm">

            <div class="row g-3">

                <div class="col-md-6">

                    <label class="form-label">
                        First Name
                    </label>

                    <input type="text"
                           name="first_name"
                           id="first_name"
                           class="form-control"
                           required
                           minlength="2"
                           maxlength="50">

                    <small class="text-danger d-none"
                           id="firstNameError">
                        First name should contain only letters and spaces.
                    </small>

                </div>

                <div class="col-md-6">

                    <label class="form-label">
                        Last Name
                    </label>

                    <input type="text"
                           name="last_name"
                           id="last_name"
                           class="form-control"
                           maxlength="50">

                    <small class="text-danger d-none"
                           id="lastNameError">
                        Last name should contain only letters and spaces.
                    </small>

                </div>

                <div class="col-md-6">

                    <label class="form-label">
                        Phone
                    </label>

                    <input type="text"
                           name="phone"
                           id="phone"
                           class="form-control"
                           maxlength="10">

                    <small class="text-danger d-none"
                           id="phoneError">
                        Phone number must contain only 10 digits.
                    </small>

                </div>

                <div class="col-md-6">

                    <label class="form-label">
                        Email
                    </label>

                    <input type="email"
                           name="email"
                           id="email"
                           class="form-control"
                           required>

                    <small class="text-danger d-none"
                           id="emailError">
                        Enter a valid email address.
                    </small>

                </div>

                <div class="col-md-6">

                    <label class="form-label">
                        Password
                    </label>

                    <input type="password"
                           name="password"
                           id="password"
                           class="form-control"
                           required>

                    <small class="text-danger d-none"
                           id="passwordError">
                        Password must be minimum 8 characters and include uppercase, lowercase, number, and special character.
                    </small>

                </div>

                <div class="col-md-6">

                    <label class="form-label">
                        Confirm Password
                    </label>

                    <input type="password"
                           name="confirm_password"
                           id="confirm_password"
                           class="form-control"
                           required>

                    <small class="text-danger d-none"
                           id="confirmPasswordError">
                        Password and confirm password do not match.
                    </small>

                </div>

            </div>

            <button type="submit"
                    class="btn btn-primary w-100 mt-4">
                Register Admin
            </button>

        </form>

    </div>

</section>

<script>

function allowOnlyLetters(inputId){

    const input = document.getElementById(inputId);

    input.addEventListener('input', function(){

        this.value =
            this.value.replace(/[^A-Za-z\s]/g, '');
    });
}

function allowOnlyNumbers(inputId){

    const input = document.getElementById(inputId);

    input.addEventListener('input', function(){

        this.value =
            this.value.replace(/[^0-9]/g, '');
    });
}

allowOnlyLetters('first_name');
allowOnlyLetters('last_name');
allowOnlyNumbers('phone');

document.getElementById('adminRegisterForm')
.addEventListener('submit', function(e){

    let isValid = true;

    const namePattern =
        /^[A-Za-z\s]{2,50}$/;

    const optionalNamePattern =
        /^[A-Za-z\s]{0,50}$/;

    const phonePattern =
        /^[0-9]{10}$/;

    const passwordPattern =
        /^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[^A-Za-z0-9]).{8,}$/;

    const firstName =
        document.getElementById('first_name');

    const lastName =
        document.getElementById('last_name');

    const phone =
        document.getElementById('phone');

    const email =
        document.getElementById('email');

    const password =
        document.getElementById('password');

    const confirmPassword =
        document.getElementById('confirm_password');

    document.querySelectorAll('.text-danger')
    .forEach(function(error){

        error.classList.add('d-none');
    });

    if(!namePattern.test(firstName.value.trim())){

        document.getElementById('firstNameError')
        .classList.remove('d-none');

        isValid = false;
    }

    if(lastName.value.trim() !== '' &&
       !optionalNamePattern.test(lastName.value.trim())){

        document.getElementById('lastNameError')
        .classList.remove('d-none');

        isValid = false;
    }

    if(phone.value.trim() !== '' &&
       !phonePattern.test(phone.value.trim())){

        document.getElementById('phoneError')
        .classList.remove('d-none');

        isValid = false;
    }

    if(!email.checkValidity()){

        document.getElementById('emailError')
        .classList.remove('d-none');

        isValid = false;
    }

    if(!passwordPattern.test(password.value)){

        document.getElementById('passwordError')
        .classList.remove('d-none');

        isValid = false;
    }

    if(password.value !== confirmPassword.value){

        document.getElementById('confirmPasswordError')
        .classList.remove('d-none');

        isValid = false;
    }

    if(!isValid){

        e.preventDefault();
    }
});

</script>

</body>
</html>