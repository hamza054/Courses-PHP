<?php

    

include_once 'simpleView.php';
include_once '../controllers/courseControlloer.php';
include_once '../controllers/studentController.php';


class SchooleView extends SimpleView{

    protected $admin;
    protected $viewObj;

    function __construct(){

            parent::__construct();
            $this->viewAllSchool();
            $this->getSumOfSchoolView();
            $this->sumStudent;
            $this->sumCourse;
    }


    function viewAllSchool(){
            
                
                $courseArray = CourseController::getAllCourses();

                $name = $_GET['admin_name'];
                $role = $_GET["admin_role"];
                $image = $_GET["admin_image"];
    
                echo "<div id='content' class='table'>";
                    echo "<div id='course_left'><span id='inMidaleOfPosiotion'><u><b>Courses <a href='courseControlloer.php?addCourse=newCourse&admin_name=$name&admin_role=$role&admin_image=$image'> &#10010;</a></span></b></u> ";
                
                    foreach($courseArray as $courseName)
                    {
                        
                        $cours_id = $courseName->getCourseID();
    
                        $link_to_school_course_view = "../controllers/courseControlloer.php?admin_name=".$name .'&' .'admin_role='.$role .'&' .'course_id='.$cours_id .'&'
                         .'admin_image='.$image ;
                         
                        echo '<div><a href='.$link_to_school_course_view.'>'. $courseName->getAsHtmlRow() .'</a></div>';   
                         
                    }
                    echo '</div>';

                         
                $studentArray=StudentController::getAllStudents();
                echo "<div id='student_right'><span id='inMidaleOfPosiotion'><u><b>Students <a href='studentController.php?action=newStudent&admin_name=$name&admin_role=$role&admin_image=$image'> &#10010;</a></span></b></u>";
                
                foreach($studentArray as $studentName)
                {
                    
                    $student_id = $studentName->getStudentID();

                    $link_to_school_studnt_view = "../controllers/studentController.php?admin_name=".$name .'&' .'admin_role='.$role .'&' .'student_id='.$student_id 
                     .'&'.'admin_image='.$image  ;
                     
                    echo '<div><a href='.$link_to_school_studnt_view.'>'.  $studentName->getAsHtmlRow() .'</a></div>'; 


                    
                }
                echo '</div>';

                $this->sumStudent = sizeof($courseArray);
                $this->sumCourse = sizeof($studentArray);
                
                
      
                

            echo '</div>';


            
    }

        function getSumOfSchoolView(){

            if ($_SERVER['PHP_SELF'] === '/xampp/php/lesson/phpProject/views/schoolView.php'){
                $img = "../style/image/courses0.png";
            
               
                echo 
                
                "<span id='center' class='mid'>
                <p> wellcome to name schoole.
                Hare little info on the school: </p>
                <img id='image_continer' src='$img' /> sum Courses:".$this->sumStudent.
                "<img id='image_continer' src='$img' /> sum Students: ".$this->sumCourse.
                
                "</span>" ;
            }
           
        } 



}

$schooleView =  new SchooleView();


?>