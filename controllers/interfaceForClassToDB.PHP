

<?php

interface classToDB_Template
{
    public function checkStudentName($courseNameForm  , $courseIDForm);
    public function checkCourseName($studnetNameForm  , $studntIDForm);

    public  function checkPic($file_size ,$file_type);
    public function saveInDB($whatToSave);
}



?>