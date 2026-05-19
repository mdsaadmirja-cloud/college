<?php include __DIR__ . '/../layouts/header.php'; ?>

<div class="d-flex">

    <!-- SIDEBAR -->

    <?php include __DIR__ . '/../layouts/sidebar.php'; ?>

    <!-- MAIN CONTENT -->

    <div class="main-content flex-grow-1 p-4">

        <!-- PAGE HEADER -->

        <div class="d-flex
                    justify-content-between
                    align-items-center
                    mb-4">

            <div>

                <h2 class="fw-bold mb-1">

                    Student Leaderboard

                </h2>

                <p class="text-muted mb-0">

                    Welcome,
                    <?= htmlspecialchars($_SESSION['user_name']) ?>

                </p>

            </div>

        </div>

        <!-- HERO SECTION -->

        <div class="card border-0 shadow-sm mb-4 leaderboard-card">

            <div class="card-body text-center p-5">

                <div class="leaderboard-content">

                    <h1 class="leaderboard-title">

                        Student Leaderboard

                    </h1>

                    <div class="divider-icons">

                        ✦ ♔ ✦

                    </div>

                    <p class="leaderboard-text">

                        Explore overall toppers and your semester top performers.

                    </p>

                </div>

            </div>

        </div>

        <style>
            .leaderboard-card {

                position: relative;

                border-radius: 30px;

                overflow: hidden;

                background:
                    linear-gradient(135deg,
                        #fffdf7,
                        #fff7ed);

                min-height: 260px;

                display: flex;

                align-items: center;

                justify-content: center;

                box-shadow: 0 10px 30px rgba(0, 0, 0, 0.08);

            }

            /* Background Decorative Image */

            .leaderboard-card::before {

                content: '';

                position: absolute;

                inset: 0;

                background-image:
                    url('/college/public/assets/images/graduation-frame.png');

                background-repeat: no-repeat;

                background-position: center;

                background-size: 85%;

                opacity: 0.18;

            }

            /* Content */

            .leaderboard-content {

                position: relative;

                z-index: 2;

            }

            /* Heading */

            .leaderboard-title {

                font-size: 58px;

                font-weight: 900;

                color: #000;

                margin-bottom: 12px;

                text-shadow: 2px 2px 10px rgba(0, 0, 0, 0.08);

            }

            /* Divider */

            .divider-icons {

                font-size: 32px;

                color: #d97706;

                margin-bottom: 15px;

                letter-spacing: 8px;

            }

            /* Paragraph */

            .leaderboard-text {

                font-size: 20px;

                color: #333;

                font-weight: 500;

            }

            /* Responsive */

            @media(max-width:768px) {

                .leaderboard-title {

                    font-size: 34px;

                }


                .divider-icons {

                    font-size: 22px;

                }


                .leaderboard-text {

                    font-size: 15px;

                }

            }
        </style>

        <!-- OVERALL TOPPERS -->

        <div class="card border-0 shadow-sm mb-4"
            style="border-radius:24px;">

            <div class="card-body p-4">

                <h4 class="fw-bold mb-4">

                    🌍 Overall College Toppers

                </h4>

                <div class="row">

                    <?php foreach ($overallToppers as $index => $topper): ?>

                        <div class="col-md-4 mb-3">

                            <div class="card border-0 shadow-sm h-100"
                                style="
                                    border-radius:20px;
                                ">

                                <div class="card-body text-center p-4">

                                    <div
                                        style="
                                            font-size:55px;
                                        ">

                                        <?php
                                        if ($index == 0) {
                                            echo '🥇';
                                        } elseif ($index == 1) {
                                            echo '🥈';
                                        } else {
                                            echo '🥉';
                                        }
                                        ?>

                                    </div>

                                    <h5 class="fw-bold mt-3">

                                        <?= htmlspecialchars(
                                            $topper['candidate_name']
                                        ) ?>

                                    </h5>

                                    <p class="text-muted mb-3">

                                        <?= htmlspecialchars(
                                            $topper['course_name']
                                        ) ?>

                                    </p>

                                    <span
                                        class="badge bg-success px-4 py-2">

                                        <?= round(
                                            $topper['percentage'] ?? 0,
                                            2
                                        ) ?>%

                                    </span>

                                </div>

                            </div>

                        </div>

                    <?php endforeach; ?>

                </div>

            </div>

        </div>

        <!-- SEMESTER TOPPERS -->

        <div class="card border-0 shadow-sm"
            style="border-radius:24px;">

            <div class="card-body p-4">

                <div class="d-flex
                            justify-content-between
                            align-items-center
                            mb-4">

                    <h4 class="fw-bold mb-0">

                        🎓 Your Semester Top 5

                    </h4>

                    <span
                        class="badge bg-warning text-dark px-3 py-2">

                        Top 5

                    </span>

                </div>

                <div class="table-responsive">

                    <table class="table align-middle">

                        <thead
                            style="
                                background:#fff7ed;
                            ">

                            <tr>

                                <th>Rank</th>

                                <th>Student</th>

                                <th>Percentage</th>

                            </tr>

                        </thead>

                        <tbody>

                            <?php $rank = 1; ?>

                            <?php foreach ($semesterToppers as $student): ?>

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

                                            <?= $rank ?>

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

                                    <!-- PERCENTAGE -->

                                    <td>

                                        <span
                                            class="badge bg-primary px-3 py-2">

                                            <?= round(
                                                $student['percentage'] ?? 0,
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