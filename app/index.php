<?php

$mypdo = connectionDB();

$students = new Student($mypdo);

if(isset($_POST["student_id"]) && is_numeric($_POST["student_id"])){
    $students->deleteStudent($_POST["student_id"]);
}

$allStudents = $students->getStudent();

