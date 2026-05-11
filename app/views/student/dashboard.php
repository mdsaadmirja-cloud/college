<?php
$pageTitle = 'Student Dashboard';
include __DIR__ . '/../layouts/header.php';
include __DIR__ . '/../layouts/sidebar.php';
?>

<div class="container-fluid">

    <!-- Welcome Banner -->
    <div class="welcome-banner mb-4">
        <div class="welcome-banner-inner d-flex align-items-center justify-content-between">
            <div>
                <span class="badge-label mb-2 d-inline-block">&#x2022; STUDENT PANEL</span>
                <h1 class="welcome-title">Welcome to Student<br>Dashboard</h1>
                <p class="welcome-subtitle">Track your attendance, results, fees and timetable all in one place.</p>
            </div>
            <div class="date-card text-center">
                <i class="bi bi-calendar3 date-icon"></i>
                <div class="date-label">TODAY</div>
                <div class="date-value"><?php echo date('d M Y'); ?></div>
            </div>
        </div>
    </div>

    <!-- Stat Cards -->
    <div class="row g-4 mb-4">
        <div class="col-md-3 col-sm-6">
            <div class="card stat-card-new">
                <div class="card-body">
                    <div class="stat-icon-wrap mb-3">
                        <i class="bi bi-person-check"></i>
                    </div>
                    <div class="stat-label">ATTENDANCE</div>
                    <div class="stat-value">0%</div>
                </div>
            </div>
        </div>

        <div class="col-md-3 col-sm-6">
            <div class="card stat-card-new">
                <div class="card-body">
                    <div class="stat-icon-wrap mb-3">
                        <i class="bi bi-mortarboard"></i>
                    </div>
                    <div class="stat-label">SEMESTER</div>
                    <div class="stat-value">4</div>
                </div>
            </div>
        </div>

        <div class="col-md-3 col-sm-6">
            <div class="card stat-card-new">
                <div class="card-body">
                    <div class="stat-icon-wrap mb-3">
                        <i class="bi bi-wallet2"></i>
                    </div>
                    <div class="stat-label">PENDING FEES</div>
                    <div class="stat-value">₹0</div>
                </div>
            </div>
        </div>

        <div class="col-md-3 col-sm-6">
            <div class="card stat-card-new">
                <div class="card-body">
                    <div class="stat-icon-wrap mb-3">
                        <i class="bi bi-book-half"></i>
                    </div>
                    <div class="stat-label">SUBJECTS</div>
                    <div class="stat-value">6</div>
                </div>
            </div>
        </div>
    </div>

    <!-- Results + Notices -->
    <div class="row g-4">
        <div class="col-md-8">
            <div class="card stat-card">
                <div class="card-header">Latest Results</div>
                <div class="card-body table-responsive">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>Subject</th>
                                <th>Marks</th>
                                <th>Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>DBMS</td>
                                <td>78</td>
                                <td><span class="badge bg-success">Pass</span></td>
                            </tr>
                            <tr>
                                <td>Java</td>
                                <td>82</td>
                                <td><span class="badge bg-success">Pass</span></td>
                            </tr>
                            <tr>
                                <td>Web Technology</td>
                                <td>80</td>
                                <td><span class="badge bg-success">Pass</span></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <div class="col-md-4">
            <div class="card stat-card mb-4">
                <div class="card-header">Notices</div>
                <div class="card-body">
                    <p class="mb-2">Internal exams start next Monday.</p>
                    <p class="mb-0">Submit fees receipt by month end.</p>
                </div>
            </div>

            <div class="card stat-card">
                <div class="card-header">Today's Timetable</div>
                <div class="card-body">
                    <p class="mb-2">10:00 AM &mdash; DBMS</p>
                    <p class="mb-2">12:00 PM &mdash; Java</p>
                    <p class="mb-0">02:00 PM &mdash; Web Tech</p>
                </div>
            </div>
        </div>
    </div>
</div>

<style>
.welcome-banner {
    background: linear-gradient(135deg, #f59e0b 0%, #fb923c 55%, #ef4444 100%);
    border-radius: 1.25rem;
    padding: 2.5rem;
    position: relative;
    overflow: hidden;
}
.welcome-banner::before {
    content: '';
    position: absolute;
    top: -40px; right: -40px;
    width: 220px; height: 220px;
    background: rgba(255,255,255,0.08);
    border-radius: 50%;
}
.welcome-banner::after {
    content: '';
    position: absolute;
    bottom: -60px; left: 30%;
    width: 300px; height: 300px;
    background: rgba(255,255,255,0.05);
    border-radius: 50%;
}
.badge-label {
    background: rgba(255,255,255,0.22);
    color: #fff;
    border-radius: 2rem;
    padding: 0.3rem 1rem;
    font-size: 0.78rem;
    font-weight: 600;
    letter-spacing: 0.05em;
}
.welcome-title {
    color: #fff;
    font-size: 2rem;
    font-weight: 800;
    line-height: 1.2;
    margin-bottom: 0.5rem;
}
.welcome-subtitle {
    color: rgba(255,255,255,0.85);
    font-size: 0.95rem;
    margin-bottom: 0;
    max-width: 380px;
}
.date-card {
    background: #fff;
    border-radius: 1rem;
    padding: 1.25rem 2rem;
    min-width: 160px;
    position: relative;
    z-index: 1;
    box-shadow: 0 8px 30px rgba(0,0,0,0.12);
}
.date-icon {
    font-size: 1.8rem;
    color: #f97316;
    display: block;
    margin-bottom: 0.4rem;
}
.date-label {
    font-size: 0.72rem;
    font-weight: 700;
    color: #6b7280;
    letter-spacing: 0.08em;
}
.date-value {
    font-size: 1.15rem;
    font-weight: 800;
    color: #1e293b;
}
.stat-card-new {
    border: none;
    border-radius: 1rem;
    box-shadow: 0 2px 12px rgba(0,0,0,0.07);
    transition: transform 0.2s, box-shadow 0.2s;
}
.stat-card-new:hover {
    transform: translateY(-3px);
    box-shadow: 0 8px 24px rgba(0,0,0,0.11);
}
.stat-icon-wrap {
    width: 48px; height: 48px;
    background: #fff3e0;
    border-radius: 12px;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 1.4rem;
    color: #f97316;
}
.stat-label {
    font-size: 0.72rem;
    font-weight: 700;
    color: #6b7280;
    letter-spacing: 0.07em;
    margin-bottom: 0.25rem;
}
.stat-value {
    font-size: 2.2rem;
    font-weight: 800;
    color: #1e293b;
    line-height: 1;
}
</style>

<?php include __DIR__ . '/../layouts/footer.php'; ?>