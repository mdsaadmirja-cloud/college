<?php
$pageTitle = 'Students';
include __DIR__ . '/../layouts/header.php';
include __DIR__ . '/../layouts/sidebar.php';
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

    .students-page {
        position: relative;
        min-height: calc(100vh - 70px);
        padding: 10px 4px 30px;
        color: var(--cms-text);
        animation: pageFade 0.7s ease both;
    }

    .students-hero {
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

    .students-hero::before {
        content: "";
        position: absolute;
        inset: 0;
        background-image: url("data:image/svg+xml,%3Csvg viewBox='0 0 200 200' xmlns='http://www.w3.org/2000/svg'%3E%3Cfilter id='n'%3E%3CfeTurbulence type='fractalNoise' baseFrequency='0.8' numOctaves='2'/%3E%3C/filter%3E%3Crect width='100%25' height='100%25' filter='url(%23n)' opacity='0.20'/%3E%3C/svg%3E");
        opacity: 0.10;
        pointer-events: none;
    }

    .students-hero-content {
        position: relative;
        z-index: 2;
    }

    .students-kicker {
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

    .students-kicker span {
        width: 7px;
        height: 7px;
        border-radius: 50%;
        background: var(--cms-gold);
        box-shadow: 0 0 18px var(--cms-gold);
    }

    .students-title {
        font-family: Georgia, 'Times New Roman', serif;
        font-size: clamp(30px, 4vw, 44px);
        font-weight: 900;
        margin-bottom: 8px;
        letter-spacing: -0.03em;
    }

    .students-subtitle {
        color: var(--cms-muted);
        margin-bottom: 0;
        line-height: 1.7;
    }

    .students-count-box {
        position: relative;
        z-index: 2;
        background: rgba(255, 255, 255, 0.06);
        border: 1px solid var(--cms-border);
        border-radius: 22px;
        padding: 18px;
        text-align: center;
        backdrop-filter: blur(16px);
    }

    .students-count-box i {
        color: var(--cms-gold);
        font-size: 30px;
        margin-bottom: 6px;
    }

    .students-count-box .count-label {
        color: var(--cms-muted);
        font-size: 13px;
        font-weight: 700;
    }

    .students-count-box .count-value {
        color: var(--cms-text);
        font-size: 30px;
        font-weight: 900;
        line-height: 1;
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

    .cms-alert.alert-warning {
        border: 1px solid rgba(255, 193, 7, 0.28);
        background: rgba(255, 193, 7, 0.13);
        color: #ffe08a;
    }

    .cms-alert.alert-danger {
        border: 1px solid rgba(220, 53, 69, 0.30);
        background: rgba(220, 53, 69, 0.13);
        color: #ffb3bd;
    }

    .cms-card {
        border: 1px solid var(--cms-border);
        border-radius: 28px;
        background:
            radial-gradient(circle at top right, rgba(245, 200, 75, 0.13), transparent 34%),
            var(--cms-card);
        color: var(--cms-text);
        box-shadow: var(--cms-shadow);
        overflow: hidden;
    }

    .cms-card .card-header {
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

    .cms-card .card-header i {
        color: var(--cms-gold);
    }

    .cms-card .card-body {
        padding: 24px;
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

    .cms-card .form-control,
    .cms-card .form-select {
        height: 52px;
        border-radius: 16px;
        border: 1px solid var(--cms-border);
        background-color: rgba(255, 255, 255, 0.06);
        color: var(--cms-text);
        padding-left: 46px;
        font-weight: 600;
        transition: 0.3s ease;
    }

    .cms-card .form-control:focus,
    .cms-card .form-select:focus {
        background-color: rgba(255, 255, 255, 0.08);
        color: var(--cms-text);
        border-color: var(--cms-gold-border);
        box-shadow: 0 0 0 4px rgba(245, 200, 75, 0.12);
    }

    .cms-card .form-control::placeholder {
        color: rgba(255, 248, 231, 0.42);
    }

    .cms-card .form-select option {
        background: #052017;
        color: var(--cms-text);
    }

    .btn-create-student {
        min-height: 52px;
        border: none;
        border-radius: 50px;
        background: linear-gradient(135deg, #ffe27a, #f0b92e);
        color: #07331f;
        font-weight: 900;
        box-shadow: var(--cms-gold-shadow);
        transition: 0.3s ease;
    }

    .btn-create-student:hover {
        transform: translateY(-3px);
        color: #07331f;
        opacity: 0.96;
    }

    .cms-table {
        color: var(--cms-text);
        margin-bottom: 0;
        border-color: var(--cms-border);
    }

    .cms-table thead th {
        background: rgba(245, 200, 75, 0.12);
        color: var(--cms-gold);
        border-color: var(--cms-border);
        font-size: 13px;
        text-transform: uppercase;
        letter-spacing: 0.8px;
        padding: 14px;
        white-space: nowrap;
    }

    .cms-table tbody td {
        background: rgba(255, 255, 255, 0.025);
        color: var(--cms-text);
        border-color: var(--cms-border);
        padding: 14px;
        vertical-align: middle;
    }

    .cms-table tbody tr:hover td {
        background: rgba(255, 255, 255, 0.06);
    }

    .student-avatar-mini {
        width: 36px;
        height: 36px;
        border-radius: 13px;
        display: inline-grid;
        place-items: center;
        background: var(--cms-gold-soft);
        border: 1px solid var(--cms-gold-border);
        color: var(--cms-gold);
        font-weight: 900;
        margin-right: 10px;
        font-size: 13px;
    }

    .status-badge {
        display: inline-flex;
        align-items: center;
        padding: 6px 11px;
        border-radius: 50px;
        font-size: 12px;
        font-weight: 900;
        text-transform: capitalize;
    }

    .status-active {
        background: rgba(29, 191, 115, 0.13);
        color: #9af0bf;
        border: 1px solid rgba(29, 191, 115, 0.25);
    }

    .status-inactive {
        background: rgba(255, 193, 7, 0.13);
        color: #ffe08a;
        border: 1px solid rgba(255, 193, 7, 0.25);
    }

    .status-suspended {
        background: rgba(220, 53, 69, 0.13);
        color: #ffb3bd;
        border: 1px solid rgba(220, 53, 69, 0.25);
    }

    .btn-action-edit,
    .btn-action-delete {
        border-radius: 50px;
        font-weight: 800;
        padding: 7px 13px;
        transition: 0.3s ease;
    }

    .btn-action-edit {
        border: 1px solid var(--cms-gold-border);
        background: var(--cms-gold-soft);
        color: var(--cms-gold);
    }

    .btn-action-edit:hover {
        background: linear-gradient(135deg, #ffe27a, #f0b92e);
        color: #07331f;
        transform: translateY(-2px);
    }

    .btn-action-delete {
        border: 1px solid rgba(220, 53, 69, 0.35);
        background: rgba(220, 53, 69, 0.13);
        color: #ffb3bd;
    }

    .btn-action-delete:hover {
        background: #dc3545;
        color: #fff;
        transform: translateY(-2px);
    }

    .empty-row {
        color: var(--cms-muted) !important;
        padding: 24px !important;
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

    @media (max-width: 991px) {
        .students-hero {
            padding: 22px;
        }

        .students-count-box {
            text-align: left;
        }
    }

    @media (max-width: 575px) {
        .cms-card .card-body {
            padding: 20px;
        }

        .students-title {
            font-size: 30px;
        }
    }
</style>

<div class="container-fluid students-page">

    <?php if (isset($_GET['msg']) && $_GET['msg'] === 'created_and_emailed'): ?>
        <div class="alert alert-success cms-alert">Student created and credentials emailed successfully.</div>
    <?php endif; ?>

    <?php if (isset($_GET['msg']) && $_GET['msg'] === 'created_but_email_failed'): ?>
        <div class="alert alert-warning cms-alert">Student created, but email sending failed.</div>
    <?php endif; ?>

    <?php if (isset($_GET['msg']) && $_GET['msg'] === 'create_failed'): ?>
        <div class="alert alert-danger cms-alert">Student creation failed. Email may already exist.</div>
    <?php endif; ?>

    <?php if (isset($_GET['msg']) && $_GET['msg'] === 'invalid_input'): ?>
        <div class="alert alert-danger cms-alert">Fill all required fields properly.</div>
    <?php endif; ?>

    <?php if (isset($_GET['msg']) && $_GET['msg'] === 'updated'): ?>
        <div class="alert alert-success cms-alert">Student updated successfully.</div>
    <?php endif; ?>

    <?php if (isset($_GET['msg']) && $_GET['msg'] === 'deleted'): ?>
        <div class="alert alert-success cms-alert">Student deleted successfully.</div>
    <?php endif; ?>

    <div class="students-hero">
        <div class="row align-items-center g-4">
            <div class="col-lg-8">
                <div class="students-hero-content">
                    <div class="students-kicker">
                        <span></span>
                        Student Management
                    </div>

                    <h1 class="students-title">Manage Students</h1>

                    <p class="students-subtitle">
                        Create student login accounts, assign departments, manage contact information and control student account status from one place.
                    </p>
                </div>
            </div>

            <div class="col-lg-4">
                <div class="students-count-box">
                    <i class="bi bi-mortarboard-fill d-block"></i>
                    <div class="count-label">Total Students</div>
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
                    Add Student
                </div>

                <div class="card-body">
                    <form action="/college/public/index.php?url=create-user" method="POST">
                        <input type="hidden" name="role_id" value="3">
                        <input type="hidden" name="redirect_to" value="students">

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

                        <button type="submit" class="btn btn-create-student w-100">
                            Create Student
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
                    All Students
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
                                        $initials = strtoupper(substr($user['first_name'] ?? 'S', 0, 1) . substr($user['last_name'] ?? '', 0, 1));
                                        if ($initials === '') {
                                            $initials = 'S';
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
                                            <span class="student-avatar-mini"><?= htmlspecialchars($initials) ?></span>
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
                                            <a href="/college/public/index.php?url=edit-user&id=<?= htmlspecialchars($user['id']) ?>&from=students" class="btn btn-sm btn-action-edit">
                                                <i class="bi bi-pencil-square"></i>
                                                Edit
                                            </a>

                                            <form action="/college/public/index.php?url=delete-user" method="POST" class="d-inline" onsubmit="return confirm('Delete this student?');">
                                                <input type="hidden" name="id" value="<?= htmlspecialchars($user['id']) ?>">
                                                <input type="hidden" name="redirect_to" value="students">

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
                                    <td colspan="7" class="text-center empty-row">No students found.</td>
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