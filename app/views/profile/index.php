<?php
$pageTitle = 'My Profile';
include __DIR__ . '/../layouts/header.php';
include __DIR__ . '/../layouts/sidebar.php';

$firstLetter = strtoupper(substr($user['first_name'] ?? 'U', 0, 1));
?>

<style>
    :root {
        --cms-bg: #052017;
        --cms-card: rgba(5, 32, 23, 0.78);
        --cms-border: rgba(255, 255, 255, 0.11);
        --cms-gold: #f5c84b;
        --cms-gold-soft: rgba(245, 200, 75, 0.16);
        --cms-gold-border: rgba(245, 200, 75, 0.28);
        --cms-text: #fff8e7;
        --cms-muted: rgba(255, 248, 231, 0.68);
        --cms-green: #1dbf73;
        --cms-shadow: 0 24px 70px rgba(0, 0, 0, 0.35);
        --cms-gold-shadow: 0 18px 45px rgba(245, 200, 75, 0.18);
    }

    .profile-page {
        position: relative;
        min-height: calc(100vh - 70px);
        padding: 10px 4px 30px;
        color: var(--cms-text);
        animation: pageFade 0.7s ease both;
    }

    .profile-hero {
        position: relative;
        overflow: hidden;
        border-radius: 28px;
        padding: 28px;
        margin-bottom: 24px;
        background:
            radial-gradient(circle at 15% 20%, rgba(29, 191, 115, 0.22), transparent 34%),
            radial-gradient(circle at 88% 18%, rgba(245, 200, 75, 0.16), transparent 32%),
            linear-gradient(135deg, #052017, #073824 55%, #03140f);
        border: 1px solid var(--cms-gold-border);
        box-shadow: var(--cms-shadow);
    }

    .profile-hero::before {
        content: "";
        position: absolute;
        inset: 0;
        background-image: url("data:image/svg+xml,%3Csvg viewBox='0 0 200 200' xmlns='http://www.w3.org/2000/svg'%3E%3Cfilter id='n'%3E%3CfeTurbulence type='fractalNoise' baseFrequency='0.8' numOctaves='2'/%3E%3C/filter%3E%3Crect width='100%25' height='100%25' filter='url(%23n)' opacity='0.20'/%3E%3C/svg%3E");
        opacity: 0.10;
        pointer-events: none;
    }

    .profile-hero-content {
        position: relative;
        z-index: 2;
    }

    .profile-kicker {
        display: inline-flex;
        align-items: center;
        gap: 8px;
        padding: 7px 14px;
        border-radius: 50px;
        background: var(--cms-gold-soft);
        border: 1px solid var(--cms-gold-border);
        color: var(--cms-gold);
        font-size: 12px;
        font-weight: 800;
        letter-spacing: 1.5px;
        text-transform: uppercase;
        margin-bottom: 14px;
    }

    .profile-kicker span {
        width: 7px;
        height: 7px;
        border-radius: 50%;
        background: var(--cms-gold);
        box-shadow: 0 0 18px var(--cms-gold);
    }

    .profile-title {
        font-family: Georgia, 'Times New Roman', serif;
        font-size: clamp(30px, 4vw, 44px);
        font-weight: 900;
        margin-bottom: 8px;
        letter-spacing: -0.03em;
    }

    .profile-subtitle {
        color: var(--cms-muted);
        margin-bottom: 0;
        line-height: 1.7;
    }

    .profile-card {
        border: 1px solid var(--cms-border);
        border-radius: 28px;
        background:
            radial-gradient(circle at top right, rgba(245, 200, 75, 0.13), transparent 34%),
            var(--cms-card);
        color: var(--cms-text);
        box-shadow: var(--cms-shadow);
        overflow: hidden;
        height: 100%;
    }

    .profile-card .card-header {
        background:
            linear-gradient(135deg, rgba(245, 200, 75, 0.13), rgba(255, 255, 255, 0.03));
        border-bottom: 1px solid var(--cms-border);
        color: var(--cms-text);
        font-weight: 900;
        padding: 18px 22px;
        display: flex;
        align-items: center;
        gap: 10px;
    }

    .profile-card .card-header i {
        color: var(--cms-gold);
    }

    .profile-card .card-body {
        padding: 26px;
    }

    .avatar-circle {
        width: 92px;
        height: 92px;
        border-radius: 28px;
        background: linear-gradient(135deg, #ffe27a, #f0b92e);
        color: #07331f;
        display: grid;
        place-items: center;
        font-family: Georgia, 'Times New Roman', serif;
        font-size: 42px;
        font-weight: 900;
        box-shadow: var(--cms-gold-shadow);
    }

    .profile-name {
        font-weight: 900;
        color: var(--cms-text);
    }

    .role-badge {
        display: inline-flex;
        align-items: center;
        gap: 6px;
        padding: 8px 14px;
        border-radius: 50px;
        background: var(--cms-gold-soft);
        border: 1px solid var(--cms-gold-border);
        color: var(--cms-gold);
        font-size: 13px;
        font-weight: 900;
    }

    .profile-meta {
        margin-top: 18px;
        padding-top: 18px;
        border-top: 1px solid var(--cms-border);
    }

    .profile-meta p {
        display: flex;
        align-items: center;
        gap: 10px;
        margin-bottom: 12px;
        color: var(--cms-muted);
        word-break: break-word;
    }

    .profile-meta p:last-child {
        margin-bottom: 0;
    }

    .profile-meta i {
        color: var(--cms-gold);
        width: 18px;
    }

    .profile-meta strong {
        color: var(--cms-text);
    }

    .form-label {
        color: var(--cms-text);
        font-weight: 800;
        font-size: 14px;
        margin-bottom: 8px;
    }

    .input-wrap {
        position: relative;
    }

    .input-wrap i {
        position: absolute;
        left: 16px;
        top: 50%;
        transform: translateY(-50%);
        color: var(--cms-gold);
        z-index: 2;
        font-size: 16px;
    }

    .profile-card .form-control {
        height: 52px;
        border-radius: 16px;
        border: 1px solid var(--cms-border);
        background-color: rgba(255, 255, 255, 0.06);
        color: var(--cms-text);
        padding-left: 46px;
        font-weight: 600;
        transition: 0.3s ease;
    }

    .profile-card .form-control:focus {
        background-color: rgba(255, 255, 255, 0.08);
        color: var(--cms-text);
        border-color: var(--cms-gold-border);
        box-shadow: 0 0 0 4px rgba(245, 200, 75, 0.12);
    }

    .profile-card .form-control::placeholder {
        color: rgba(255, 248, 231, 0.42);
    }

    .btn-save-profile {
        min-height: 50px;
        border: none;
        border-radius: 50px;
        background: linear-gradient(135deg, #ffe27a, #f0b92e);
        color: #07331f;
        font-weight: 900;
        padding: 12px 26px;
        box-shadow: var(--cms-gold-shadow);
        transition: 0.3s ease;
    }

    .btn-save-profile:hover {
        transform: translateY(-3px);
        color: #07331f;
        opacity: 0.96;
    }

    .btn-back-dashboard {
        min-height: 50px;
        border-radius: 50px;
        border: 1px solid var(--cms-border);
        color: var(--cms-text);
        background: rgba(255, 255, 255, 0.055);
        font-weight: 800;
        padding: 12px 26px;
        transition: 0.3s ease;
    }

    .btn-back-dashboard:hover {
        border-color: var(--cms-gold-border);
        background: var(--cms-gold-soft);
        color: var(--cms-gold);
        transform: translateY(-3px);
    }

    .btn-profile-logout {
        min-height: 48px;
        border-radius: 50px;
        border: 1px solid rgba(220, 53, 69, 0.35);
        background: rgba(220, 53, 69, 0.13);
        color: #ffb3bd;
        font-weight: 900;
        transition: 0.3s ease;
    }

    .btn-profile-logout:hover {
        background: #dc3545;
        color: #fff;
        transform: translateY(-3px);
    }

    .cms-alert {
        border-radius: 18px;
        font-weight: 700;
    }

    .cms-alert.alert-success {
        border: 1px solid rgba(25, 135, 84, 0.28);
        background: rgba(25, 135, 84, 0.13);
        color: #9af0bf;
    }

    .cms-alert.alert-danger {
        border: 1px solid rgba(220, 53, 69, 0.30);
        background: rgba(220, 53, 69, 0.13);
        color: #ffb3bd;
    }

    .text-danger {
        display: block;
        margin-top: 6px;
        font-size: 13px;
    }

    @keyframes pageFade {
        from {
            opacity: 0;
            transform: translateY(18px);
        }

        to {
            opacity: 1;
            transform: translateY(0);
        }
    }

    @media (max-width: 767px) {
        .profile-hero {
            padding: 22px;
        }

        .profile-card .card-body {
            padding: 22px;
        }

        .btn-save-profile,
        .btn-back-dashboard {
            width: 100%;
        }
    }
</style>

<div class="container-fluid profile-page">

    <?php if (isset($_GET['msg']) && $_GET['msg'] === 'updated'): ?>
        <div class="alert alert-success cms-alert">Profile updated successfully.</div>
    <?php endif; ?>

    <?php if (isset($_GET['msg']) && $_GET['msg'] === 'update_failed'): ?>
        <div class="alert alert-danger cms-alert">Profile update failed. Email may already exist.</div>
    <?php endif; ?>

    <?php if (isset($_GET['msg']) && $_GET['msg'] === 'invalid_input'): ?>
        <div class="alert alert-danger cms-alert">First name and email are required.</div>
    <?php endif; ?>

    <div class="profile-hero">
        <div class="profile-hero-content">
            <div class="profile-kicker">
                <span></span>
                Account Settings
            </div>

            <h1 class="profile-title">My Profile</h1>

            <p class="profile-subtitle">
                View and update your personal information, contact details, department, and account profile.
            </p>
        </div>
    </div>

    <div class="row g-4">
        <div class="col-lg-4">
            <div class="card profile-card">
                <div class="card-body text-center p-4">
                    <div class="avatar-circle mx-auto mb-3">
                        <?= htmlspecialchars($firstLetter) ?>
                    </div>

                    <h4 class="profile-name mb-1">
                        <?= htmlspecialchars(trim(($user['first_name'] ?? '') . ' ' . ($user['last_name'] ?? ''))) ?>
                    </h4>

                    <p class="text-muted mb-3"><?= htmlspecialchars($user['email'] ?? '') ?></p>

                    <span class="role-badge mb-3">
                        <i class="bi bi-shield-check"></i>
                        <?= htmlspecialchars($user['role_name'] ?? '') ?>
                    </span>

                    <div class="profile-meta text-start">
                        <p>
                            <i class="bi bi-telephone-fill"></i>
                            <span><strong>Phone:</strong> <?= htmlspecialchars($user['phone'] ?? '') ?></span>
                        </p>

                        <p>
                            <i class="bi bi-building-fill"></i>
                            <span><strong>Department:</strong> <?= htmlspecialchars($user['department'] ?? '') ?></span>
                        </p>

                        <p>
                            <i class="bi bi-check-circle-fill"></i>
                            <span><strong>Status:</strong> <?= htmlspecialchars($user['status'] ?? '') ?></span>
                        </p>
                    </div>

                    <a href="/college/public/index.php?url=logout" class="btn btn-profile-logout w-100 mt-3">
                        <i class="bi bi-box-arrow-right me-1"></i>
                        Logout
                    </a>
                </div>
            </div>
        </div>

        <div class="col-lg-8">
            <div class="card profile-card">
                <div class="card-header">
                    <i class="bi bi-pencil-square"></i>
                    Update Profile
                </div>

                <div class="card-body">
                    <form action="/college/public/index.php?url=update-profile" method="POST" id="profileForm">
                        <div class="row g-3">

                            <div class="col-md-6">
                                <label class="form-label">First Name</label>
                                <div class="input-wrap">
                                    <i class="bi bi-person-fill"></i>
                                    <input
                                        type="text"
                                        name="first_name"
                                        id="first_name"
                                        class="form-control"
                                        value="<?= htmlspecialchars($user['first_name'] ?? '') ?>"
                                        placeholder="Enter first name"
                                        required
                                        pattern="[A-Za-z\s]{2,50}"
                                        title="First name should contain only letters and spaces, minimum 2 characters"
                                    >
                                </div>
                                <small class="text-danger d-none" id="firstNameError">
                                    First name should contain only letters and spaces.
                                </small>
                            </div>

                            <div class="col-md-6">
                                <label class="form-label">Last Name</label>
                                <div class="input-wrap">
                                    <i class="bi bi-person"></i>
                                    <input
                                        type="text"
                                        name="last_name"
                                        id="last_name"
                                        class="form-control"
                                        value="<?= htmlspecialchars($user['last_name'] ?? '') ?>"
                                        placeholder="Enter last name"
                                        pattern="[A-Za-z\s]{0,50}"
                                        title="Last name should contain only letters and spaces"
                                    >
                                </div>
                                <small class="text-danger d-none" id="lastNameError">
                                    Last name should contain only letters and spaces.
                                </small>
                            </div>

                            <div class="col-md-6">
                                <label class="form-label">Email</label>
                                <div class="input-wrap">
                                    <i class="bi bi-envelope-fill"></i>
                                    <input
                                        type="email"
                                        name="email"
                                        id="email"
                                        class="form-control"
                                        value="<?= htmlspecialchars($user['email'] ?? '') ?>"
                                        placeholder="example@gmail.com"
                                        required
                                    >
                                </div>
                                <small class="text-danger d-none" id="emailError">
                                    Enter a valid email address.
                                </small>
                            </div>

                            <div class="col-md-6">
                                <label class="form-label">Phone</label>
                                <div class="input-wrap">
                                    <i class="bi bi-telephone-fill"></i>
                                    <input
                                        type="text"
                                        name="phone"
                                        id="phone"
                                        class="form-control"
                                        value="<?= htmlspecialchars($user['phone'] ?? '') ?>"
                                        placeholder="10 digit phone number"
                                        pattern="[6-9][0-9]{9}"
                                        maxlength="10"
                                        title="Phone number must be 10 digits and start with 6, 7, 8, or 9"
                                    >
                                </div>
                                <small class="text-danger d-none" id="phoneError">
                                    Phone number must be 10 digits and start with 6, 7, 8, or 9.
                                </small>
                            </div>

                            <div class="col-md-12">
                                <label class="form-label">Department</label>
                                <div class="input-wrap">
                                    <i class="bi bi-building-fill"></i>
                                    <input
                                        type="text"
                                        name="department"
                                        id="department"
                                        class="form-control"
                                        value="<?= htmlspecialchars($user['department'] ?? '') ?>"
                                        placeholder="Enter department"
                                        pattern="[A-Za-z\s]{2,100}"
                                        title="Department should contain only letters and spaces"
                                    >
                                </div>
                                <small class="text-danger d-none" id="departmentError">
                                    Department should contain only letters and spaces.
                                </small>
                            </div>
                        </div>

                        <div class="d-flex flex-wrap gap-2 mt-4">
                            <button type="submit" class="btn btn-save-profile">
                                <i class="bi bi-check-circle-fill me-1"></i>
                                Save Changes
                            </button>

                            <a href="/college/public/index.php?url=dashboard" class="btn btn-back-dashboard">
                                <i class="bi bi-arrow-left-circle me-1"></i>
                                Back to Dashboard
                            </a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

</div>

<script>
    function allowOnlyLetters(inputId) {
        const input = document.getElementById(inputId);

        if (!input) return;

        input.addEventListener('input', function() {
            this.value = this.value.replace(/[^A-Za-z\s]/g, '');
        });
    }

    function allowOnlyNumbers(inputId) {
        const input = document.getElementById(inputId);

        if (!input) return;

        input.addEventListener('input', function() {
            this.value = this.value.replace(/[^0-9]/g, '');
        });
    }

    allowOnlyLetters('first_name');
    allowOnlyLetters('last_name');
    allowOnlyLetters('department');
    allowOnlyNumbers('phone');
</script>

<?php include __DIR__ . '/../layouts/footer.php'; ?>