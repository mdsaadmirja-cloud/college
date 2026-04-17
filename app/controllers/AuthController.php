<?php
class AuthController {
    private $userModel;

    public function __construct($db) {
        $this->userModel = new UserModel($db);
    }

    public function login() {
        // Allow only POST
        if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
            header('Location: ' . BASE_URL . 'login');
            exit();
        }

        $email = trim($_POST['email'] ?? '');
        $password = $_POST['password'] ?? '';

        // ================= EMPTY CHECK =================
        if ($email === '' || $password === '') {
            header('Location: ' . BASE_URL . 'login&error=missing_fields');
            exit();
        }

        // ================= EMAIL VALIDATION =================
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            header('Location: ' . BASE_URL . 'login?error=invalid_email');
            exit();
        }

        // ================= PASSWORD VALIDATION =================
        // Rules:
        // - 1 uppercase
        // - 1 lowercase
        // - 1 number
        // - 1 special character
        // - exactly 8 characters
        $passwordPattern = '/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[\W_]).{8}$/';

        if (!preg_match($passwordPattern, $password)) {
            header('Location: ' . BASE_URL . 'login?error=invalid_password');
            exit();
        }

        // ================= AUTHENTICATION =================
        $user = $this->userModel->authenticate($email, $password);

        if (!$user) {
            header('Location: ' . BASE_URL . 'login&error=invalid_credentials');
            exit();
        }

        // ================= SESSION =================
        $_SESSION['user_id'] = $user['id'];
        $_SESSION['user_name'] = $user['first_name'] ?? 'User';
        $_SESSION['email'] = $user['email'];
        $_SESSION['role'] = $user['role_name'];

        // ================= REDIRECT =================
        header('Location: ' . BASE_URL . 'dashboard');
        exit();
    }

    public function registerAdmin() {
        if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
            header('Location: ' . BASE_URL . 'login');
            exit();
        }

        if ($this->userModel->adminExists()) {
            header('Location: ' . BASE_URL . 'login?error=admin_registration_closed');
            exit();
        }

        $firstName = trim($_POST['first_name'] ?? '');
        $lastName = trim($_POST['last_name'] ?? '');
        $phone = trim($_POST['phone'] ?? '');
        $email = trim($_POST['email'] ?? '');
        $password = trim($_POST['password'] ?? '');
        $confirmPassword = trim($_POST['confirm_password'] ?? '');

        // ================= EMPTY CHECK =================
        if ($firstName === '' || $email === '' || $password === '' || $confirmPassword === '') {
            header('Location: ' . BASE_URL . 'register-admin?error=invalid_input');
            exit();
        }

        // ================= EMAIL VALIDATION =================
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            header('Location: ' . BASE_URL . 'register-admin?error=invalid_email');
            exit();
        }

        // ================= PASSWORD VALIDATION =================
        $passwordPattern = '/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[\W_]).{8}$/';

        if (!preg_match($passwordPattern, $password)) {
            header('Location: ' . BASE_URL . 'register-admin?error=invalid_password');
            exit();
        }

        // ================= PASSWORD MATCH =================
        if ($password !== $confirmPassword) {
            header('Location: ' . BASE_URL . 'register-admin?error=password_mismatch');
            exit();
        }

        // ================= CREATE USER =================
        $created = $this->userModel->createUser(
            $firstName,
            $lastName,
            $email,
            $password,
            1,
            'Administration',
            $phone !== '' ? $phone : null
        );

        if ($created) {
            header('Location: ' . BASE_URL . 'login&success=admin_registered');
        } else {
            header('Location: ' . BASE_URL . 'register-admin?error=register_failed');
        }

        exit();
    }
}