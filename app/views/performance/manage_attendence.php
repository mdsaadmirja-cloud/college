<?php
$pageTitle = 'Manage Attendance';

include __DIR__ . '/../layouts/header.php';
include __DIR__ . '/../layouts/sidebar.php';
?>

<div class="container-fluid py-4">

    <div class="card shadow border-0 rounded-4">

        <div class="card-body">

            <div class="d-flex justify-content-between align-items-center mb-4">

                <div>

                    <h3 class="fw-bold mb-1">
                        Manage Attendance
                    </h3>

                    <p class="text-muted mb-0">
                        Update subject-wise attendance.
                    </p>

                </div>

                <a href="<?= BASE_URL ?>student-performance"
                    class="btn btn-secondary">

                    ← Back

                </a>

            </div>

            <!-- FILTER FORM -->

            <form method="GET" action="index.php">

                <input
                    type="hidden"
                    name="url"
                    value="manage-attendance">

                <div class="row g-3 mb-4">

                    <!-- COURSE -->

                    <div class="col-md-3">

                        <label class="form-label">
                            Course
                        </label>

                        <select
                            name="course_id"
                            class="form-select"
                            required>

                            <option value="">
                                Select Course
                            </option>

                            <?php foreach ($courses as $course): ?>

                                <option
                                    value="<?= $course['id'] ?>"
                                    <?= ($selectedCourseId == $course['id']) ? 'selected' : '' ?>>

                                    <?= htmlspecialchars(
                                        $course['course_name']
                                    ) ?>

                                </option>

                            <?php endforeach; ?>

                        </select>

                    </div>

                    <!-- SEMESTER -->

                    <div class="col-md-2">

                        <label class="form-label">
                            Semester
                        </label>

                        <select
                            name="semester_id"
                            class="form-select"
                            required>

                            <option value="">
                                Select Semester
                            </option>

                            <?php foreach ($semesters as $sem): ?>

                                <option
                                    value="<?= $sem['id'] ?>"
                                    <?= ($selectedSemesterId == $sem['id']) ? 'selected' : '' ?>>

                                    <?= htmlspecialchars(
                                        $sem['semester_number']
                                    ) ?>

                                </option>

                            <?php endforeach; ?>

                        </select>

                    </div>

                    <!-- SECTION -->

                    <div class="col-md-2">

                        <label class="form-label">
                            Section
                        </label>

                        <select
                            name="section_id"
                            class="form-select"
                            required>

                            <option value="">
                                Select Section
                            </option>

                            <?php foreach ($sections as $sec): ?>

                                <option
                                    value="<?= $sec['id'] ?>"
                                    <?= ($selectedSectionId == $sec['id']) ? 'selected' : '' ?>>

                                    <?= htmlspecialchars(
                                        $sec['section_name']
                                    ) ?>

                                </option>

                            <?php endforeach; ?>

                        </select>

                    </div>

                    <!-- BUTTON -->

                    <div class="col-md-3 d-flex align-items-end">

                        <button
                            type="submit"
                            class="btn btn-primary w-100">

                            Load Students

                        </button>

                    </div>

                </div>

            </form>

            <?php if (isset($_GET['saved'])): ?>

                <div class="alert alert-success">

                    Attendance saved successfully.

                </div>

            <?php endif; ?>

            <!-- ATTENDANCE FORM -->

            <?php if (!empty($students)): ?>

                <form method="POST"
                    action="<?= BASE_URL ?>save-subject-attendance">



                    <?php if (!empty($students)): ?>

                        <div class="mb-4">

                            <label class="form-label fw-semibold">
                                Select Subject
                            </label>
                            <input
                                type="hidden"
                                name="subject_id"
                                id="selected_subject_input">

                            <select
                                id="subject_dropdown"
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

                    <?php endif; ?>

                    <div class="table-responsive">

                        <table class="table table-hover align-middle">

                            <thead>

                                <tr>

                                    <th>Student</th>

                                    <th>Total Classes</th>

                                    <th>Present</th>

                                    <th>Absent</th>

                                </tr>

                            </thead>

                            <tbody>

                                <?php foreach ($students as $student): ?>

                                    <tr>

                                        <td>

                                            <?= htmlspecialchars(
                                                $student['candidate_name']
                                            ) ?>

                                        </td>

                                        <td>

                                            <input
                                                type="number"
                                                min="0"
                                                name="attendance[<?= $student['id'] ?>][total]"
                                                class="form-control"
                                                required>

                                        </td>

                                        <td>

                                            <input
                                                type="number"
                                                min="0"
                                                name="attendance[<?= $student['id'] ?>][present]"
                                                class="form-control"
                                                required>

                                        </td>

                                        <td>

                                            <input
                                                type="number"
                                                min="0"
                                                name="attendance[<?= $student['id'] ?>][absent]"
                                                class="form-control"
                                                readonly>

                                        </td>

                                    </tr>

                                <?php endforeach; ?>

                            </tbody>

                        </table>

                    </div>

                    <button
                        type="submit"
                        class="btn btn-success">

                        💾 Save Attendance

                    </button>

                </form>

            <?php endif; ?>

        </div>

    </div>

</div>

<script>
    document.addEventListener(
        'input',
        function(e) {
            if (
                e.target.name.includes('[total]') ||
                e.target.name.includes('[present]')
            ) {

                const row =
                    e.target.closest('tr');

                const total =
                    parseInt(
                        row.querySelector(
                            'input[name*=\"[total]\"]'
                        ).value
                    ) || 0;

                const present =
                    parseInt(
                        row.querySelector(
                            'input[name*=\"[present]\"]'
                        ).value
                    ) || 0;

                const absent =
                    total - present;

                row.querySelector(
                    'input[name*=\"[absent]\"]'
                ).value = absent >= 0 ? absent : 0;
            }
        }
    );
</script>
<script>
    document
        .getElementById('subject_dropdown')
        .addEventListener('change', function() {

            document
                .getElementById('selected_subject_input')
                .value = this.value;
        });
</script>