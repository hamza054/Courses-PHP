<?php


include_once '../data/bl.php';
include_once 'interfaceForClassToDB.php';


class CheckBeforeDB implements classToDB_Template{
    
   public $vailFlag;


         
    

    function checkCourseName($courseNameForm , $courseIDForm ){
        
        $answer=false ;

        if (gettype($courseNameForm)== 'string' && !empty($courseNameForm) ){
            
            $from_sql = new BL();
            $courseArray=$from_sql->getCourse();
           
            foreach ( $courseArray as $x){
                $courseNameFromDB = $x->getCourseName();
                $courseIDFromDB = $x->getCourseID();

                if ( ($courseNameForm == $courseNameFromDB) &&  ($courseIDFromDB!=$courseIDForm) )  {
                    

                    $answer = "Sorry...Username already taken"; 
                    $_SESSION['error'] = $answer;
                    $answer = false;       
                    break;
        
                }
                else  	{
                    
                        $answer = true;
                        unset( $_SESSION );
                                      
                        }
                }
        }
       
        else {
                $answerFromDB = "Sorry...please vail the text";
                $_SESSION['error'] = $answer;
                $answer = false;   
        }
           
        
            return $answer;
        
    }

    function checkStudentName($studnetEmailForm  , $studntIDForm){
        
        $answer=false ;


        if (gettype($studnetEmailForm) == 'string' && !empty($studnetEmailForm) ){
            
            if (!filter_var($studnetEmailForm, FILTER_VALIDATE_EMAIL)) {
                $_SESSION['error'] = "Invalid email "; 
                }
            else{
                $from_sql = new BL();
                $studentArray=$from_sql->getAllStudents();
               
                foreach ( $studentArray as $x){
                    $studentEmailFromDB = $x->getStudentEmail();
                    $studentIDFromDB = $x->getStudentID();
    
    
                    if ( ($studnetEmailForm == $studentEmailFromDB) &&  ($studentIDFromDB!=$studntIDForm) )  {
                    
                        $answer = "Sorry...Username already taken"; 
                        $_SESSION['error'] = $answer;
                        $answer = false;       
                        break;
            
                    }
                    else  	{
                        
                            $answer = true;
                            unset( $_SESSION );
                                          
                            }
                    }
            }
        
        }
       
        else {
                $answerFromDB = "Email is required or vail the text...";
                $_SESSION['error'] = $answer;
                $answer = false;   
        }
           
        
            return $answer;
    }



    function checkAdminName($adminEmailForm  , $adminIDForm){
        
        $answer=false ;


        if (gettype($adminEmailForm) == 'string' && !empty($adminEmailForm) ){
            
            if (!filter_var($adminEmailForm, FILTER_VALIDATE_EMAIL)) {
                $_SESSION['error'] = "Invalid email "; 
                }
            else{
                $from_sql = new BL();
                $adminArray=$from_sql->getAdministrator();
               
                foreach ( $adminArray as $x){
                    $adminEmailFromDB = $x->getUserName();
                    $adminIDFromDB = $x->getAdminID();
    
    
                    if ( ($adminEmailForm == $adminEmailFromDB) &&  ($adminIDFromDB!=$adminIDForm) )  {
                    
                        $answer = "Sorry...Username already taken"; 
                        $_SESSION['error'] = $answer;
                        $answer = false;       
                        break;
            
                    }
                    else  	{
                        
                            $answer = true;
                            unset( $_SESSION );
                                          
                            }
                    }
            }
        
        }
       
        else {
                $answerFromDB = "Email is required or vail the text...";
                $_SESSION['error'] = $answer;
                $answer = false;   
        }
           
        
            return $answer;
    }



    function checkPic( $file_size , $file_type){

        if ( $file_size < 100000 && ($file_type=='image/png' || $file_type=='image/jpg') ){
           return true;
           unset( $_SESSION );
         }
         else {
            $answer = "Sorry...please chack your pic ";
            $_SESSION['error'] = $answer;
            return false;
         }
    }

    function saveInDB($whatToSave ){

        if($whatToSave=='edit Course'  ){

            $courseID =  $_GET['course_id'];

            $uploaddir = 'style/image/';
            $uploadfile = $uploaddir . basename($_FILES['course_image']['name']);
            
            move_uploaded_file($_FILES['course_image']['name'], $uploadfile);
            //echo "File is valid, and was successfully uploaded.\n";
                        
            $pictureToDB= $uploaddir.$_FILES['course_image']['name'];
            
               

            $from_sql = new BL();
            $from_sql->updateCourse( $_POST['course_name'] , $_POST['course_desc'] , $pictureToDB , $courseID);
            $_SESSION['error']='you update the course!!';

            


        }
        elseif($whatToSave=='Add Course') {

            $uploaddir = 'style/image/';
            $uploadfile = $uploaddir . basename($_FILES['course_image']['name']);

            move_uploaded_file($_FILES['course_image']['name'], $uploadfile);
            //echo "File is valid, and was successfully uploaded.\n";

            $pictureToDB= $uploaddir.$_FILES['course_image']['name'];
            $from_sql = new BL();
            $from_sql->insertCouese( $_POST['course_name'] , $_POST['course_desc'] , $pictureToDB );
            $_SESSION['error']='your new course save!!';
            
            
        }


        elseif($whatToSave=='add Admin') {

            $uploaddir = 'style/image/';
            $uploadfile = $uploaddir . basename($_FILES['admin_image']['name']);

            move_uploaded_file($_FILES['admin_image']['name'], $uploadfile);
            //echo "File is valid, and was successfully uploaded.\n";

            $pictureToDB= $uploaddir.$_FILES['admin_image']['name'];
            $from_sql = new BL();
            $from_sql->insertAdmin( $_POST['admin_name'] , $_POST['admin_password'] , $_POST['admin_role'] , $_POST['admin_phone'], $_POST['admin_email'] ,  $pictureToDB );
            $_SESSION['error']='your new admin save!!';
            
            
            
            
        }

        elseif($whatToSave=='Add Student') {

            $uploaddir = 'style/image/';
            $uploadfile = $uploaddir . basename($_FILES['student_image']['name']);

            move_uploaded_file($_FILES['student_image']['name'], $uploadfile);
            //echo "File is valid, and was successfully uploaded.\n";

            $pictureToDB= $uploaddir.$_FILES['student_image']['name'];
            $from_sql = new BL();
            $from_sql->insertStudent( $_POST['student_name'] , $_POST['student_email'] , $_POST['student_phone'] , $pictureToDB );
            
            
            
            
            $_SESSION['error']='your new student save!!';
            
            
        }

        elseif($whatToSave=='Edit Admin') {

            $adminID =  $_GET['admin_id'];
            
            $uploaddir = 'style/image/';
            $uploadfile = $uploaddir . basename($_FILES['admin_image']['name']);

            move_uploaded_file($_FILES['admin_image']['name'], $uploadfile);
            //echo "File is valid, and was successfully uploaded.\n";

            $pictureToDB= $uploaddir.$_FILES['admin_image']['name'];
            
            $from_sql = new BL();
            
            //UPDATE `administrator_table` SET `admin_name`=[value-2],`admin_password`=[value-3],`admin_role`=[value-4],`admin_phone`=[value-5],
            //`admin_email`=[value-6],`admin_image`=[value-7] WHERE `admin_id`=


            $from_sql->updateAdmin( $_POST['admin_name'] , $_POST['admin_password'] , $_POST['admin_role'] , $_POST['admin_phone'], $_POST['admin_email'] ,  $pictureToDB , $adminID );
           
            $_SESSION['error']='your admin save!!';
            
            
        }

        elseif($whatToSave=='edit Student') {

            $studentID =  $_GET['student_id'];
            
            $uploaddir = 'style/image/';
            $uploadfile = $uploaddir . basename($_FILES['student_image']['name']);

            move_uploaded_file($_FILES['student_image']['name'], $uploadfile);
            //echo "File is valid, and was successfully uploaded.\n";

            $pictureToDB= $uploaddir.$_FILES['student_image']['name'];
            
            $from_sql = new BL();
            
            $from_sql->updateStudent( $_POST['student_name'] , $_POST['student_email'] , $_POST['student_phone'] , $pictureToDB , $studentID );
           
            $_SESSION['error']='your student save!!';
            
            
        }
    
        
        
    }


    function saveStudentCoursesInDB( $whatToSave , $studentCourseArray , $studentID){
            if ( $whatToSave == 'Add Student'){
                $from_sql = new BL();
                $from_sql->insertStudentCourses ( $studentCourseArray , $studentID );
            }
            elseif ($whatToSave=='edit Student'){
                $from_sql = new BL();
                $from_sql->delete_studnet_courses($studentID);
                $from_sql->insertStudentCourses ( $studentCourseArray , $studentID );
            }
    }


    function returnIDtoNewStudent(){
        $from_sql = new BL();
        $studentArray = $from_sql->getAllStudents();

        $lastStudent = end($studentArray);

        $lastStudentID = $lastStudent-> getStudentID();

        return $lastStudentID+1;
    }


    function checkStudentInCourses($studnetCoursesArray , $studentID){

        return true;

    }
    function checkIfAdminOwner($adminRoleForm) {
        $from_sql = new BL();
        $adminArray = $from_sql->getAdministrator();
        $flag = false;
        foreach ($adminArray as $admin){
            
            if ( ($admin->getAdminRole() == $adminRoleForm) && $admin->getAdminRole()=='owner' && $adminRoleForm=='owner' ){
                $flag = false;
                break;
            }else $flag = true;
        }
        return $flag;

    }


    function dalateCourseFromDB($courseID){
        $from_sql = new BL();
        $from_sql-> delete_course($courseID);
        $_SESSION['error']='your course delated!!';

        
    }

    function dalateStudentFromDB($studentID){
        $from_sql = new BL();
        $from_sql-> delete_studnet($studentID);
        $_SESSION['error']='your student delated!!';

        
    }

    function dalateAdminFromDB($adminID){
        $from_sql = new BL();
        $from_sql-> dalateAdminFromDB($adminID);
        $_SESSION['error']='your admin delated!!';

        
    }

}



?>