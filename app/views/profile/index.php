<?php
$pageTitle = 'My Profile';
include __DIR__ . '/../layouts/header.php';
include __DIR__ . '/../layouts/sidebar.php';

$firstLetter = strtoupper(substr($user['first_name'] ?? 'U', 0, 1));
?>

<style>
    .profile-page {
        padding: 10px 4px 30px;
        animation: pageFade 0.6s ease both;
    }

    /* ── Hero ── */
    .profile-hero {
        position: relative;
        overflow: hidden;
        border-radius: 24px;
        padding: 28px 32px;
        margin-bottom: 24px;
        background: linear-gradient(135deg, #f59e0b 0%, #fb923c 55%, #ef4444 100%);
        box-shadow: 0 12px 40px rgba(245, 158, 11, 0.28);
    }

    .profile-hero::before {
        content: "";
        position: absolute;
        width: 340px; height: 340px;
        border-radius: 50%;
        background: rgba(255,255,255,0.10);
        top: -100px; right: 100px;
        pointer-events: none;
    }

    .profile-hero::after {
        content: "";
        position: absolute;
        width: 200px; height: 200px;
        border-radius: 50%;
        background: rgba(255,255,255,0.07);
        bottom: -70px; right: 260px;
        pointer-events: none;
    }

    .profile-hero-content { position: relative; z-index: 2; }

    .profile-kicker {
        display: inline-flex;
        align-items: center;
        gap: 8px;
        padding: 6px 16px;
        border-radius: 50px;
        background: rgba(255,255,255,0.22);
        border: 1px solid rgba(255,255,255,0.38);
        color: #fff;
        font-size: 12px;
        font-weight: 800;
        letter-spacing: 1.5px;
        text-transform: uppercase;
        margin-bottom: 14px;
        backdrop-filter: blur(6px);
    }

    .profile-kicker span {
        width: 7px; height: 7px;
        border-radius: 50%;
        background: #fff;
        box-shadow: 0 0 8px rgba(255,255,255,0.8);
    }

    .profile-title {
        font-family: Georgia, 'Times New Roman', serif;
        font-size: clamp(28px, 4vw, 42px);
        font-weight: 900;
        margin-bottom: 8px;
        color: #fff;
        text-shadow: 0 2px 10px rgba(0,0,0,0.15);
    }

    .profile-subtitle {
        color: rgba(255,255,255,0.85);
        margin-bottom: 0;
        line-height: 1.7;
    }

    /* ── Cards ── */
    .profile-card {
        border: 1px solid #e8e4dc;
        border-radius: 24px;
        background: #ffffff;
        box-shadow: 0 10px 32px rgba(30,37,53,0.10);
        overflow: hidden;
        height: 100%;
    }

    .profile-card .card-header {
        background: #fff8ee;
        border-bottom: 1px solid #f0e6cc;
        color: #1a1a2e;
        font-weight: 900;
        font-size: 16px;
        padding: 18px 22px;
        display: flex;
        align-items: center;
        gap: 10px;
    }

    .profile-card .card-header i { color: #d97706; }
    .profile-card .card-body { padding: 26px; }

    /* ── Avatar ── */
    .avatar-circle {
        width: 88px;
        height: 88px;
        border-radius: 24px;
        background: linear-gradient(135deg, #f59e0b, #d97706);
        color: #fff;
        display: grid;
        place-items: center;
        font-family: Georgia, serif;
        font-size: 40px;
        font-weight: 900;
        box-shadow: 0 8px 24px rgba(245,158,11,0.35);
        margin: 0 auto 16px;
    }

    .profile-name {
        font-weight: 900;
        color: #1a1a2e;
        font-size: 18px;
        margin-bottom: 4px;
    }

    .profile-email {
        color: #7a7a8a;
        font-size: 14px;
        margin-bottom: 14px;
    }

    .role-badge {
        display: inline-flex;
        align-items: center;
        gap: 6px;
        padding: 7px 16px;
        border-radius: 50px;
        background: #fff8ee;
        border: 1px solid rgba(245,158,11,0.30);
        color: #d97706;
        font-size: 13px;
        font-weight: 800;
        margin-bottom: 4px;
    }

    /* ── Profile meta ── */
    .profile-meta {
        margin-top: 18px;
        padding-top: 18px;
        border-top: 1px solid #f0ece4;
    }

    .profile-meta p {
        display: flex;
        align-items: center;
        gap: 10px;
        margin-bottom: 12px;
        color: #7a7a8a;
        font-size: 14px;
        word-break: break-word;
    }

    .profile-meta p:last-child { margin-bottom: 0; }
    .profile-meta i { color: #d97706; width: 18px; flex-shrink: 0; }
    .profile-meta strong { color: #1a1a2e; }

    /* ── Form ── */
    .form-label {
        color: #1a1a2e;
        font-weight: 800;
        font-size: 14px;
        margin-bottom: 8px;
    }

    .input-wrap { position: relative; }

    .input-wrap i {
        position: absolute;
        left: 16px; top: 50%;
        transform: translateY(-50%);
        color: #d97706;
        z-index: 2;
        font-size: 16px;
    }

    .profile-card .form-control {
        height: 52px;
        border-radius: 14px;
        border: 1px solid #e8e4dc;
        background-color: #fafaf8;
        color: #1a1a2e;
        padding-left: 46px;
        font-weight: 600;
        transition: 0.25s ease;
    }

    .profile-card .form-control:focus {
        background-color: #fff8ee;
        border-color: rgba(245,158,11,0.40);
        box-shadow: 0 0 0 4px rgba(245,158,11,0.12);
        color: #1a1a2e;
    }

    .profile-card .form-control::placeholder { color: #b0a898; }

    /* ── Buttons ── */
    .btn-save-profile {
        min-height: 50px;
        border: none;
        border-radius: 50px;
        background: linear-gradient(135deg, #f59e0b, #d97706);
        color: #fff;
        font-weight: 900;
        padding: 12px 28px;
        box-shadow: 0 8px 24px rgba(245,158,11,0.28);
        transition: 0.25s ease;
    }

    .btn-save-profile:hover {
        transform: translateY(-3px);
        color: #fff;
        box-shadow: 0 12px 32px rgba(245,158,11,0.40);
    }

    .btn-back-dashboard {
        min-height: 50px;
        border-radius: 50px;
        border: 1px solid #e8e4dc;
        color: #1a1a2e;
        background: #f8f7f4;
        font-weight: 800;
        padding: 12px 28px;
        transition: 0.25s ease;
        display: inline-flex;
        align-items: center;
    }

    .btn-back-dashboard:hover {
        border-color: rgba(245,158,11,0.35);
        background: #fff8ee;
        color: #d97706;
        transform: translateY(-3px);
    }

    .btn-profile-logout {
        min-height: 48px;
        border-radius: 50px;
        border: 1px solid rgba(220,53,69,0.28);
        background: rgba(220,53,69,0.07);
        color: #dc2626;
        font-weight: 900;
        transition: 0.25s ease;
    }

    .btn-profile-logout:hover {
        background: #dc3545;
        color: #fff;
        transform: translateY(-3px);
        border-color: transparent;
    }

    /* ── Alerts ── */
    .cms-alert { border-radius: 14px; font-weight: 700; }

    .cms-alert.alert-success {
        border: 1px solid rgba(22,163,74,0.28);
        background: rgba(22,163,74,0.10);
        color: #166534;
    }

    .cms-alert.alert-danger {
        border: 1px solid rgba(220,53,69,0.28);
        background: rgba(220,53,69,0.08);
        color: #991b1b;
    }

    .text-danger { display: block; margin-top: 6px; font-size: 13px; color: #dc2626; }

    @keyframes pageFade {
        from { opacity: 0; transform: translateY(16px); }
        to   { opacity: 1; transform: translateY(0); }
    }

    @media (max-width: 767px) {
        .profile-hero { padding: 22px; }
        .profile-card .card-body { padding: 20px; }
        .btn-save-profile, .btn-back-dashboard { width: 100%; justify-content: center; }
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

    <!-- Hero -->
    <div class="profile-hero">
        <div class="profile-hero-content">
            <div class="profile-kicker"><span></span> Account Settings</div>
            <h1 class="profile-title">My Profile</h1>
            <p class="profile-subtitle">View and update your personal information, contact details, department, and account profile.</p>
        </div>
    </div>

    <div class="row g-4">

        <!-- Left: Info card -->
        <div class="col-lg-4">
            <div class="profile-card">
                <div class="card-body text-center p-4">
                    <div class="avatar-circle">
                        <?= htmlspecialchars($firstLetter) ?>
                    </div>

                    <h4 class="profile-name">
                        <?= htmlspecialchars(trim(($user['first_name'] ?? '') . ' ' . ($user['last_name'] ?? ''))) ?>
                    </h4>

                    <p class="profile-email"><?= htmlspecialchars($user['email'] ?? '') ?></p>

                    <span class="role-badge">
                        <i class="bi bi-shield-check"></i>
                        <?= htmlspecialchars($user['role_name'] ?? '') ?>
                    </span>

                    <div class="profile-meta text-start">
                        <p>
                            <i class="bi bi-telephone-fill"></i>
                            <span><strong>Phone:</strong> <?= htmlspecialchars($user['phone'] ?? '—') ?></span>
                        </p>
                        <p>
                            <i class="bi bi-building-fill"></i>
                            <span><strong>Department:</strong> <?= htmlspecialchars($user['department'] ?? '—') ?></span>
                        </p>
                        <p>
                            <i class="bi bi-check-circle-fill"></i>
                            <span><strong>Status:</strong> <?= htmlspecialchars($user['status'] ?? '—') ?></span>
                        </p>
                    </div>

                    <a href="/college/public/index.php?url=logout" class="btn btn-profile-logout w-100 mt-3">
                        <i class="bi bi-box-arrow-right me-1"></i> Logout
                    </a>
                </div>
            </div>
        </div>

        <!-- Right: Edit form -->
        <div class="col-lg-8">
            <div class="profile-card">
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
                                    <input type="text" name="first_name" id="first_name" class="form-control"
                                        value="<?= htmlspecialchars($user['first_name'] ?? '') ?>"
                                        placeholder="Enter first name" required
                                        pattern="[A-Za-z\s]{2,50}"
                                        title="Only letters and spaces, min 2 characters">
                                </div>
                                <small class="text-danger d-none" id="firstNameError">Only letters and spaces allowed.</small>
                            </div>

                            <div class="col-md-6">
                                <label class="form-label">Last Name</label>
                                <div class="input-wrap">
                                    <i class="bi bi-person"></i>
                                    <input type="text" name="last_name" id="last_name" class="form-control"
                                        value="<?= htmlspecialchars($user['last_name'] ?? '') ?>"
                                        placeholder="Enter last name"
                                        pattern="[A-Za-z\s]{0,50}">
                                </div>
                                <small class="text-danger d-none" id="lastNameError">Only letters and spaces allowed.</small>
                            </div>

                            <div class="col-md-6">
                                <label class="form-label">Email</label>
                                <div class="input-wrap">
                                    <i class="bi bi-envelope-fill"></i>
                                    <input type="email" name="email" id="email" class="form-control"
                                        value="<?= htmlspecialchars($user['email'] ?? '') ?>"
                                        placeholder="example@gmail.com" required>
                                </div>
                                <small class="text-danger d-none" id="emailError">Enter a valid email address.</small>
                            </div>

                            <div class="col-md-6">
                                <label class="form-label">Phone</label>
                                <div class="input-wrap">
                                    <i class="bi bi-telephone-fill"></i>
                                    <input type="text" name="phone" id="phone" class="form-control"
                                        value="<?= htmlspecialchars($user['phone'] ?? '') ?>"
                                        placeholder="10 digit phone number"
                                        pattern="[6-9][0-9]{9}" maxlength="10">
                                </div>
                                <small class="text-danger d-none" id="phoneError">Must be 10 digits starting with 6–9.</small>
                            </div>

                            <div class="col-md-12">
                                <label class="form-label">Department</label>
                                <div class="input-wrap">
                                    <i class="bi bi-building-fill"></i>
                                    <input type="text" name="department" id="department" class="form-control"
                                        value="<?= htmlspecialchars($user['department'] ?? '') ?>"
                                        placeholder="Enter department"
                                        pattern="[A-Za-z\s]{2,100}">
                                </div>
                                <small class="text-danger d-none" id="departmentError">Only letters and spaces allowed.</small>
                            </div>

                        </div>

                        <div class="d-flex flex-wrap gap-2 mt-4">
                            <button type="submit" class="btn btn-save-profile">
                                <i class="bi bi-check-circle-fill me-2"></i>Save Changes
                            </button>
                            <a href="/college/public/index.php?url=dashboard" class="btn btn-back-dashboard">
                                <i class="bi bi-arrow-left-circle me-2"></i>Back to Dashboard
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