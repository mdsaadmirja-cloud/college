<?php include __DIR__ . '/../layouts/header.php'; ?>

<div class="container-fluid py-4">

    <div class="d-flex justify-content-between align-items-center mb-4">
        <div>
            <h2 class="fw-bold mb-1">Edit Student Performance</h2>

            <p class="text-muted mb-0">
                Update marks, attendance and remarks safely.
            </p>
        </div>

        <a href="<?= BASE_URL ?>manage-student-performance"
            class="btn btn-outline-primary">
            ← Back
        </a>
    </div>

    <div class="card border-0 shadow-sm rounded-4 mb-4">
        <div class="card-body">

            <div class="row g-4">

                <div class="col-md-4">
                    <label class="form-label text-muted small">
                        Student ID
                    </label>

                    <input type="text"
                        class="form-control"
                        value="<?= htmlspecialchars($student['student_id']) ?>"
                        readonly>
                </div>

                <div class="col-md-4">
                    <label class="form-label text-muted small">
                        Student Name
                    </label>

                    <input type="text"
                        class="form-control"
                        value="<?= htmlspecialchars($student['candidate_name']) ?>"
                        readonly>
                </div>

                <div class="col-md-4">
                    <label class="form-label text-muted small">
                        Department
                    </label>

                    <input type="text"
                        class="form-control"
                        value="<?= htmlspecialchars($student['department']) ?>"
                        readonly>
                </div>

                <div class="col-md-4">
                    <label class="form-label text-muted small">
                        Semester
                    </label>

                    <input type="text"
                        class="form-control"
                        value="<?= htmlspecialchars($student['semester']) ?>"
                        readonly>
                </div>

                <div class="col-md-4">
                    <label class="form-label text-muted small">
                        Section
                    </label>

                    <input type="text"
                        class="form-control"
                        value="<?= htmlspecialchars($student['section']) ?>"
                        readonly>
                </div>

                <div class="col-md-4">
                    <label class="form-label text-muted small">
                        Academic Year
                    </label>

                    <input type="text"
                        class="form-control"
                        value="<?= htmlspecialchars($student['academic_year']) ?>"
                        readonly>
                </div>

            </div>

        </div>
    </div>

    <!-- UPDATE FORM -->

    <div class="card border-0 shadow-sm rounded-4">

        <div class="card-body">

            <form method="POST"
                action="<?= BASE_URL ?>update-student-performance">

                <input type="hidden"
                    name="student_id"
                    value="<?= $student['id'] ?>">

                <div class="row g-4">

                    <div class="col-md-4">
                        <label class="form-label">
                            First IA Marks
                        </label>

                        <input type="number"
                            name="first_ia"
                            class="form-control"
                            min="0"
                            max="25"
                            value="<?= htmlspecialchars($performanceData['marks']['First IA'] ?? 0) ?>"
                            required>
                    </div>

                    <div class="col-md-4">
                        <label class="form-label">
                            Second IA Marks
                        </label>

                        <input type="number"
                            name="second_ia"
                            class="form-control"
                            min="0"
                            max="25"
                            value="<?= htmlspecialchars($performanceData['marks']['Second IA'] ?? 0) ?>"
                            required>
                    </div>

                    <div class="col-md-4">
                        <label class="form-label">
                            Mid Term Marks
                        </label>

                        <input type="number"
                            name="mid_term"
                            class="form-control"
                            min="0"
                            max="50"
                            value="<?= htmlspecialchars($performanceData['marks']['Mid Term'] ?? 0) ?>"
                            required>
                    </div>

                    <div class="col-md-6">
                        <label class="form-label">
                            Attendance Status
                        </label>

                        <select name="attendance_status"
                            class="form-select"
                            required>

                            <option value="Present"
                                <?= (($performanceData['attendance']['status'] ?? '') === 'Present') ? 'selected' : '' ?>>
                                Present
                            </option>

                            <option value="Absent"
                                <?= (($performanceData['attendance']['status'] ?? '') === 'Absent') ? 'selected' : '' ?>>
                                Absent
                            </option>

                        </select>
                    </div>

                    <div class="col-12">
                        <label class="form-label">
                            Faculty Remarks
                        </label>

                        <textarea name="remarks"
                            rows="4"
                            class="form-control"
                            placeholder="Enter faculty remarks"><?= htmlspecialchars($performanceData['note']['note'] ?? '') ?></textarea>
                    </div>

                    <div class="col-12">

                        <button type="submit"
                            class="btn btn-primary">
                            💾 Save Performance
                        </button>

                    </div>

                </div>

            </form>

        </div>

    </div>

</div>

<?php include __DIR__ . '/../layouts/footer.php'; ?>