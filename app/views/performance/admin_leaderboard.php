<?php include __DIR__ . '/../layouts/header.php'; ?>

<div class="d-flex">

    <!-- SIDEBAR -->

    <?php include __DIR__ . '/../layouts/sidebar.php'; ?>

    <!-- MAIN CONTENT -->

    <div class="main-content flex-grow-1 p-4">

        <!-- TOP HEADER -->

        <div class="d-flex
                    justify-content-between
                    align-items-center
                    mb-4">

            <div>

                <h2 class="fw-bold mb-1">

                    Global Leaderboard

                </h2>

                <p class="text-muted mb-0">

                    Welcome, Admin

                </p>

            </div>

        </div>

        <!-- HERO SECTION -->

        <div class="card border-0 shadow-sm mb-4"
            style="
                border-radius: 24px;
                background:
                    linear-gradient(
                        135deg,
                        #f59e0b,
                        #ef4444
                    );
            ">

            <div class="card-body p-5">

                <h1 class="fw-bold text-black mb-3">

                    🏆 Global Leaderboard

                </h1>

                <p class="text-white opacity-75 mb-4">

                    View top-performing students
                    across all courses and semesters.

                </p>

                <!-- FILTERS -->

                <form method="GET">

                    <input
                        type="hidden"
                        name="url"
                        value="admin-leaderboard">

                    <div class="row g-3">

                        <!-- COURSE -->

                        <div class="col-md-4">

                            <select
                                name="course_id"
                                class="form-select shadow-sm">

                                <option value="">
                                    All Courses
                                </option>

                                <?php foreach ($courses as $course): ?>

                                    <option
                                        value="<?= $course['id'] ?>"

                                        <?= (
                                            ($_GET['course_id'] ?? '')
                                            == $course['id']
                                        )
                                            ? 'selected'
                                            : ''
                                        ?>>

                                        <?= htmlspecialchars(
                                            $course['course_name']
                                        ) ?>

                                    </option>

                                <?php endforeach; ?>

                            </select>

                        </div>

                        <!-- SEMESTER -->

                        <div class="col-md-4">

                            <select
                                name="semester_id"
                                class="form-select shadow-sm">

                                <option value="">
                                    All Semesters
                                </option>

                                <?php foreach ($semesters as $semester): ?>

                                    <option
                                        value="<?= $semester['id'] ?>"

                                        <?= (
                                            ($_GET['semester_id'] ?? '')
                                            == $semester['id']
                                        )
                                            ? 'selected'
                                            : ''
                                        ?>>

                                        Semester
                                        <?= $semester['semester_number'] ?>

                                    </option>

                                <?php endforeach; ?>

                            </select>

                        </div>

                        <!-- BUTTON -->

                        <div class="col-md-4">

                            <button
                                type="submit"
                                class="btn btn-warning
                                    fw-bold
                                    w-100">

                                Filter Leaderboard

                            </button>

                        </div>

                    </div>

                </form>

            </div>

        </div>

        <!-- LEADERBOARD TABLE -->

        <div class="card border-0 shadow-sm"
            style="border-radius: 24px;">

            <div class="card-body p-4">

                <div class="d-flex
                            justify-content-between
                            align-items-center
                            mb-4">

                    <h4 class="fw-bold mb-0">

                        🎓 Top Performers

                    </h4>

                    <span class="badge bg-warning text-dark px-3 py-2">

                        Top <?= count($topPerformers) ?>

                    </span>

                </div>

                <div class="table-responsive">

                    <table class="table align-middle">

                        <thead
                            style="
                                background:
                                    #fff7ed;
                            ">

                            <tr>

                                <th>Rank</th>

                                <th>Student</th>

                                <th>USN</th>

                                <th>Percentage</th>

                                <th>Attendance</th>

                            </tr>

                        </thead>

                        <tbody>

                            <?php $rank = 1; ?>

                            <?php foreach ($topPerformers as $student): ?>

                                <tr>

                                    <!-- RANK -->

                                    <td class="fw-bold">

                                        <?php if ($rank == 1): ?>

                                            🥇

                                        <?php elseif ($rank == 2): ?>

                                            🥈

                                        <?php elseif ($rank == 3): ?>

                                            🥉

                                        <?php else: ?>

                                            <?= $rank  ?>
                                            🎓

                                        <?php endif; ?>

                                    </td>

                                    <!-- STUDENT -->

                                    <td>

                                        <div class="fw-semibold">

                                            <?= htmlspecialchars(
                                                $student['candidate_name']
                                            ) ?>

                                        </div>

                                    </td>

                                    <!-- USN -->

                                    <td>

                                        <?= htmlspecialchars(
                                            $student['student_id']
                                        ) ?>

                                    </td>

                                    <!-- PERCENTAGE -->

                                    <td>

                                        <span
                                            class="badge bg-success px-3 py-2">

                                            <?= round(
                                                $student['percentage'] ?? 0,
                                                2
                                            ) ?>%

                                        </span>

                                    </td>

                                    <!-- ATTENDANCE -->

                                    <td>

                                        <span
                                            class="badge bg-primary px-3 py-2">

                                            <?= round(
                                                $student['attendance_percentage'] ?? 0,
                                                2
                                            ) ?>%

                                        </span>

                                    </td>

                                </tr>

                                <?php $rank++; ?>

                            <?php endforeach; ?>

                        </tbody>

                    </table>

                </div>

            </div>

        </div>

    </div>

</div>

<?php include __DIR__ . '/../layouts/footer.php'; ?>