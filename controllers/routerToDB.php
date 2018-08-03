<?php

session_start();


if (isset($_POST['action'])){
    
    $value = $_POST['action'];
   

    switch($value){


        
        case  'Add Course' :

            $courseNameForm=$_POST['course_name'];
          

            
            include_once 'classToCheckToDB.php';
            
            $checkBeforeDB= new CheckBeforeDB();
            
            $vailFlag = $checkBeforeDB->checkCourseName($courseNameForm  , 0);
         

            if( $vailFlag){
                if (file_exists($_FILES['course_image']['tmp_name']) || is_uploaded_file($_FILES['course_image']['tmp_name'])){
                    $vailFlag = $checkBeforeDB->checkPic($_FILES['course_image']['size'], $_FILES['course_image']['type']);
                }
             
                if ($vailFlag == true ){
                    
                    $checkBeforeDB->saveInDB( $_POST['action']);
        
                   
                }
            }else $_SESSION['error']='plese insert course name';
            
        break;

        case  'edit Course' :

            $courseNameForm=$_POST['course_name'];
            $courseIDForm = $_GET['course_id'];
            
            
            include_once 'classToCheckToDB.php';
            

            $checkBeforeDB= new CheckBeforeDB();
         
            $vailFlag = $checkBeforeDB->checkCourseName($courseNameForm , $courseIDForm);
         
           
         
            if( $vailFlag ) {
                if (file_exists($_FILES['course_image']['tmp_name']) || is_uploaded_file($_FILES['course_image']['tmp_name'])){
                    $vailFlag = $checkBeforeDB->checkPic($_FILES['course_image']['size'], $_FILES['course_image']['type']);
                }
             
                if ($vailFlag == true ){
                    
                    $checkBeforeDB->saveInDB( $_POST['action']);
        
                   
                }
            }

            
            
        break;


        case 'Delete Course':
            
            include_once 'classToCheckToDB.php';
            
            $checkBeforeDB= new CheckBeforeDB();

            $checkBeforeDB->dalateCourseFromDB($_GET['course_id']);
            
        break;


                
        case  'edit Student' :


            $studnetNameForm=$_POST['student_name'];
            $studnetEmailForm=$_POST['student_email'];
            $studnetPhoneForm=$_POST['student_phone'];
            
            if (isset($_POST['courses'])){
                $studnetCoursesArray=$_POST['courses'];
            }else $studnetCoursesArray=[];

            $studnetIDForm=$_GET['student_id'];
             
            include_once 'classToCheckToDB.php';
            


            $checkBeforeDB= new CheckBeforeDB();
         
            $vailFlag = $checkBeforeDB->checkStudentName($studnetEmailForm , $studnetIDForm);
         
           
         
            if( $vailFlag ) {
                if (file_exists($_FILES['student_image']['tmp_name']) || is_uploaded_file($_FILES['student_image']['tmp_name'])){
                    $vailFlag = $checkBeforeDB->checkPic($_FILES['student_image']['size'], $_FILES['student_image']['type']);
                }

                
                            
                if ( isset($studnetCoursesArray)){

                        $vailFlag = $checkBeforeDB->checkStudentInCourses($studnetCoursesArray , $studnetIDForm);
                        if($vailFlag){

                            $checkBeforeDB->saveStudentCoursesInDB( $_POST['action'] , $studnetCoursesArray , $studnetIDForm);
                        }

                }

                    
                    $checkBeforeDB->saveInDB( $_POST['action']);

                
                
            }

            
            
        break;        
        
        

        case  'Add Student' :

        
            $studnetNameForm=$_POST['student_name'];
            $studnetEmailForm=$_POST['student_email'];
            $studnetPhoneForm=$_POST['student_phone'];
            
            if (isset($_POST['courses'])){
                $studnetCoursesArray=$_POST['courses'];
            }
            
            
            include_once 'classToCheckToDB.php';
            
            $checkBeforeDB= new CheckBeforeDB();
            
            $studentNewID =$checkBeforeDB->returnIDtoNewStudent();

            if (isset($studnetEmailForm)){
                        $vailFlag = $checkBeforeDB->checkStudentName($studnetEmailForm , $studentNewID );
                
                    
                    if( $vailFlag){
                        if (file_exists($_FILES['student_image']['tmp_name']) || is_uploaded_file($_FILES['student_image']['tmp_name'])){
                            $vailFlag = $checkBeforeDB->checkPic($_FILES['student_image']['size'], $_FILES['student_image']['type']);
                        }

                                
                        if ($vailFlag == true ){
                            
                            if ( isset($studnetCoursesArray)){
                                $vailFlag = $checkBeforeDB->checkStudentInCourses($studnetCoursesArray , $studentNewID);
                                if($vailFlag){

                                    $checkBeforeDB->saveStudentCoursesInDB( $_POST['action'] , $studnetCoursesArray , $studentNewID);
                                }

                            }

                            
                            $checkBeforeDB->saveInDB( $_POST['action']);

                        
                        }
                    }


            }else  $_SESSION['error']='plese insert student name';
            
        break;




        case 'Delete Student':
            
            include_once 'classToCheckToDB.php';
            
            $checkBeforeDB= new CheckBeforeDB();

            $checkBeforeDB->dalateStudentFromDB($_GET['student_id']);
        
        break;


        case  'Edit Admin' :

            $adminNameForm=$_POST['admin_name'];
            $adminEmailForm=$_POST['admin_email'];
            $adminPhoneForm=$_POST['admin_phone'];
            $adminRoleForm=$_POST['admin_role'];
            

            if ( isset ($_POST['admin_password']) && isset($_POST['confirm_admin_password'])){
                    $adminPaaswordForm=$_POST['admin_password'];
                    $adminConfirmPasswordForm=$_POST['confirm_admin_password'];

                    $adminIDForm = $_GET['admin_id'];
                    
                    include_once 'classToCheckToDB.php';
                    $checkBeforeDB= new CheckBeforeDB();
                
                if($checkBeforeDB->checkIfAdminOwner($adminRoleForm)){

                        if ($adminPaaswordForm === $adminConfirmPasswordForm){
                           
                    
                            $vailFlag = $checkBeforeDB->checkAdminName($adminEmailForm , $adminIDForm);
                        
                            if( $vailFlag ) {
                                
                                if (file_exists($_FILES['admin_image']['tmp_name']) || is_uploaded_file($_FILES['admin_image']['tmp_name'])){
                                    $vailFlag = $checkBeforeDB->checkPic($_FILES['admin_image']['size'], $_FILES['admin_image']['type']);
                                }          
                                $checkBeforeDB->saveInDB( $_POST['action']);                    
                                }
                        }

                }else $_SESSION['error']= 'can be only one owner!!';

            }else  $_SESSION['error']= 'plese check the password!';
            
            include_once 'adminController.php';


            
        break;  
            

        case  'add Admin' :

            $adminNameForm=$_POST['admin_name'];
            $adminEmailForm=$_POST['admin_email'];
            $adminPhoneForm=$_POST['admin_phone'];
            $adminPaaswordForm=$_POST['admin_password'];
            $adminConfirmPasswordForm=$_POST['confirm_admin_password'];
            $adminRoleForm=$_POST['admin_role'];
            
            include_once 'classToCheckToDB.php';
            $checkBeforeDB= new CheckBeforeDB();
            
            if($checkBeforeDB->checkIfAdminOwner($adminRoleForm)){
                
                if ($adminPaaswordForm === $adminConfirmPasswordForm ){
                
                    
            
                    $vailFlag = $checkBeforeDB->checkAdminName($adminEmailForm , 0);
                
                    if( $vailFlag ) {
                        
                        if (file_exists($_FILES['admin_image']['tmp_name']) || is_uploaded_file($_FILES['admin_image']['tmp_name'])){
                            $vailFlag = $checkBeforeDB->checkPic($_FILES['admin_image']['size'], $_FILES['admin_image']['type']);
                        }          
                        $checkBeforeDB->saveInDB( $_POST['action']);                    
                        }
                }
                else $_SESSION['error']= 'plese check the password!';
            } 
            else $_SESSION['error']= 'You Cant insert OWNER role to system!';
           
            
            include_once 'adminController.php';

        
        break;


        case 'Delete Admin':
            
        include_once 'classToCheckToDB.php';
        
        $checkBeforeDB= new CheckBeforeDB();

        $checkBeforeDB->dalateAdminFromDB($_GET['admin_id']);
    
        include_once 'adminController.php';


    break;
            
    }

 


    include_once "courseControlloer.php" ;
    
    include_once "studentController.php" ;


} 





?>