<?php include __DIR__ . '/../layouts/header.php'; ?>
<?php
$userRole = strtolower($_SESSION['role'] ?? '');
?>

<style>
    :root {
        --cms-bg: #f4f7fb;
        --cms-card: #ffffff;
        --cms-primary: #1e3a8a;
        --cms-primary-light: #dbeafe;
        --cms-accent: #4f46e5;
        --cms-success: #16a34a;
        --cms-warning: #f59e0b;
        --cms-danger: #dc2626;
        --cms-info: #0284c7;
        --cms-text: #1f2937;
        --cms-muted: #6b7280;
        --cms-border: #e5e7eb;
    }

    body {
        background: var(--cms-bg);
        color: var(--cms-text);
    }

    .analytics-wrapper {
        background: var(--cms-bg);
        min-height: 100vh;
    }

    .hero-card {
        background: linear-gradient(135deg, var(--cms-primary), var(--cms-accent));
        color: #fff;
        border-radius: 20px;
        padding: 28px;
        box-shadow: 0 15px 35px rgba(30, 58, 138, 0.25);
    }

    .cms-card {
        background: var(--cms-card);
        border: 1px solid var(--cms-border);
        border-radius: 18px;
        box-shadow: 0 10px 25px rgba(15, 23, 42, 0.06);
    }

    .section-title {
        font-weight: 700;
        color: var(--cms-text);
        margin-bottom: 14px;
    }

    .profile-banner {
        border-left: 6px solid var(--cms-primary);
    }

    .avatar-circle {
        width: 62px;
        height: 62px;
        border-radius: 50%;
        background: var(--cms-primary-light);
        color: var(--cms-primary);
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 28px;
        font-weight: 700;
    }

    .kpi-card {
        border-radius: 18px;
        padding: 20px;
        border: 1px solid var(--cms-border);
        background: #fff;
        height: 100%;
        box-shadow: 0 8px 20px rgba(15, 23, 42, 0.05);
    }

    .kpi-label {
        font-size: 13px;
        color: var(--cms-muted);
        font-weight: 600;
    }

    .kpi-value {
        font-size: 28px;
        font-weight: 800;
        margin-top: 8px;
    }

    .kpi-blue {
        background: #dbeafe;
        color: #1e3a8a;
    }

    .kpi-green {
        background: #dcfce7;
        color: #166534;
    }

    .kpi-indigo {
        background: #e0e7ff;
        color: #3730a3;
    }

    .kpi-red {
        background: #fee2e2;
        color: #991b1b;
    }

    .kpi-amber {
        background: #fef3c7;
        color: #92400e;
    }

    .insight-card {
        background: #eff6ff;
        border-left: 6px solid var(--cms-primary);
    }

    .soft-badge {
        padding: 7px 11px;
        border-radius: 30px;
        font-size: 12px;
        font-weight: 600;
        display: inline-block;
        margin: 3px;
    }

    .badge-soft-blue {
        background: #dbeafe;
        color: #1e3a8a;
    }

    .badge-soft-green {
        background: #dcfce7;
        color: #166534;
    }

    .badge-soft-amber {
        background: #fef3c7;
        color: #92400e;
    }

    .badge-soft-red {
        background: #fee2e2;
        color: #991b1b;
    }

    .matrix-table th {
        background: #f8fafc;
        color: #334155;
        font-size: 13px;
        text-transform: uppercase;
    }

    .matrix-table td {
        vertical-align: middle;
    }

    .action-card {
        background: linear-gradient(135deg, #ffffff, #f8fafc);
    }

    .fade-in {
        animation: fadeIn 0.6s ease-in;
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

    /* PDF FIX */
    .pdf-hide {
        display: inline-block;
    }

    @media print {

        .pdf-hide,
        form,
        .btn,
        .hero-card .d-flex.gap-2 {
            display: none !important;
        }

        body {
            background: #ffffff !important;
        }

        .analytics-wrapper {
            background: #ffffff !important;
        }

        .cms-card,
        .hero-card,
        .kpi-card {
            box-shadow: none !important;
            border: 1px solid #ddd !important;
        }

        .hero-card {
            color: #000 !important;
            background: #ffffff !important;
        }
    }
</style>

<div class="analytics-wrapper py-4 fade-in" id="reportContent">
    <div class="container-fluid px-4">

        <!-- PAGE HEADER -->
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

                    <a href="<?= BASE_URL ?>dashboard" class="btn btn-outline-light fw-semibold">
                        ← Back
                    </a>
                </div>
            </div>
        </div>

        <!-- FILTERS -->
        <div class="cms-card p-4 mb-4">
            <h5 class="section-title">Filters</h5>

            <form method="GET" action="<?= BASE_URL ?>student-performance">
                <input type="hidden" name="url" value="student-performance">

                <div class="row g-3 align-items-end">

                    <?php if ($userRole === 'admin'): ?>

                        <!-- Academic Year -->
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

                        <!-- Course -->
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

                        <!-- Semester -->
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

                        <!-- Button -->
                        <div class="col-md-3">
                            <button class="btn btn-primary w-100">
                                View Summary
                            </button>
                        </div>

                    <?php elseif ($userRole === 'faculty'): ?>

                        <!-- Academic Year -->
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

                        <!-- Course -->
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

                        <!-- Semester -->
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

                        <!-- Section -->
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

                        <!-- Student -->
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

                        <!-- Subject -->
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

                        <!-- Button -->
                        <div class="col-md-1">
                            <button class="btn btn-primary w-100">
                                View
                            </button>
                        </div>

                    <?php elseif ($userRole === 'student'): ?>

                        <!-- Subject only -->
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

                        <!-- Button -->
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

            <!-- ADMIN SUMMARY KPI -->
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

            <!-- SEMESTER COMPARISON -->
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

            <!-- ADMIN INSIGHT -->
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
            $attendancePercentage = $attendance['attendance_percentage'] ?? 0;
            $totalDays = $attendance['total_days'] ?? 0;
            $presentDays = $attendance['present_days'] ?? 0;
            $absentDays = $totalDays - $presentDays;
            $requiredAttendance = 75;
            $shortage = max(0, $requiredAttendance - $attendancePercentage);

            $failedSubjects = 0;
            $weakSubjectCount = count($weakSubjects);

            if (!empty($subjectPerformance)) {
                foreach ($subjectPerformance as $subPerf) {
                    if (($subPerf['percentage'] ?? 0) < 35) {
                        $failedSubjects++;
                    }
                }
            }

            if ($failedSubjects > 0) {
                $status = "Critical";
                $statusClass = "danger";
                $riskLevel = "Critical Risk";
                $riskKpiClass = "kpi-red";
            } elseif ($avgMarks >= 75 && $attendancePercentage >= 75) {
                $status = "Excellent";
                $statusClass = "success";
                $riskLevel = "Low Risk";
                $riskKpiClass = "kpi-green";
            } elseif ($avgMarks >= 50 && $attendancePercentage >= 60) {
                $status = "Average";
                $statusClass = "warning";
                $riskLevel = "Medium Risk";
                $riskKpiClass = "kpi-amber";
            } else {
                $status = "Needs Improvement";
                $statusClass = "danger";
                $riskLevel = "High Risk";
                $riskKpiClass = "kpi-red";
            }

            $reasonTags = [];
            $insightComment = "";
            $recommendedAction = "";

            if ($failedSubjects > 0) {
                $reasonTags = ["Failed Subject", "Weak Concepts", "Needs Revision", "Parent Follow-up"];
                $insightComment = "The student has failed in one or more subjects. This may be due to irregular attendance, incomplete preparation, weak understanding of basic concepts, and lack of consistent academic effort.";
                $recommendedAction = "Immediate remedial classes, weekly progress monitoring, and parent follow-up are recommended.";
            } elseif ($avgMarks >= 75 && $attendancePercentage >= 75) {
                $reasonTags = ["Regular Attendance", "Attentive in Class", "Good IA Score", "Consistent Preparation"];
                $insightComment = "The student is performing well due to regular attendance, classroom attentiveness, consistent preparation, and good performance in internal assessments.";
                $recommendedAction = "Continue the same consistency and encourage advanced learning activities.";
            } elseif ($avgMarks >= 50) {
                $reasonTags = ["Average Performance", "Needs Revision", "Improve Answer Writing", "Practice Required"];
                $insightComment = "The student has average academic performance. The result indicates basic subject understanding, but more revision, answer-writing practice, and consistent preparation are required.";
                $recommendedAction = "Focus on weak subjects, revise important topics, and practice previous question papers.";
            } else {
                $reasonTags = ["Low Marks", "Weak Subjects", "Poor Preparation", "Needs Parent Follow-up"];
                $insightComment = "The student’s performance is weak mainly due to lack of consistent preparation, weak subject understanding, insufficient revision, and possible irregular academic involvement.";
                $recommendedAction = "Parent meeting, remedial classes, and regular assignment completion should be prioritized.";
            }

            $studentName = $studentProfile['candidate_name'] ?? $overview['candidate_name'] ?? 'Student';
            $parentPhone = $studentProfile['parent_phone'] ?? $studentProfile['phone'] ?? '';

            $whatsappMessage = "Dear Parent, Performance report of " . $studentName .
                ": Overall " . $avgMarks . "%, Attendance " . $attendancePercentage .
                "%. Status: " . $status . ". Recommended Action: " . $recommendedAction;

            $whatsappUrl = "";
            if (!empty($parentPhone)) {
                $cleanPhone = preg_replace('/[^0-9]/', '', $parentPhone);

                if (strlen($cleanPhone) == 10) {
                    $cleanPhone = "91" . $cleanPhone;
                }

                $whatsappUrl = "https://wa.me/" . $cleanPhone . "?text=" . urlencode($whatsappMessage);
            }
            ?>

            <!-- STUDENT PROFILE BANNER -->
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

            <!-- KPI CARDS -->
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

            <!-- TEACHER NOTE -->
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

            <!-- ACADEMIC INSIGHT -->
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

    <!-- FACULTY ATTENDANCE UPDATE -->
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

        <form method="POST" action="<?= BASE_URL ?>save-student-attendance">
            <input type="hidden" name="student_id" value="<?= htmlspecialchars($studentId) ?>">
            <input type="hidden" name="redirect_url" value="<?= htmlspecialchars($_SERVER['REQUEST_URI']) ?>">

            <div class="row g-3 align-items-end">
                <div class="col-md-3">
                    <label class="form-label small text-muted">Present Days</label>
                    <input 
                        type="number"
                        name="present_days"
                        class="form-control"
                        min="0"
                        value="<?= htmlspecialchars($presentDays ?? 0) ?>"
                        required
                    >
                </div>

                <div class="col-md-3">
                    <label class="form-label small text-muted">Absent Days</label>
                    <input 
                        type="number"
                        name="absent_days"
                        class="form-control"
                        min="0"
                        value="<?= htmlspecialchars($absentDays ?? 0) ?>"
                        required
                    >
                </div>

                <div class="col-md-3">
                    <label class="form-label small text-muted">Total Days</label>
                    <input 
                        type="text"
                        class="form-control"
                        value="<?= htmlspecialchars(($presentDays ?? 0) + ($absentDays ?? 0)) ?>"
                        readonly
                    >
                </div>

                <div class="col-md-3">
                    <button type="submit" class="btn btn-primary w-100">
                        💾 Save Attendance
                    </button>
                </div>
            </div>
        </form>
    </div>

<?php endif; ?>

            <!-- CHART + ATTENDANCE SUMMARY -->
            <div class="row g-4 mb-4">
                <div class="col-lg-8">
                    <div class="cms-card p-4 h-100">
                        <h5 class="section-title">
                            Performance Trend
                            <?php if (!empty($selectedSubjectId) && !empty($subjects)): ?>
                                <?php
                                $selectedSubjectName = '';
                                foreach ($subjects as $sub) {
                                    if ($sub['id'] == $selectedSubjectId) {
                                        $selectedSubjectName = $sub['subject_name'];
                                        break;
                                    }
                                }
                                ?>
                                <small class="text-muted">- <?= htmlspecialchars($selectedSubjectName) ?></small>
                            <?php else: ?>
                                <small class="text-muted">- All Subjects</small>
                            <?php endif; ?>
                        </h5>

                        <?php if (!empty($trend)): ?>
                            <canvas id="trendChart" height="120"></canvas>
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

    <!-- FACULTY MARKS UPDATE -->
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
                                            class="form-control form-control-sm"
                                        >
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

            <!-- SUBJECT PERFORMANCE MATRIX -->
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

            <!-- STUDENT VS CLASS AVERAGE -->
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

            <!-- IMPROVEMENT PLAN -->
            <div class="cms-card p-4 mb-4">
                <h5 class="section-title">Improvement Plan</h5>

                <?php if (!empty($weakSubjects)): ?>
                    <div class="row g-3">
                        <?php foreach ($weakSubjects as $subject): ?>
                            <?php
                            $percentage = $subject['percentage'] ?? 0;

                            if ($percentage < 35) {
                                $issue = "Very low performance";
                                $suggestion = "Attend remedial classes and revise basic concepts.";
                                $target = "Improve to 50%+";
                                $tagClass = "badge-soft-red";
                            } else {
                                $issue = "Needs more practice";
                                $suggestion = "Practice previous question papers and important questions.";
                                $target = "Improve to 60%+";
                                $tagClass = "badge-soft-amber";
                            }
                            ?>

                            <div class="col-md-4">
                                <div class="border rounded p-3 h-100">
                                    <h6 class="fw-bold mb-2">
                                        <?= htmlspecialchars($subject['subject_name']) ?>
                                    </h6>

                                    <span class="soft-badge <?= $tagClass ?>">
                                        <?= htmlspecialchars($percentage) ?>%
                                    </span>

                                    <p class="mb-1 mt-2">
                                        <strong>Issue:</strong> <?= $issue ?>
                                    </p>

                                    <p class="mb-1">
                                        <strong>Suggestion:</strong> <?= $suggestion ?>
                                    </p>

                                    <p class="mb-0">
                                        <strong>Target:</strong> <?= $target ?>
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
            <!-- PARENT ALERT & EXPORT -->
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

            <!-- CHART SCRIPT -->
            <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
            <script>
                const chartElement = document.getElementById('trendChart');

                if (chartElement) {
                    const labels = <?= json_encode(array_column($trend, 'exam_name')) ?>;
                    const data = <?= json_encode(array_column($trend, 'avg_marks')) ?>;

                    new Chart(chartElement, {
                        type: 'line',
                        data: {
                            labels: labels,
                            datasets: [{
                                label: 'Marks',
                                data: data,
                                borderWidth: 3,
                                tension: 0.35,
                                fill: false
                            }]
                        },
                        options: {
                            responsive: true,
                            plugins: {
                                legend: {
                                    display: true
                                }
                            },
                            scales: {
                                y: {
                                    beginAtZero: true
                                }
                            }
                        }
                    });
                }
            </script>

        <?php elseif ($userRole !== 'admin'): ?>

            <div class="cms-card p-5 text-center"
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
                    background: #1e3a8a;
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
                    color: #1e3a8a;
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
                    background: #f8fafc;
                    border: 1px solid #e5e7eb;
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
                    background: #eff6ff;
                    color: #1e3a8a;
                    text-align: left;
                    font-weight: 700;
                }

                th, td {
                    border: 1px solid #d1d5db;
                    padding: 7px;
                    vertical-align: top;
                }

                .insight-box {
                    background: #eff6ff;
                    border-left: 5px solid #1e3a8a;
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

                .badge {
                    display: inline-block;
                    padding: 3px 7px;
                    border-radius: 20px;
                    font-size: 11px;
                    font-weight: 700;
                    background: #e5e7eb;
                    color: #111827;
                }

                .badge-green {
                    background: #dcfce7;
                    color: #166534;
                }

                .badge-amber {
                    background: #fef3c7;
                    color: #92400e;
                }

                .badge-red {
                    background: #fee2e2;
                    color: #991b1b;
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