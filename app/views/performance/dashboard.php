<?php include __DIR__ . '/../layouts/header.php'; ?>

<div class="container-fluid">
    <div class="card shadow-sm border-0 mb-4">
        <div class="card-body">
            <h3 class="mb-3">Student Performance Tracking</h3>

            <?php if (!$overview): ?>
                <div class="alert alert-info mb-0">
                    Select a student to view performance data.
                </div>
            <?php else: ?>
                <div class="row g-3 mb-4">
                    <div class="col-md-3">
                        <div class="card shadow-sm border-0">
                            <div class="card-body">
                                <h6>Total Subjects</h6>
                                <h3><?= $overview['total_subjects'] ?? 0 ?></h3>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-3">
                        <div class="card shadow-sm border-0">
                            <div class="card-body">
                                <h6>Total Exams</h6>
                                <h3><?= $overview['total_exams'] ?? 0 ?></h3>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-3">
                        <div class="card shadow-sm border-0">
                            <div class="card-body">
                                <h6>Average Marks</h6>
                                <h3><?= $overview['avg_marks'] ?? 0 ?></h3>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-3">
                        <div class="card shadow-sm border-0">
                            <div class="card-body">
                                <h6>Attendance %</h6>
                                <h3><?= $attendance['attendance_percentage'] ?? 0 ?>%</h3>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="card shadow-sm border-0 mb-4">
                    <div class="card-header bg-white fw-bold">Weak Subjects</div>
                    <div class="card-body">
                        <?php if (!empty($weakSubjects)): ?>
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th>Subject</th>
                                        <th>Average Marks</th>
                                        <th>Percentage</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($weakSubjects as $subject): ?>
                                        <tr>
                                            <td><?= htmlspecialchars($subject['subject_name']) ?></td>
                                            <td><?= $subject['avg_marks'] ?></td>
                                            <td><?= $subject['percentage'] ?>%</td>
                                        </tr>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
                        <?php else: ?>
                            <p class="mb-0">No weak subjects found.</p>
                        <?php endif; ?>
                    </div>
                </div>

                <div class="card shadow-sm border-0">
                    <div class="card-header bg-white fw-bold">Exam Trend</div>
                    <div class="card-body">
                        <?php if (!empty($trend)): ?>
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th>Exam</th>
                                        <th>Date</th>
                                        <th>Average Marks</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($trend as $row): ?>
                                        <tr>
                                            <td><?= htmlspecialchars($row['exam_name']) ?></td>
                                            <td><?= htmlspecialchars($row['exam_date']) ?></td>
                                            <td><?= $row['avg_marks'] ?></td>
                                        </tr>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
                        <?php else: ?>
                            <p class="mb-0">No exam trend data found.</p>
                        <?php endif; ?>
                    </div>
                </div>
            <?php endif; ?>
        </div>
    </div>
</div>

<?php include __DIR__ . '/../layouts/footer.php'; ?>