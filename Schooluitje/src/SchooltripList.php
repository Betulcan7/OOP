<?php

namespace Schooltrip;

class SchooltripList
{

    private $studentList = [];
    private $teacher;

    public function addStudentToList($student)
    {
        $this->studentList[] = $student;
    }

    public function setTeacher($teacher)
    {
        $this->teacher = $teacher;
    }

    public function getStudentList()
    {
        return $this->studentList;
    }

    public function getTeacher()
    {
        return $this->teacher;
    }
}

?>