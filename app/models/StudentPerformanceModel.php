<?php

class StudentPerformanceModel
{
    private $conn;

    public function __construct($db)
    {
        $this->conn = $db;
    }

    public function getStudentOverview($studentId)
    {
        $sql = "
        SELECT 
            s.id,
            s.candidate_name,
            COUNT(DISTINCT m.subject_id) AS total_subjects,
            COUNT(DISTINCT m.exam_id) AS total_exams,
            ROUND(SUM(m.marks_obtained), 2) AS total_obtained,
            ROUND(SUM(e.total_marks), 2) AS total_marks,
            ROUND((SUM(m.marks_obtained) / SUM(e.total_marks)) * 100, 2) AS avg_marks
        FROM students s
        LEFT JOIN marks m ON s.id = m.student_id
        LEFT JOIN exams e ON m.exam_id = e.id
        WHERE s.id = ?
        AND e.exam_name IN ('First IA', 'Second IA', 'Mid Term')
        GROUP BY s.id, s.candidate_name
    ";

        $stmt = $this->conn->prepare($sql);
        $stmt->execute([$studentId]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function getAttendancePercentage($studentId)
    {
        $sql = "
            SELECT 
                COUNT(*) AS total_days,
                SUM(CASE WHEN status = 'Present' THEN 1 ELSE 0 END) AS present_days,
                ROUND((SUM(CASE WHEN status = 'Present' THEN 1 ELSE 0 END) / COUNT(*)) * 100, 2) AS attendance_percentage
            FROM attendance
            WHERE student_id = ?
        ";

        $stmt = $this->conn->prepare($sql);
        $stmt->execute([$studentId]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function getWeakSubjects($studentId)
    {
        $sql = "
        SELECT 
            sub.subject_name,
            ROUND(SUM(m.marks_obtained), 2) AS avg_marks,
            ROUND((SUM(m.marks_obtained) / SUM(e.total_marks)) * 100, 2) AS percentage
        FROM marks m
        INNER JOIN subjects sub ON m.subject_id = sub.id
        INNER JOIN exams e ON m.exam_id = e.id
        WHERE m.student_id = ?
        AND e.exam_name IN ('First IA', 'Second IA', 'Mid Term')
        GROUP BY sub.id, sub.subject_name
        HAVING percentage < 50
        ORDER BY percentage ASC
    ";

        $stmt = $this->conn->prepare($sql);
        $stmt->execute([$studentId]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getStudentExamTrend($studentId, $subjectId = null)
    {
        $params = [$studentId];

        $subjectCondition = "";
        if (!empty($subjectId)) {
            $subjectCondition = " AND m.subject_id = ? ";
            $params[] = $subjectId;
        }

        $sql = "
        SELECT 
            e.exam_name,
            e.exam_date,
            ROUND(AVG(m.marks_obtained), 2) AS avg_marks
        FROM marks m
        INNER JOIN exams e ON m.exam_id = e.id
        WHERE m.student_id = ?
        AND (
            e.exam_name LIKE '%IA%'
            OR e.exam_name LIKE '%Internal%'
            OR e.exam_name LIKE '%Mid%'
            OR e.exam_name LIKE '%Final%'
        )
        $subjectCondition
        GROUP BY e.id, e.exam_name, e.exam_date
        ORDER BY e.exam_date ASC
    ";

        $stmt = $this->conn->prepare($sql);
        $stmt->execute($params);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getStudentProfile($studentId)
    {
        $sql = "
        SELECT *
        FROM students
        WHERE id = ?
        LIMIT 1
    ";

        $stmt = $this->conn->prepare($sql);
        $stmt->execute([$studentId]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function getSubjectPerformance($studentId, $subjectId = null)
    {
        $params = [$studentId];

        $subjectCondition = "";
        if (!empty($subjectId)) {
            $subjectCondition = " AND m.subject_id = ? ";
            $params[] = $subjectId;
        }

        $sql = "
        SELECT 
            sub.id AS subject_id,
            sub.subject_name,

            SUM(CASE 
                WHEN e.exam_name LIKE '%1%' OR e.exam_name LIKE '%First%' 
                THEN m.marks_obtained ELSE 0 
            END) AS first_ia,

            SUM(CASE 
                WHEN e.exam_name LIKE '%2%' OR e.exam_name LIKE '%Second%' 
                THEN m.marks_obtained ELSE 0 
            END) AS second_ia,

            SUM(CASE 
                WHEN e.exam_name LIKE '%Mid%' 
                THEN m.marks_obtained ELSE 0 
            END) AS mid_term,

            SUM(m.marks_obtained) AS marks_obtained,
            SUM(e.total_marks) AS total_marks,

            ROUND((SUM(m.marks_obtained) / SUM(e.total_marks)) * 100, 2) AS percentage

        FROM marks m
        INNER JOIN subjects sub ON m.subject_id = sub.id
        INNER JOIN exams e ON m.exam_id = e.id
        WHERE m.student_id = ?
        AND (
            e.exam_name LIKE '%IA%'
            OR e.exam_name LIKE '%Internal%'
            OR e.exam_name LIKE '%Mid%'
        )
        $subjectCondition
        GROUP BY sub.id, sub.subject_name
        ORDER BY percentage DESC
    ";

        $stmt = $this->conn->prepare($sql);
        $stmt->execute($params);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getSubjects()
    {
        $sql = "SELECT id, subject_name FROM subjects ORDER BY subject_name ASC";
        $stmt = $this->conn->query($sql);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getClassRank($studentId)
    {
        $sql = "
        SELECT 
            ranked.student_id,
            ranked.avg_percentage,
            ranked.student_rank,
            ranked.total_students
        FROM (
            SELECT 
                s.id AS student_id,
                ROUND((SUM(m.marks_obtained) / SUM(e.total_marks)) * 100, 2) AS avg_percentage,
                RANK() OVER (
                    ORDER BY ROUND((SUM(m.marks_obtained) / SUM(e.total_marks)) * 100, 2) DESC
                ) AS student_rank,
                COUNT(*) OVER () AS total_students
            FROM students s
            INNER JOIN marks m ON s.id = m.student_id
            INNER JOIN exams e ON m.exam_id = e.id
            WHERE (
                e.exam_name LIKE '%IA%'
                OR e.exam_name LIKE '%Internal%'
                OR e.exam_name LIKE '%Mid%'
            )
            GROUP BY s.id
        ) ranked
        WHERE ranked.student_id = ?
    ";

        $stmt = $this->conn->prepare($sql);
        $stmt->execute([$studentId]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function getStudentVsClassAverage($studentId, $subjectId = null)
    {
        $params = [$studentId];

        $subjectConditionStudent = "";
        $subjectConditionClass = "";

        if (!empty($subjectId)) {
            $subjectConditionStudent = " AND m.subject_id = ? ";
            $subjectConditionClass = " AND m2.subject_id = ? ";
            $params[] = $subjectId;
        }

        $sql = "
        SELECT 
            sub.id AS subject_id,
            sub.subject_name,

            ROUND(
                (SUM(m.marks_obtained) / SUM(e.total_marks)) * 100,
                2
            ) AS student_percentage,

            (
                SELECT 
                    ROUND(AVG(class_subject_percentage), 2)
                FROM (
                    SELECT 
                        m2.student_id,
                        ROUND((SUM(m2.marks_obtained) / SUM(e2.total_marks)) * 100, 2) AS class_subject_percentage
                    FROM marks m2
                    INNER JOIN exams e2 ON m2.exam_id = e2.id
                    WHERE m2.subject_id = sub.id
                    AND (
                        e2.exam_name LIKE '%IA%'
                        OR e2.exam_name LIKE '%Internal%'
                        OR e2.exam_name LIKE '%Mid%'
                    )
                    GROUP BY m2.student_id
                ) class_avg
            ) AS class_average

        FROM marks m
        INNER JOIN subjects sub ON m.subject_id = sub.id
        INNER JOIN exams e ON m.exam_id = e.id
        WHERE m.student_id = ?
        AND (
            e.exam_name LIKE '%IA%'
            OR e.exam_name LIKE '%Internal%'
            OR e.exam_name LIKE '%Mid%'
        )
        $subjectConditionStudent
        GROUP BY sub.id, sub.subject_name
        ORDER BY sub.subject_name ASC
    ";

        $stmt = $this->conn->prepare($sql);
        $stmt->execute($params);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getCourses()
    {
        $sql = "
        SELECT id, course_name 
        FROM courses 
        WHERE status = 1 
        ORDER BY course_name ASC
    ";

        $stmt = $this->conn->query($sql);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getSemesters()
    {
        $sql = "
        SELECT id, semester_number, semester_name
        FROM semesters
        WHERE status = 1
        ORDER BY semester_number ASC
    ";

        $stmt = $this->conn->query($sql);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getSections()
    {
        $sql = "
        SELECT id, section_name
        FROM sections
        WHERE status = 1
        ORDER BY section_name ASC
    ";

        $stmt = $this->conn->query($sql);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getFilteredStudents($academicYear = '', $courseId = '', $semesterId = '', $sectionId = '')
    {
        $sql = "
        SELECT id, candidate_name
        FROM students
        WHERE 1=1
    ";

        $params = [];

        if (!empty($academicYear)) {
            $sql .= " AND academic_year = ? ";
            $params[] = $academicYear;
        }

        if (!empty($courseId)) {
            $sql .= " AND course_id = ? ";
            $params[] = $courseId;
        }

        if (!empty($semesterId)) {
            $sql .= " AND semester_id = ? ";
            $params[] = $semesterId;
        }

        if (!empty($sectionId)) {
            $sql .= " AND section_id = ? ";
            $params[] = $sectionId;
        }

        $sql .= " ORDER BY candidate_name ASC ";

        $stmt = $this->conn->prepare($sql);
        $stmt->execute($params);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getFilteredSubjects($courseId = '', $semesterId = '')
    {
        $sql = "
        SELECT id, subject_name
        FROM subjects
        WHERE 1=1
    ";

        $params = [];

        if (!empty($courseId)) {
            $sql .= " AND course_id = ? ";
            $params[] = $courseId;
        }

        if (!empty($semesterId)) {
            $sql .= " AND semester_id = ? ";
            $params[] = $semesterId;
        }

        $sql .= " ORDER BY subject_name ASC ";

        $stmt = $this->conn->prepare($sql);
        $stmt->execute($params);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getAdminSemesterSummary($academicYear = '', $courseId = '', $semesterId = '')
    {
        $sql = "
        SELECT
            COUNT(DISTINCT s.id) AS total_students,

            ROUND(AVG(student_result.percentage), 2) AS semester_average,

            SUM(CASE WHEN student_result.percentage >= 35 THEN 1 ELSE 0 END) AS pass_count,
            SUM(CASE WHEN student_result.percentage < 35 THEN 1 ELSE 0 END) AS fail_count,

            ROUND(AVG(att_result.attendance_percentage), 2) AS average_attendance

        FROM students s

        LEFT JOIN (
            SELECT 
                m.student_id,
                ROUND((SUM(m.marks_obtained) / SUM(e.total_marks)) * 100, 2) AS percentage
            FROM marks m
            INNER JOIN exams e ON m.exam_id = e.id
            WHERE e.exam_name IN ('First IA', 'Second IA', 'Mid Term')
            GROUP BY m.student_id
        ) student_result ON student_result.student_id = s.id

        LEFT JOIN (
            SELECT 
                student_id,
                ROUND((SUM(CASE WHEN status = 'Present' THEN 1 ELSE 0 END) / COUNT(*)) * 100, 2) AS attendance_percentage
            FROM attendance
            GROUP BY student_id
        ) att_result ON att_result.student_id = s.id

        WHERE 1=1
    ";

        $params = [];

        if (!empty($academicYear)) {
            $sql .= " AND s.academic_year = ? ";
            $params[] = $academicYear;
        }

        if (!empty($courseId)) {
            $sql .= " AND s.course_id = ? ";
            $params[] = $courseId;
        }

        if (!empty($semesterId)) {
            $sql .= " AND s.semester_id = ? ";
            $params[] = $semesterId;
        }

        $stmt = $this->conn->prepare($sql);
        $stmt->execute($params);

        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function getAdminSemesterComparison($academicYear = '', $courseId = '', $semesterId = '')
    {
        $sql = "
        SELECT
            sem.id AS semester_id,
            sem.semester_number,
            sem.semester_name,
            COUNT(DISTINCT s.id) AS total_students,
            ROUND(AVG(student_result.percentage), 2) AS semester_average,
            SUM(CASE WHEN student_result.percentage >= 35 THEN 1 ELSE 0 END) AS pass_count,
            SUM(CASE WHEN student_result.percentage < 35 THEN 1 ELSE 0 END) AS fail_count,
            ROUND(AVG(att_result.attendance_percentage), 2) AS average_attendance

        FROM semesters sem

        LEFT JOIN students s ON s.semester_id = sem.id

        LEFT JOIN (
            SELECT 
                m.student_id,
                ROUND((SUM(m.marks_obtained) / SUM(e.total_marks)) * 100, 2) AS percentage
            FROM marks m
            INNER JOIN exams e ON m.exam_id = e.id
            WHERE e.exam_name IN ('First IA', 'Second IA', 'Mid Term')
            GROUP BY m.student_id
        ) student_result ON student_result.student_id = s.id

        LEFT JOIN (
            SELECT 
                student_id,
                ROUND((SUM(CASE WHEN status = 'Present' THEN 1 ELSE 0 END) / COUNT(*)) * 100, 2) AS attendance_percentage
            FROM attendance
            GROUP BY student_id
        ) att_result ON att_result.student_id = s.id

        WHERE sem.status = 1
    ";

        $params = [];

        if (!empty($academicYear)) {
            $sql .= " AND s.academic_year = ? ";
            $params[] = $academicYear;
        }

        if (!empty($semesterId)) {
            $sql .= " AND sem.id = ? ";
            $params[] = $semesterId;
        }

        if (!empty($courseId)) {
            $sql .= " AND s.course_id = ? ";
            $params[] = $courseId;
        }

        $sql .= "
        GROUP BY sem.id, sem.semester_number, sem.semester_name
        ORDER BY sem.semester_number ASC
    ";

        $stmt = $this->conn->prepare($sql);
        $stmt->execute($params);

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getTeacherNote($studentId)
    {
        $sql = "
        SELECT 
            tn.*,
            COALESCE(p.first_name, 'Faculty') AS faculty_first_name,
            COALESCE(p.last_name, '') AS faculty_last_name
        FROM student_teacher_notes tn
        LEFT JOIN profiles p ON tn.faculty_user_id = p.user_id
        WHERE tn.student_id = ?
        LIMIT 1
    ";

        $stmt = $this->conn->prepare($sql);
        $stmt->execute([$studentId]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function saveTeacherNote($studentId, $facultyUserId, $note)
    {
        $sql = "
        INSERT INTO student_teacher_notes 
            (student_id, faculty_user_id, note)
        VALUES 
            (?, ?, ?)
        ON DUPLICATE KEY UPDATE
            faculty_user_id = VALUES(faculty_user_id),
            note = VALUES(note),
            updated_at = NOW()
    ";

        $stmt = $this->conn->prepare($sql);
        return $stmt->execute([$studentId, $facultyUserId, $note]);
    }

    public function getExamList()
    {
        $sql = "
        SELECT id, exam_name, total_marks
        FROM exams
        WHERE exam_name IN ('First IA', 'Second IA', 'Mid Term')
        ORDER BY 
            CASE 
                WHEN exam_name = 'First IA' THEN 1
                WHEN exam_name = 'Second IA' THEN 2
                WHEN exam_name = 'Mid Term' THEN 3
                ELSE 4
            END
    ";

        $stmt = $this->conn->query($sql);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function updateStudentMark($studentId, $subjectId, $examId, $marksObtained)
    {
        $sql = "
        INSERT INTO marks 
            (student_id, subject_id, exam_id, marks_obtained)
        VALUES 
            (?, ?, ?, ?)
        ON DUPLICATE KEY UPDATE
            marks_obtained = VALUES(marks_obtained)
    ";

        $stmt = $this->conn->prepare($sql);
        return $stmt->execute([$studentId, $subjectId, $examId, $marksObtained]);
    }

    public function updateStudentAttendance($studentId, $presentDays, $absentDays)
    {
        // Remove old attendance records for this student
        $deleteSql = "DELETE FROM attendance WHERE student_id = ?";
        $deleteStmt = $this->conn->prepare($deleteSql);
        $deleteStmt->execute([$studentId]);

        // Insert present days
        $insertSql = "INSERT INTO attendance (student_id, status) VALUES (?, ?)";
        $insertStmt = $this->conn->prepare($insertSql);

        for ($i = 1; $i <= $presentDays; $i++) {
            $insertStmt->execute([$studentId, 'Present']);
        }

        // Insert absent days
        for ($i = 1; $i <= $absentDays; $i++) {
            $insertStmt->execute([$studentId, 'Absent']);
        }

        return true;
    }
}
