<?php
$pageTitle = 'My Profile';
include __DIR__ . '/../layouts/header.php';
include __DIR__ . '/../layouts/sidebar.php';

$firstLetter = strtoupper(substr($user['first_name'] ?? 'U', 0, 1));
?>

<div class="container-fluid">
    <?php if (isset($_GET['msg']) && $_GET['msg'] === 'updated'): ?>
        <div class="alert alert-success">Profile updated successfully.</div>
    <?php endif; ?>

    <?php if (isset($_GET['msg']) && $_GET['msg'] === 'update_failed'): ?>
        <div class="alert alert-danger">Profile update failed. Email may already exist.</div>
    <?php endif; ?>

    <?php if (isset($_GET['msg']) && $_GET['msg'] === 'invalid_input'): ?>
        <div class="alert alert-danger">First name and email are required.</div>
    <?php endif; ?>

    <div class="col-lg-4">
        <div class="card surface-card">
            <div class="card-body text-center p-4">
                <div class="avatar-circle mx-auto mb-3">
                    <?= htmlspecialchars($firstLetter) ?>
                </div>

                <h4 class="mb-1">
                    <?= htmlspecialchars(trim(($user['first_name'] ?? '') . ' ' . ($user['last_name'] ?? ''))) ?>
                </h4>

                <p class="text-muted mb-3"><?= htmlspecialchars($user['email'] ?? '') ?></p>

                <span class="badge bg-dark mb-3"><?= htmlspecialchars($user['role_name'] ?? '') ?></span>

                <div class="profile-meta text-start mt-3">
                    <p><strong>Phone:</strong> <?= htmlspecialchars($user['phone'] ?? '') ?></p>
                    <p><strong>Department:</strong> <?= htmlspecialchars($user['department'] ?? '') ?></p>
                    <p><strong>Status:</strong> <?= htmlspecialchars($user['status'] ?? '') ?></p>
                </div>

                <a href="/college/public/index.php?url=logout" class="btn btn-outline-danger w-100 mt-3">Logout</a>
            </div>
        </div>
    </div>

    <div class="col-lg-8">
        <div class="card stat-card">
            <div class="card-header">Update Profile</div>
            <div class="card-body">
                <form action="/college/public/index.php?url=update-profile" method="POST" id="profileForm">
                    <div class="row g-3">
                        <div class="col-md-6">
                            <label class="form-label">First Name</label>
                            <input type="text" name="first_name" id="first_name" class="form-control"
                                value="<?= htmlspecialchars($user['first_name'] ?? '') ?>"
                                required
                                pattern="[A-Za-z\s]{2,50}"
                                title="First name should contain only letters and spaces, minimum 2 characters">
                            <small class="text-danger d-none" id="firstNameError">
                                First name should contain only letters and spaces.
                            </small>
                        </div>

                        <div class="col-md-6">
                            <label class="form-label">Last Name</label>
                            <input type="text" name="last_name" id="last_name" class="form-control"
                                value="<?= htmlspecialchars($user['last_name'] ?? '') ?>"
                                pattern="[A-Za-z\s]{0,50}"
                                title="Last name should contain only letters and spaces">
                            <small class="text-danger d-none" id="lastNameError">
                                Last name should contain only letters and spaces.
                            </small>
                        </div>

                        <div class="col-md-6">
                            <label class="form-label">Email</label>
                            <input type="email" name="email" id="email" class="form-control"
                                value="<?= htmlspecialchars($user['email'] ?? '') ?>"
                                required>
                            <small class="text-danger d-none" id="emailError">
                                Enter a valid email address.
                            </small>
                        </div>

                        <div class="col-md-6">
                            <label class="form-label">Phone</label>
                            <input type="text" name="phone" id="phone" class="form-control"
                                value="<?= htmlspecialchars($user['phone'] ?? '') ?>"
                                pattern="[6-9][0-9]{9}"
                                maxlength="10"
                                title="Phone number must be 10 digits and start with 6, 7, 8, or 9">
                            <small class="text-danger d-none" id="phoneError">
                                Phone number must be 10 digits and start with 6, 7, 8, or 9.
                            </small>
                        </div>

                        <div class="col-md-12">
                            <label class="form-label">Department</label>
                            <input type="text" name="department" id="department" class="form-control"
                                value="<?= htmlspecialchars($user['department'] ?? '') ?>"
                                pattern="[A-Za-z\s]{2,100}"
                                title="Department should contain only letters and spaces">
                            <small class="text-danger d-none" id="departmentError">
                                Department should contain only letters and spaces.
                            </small>
                        </div>
                    </div>

                    <div class="mt-4">
                        <button type="submit" class="btn btn-primary">Save Changes</button>
                        <a href="/college/public/index.php?url=dashboard" class="btn btn-secondary">Back to Dashboard</a>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script>
        function allowOnlyLetters(inputId) {
            const input = document.getElementById(inputId);

            input.addEventListener('input', function() {
                this.value = this.value.replace(/[^A-Za-z\s]/g, '');
            });
        }

        function allowOnlyNumbers(inputId) {
            const input = document.getElementById(inputId);

            input.addEventListener('input', function() {
                this.value = this.value.replace(/[^0-9]/g, '');
            });
        }

        allowOnlyLetters('first_name');
        allowOnlyLetters('last_name');
        allowOnlyLetters('department');

        allowOnlyNumbers('phone');
    </script>
</div>
</div>

<?php include __DIR__ . '/../layouts/footer.php'; ?>