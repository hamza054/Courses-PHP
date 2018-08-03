<?php

include_once '../controllers/studentController.php';

 $studentControl= new StudentController();
 $studentArray=$studentControl->getAllStudents();

 foreach ($studentArray as $student){
     echo $student->getStudentName().'<br>';
 }



    
?>