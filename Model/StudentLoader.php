<?php

class StudentLoader extends Connection {

    private $students = [];

    public function __construct()
    {
        $handle = $this->openConnection()->prepare("SELECT * FROM students");
        $handle->execute();
        foreach ($handle->fetchAll() as $student) {
            $this->students[$student['id']] = new Student($student['id'], $student['first_name'], $student['last_name'], $student['email'], $student['created_at']);
        }
    }


    public function getStudents(): array
    {
        return $this->students;
    }

}