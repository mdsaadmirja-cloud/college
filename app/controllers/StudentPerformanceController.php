<?php

class StudentPerformanceController
{
    private $model;

    public function __construct($db)
    {
        $this->model = new StudentPerformanceModel($db);
    }

    public function dashboard()
    {
        $studentId = $_GET['student_id'] ?? null;

        $overview = $studentId ? $this->model->getStudentOverview($studentId) : null;
        $attendance = $studentId ? $this->model->getAttendancePercentage($studentId) : null;
        $weakSubjects = $studentId ? $this->model->getWeakSubjects($studentId) : [];
        $trend = $studentId ? $this->model->getStudentExamTrend($studentId) : [];

        $pageTitle = 'Student Performance Tracking';
        include __DIR__ . '/../views/performance/dashboard.php';
    }
}