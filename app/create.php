<?php

$mypdo = connectionDB();

$students = new Student($mypdo);

$feedback = null;

if(isset($_POST["student_lastname"]) && isset($_POST["student_firstname"]) && isset($_POST["student_email"])){
    $students->addStudent($_POST);
    $feedback = $_POST["student_firstname"] . " " . $_POST["student_lastname"] . " a bien été ajouté !";
}