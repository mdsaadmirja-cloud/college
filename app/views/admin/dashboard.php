<?php
$pageTitle = 'Admin Dashboard';
include __DIR__ . '/../layouts/header.php';
include __DIR__ . '/../layouts/sidebar.php';
?>

<style>
/* ── Hero Banner — Slate & Amber ── */
.hero-banner {
    background: linear-gradient(135deg, #f59e0b 0%, #fb923c 55%, #ef4444 100%);
    border-radius: 24px;
    padding: 36px 40px;
    margin-bottom: 28px;
    position: relative;
    overflow: hidden;
    display: flex;
    align-items: center;
    justify-content: space-between;
    gap: 24px;
    box-shadow: 0 12px 40px rgba(245,158,11,0.28);
}
.hero-banner::before {
    content: '';
    position: absolute;
    width: 340px; height: 340px;
    border-radius: 50%;
    background: rgba(255,255,255,0.10);
    top: -100px; right: 120px;
    pointer-events: none;
}
.hero-banner::after {
    content: '';
    position: absolute;
    width: 200px; height: 200px;
    border-radius: 50%;
    background: rgba(255,255,255,0.07);
    bottom: -70px; right: 260px;
    pointer-events: none;
}
.hero-left { flex: 1; position: relative; z-index: 1; }
.hero-pill {
    display: inline-flex;
    align-items: center;
    gap: 6px;
    background: rgba(255,255,255,0.22);
    border: 1px solid rgba(255,255,255,0.38);
    color: #fff;
    font-size: 0.70rem;
    font-weight: 800;
    letter-spacing: 0.12em;
    text-transform: uppercase;
    padding: 5px 16px;
    border-radius: 99px;
    margin-bottom: 16px;
}
.hero-pill::before { content: '•'; font-size: 1rem; }
.hero-title {
    font-size: 2.2rem;
    font-weight: 900;
    color: #fff;
    line-height: 1.15;
    margin-bottom: 12px;
    text-shadow: 0 2px 12px rgba(0,0,0,0.15);
}
.hero-subtitle {
    font-size: 0.95rem;
    color: rgba(255,255,255,0.85);
    max-width: 480px;
    line-height: 1.65;
    margin: 0;
}
.date-card {
    background: #ffffff;
    border-radius: 20px;
    padding: 28px 36px;
    text-align: center;
    box-shadow: 0 8px 28px rgba(0,0,0,0.15);
    min-width: 190px;
    position: relative;
    z-index: 1;
    flex-shrink: 0;
}
.date-card i { font-size: 2rem; color: #f59e0b; display: block; margin-bottom: 10px; }
.date-label  { font-size: 0.75rem; color: #7a7a8a; letter-spacing: 0.08em; text-transform: uppercase; font-weight: 700; margin-bottom: 6px; }
.date-value  { font-size: 1.25rem; font-weight: 900; color: #1a1a2e; margin: 0; }
</style>

<div class="container-fluid">
    <?php if (isset($_GET['msg']) && $_GET['msg'] === 'updated'): ?>
        <div class="alert alert-success">User updated successfully.</div>
    <?php endif; ?>

    <?php if (isset($_GET['msg']) && $_GET['msg'] === 'deleted'): ?>
        <div class="alert alert-success">User deleted successfully.</div>
    <?php endif; ?>

    <!-- Hero Banner -->
    <div class="hero-banner">
        <div class="hero-left">
            <div class="hero-pill">Admin Panel</div>
            <h1 class="hero-title">Welcome to Admin<br>Dashboard</h1>
            <p class="hero-subtitle">Manage users, students, faculty, reports and academic records from one secure dashboard.</p>
        </div>
        <div class="date-card">
            <i class="bi bi-calendar3"></i>
            <div class="date-label">Today</div>
            <p class="date-value"><?= date('d M Y') ?></p>
        </div>
    </div>

    <!-- Stat Cards -->
    <div class="row g-4 mb-4">
        <div class="col-md-3">
            <div class="card stat-card">
                <div class="card-body">
                    <div class="metric-icon"><i class="bi bi-people-fill"></i></div>
                    <div class="metric-label">Total Users</div>
                    <h2 class="metric"><?= htmlspecialchars($totalUsers) ?></h2>
                </div>
            </div>
        </div>

        <div class="col-md-3">
            <div class="card stat-card">
                <div class="card-body">
                    <div class="metric-icon"><i class="bi bi-mortarboard-fill"></i></div>
                    <div class="metric-label">Students</div>
                    <h2 class="metric"><?= htmlspecialchars($totalStudents) ?></h2>
                </div>
            </div>
        </div>

        <div class="col-md-3">
            <div class="card stat-card">
                <div class="card-body">
                    <div class="metric-icon"><i class="bi bi-person-workspace"></i></div>
                    <div class="metric-label">Faculty</div>
                    <h2 class="metric"><?= htmlspecialchars($totalFaculty) ?></h2>
                </div>
            </div>
        </div>

        <div class="col-md-3">
            <div class="card stat-card">
                <div class="card-body">
                    <div class="metric-icon"><i class="bi bi-check-circle-fill"></i></div>
                    <div class="metric-label">Active Users</div>
                    <h2 class="metric"><?= htmlspecialchars($activeUsers) ?></h2>
                </div>
            </div>
        </div>
    </div>

    <!-- Table + Side Panel -->
    <div class="row g-4">
        <div class="col-md-8">
            <div class="card surface-card">
                <div class="card-header">Recent Users</div>
                <div class="card-body table-responsive">
                    <table class="table table-bordered align-middle">
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
                                    <tr>
                                        <td><?= htmlspecialchars($user['id']) ?></td>
                                        <td><?= htmlspecialchars(trim(($user['first_name'] ?? '') . ' ' . ($user['last_name'] ?? ''))) ?></td>
                                        <td><?= htmlspecialchars($user['role_name']) ?></td>
                                        <td><?= htmlspecialchars($user['email']) ?></td>
                                    </tr>
                                <?php endforeach; ?>
                            <?php else: ?>
                                <tr>
                                    <td colspan="4" class="text-center">No users found.</td>
                                </tr>
                            <?php endif; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <div class="col-md-4">
            <div class="card surface-card mb-4">
                <div class="card-header">Quick Actions</div>
                <div class="card-body">
                    <a href="/college/public/index.php?url=students" class="btn btn-primary w-100 mb-2 quick-link">
                        <i class="bi bi-mortarboard-fill"></i> <span>Students</span>
                    </a>
                    <a href="/college/public/index.php?url=faculty" class="btn btn-outline-secondary w-100 mb-2 quick-link">
                        <i class="bi bi-person-workspace"></i> <span>Faculty</span>
                    </a>
                    <button class="btn btn-dark w-100 quick-link">
                        <i class="bi bi-bar-chart-fill"></i> <span>Reports</span>
                    </button>
                </div>
            </div>

            <div class="card surface-card">
                <div class="card-header">Latest Activity</div>
                <div class="card-body">
                    <p class="small-muted mb-2">Admin logged in successfully.</p>
                    <p class="small-muted mb-2">Counts and users are loaded from the database.</p>
                    <p class="small-muted mb-0">Use Students and Faculty pages to manage records.</p>
                </div>
            </div>
        </div>
    </div>
</div>

<?php include __DIR__ . '/../layouts/footer.php'; ?>