<?php

$admin_password = "Test@123";
$faculty_password = "Test@123";
$student_password = "Test@123";

echo "Admin Hash: " . password_hash($admin_password, PASSWORD_DEFAULT) . "<br><br>";

echo "Faculty Hash: " . password_hash($faculty_password, PASSWORD_DEFAULT) . "<br><br>";

echo "Student Hash: " . password_hash($student_password, PASSWORD_DEFAULT) . "<br><br>";

?>