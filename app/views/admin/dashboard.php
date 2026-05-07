<?php
$pageTitle = 'Admin Dashboard';
include __DIR__ . '/../layouts/header.php';
include __DIR__ . '/../layouts/sidebar.php';
?>

<style>
    :root {
        --cms-bg: #052017;
        --cms-card: rgba(5, 32, 23, 0.78);
        --cms-card-2: rgba(255, 255, 255, 0.055);
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

    .admin-dashboard-page {
        position: relative;
        min-height: calc(100vh - 70px);
        padding: 10px 4px 30px;
        color: var(--cms-text);
    }

    .dashboard-hero {
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

    .dashboard-hero::before {
        content: "";
        position: absolute;
        inset: 0;
        background-image: url("data:image/svg+xml,%3Csvg viewBox='0 0 200 200' xmlns='http://www.w3.org/2000/svg'%3E%3Cfilter id='n'%3E%3CfeTurbulence type='fractalNoise' baseFrequency='0.8' numOctaves='2'/%3E%3C/filter%3E%3Crect width='100%25' height='100%25' filter='url(%23n)' opacity='0.20'/%3E%3C/svg%3E");
        opacity: 0.10;
        pointer-events: none;
    }

    .dashboard-hero-content {
        position: relative;
        z-index: 2;
    }

    .dashboard-kicker {
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

    .dashboard-kicker span {
        width: 7px;
        height: 7px;
        border-radius: 50%;
        background: var(--cms-gold);
        box-shadow: 0 0 18px var(--cms-gold);
    }

    .dashboard-title {
        font-family: Georgia, 'Times New Roman', serif;
        font-size: clamp(30px, 4vw, 46px);
        font-weight: 900;
        margin-bottom: 8px;
        letter-spacing: -0.03em;
    }

    .dashboard-subtitle {
        color: var(--cms-muted);
        max-width: 700px;
        margin-bottom: 0;
        line-height: 1.7;
    }

    .dashboard-date-box {
        position: relative;
        z-index: 2;
        background: rgba(255, 255, 255, 0.06);
        border: 1px solid var(--cms-border);
        border-radius: 22px;
        padding: 18px;
        text-align: center;
        backdrop-filter: blur(16px);
    }

    .dashboard-date-box i {
        color: var(--cms-gold);
        font-size: 28px;
        margin-bottom: 6px;
    }

    .dashboard-date-box .date-label {
        color: var(--cms-muted);
        font-size: 13px;
    }

    .dashboard-date-box .date-value {
        color: var(--cms-text);
        font-weight: 800;
        font-size: 15px;
    }

    .cms-alert {
        border-radius: 18px;
        border: 1px solid rgba(25, 135, 84, 0.25);
        background: rgba(25, 135, 84, 0.12);
        color: #9af0bf;
        font-weight: 700;
    }

    .stat-card {
        position: relative;
        overflow: hidden;
        border: 1px solid var(--cms-border);
        border-radius: 26px;
        background:
            radial-gradient(circle at top right, rgba(245, 200, 75, 0.13), transparent 36%),
            var(--cms-card);
        color: var(--cms-text);
        box-shadow: var(--cms-shadow);
        transition: 0.32s ease;
        height: 100%;
    }

    .stat-card:hover {
        transform: translateY(-6px);
        border-color: var(--cms-gold-border);
        box-shadow: var(--cms-gold-shadow);
    }

    .stat-card .card-body {
        padding: 24px;
    }

    .metric-icon {
        width: 52px;
        height: 52px;
        border-radius: 18px;
        display: grid;
        place-items: center;
        background: linear-gradient(135deg, #ffe27a, #f0b92e);
        color: #07331f;
        font-size: 24px;
        margin-bottom: 18px;
        box-shadow: var(--cms-gold-shadow);
    }

    .metric-label {
        color: var(--cms-muted);
        font-size: 13px;
        font-weight: 800;
        text-transform: uppercase;
        letter-spacing: 1.2px;
        margin-bottom: 5px;
    }

    .metric {
        color: var(--cms-text);
        font-size: 36px;
        font-weight: 900;
        margin: 0;
    }

    .metric-trend {
        margin-top: 10px;
        display: inline-flex;
        align-items: center;
        gap: 5px;
        color: #9af0bf;
        font-size: 13px;
        font-weight: 700;
    }

    .surface-card {
        border: 1px solid var(--cms-border);
        border-radius: 26px;
        background: var(--cms-card);
        color: var(--cms-text);
        box-shadow: var(--cms-shadow);
        overflow: hidden;
    }

    .surface-card .card-header {
        background:
            linear-gradient(135deg, rgba(245, 200, 75, 0.13), rgba(255, 255, 255, 0.03));
        border-bottom: 1px solid var(--cms-border);
        color: var(--cms-text);
        font-weight: 900;
        padding: 18px 22px;
        display: flex;
        align-items: center;
        justify-content: space-between;
    }

    .surface-card .card-header span {
        color: var(--cms-muted);
        font-size: 13px;
        font-weight: 600;
    }

    .surface-card .card-body {
        padding: 22px;
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
        background: rgba(0, 0, 0, 0.03);
        color: var(--cms-text);
        border-color: var(--cms-border);
        padding: 14px;
        vertical-align: middle;
    }

    .cms-table tbody tr:hover td {
        border-color: var(--cms-gold-border);
        background: rgb(41, 46, 16);
        color: var(--cms-gold);
        
    }

    .user-avatar-mini {
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

    .role-badge {
        display: inline-flex;
        align-items: center;
        padding: 6px 11px;
        border-radius: 50px;
        background: rgba(29, 191, 115, 0.13);
        color: #9af0bf;
        border: 1px solid rgba(29, 191, 115, 0.23);
        font-size: 12px;
        font-weight: 800;
    }

    .quick-link {
        height: 50px;
        border-radius: 16px;
        display: flex;
        align-items: center;
        justify-content: center;
        gap: 10px;
        font-weight: 800;
        transition: 0.3s ease;
    }

    .quick-link.btn-primary {
        border: none;
        background: linear-gradient(135deg, #ffe27a, #f0b92e);
        color: #07331f;
        box-shadow: var(--cms-gold-shadow);
    }

    .quick-link.btn-primary:hover {
        color: #07331f;
        transform: translateY(-3px);
        opacity: 0.96;
    }

    .quick-link.btn-outline-secondary {
        border: 1px solid var(--cms-border);
        color: var(--cms-text);
        background: rgba(255, 255, 255, 0.045);
    }

    .quick-link.btn-outline-secondary:hover {
        border-color: var(--cms-gold-border);
        background: var(--cms-gold-soft);
        color: var(--cms-gold);
        transform: translateY(-3px);
    }

    .activity-list {
        position: relative;
    }

    .activity-item {
        display: flex;
        gap: 12px;
        padding: 12px 0;
        border-bottom: 1px solid var(--cms-border);
    }

    .activity-item:last-child {
        border-bottom: none;
        padding-bottom: 0;
    }

    .activity-dot {
        width: 10px;
        height: 10px;
        border-radius: 50%;
        background: var(--cms-gold);
        margin-top: 7px;
        box-shadow: 0 0 14px rgba(245, 200, 75, 0.75);
        flex-shrink: 0;
    }

    .small-muted {
        color: var(--cms-muted);
        font-size: 14px;
        line-height: 1.6;
    }

    .empty-row {
        color: var(--cms-muted) !important;
        padding: 24px !important;
    }

    .dashboard-fade {
        animation: dashboardFade 0.7s ease both;
    }

    @keyframes dashboardFade {
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
        .dashboard-hero {
            padding: 22px;
        }

        .surface-card .card-header {
            flex-direction: column;
            gap: 5px;
            align-items: flex-start;
        }

        .metric {
            font-size: 30px;
        }
    }
</style>

<div class="container-fluid admin-dashboard-page dashboard-fade">

    <?php if (isset($_GET['msg']) && $_GET['msg'] === 'updated'): ?>
        <div class="alert cms-alert">User updated successfully.</div>
    <?php endif; ?>

    <?php if (isset($_GET['msg']) && $_GET['msg'] === 'deleted'): ?>
        <div class="alert cms-alert">User deleted successfully.</div>
    <?php endif; ?>

    <div class="dashboard-hero">
        <div class="row align-items-center g-4">
            <div class="col-lg-8">
                <div class="dashboard-hero-content">
                    <div class="dashboard-kicker">
                        <span></span>
                        Admin Panel
                    </div>
                    <h1 class="dashboard-title">Welcome to Admin Dashboard</h1>
                    <p class="dashboard-subtitle">
                        Manage users, students, faculty, reports and academic records from one secure dashboard.
                    </p>
                </div>
            </div>

            <div class="col-lg-4">
                <div class="dashboard-date-box">
                    <i class="bi bi-calendar2-week-fill"></i>
                    <div class="date-label">Today</div>
                    <div class="date-value"><?= date('d M Y') ?></div>
                </div>
            </div>
        </div>
    </div>

    <div class="row g-4 mb-4">
        <div class="col-md-6 col-xl-3">
            <div class="card stat-card">
                <div class="card-body">
                    <div class="metric-icon">
                        <i class="bi bi-people-fill"></i>
                    </div>
                    <div class="metric-label">Total Users</div>
                    <h2 class="metric"><?= htmlspecialchars($totalUsers) ?></h2>
                    <div class="metric-trend">
                        <i class="bi bi-arrow-up-right"></i>
                        Live database count
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-6 col-xl-3">
            <div class="card stat-card">
                <div class="card-body">
                    <div class="metric-icon">
                        <i class="bi bi-mortarboard-fill"></i>
                    </div>
                    <div class="metric-label">Students</div>
                    <h2 class="metric"><?= htmlspecialchars($totalStudents) ?></h2>
                    <div class="metric-trend">
                        <i class="bi bi-person-check-fill"></i>
                        Student records
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-6 col-xl-3">
            <div class="card stat-card">
                <div class="card-body">
                    <div class="metric-icon">
                        <i class="bi bi-person-workspace"></i>
                    </div>
                    <div class="metric-label">Faculty</div>
                    <h2 class="metric"><?= htmlspecialchars($totalFaculty) ?></h2>
                    <div class="metric-trend">
                        <i class="bi bi-briefcase-fill"></i>
                        Faculty accounts
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-6 col-xl-3">
            <div class="card stat-card">
                <div class="card-body">
                    <div class="metric-icon">
                        <i class="bi bi-check-circle-fill"></i>
                    </div>
                    <div class="metric-label">Active Users</div>
                    <h2 class="metric"><?= htmlspecialchars($activeUsers) ?></h2>
                    <div class="metric-trend">
                        <i class="bi bi-shield-check"></i>
                        Active accounts
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row g-4">
        <div class="col-xl-8">
            <div class="card surface-card">
                <div class="card-header">
                    <div>
                        <i class="bi bi-clock-history me-2 text-warning"></i>
                        Recent Users
                    </div>
                    <span>Latest registered users</span>
                </div>

                <div class="card-body table-responsive">
                    <table class="table table-bordered align-middle cms-table">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Name</th>
                                <th>Role</th>
                                <th>Email</th>
                            </tr>
                        </thead>

                        <tbody>
                            <?php if (!empty($recentUsers)): ?>
                                <?php foreach ($recentUsers as $user): ?>
                                    <?php
                                    $fullName = trim(($user['first_name'] ?? '') . ' ' . ($user['last_name'] ?? ''));
                                    $initials = strtoupper(substr($user['first_name'] ?? 'U', 0, 1) . substr($user['last_name'] ?? '', 0, 1));
                                    if ($initials === '') {
                                        $initials = 'U';
                                    }
                                    ?>
                                    <tr>
                                        <td><?= htmlspecialchars($user['id']) ?></td>
                                        <td>
                                            <span class="user-avatar-mini"><?= htmlspecialchars($initials) ?></span>
                                            <?= htmlspecialchars($fullName) ?>
                                        </td>
                                        <td>
                                            <span class="role-badge">
                                                <?= htmlspecialchars($user['role_name']) ?>
                                            </span>
                                        </td>
                                        <td><?= htmlspecialchars($user['email']) ?></td>
                                    </tr>
                                <?php endforeach; ?>
                            <?php else: ?>
                                <tr>
                                    <td colspan="4" class="text-center empty-row">No users found.</td>
                                </tr>
                            <?php endif; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <div class="col-xl-4">
            <div class="card surface-card mb-4">
                <div class="card-header">
                    <div>
                        <i class="bi bi-lightning-charge-fill me-2 text-warning"></i>
                        Quick Actions
                    </div>
                    <span>Admin shortcuts</span>
                </div>

                <div class="card-body">
                    <a href="/college/public/index.php?url=students" class="btn btn-primary w-100 mb-2 quick-link">
                        <i class="bi bi-mortarboard-fill"></i>
                        <span>Students</span>
                    </a>

                    <a href="/college/public/index.php?url=faculty" class="btn btn-outline-secondary w-100 mb-2 quick-link">
                        <i class="bi bi-person-workspace"></i>
                        <span>Faculty</span>
                    </a>

                    <button class="btn btn-outline-secondary w-100 quick-link">
                        <i class="bi bi-bar-chart-fill"></i>
                        <span>Reports</span>
                    </button>
                </div>
            </div>

            <div class="card surface-card">
                <div class="card-header">
                    <div>
                        <i class="bi bi-activity me-2 text-warning"></i>
                        Latest Activity
                    </div>
                    <span>System status</span>
                </div>

                <div class="card-body">
                    <div class="activity-list">
                        <div class="activity-item">
                            <div class="activity-dot"></div>
                            <p class="small-muted mb-0">Admin logged in successfully.</p>
                        </div>

                        <div class="activity-item">
                            <div class="activity-dot"></div>
                            <p class="small-muted mb-0">Counts and users are loaded from the database.</p>
                        </div>

                        <div class="activity-item">
                            <div class="activity-dot"></div>
                            <p class="small-muted mb-0">Use Students and Faculty pages to manage records.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>

<?php include __DIR__ . '/../layouts/footer.php'; ?>