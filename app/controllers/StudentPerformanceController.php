<?php


class StudentPerformanceController
{
    private $model;
    private $db;
    private $attendanceModel;

    public function __construct($db)
    {
        // 🔥 IMPORTANT DEBUG CHECK
        if (!$db) {

            die("DB connection is NULL ❌");
        }

        $this->db = $db;

        // EXISTING MODEL
        $this->model =
            new StudentPerformanceModel($db);
    }

    public function dashboard()
    {
        $userRole = strtolower($_SESSION['role'] ?? '');
        $selectedSubjectId = $_GET['subject_id'] ?? null;

        $selectedAcademicYear = $_GET['academic_year'] ?? '';
        $selectedCourseId = $_GET['course_id'] ?? '';
        $selectedSemesterId = $_GET['semester_id'] ?? '';
        $selectedSectionId = $_GET['section_id'] ?? '';

        // ADMIN SUMMARY DATA
        $adminSemesterSummary = null;
        $adminSemesterComparison = [];

        if ($userRole === 'admin') {
            $adminSemesterSummary = $this->model->getAdminSemesterSummary(
                $selectedAcademicYear,
                $selectedCourseId,
                $selectedSemesterId
            );

            $adminSemesterComparison = $this->model->getAdminSemesterComparison(
                $selectedAcademicYear,
                $selectedCourseId,
                $selectedSemesterId
            );
        }

        /*
    STUDENT ROLE:
    Student cannot choose student_id from URL.
    Student always sees own report only.
    */
        if ($userRole === 'student') {

            $studentCode = $_SESSION['student_id'] ?? null;

            if (!$studentCode) {
                die("Student profile is not linked to this login.");
            }

            /*
    |--------------------------------------------------------------------------
    | CONVERT STUDENT CODE TO REAL students.id
    |--------------------------------------------------------------------------
    */

            $query = "
        SELECT id
        FROM students
        WHERE student_id = :student_code
        LIMIT 1
    ";

            $stmt = $this->db->prepare($query);

            $stmt->bindParam(':student_code', $studentCode);

            $stmt->execute();

            $studentData = $stmt->fetch(PDO::FETCH_ASSOC);

            if (!$studentData) {
                die("Student record not found.");
            }

            $studentId = $studentData['id'];
        } else {
            /*
        ADMIN + FACULTY:
        Can select student from filters.
        */
            $studentId = $_GET['student_id'] ?? null;
        }

        // Academic year: 2025-26 to future
        $currentYear = date('Y');
        $academicYears = [];

        for ($year = 2025; $year <= $currentYear + 10; $year++) {
            $academicYears[] = [
                'academic_year' => $year . '-' . substr($year + 1, -2)
            ];
        }

        // Dropdown data
        $courses = $this->model->getCourses();
        $semesters = $this->model->getSemesters();
        $sections = $this->model->getSections();

        /*
    ADMIN + FACULTY:
    Full filter access.
    STUDENT:
    No student dropdown needed.
    */
        if ($userRole === 'student') {
            $students = [];
        } else {
            $students = $this->model->getFilteredStudents(

                '',

                $selectedCourseId,

                $selectedSemesterId,

                $selectedSectionId
            );
        }

        /*
    Subject dropdown:
    Admin/faculty: based on selected course + semester
    Student: based on student's own course + semester
    */
        if ($userRole === 'student') {
            $studentProfileForSubjects = $this->model->getStudentProfile($studentId);

            $subjects = $this->model->getFilteredSubjects(
                $studentProfileForSubjects['course_id'] ?? '',
                $studentProfileForSubjects['semester_id'] ?? ''
            );
        } else {
            $subjects = $this->model->getFilteredSubjects(
                $selectedCourseId,
                $selectedSemesterId
            );
        }

        // Existing report logic
        $overview = $studentId ? $this->model->getStudentOverview($studentId) : null;
        $attendance = $studentId ? $this->model->getAttendancePercentage($studentId) : null;
        $weakSubjects = $studentId ? $this->model->getWeakSubjects($studentId) : [];
        $trend = $studentId ? $this->model->getStudentExamTrend($studentId, $selectedSubjectId) : [];

        $studentProfile = $studentId ? $this->model->getStudentProfile($studentId) : null;
        $subjectPerformance = $studentId ? $this->model->getSubjectPerformance($studentId, $selectedSubjectId) : [];

        $classRank = $studentId ? $this->model->getClassRank($studentId) : null;
        $classAverage = $studentId ? $this->model->getStudentVsClassAverage($studentId, $selectedSubjectId) : [];
        $teacherNote = $studentId ? $this->model->getTeacherNote($studentId) : null;
        $examList = $this->model->getExamList();

        $pageTitle = 'Student Performance Tracking';


        include __DIR__ . '/../views/performance/dashboard.php';
    }

    public function saveTeacherNote()
    {
        if (!isset($_SESSION['user_id'])) {
            header('Location: ' . BASE_URL . 'login');
            exit();
        }

        $role = strtolower($_SESSION['role'] ?? '');

        if ($role !== 'faculty') {
            die("Access denied. Only faculty can add teacher notes.");
        }

        if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
            header('Location: ' . BASE_URL . 'student-performance');
            exit();
        }

        $studentId = $_POST['student_id'] ?? null;
        $note = trim($_POST['teacher_note'] ?? '');
        $facultyUserId = $_SESSION['user_id'];

        if (empty($studentId)) {
            die("Student is required.");
        }

        if ($note === '') {
            die("Teacher note cannot be empty.");
        }

        $this->model->saveTeacherNote($studentId, $facultyUserId, $note);

        $redirectUrl = $_POST['redirect_url'] ?? (BASE_URL . 'student-performance');
        header('Location: ' . $redirectUrl . '&note_saved=1');
        exit();
    }

    public function saveMarks()
    {
        if (!isset($_SESSION['user_id'])) {
            header('Location: ' . BASE_URL . 'login');
            exit();
        }

        $role = strtolower($_SESSION['role'] ?? '');

        if ($role !== 'faculty') {
            die("Access denied. Only faculty can update marks.");
        }

        if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
            header('Location: ' . BASE_URL . 'student-performance');
            exit();
        }

        $studentId = $_POST['student_id'] ?? null;
        $marksData = $_POST['marks'] ?? [];

        if (empty($studentId)) {
            die("Student is required.");
        }

        foreach ($marksData as $subjectId => $examMarks) {
            foreach ($examMarks as $examId => $marksObtained) {
                $marksObtained = trim($marksObtained);

                if ($marksObtained === '') {
                    continue;
                }

                if (!is_numeric($marksObtained)) {
                    die("Invalid marks entered.");
                }

                $this->model->updateStudentMark(
                    $studentId,
                    $subjectId,
                    $examId,
                    $marksObtained
                );
            }
        }

        $redirectUrl = $_POST['redirect_url'] ?? (BASE_URL . 'student-performance');
        header('Location: ' . $redirectUrl . '&marks_saved=1');
        exit();
    }

    public function saveAttendance()
    {
        if (!isset($_SESSION['user_id'])) {
            header('Location: ' . BASE_URL . 'login');
            exit();
        }

        $role = strtolower($_SESSION['role'] ?? '');

        if ($role !== 'faculty') {
            die("Access denied. Only faculty can update attendance.");
        }

        if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
            header('Location: ' . BASE_URL . 'student-performance');
            exit();
        }

        $studentId = $_POST['student_id'] ?? null;
        $presentDays = $_POST['present_days'] ?? 0;
        $absentDays = $_POST['absent_days'] ?? 0;

        $presentDays = (int) $presentDays;
        $absentDays = (int) $absentDays;

        if (empty($studentId)) {
            die("Student is required.");
        }

        if ($presentDays < 0 || $absentDays < 0) {
            die("Attendance days cannot be negative.");
        }

        if (($presentDays + $absentDays) <= 0) {
            die("Total attendance days must be greater than zero.");
        }

        $this->model->updateStudentAttendance($studentId, $presentDays, $absentDays);

        $redirectUrl = $_POST['redirect_url'] ?? (BASE_URL . 'student-performance');
        header('Location: ' . $redirectUrl . '&attendance_saved=1');
        exit();
    }

    public function managePerformance()
    {
        $students = $this->model->getAllStudents();

        include __DIR__ . '/../views/performance/manage.php';
    }

    public function editPerformance()
    {
        $studentId = (int) ($_GET['id'] ?? 0);

        if (!$studentId) {
            redirectTo('manage-student-performance');
        }

        $student = $this->model->getStudentById($studentId);
        $performanceData = $this->model->getStudentPerformanceData($studentId);

        if (!$student) {
            redirectTo('manage-student-performance');
        }

        $subjects =
            $this->model->getFilteredSubjects(

                $student['course_id'],

                $student['semester_id']
            );

        include __DIR__ . '/../views/performance/edit.php';
    }

    public function updatePerformance()
    {
        if ($_SERVER['REQUEST_METHOD'] !== 'POST') {

            redirectTo('manage-student-performance');
        }

        $studentId =
            $_POST['student_id'] ?? 0;

        $subjectId =
            $_POST['subject_id'] ?? 0;

        $firstIa =
            $_POST['first_ia'] ?? 0;

        $secondIa =
            $_POST['second_ia'] ?? 0;

        $midTerm =
            $_POST['mid_term'] ?? 0;

        $totalClasses =
            $_POST['total_classes'] ?? 0;

        $presentDays =
            $_POST['present_days'] ?? 0;

        $absentDays =
            $_POST['absent_days'] ?? 0;

        $remarks =
            trim($_POST['remarks'] ?? '');

        /*
    |--------------------------------------------------------------------------
    | SAVE MARKS
    |--------------------------------------------------------------------------
    */

        $examList =
            $this->model->getExamList();

        foreach ($examList as $exam) {

            $marksObtained = 0;

            if ($exam['exam_name'] === 'First IA') {

                $marksObtained = $firstIa;
            } elseif ($exam['exam_name'] === 'Second IA') {

                $marksObtained = $secondIa;
            } elseif ($exam['exam_name'] === 'Mid Term') {

                $marksObtained = $midTerm;
            }

            $this->model->updateStudentMark(

                $studentId,

                $subjectId,

                $exam['id'],

                $marksObtained
            );
        }

        /*
    |--------------------------------------------------------------------------
    | SAVE ATTENDANCE
    |--------------------------------------------------------------------------
    */

        $this->model->updateSubjectAttendance(

            $studentId,

            $subjectId,

            $totalClasses,

            $presentDays,

            $absentDays
        );

        /*
    |--------------------------------------------------------------------------
    | SAVE NOTE
    |--------------------------------------------------------------------------
    */

        if (!empty($remarks)) {

            $facultyId =
                $_SESSION['user_id'];

            $this->model->saveTeacherNote(

                $studentId,

                $facultyId,

                $remarks
            );
        }

        /*
    |--------------------------------------------------------------------------
    | REDIRECT
    |--------------------------------------------------------------------------
    */

        redirectTo(
            'student-performance&student_id='
                . $studentId
        );
    }
    public function deletePerformance()
    {
        $studentId = (int) ($_GET['id'] ?? 0);

        if (!$studentId) {
            redirectTo('manage-student-performance');
        }

        $this->model->deleteStudentPerformance($studentId);

        redirectTo('manage-student-performance&deleted=1');
    }
}
