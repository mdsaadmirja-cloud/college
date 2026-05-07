<?php
$pageTitle = 'Edit User';
include __DIR__ . '/../layouts/header.php';
include __DIR__ . '/../layouts/sidebar.php';

$redirectTo = $_GET['from'] ?? 'dashboard';
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
        --cms-shadow: 0 24px 70px rgba(0, 0, 0, 0.35);
        --cms-gold-shadow: 0 18px 45px rgba(245, 200, 75, 0.18);
    }

    .edit-user-page {
        position: relative;
        min-height: calc(100vh - 70px);
        padding: 10px 4px 30px;
        color: var(--cms-text);
        animation: pageFade 0.7s ease both;
    }

    .edit-user-hero {
        position: relative;
        overflow: hidden;
        border-radius: 28px;
        padding: 26px 28px;
        margin-bottom: 24px;
        background:
            radial-gradient(circle at 15% 20%, rgba(29, 191, 115, 0.22), transparent 34%),
            radial-gradient(circle at 88% 18%, rgba(245, 200, 75, 0.16), transparent 32%),
            linear-gradient(135deg, #052017, #073824 55%, #03140f);
        border: 1px solid var(--cms-gold-border);
        box-shadow: var(--cms-shadow);
    }

    .edit-user-hero::before {
        content: "";
        position: absolute;
        inset: 0;
        background-image: url("data:image/svg+xml,%3Csvg viewBox='0 0 200 200' xmlns='http://www.w3.org/2000/svg'%3E%3Cfilter id='n'%3E%3CfeTurbulence type='fractalNoise' baseFrequency='0.8' numOctaves='2'/%3E%3C/filter%3E%3Crect width='100%25' height='100%25' filter='url(%23n)' opacity='0.20'/%3E%3C/svg%3E");
        opacity: 0.10;
        pointer-events: none;
    }

    .edit-user-hero-content {
        position: relative;
        z-index: 2;
    }

    .edit-kicker {
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

    .edit-kicker span {
        width: 7px;
        height: 7px;
        border-radius: 50%;
        background: var(--cms-gold);
        box-shadow: 0 0 18px var(--cms-gold);
    }

    .edit-title {
        font-family: Georgia, 'Times New Roman', serif;
        font-size: clamp(30px, 4vw, 44px);
        font-weight: 900;
        margin-bottom: 8px;
        letter-spacing: -0.03em;
    }

    .edit-subtitle {
        color: var(--cms-muted);
        margin-bottom: 0;
        line-height: 1.7;
    }

    .edit-user-card {
        position: relative;
        overflow: hidden;
        border: 1px solid var(--cms-border);
        border-radius: 28px;
        background:
            radial-gradient(circle at top right, rgba(245, 200, 75, 0.13), transparent 34%),
            var(--cms-card);
        color: var(--cms-text);
        box-shadow: var(--cms-shadow);
    }

    .edit-user-card .card-header {
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

    .edit-user-card .card-header i {
        color: var(--cms-gold);
    }

    .edit-user-card .card-body {
        padding: 26px;
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

    .edit-user-card .form-control,
    .edit-user-card .form-select {
        height: 52px;
        border-radius: 16px;
        border: 1px solid var(--cms-border);
        background-color: rgba(255, 255, 255, 0.06);
        color: var(--cms-text);
        padding-left: 46px;
        font-weight: 600;
        transition: 0.3s ease;
    }

    .edit-user-card .form-select {
        cursor: pointer;
    }

    .edit-user-card .form-control:focus,
    .edit-user-card .form-select:focus {
        background-color: rgba(255, 255, 255, 0.08);
        color: var(--cms-text);
        border-color: var(--cms-gold-border);
        box-shadow: 0 0 0 4px rgba(245, 200, 75, 0.12);
    }

    .edit-user-card .form-control::placeholder {
        color: rgba(255, 248, 231, 0.42);
    }

    .edit-user-card .form-select option {
        background: #052017;
        color: var(--cms-text);
    }

    .btn-update-user {
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

    .btn-update-user:hover {
        transform: translateY(-3px);
        color: #07331f;
        opacity: 0.96;
    }

    .btn-cancel-user {
        min-height: 50px;
        border-radius: 50px;
        border: 1px solid var(--cms-border);
        color: var(--cms-text);
        background: rgba(255, 255, 255, 0.055);
        font-weight: 800;
        padding: 12px 26px;
        transition: 0.3s ease;
    }

    .btn-cancel-user:hover {
        border-color: var(--cms-gold-border);
        background: var(--cms-gold-soft);
        color: var(--cms-gold);
        transform: translateY(-3px);
    }

    .cms-alert-danger {
        border-radius: 18px;
        border: 1px solid rgba(220, 53, 69, 0.30);
        background: rgba(220, 53, 69, 0.13);
        color: #ffb3bd;
        font-weight: 700;
    }

    .user-not-found-box {
        border-radius: 20px;
        border: 1px solid var(--cms-border);
        background: rgba(255, 255, 255, 0.045);
        padding: 28px;
        text-align: center;
        color: var(--cms-muted);
    }

    .user-not-found-box i {
        font-size: 42px;
        color: var(--cms-gold);
        margin-bottom: 12px;
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
        .edit-user-hero {
            padding: 22px;
        }

        .edit-user-card .card-body {
            padding: 22px;
        }

        .btn-update-user,
        .btn-cancel-user {
            width: 100%;
        }
    }
</style>

<div class="container-fluid edit-user-page">

    <?php if (isset($_GET['msg']) && $_GET['msg'] === 'update_failed'): ?>
        <div class="alert cms-alert-danger">Update failed. Email may already exist.</div>
    <?php endif; ?>

    <div class="edit-user-hero">
        <div class="edit-user-hero-content">
            <div class="edit-kicker">
                <span></span>
                User Management
            </div>
            <h1 class="edit-title">Edit <?= htmlspecialchars($user['role_name'] ?? 'User') ?></h1>
            <p class="edit-subtitle">
                Update user profile, contact details, department and account status without changing existing dashboard logic.
            </p>
        </div>
    </div>

    <div class="row justify-content-center">
        <div class="col-xl-8 col-lg-9">
            <div class="card edit-user-card">
                <div class="card-header">
                    <i class="bi bi-pencil-square"></i>
                    Edit <?= htmlspecialchars($user['role_name'] ?? 'User') ?> Details
                </div>

                <div class="card-body">
                    <?php if ($user): ?>
                        <form action="/college/public/index.php?url=update-user" method="POST">
                            <input type="hidden" name="id" value="<?= htmlspecialchars($user['id']) ?>">
                            <input type="hidden" name="redirect_to" value="<?= htmlspecialchars($redirectTo) ?>">

                            <div class="row g-3">
                                <div class="col-md-6">
                                    <label class="form-label">First Name</label>
                                    <div class="input-wrap">
                                        <i class="bi bi-person-fill"></i>
                                        <input
                                            type="text"
                                            name="first_name"
                                            class="form-control"
                                            value="<?= htmlspecialchars($user['first_name'] ?? '') ?>"
                                            placeholder="Enter first name"
                                            required
                                        >
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <label class="form-label">Last Name</label>
                                    <div class="input-wrap">
                                        <i class="bi bi-person"></i>
                                        <input
                                            type="text"
                                            name="last_name"
                                            class="form-control"
                                            value="<?= htmlspecialchars($user['last_name'] ?? '') ?>"
                                            placeholder="Enter last name"
                                        >
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <label class="form-label">Phone</label>
                                    <div class="input-wrap">
                                        <i class="bi bi-telephone-fill"></i>
                                        <input
                                            type="text"
                                            name="phone"
                                            class="form-control"
                                            value="<?= htmlspecialchars($user['phone'] ?? '') ?>"
                                            placeholder="Enter phone number"
                                        >
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <label class="form-label">Email</label>
                                    <div class="input-wrap">
                                        <i class="bi bi-envelope-fill"></i>
                                        <input
                                            type="email"
                                            name="email"
                                            class="form-control"
                                            value="<?= htmlspecialchars($user['email'] ?? '') ?>"
                                            placeholder="example@gmail.com"
                                            required
                                        >
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <label class="form-label">Department</label>
                                    <div class="input-wrap">
                                        <i class="bi bi-building-fill"></i>
                                        <input
                                            type="text"
                                            name="department"
                                            class="form-control"
                                            value="<?= htmlspecialchars($user['department'] ?? '') ?>"
                                            placeholder="Enter department"
                                        >
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <label class="form-label">Status</label>
                                    <div class="input-wrap">
                                        <i class="bi bi-shield-check"></i>
                                        <select name="status" class="form-select">
                                            <option value="active" <?= ($user['status'] ?? '') === 'active' ? 'selected' : '' ?>>Active</option>
                                            <option value="inactive" <?= ($user['status'] ?? '') === 'inactive' ? 'selected' : '' ?>>Inactive</option>
                                            <option value="suspended" <?= ($user['status'] ?? '') === 'suspended' ? 'selected' : '' ?>>Suspended</option>
                                        </select>
                                    </div>
                                </div>
                            </div>

                            <div class="d-flex flex-wrap gap-2 mt-4">
                                <button type="submit" class="btn btn-update-user">
                                    <i class="bi bi-check-circle-fill me-1"></i>
                                    Update User
                                </button>

                                <a href="/college/public/index.php?url=<?= htmlspecialchars($redirectTo) ?>" class="btn btn-cancel-user">
                                    <i class="bi bi-x-circle me-1"></i>
                                    Cancel
                                </a>
                            </div>
                        </form>
                    <?php else: ?>
                        <div class="user-not-found-box">
                            <i class="bi bi-person-x-fill d-block"></i>
                            <h5>User not found.</h5>
                            <p class="mb-0">The selected user record could not be loaded.</p>
                        </div>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>

</div>

<?php include __DIR__ . '/../layouts/footer.php'; ?>