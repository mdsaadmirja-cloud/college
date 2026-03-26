<?php
$pageTitle = 'Reports';
include __DIR__ . '/../layouts/header.php'; // use your actual header/include file
?>

<div class="container-fluid">
    <div class="card shadow-sm border-0">
        <div class="card-body">
            <h4 class="mb-3">Available Reports</h4>

            <div class="list-group">
                <a href="/college/public/index.php?url=student-performance" class="list-group-item list-group-item-action">
                    <i class="bi bi-graph-up-arrow me-2"></i>
                    Student Performance Tracking
                </a>
            </div>
        </div>
    </div>
</div>

<?php include __DIR__ . '/../layouts/footer.php'; ?>