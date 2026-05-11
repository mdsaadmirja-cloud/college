<?php
$pageTitle = 'Edit User';
include __DIR__ . '/../layouts/header.php';
include __DIR__ . '/../layouts/sidebar.php';

$redirectTo = $_GET['from'] ?? 'dashboard';
?>

<style>
    .edit-user-page {
        padding: 10px 4px 30px;
        animation: pageFade 0.6s ease both;
    }

    .edit-user-hero {
        position: relative;
        overflow: hidden;
        border-radius: 24px;
        padding: 28px 32px;
        margin-bottom: 24px;
        background: linear-gradient(135deg, #f59e0b 0%, #fb923c 55%, #ef4444 100%);
        box-shadow: 0 12px 40px rgba(245, 158, 11, 0.28);
    }

    .edit-user-hero::before {
        content: "";
        position: absolute;
        width: 340px; height: 340px;
        border-radius: 50%;
        background: rgba(255,255,255,0.10);
        top: -100px; right: 100px;
        pointer-events: none;
    }

    .edit-user-hero-content { position: relative; z-index: 2; }

    .edit-kicker {
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
    }

    .edit-kicker span {
        width: 7px; height: 7px;
        border-radius: 50%;
        background: #fff;
    }

    .edit-title {
        font-family: Georgia, 'Times New Roman', serif;
        font-size: clamp(28px, 4vw, 40px);
        font-weight: 900;
        margin-bottom: 8px;
        color: #fff;
        text-shadow: 0 2px 10px rgba(0,0,0,0.15);
    }

    .edit-subtitle {
        color: rgba(255,255,255,0.85);
        margin-bottom: 0;
        line-height: 1.7;
    }

    /* Card */
    .edit-user-card {
        border: 1px solid #e8e4dc;
        border-radius: 24px;
        background: #ffffff;
        box-shadow: 0 10px 32px rgba(30,37,53,0.10);
        overflow: hidden;
    }

    .edit-user-card .card-header {
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

    .edit-user-card .card-header i { color: #d97706; }
    .edit-user-card .card-body { padding: 28px; }

    /* Form */
    .form-label {
        color: #1a1a2e;
        font-weight: 800;
        font-size: 14px;
        margin-bottom: 8px;
    }

    .edit-user-card .form-control,
    .edit-user-card .form-select {
        height: 52px;
        border-radius: 14px;
        border: 1px solid #e8e4dc;
        background-color: #fafaf8;
        color: #1a1a2e;
        font-weight: 600;
        transition: 0.25s ease;
    }

    .edit-user-card .form-control:focus,
    .edit-user-card .form-select:focus {
        background-color: #fff8ee;
        border-color: rgba(245,158,11,0.40);
        box-shadow: 0 0 0 4px rgba(245,158,11,0.12);
        color: #1a1a2e;
    }

    .edit-user-card .form-control::placeholder { color: #b0a898; }
    .edit-user-card .form-select option { background: #fff; color: #1a1a2e; }

    /* Buttons */
    .btn-update-user {
        height: 50px;
        border: none;
        border-radius: 50px;
        background: linear-gradient(135deg, #f59e0b, #d97706);
        color: #fff;
        font-weight: 900;
        padding: 0 28px;
        box-shadow: 0 8px 24px rgba(245,158,11,0.28);
        transition: 0.25s ease;
    }

    .btn-update-user:hover {
        transform: translateY(-3px);
        color: #fff;
        box-shadow: 0 12px 32px rgba(245,158,11,0.40);
    }

    .btn-cancel-user {
        height: 50px;
        border-radius: 50px;
        border: 1px solid #e8e4dc;
        color: #1a1a2e;
        background: #f8f7f4;
        font-weight: 800;
        padding: 0 28px;
        transition: 0.25s ease;
        display: inline-flex;
        align-items: center;
    }

    .btn-cancel-user:hover {
        border-color: rgba(245,158,11,0.35);
        background: #fff8ee;
        color: #d97706;
        transform: translateY(-3px);
    }

    .alert-danger {
        border-radius: 14px;
        border: 1px solid rgba(220,53,69,0.28);
        background: rgba(220,53,69,0.08);
        color: #991b1b;
        font-weight: 700;
    }

    .user-not-found-box {
        border-radius: 16px;
        border: 1px solid #e8e4dc;
        background: #fafaf8;
        padding: 32px;
        text-align: center;
        color: #7a7a8a;
    }

    .user-not-found-box i { font-size: 42px; color: #d97706; margin-bottom: 12px; display: block; }

    @keyframes pageFade {
        from { opacity: 0; transform: translateY(16px); }
        to   { opacity: 1; transform: translateY(0); }
    }

    @media (max-width: 767px) {
        .edit-user-hero { padding: 22px; }
        .edit-user-card .card-body { padding: 20px; }
        .btn-update-user, .btn-cancel-user { width: 100%; justify-content: center; }
    }
</style>

<div class="container-fluid edit-user-page">

    <?php if (isset($_GET['msg']) && $_GET['msg'] === 'update_failed'): ?>
        <div class="alert alert-danger">Update failed. Email may already exist.</div>
    <?php endif; ?>

    <!-- Hero -->
    <div class="edit-user-hero">
        <div class="edit-user-hero-content">
            <div class="edit-kicker"><span></span> User Management</div>
            <h1 class="edit-title">Edit <?= htmlspecialchars($user['role_name'] ?? 'User') ?></h1>
            <p class="edit-subtitle">Update profile, contact details, department and account status.</p>
        </div>
    </div>

    <div class="row justify-content-center">
        <div class="col-xl-8 col-lg-9">
            <div class="edit-user-card">
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
                                    <input type="text" name="first_name" class="form-control"
                                        value="<?= htmlspecialchars($user['first_name'] ?? '') ?>"
                                        placeholder="Enter first name" required>
                                </div>

                                <div class="col-md-6">
                                    <label class="form-label">Last Name</label>
                                    <input type="text" name="last_name" class="form-control"
                                        value="<?= htmlspecialchars($user['last_name'] ?? '') ?>"
                                        placeholder="Enter last name">
                                </div>

                                <div class="col-md-6">
                                    <label class="form-label">Phone</label>
                                    <input type="text" name="phone" class="form-control"
                                        value="<?= htmlspecialchars($user['phone'] ?? '') ?>"
                                        placeholder="Enter phone number">
                                </div>

                                <div class="col-md-6">
                                    <label class="form-label">Email</label>
                                    <input type="email" name="email" class="form-control"
                                        value="<?= htmlspecialchars($user['email'] ?? '') ?>"
                                        placeholder="example@gmail.com" required>
                                </div>

                                <div class="col-md-6">
                                    <label class="form-label">Department</label>
                                    <input type="text" name="department" class="form-control"
                                        value="<?= htmlspecialchars($user['department'] ?? '') ?>"
                                        placeholder="Enter department">
                                </div>

                                <div class="col-md-6">
                                    <label class="form-label">Status</label>
                                    <select name="status" class="form-select">
                                        <option value="active"    <?= ($user['status'] ?? '') === 'active'    ? 'selected' : '' ?>>Active</option>
                                        <option value="inactive"  <?= ($user['status'] ?? '') === 'inactive'  ? 'selected' : '' ?>>Inactive</option>
                                        <option value="suspended" <?= ($user['status'] ?? '') === 'suspended' ? 'selected' : '' ?>>Suspended</option>
                                    </select>
                                </div>
                            </div>

                            <div class="d-flex flex-wrap gap-2 mt-4">
                                <button type="submit" class="btn btn-update-user">
                                    <i class="bi bi-check-circle-fill me-2"></i>Update User
                                </button>
                                <a href="/college/public/index.php?url=<?= htmlspecialchars($redirectTo) ?>" class="btn btn-cancel-user">
                                    <i class="bi bi-x-circle me-2"></i>Cancel
                                </a>
                            </div>
                        </form>
                    <?php else: ?>
                        <div class="user-not-found-box">
                            <i class="bi bi-person-x-fill"></i>
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