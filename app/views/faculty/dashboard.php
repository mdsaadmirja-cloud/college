<?php
$pageTitle = 'Faculty Dashboard';
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

    .faculty-dashboard-page {
        position: relative;
        min-height: calc(100vh - 70px);
        padding: 10px 4px 30px;
        color: var(--cms-text);
        animation: pageFade 0.7s ease both;
    }

    .faculty-dashboard-hero {
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

    .faculty-dashboard-hero::before {
        content: "";
        position: absolute;
        inset: 0;
        background-image: url("data:image/svg+xml,%3Csvg viewBox='0 0 200 200' xmlns='http://www.w3.org/2000/svg'%3E%3Cfilter id='n'%3E%3CfeTurbulence type='fractalNoise' baseFrequency='0.8' numOctaves='2'/%3E%3C/filter%3E%3Crect width='100%25' height='100%25' filter='url(%23n)' opacity='0.20'/%3E%3C/svg%3E");
        opacity: 0.10;
        pointer-events: none;
    }

    .faculty-dashboard-hero-content {
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
        max-width: 720px;
        margin-bottom: 0;
        line-height: 1.7;
    }

    .today-box {
        position: relative;
        z-index: 2;
        background: rgba(255, 255, 255, 0.06);
        border: 1px solid var(--cms-border);
        border-radius: 22px;
        padding: 18px;
        text-align: center;
        backdrop-filter: blur(16px);
    }

    .today-box i {
        color: var(--cms-gold);
        font-size: 30px;
        margin-bottom: 6px;
    }

    .today-label {
        color: var(--cms-muted);
        font-size: 13px;
        font-weight: 700;
    }

    .today-value {
        color: var(--cms-text);
        font-size: 15px;
        font-weight: 900;
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

    .metric-note {
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
        gap: 10px;
    }

    .surface-card .card-header .header-title {
        display: flex;
        align-items: center;
        gap: 10px;
    }

    .surface-card .card-header i {
        color: var(--cms-gold);
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
        background: rgba(255, 255, 255, 0.025);
        color: var(--cms-text);
        border-color: var(--cms-border);
        padding: 14px;
        vertical-align: middle;
    }

    .cms-table tbody tr:hover td {
        background: rgba(119, 150, 42, 0.86);
    }

    .time-badge {
        display: inline-flex;
        align-items: center;
        padding: 6px 11px;
        border-radius: 50px;
        background: var(--cms-gold-soft);
        color: var(--cms-gold);
        border: 1px solid var(--cms-gold-border);
        font-size: 12px;
        font-weight: 900;
        white-space: nowrap;
    }

    .class-badge {
        display: inline-flex;
        align-items: center;
        padding: 6px 11px;
        border-radius: 50px;
        background: rgba(29, 191, 115, 0.13);
        color: #9af0bf;
        border: 1px solid rgba(29, 191, 115, 0.25);
        font-size: 12px;
        font-weight: 900;
        white-space: nowrap;
    }

    .side-list {
        display: flex;
        flex-direction: column;
        gap: 12px;
    }

    .side-item {
        display: flex;
        align-items: flex-start;
        gap: 12px;
        padding: 14px;
        border-radius: 18px;
        background: rgba(255, 255, 255, 0.045);
        border: 1px solid var(--cms-border);
        transition: 0.3s ease;
    }

    .side-item:hover {
        transform: translateY(-3px);
        border-color: var(--cms-gold-border);
        background: rgba(255, 255, 255, 0.065);
    }

    .side-icon {
        width: 34px;
        height: 34px;
        border-radius: 13px;
        display: grid;
        place-items: center;
        background: var(--cms-gold-soft);
        color: var(--cms-gold);
        border: 1px solid var(--cms-gold-border);
        flex-shrink: 0;
    }

    .side-item p {
        color: var(--cms-muted);
        margin: 0;
        line-height: 1.5;
        font-size: 14px;
        font-weight: 600;
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
        .faculty-dashboard-hero {
            padding: 22px;
        }

        .surface-card .card-header {
            flex-direction: column;
            align-items: flex-start;
        }

        .metric {
            font-size: 30px;
        }
    }
</style>

<div class="container-fluid faculty-dashboard-page">

    <div class="faculty-dashboard-hero">
        <div class="row align-items-center g-4">
            <div class="col-lg-8">
                <div class="faculty-dashboard-hero-content">
                    <div class="dashboard-kicker">
                        <span></span>
                        Faculty Panel
                    </div>

                    <h1 class="dashboard-title">Welcome to Faculty Dashboard</h1>

                    <p class="dashboard-subtitle">
                        View today’s classes, track pending attendance, manage subject activities and stay updated with faculty notices.
                    </p>
                </div>
            </div>

            <div class="col-lg-4">
                <div class="today-box">
                    <i class="bi bi-calendar2-week-fill d-block"></i>
                    <div class="today-label">Today</div>
                    <div class="today-value"><?= date('d M Y') ?></div>
                </div>
            </div>
        </div>
    </div>

    <div class="row g-4 mb-4">
        <div class="col-md-6 col-xl-3">
            <div class="card stat-card">
                <div class="card-body">
                    <div class="metric-icon">
                        <i class="bi bi-book-half"></i>
                    </div>
                    <div class="metric-label">Subjects</div>
                    <h2 class="metric">5</h2>
                    <div class="metric-note">
                        <i class="bi bi-check-circle-fill"></i>
                        Assigned subjects
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-6 col-xl-3">
            <div class="card stat-card">
                <div class="card-body">
                    <div class="metric-icon">
                        <i class="bi bi-calendar-event-fill"></i>
                    </div>
                    <div class="metric-label">Today's Classes</div>
                    <h2 class="metric">3</h2>
                    <div class="metric-note">
                        <i class="bi bi-clock-fill"></i>
                        Scheduled today
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-6 col-xl-3">
            <div class="card stat-card">
                <div class="card-body">
                    <div class="metric-icon">
                        <i class="bi bi-clipboard2-x-fill"></i>
                    </div>
                    <div class="metric-label">Pending Attendance</div>
                    <h2 class="metric">2</h2>
                    <div class="metric-note">
                        <i class="bi bi-exclamation-circle-fill"></i>
                        Needs update
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-6 col-xl-3">
            <div class="card stat-card">
                <div class="card-body">
                    <div class="metric-icon">
                        <i class="bi bi-pencil-square"></i>
                    </div>
                    <div class="metric-label">Marks Entry</div>
                    <h2 class="metric">1</h2>
                    <div class="metric-note">
                        <i class="bi bi-file-earmark-check-fill"></i>
                        Pending entry
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row g-4">
        <div class="col-xl-8">
            <div class="card surface-card">
                <div class="card-header">
                    <div class="header-title">
                        <i class="bi bi-calendar-check-fill"></i>
                        Today's Timetable
                    </div>
                    <span>Class schedule</span>
                </div>

                <div class="card-body table-responsive">
                    <table class="table table-bordered align-middle cms-table">
                        <thead>
                            <tr>
                                <th>Time</th>
                                <th>Class</th>
                                <th>Subject</th>
                                <th>Room</th>
                            </tr>
                        </thead>

                        <tbody>
                            <tr>
                                <td><span class="time-badge">10:00 AM</span></td>
                                <td><span class="class-badge">BCA-1</span></td>
                                <td>DBMS</td>
                                <td>Room 201</td>
                            </tr>

                            <tr>
                                <td><span class="time-badge">12:00 PM</span></td>
                                <td><span class="class-badge">BCA-2</span></td>
                                <td>PHP</td>
                                <td>Room 204</td>
                            </tr>

                            <tr>
                                <td><span class="time-badge">02:00 PM</span></td>
                                <td><span class="class-badge">BCA-3</span></td>
                                <td>Web Tech</td>
                                <td>Room 105</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <div class="col-xl-4">
            <div class="card surface-card mb-4">
                <div class="card-header">
                    <div class="header-title">
                        <i class="bi bi-megaphone-fill"></i>
                        Faculty Notices
                    </div>
                    <span>Important</span>
                </div>

                <div class="card-body">
                    <div class="side-list">
                        <div class="side-item">
                            <div class="side-icon">
                                <i class="bi bi-file-earmark-text-fill"></i>
                            </div>
                            <p>Submit internal marks by Friday.</p>
                        </div>

                        <div class="side-item">
                            <div class="side-icon">
                                <i class="bi bi-people-fill"></i>
                            </div>
                            <p>Meeting at 4:00 PM in seminar hall.</p>
                        </div>
                    </div>
                </div>
            </div>

            <div class="card surface-card">
                <div class="card-header">
                    <div class="header-title">
                        <i class="bi bi-activity"></i>
                        Recent Actions
                    </div>
                    <span>Updates</span>
                </div>

                <div class="card-body">
                    <div class="side-list">
                        <div class="side-item">
                            <div class="side-icon">
                                <i class="bi bi-check-circle-fill"></i>
                            </div>
                            <p>Attendance marked for BCA-1.</p>
                        </div>

                        <div class="side-item">
                            <div class="side-icon">
                                <i class="bi bi-cloud-arrow-up-fill"></i>
                            </div>
                            <p>Assignment uploaded.</p>
                        </div>

                        <div class="side-item">
                            <div class="side-icon">
                                <i class="bi bi-bar-chart-fill"></i>
                            </div>
                            <p>Results updated.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>

<?php include __DIR__ . '/../layouts/footer.php'; ?>