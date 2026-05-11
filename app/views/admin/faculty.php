<?php
$pageTitle = 'Faculty';
include __DIR__ . '/../layouts/header.php';
include __DIR__ . '/../layouts/sidebar.php';
?>

<style>
    :root {
        --cms-bg:          #f8f7f4;
        --cms-card:        #ffffff;
        --cms-border:      #e8e4dc;
        --cms-gold:        #f59e0b;
        --cms-gold-soft:   rgba(245, 158, 11, 0.12);
        --cms-gold-border: rgba(245, 158, 11, 0.30);
        --cms-text:        #1a1a2e;
        --cms-muted:       #7a7a8a;
        --cms-shadow:      0 10px 32px rgba(30, 37, 53, 0.10);
        --cms-gold-shadow: 0 8px 24px rgba(245, 158, 11, 0.28);
    }

    .faculty-page {
        position: relative;
        min-height: calc(100vh - 70px);
        padding: 10px 4px 30px;
        color: var(--cms-text);
        animation: pageFade 0.6s ease both;
    }

    /* ── Hero ── */
    .faculty-hero {
        position: relative;
        overflow: hidden;
        border-radius: 24px;
        padding: 28px 32px;
        margin-bottom: 24px;
        background: linear-gradient(135deg, #f59e0b 0%, #fb923c 55%, #ef4444 100%);
        box-shadow: 0 12px 40px rgba(245, 158, 11, 0.28);
    }

    .faculty-hero::before {
        content: "";
        position: absolute;
        width: 340px; height: 340px;
        border-radius: 50%;
        background: rgba(255,255,255,0.10);
        top: -100px; right: 100px;
        pointer-events: none;
    }

    .faculty-hero::after {
        content: "";
        position: absolute;
        width: 180px; height: 180px;
        border-radius: 50%;
        background: rgba(255,255,255,0.07);
        bottom: -60px; right: 260px;
        pointer-events: none;
    }

    .faculty-hero-content { position: relative; z-index: 2; }

    .faculty-kicker {
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

    .faculty-kicker span {
        width: 7px; height: 7px;
        border-radius: 50%;
        background: #fff;
        box-shadow: 0 0 10px rgba(255,255,255,0.8);
    }

    .faculty-title {
        font-family: Georgia, 'Times New Roman', serif;
        font-size: clamp(28px, 4vw, 42px);
        font-weight: 900;
        margin-bottom: 8px;
        letter-spacing: -0.03em;
        color: #fff;
        text-shadow: 0 2px 10px rgba(0,0,0,0.15);
    }

    .faculty-subtitle {
        color: rgba(255,255,255,0.85);
        margin-bottom: 0;
        line-height: 1.7;
    }

    .faculty-count-box {
        position: relative; z-index: 2;
        background: #ffffff;
        border-radius: 20px;
        padding: 20px;
        text-align: center;
        box-shadow: 0 8px 24px rgba(0,0,0,0.14);
    }

    .faculty-count-box i { color: #f59e0b; font-size: 28px; margin-bottom: 6px; }
    .faculty-count-box .count-label { color: #7a7a8a; font-size: 13px; font-weight: 700; }
    .faculty-count-box .count-value { color: #1a1a2e; font-size: 30px; font-weight: 900; line-height: 1; }

    /* ── Alerts ── */
    .cms-alert { border-radius: 16px; font-weight: 700; }
    .cms-alert.alert-success { border: 1px solid rgba(25,135,84,0.28); background: rgba(25,135,84,0.10); color: #166534; }
    .cms-alert.alert-warning { border: 1px solid rgba(245,158,11,0.35); background: rgba(245,158,11,0.10); color: #92400e; }
    .cms-alert.alert-danger  { border: 1px solid rgba(220,53,69,0.28);  background: rgba(220,53,69,0.08);  color: #991b1b; }

    /* ── Cards ── */
    .cms-card {
        border: 1px solid var(--cms-border);
        border-radius: 24px;
        background: #ffffff;
        color: var(--cms-text);
        box-shadow: var(--cms-shadow);
        overflow: hidden;
    }

    .cms-card .card-header {
        background: #fff8ee;
        border-bottom: 1px solid #f0e6cc;
        color: var(--cms-text);
        font-weight: 900;
        font-size: 16px;
        padding: 18px 22px;
        display: flex;
        align-items: center;
        gap: 10px;
    }

    .cms-card .card-header i { color: #d97706; }
    .cms-card .card-body { padding: 24px; }

    /* ── Form ── */
    .form-label { color: var(--cms-text); font-weight: 800; font-size: 14px; margin-bottom: 8px; }

    .input-wrap { position: relative; }

    .input-wrap i {
        position: absolute; left: 16px; top: 50%;
        transform: translateY(-50%);
        color: #d97706; z-index: 2; font-size: 16px;
    }

    .cms-card .form-control,
    .cms-card .form-select {
        height: 52px;
        border-radius: 16px;
        border: 1px solid var(--cms-border);
        background-color: #fafaf8;
        color: var(--cms-text);
        padding-left: 46px;
        font-weight: 600;
        transition: 0.25s ease;
    }

    .cms-card .form-control:focus,
    .cms-card .form-select:focus {
        background-color: #fff8ee;
        color: var(--cms-text);
        border-color: var(--cms-gold-border);
        box-shadow: 0 0 0 4px rgba(245, 158, 11, 0.14);
    }

    .cms-card .form-control::placeholder { color: #b0a898; }
    .cms-card .form-select option { background: #fff; color: #1a1a2e; }

    /* ── Create button ── */
    .btn-create-student,
    .btn-create-faculty {
        min-height: 52px;
        border: none;
        border-radius: 50px;
        background: linear-gradient(135deg, #f59e0b, #d97706);
        color: #fff;
        font-weight: 900;
        box-shadow: var(--cms-gold-shadow);
        transition: 0.25s ease;
    }

    .btn-create-student:hover,
    .btn-create-faculty:hover {
        transform: translateY(-3px);
        color: #fff;
        box-shadow: 0 12px 32px rgba(245,158,11,0.40);
    }

    /* ── Table ── */
    .cms-table { color: var(--cms-text); margin-bottom: 0; border-color: var(--cms-border); }

    .cms-table thead th {
        background: #fff8ee;
        color: #92400e;
        border-color: #f0e6cc;
        font-size: 12px;
        text-transform: uppercase;
        letter-spacing: 0.8px;
        padding: 14px;
        white-space: nowrap;
        font-weight: 800;
    }

    .cms-table tbody td {
        background: #ffffff;
        color: var(--cms-text);
        border-color: #f0ece4;
        padding: 14px;
        vertical-align: middle;
    }

    .cms-table tbody tr:hover td { background: #fffdf7; }

    /* ── Avatar ── */
    .student-avatar-mini,
    .faculty-avatar-mini {
        width: 36px; height: 36px;
        border-radius: 12px;
        display: inline-grid;
        place-items: center;
        background: #fff8ee;
        border: 1px solid rgba(245,158,11,0.28);
        color: #d97706;
        font-weight: 900;
        margin-right: 10px;
        font-size: 13px;
    }

    /* ── Status badges ── */
    .status-badge {
        display: inline-flex;
        align-items: center;
        padding: 5px 12px;
        border-radius: 50px;
        font-size: 12px;
        font-weight: 800;
        text-transform: capitalize;
    }

    .status-active    { background: rgba(22,163,74,0.10);  color: #15803d; border: 1px solid rgba(22,163,74,0.25); }
    .status-inactive  { background: rgba(245,158,11,0.12); color: #92400e; border: 1px solid rgba(245,158,11,0.30); }
    .status-suspended { background: rgba(220,53,69,0.10);  color: #991b1b; border: 1px solid rgba(220,53,69,0.25); }

    /* ── Action buttons ── */
    .btn-action-edit,
    .btn-action-delete {
        border-radius: 50px;
        font-weight: 800;
        padding: 6px 13px;
        font-size: 13px;
        transition: 0.25s ease;
    }

    .btn-action-edit {
        border: 1px solid rgba(245,158,11,0.30);
        background: #fff8ee;
        color: #d97706;
    }

    .btn-action-edit:hover {
        background: linear-gradient(135deg, #f59e0b, #d97706);
        color: #fff;
        border-color: transparent;
        transform: translateY(-2px);
    }

    .btn-action-delete {
        border: 1px solid rgba(220,53,69,0.28);
        background: rgba(220,53,69,0.07);
        color: #dc2626;
    }

    .btn-action-delete:hover {
        background: #dc3545;
        color: #fff;
        transform: translateY(-2px);
    }

    .empty-row { color: var(--cms-muted) !important; padding: 24px !important; }

    @keyframes pageFade {
        from { opacity: 0; transform: translateY(16px); }
        to   { opacity: 1; transform: translateY(0); }
    }

    @media (max-width: 991px) {
        .faculty-hero { padding: 22px; }
        .faculty-count-box { text-align: left; }
    }

    @media (max-width: 575px) {
        .cms-card .card-body { padding: 18px; }
        .faculty-title { font-size: 28px; }
    }

</style>

<div class="container-fluid faculty-page">

    <?php if (isset($_GET['msg']) && $_GET['msg'] === 'created_and_emailed'): ?>
        <div class="alert alert-success cms-alert">Faculty created and credentials emailed successfully.</div>
    <?php endif; ?>

    <?php if (isset($_GET['msg']) && $_GET['msg'] === 'created_but_email_failed'): ?>
        <div class="alert alert-warning cms-alert">Faculty created, but email sending failed.</div>
    <?php endif; ?>

    <?php if (isset($_GET['msg']) && $_GET['msg'] === 'create_failed'): ?>
        <div class="alert alert-danger cms-alert">Faculty creation failed. Email may already exist.</div>
    <?php endif; ?>

    <?php if (isset($_GET['msg']) && $_GET['msg'] === 'invalid_input'): ?>
        <div class="alert alert-danger cms-alert">Fill all required fields properly.</div>
    <?php endif; ?>

    <?php if (isset($_GET['msg']) && $_GET['msg'] === 'updated'): ?>
        <div class="alert alert-success cms-alert">Faculty updated successfully.</div>
    <?php endif; ?>

    <?php if (isset($_GET['msg']) && $_GET['msg'] === 'deleted'): ?>
        <div class="alert alert-success cms-alert">Faculty deleted successfully.</div>
    <?php endif; ?>

    <div class="faculty-hero">
        <div class="row align-items-center g-4">
            <div class="col-lg-8">
                <div class="faculty-hero-content">
                    <div class="faculty-kicker">
                        <span></span>
                        Faculty Management
                    </div>

                    <h1 class="faculty-title">Manage Faculty</h1>

                    <p class="faculty-subtitle">
                        Create faculty login accounts, assign departments, manage contact information and control account status from one place.
                    </p>
                </div>
            </div>

            <div class="col-lg-4">
                <div class="faculty-count-box">
                    <i class="bi bi-person-workspace d-block"></i>
                    <div class="count-label">Total Faculty</div>
                    <div class="count-value"><?= !empty($users) ? count($users) : 0 ?></div>
                </div>
            </div>
        </div>
    </div>

    <div class="row g-4">
        <div class="col-xl-4 col-lg-5">
            <div class="card cms-card">
                <div class="card-header">
                    <i class="bi bi-person-plus-fill"></i>
                    Add Faculty
                </div>

                <div class="card-body">
                    <form action="/college/public/index.php?url=create-user" method="POST">
                        <input type="hidden" name="role_id" value="2">
                        <input type="hidden" name="redirect_to" value="faculty">

                        <div class="mb-3">
                            <label class="form-label">First Name</label>
                            <div class="input-wrap">
                                <i class="bi bi-person-fill"></i>
                                <input
                                    type="text"
                                    name="first_name"
                                    class="form-control"
                                    placeholder="Enter first name"
                                    pattern="[A-Za-z ]+"
                                    title="Only letters allowed"
                                    oninput="this.value = this.value.replace(/[^A-Za-z ]/g, '')"
                                    required
                                >
                            </div>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Last Name</label>
                            <div class="input-wrap">
                                <i class="bi bi-person"></i>
                                <input
                                    type="text"
                                    name="last_name"
                                    class="form-control"
                                    placeholder="Enter last name"
                                    pattern="[A-Za-z ]+"
                                    oninput="this.value = this.value.replace(/[^A-Za-z ]/g, '')"
                                    title="Only letters allowed"
                                >
                            </div>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Phone</label>
                            <div class="input-wrap">
                                <i class="bi bi-telephone-fill"></i>
                                <input
                                    type="tel"
                                    name="phone"
                                    class="form-control"
                                    placeholder="10 digit phone number"
                                    pattern="[0-9]{10}"
                                    maxlength="10"
                                    oninput="this.value = this.value.replace(/[^0-9]/g, '')"
                                    title="Enter exactly 10 digits"
                                >
                            </div>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Email / Login ID</label>
                            <div class="input-wrap">
                                <i class="bi bi-envelope-fill"></i>
                                <input
                                    type="email"
                                    name="email"
                                    class="form-control"
                                    placeholder="example@gmail.com"
                                    required
                                >
                            </div>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Password</label>
                            <div class="input-wrap">
                                <i class="bi bi-lock-fill"></i>
                                <input
                                    type="password"
                                    name="password"
                                    class="form-control"
                                    placeholder="Create password"
                                    pattern="(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[\W_]).{8,}"
                                    title="Must contain 8 characters, 1 uppercase, 1 lowercase, 1 number, 1 special character"
                                    required
                                >
                            </div>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Department</label>
                            <div class="input-wrap">
                                <i class="bi bi-building-fill"></i>
                                <select name="department" class="form-control" required>
                                    <option value="">Select Department</option>
                                    <option value="Computer Science">Computer Science</option>
                                    <option value="BCA">BCA</option>
                                    <option value="BBA">BBA</option>
                                    <option value="Commerce">Commerce</option>
                                    <option value="Science">Science</option>
                                </select>
                            </div>
                        </div>

                        <button type="submit" class="btn btn-create-faculty w-100">
                            Create Faculty
                            <i class="bi bi-arrow-right ms-1"></i>
                        </button>
                    </form>
                </div>
            </div>
        </div>

        <div class="col-xl-8 col-lg-7">
            <div class="card cms-card">
                <div class="card-header">
                    <i class="bi bi-list-check"></i>
                    All Faculty
                </div>

                <div class="card-body table-responsive">
                    <table class="table table-bordered align-middle cms-table">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Phone</th>
                                <th>Department</th>
                                <th>Status</th>
                                <th style="width: 170px;">Action</th>
                            </tr>
                        </thead>

                        <tbody>
                            <?php if (!empty($users)): ?>
                                <?php foreach ($users as $user): ?>
                                    <?php
                                        $fullName = trim(($user['first_name'] ?? '') . ' ' . ($user['last_name'] ?? ''));
                                        $initials = strtoupper(substr($user['first_name'] ?? 'F', 0, 1) . substr($user['last_name'] ?? '', 0, 1));
                                        if ($initials === '') {
                                            $initials = 'F';
                                        }

                                        $status = strtolower($user['status'] ?? '');
                                        $statusClass = 'status-inactive';

                                        if ($status === 'active') {
                                            $statusClass = 'status-active';
                                        } elseif ($status === 'suspended') {
                                            $statusClass = 'status-suspended';
                                        }
                                    ?>

                                    <tr>
                                        <td><?= htmlspecialchars($user['id']) ?></td>

                                        <td>
                                            <span class="faculty-avatar-mini"><?= htmlspecialchars($initials) ?></span>
                                            <?= htmlspecialchars($fullName) ?>
                                        </td>

                                        <td><?= htmlspecialchars($user['email']) ?></td>

                                        <td><?= htmlspecialchars($user['phone'] ?? '') ?></td>

                                        <td><?= htmlspecialchars($user['department'] ?? '') ?></td>

                                        <td>
                                            <span class="status-badge <?= htmlspecialchars($statusClass) ?>">
                                                <?= htmlspecialchars($user['status']) ?>
                                            </span>
                                        </td>

                                        <td>
                                            <a href="/college/public/index.php?url=edit-user&id=<?= htmlspecialchars($user['id']) ?>&from=faculty" class="btn btn-sm btn-action-edit">
                                                <i class="bi bi-pencil-square"></i>
                                                Edit
                                            </a>

                                            <form action="/college/public/index.php?url=delete-user" method="POST" class="d-inline" onsubmit="return confirm('Delete this faculty member?');">
                                                <input type="hidden" name="id" value="<?= htmlspecialchars($user['id']) ?>">
                                                <input type="hidden" name="redirect_to" value="faculty">

                                                <button type="submit" class="btn btn-sm btn-action-delete">
                                                    <i class="bi bi-trash-fill"></i>
                                                    Delete
                                                </button>
                                            </form>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>

                            <?php else: ?>
                                <tr>
                                    <td colspan="7" class="text-center empty-row">No faculty found.</td>
                                </tr>
                            <?php endif; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    
</div>

<?php include __DIR__ . '/../layouts/footer.php'; ?>