<?php
$currentPage = $_GET['url'] ?? 'dashboard';
$role = strtolower($_SESSION['role'] ?? 'admin');
?>

<style>
    :root {
        --side-gold:        #f59e0b;
        --side-gold-soft:   rgba(245, 158, 11, 0.12);
        --side-gold-border: rgba(245, 158, 11, 0.28);
        --side-text:        #f5f0e8;
        --side-muted:       rgba(245, 240, 232, 0.60);
        --side-border:      rgba(255, 255, 255, 0.08);
        --side-shadow:      0 24px 70px rgba(0, 0, 0, 0.32);
    }

    .main-wrapper {
        display: flex;
        min-height: 100vh;
        background: #f8f7f4;
    }

    /* ── Sidebar ── */
    .sidebar {
        width: 280px;
        min-height: 100vh;
        position: sticky;
        top: 0;
        align-self: flex-start;
        background: linear-gradient(180deg, #1e2535 0%, #16202e 100%);
        border-right: 1px solid rgba(255,255,255,0.06);
        padding: 20px 14px;
        box-shadow: var(--side-shadow);
        z-index: 1000;
        transition: 0.3s ease;
        overflow-y: auto;
        max-height: 100vh;
    }

    .sidebar-brand {
        height: 66px;
        display: flex;
        align-items: center;
        gap: 12px;
        padding: 0 12px;
        margin-bottom: 18px;
        border-radius: 20px;
        background: var(--side-gold-soft);
        border: 1px solid var(--side-gold-border);
    }

    .sidebar-brand::before {
        content: "C";
        width: 42px;
        height: 42px;
        border-radius: 14px;
        display: grid;
        place-items: center;
        background: linear-gradient(135deg, #fbbf24, #f59e0b);
        color: #1e2535;
        font-weight: 900;
        font-size: 20px;
        flex-shrink: 0;
        box-shadow: 0 6px 20px rgba(245,158,11,0.35);
    }

    .sidebar-brand-text {
        color: var(--side-gold);
        font-size: 18px;
        font-weight: 900;
        letter-spacing: -0.03em;
        white-space: nowrap;
    }

    .sidebar a {
        position: relative;
        display: flex;
        align-items: center;
        gap: 12px;
        min-height: 44px;
        padding: 11px 14px;
        margin-bottom: 6px;
        color: var(--side-muted);
        border-radius: 14px;
        font-size: 14px;
        font-weight: 700;
        text-decoration: none;
        border: 1px solid transparent;
        transition: 0.25s ease;
    }

    .sidebar a i {
        width: 20px;
        font-size: 16px;
        color: var(--side-gold);
        text-align: center;
        flex-shrink: 0;
    }

    .sidebar a:hover {
        color: var(--side-text);
        background: rgba(245,158,11,0.08);
        border-color: var(--side-gold-border);
        transform: translateX(4px);
    }

    .sidebar a.active {
        color: #1e2535;
        background: linear-gradient(135deg, #f59e0b, #fbbf24);
        border-color: transparent;
        box-shadow: 0 6px 20px rgba(245,158,11,0.28);
    }

    .sidebar a.active i { color: #1e2535; }

    .sidebar a.active::before {
        content: "";
        position: absolute;
        left: -14px;
        top: 10px;
        bottom: 10px;
        width: 4px;
        border-radius: 50px;
        background: #f59e0b;
        box-shadow: 0 0 12px rgba(245,158,11,0.70);
    }

    /* Submenu */
    .menu-group { margin-bottom: 6px; }

    .menu-toggle { justify-content: space-between; cursor: pointer; }

    .menu-left { display: flex; align-items: center; gap: 12px; }

    .menu-toggle::after {
        content: "\F282";
        font-family: "bootstrap-icons";
        font-size: 11px;
        color: var(--side-gold);
        transition: 0.3s ease;
    }

    .menu-toggle.active::after { transform: rotate(180deg); }

    .submenu-items { display: none; padding-left: 10px; margin-top: 4px; margin-bottom: 6px; }

    .submenu-items.show {
        display: block;
        animation: submenuFade 0.2s ease both;
    }

    .submenu-items a {
        min-height: 40px;
        font-size: 13px;
        padding: 9px 12px;
        margin-bottom: 4px;
        background: rgba(245,158,11,0.05);
    }

    /* Logout */
    .sidebar a[href*="logout"] {
        margin-top: 14px;
        color: #fca5a5;
        background: rgba(220,53,69,0.08);
        border-color: rgba(220,53,69,0.16);
    }

    .sidebar a[href*="logout"] i { color: #fca5a5; }

    .sidebar a[href*="logout"]:hover {
        background: rgba(220,53,69,0.15);
        border-color: rgba(220,53,69,0.28);
        color: #fecaca;
        transform: none;
    }

    /* ── Content ── */
    .content-area {
        flex: 1;
        min-width: 0;
        background: #f8f7f4;
        display: flex;
        flex-direction: column;
    }

    /* ── Topbar ── */
    .topbar {
        position: sticky;
        top: 0;
        z-index: 900;
        min-height: 72px;
        padding: 16px 24px;
        background: rgba(248,247,244,0.94);
        backdrop-filter: blur(16px);
        border-bottom: 1px solid #e8e4dc;
    }

    .topbar h5 { color: #1a1a2e; font-weight: 900; letter-spacing: -0.02em; }

    .topbar small,
    .topbar .text-muted { color: #7a7a8a !important; font-weight: 600; }

    .toggle-btn {
        width: 44px;
        height: 44px;
        border-radius: 14px;
        border: 1px solid rgba(245,158,11,0.28);
        background: #fff8ee;
        color: #d97706;
        display: grid;
        place-items: center;
        font-size: 20px;
        transition: 0.25s ease;
        cursor: pointer;
    }

    .toggle-btn:hover {
        background: linear-gradient(135deg, #f59e0b, #fbbf24);
        color: #1e2535;
        border-color: transparent;
        transform: translateY(-2px);
    }

    .admin-menu-btn {
        background: #fff8ee !important;
        border: 1px solid rgba(245,158,11,0.28) !important;
        color: #d97706 !important;
        border-radius: 50px;
        padding: 10px 18px;
        font-weight: 700;
        transition: 0.25s ease;
    }

    .admin-menu-btn:hover {
        background: #f59e0b !important;
        color: #1e2535 !important;
    }

    .dropdown-menu {
        background: #ffffff;
        border: 1px solid #e8e4dc;
        border-radius: 14px;
        box-shadow: 0 12px 32px rgba(30,37,53,0.12);
        padding: 8px;
    }

    .dropdown-item {
        color: #1a1a2e;
        border-radius: 8px;
        font-weight: 600;
        padding: 10px 12px;
    }

    .dropdown-item:hover { background: #fff8ee; color: #d97706; }
    .dropdown-item.text-danger { color: #dc2626 !important; }
    .dropdown-item.text-danger:hover { background: #fef2f2 !important; }

    .page-content { padding: 28px; flex: 1; }

    /* ── Collapsed ── */
    body.sidebar-collapsed .sidebar { width: 82px; }
    body.sidebar-collapsed .sidebar-brand { justify-content: center; padding: 0; }
    body.sidebar-collapsed .sidebar-brand-text,
    body.sidebar-collapsed .link-text { display: none; }
    body.sidebar-collapsed .sidebar a { justify-content: center; padding: 12px; }
    body.sidebar-collapsed .sidebar a.active::before { left: -14px; }
    body.sidebar-collapsed .menu-toggle::after { display: none; }
    body.sidebar-collapsed .submenu-items { padding-left: 0; }

    /* ── Mobile ── */
    @media (max-width: 991px) {
        .main-wrapper { display: block; }

        .sidebar {
            position: fixed;
            left: -290px;
            top: 0;
            height: 100vh;
            width: 280px;
            transition: 0.3s ease;
        }

        body.sidebar-open .sidebar { left: 0; }
        body.sidebar-collapsed .sidebar { width: 280px; }
        body.sidebar-collapsed .sidebar-brand-text,
        body.sidebar-collapsed .link-text { display: inline; }
        body.sidebar-collapsed .sidebar a { justify-content: flex-start; }

        .content-area { width: 100%; }
        .topbar { padding: 14px 16px; }
        .page-content { padding: 16px; }
    }

    @keyframes submenuFade {
        from { opacity: 0; transform: translateY(-6px); }
        to   { opacity: 1; transform: translateY(0); }
    }
</style>

<div class="main-wrapper">
    <aside class="sidebar" id="appSidebar">
        <div class="sidebar-brand">
            <span class="sidebar-brand-text">CMS PORTAL</span>
        </div>

        <a href="/college/public/index.php?url=dashboard" class="<?= $currentPage === 'dashboard' ? 'active' : '' ?>">
            <i class="bi bi-house-door-fill"></i>
            <span class="link-text">Dashboard</span>
        </a>

        <a href="/college/public/index.php?url=profile" class="<?= $currentPage === 'profile' ? 'active' : '' ?>">
            <i class="bi bi-person-circle"></i>
            <span class="link-text">Profile</span>
        </a>

        <?php if ($role === 'admin'): ?>
            <a href="/college/public/index.php?url=students" class="<?= $currentPage === 'students' ? 'active' : '' ?>">
                <i class="bi bi-mortarboard-fill"></i>
                <span class="link-text">Students</span>
            </a>

            <a href="/college/public/index.php?url=faculty" class="<?= $currentPage === 'faculty' ? 'active' : '' ?>">
                <i class="bi bi-person-workspace"></i>
                <span class="link-text">Faculty</span>
            </a>


            <?php $reportsOpen = ($currentPage === 'student-performance' || $currentPage === 'reports'); ?>
            <div class="menu-group">
                <a href="javascript:void(0);"
                    class="menu-toggle <?= $reportsOpen ? 'active' : '' ?>"
                    onclick="toggleReportsMenu(event)">
                    <span class="menu-left">
                        <i class="bi bi-bar-chart-fill"></i>
                        <span class="link-text">Reports</span>
                    </span>
                </a>
                <div class="submenu-items <?= $reportsOpen ? 'show' : '' ?>" id="reportsSubmenu">
                    <a href="/college/public/index.php?url=student-performance"
                        class="<?= $currentPage === 'student-performance' ? 'active' : '' ?>">
                        <i class="bi bi-graph-up-arrow"></i>
                        <span class="link-text">Student Performance</span>
                    </a>
                </div>
            </div>

            <a href="#"><i class="bi bi-gear-fill"></i><span class="link-text">Settings</span></a>

        <?php elseif ($role === 'faculty'): ?>
            <a href="/college/public/index.php?url=student-performance"
                class="<?= $currentPage === 'student-performance' ? 'active' : '' ?>">
                <i class="bi bi-graph-up-arrow"></i>
                <span class="link-text">Student Performance</span>
            </a>
            

        <?php elseif ($role === 'student'): ?>
            <a href="/college/public/index.php?url=student-performance"
                class="<?= $currentPage === 'student-performance' ? 'active' : '' ?>">
                <i class="bi bi-graph-up-arrow"></i>
                <span class="link-text">My Performance</span>
            </a>
           
        <?php endif; ?>

        <a href="/college/public/index.php?url=logout">
            <i class="bi bi-box-arrow-right"></i>
            <span class="link-text">Logout</span>
        </a>
    </aside>

    <div class="content-area">
        <div class="topbar d-flex justify-content-between align-items-center">
            <div class="d-flex align-items: center; gap-3">
                <button class="toggle-btn btn" id="sidebarToggle" type="button" aria-label="Toggle sidebar">
                    <i class="bi bi-list"></i>
                </button>
                <div>
                    <h5 class="mb-0"><?= htmlspecialchars($pageTitle ?? 'Dashboard') ?></h5>
                    <small class="text-muted">Welcome, <?= htmlspecialchars($_SESSION['user_name'] ?? 'User') ?></small>
                </div>
            </div>

            <div class="dropdown">
                <button class="btn admin-menu-btn dropdown-toggle" type="button"
                    id="adminDropdown" data-bs-toggle="dropdown" aria-expanded="false">
                    <i class="bi bi-person-fill me-1"></i>
                    <?= htmlspecialchars($_SESSION['role'] ?? 'User') ?>
                </button>
                <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="adminDropdown">
                    <li>
                        <a class="dropdown-item" href="/college/public/index.php?url=profile">
                            <i class="bi bi-person-circle me-2"></i> Profile
                        </a>
                    </li>
                    <li><hr class="dropdown-divider"></li>
                    <li>
                        <a class="dropdown-item text-danger" href="/college/public/index.php?url=logout">
                            <i class="bi bi-box-arrow-right me-2"></i> Logout
                        </a>
                    </li>
                </ul>
            </div>
        </div>

        <main class="page-content">

        <script>
        function toggleReportsMenu(e) {
            e.preventDefault();
            const btn = e.currentTarget;
            const submenu = document.getElementById('reportsSubmenu');
            btn.classList.toggle('active');
            if (submenu) submenu.classList.toggle('show');
        }
        </script>