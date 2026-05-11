<?php
$pageTitle = 'Reports';
include __DIR__ . '/../layouts/header.php';
include __DIR__ . '/../layouts/sidebar.php';
?>

<style>
    .reports-page {
        padding: 10px 4px 30px;
        animation: pageFade 0.6s ease both;
    }

    .reports-hero {
        position: relative;
        overflow: hidden;
        border-radius: 24px;
        padding: 28px 32px;
        margin-bottom: 28px;
        background: linear-gradient(135deg, #f59e0b 0%, #fb923c 55%, #ef4444 100%);
        box-shadow: 0 12px 40px rgba(245, 158, 11, 0.28);
    }

    .reports-hero::before {
        content: "";
        position: absolute;
        width: 320px; height: 320px;
        border-radius: 50%;
        background: rgba(255,255,255,0.10);
        top: -90px; right: 80px;
        pointer-events: none;
    }

    .reports-hero-content { position: relative; z-index: 2; }

    .reports-kicker {
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

    .reports-kicker span {
        width: 7px; height: 7px;
        border-radius: 50%;
        background: #fff;
    }

    .reports-title {
        font-family: Georgia, 'Times New Roman', serif;
        font-size: clamp(28px, 4vw, 40px);
        font-weight: 900;
        margin-bottom: 8px;
        color: #fff;
        text-shadow: 0 2px 10px rgba(0,0,0,0.15);
    }

    .reports-subtitle {
        color: rgba(255,255,255,0.85);
        margin-bottom: 0;
        line-height: 1.7;
    }

    .reports-card {
        border: 1px solid #e8e4dc;
        border-radius: 24px;
        background: #ffffff;
        box-shadow: 0 10px 32px rgba(30,37,53,0.10);
        overflow: hidden;
    }

    .reports-card .card-header {
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

    .reports-card .card-header i { color: #d97706; }
    .reports-card .card-body { padding: 24px; }

    .report-item {
        display: flex;
        align-items: center;
        gap: 16px;
        padding: 18px 20px;
        border-radius: 16px;
        border: 1px solid #e8e4dc;
        background: #fafaf8;
        text-decoration: none;
        color: #1a1a2e;
        font-weight: 700;
        margin-bottom: 12px;
        transition: 0.25s ease;
    }

    .report-item:last-child { margin-bottom: 0; }

    .report-item:hover {
        background: #fff8ee;
        border-color: rgba(245,158,11,0.35);
        color: #d97706;
        transform: translateX(6px);
        box-shadow: 0 6px 20px rgba(245,158,11,0.14);
    }

    .report-icon {
        width: 48px; height: 48px;
        border-radius: 14px;
        background: #fff8ee;
        border: 1px solid rgba(245,158,11,0.25);
        display: grid;
        place-items: center;
        font-size: 20px;
        color: #d97706;
        flex-shrink: 0;
        transition: 0.25s ease;
    }

    .report-item:hover .report-icon {
        background: linear-gradient(135deg, #f59e0b, #d97706);
        color: #fff;
        border-color: transparent;
    }

    .report-info { flex: 1; }
    .report-name { font-size: 15px; font-weight: 800; margin-bottom: 2px; }
    .report-desc { font-size: 13px; color: #7a7a8a; font-weight: 600; }

    .report-arrow { color: #d97706; font-size: 18px; opacity: 0.6; transition: 0.25s ease; }
    .report-item:hover .report-arrow { opacity: 1; transform: translateX(4px); }

    @keyframes pageFade {
        from { opacity: 0; transform: translateY(16px); }
        to   { opacity: 1; transform: translateY(0); }
    }
</style>

<div class="container-fluid reports-page">

    <!-- Hero -->
    <div class="reports-hero">
        <div class="reports-hero-content">
            <div class="reports-kicker"><span></span> Analytics</div>
            <h1 class="reports-title">Reports & Analytics</h1>
            <p class="reports-subtitle">View academic performance reports, track student progress and export insights.</p>
        </div>
    </div>

    <div class="row justify-content-center">
        <div class="col-lg-8">
            <div class="reports-card">
                <div class="card-header">
                    <i class="bi bi-bar-chart-fill"></i>
                    Available Reports
                </div>
                <div class="card-body">
                    <a href="/college/public/index.php?url=student-performance" class="report-item">
                        <div class="report-icon"><i class="bi bi-graph-up-arrow"></i></div>
                        <div class="report-info">
                            <div class="report-name">Student Performance Tracking</div>
                            <div class="report-desc">View grades, scores and academic progress by student or department</div>
                        </div>
                        <i class="bi bi-arrow-right report-arrow"></i>
                    </a>
                </div>
            </div>
        </div>
    </div>

</div>

<?php include __DIR__ . '/../layouts/footer.php'; ?>