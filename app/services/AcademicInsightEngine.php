<?php

class AcademicInsightEngine
{
    public static function analyze($attendance, $marks, $subjectPerformance = [])
    {
        $tags = [];
        $recommendations = [];
        $risk = "Low";
        $summary = "";

        $profile = [];

        /*
        |--------------------------------------------------------------------------
        | ATTENDANCE PROFILE
        |--------------------------------------------------------------------------
        */

        if ($attendance >= 85) {
            $profile[] = "high_attendance";
        }

        if ($attendance >= 60 && $attendance < 85) {
            $profile[] = "medium_attendance";
        }

        if ($attendance < 60) {
            $profile[] = "low_attendance";
        }

        /*
        |--------------------------------------------------------------------------
        | PERFORMANCE PROFILE
        |--------------------------------------------------------------------------
        */

        if ($marks >= 75) {
            $profile[] = "high_marks";
        }

        if ($marks >= 35 && $marks < 75) {
            $profile[] = "medium_marks";
        }

        if ($marks < 35) {
            $profile[] = "low_marks";
        }

        /*
|--------------------------------------------------------------------------
| ADVANCED COMBINATION ANALYSIS
|--------------------------------------------------------------------------
*/

        // HIGH ATTENDANCE + HIGH MARKS
        if (
            in_array("high_attendance", $profile) &&
            in_array("high_marks", $profile)
        ) {

            $risk = "Low";

            $tags[] = "Academic Excellence";
            $tags[] = "Consistent Top Performer";
            $tags[] = "Self Disciplined";

            $recommendations[] =
                "Encourage advanced projects and leadership roles";

            $summary =
                "Student demonstrates excellent academic consistency and discipline.";
        }

        /*
|--------------------------------------------------------------------------
| HIGH ATTENDANCE + LOW MARKS
|--------------------------------------------------------------------------
*/ elseif (
            in_array("high_attendance", $profile) &&
            in_array("low_marks", $profile)
        ) {

            $risk = "High";

            $tags[] = "Concept Clarity Problem";
            $tags[] = "High Effort Low Outcome";
            $tags[] = "Needs Academic Mentoring";

            $recommendations[] =
                "Provide one-to-one mentoring sessions";

            $recommendations[] =
                "Conduct basic concept revision classes";

            $summary =
                "Student attends regularly but struggles academically.";
        }

        /*
|--------------------------------------------------------------------------
| LOW ATTENDANCE + HIGH MARKS
|--------------------------------------------------------------------------
*/ elseif (
            in_array("low_attendance", $profile) &&
            in_array("high_marks", $profile)
        ) {

            $risk = "Medium";

            $tags[] = "Independent Learner";
            $tags[] = "Attendance Risk";
            $tags[] = "Self Study Dominant";

            $recommendations[] =
                "Improve classroom participation";

            $recommendations[] =
                "Maintain attendance compliance";

            $summary =
                "Student performs well academically despite low attendance.";
        }

        /*
|--------------------------------------------------------------------------
| MEDIUM ATTENDANCE + MEDIUM MARKS
|--------------------------------------------------------------------------
*/ elseif (
            in_array("medium_attendance", $profile) &&
            in_array("medium_marks", $profile)
        ) {

            $risk = "Medium";

            $tags[] = "Average Performer";
            $tags[] = "Needs Consistency";
            $tags[] = "Moderate Academic Risk";

            $recommendations[] =
                "Increase revision frequency";

            $recommendations[] =
                "Improve study consistency";

            $summary =
                "Student shows moderate academic performance and engagement.";
        }

        /*
|--------------------------------------------------------------------------
| LOW ATTENDANCE + LOW MARKS
|--------------------------------------------------------------------------
*/ elseif (
            in_array("low_attendance", $profile) &&
            in_array("low_marks", $profile)
        ) {

            $risk = "Critical";

            $tags[] = "Critical Risk Student";
            $tags[] = "Academic Disengagement";
            $tags[] = "Low Motivation";

            $recommendations[] =
                "Immediate parent meeting required";

            $recommendations[] =
                "Provide counseling and mentoring";

            $recommendations[] =
                "Create attendance recovery plan";

            $summary =
                "Student is critically disengaged academically.";
        }

        /*
|--------------------------------------------------------------------------
| MEDIUM ATTENDANCE + LOW MARKS
|--------------------------------------------------------------------------
*/ elseif (
            in_array("medium_attendance", $profile) &&
            in_array("low_marks", $profile)
        ) {

            $risk = "High";

            $tags[] = "Weak Academic Foundation";
            $tags[] = "Needs Remedial Coaching";

            $recommendations[] =
                "Conduct subject-wise remedial classes";

            $recommendations[] =
                "Provide practice-based learning support";

            $summary =
                "Student attendance is acceptable but academic understanding is weak.";
        }

        /*
|--------------------------------------------------------------------------
| LOW ATTENDANCE + MEDIUM MARKS
|--------------------------------------------------------------------------
*/ elseif (
            in_array("low_attendance", $profile) &&
            in_array("medium_marks", $profile)
        ) {

            $risk = "Medium";

            $tags[] = "Irregular Performer";
            $tags[] = "Attendance Defaulter";

            $recommendations[] =
                "Improve attendance consistency";

            $recommendations[] =
                "Increase classroom interaction";

            $summary =
                "Student has academic capability but lacks classroom engagement.";
        }

        /*
|--------------------------------------------------------------------------
| HIGH ATTENDANCE + MEDIUM MARKS
|--------------------------------------------------------------------------
*/ elseif (
            in_array("high_attendance", $profile) &&
            in_array("medium_marks", $profile)
        ) {

            $risk = "Medium";

            $tags[] = "Consistent But Average";
            $tags[] = "Potential For Improvement";

            $recommendations[] =
                "Focus on advanced problem solving";

            $recommendations[] =
                "Encourage competitive learning";

            $summary =
                "Student is disciplined but needs stronger academic performance.";
        }

        /*
|--------------------------------------------------------------------------
| DEFAULT
|--------------------------------------------------------------------------
*/ else {

            $risk = "Medium";

            $tags[] = "Moderate Academic Profile";

            $recommendations[] =
                "Improve consistency in attendance and preparation";

            $summary =
                "Student shows moderate academic behavior.";
        }

        /*
        |--------------------------------------------------------------------------
        | SUBJECT ANALYSIS
        |--------------------------------------------------------------------------
        */

        $failedSubjects = 0;

        foreach ($subjectPerformance as $subject) {

            $percentage = $subject['percentage'] ?? 0;

            if ($percentage < 35) {
                $failedSubjects++;
            }
        }

        if ($failedSubjects >= 2) {

            $risk = "High";

            $tags[] =
                "Multiple Subject Failure Risk";

            $recommendations[] =
                "Conduct remedial subject coaching";
        }

        /*
|--------------------------------------------------------------------------
| EXAM PATTERN ANALYSIS
|--------------------------------------------------------------------------
*/

        foreach ($subjectPerformance as $subject) {

            $firstIa =
                $subject['first_ia'] ?? 0;

            $secondIa =
                $subject['second_ia'] ?? 0;

            $midTerm =
                $subject['mid_term'] ?? 0;

            /*
    |--------------------------------------------------------------------------
    | LOW IA + HIGH MIDTERM
    |--------------------------------------------------------------------------
    */

            if (
                $firstIa < 10 &&
                $secondIa < 10 &&
                $midTerm >= 35
            ) {

                $tags[] =
                    "Late Exam Improver";

                $recommendations[] =
                    "Student performs better in final-style exams than internal assessments";

                $summaries[] =
                    " Strong improvement observed during mid term examinations.";
            }

            /*
    |--------------------------------------------------------------------------
    | HIGH IA + LOW MIDTERM
    |--------------------------------------------------------------------------
    */

            if (
                $firstIa >= 18 &&
                $secondIa >= 18 &&
                $midTerm < 20
            ) {

                $risk = "High";

                $tags[] =
                    "Exam Pressure Detected";

                $recommendations[] =
                    "Student may struggle with long-duration or full-syllabus exams";

                $recommendations[] =
                    "Conduct mock tests and exam-confidence training";

                $summaries[] =
                    " Student performs well in internal assessments but struggles in major examinations.";
            }

            /*
    |--------------------------------------------------------------------------
    | IA IMPROVEMENT
    |--------------------------------------------------------------------------
    */

            if (
                $secondIa > $firstIa
            ) {

                $tags[] =
                    "Gradual Academic Improvement";

                $summaries[] =
                    " Improvement observed between IA 1 and IA 2.";
            }

            /*
    |--------------------------------------------------------------------------
    | IA DECLINE
    |--------------------------------------------------------------------------
    */

            if (
                $secondIa < $firstIa
            ) {

                $tags[] =
                    "Declining Internal Performance";

                $recommendations[] =
                    "Monitor consistency between assessments";

                $summaries[] =
                    " Decline observed in internal assessment performance.";
            }

            /*
    |--------------------------------------------------------------------------
    | VERY LOW MIDTERM
    |--------------------------------------------------------------------------
    */

            if (
                $midTerm < 15
            ) {

                $risk = "High";

                $tags[] =
                    "Weak Full Syllabus Retention";

                $recommendations[] =
                    "Student requires complete syllabus revision support";

                $summaries[] =
                    " Mid term performance indicates weak long-term retention.";
            }

            /*
    |--------------------------------------------------------------------------
    | STRONG MIDTERM
    |--------------------------------------------------------------------------
    */

            if (
                $midTerm >= 40
            ) {

                $tags[] =
                    "Strong Final Exam Potential";

                $recommendations[] =
                    "Encourage advanced revision and competitive preparation";

                $summaries[] =
                    " Student demonstrates strong full-syllabus understanding.";
            }

            /*
    |--------------------------------------------------------------------------
    | BOTH IA + MIDTERM LOW
    |--------------------------------------------------------------------------
    */

            if (
                $firstIa < 10 &&
                $secondIa < 10 &&
                $midTerm < 20
            ) {

                $risk = "Critical";

                $tags[] =
                    "Severe Academic Risk";

                $recommendations[] =
                    "Immediate remedial intervention required";

                $summaries[] =
                    " Student consistently underperforms across all assessment types.";
            }

            /*
    |--------------------------------------------------------------------------
    | HIGH IA2 + HIGH MIDTERM
    |--------------------------------------------------------------------------
    */

            if (
                $secondIa >= 18 &&
                $midTerm >= 35
            ) {

                $tags[] =
                    "Consistent Academic Growth";

                $recommendations[] =
                    "Maintain current preparation strategy";

                $summaries[] =
                    " Student demonstrates stable academic growth across assessments.";
            }
        }

        $tags =
            array_unique($tags);

        $recommendations =
            array_unique($recommendations);

        $summaries =
            array_unique($summaries ?? []);

        return [

            'tags' => array_unique($tags),

            'recommendations' => array_unique($recommendations),

            'risk' => $risk,

            'summary' => implode(" ", $summaries)
        ];
    }
}
