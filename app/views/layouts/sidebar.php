<?php
$currentPage = $_GET['url'] ?? 'dashboard';
$role = strtolower($_SESSION['role'] ?? 'admin');
?>

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

            <a href="#"><i class="bi bi-calendar-check-fill"></i><span class="link-text">Attendance</span></a>
            <a href="#"><i class="bi bi-cash-stack"></i><span class="link-text">Fees</span></a>
            <a href="#"><i class="bi bi-card-checklist"></i><span class="link-text">Results</span></a>
            <a href="#"><i class="bi bi-clock-history"></i><span class="link-text">Timetable</span></a>
            <a href="#"><i class="bi bi-bar-chart-fill"></i><span class="link-text">Reports</span></a>
            <a href="#"><i class="bi bi-gear-fill"></i><span class="link-text">Settings</span></a>
        <?php elseif ($role === 'faculty'): ?>
            <a href="#"><i class="bi bi-calendar-check-fill"></i><span class="link-text">Attendance</span></a>
            <a href="#"><i class="bi bi-people-fill"></i><span class="link-text">Students</span></a>
            <a href="#"><i class="bi bi-clock-history"></i><span class="link-text">Timetable</span></a>
            <a href="#"><i class="bi bi-journal-text"></i><span class="link-text">Assignments</span></a>
            <a href="#"><i class="bi bi-card-checklist"></i><span class="link-text">Results</span></a>
        <?php elseif ($role === 'student'): ?>
            <a href="#"><i class="bi bi-calendar-check-fill"></i><span class="link-text">Attendance</span></a>
            <a href="#"><i class="bi bi-card-checklist"></i><span class="link-text">Results</span></a>
            <a href="#"><i class="bi bi-clock-history"></i><span class="link-text">Timetable</span></a>
            <a href="#"><i class="bi bi-cash-stack"></i><span class="link-text">Fees</span></a>
            <a href="#"><i class="bi bi-megaphone-fill"></i><span class="link-text">Notices</span></a>
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
                    aria-expanded="false"
                >
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
            </a>
        </li>
    </ul>
</div>
        </div>

        <main class="page-content">