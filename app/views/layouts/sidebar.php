<?php
$currentPage = $_GET['url'] ?? 'dashboard';
$role = strtolower($_SESSION['role'] ?? 'admin');
?>

<style>
    :root {
        --side-bg: #03140f;
        --side-bg-2: #052017;
        --side-card: rgba(255, 255, 255, 0.055);
        --side-border: rgba(255, 255, 255, 0.10);
        --side-text: #fff8e7;
        --side-muted: rgba(255, 248, 231, 0.65);
        --side-gold: #f5c84b;
        --side-gold-soft: rgba(245, 200, 75, 0.15);
        --side-gold-border: rgba(245, 200, 75, 0.28);
        --side-green: #1dbf73;
        --side-shadow: 0 24px 70px rgba(0, 0, 0, 0.38);
    }

    .main-wrapper {
        display: flex;
        min-height: 100vh;
        background:
            radial-gradient(circle at 15% 15%, rgba(29, 191, 115, 0.10), transparent 30%),
            radial-gradient(circle at 85% 20%, rgba(245, 200, 75, 0.08), transparent 28%),
            linear-gradient(135deg, #052017, #03140f);
    }

    .sidebar {
        width: 280px;
        min-height: 100vh;
        position: sticky;
        top: 0;
        align-self: flex-start;
        background:
            radial-gradient(circle at top left, rgba(245, 200, 75, 0.11), transparent 32%),
            linear-gradient(180deg, #052017, #03140f);
        border-right: 1px solid var(--side-border);
        padding: 20px 14px;
        box-shadow: var(--side-shadow);
        z-index: 1000;
        transition: 0.3s ease;
        overflow-y: auto;
    }

    .sidebar-brand {
        height: 66px;
        display: flex;
        align-items: center;
        gap: 12px;
        padding: 0 12px;
        margin-bottom: 18px;
        border-radius: 22px;
        background: rgba(255, 255, 255, 0.045);
        border: 1px solid var(--side-border);
    }

    .sidebar-brand::before {
        content: "C";
        width: 42px;
        height: 42px;
        border-radius: 16px;
        display: grid;
        place-items: center;
        background: linear-gradient(135deg, #ffe27a, #f0b92e);
        color: #07331f;
        font-family: Georgia, 'Times New Roman', serif;
        font-weight: 900;
        box-shadow: 0 16px 38px rgba(245, 200, 75, 0.22);
        flex-shrink: 0;
    }

    .sidebar-brand-text {
        color: var(--side-gold);
        font-family: Georgia, 'Times New Roman', serif;
        font-size: 22px;
        font-weight: 900;
        letter-spacing: -0.03em;
        white-space: nowrap;
    }

    .sidebar-brand-icon {
        color: var(--side-gold);
        font-weight: 900;
    }

    .sidebar a {
        position: relative;
        display: flex;
        align-items: center;
        gap: 12px;
        min-height: 46px;
        padding: 12px 14px;
        margin-bottom: 7px;
        color: var(--side-muted);
        border-radius: 16px;
        font-size: 14px;
        font-weight: 700;
        text-decoration: none;
        border: 1px solid transparent;
        transition: 0.28s ease;
    }

    .sidebar a i {
        width: 22px;
        font-size: 17px;
        color: var(--side-gold);
        text-align: center;
        flex-shrink: 0;
    }

    .sidebar a:hover {
        color: var(--side-text);
        background: rgba(255, 255, 255, 0.06);
        border-color: var(--side-border);
        transform: translateX(4px);
    }

    .sidebar a.active {
        color: var(--side-text);
        background: linear-gradient(135deg, rgba(245, 200, 75, 0.20), rgba(255, 255, 255, 0.055));
        border-color: var(--side-gold-border);
        box-shadow: 0 14px 38px rgba(245, 200, 75, 0.10);
    }

    .sidebar a.active::before {
        content: "";
        position: absolute;
        left: -14px;
        top: 12px;
        bottom: 12px;
        width: 4px;
        border-radius: 50px;
        background: var(--side-gold);
        box-shadow: 0 0 16px rgba(245, 200, 75, 0.70);
    }

    .menu-group {
        margin-bottom: 7px;
    }

    .menu-toggle {
        justify-content: space-between;
        cursor: pointer;
    }

    .menu-left {
        display: flex;
        align-items: center;
        gap: 12px;
    }

    .menu-toggle::after {
        content: "\F282";
        font-family: "bootstrap-icons";
        font-size: 12px;
        color: var(--side-gold);
        transition: 0.3s ease;
    }

    .menu-toggle.active::after {
        transform: rotate(180deg);
    }

    .submenu-items {
        display: none;
        padding-left: 12px;
        margin-top: 4px;
        margin-bottom: 8px;
    }

    .submenu-items.show {
        display: block;
        animation: submenuFade 0.25s ease both;
    }

    .submenu-items a {
        min-height: 42px;
        font-size: 13px;
        padding: 10px 12px;
        margin-bottom: 6px;
        background: rgba(255, 255, 255, 0.035);
    }

    .submenu-items a i {
        font-size: 15px;
    }

    .sidebar a[href*="logout"] {
        margin-top: 14px;
        color: #ffb3bd;
        background: rgba(220, 53, 69, 0.08);
        border-color: rgba(220, 53, 69, 0.16);
    }

    .sidebar a[href*="logout"] i {
        color: #ffb3bd;
    }

    .sidebar a[href*="logout"]:hover {
        background: rgba(220, 53, 69, 0.15);
        border-color: rgba(220, 53, 69, 0.30);
        color: #ffd5da;
    }

    .content-area {
        flex: 1;
        min-width: 0;
        background:
            radial-gradient(circle at 80% 0%, rgba(245, 200, 75, 0.055), transparent 30%),
            radial-gradient(circle at 10% 40%, rgba(29, 191, 115, 0.055), transparent 28%),
            #061811;
    }

    .topbar {
        position: sticky;
        top: 0;
        z-index: 900;
        min-height: 78px;
        padding: 16px 24px;
        background: rgba(3, 20, 15, 0.86);
        backdrop-filter: blur(18px);
        border-bottom: 1px solid var(--side-border);
        color: var(--side-text);
    }

    .toggle-btn {
        width: 44px;
        height: 44px;
        border-radius: 15px;
        border: 1px solid var(--side-gold-border);
        background: var(--side-gold-soft);
        color: var(--side-gold);
        display: grid;
        place-items: center;
        font-size: 22px;
        transition: 0.3s ease;
    }

    .toggle-btn:hover {
        background: linear-gradient(135deg, #ffe27a, #f0b92e);
        color: #07331f;
        transform: translateY(-2px);
    }

    .topbar h5 {
        color: var(--side-text);
        font-weight: 900;
        letter-spacing: -0.02em;
    }

    .topbar small,
    .topbar .text-muted {
        color: var(--side-muted) !important;
        font-weight: 600;
    }

    .admin-menu-btn {
        border-radius: 50px;
        border: 1px solid var(--side-gold-border);
        background: var(--side-gold-soft) !important;
        color: var(--side-gold) !important;
        font-weight: 800;
        padding: 10px 18px;
        transition: 0.3s ease;
    }

    .admin-menu-btn:hover,
    .admin-menu-btn:focus {
        background: linear-gradient(135deg, #ffe27a, #f0b92e) !important;
        color: #07331f !important;
        border-color: var(--side-gold-border);
        box-shadow: none;
    }

    .dropdown-menu {
        background: #052017;
        border: 1px solid var(--side-border);
        border-radius: 18px;
        box-shadow: var(--side-shadow);
        padding: 10px;
    }

    .dropdown-item {
        color: var(--side-text);
        border-radius: 12px;
        font-weight: 700;
        padding: 10px 12px;
    }

    .dropdown-item:hover {
        background: var(--side-gold-soft);
        color: var(--side-gold);
    }

    .dropdown-item.text-danger {
        color: #ffb3bd !important;
    }

    .dropdown-item.text-danger:hover {
        background: rgba(220, 53, 69, 0.14);
        color: #ffd5da !important;
    }

    .page-content {
        padding: 24px;
    }

    body.sidebar-collapsed .sidebar {
        width: 88px;
    }

    body.sidebar-collapsed .sidebar-brand {
        justify-content: center;
        padding: 0;
    }

    body.sidebar-collapsed .sidebar-brand-text,
    body.sidebar-collapsed .link-text {
        display: none;
    }

    body.sidebar-collapsed .sidebar a {
        justify-content: center;
        padding: 12px;
    }

    body.sidebar-collapsed .sidebar a.active::before {
        left: -14px;
    }

    body.sidebar-collapsed .menu-toggle::after {
        display: none;
    }

    body.sidebar-collapsed .submenu-items {
        padding-left: 0;
    }

    @keyframes submenuFade {
        from {
            opacity: 0;
            transform: translateY(-6px);
        }

        to {
            opacity: 1;
            transform: translateY(0);
        }
    }

    @media (max-width: 991px) {
        .main-wrapper {
            display: block;
        }

        .sidebar {
            position: fixed;
            left: -290px;
            top: 0;
            height: 100vh;
            width: 280px;
            transition: 0.3s ease;
        }

        body.sidebar-open .sidebar {
            left: 0;
        }

        body.sidebar-collapsed .sidebar {
            width: 280px;
        }

        body.sidebar-collapsed .sidebar-brand-text,
        body.sidebar-collapsed .link-text {
            display: inline;
        }

        body.sidebar-collapsed .sidebar a {
            justify-content: flex-start;
        }

        .content-area {
            width: 100%;
        }

        .topbar {
            padding: 14px 16px;
        }

        .page-content {
            padding: 16px;
        }
    }

    @media (max-width: 575px) {
        .topbar {
            align-items: flex-start !important;
            gap: 12px;
        }

        .admin-menu-btn {
            padding: 8px 14px;
            font-size: 13px;
        }
    }
</style>

<div class="main-wrapper">
    <aside class="sidebar">
        <div class="sidebar-brand">
            <span class="sidebar-brand-text">College CMS</span>
            <span class="sidebar-brand-icon d-none">C</span>
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
                        <span class="link-text">Student Performance Tracking</span>
                    </a>
                </div>
            </div>

            <a href="#">
                <i class="bi bi-gear-fill"></i>
                <span class="link-text">Settings</span>
            </a>

        <?php elseif ($role === 'faculty'): ?>
            <a href="/college/public/index.php?url=student-performance"
                class="<?= $currentPage === 'student-performance' ? 'active' : '' ?>">
                <i class="bi bi-graph-up-arrow"></i>
                <span class="link-text">Student Performance Tracking</span>
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
            <div class="d-flex align-items-center gap-3">
                <button class="toggle-btn" id="sidebarToggle" type="button">
                    <i class="bi bi-list"></i>
                </button>

                <div>
                    <h5 class="mb-0"><?= htmlspecialchars($pageTitle ?? 'Dashboard') ?></h5>
                    <small class="text-muted">Welcome, <?= htmlspecialchars($_SESSION['user_name'] ?? 'User') ?></small>
                </div>
            </div>

            <div class="dropdown">
                <button
                    class="btn btn-dark dropdown-toggle admin-menu-btn"
                    type="button"
                    id="adminDropdown"
                    data-bs-toggle="dropdown"
                    aria-expanded="false">
                    <?= htmlspecialchars($_SESSION['role'] ?? 'User') ?>
                </button>

                <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="adminDropdown">
                    <li>
                        <a class="dropdown-item" href="/college/public/index.php?url=profile">
                            <i class="bi bi-person-circle me-2"></i> Profile
                        </a>
                    </li>
                    <li>
                        <a class="dropdown-item text-danger" href="/college/public/index.php?url=logout">
                            <i class="bi bi-box-arrow-right me-2"></i> Logout
                        </a>
                    </li>
                </ul>
            </div>
        </div>

        <main class="page-content">

