<?php
$pageTitle = 'Student Performance Analytics';
include __DIR__ . '/../layouts/header.php';
include __DIR__ . '/../layouts/sidebar.php';

$userRole = strtolower($_SESSION['role'] ?? '');
?>

<style>
    :root {
        --cms-bg: #f8f7f4;
        --cms-bg-dark: #edeae4;
        --cms-card: #ffffff;
        --cms-card-soft: rgba(245, 158, 11, 0.06);
        --cms-border: rgba(30, 37, 53, 0.13);
        --cms-gold: #f59e0b;
        --cms-gold-soft: rgba(245, 158, 11, 0.12);
        --cms-gold-border: rgba(245, 158, 11, 0.35);
        --cms-text: #1e2535;
        --cms-muted: rgba(30, 37, 53, 0.55);
        --cms-green: #d97706;
        --cms-success: #16a34a;
        --cms-warning: #f59e0b;
        --cms-danger: #dc3545;
        --cms-info: #0ea5e9;
        --cms-shadow: 0 4px 24px rgba(30, 37, 53, 0.10);
        --cms-gold-shadow: 0 8px 24px rgba(245, 158, 11, 0.18);
    }

    body {
        background: var(--cms-bg);
        color: var(--cms-text);
    }

    .analytics-wrapper {
        min-height: 100vh;
        color: var(--cms-text);
        animation: fadeIn 0.7s ease both;
    }

    .hero-card {
        position: relative;
        overflow: hidden;
        background: linear-gradient(135deg, #f59e0b 0%, #f97316 55%, #dc2626 100%);
        color: #ffffff;
        border-radius: 28px;
        padding: 30px;
        border: none;
        box-shadow: var(--cms-gold-shadow);
    }

    .hero-card::before {
        content: "";
        position: absolute;
        inset: 0;
        background-image: url("data:image/svg+xml,%3Csvg viewBox='0 0 200 200' xmlns='http://www.w3.org/2000/svg'%3E%3Cfilter id='n'%3E%3CfeTurbulence type='fractalNoise' baseFrequency='0.8' numOctaves='2'/%3E%3C/filter%3E%3Crect width='100%25' height='100%25' filter='url(%23n)' opacity='0.20'/%3E%3C/svg%3E");
        opacity: 0.08;
        pointer-events: none;
    }

    .hero-card>* {
        position: relative;
        z-index: 2;
    }

    .hero-card h2 {
        font-family: Georgia, 'Times New Roman', serif;
        font-weight: 900;
        letter-spacing: -0.03em;
    }

    .cms-card {
        background: var(--cms-card);
        color: var(--cms-text);
        border: 1px solid var(--cms-border);
        border-radius: 26px;
        box-shadow: var(--cms-shadow);
        overflow: hidden;
    }

    .section-title {
        font-weight: 900;
        color: var(--cms-text);
        margin-bottom: 14px;
        letter-spacing: -0.02em;
    }

    .text-muted {
        color: var(--cms-muted) !important;
    }

    .profile-banner {
        border-left: 6px solid var(--cms-gold);
    }

    .avatar-circle {
        width: 64px;
        height: 64px;
        border-radius: 22px;
        background: linear-gradient(135deg, #fff8ee, #fde68a);
        color: #92400e;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 30px;
        font-weight: 900;
        box-shadow: var(--cms-gold-shadow);
    }

    .kpi-card {
        border-radius: 24px;
        padding: 22px;
        border: 1px solid var(--cms-border);
        height: 100%;
        box-shadow: var(--cms-shadow);
        transition: 0.3s ease;
    }

    .kpi-card:hover {
        transform: translateY(-5px);
        border-color: var(--cms-gold-border);
    }

    .kpi-label {
        font-size: 13px;
        color: var(--cms-muted);
        font-weight: 800;
        text-transform: uppercase;
        letter-spacing: 0.8px;
    }

    .kpi-value {
        font-size: 30px;
        font-weight: 900;
        margin-top: 8px;
    }

    .kpi-blue {
        background: rgba(14, 165, 233, 0.08);
        color: #0369a1;
        border-color: rgba(14, 165, 233, 0.22);
    }

    .kpi-green {
        background: rgba(22, 163, 74, 0.08);
        color: #15803d;
        border-color: rgba(22, 163, 74, 0.22);
    }

    .kpi-indigo {
        background: rgba(99, 102, 241, 0.08);
        color: #4338ca;
        border-color: rgba(99, 102, 241, 0.22);
    }

    .kpi-red {
        background: rgba(220, 53, 69, 0.08);
        color: #b91c1c;
        border-color: rgba(220, 53, 69, 0.22);
    }

    .kpi-amber {
        background: rgba(245, 158, 11, 0.10);
        color: #92400e;
        border-color: rgba(245, 158, 11, 0.28);
    }

    .insight-card {
        background: linear-gradient(135deg, rgba(245, 158, 11, 0.07), rgba(249, 115, 22, 0.04));
        border-left: 6px solid var(--cms-gold);
    }

    .note-card {
        border-left: 6px solid #d97706;
    }

    .soft-badge {
        padding: 7px 12px;
        border-radius: 30px;
        font-size: 12px;
        font-weight: 800;
        display: inline-block;
        margin: 3px;
        border: 1px solid transparent;
    }

    .badge-soft-blue {
        background: rgba(14, 165, 233, 0.10);
        color: #0369a1;
        border-color: rgba(14, 165, 233, 0.22);
    }

    .badge-soft-green {
        background: rgba(22, 163, 74, 0.10);
        color: #15803d;
        border-color: rgba(22, 163, 74, 0.22);
    }

    .badge-soft-amber {
        background: rgba(245, 158, 11, 0.12);
        color: #92400e;
        border-color: rgba(245, 158, 11, 0.28);
    }

    .badge-soft-red {
        background: rgba(220, 53, 69, 0.10);
        color: #b91c1c;
        border-color: rgba(220, 53, 69, 0.22);
    }

    .matrix-table {
        color: var(--cms-text);
        border-color: var(--cms-border);
    }

    .matrix-table th {
        background: #fff8ee;
        color: #92400e;
        font-size: 13px;
        text-transform: uppercase;
        border-color: var(--cms-border);
        padding: 14px;
        white-space: nowrap;
    }

    .matrix-table td {
        background: #ffffff;
        color: var(--cms-text);
        border-color: var(--cms-border);
        vertical-align: middle;
        padding: 14px;
    }

    .matrix-table tbody tr:active td {
        background: rgba(245, 158, 11, 0.08) !important;
        border-color: var(--cms-gold-border);
    }

    .action-card {
        background: linear-gradient(135deg, rgba(245, 158, 11, 0.07), #ffffff);
    }

    .form-label {
        color: var(--cms-text);
        font-weight: 800;
    }

    .form-control,
    .form-select {
        background-color: #fafaf8;
        color: var(--cms-text);
        border: 1px solid var(--cms-border);
        border-radius: 15px;
        min-height: 46px;
        font-weight: 600;
    }

    .form-control:focus,
    .form-select:focus {
        background-color: #ffffff;
        color: var(--cms-text);
        border-color: var(--cms-gold);
        box-shadow: 0 0 0 4px rgba(245, 158, 11, 0.12);
    }

    .form-select option {
        background: #ffffff;
        color: var(--cms-text);
    }

    textarea.form-control {
        min-height: 120px;
    }

    .btn {
        border-radius: 999px;
        font-weight: 800;
    }

    .btn-primary {
        border: none;
        background: linear-gradient(135deg, #f59e0b, #d97706);
        color: #ffffff;
        box-shadow: var(--cms-gold-shadow);
    }

    .btn-primary:hover {
        color: #ffffff;
        opacity: 0.96;
        transform: translateY(-2px);
    }

    .btn-light {
        border: none;
        background: linear-gradient(135deg, #f59e0b, #d97706);
        color: #ffffff;
        font-weight: 900;
    }

    .btn-light:hover {
        color: #ffffff;
        opacity: 0.96;
        transform: translateY(-2px);
    }

    .btn-outline-light,
    .btn-outline-dark,
    .btn-outline-warning,
    .btn-secondary {
        background: rgba(30, 37, 53, 0.05);
        border: 1px solid var(--cms-border);
        color: var(--cms-text);
    }

    .btn-outline-light:hover,
    .btn-outline-dark:hover,
    .btn-outline-warning:hover,
    .btn-secondary:hover {
        background: var(--cms-gold-soft);
        color: #92400e;
        border-color: var(--cms-gold-border);
        transform: translateY(-2px);
    }

    .btn-success {
        background: rgba(22, 163, 74, 0.12);
        color: #15803d;
        border: 1px solid rgba(22, 163, 74, 0.25);
    }

    .btn-success:hover {
        background: #16a34a;
        color: #fff;
        transform: translateY(-2px);
    }

    .alert {
        border-radius: 16px;
        font-weight: 700;
        border: 1px solid transparent;
    }

    .alert-success {
        background: rgba(22, 163, 74, 0.08);
        color: #15803d;
        border-color: rgba(22, 163, 74, 0.22);
    }

    .alert-warning {
        background: rgba(245, 158, 11, 0.10);
        color: #92400e;
        border-color: rgba(245, 158, 11, 0.25);
    }

    .alert-danger {
        background: rgba(220, 53, 69, 0.08);
        color: #b91c1c;
        border-color: rgba(220, 53, 69, 0.22);
    }

    .alert-info,
    .alert-secondary {
        background: rgba(14, 165, 233, 0.08);
        color: #0369a1;
        border-color: rgba(14, 165, 233, 0.20);
    }

    .border {
        border-color: var(--cms-border) !important;
    }

    .rounded {
        border-radius: 18px !important;
    }

    .bg-success {
        background-color: #16a34a !important;
    }

    .bg-warning {
        background-color: #f59e0b !important;
        color: #111827 !important;
    }

    .bg-danger {
        background-color: #dc3545 !important;
    }

    .bg-primary {
        background-color: #1e2535 !important;
    }

    .bg-secondary {
        background-color: #64748b !important;
    }

    .bg-dark {
        background-color: #1e2535 !important;
    }

    .pdf-hide {
        display: inline-block;
    }

    @keyframes fadeIn {
        from {
            opacity: 0;
            transform: translateY(12px);
        }

        to {
            opacity: 1;
            transform: translateY(0);
        }
    }

    @media print {

        .pdf-hide,
        form,
        .btn,
        .hero-card .d-flex.gap-2,
        .sidebar,
        .topbar {
            display: none !important;
        }

        body,
        .analytics-wrapper,
        .content-area,
        .page-content {
            background: #ffffff !important;
            color: #000000 !important;
        }

        .cms-card,
        .hero-card,
        .kpi-card {
            box-shadow: none !important;
            border: 1px solid #ddd !important;
            background: #ffffff !important;
            color: #000000 !important;
        }

        .hero-card {
            color: #000000 !important;
            background: #ffffff !important;
        }

        .text-muted {
            color: #555 !important;
        }
    }

    @media (max-width: 767px) {
        .hero-card {
            padding: 22px;
        }

        .kpi-value {
            font-size: 26px;
        }
    }

    /* Remove all click / focus white flash */
    .matrix-table tbody tr,
    .matrix-table tbody td {
        outline: none !important;
    }

    .matrix-table tbody tr:hover {
        background: rgba(245, 158, 11, 0.06) !important;
        color: var(--cms-text) !important;
    }

    /* Row + cell active/focus states */
    .matrix-table tbody tr:focus,
    .matrix-table tbody tr:active,
    .matrix-table tbody tr td:focus,
    .matrix-table tbody tr td:active {
        background: rgba(245, 158, 11, 0.08) !important;
        color: var(--cms-text) !important;
        outline: none !important;
        box-shadow: none !important;
    }

    /* Bootstrap override */
    .table> :not(caption)>*>*:active,
    .table> :not(caption)>*>*:focus {
        background-color: rgba(245, 158, 11, 0.08) !important;
        color: var(--cms-text) !important;
    }

    /* If links/buttons inside table */
    .matrix-table a,
    .matrix-table button {
        outline: none !important;
    }

    .matrix-table a:focus,
    .matrix-table a:active,
    .matrix-table button:focus,
    .matrix-table button:active {
        background: transparent !important;
        box-shadow: none !important;
    }

    /* 🔥 MOST IMPORTANT for mobile / Chrome */
    * {
        -webkit-tap-highlight-color: transparent !important;
    }

    .matrix-table *:focus {
        outline: none !important;
        box-shadow: none !important;
    }
</style>

<div class="analytics-wrapper py-4 fade-in" id="reportContent">
    <div class="container-fluid px-4">

        <div class="hero-card mb-4">
            <div class="d-flex justify-content-between align-items-center flex-wrap gap-3">
                <div>
                    <h2 class="fw-bold mb-2">Student Performance Analytics</h2>
                    <p class="mb-0 opacity-75">
                        Track academic progress, attendance, risk level, subject performance and improvement plan.
                    </p>
                </div>

                <div class="d-flex gap-2 pdf-hide">
                    <?php if ($overview): ?>
                        <button type="button" onclick="downloadPDF()" class="btn btn-light fw-semibold">
                            📄 Download PDF
                        </button>
                    <?php endif; ?>
                    <?php if ($userRole === 'faculty'): ?>
                        <a href="<?= BASE_URL ?>manage-student-performance"
                            class="btn btn-warning fw-semibold">
                            ⚙ Manage Performance
                        </a>
                    <?php endif; ?>

                    <a href="<?= BASE_URL ?>manage-attendance"
                        class="btn btn-warning fw-semibold">

                        📅 Manage Attendance

                    </a>

                    <a href="<?= BASE_URL ?>dashboard" class="btn btn-outline-light fw-semibold">
                        ← Back
                    </a>
                </div>
            </div>
        </div>

        <div class="cms-card p-4 mb-4">
            <h5 class="section-title">Filters</h5>

            <form method="GET" action="<?= BASE_URL ?>student-performance">
                <input type="hidden" name="url" value="student-performance">

                <div class="row g-3 align-items-end">

                    <?php if ($userRole === 'admin'): ?>

                        <div class="col-md-3">
                            <label class="form-label small text-muted">Academic Year</label>
                            <select name="academic_year" class="form-select" onchange="this.form.submit()">
                                <option value="">All Years</option>
                                <?php foreach ($academicYears as $year): ?>
                                    <option value="<?= htmlspecialchars($year['academic_year']) ?>"
                                        <?= ($selectedAcademicYear == $year['academic_year']) ? 'selected' : '' ?>>
                                        <?= htmlspecialchars($year['academic_year']) ?>
                                    </option>
                                <?php endforeach; ?>
                            </select>
                        </div>

                        <div class="col-md-3">
                            <label class="form-label small text-muted">Course</label>
                            <select name="course_id" class="form-select" onchange="this.form.submit()">
                                <option value="">All Courses</option>
                                <?php foreach ($courses as $course): ?>
                                    <option value="<?= $course['id'] ?>"
                                        <?= ($selectedCourseId == $course['id']) ? 'selected' : '' ?>>
                                        <?= htmlspecialchars($course['course_name']) ?>
                                    </option>
                                <?php endforeach; ?>
                            </select>
                        </div>

                        <div class="col-md-3">
                            <label class="form-label small text-muted">Semester</label>
                            <select name="semester_id" class="form-select" onchange="this.form.submit()">
                                <option value="">All Semesters</option>
                                <?php foreach ($semesters as $sem): ?>
                                    <option value="<?= $sem['id'] ?>"
                                        <?= ($selectedSemesterId == $sem['id']) ? 'selected' : '' ?>>
                                        <?= htmlspecialchars($sem['semester_number']) ?>
                                    </option>
                                <?php endforeach; ?>
                            </select>
                        </div>

                        <div class="col-md-3">
                            <button class="btn btn-primary w-100">
                                View Summary
                            </button>
                        </div>

                    <?php elseif ($userRole === 'faculty'): ?>

                        <div class="col-md-2">
                            <label class="form-label small text-muted">Academic Year</label>
                            <select name="academic_year" class="form-select" onchange="this.form.submit()">
                                <option value="">All Years</option>
                                <?php foreach ($academicYears as $year): ?>
                                    <option value="<?= htmlspecialchars($year['academic_year']) ?>"
                                        <?= ($selectedAcademicYear == $year['academic_year']) ? 'selected' : '' ?>>
                                        <?= htmlspecialchars($year['academic_year']) ?>
                                    </option>
                                <?php endforeach; ?>
                            </select>
                        </div>

                        <div class="col-md-2">
                            <label class="form-label small text-muted">Course</label>
                            <select name="course_id" class="form-select" onchange="this.form.submit()">
                                <option value="">All Courses</option>
                                <?php foreach ($courses as $course): ?>
                                    <option value="<?= $course['id'] ?>"
                                        <?= ($selectedCourseId == $course['id']) ? 'selected' : '' ?>>
                                        <?= htmlspecialchars($course['course_name']) ?>
                                    </option>
                                <?php endforeach; ?>
                            </select>
                        </div>

                        <div class="col-md-2">
                            <label class="form-label small text-muted">Semester</label>
                            <select name="semester_id" class="form-select" onchange="this.form.submit()">
                                <option value="">All Semesters</option>
                                <?php foreach ($semesters as $sem): ?>
                                    <option value="<?= $sem['id'] ?>"
                                        <?= ($selectedSemesterId == $sem['id']) ? 'selected' : '' ?>>
                                        <?= htmlspecialchars($sem['semester_number']) ?>
                                    </option>
                                <?php endforeach; ?>
                            </select>
                        </div>

                        <div class="col-md-1">
                            <label class="form-label small text-muted">Section</label>
                            <select name="section_id" class="form-select" onchange="this.form.submit()">
                                <option value="">All</option>
                                <?php foreach ($sections as $sec): ?>
                                    <option value="<?= $sec['id'] ?>"
                                        <?= ($selectedSectionId == $sec['id']) ? 'selected' : '' ?>>
                                        <?= htmlspecialchars($sec['section_name']) ?>
                                    </option>
                                <?php endforeach; ?>
                            </select>
                        </div>

                        <div class="col-md-2">
                            <label class="form-label small text-muted">Student</label>
                            <select name="student_id" class="form-select">
                                <option value="">Select Student</option>
                                <?php foreach ($students as $studentOption): ?>
                                    <option value="<?= $studentOption['id'] ?>"
                                        <?= (isset($_GET['student_id']) && $_GET['student_id'] == $studentOption['id']) ? 'selected' : '' ?>>
                                        <?= htmlspecialchars($studentOption['candidate_name']) ?>
                                    </option>
                                <?php endforeach; ?>
                            </select>
                        </div>

                        <div class="col-md-2">
                            <label class="form-label small text-muted">Subject</label>
                            <select name="subject_id" class="form-select">
                                <option value="">All Subjects</option>
                                <?php if (!empty($subjects)): ?>
                                    <?php foreach ($subjects as $sub): ?>
                                        <option value="<?= $sub['id'] ?>"
                                            <?= (isset($selectedSubjectId) && $selectedSubjectId == $sub['id']) ? 'selected' : '' ?>>
                                            <?= htmlspecialchars($sub['subject_name']) ?>
                                        </option>
                                    <?php endforeach; ?>
                                <?php endif; ?>
                            </select>
                        </div>

                        <div class="col-md-1">
                            <button class="btn btn-primary w-100">
                                View
                            </button>
                        </div>

                    <?php elseif ($userRole === 'student'): ?>

                        <div class="col-md-4">
                            <label class="form-label small text-muted">Subject</label>
                            <select name="subject_id" class="form-select">
                                <option value="">All Subjects</option>
                                <?php if (!empty($subjects)): ?>
                                    <?php foreach ($subjects as $sub): ?>
                                        <option value="<?= $sub['id'] ?>"
                                            <?= (isset($selectedSubjectId) && $selectedSubjectId == $sub['id']) ? 'selected' : '' ?>>
                                            <?= htmlspecialchars($sub['subject_name']) ?>
                                        </option>
                                    <?php endforeach; ?>
                                <?php endif; ?>
                            </select>
                        </div>

                        <div class="col-md-2">
                            <button class="btn btn-primary w-100">
                                View
                            </button>
                        </div>

                    <?php endif; ?>

                </div>
            </form>
        </div>

        <?php if ($userRole === 'admin'): ?>

            <?php
            $totalStudents = $adminSemesterSummary['total_students'] ?? 0;
            $semesterAverage = $adminSemesterSummary['semester_average'] ?? 0;
            $passCount = $adminSemesterSummary['pass_count'] ?? 0;
            $failCount = $adminSemesterSummary['fail_count'] ?? 0;
            $averageAttendance = $adminSemesterSummary['average_attendance'] ?? 0;
            ?>

            <div class="row g-3 mb-4">
                <div class="col-md">
                    <div class="kpi-card kpi-blue">
                        <div class="kpi-label">Total Students</div>
                        <div class="kpi-value"><?= htmlspecialchars($totalStudents) ?></div>
                    </div>
                </div>

                <div class="col-md">
                    <div class="kpi-card kpi-green">
                        <div class="kpi-label">Semester Average</div>
                        <div class="kpi-value"><?= htmlspecialchars($semesterAverage) ?>%</div>
                    </div>
                </div>

                <div class="col-md">
                    <div class="kpi-card kpi-indigo">
                        <div class="kpi-label">Pass Count</div>
                        <div class="kpi-value"><?= htmlspecialchars($passCount) ?></div>
                    </div>
                </div>

                <div class="col-md">
                    <div class="kpi-card kpi-red">
                        <div class="kpi-label">Fail Count</div>
                        <div class="kpi-value"><?= htmlspecialchars($failCount) ?></div>
                    </div>
                </div>

                <div class="col-md">
                    <div class="kpi-card kpi-amber">
                        <div class="kpi-label">Average Attendance</div>
                        <div class="kpi-value"><?= htmlspecialchars($averageAttendance) ?>%</div>
                    </div>
                </div>
            </div>

            <div class="cms-card p-4 mb-4">
                <h5 class="section-title">
                    Semester-wise Performance Comparison
                    <?php if (!empty($selectedSemesterId)): ?>
                        <small class="text-muted">- Selected Semester</small>
                    <?php else: ?>
                        <small class="text-muted">- All Semesters</small>
                    <?php endif; ?>
                </h5>

                <?php if (!empty($adminSemesterComparison)): ?>
                    <div class="table-responsive">
                        <table class="table table-hover matrix-table align-middle">
                            <thead>
                                <tr>
                                    <th>Semester</th>
                                    <th>Total Students</th>
                                    <th>Average %</th>
                                    <th>Pass</th>
                                    <th>Fail</th>
                                    <th>Average Attendance</th>
                                    <th>Status</th>
                                </tr>
                            </thead>

                            <tbody>
                                <?php foreach ($adminSemesterComparison as $comparisonRow): ?>
                                    <?php
                                    $avg = $comparisonRow['semester_average'] ?? 0;

                                    if ($avg >= 75) {
                                        $statusText = "Excellent";
                                        $statusBadge = "success";
                                    } elseif ($avg >= 60) {
                                        $statusText = "Good";
                                        $statusBadge = "primary";
                                    } elseif ($avg >= 50) {
                                        $statusText = "Average";
                                        $statusBadge = "warning";
                                    } else {
                                        $statusText = "Needs Improvement";
                                        $statusBadge = "danger";
                                    }
                                    ?>

                                    <tr>
                                        <td class="fw-semibold">
                                            <?= htmlspecialchars($comparisonRow['semester_name']) ?>
                                        </td>
                                        <td><?= htmlspecialchars($comparisonRow['total_students'] ?? 0) ?></td>
                                        <td><?= htmlspecialchars($comparisonRow['semester_average'] ?? 0) ?>%</td>
                                        <td><?= htmlspecialchars($comparisonRow['pass_count'] ?? 0) ?></td>
                                        <td><?= htmlspecialchars($comparisonRow['fail_count'] ?? 0) ?></td>
                                        <td><?= htmlspecialchars($comparisonRow['average_attendance'] ?? 0) ?>%</td>
                                        <td>
                                            <span class="badge bg-<?= $statusBadge ?>">
                                                <?= htmlspecialchars($statusText) ?>
                                            </span>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                <?php else: ?>
                    <div class="alert alert-info mb-0">
                        No semester comparison data found.
                    </div>
                <?php endif; ?>
            </div>

            <div class="cms-card insight-card p-4 mb-4">
                <h5 class="section-title">Admin Insight</h5>

                <p class="fw-semibold mb-2">
                    This report helps admin compare semester-wise academic performance, pass/fail ratio,
                    and attendance trends across the selected course.
                </p>

                <p class="mb-0">
                    <strong>Recommended Action:</strong>
                    Focus on semesters with low average percentage or low attendance.
                    Faculty can use Student Performance Tracking for individual student-level improvement.
                </p>
            </div>

        <?php endif; ?>

        <?php if ($userRole !== 'admin' && $overview): ?>

            <?php
            $avgMarks = $overview['avg_marks'] ?? 0;

            $attendancePercentage =
                $attendance['attendance_percentage'] ?? 0;

            $totalDays =
                $attendance['total_days'] ?? 0;

            $presentDays =
                $attendance['present_days'] ?? 0;

            $absentDays =
                $totalDays - $presentDays;

            $requiredAttendance = 75;

            $shortage =
                max(0, $requiredAttendance - $attendancePercentage);

            $failedSubjects = 0;

            $weakSubjectCount = count($weakSubjects);

            if (!empty($subjectPerformance)) {

                foreach ($subjectPerformance as $subPerf) {

                    if (($subPerf['percentage'] ?? 0) < 35) {
                        $failedSubjects++;
                    }
                }
            }

            /*
    |--------------------------------------------------------------------------
    | AI INSIGHT ENGINE
    |--------------------------------------------------------------------------
    */

            require_once __DIR__ . '/../../services/AcademicInsightEngine.php';

            $aiInsights =
                AcademicInsightEngine::analyze(
                    $attendancePercentage,
                    $avgMarks,
                    $subjectPerformance
                );

            $reasonTags =
                $aiInsights['tags'];

            $recommendedAction =
                implode(", ", $aiInsights['recommendations']);

            $insightComment =
                $aiInsights['summary'];

            $riskLevel =
                $aiInsights['risk'];

            /*
    |--------------------------------------------------------------------------
    | DYNAMIC STATUS UI
    |--------------------------------------------------------------------------
    */

            if ($riskLevel === "Low") {

                $status = "Excellent";
                $statusClass = "success";
                $riskKpiClass = "kpi-green";
            } elseif ($riskLevel === "Medium") {

                $status = "Average";
                $statusClass = "warning";
                $riskKpiClass = "kpi-amber";
            } elseif ($riskLevel === "High") {

                $status = "Needs Improvement";
                $statusClass = "danger";
                $riskKpiClass = "kpi-red";
            } else {

                $status = "Critical";
                $statusClass = "danger";
                $riskKpiClass = "kpi-red";
            }

            /*
    |--------------------------------------------------------------------------
    | STUDENT DETAILS
    |--------------------------------------------------------------------------
    */

            $studentName =
                $studentProfile['candidate_name']
                ?? $overview['candidate_name']
                ?? 'Student';

            $parentPhone =
                $studentProfile['parent_phone']
                ?? $studentProfile['phone']
                ?? '';

            /*
    |--------------------------------------------------------------------------
    | WHATSAPP MESSAGE
    |--------------------------------------------------------------------------
    */

            $whatsappMessage =
                "Dear Parent, Performance report of "
                . $studentName .
                ": Overall " . $avgMarks .
                "%, Attendance " . $attendancePercentage .
                "%. Status: " . $status .
                ". Recommended Action: "
                . $recommendedAction;

            $whatsappUrl = "";

            if (!empty($parentPhone)) {

                $cleanPhone =
                    preg_replace('/[^0-9]/', '', $parentPhone);

                if (strlen($cleanPhone) == 10) {
                    $cleanPhone = "91" . $cleanPhone;
                }

                $whatsappUrl =
                    "https://wa.me/" . $cleanPhone .
                    "?text=" . urlencode($whatsappMessage);
            }
            ?>

            <div class="cms-card profile-banner p-4 mb-4">
                <div class="d-flex justify-content-between align-items-center flex-wrap gap-3">
                    <div class="d-flex align-items-center gap-3">
                        <div class="avatar-circle">
                            👨‍🎓
                        </div>

                        <div>
                            <h4 class="fw-bold mb-1">
                                <?= htmlspecialchars($studentName) ?>
                            </h4>

                            <p class="text-muted mb-0">
                                Roll No:
                                <strong><?= htmlspecialchars($studentProfile['roll_no'] ?? $studentProfile['register_no'] ?? $studentProfile['id'] ?? 'Not Added') ?></strong>
                                |
                                Dept:
                                <strong><?= htmlspecialchars($studentProfile['department'] ?? $studentProfile['department_name'] ?? 'Not Added') ?></strong>
                                |
                                Sem:
                                <strong><?= htmlspecialchars($studentProfile['semester'] ?? 'Not Added') ?></strong>
                                |
                                Sec:
                                <strong><?= htmlspecialchars($studentProfile['section'] ?? 'Not Added') ?></strong>
                                |
                                <?= htmlspecialchars($studentProfile['academic_year'] ?? '2025-26') ?>
                            </p>
                        </div>
                    </div>

                    <div class="text-md-end">
                        <span class="badge bg-<?= $statusClass ?> fs-6 px-3 py-2">
                            Status: <?= htmlspecialchars($status) ?>
                        </span>
                        <div class="small text-muted mt-2">
                            Last Updated: <?= date('d M Y') ?>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row g-3 mb-4">
                <div class="col-md">
                    <div class="kpi-card kpi-blue">
                        <div class="kpi-label">Overall %</div>
                        <div class="kpi-value"><?= htmlspecialchars($avgMarks) ?>%</div>
                    </div>
                </div>

                <div class="col-md">
                    <div class="kpi-card kpi-green">
                        <div class="kpi-label">Attendance</div>
                        <div class="kpi-value"><?= htmlspecialchars($attendancePercentage) ?>%</div>
                    </div>
                </div>

                <div class="col-md">
                    <div class="kpi-card kpi-indigo">
                        <div class="kpi-label">Class Rank</div>
                        <div class="kpi-value">
                            <?php if (!empty($classRank)): ?>
                                <?= htmlspecialchars($classRank['student_rank']) ?> /
                                <?= htmlspecialchars($classRank['total_students']) ?>
                            <?php elseif ($userRole !== 'admin'): ?>
                                N/A
                            <?php endif; ?>
                        </div>
                    </div>
                </div>

                <div class="col-md">
                    <div class="kpi-card <?= $riskKpiClass ?>">
                        <div class="kpi-label">Risk Level</div>
                        <div class="kpi-value" style="font-size: 22px;">
                            <?= htmlspecialchars($riskLevel) ?>
                        </div>
                    </div>
                </div>

                <div class="col-md">
                    <div class="kpi-card kpi-red">
                        <div class="kpi-label">Failed Subjects</div>
                        <div class="kpi-value"><?= $failedSubjects ?></div>
                    </div>
                </div>
            </div>

            <div class="cms-card note-card p-4 mb-4">
                <h5 class="section-title">Teacher's Note</h5>

                <?php if (isset($_GET['note_saved'])): ?>
                    <div class="alert alert-success">
                        Teacher note saved successfully.
                    </div>
                <?php endif; ?>

                <?php if ($userRole === 'faculty'): ?>

                    <form method="POST" action="<?= BASE_URL ?>save-teacher-note">
                        <input type="hidden" name="student_id" value="<?= htmlspecialchars($studentId) ?>">
                        <input type="hidden" name="redirect_url" value="<?= htmlspecialchars($_SERVER['REQUEST_URI']) ?>">

                        <div class="mb-3">
                            <label class="form-label small text-muted">
                                Add / Update Note for <?= htmlspecialchars($studentName ?? 'Student') ?>
                            </label>

                            <textarea
                                name="teacher_note"
                                class="form-control"
                                rows="4"
                                placeholder="Example: Student is attentive in class but should improve assignment submission and revision before next IA."
                                required><?= htmlspecialchars($teacherNote['note'] ?? '') ?></textarea>
                        </div>

                        <button type="submit" class="btn btn-primary">
                            💾 Save Teacher Note
                        </button>
                    </form>

                <?php elseif ($userRole === 'student'): ?>

                    <?php if (!empty($teacherNote)): ?>
                        <div class="alert alert-info mb-2">
                            <?= nl2br(htmlspecialchars($teacherNote['note'])) ?>
                        </div>

                        <small class="text-muted">
                            Added by:
                            <?= htmlspecialchars(trim(($teacherNote['faculty_first_name'] ?? '') . ' ' . ($teacherNote['faculty_last_name'] ?? ''))) ?>
                            |
                            Last Updated:
                            <?= htmlspecialchars(date('d M Y', strtotime($teacherNote['updated_at']))) ?>
                        </small>
                    <?php else: ?>
                        <div class="alert alert-secondary mb-0">
                            No teacher note added yet.
                        </div>
                    <?php endif; ?>

                <?php endif; ?>
            </div>

            <div class="cms-card insight-card p-4 mb-4">
                <h5 class="section-title">Academic Insight</h5>

                <div class="mb-3">
                    <span class="fw-semibold">Reason Tags:</span>
                    <?php foreach ($reasonTags as $tag): ?>
                        <span class="soft-badge badge-soft-blue">
                            <?= htmlspecialchars($tag) ?>
                        </span>
                    <?php endforeach; ?>
                </div>

                <p class="fw-semibold mb-2">
                    <?= htmlspecialchars($insightComment) ?>
                </p>

                <p class="mb-0">
                    <strong>Recommended Action:</strong>
                    <?= htmlspecialchars($recommendedAction) ?>
                </p>
            </div>

            <?php if ($userRole === 'faculty' && $overview): ?>

                <div class="cms-card p-4 mb-4">
                    <div class="d-flex justify-content-between align-items-center flex-wrap gap-2 mb-3">
                        <div>
                            <h5 class="section-title mb-1">Update Student Attendance</h5>
                            <p class="text-muted mb-0">
                                Faculty can update present and absent days for the selected student.
                            </p>
                        </div>
                    </div>

                    <?php if (isset($_GET['attendance_saved'])): ?>
                        <div class="alert alert-success">
                            Attendance updated successfully.
                        </div>
                    <?php endif; ?>

                    <form method="POST"
                        action="<?= BASE_URL ?>save-daily-attendance">
                        <div class="row g-3 mb-4">

                            <div class="col-md-4">

                                <label class="form-label">
                                    Attendance Date
                                </label>

                                <input
                                    type="date"
                                    name="attendance_date"
                                    class="form-control"
                                    required>

                            </div>

                            <div class="col-md-4">

                                <label class="form-label">
                                    Subject
                                </label>

                                <select
                                    name="subject_id"
                                    class="form-select"
                                    required>

                                    <option value="">
                                        Select Subject
                                    </option>

                                    <?php foreach ($subjects as $sub): ?>

                                        <option
                                            value="<?= $sub['id'] ?>">

                                            <?= htmlspecialchars(
                                                $sub['subject_name']
                                            ) ?>

                                        </option>

                                    <?php endforeach; ?>

                                </select>

                            </div>

                        </div>

                        <div class="table-responsive">

                            <table class="table table-hover matrix-table align-middle">

                                <thead>

                                    <tr>

                                        <th>Student</th>

                                        <th>Status</th>

                                    </tr>

                                </thead>

                                <tbody>

                                    <?php foreach ($students as $student): ?>

                                        <tr>

                                            <td class="fw-semibold">

                                                <?= htmlspecialchars(
                                                    $student['candidate_name']
                                                ) ?>

                                            </td>

                                            <td>

                                                <select
                                                    name="attendance[<?= $student['id'] ?>]"
                                                    class="form-select">

                                                    <option value="Present">

                                                        ✅ Present

                                                    </option>

                                                    <option value="Absent">

                                                        ❌ Absent

                                                    </option>

                                                </select>

                                            </td>

                                        </tr>

                                    <?php endforeach; ?>

                                </tbody>

                            </table>

                        </div>

                        <button
                            type="submit"
                            class="btn btn-primary">

                            💾 Save Daily Attendance

                        </button>

                    </form>
                </div>

            <?php endif; ?>
            <div class="mt-3">

                <button
                    class="btn btn-outline-primary"
                    type="button"
                    data-bs-toggle="collapse"
                    data-bs-target="#comparisonPanel">
                    Comparison
                </button>

            </div>

            <div class="collapse mt-3" id="comparisonPanel">

                <div class="cms-card p-3">

                    <form method="GET">

                        <?php foreach ($_GET as $key => $value): ?>

                            <?php if ($key !== 'comparison_type'): ?>

                                <input
                                    type="hidden"
                                    name="<?= htmlspecialchars($key) ?>"
                                    value="<?= htmlspecialchars($value) ?>">

                            <?php endif; ?>

                        <?php endforeach; ?>

                        <div class="row g-3 align-items-end">

                            <!-- LEFT SIDE -->

                            <div class="col-md-4">

                                <label class="form-label">
                                    Compare
                                </label>

                                <select
                                    name="compare_from"
                                    class="form-select">

                                    <option value="first_ia">
                                        First IA
                                    </option>

                                    <option value="second_ia">
                                        Second IA
                                    </option>

                                    <option value="mid_term">
                                        Mid Term
                                    </option>

                                </select>

                            </div>

                            <!-- RIGHT SIDE -->

                            <div class="col-md-4">

                                <label class="form-label">
                                    With
                                </label>

                                <select
                                    name="compare_to"
                                    class="form-select">

                                    <option value="second_ia">
                                        Second IA
                                    </option>

                                    <option value="mid_term">
                                        Mid Term
                                    </option>

                                    <option value="first_ia">
                                        First IA
                                    </option>

                                </select>

                            </div>

                            <!-- BUTTON -->

                            <div class="col-md-2">

                                <button
                                    type="submit"
                                    class="btn btn-primary w-100">
                                    Compare
                                </button>

                            </div>

                        </div>

                    </form>

                </div>

            </div>

            <?php

            /*
|--------------------------------------------------------------------------
| COMPARISON SELECTION
|--------------------------------------------------------------------------
*/

            $compareFrom =
                $_GET['compare_from']
                ?? 'first_ia';

            $compareTo =
                $_GET['compare_to']
                ?? 'second_ia';

            /*
|--------------------------------------------------------------------------
| FIELD LABELS
|--------------------------------------------------------------------------
*/

            $fieldLabels = [

                'first_ia' => 'First IA',

                'second_ia' => 'Second IA',

                'mid_term' => 'Mid Term'
            ];

            /*
|--------------------------------------------------------------------------
| CHART LABELS
|--------------------------------------------------------------------------
*/

            $chartLabels = [

                $fieldLabels[$compareFrom],

                $fieldLabels[$compareTo]
            ];

            /*
|--------------------------------------------------------------------------
| CALCULATE AVERAGES
|--------------------------------------------------------------------------
*/

            $fromAverage = 0;

            $toAverage = 0;

            $count =
                count($subjectPerformance);

            if ($count > 0) {

                foreach ($subjectPerformance as $subject) {

                    $fromAverage +=
                        $subject[$compareFrom] ?? 0;

                    $toAverage +=
                        $subject[$compareTo] ?? 0;
                }

                $fromAverage /= $count;

                $toAverage /= $count;
            }

            /*
|--------------------------------------------------------------------------
| FINAL CHART DATA
|--------------------------------------------------------------------------
*/

            $chartData = [

                round($fromAverage, 2),

                round($toAverage, 2)
            ];

            /*
|--------------------------------------------------------------------------
| COMPARISON INSIGHT
|--------------------------------------------------------------------------
*/

            $comparisonInsight = "";

            if ($compareFrom === 'first_ia' && $compareTo === 'second_ia') {

                if ($toAverage > $fromAverage) {

                    $comparisonInsight =
                        "Student shows improvement between IA 1 and IA 2.";
                } elseif ($toAverage < $fromAverage) {

                    $comparisonInsight =
                        "Student performance declined in IA 2.";
                } else {

                    $comparisonInsight =
                        "Student performance remained consistent across internal assessments.";
                }
            }

            /*
|--------------------------------------------------------------------------
| IA VS MID TERM
|--------------------------------------------------------------------------
*/ elseif (
                ($compareFrom === 'first_ia' || $compareFrom === 'second_ia')
                &&
                $compareTo === 'mid_term'
            ) {

                if ($toAverage > $fromAverage) {

                    $comparisonInsight =
                        "Student performs better in full syllabus examinations.";
                } elseif ($toAverage < $fromAverage) {

                    $comparisonInsight =
                        "Student struggles in long-duration or major exams.";
                } else {

                    $comparisonInsight =
                        "Student maintains similar performance across assessments.";
                }
            }

            /*
|--------------------------------------------------------------------------
| MID TERM VS IA
|--------------------------------------------------------------------------
*/ elseif (
                $compareFrom === 'mid_term'
                &&
                ($compareTo === 'first_ia' || $compareTo === 'second_ia')
            ) {

                if ($fromAverage > $toAverage) {

                    $comparisonInsight =
                        "Student demonstrates strong final exam capability.";
                } elseif ($fromAverage < $toAverage) {

                    $comparisonInsight =
                        "Internal assessment performance is stronger than exam performance.";
                } else {

                    $comparisonInsight =
                        "Performance consistency observed across evaluation types.";
                }
            }

            ?>

            <div class="row g-4 mb-4">
                <div class="col-lg-8">
                    <div class="cms-card p-4 h-100">
                        <h5 class="section-title">

                            <?= $fieldLabels[$compareFrom] ?>

                            vs

                            <?= $fieldLabels[$compareTo] ?>

                            Comparison

                            <?php if (!empty($selectedSubjectId) && !empty($subjects)): ?>

                                <?php
                                $selectedSubjectName = '';

                                foreach ($subjects as $sub) {

                                    if ($sub['id'] == $selectedSubjectId) {

                                        $selectedSubjectName =
                                            $sub['subject_name'];

                                        break;
                                    }
                                }
                                ?>

                                <small class="text-muted">
                                    - <?= htmlspecialchars($selectedSubjectName) ?>
                                </small>

                            <?php else: ?>

                                <small class="text-muted">
                                    - All Subjects
                                </small>

                            <?php endif; ?>

                        </h5>

                        <?php if (!empty($trend)): ?>
                            <canvas id="trendChart" height="120"></canvas>

                            <div class="alert alert-info mt-3 mb-0">

                                <strong>AI Comparison Insight:</strong>

                                <?= $comparisonInsight ?>

                            </div>
                        <?php else: ?>
                            <p class="text-muted text-center py-5 mb-0">
                                No chart data found.
                            </p>
                        <?php endif; ?>
                    </div>
                </div>

                <div class="col-lg-4">
                    <div class="cms-card p-4 h-100">
                        <h5 class="section-title">Attendance Summary</h5>

                        <div class="row g-3">
                            <div class="col-6">
                                <div class="border rounded p-3 text-center">
                                    <small class="text-muted">Total</small>
                                    <h4 class="fw-bold mb-0"><?= $totalDays ?></h4>
                                </div>
                            </div>

                            <div class="col-6">
                                <div class="border rounded p-3 text-center">
                                    <small class="text-muted">Present</small>
                                    <h4 class="fw-bold text-success mb-0"><?= $presentDays ?></h4>
                                </div>
                            </div>

                            <div class="col-6">
                                <div class="border rounded p-3 text-center">
                                    <small class="text-muted">Absent</small>
                                    <h4 class="fw-bold text-danger mb-0"><?= $absentDays ?></h4>
                                </div>
                            </div>

                            <div class="col-6">
                                <div class="border rounded p-3 text-center">
                                    <small class="text-muted">Shortage</small>
                                    <h4 class="fw-bold text-warning mb-0"><?= $shortage ?>%</h4>
                                </div>
                            </div>
                        </div>

                        <div class="mt-3">
                            <?php if ($attendancePercentage >= 75): ?>
                                <span class="badge bg-success px-3 py-2">Good Attendance</span>
                            <?php elseif ($attendancePercentage >= 60): ?>
                                <span class="badge bg-warning px-3 py-2">Attendance Warning</span>
                            <?php else: ?>
                                <span class="badge bg-danger px-3 py-2">Low Attendance</span>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            </div>

            <?php if ($userRole === 'faculty' && !empty($subjectPerformance)): ?>

                <div class="cms-card p-4 mb-4">
                    <div class="d-flex justify-content-between align-items-center flex-wrap gap-2 mb-3">
                        <div>
                            <h5 class="section-title mb-1">Update Student Marks</h5>
                            <p class="text-muted mb-0">
                                Faculty can update First IA, Second IA and Mid Term marks for the selected student.
                            </p>
                        </div>
                    </div>

                    <?php if (isset($_GET['marks_saved'])): ?>
                        <div class="alert alert-success">
                            Marks updated successfully.
                        </div>
                    <?php endif; ?>

                    <form method="POST" action="<?= BASE_URL ?>save-student-marks">
                        <input type="hidden" name="student_id" value="<?= htmlspecialchars($studentId) ?>">
                        <input type="hidden" name="redirect_url" value="<?= htmlspecialchars($_SERVER['REQUEST_URI']) ?>">

                        <div class="table-responsive">
                            <table class="table table-hover matrix-table align-middle">
                                <thead>
                                    <tr>
                                        <th>Subject</th>
                                        <th>First IA / 25</th>
                                        <th>Second IA / 25</th>
                                        <th>Mid Term / 50</th>
                                    </tr>
                                </thead>

                                <tbody>
                                    <?php foreach ($subjectPerformance as $row): ?>
                                        <tr>
                                            <td class="fw-semibold">
                                                <?= htmlspecialchars($row['subject_name']) ?>
                                            </td>

                                            <?php foreach ($examList as $exam): ?>
                                                <?php
                                                $examName = $exam['exam_name'];
                                                $value = 0;

                                                if ($examName === 'First IA') {
                                                    $value = $row['first_ia'] ?? 0;
                                                } elseif ($examName === 'Second IA') {
                                                    $value = $row['second_ia'] ?? 0;
                                                } elseif ($examName === 'Mid Term') {
                                                    $value = $row['mid_term'] ?? 0;
                                                }

                                                $maxMarks = $exam['total_marks'] ?? 100;
                                                ?>

                                                <td>
                                                    <input
                                                        type="number"
                                                        name="marks[<?= htmlspecialchars($row['subject_id']) ?>][<?= htmlspecialchars($exam['id']) ?>]"
                                                        value="<?= htmlspecialchars($value) ?>"
                                                        min="0"
                                                        max="<?= htmlspecialchars($maxMarks) ?>"
                                                        step="0.01"
                                                        class="form-control form-control-sm">
                                                </td>
                                            <?php endforeach; ?>
                                        </tr>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
                        </div>

                        <button type="submit" class="btn btn-primary">
                            💾 Save Marks
                        </button>
                    </form>
                </div>

            <?php endif; ?>

            <div class="cms-card p-4 mb-4">
                <div class="d-flex justify-content-between align-items-center flex-wrap gap-2 mb-3">
                    <h5 class="section-title mb-0">Subject Performance Matrix</h5>
                    <span class="text-muted small">First IA + Second IA + Mid Term</span>
                </div>

                <div class="table-responsive">
                    <?php if (!empty($subjectPerformance)): ?>
                        <table class="table table-hover matrix-table align-middle">
                            <thead>
                                <tr>
                                    <th>Subject</th>
                                    <th>First IA</th>
                                    <th>Second IA</th>
                                    <th>Mid Term</th>
                                    <th>Total</th>
                                    <th>%</th>
                                    <th>Grade</th>
                                    <th>Status</th>
                                    <th>Trend</th>
                                </tr>
                            </thead>

                            <tbody>
                                <?php foreach ($subjectPerformance as $row): ?>
                                    <?php
                                    $percentage = $row['percentage'] ?? 0;
                                    $firstIa = $row['first_ia'] ?? 0;
                                    $secondIa = $row['second_ia'] ?? 0;

                                    if ($percentage >= 75) {
                                        $grade = "A";
                                        $badge = "success";
                                        $subjectStatus = "Good";
                                    } elseif ($percentage >= 60) {
                                        $grade = "B";
                                        $badge = "primary";
                                        $subjectStatus = "Above Average";
                                    } elseif ($percentage >= 50) {
                                        $grade = "C";
                                        $badge = "warning";
                                        $subjectStatus = "Average";
                                    } elseif ($percentage >= 35) {
                                        $grade = "D";
                                        $badge = "danger";
                                        $subjectStatus = "Weak";
                                    } else {
                                        $grade = "F";
                                        $badge = "dark";
                                        $subjectStatus = "Fail";
                                    }

                                    if ($secondIa > $firstIa && $firstIa > 0) {
                                        $trendText = "Improving";
                                        $trendBadge = "success";
                                    } elseif ($secondIa < $firstIa && $firstIa > 0) {
                                        $trendText = "Dropped";
                                        $trendBadge = "danger";
                                    } else {
                                        $trendText = "Stable";
                                        $trendBadge = "secondary";
                                    }
                                    ?>

                                    <tr>
                                        <td class="fw-semibold">
                                            <?= htmlspecialchars($row['subject_name']) ?>
                                        </td>

                                        <td><?= htmlspecialchars($row['first_ia'] ?? 0) ?></td>
                                        <td><?= htmlspecialchars($row['second_ia'] ?? 0) ?></td>
                                        <td><?= htmlspecialchars($row['mid_term'] ?? 0) ?></td>

                                        <td>
                                            <?= htmlspecialchars($row['marks_obtained'] ?? 0) ?> /
                                            <?= htmlspecialchars($row['total_marks'] ?? 0) ?>
                                        </td>

                                        <td><?= htmlspecialchars($percentage) ?>%</td>

                                        <td>
                                            <span class="badge bg-<?= $badge ?>">
                                                <?= $grade ?>
                                            </span>
                                        </td>

                                        <td>
                                            <span class="badge bg-<?= $badge ?>">
                                                <?= $subjectStatus ?>
                                            </span>
                                        </td>

                                        <td>
                                            <span class="badge bg-<?= $trendBadge ?>">
                                                <?= $trendText ?>
                                            </span>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    <?php else: ?>
                        <p class="text-muted mb-0">No subject performance data found.</p>
                    <?php endif; ?>
                </div>
            </div>

            <div class="cms-card p-4 mb-4">
                <h5 class="section-title">Student vs Class Average</h5>

                <?php if (!empty($classAverage)): ?>
                    <div class="table-responsive">
                        <table class="table table-hover matrix-table align-middle">
                            <thead>
                                <tr>
                                    <th>Subject</th>
                                    <th>Student %</th>
                                    <th>Class Average %</th>
                                    <th>Difference</th>
                                    <th>Comparison</th>
                                </tr>
                            </thead>

                            <tbody>
                                <?php foreach ($classAverage as $avgRow): ?>
                                    <?php
                                    $studentPercentage = $avgRow['student_percentage'] ?? 0;
                                    $classAvg = $avgRow['class_average'] ?? 0;
                                    $difference = round($studentPercentage - $classAvg, 2);

                                    if ($difference > 0) {
                                        $comparison = "Above Class Average";
                                        $comparisonBadge = "success";
                                        $differenceText = "+" . $difference . "%";
                                    } elseif ($difference < 0) {
                                        $comparison = "Below Class Average";
                                        $comparisonBadge = "danger";
                                        $differenceText = $difference . "%";
                                    } else {
                                        $comparison = "Equal to Class Average";
                                        $comparisonBadge = "secondary";
                                        $differenceText = "0%";
                                    }
                                    ?>

                                    <tr>
                                        <td class="fw-semibold">
                                            <?= htmlspecialchars($avgRow['subject_name']) ?>
                                        </td>

                                        <td>
                                            <?= htmlspecialchars($studentPercentage) ?>%
                                        </td>

                                        <td>
                                            <?= htmlspecialchars($classAvg) ?>%
                                        </td>

                                        <td>
                                            <span class="badge bg-<?= $comparisonBadge ?>">
                                                <?= htmlspecialchars($differenceText) ?>
                                            </span>
                                        </td>

                                        <td>
                                            <span class="badge bg-<?= $comparisonBadge ?>">
                                                <?= htmlspecialchars($comparison) ?>
                                            </span>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                <?php else: ?>
                    <div class="alert alert-info mb-0">
                        No class average data found.
                    </div>
                <?php endif; ?>
            </div>

            <div class="cms-card p-4 mb-4">
                <h5 class="section-title">Improvement Plan</h5>

                <?php if (!empty($weakSubjects)): ?>
                    <div class="row g-3">
                        <?php foreach ($weakSubjects as $subject): ?>
                            <?php
                            $attendanceIssue =
                                $attendancePercentage < 60;

                            $midTerm =
                                $subject['mid_term'] ?? 0;

                            $firstIa =
                                $subject['first_ia'] ?? 0;

                            $secondIa =
                                $subject['second_ia'] ?? 0;

                            /*
|--------------------------------------------------------------------------
| PRIORITY
|--------------------------------------------------------------------------
*/

                            if ($percentage < 35) {

                                $priority = "Critical";
                                $tagClass = "badge-soft-red";
                            } elseif ($percentage < 50) {

                                $priority = "High";
                                $tagClass = "badge-soft-amber";
                            } elseif ($percentage < 70) {

                                $priority = "Moderate";
                                $tagClass = "badge-soft-blue";
                            } else {

                                $priority = "Stable";
                                $tagClass = "badge-soft-green";
                            }

                            /*
|--------------------------------------------------------------------------
| DYNAMIC SUBJECT ANALYSIS
|--------------------------------------------------------------------------
*/

                            $rootCause = [];
                            $recommendation = [];
                            $weeklyPlan = [];

                            /*
|--------------------------------------------------------------------------
| IA AVERAGE
|--------------------------------------------------------------------------
*/

                            $iaAverage =
                                ($firstIa + $secondIa) / 2;

                            /*
|--------------------------------------------------------------------------
| PERFORMANCE GAP
|--------------------------------------------------------------------------
*/

                            $gap =
                                $midTerm - $iaAverage;

                            /*
|--------------------------------------------------------------------------
| VERY LOW PERFORMANCE
|--------------------------------------------------------------------------
*/

                            if ($percentage < 35) {

                                $rootCause[] =
                                    "Weak conceptual understanding detected";

                                $recommendation[] =
                                    "Focus on core concepts and fundamentals.";

                                $weeklyPlan[] =
                                    "Revise weak topics daily.";

                                $weeklyPlan[] =
                                    "Attend additional practice sessions.";
                            }

                            /*
|--------------------------------------------------------------------------
| AVERAGE PERFORMANCE
|--------------------------------------------------------------------------
*/ elseif ($percentage >= 35 && $percentage < 60) {

                                $rootCause[] =
                                    "Needs stronger problem-solving consistency";

                                $recommendation[] =
                                    "Practice application-based questions regularly.";

                                $weeklyPlan[] =
                                    "Solve previous assessment questions weekly.";
                            }

                            /*
|--------------------------------------------------------------------------
| GOOD PERFORMANCE
|--------------------------------------------------------------------------
*/ elseif ($percentage >= 60 && $percentage < 80) {

                                $rootCause[] =
                                    "Capable student with improvement potential";

                                $recommendation[] =
                                    "Focus on advanced-level preparation.";

                                $weeklyPlan[] =
                                    "Attempt timed mock assessments.";
                            }

                            /*
|--------------------------------------------------------------------------
| EXCELLENT PERFORMANCE
|--------------------------------------------------------------------------
*/ else {

                                $rootCause[] =
                                    "Strong and consistent academic performance";

                                $recommendation[] =
                                    "Maintain current preparation strategy.";

                                $weeklyPlan[] =
                                    "Focus on advanced problem-solving practice.";
                            }

                            /*
|--------------------------------------------------------------------------
| IMPROVEMENT TREND
|--------------------------------------------------------------------------
*/

                            if ($secondIa > $firstIa) {

                                $rootCause[] =
                                    "Positive improvement trend observed";

                                $recommendation[] =
                                    "Maintain revision consistency.";

                                $weeklyPlan[] =
                                    "Continue weekly self-assessment.";
                            }

                            /*
|--------------------------------------------------------------------------
| DECLINING TREND
|--------------------------------------------------------------------------
*/

                            if ($secondIa < $firstIa) {

                                $rootCause[] =
                                    "Recent performance decline detected";

                                $recommendation[] =
                                    "Analyze mistakes from previous assessments.";

                                $weeklyPlan[] =
                                    "Review incorrect answers every weekend.";
                            }

                            /*
|--------------------------------------------------------------------------
| MID TERM DROP
|--------------------------------------------------------------------------
*/

                            if ($gap < -10) {

                                $rootCause[] =
                                    "Difficulty handling long-duration exams";

                                $recommendation[] =
                                    "Practice full-length mock tests.";

                                $weeklyPlan[] =
                                    "Solve one model paper weekly.";
                            }

                            /*
|--------------------------------------------------------------------------
| MID TERM IMPROVEMENT
|--------------------------------------------------------------------------
*/

                            if ($gap > 10) {

                                $rootCause[] =
                                    "Better performance under final exam conditions";

                                $recommendation[] =
                                    "Start preparation earlier for internal assessments.";

                                $weeklyPlan[] =
                                    "Maintain balanced semester preparation.";
                            }

                            /*
|--------------------------------------------------------------------------
| LOW ATTENDANCE
|--------------------------------------------------------------------------
*/

                            if ($attendancePercentage < 50) {

                                $rootCause[] =
                                    "Low attendance affecting subject understanding";

                                $recommendation[] =
                                    "Improve classroom participation and attendance.";

                                $weeklyPlan[] =
                                    "Attend all upcoming classes regularly.";
                            }

                            /*
|--------------------------------------------------------------------------
| TARGET SCORE
|--------------------------------------------------------------------------
*/

                            $target =
                                min(100, round($percentage + 12));

                            /*
|--------------------------------------------------------------------------
| INTERVENTION LEVEL
|--------------------------------------------------------------------------
*/

                            if ($percentage < 35 || $attendancePercentage < 40) {

                                $intervention =
                                    "Critical Faculty Mentoring Required";
                            } elseif ($percentage < 50) {

                                $intervention =
                                    "Faculty Follow-up Required";
                            } elseif ($percentage < 70) {

                                $intervention =
                                    "Regular Progress Monitoring";
                            } else {

                                $intervention =
                                    "Self-Driven Improvement";
                            }
                            $priority === 'Medium' ? 'Monitor Closely' : 'Standard Support';

                            /*
|--------------------------------------------------------------------------
| DISPLAY SUBJECT-WISE PERFORMANCE
|--------------------------------------------------------------------------
*/

                            ?>

                            <div class="col-md-4">
                                <div class="border rounded p-3 h-100">
                                    <h6 class="fw-bold mb-2">
                                        <?= htmlspecialchars($subject['subject_name']) ?>
                                    </h6>

                                    <span class="soft-badge <?= $tagClass ?>">
                                        <?= htmlspecialchars($percentage) ?>%
                                    </span>

                                    <p class="mb-1 mt-3">
                                        <strong>Priority:</strong>
                                        <?= $priority ?>
                                    </p>

                                    <p class="mb-1">
                                        <strong>Root Cause:</strong><br>

                                        <?php foreach ($rootCause as $cause): ?>

                                            • <?= htmlspecialchars($cause) ?><br>

                                        <?php endforeach; ?>
                                    </p>

                                    <p class="mb-1">
                                        <strong>AI Recommendation:</strong><br>

                                        <?php foreach ($recommendation as $rec): ?>

                                            • <?= htmlspecialchars($rec) ?><br>

                                        <?php endforeach; ?>
                                    </p>

                                    <p class="mb-1">
                                        <strong>Weekly Plan:</strong><br>

                                        <?php foreach ($weeklyPlan as $week): ?>

                                            • <?= htmlspecialchars($week) ?><br>

                                        <?php endforeach; ?>
                                    </p>

                                    <p class="mb-1">
                                        <strong>Target Score:</strong>
                                        <?= $target ?>%
                                    </p>

                                    <p class="mb-0">
                                        <strong>Intervention:</strong>
                                        <?= htmlspecialchars($intervention) ?>
                                    </p>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    </div>
                <?php else: ?>
                    <div class="alert alert-success mb-0">
                        No weak subjects found. Student performance is good in all subjects.
                    </div>
                <?php endif; ?>
            </div>

            <?php if ($userRole !== 'student'): ?>
                <div class="cms-card action-card p-4 mb-4">
                    <div class="d-flex justify-content-between align-items-center flex-wrap gap-3">
                        <div>
                            <h5 class="section-title mb-1">Parent Alert & Export</h5>
                            <p class="text-muted mb-0">
                                Send performance alert to parent or export the report.
                            </p>
                        </div>

                        <div class="d-flex gap-2 flex-wrap pdf-hide">
                            <?php if (!empty($whatsappUrl)): ?>
                                <a href="<?= htmlspecialchars($whatsappUrl) ?>" target="_blank" class="btn btn-success">
                                    📲 Send WhatsApp Alert
                                </a>
                            <?php else: ?>
                                <button class="btn btn-outline-warning" disabled>
                                    Parent Phone Not Added
                                </button>
                            <?php endif; ?>

                            <button type="button" onclick="downloadPDF()" class="btn btn-primary">
                                📄 Download Report
                            </button>

                            <button type="button" onclick="window.print()" class="btn btn-outline-dark">
                                🖨 Print
                            </button>

                            <a href="<?= BASE_URL ?>student-performance" class="btn btn-secondary">
                                ← Back
                            </a>
                        </div>
                    </div>
                </div>
            <?php endif; ?>

            <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
            <script>
                const chartElement = document.getElementById('trendChart');

                if (chartElement) {
                    const labels =
                        <?= json_encode($chartLabels) ?>;

                    const data =
                        <?= json_encode($chartData) ?>;
                    const attendance = <?= json_encode($attendancePercentage ?? 0) ?>;

                    function getReason(index) {
                        const current = data[index];
                        const previous = index > 0 ? data[index - 1] : null;

                        if (previous === null) return "Starting performance baseline.";

                        if (current < previous) {
                            if (attendance < 60) return "Low attendance → performance drop.";
                            if (attendance < 75) return "Needs more revision & practice.";
                            return "Drop despite good attendance → check assignments.";
                        }

                        if (current > previous) {
                            if (attendance >= 75) return "Strong improvement due to consistency.";
                            return "Improvement seen but attendance can improve.";
                        }

                        return "Stable performance.";
                    }

                    function getColor(index) {
                        const current = data[index];
                        const previous = index > 0 ? data[index - 1] : null;

                        if (previous === null) return '#3b82f6'; // blue

                        if (current > previous) return '#16a34a'; // green
                        if (current < previous) return '#dc2626'; // red

                        return '#f59e0b'; // amber
                    }

                    const backgroundColors = data.map((_, i) => getColor(i));

                    new Chart(chartElement, {
                        type: 'bar',
                        data: {
                            labels: labels,
                            datasets: [{
                                label: 'Marks',
                                data: data,
                                backgroundColor: backgroundColors,
                                borderRadius: 8
                            }]
                        },
                        options: {
                            responsive: true,
                            plugins: {
                                tooltip: {
                                    callbacks: {
                                        label: function(context) {
                                            const index = context.dataIndex;
                                            return [
                                                "Marks: " + context.raw,
                                                "Insight: " + getReason(index)
                                            ];
                                        }
                                    }
                                }
                            },
                            scales: {
                                y: {
                                    beginAtZero: true
                                }
                            }
                        }
                    });

                    // 🔥 INSIGHT BOX UPDATE
                    const insightBox = document.getElementById('trendInsight');

                    if (insightBox && data.length > 0) {

                        let lastIndex = data.length - 1;

                        insightBox.innerText =
                            <?= json_encode($insightComment) ?>

                    } else if (insightBox) {

                        insightBox.innerText =
                            "No trend insight available.";
                    }
                }
            </script>

            <div class="cms-card p-3 mt-3" id="trendInsightBox">
                <strong>📊 Latest Insight:</strong>
                <p id="trendInsight" class="mb-0 text-muted">
                    Loading insight...
                </p>
            </div>

        <?php elseif ($userRole !== 'admin'): ?>

            <div class="cms-card p-5 text-center">
                <h5 class="fw-bold">Select a student to view performance analytics</h5>
                <p class="text-muted mb-0">
                    Choose a student from the filter section and click View.
                </p>
            </div>

        <?php endif; ?>

    </div>
</div>

<script>
    function downloadPDF() {
        const printWindow = window.open('', '_blank', 'width=1000,height=800');

        const studentName = <?= json_encode($studentName ?? 'Student') ?>;
        const rollNo = <?= json_encode($studentProfile['roll_no'] ?? $studentProfile['register_no'] ?? 'Not Added') ?>;
        const course = <?= json_encode($studentProfile['department'] ?? 'BCA') ?>;
        const semester = <?= json_encode($studentProfile['semester'] ?? 'Not Added') ?>;
        const section = <?= json_encode($studentProfile['section'] ?? 'Not Added') ?>;
        const academicYear = <?= json_encode($studentProfile['academic_year'] ?? '2025-26') ?>;

        const overall = <?= json_encode($avgMarks ?? 0) ?>;
        const attendancePercent = <?= json_encode($attendancePercentage ?? 0) ?>;
        const totalDays = <?= json_encode($totalDays ?? 0) ?>;
        const presentDays = <?= json_encode($presentDays ?? 0) ?>;
        const absentDays = <?= json_encode($absentDays ?? 0) ?>;
        const riskLevel = <?= json_encode($riskLevel ?? 'N/A') ?>;
        const status = <?= json_encode($status ?? 'N/A') ?>;

        const classRank = <?= json_encode(!empty($classRank) ? ($classRank['student_rank'] . ' / ' . $classRank['total_students']) : 'N/A') ?>;

        const insight = <?= json_encode($insightComment ?? 'Performance insight is not available.') ?>;
        const action = <?= json_encode($recommendedAction ?? 'Continue regular preparation and academic improvement.') ?>;

        const subjectRows = `
        <?php if (!empty($subjectPerformance)): ?>
            <?php foreach ($subjectPerformance as $row): ?>
                <?php
                $percentage = $row['percentage'] ?? 0;

                if ($percentage >= 75) {
                    $grade = "A";
                    $subjectStatus = "Good";
                } elseif ($percentage >= 60) {
                    $grade = "B";
                    $subjectStatus = "Above Average";
                } elseif ($percentage >= 50) {
                    $grade = "C";
                    $subjectStatus = "Average";
                } elseif ($percentage >= 35) {
                    $grade = "D";
                    $subjectStatus = "Weak";
                } else {
                    $grade = "F";
                    $subjectStatus = "Fail";
                }
                ?>
                <tr>
                    <td><?= htmlspecialchars($row['subject_name']) ?></td>
                    <td><?= htmlspecialchars($row['first_ia'] ?? 0) ?>/25</td>
                    <td><?= htmlspecialchars($row['second_ia'] ?? 0) ?>/25</td>
                    <td><?= htmlspecialchars($row['mid_term'] ?? 0) ?>/50</td>
                    <td><?= htmlspecialchars($row['marks_obtained'] ?? 0) ?> / <?= htmlspecialchars($row['total_marks'] ?? 0) ?></td>
                    <td><?= htmlspecialchars($percentage) ?>%</td>
                    <td><?= $grade ?></td>
                    <td><?= $subjectStatus ?></td>
                </tr>
            <?php endforeach; ?>
        <?php else: ?>
            <tr>
                <td colspan="8" style="text-align:center;">No subject performance data found</td>
            </tr>
        <?php endif; ?>
        `;

        const improvementRows = `
        <?php if (!empty($weakSubjects)): ?>
            <?php foreach ($weakSubjects as $subject): ?>
                <?php

                /*
|--------------------------------------------------------------------------
| SUBJECT VALUES
|--------------------------------------------------------------------------
*/

                $percentage =
                    $subject['percentage'] ?? 0;

                $firstIa =
                    $subject['first_ia'] ?? 0;

                $secondIa =
                    $subject['second_ia'] ?? 0;

                $midTerm =
                    $subject['mid_term'] ?? 0;

                ?>
                <?php
                $weakPercentage = $subject['percentage'] ?? 0;

                if ($weakPercentage < 35) {
                    $weakArea = "Critical";
                    $suggestion = "Attend remedial classes and revise basic concepts.";
                    $target = "Improve to 50%+";
                } else {
                    $weakArea = "Needs Improvement";
                    $suggestion = "Practice important questions and previous papers.";
                    $target = "Improve to 60%+";
                }
                ?>
                <tr>
                    <td><?= htmlspecialchars($subject['subject_name']) ?></td>
                    <td><?= htmlspecialchars($weakPercentage) ?>%</td>
                    <td><?= $weakArea ?></td>
                    <td><?= $suggestion ?></td>
                    <td><?= $target ?></td>
                </tr>
            <?php endforeach; ?>
        <?php else: ?>
            <tr>
                <td colspan="5" style="text-align:center;">No weak subjects found. Student performance is satisfactory.</td>
            </tr>
        <?php endif; ?>
        `;

        let attendanceStatus = "Low Attendance";

        if (attendancePercent >= 75) {
            attendanceStatus = "Good Attendance";
        } else if (attendancePercent >= 60) {
            attendanceStatus = "Attendance Warning";
        }

        let parentNote = "The student should maintain regular attendance and improve preparation in weaker areas.";
        let teacherNote = "Student should attend revision sessions and submit all assignments on time before the next IA.";

        if (overall >= 75 && attendancePercent >= 75) {
            parentNote = "The student is performing very well with good attendance and consistent academic preparation.";
            teacherNote = "Student should continue the same consistency and participate in advanced learning activities.";
        } else if (overall < 50 || attendancePercent < 60) {
            parentNote = "The student needs immediate academic attention due to low performance or attendance concerns.";
            teacherNote = "Parent follow-up, remedial classes, regular revision, and assignment completion are strongly recommended.";
        }

        printWindow.document.write(`
        <!DOCTYPE html>
        <html>
        <head>
            <title>Student Performance Report</title>

            <style>
                * {
                    box-sizing: border-box;
                }

                body {
                    margin: 0;
                    padding: 18px;
                    font-family: Arial, sans-serif;
                    background: #ffffff;
                    color: #111827;
                    font-size: 12px;
                }

                .report {
                    max-width: 900px;
                    margin: 0 auto;
                }

                .main-header {
                    background: #1e2535;
                    color: #ffffff;
                    padding: 18px 22px;
                    border-radius: 10px;
                    text-align: center;
                    margin-bottom: 14px;
                }

                .main-header h1 {
                    margin: 0;
                    font-size: 22px;
                    letter-spacing: 0.5px;
                    text-transform: uppercase;
                }

                .main-header h2 {
                    margin: 5px 0 0;
                    font-size: 18px;
                    font-weight: 600;
                }

                .main-header p {
                    margin: 8px 0 0;
                    font-size: 12px;
                    opacity: 0.95;
                }

                .section {
                    border: 1px solid #d1d5db;
                    border-radius: 10px;
                    padding: 13px;
                    margin-bottom: 12px;
                    page-break-inside: avoid;
                }

                .section-title {
                    margin: 0 0 10px;
                    font-size: 15px;
                    color: #92400e;
                    font-weight: 700;
                    border-bottom: 1px solid #e5e7eb;
                    padding-bottom: 6px;
                }

                .grid-2 {
                    display: grid;
                    grid-template-columns: 1fr 1fr;
                    gap: 8px 18px;
                }

                .grid-3 {
                    display: grid;
                    grid-template-columns: repeat(3, 1fr);
                    gap: 8px;
                }

                .info-row {
                    display: flex;
                    gap: 6px;
                }

                .label {
                    min-width: 105px;
                    color: #6b7280;
                    font-weight: 600;
                }

                .value {
                    font-weight: 700;
                    color: #111827;
                }

                .summary-box {
                    background: #fff8ee;
                    border: 1px solid #fde68a;
                    border-radius: 8px;
                    padding: 10px;
                }

                .summary-box .label {
                    display: block;
                    min-width: auto;
                    font-size: 11px;
                    text-transform: uppercase;
                    margin-bottom: 4px;
                }

                .summary-box .value {
                    font-size: 16px;
                }

                table {
                    width: 100%;
                    border-collapse: collapse;
                    font-size: 11.5px;
                }

                th {
                    background: #fff8ee;
                    color: #92400e;
                    text-align: left;
                    font-weight: 700;
                }

                th, td {
                    border: 1px solid #d1d5db;
                    padding: 7px;
                    vertical-align: top;
                }

                .insight-box {
                    background: #fff8ee;
                    border-left: 5px solid #f59e0b;
                    padding: 11px;
                    border-radius: 8px;
                    line-height: 1.45;
                }

                .note-box {
                    background: #f9fafb;
                    border: 1px solid #e5e7eb;
                    border-radius: 8px;
                    padding: 10px;
                    line-height: 1.45;
                }

                .footer {
                    margin-top: 18px;
                    display: flex;
                    justify-content: space-between;
                    color: #374151;
                    font-size: 11px;
                }

                .signature {
                    margin-top: 30px;
                    text-align: right;
                    font-weight: 700;
                }

                @page {
                    size: A4;
                    margin: 10mm;
                }

                @media print {
                    body {
                        -webkit-print-color-adjust: exact;
                        print-color-adjust: exact;
                    }
                }
            </style>
        </head>

        <body>
            <div class="report">

                <div class="main-header">
                    <h1>College Management System</h1>
                    <h2>Student Performance Report</h2>
                    <p>Academic Year: ${academicYear} | Report Date: <?= date('d M Y') ?></p>
                </div>

                <div class="section">
                    <h3 class="section-title">Student Details</h3>
                    <div class="grid-2">
                        <div class="info-row">
                            <span class="label">Student Name:</span>
                            <span class="value">${studentName}</span>
                        </div>
                        <div class="info-row">
                            <span class="label">Roll No:</span>
                            <span class="value">${rollNo}</span>
                        </div>
                        <div class="info-row">
                            <span class="label">Course:</span>
                            <span class="value">${course}</span>
                        </div>
                        <div class="info-row">
                            <span class="label">Semester:</span>
                            <span class="value">${semester}</span>
                        </div>
                        <div class="info-row">
                            <span class="label">Section:</span>
                            <span class="value">${section}</span>
                        </div>
                        <div class="info-row">
                            <span class="label">Report Type:</span>
                            <span class="value">Internal Assessment Report</span>
                        </div>
                    </div>
                </div>

                <div class="section">
                    <h3 class="section-title">Academic Summary</h3>
                    <div class="grid-3">
                        <div class="summary-box">
                            <span class="label">Overall Percentage</span>
                            <span class="value">${overall}%</span>
                        </div>
                        <div class="summary-box">
                            <span class="label">Attendance</span>
                            <span class="value">${attendancePercent}%</span>
                        </div>
                        <div class="summary-box">
                            <span class="label">Class Rank</span>
                            <span class="value">${classRank}</span>
                        </div>
                        <div class="summary-box">
                            <span class="label">Risk Level</span>
                            <span class="value">${riskLevel}</span>
                        </div>
                        <div class="summary-box">
                            <span class="label">Status</span>
                            <span class="value">${status}</span>
                        </div>
                        <div class="summary-box">
                            <span class="label">Assessment</span>
                            <span class="value">IA + Mid Term</span>
                        </div>
                    </div>
                </div>

                <div class="section">
                    <h3 class="section-title">Subject Performance</h3>
                    <table>
                        <thead>
                            <tr>
                                <th>Subject</th>
                                <th>First IA</th>
                                <th>Second IA</th>
                                <th>Mid Term</th>
                                <th>Total</th>
                                <th>%</th>
                                <th>Grade</th>
                                <th>Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            ${subjectRows}
                        </tbody>
                    </table>
                </div>

                <div class="section">
                    <h3 class="section-title">Academic Insight</h3>
                    <div class="insight-box">
                        <strong>Performance Reason:</strong><br>
                        ${insight}
                        <br><br>
                        <strong>Recommended Action:</strong><br>
                        ${action}
                    </div>
                </div>

                <div class="section">
                    <h3 class="section-title">Attendance Summary</h3>
                    <div class="grid-3">
                        <div class="summary-box">
                            <span class="label">Total Days</span>
                            <span class="value">${totalDays}</span>
                        </div>
                        <div class="summary-box">
                            <span class="label">Present Days</span>
                            <span class="value">${presentDays}</span>
                        </div>
                        <div class="summary-box">
                            <span class="label">Absent Days</span>
                            <span class="value">${absentDays}</span>
                        </div>
                        <div class="summary-box">
                            <span class="label">Attendance %</span>
                            <span class="value">${attendancePercent}%</span>
                        </div>
                        <div class="summary-box">
                            <span class="label">Attendance Status</span>
                            <span class="value">${attendanceStatus}</span>
                        </div>
                        <div class="summary-box">
                            <span class="label">Minimum Required</span>
                            <span class="value">75%</span>
                        </div>
                    </div>
                </div>

                <div class="section">
                    <h3 class="section-title">Improvement Plan</h3>
                    <table>
                        <thead>
                            <tr>
                                <th>Weak Area</th>
                                <th>Current %</th>
                                <th>Level</th>
                                <th>Suggested Action</th>
                                <th>Target</th>
                            </tr>
                        </thead>
                        <tbody>
                            ${improvementRows}
                        </tbody>
                    </table>
                </div>

                <div class="section">
                    <h3 class="section-title">Parent / Teacher Note</h3>
                    <div class="grid-2">
                        <div class="note-box">
                            <strong>Parent Note</strong><br>
                            ${parentNote}
                        </div>
                        <div class="note-box">
                            <strong>Teacher Note</strong><br>
                            ${teacherNote}
                        </div>
                    </div>
                </div>

                <div class="footer">
                    <div>Generated by: College Management System</div>
                    <div>Confidential Academic Report</div>
                </div>

                <div class="signature">
                    Teacher / Admin Signature: ______________________
                </div>

            </div>

            <script>
                window.onload = function() {
                    setTimeout(function() {
                        window.print();
                    }, 500);
                };
            <\/script>
        </body>
        </html>
        `);

        printWindow.document.close();
    }
</script>

<?php include __DIR__ . '/../layouts/footer.php'; ?>