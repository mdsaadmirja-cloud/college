<?php

class AttendanceModel
{
    private $conn;

    public function __construct($db)
    {
        $this->conn = $db;
    }

    /*
    |--------------------------------------------------------------------------
    | SAVE SUBJECT ATTENDANCE
    |--------------------------------------------------------------------------
    */

    public function saveSubjectAttendance(
        $studentId,
        $subjectId,
        $totalClasses,
        $presentClasses,
        $absentClasses
    ) {
        $checkQuery = "

            SELECT id

            FROM subject_attendance

            WHERE student_id = :student_id
            AND subject_id = :subject_id

            LIMIT 1
        ";

        $checkStmt =
            $this->conn->prepare($checkQuery);

        $checkStmt->execute([

            'student_id' => $studentId,

            'subject_id' => $subjectId
        ]);

        $existing =
            $checkStmt->fetch(PDO::FETCH_ASSOC);

        /*
        UPDATE EXISTING
        */

        if ($existing) {

            $updateQuery = "

                UPDATE subject_attendance

                SET

                    total_classes = :total_classes,

                    present_classes = :present_classes,

                    absent_classes = :absent_classes

                WHERE id = :id
            ";

            $stmt =
                $this->conn->prepare($updateQuery);

            return $stmt->execute([

                'total_classes' =>
                $totalClasses,

                'present_classes' =>
                $presentClasses,

                'absent_classes' =>
                $absentClasses,

                'id' =>
                $existing['id']
            ]);
        }

        /*
        INSERT NEW
        */

        $insertQuery = "

            INSERT INTO subject_attendance (

                student_id,
                subject_id,
                total_classes,
                present_classes,
                absent_classes

            )

            VALUES (

                :student_id,
                :subject_id,
                :total_classes,
                :present_classes,
                :absent_classes
            )
        ";

        $stmt =
            $this->conn->prepare($insertQuery);

        return $stmt->execute([

            'student_id' =>
            $studentId,

            'subject_id' =>
            $subjectId,

            'total_classes' =>
            $totalClasses,

            'present_classes' =>
            $presentClasses,

            'absent_classes' =>
            $absentClasses
        ]);
    }

    /*
    |--------------------------------------------------------------------------
    | GET STUDENT SUBJECT ATTENDANCE
    |--------------------------------------------------------------------------
    */

    public function getStudentSubjectAttendance(
        $studentId,
        $subjectId = null
    ) {
        $query = "

            SELECT

                sa.*,

                s.subject_name,

                ROUND(

                    (
                        sa.present_classes
                        /
                        sa.total_classes
                    ) * 100,

                    2

                ) as attendance_percentage

            FROM subject_attendance sa

            JOIN subjects s
                ON s.id = sa.subject_id

            WHERE sa.student_id = :student_id
        ";

        $params = [

            'student_id' => $studentId
        ];

        if (!empty($subjectId)) {

            $query .= "
                AND sa.subject_id = :subject_id
            ";

            $params['subject_id'] =
                $subjectId;
        }

        $query .= "
            ORDER BY s.subject_name ASC
        ";

        $stmt =
            $this->conn->prepare($query);

        $stmt->execute($params);

        return
            $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}
