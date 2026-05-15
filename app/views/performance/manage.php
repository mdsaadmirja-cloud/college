<?php include __DIR__ . '/../layouts/header.php'; ?>

<div class="container-fluid py-4">

    <div class="d-flex justify-content-between align-items-center mb-4">
        <div>
            <h2 class="fw-bold mb-1">Manage Student Performance</h2>
            <p class="text-muted mb-0">
                Faculty can manage marks, attendance and student performance records.
            </p>
        </div>

        <a href="<?= BASE_URL ?>student-performance"
            class="btn btn-outline-primary">
            ← Back To Analytics
        </a>
    </div>

    <div class="card shadow-sm border-0 rounded-4">
        <div class="card-body">

            <div class="table-responsive">

                <table class="table table-hover align-middle">

                    <thead class="table-light">
                        <tr>
                            <th>#</th>
                            <th>Student ID</th>
                            <th>Student Name</th>
                            <th>Department</th>
                            <th>Semester</th>
                            <th>Section</th>
                            <th>Academic Year</th>
                            <th width="220">Actions</th>
                        </tr>
                    </thead>

                    <tbody>

                        <?php if (!empty($students)): ?>

                            <?php foreach ($students as $index => $student): ?>

                                <tr>

                                    <td><?= $index + 1 ?></td>

                                    <td>
                                        <?= htmlspecialchars($student['student_id']) ?>
                                    </td>

                                    <td class="fw-semibold">
                                        <?= htmlspecialchars($student['candidate_name']) ?>
                                    </td>

                                    <td>
                                        <?= htmlspecialchars($student['department']) ?>
                                    </td>

                                    <td>
                                        <?= htmlspecialchars($student['semester']) ?>
                                    </td>

                                    <td>
                                        <?= htmlspecialchars($student['section']) ?>
                                    </td>

                                    <td>
                                        <?= htmlspecialchars($student['academic_year']) ?>
                                    </td>

                                    <td>

                                        <a href="<?= BASE_URL ?>student-performance&student_id=<?= $student['id'] ?>"
                                            class="btn btn-sm btn-primary">
                                            View
                                        </a>

                                        <a href="<?= BASE_URL ?>edit-student-performance&id=<?= $student['id'] ?>"
                                            class="btn btn-sm btn-warning">
                                            Edit
                                        </a>

                                        <a href="<?= BASE_URL ?>delete-student-performance&id=<?= $student['id'] ?>"
                                            class="btn btn-sm btn-danger"
                                            onclick="return confirm('Are you sure you want to delete this performance record?')">
                                            Delete
                                        </a>

                                    </td>

                                </tr>

                            <?php endforeach; ?>

                        <?php else: ?>

                            <tr>
                                <td colspan="8" class="text-center text-muted py-4">
                                    No students found.
                                </td>
                            </tr>

                        <?php endif; ?>

                    </tbody>

                </table>

            </div>

        </div>
    </div>

</div>

<?php include __DIR__ . '/../layouts/footer.php'; ?>