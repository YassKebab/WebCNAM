<?php


class Student
{
    public $mypdo;

    public function __construct(PDO $mypdo)
    {
        $this->mypdo = $mypdo;
    }

    public function getStudent(){
        $stmt = $this->mypdo->query("SELECT * FROM students");
        return $stmt->fetchAll();
    }

    public function deleteStudent($id){
        $stmt = $this->mypdo->prepare("DELETE FROM students WHERE student_id = :student_id");
        $stmt->execute(array('student_id' => $id));
    }

    public function addStudent(array $newStudent){

        $lastname = $newStudent["student_lastname"];
        $firstname = $newStudent["student_firstname"];
        $email = $newStudent["student_email"];

        $stmt = $this->mypdo->prepare(/** @lang text */ "INSERT INTO students (student_lastname, student_firstname, student_email)
        VALUES (:lastname, :firstname, :email)");

        $stmt->bindParam(':lastname', $lastname);
        $stmt->bindParam(':firstname', $firstname);
        $stmt->bindParam(':email', $email);

        $stmt->execute();
    }

    public function updateStudent($id, array $oldStudent){
        $lastname = $oldStudent["student_lastname"];
        $firstname = $oldStudent["student_firstname"];
        $email = $oldStudent["student_email"];

        $stmt = $this->mypdo->prepare("UPDATE students 
                                                SET student_lastname = :student_lastname, student_firstname = :student_firstname, student_email = :student_email 
                                                WHERE student_id = :student_id");

        $stmt->bindParam(':student_lastname', $lastname);
        $stmt->bindParam(':student_firstname', $firstname);
        $stmt->bindParam(':student_email', $email);
        $stmt->bindParam(':student_id', $id);

        $stmt->execute();
    }

    public function getStudentById($id){
        $stmt = $this->mypdo->prepare("SELECT * FROM students WHERE student_id =?");
        $stmt->execute([$id]);
        return $stmt->fetch();
    }
}