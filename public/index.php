<?php
session_start();

define('BASE_URL', '/college/public/index.php?url=');

require_once __DIR__ . '/../config/Database.php';
require_once __DIR__ . '/../app/models/UserModel.php';
require_once __DIR__ . '/../app/services/MailService.php';
require_once __DIR__ . '/../app/controllers/AuthController.php';
require_once __DIR__ . '/../app/controllers/AdminController.php';
require_once __DIR__ . '/../app/controllers/ProfileController.php';
require_once __DIR__ . '/../app/models/StudentPerformanceModel.php';
require_once __DIR__ . '/../app/controllers/StudentPerformanceController.php';

$database = new Database();
$db = $database->getConnection();

function redirectTo($route) {
    header('Location: ' . BASE_URL . $route);
    exit();
}

$url = $_GET['url'] ?? 'home';

switch ($url) {
    case 'home':
        include __DIR__ . '/../app/views/public/home.php';
        break;

    case 'login':
        $userModel = new UserModel($db);
        $allowAdminRegister = !$userModel->adminExists();
        include __DIR__ . '/../app/views/auth/login.php';
        break;

    case 'register-admin':
        $userModel = new UserModel($db);

        if ($userModel->adminExists()) {
            redirectTo('login&error=admin_registration_closed');
        }

        include __DIR__ . '/../app/views/auth/register_admin.php';
        break;

    case 'register-admin-process':
        $auth = new AuthController($db);
        $auth->registerAdmin();
        break;

    case 'login-process':
        $auth = new AuthController($db);
        $auth->login();
        break;

    case 'dashboard':
        if (!isset($_SESSION['user_id'])) {
            redirectTo('login');
        }

        $role = strtolower($_SESSION['role'] ?? '');

        if ($role === 'admin') {
            $userModel = new UserModel($db);

            $totalUsers = $userModel->countAllUsers();
            $totalStudents = $userModel->countUsersByRole('Student');
            $totalFaculty = $userModel->countUsersByRole('Faculty');
            $activeUsers = $userModel->countActiveUsers();
            $recentUsers = $userModel->getRecentUsers(5);

            include __DIR__ . '/../app/views/admin/dashboard.php';
        } elseif ($role === 'faculty') {
            include __DIR__ . '/../app/views/faculty/dashboard.php';
        } elseif ($role === 'student') {
            include __DIR__ . '/../app/views/student/dashboard.php';
        } else {
            session_unset();
            session_destroy();
            redirectTo('home');
        }
        break;

    case 'students':
        if (!isset($_SESSION['user_id']) || strtolower($_SESSION['role']) !== 'admin') {
            redirectTo('login');
        }

        $admin = new AdminController($db);
        $users = $admin->getUsersByRole('Student');
        include __DIR__ . '/../app/views/admin/students.php';
        break;

    case 'faculty':
        if (!isset($_SESSION['user_id']) || strtolower($_SESSION['role']) !== 'admin') {
            redirectTo('login');
        }

        $admin = new AdminController($db);
        $users = $admin->getUsersByRole('Faculty');
        include __DIR__ . '/../app/views/admin/faculty.php';
        break;
    case 'reports':
        if (!isset($_SESSION['user_id']) || strtolower($_SESSION['role']) !== 'admin') {
            redirectTo('login');
        }

        include __DIR__ . '/../app/views/admin/reports.php';
        break;

    case 'student-performance':
    if (!isset($_SESSION['user_id']) || strtolower($_SESSION['role']) !== 'admin') {
        redirectTo('login');
    }

    $performanceController = new StudentPerformanceController($db);
    $performanceController->dashboard();
    break; 

    case 'create-user':
        if (!isset($_SESSION['user_id']) || strtolower($_SESSION['role']) !== 'admin') {
            redirectTo('login');
        }

        $admin = new AdminController($db);
        $admin->createUser();
        break;

    case 'edit-user':
        if (!isset($_SESSION['user_id']) || strtolower($_SESSION['role']) !== 'admin') {
            redirectTo('login');
        }

        $admin = new AdminController($db);
        $user = $admin->getUserById((int)($_GET['id'] ?? 0));
        include __DIR__ . '/../app/views/admin/edit_user.php';
        break;

    case 'update-user':
        if (!isset($_SESSION['user_id']) || strtolower($_SESSION['role']) !== 'admin') {
            redirectTo('login');
        }

        $admin = new AdminController($db);
        $admin->updateUser();
        break;

    case 'delete-user':
        if (!isset($_SESSION['user_id']) || strtolower($_SESSION['role']) !== 'admin') {
            redirectTo('login');
        }

        $admin = new AdminController($db);
        $admin->deleteUser();
        break;

    case 'profile':
        if (!isset($_SESSION['user_id'])) {
            redirectTo('login');
        }

        $profileController = new ProfileController($db);
        $user = $profileController->getCurrentUser((int)$_SESSION['user_id']);
        include __DIR__ . '/../app/views/profile/index.php';
        break;

    case 'update-profile':
        if (!isset($_SESSION['user_id'])) {
            redirectTo('login');
        }

        $profileController = new ProfileController($db);
        $profileController->updateProfile();
        break;

    case 'logout':
        session_unset();
        session_destroy();
        redirectTo('home');
        break;

    default:
        http_response_code(404);
        echo '404 Page Not Found';
        break;
}