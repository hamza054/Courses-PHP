<?php

    include_once '../data/bl.php';

  
 
    // add coursr // checkname // 

    class CourseController {

        function __construct(){
           

            if (isset($_GET['course_id']) && !isset($_POST['action']) && !isset($_GET['addCourse'])  ){
                
                 $this->getAllStudentInCourse($_GET['course_id']);

            }

            
            elseif ( ( (isset($_GET['addCourse']) && $_GET['addCourse']=='newCourse') || ( isset($_POST['action']) && ($_POST['action'])=='Add Course' ) )  ){
                
                include_once ("../views/addCourse.php");

           }
           
          
           elseif ( ( (isset($_GET['addCourse']) && $_GET['addCourse']=='editCourse') || isset($_POST['action'])  ) && isset($_GET['course_id'])  ){
            
            
            $from_sql = new BL();
            $courseArray = $from_sql->getCourseViewInContiner($_GET['course_id']) ;
              
            include_once ("../views/editCourse.php");
            }
            
         
            
        }



        
       static function getAllCourses() {
         
            $from_sql = new BL();
            $courseArray=$from_sql->getCourse();
            return $courseArray;
          
        }


        function getAllStudentInCourse($courseID) {
           
            $businessLogic = new BL();
            $studentInCoursesObjectsArray = $businessLogic->getCouresStudents($courseID);
            $course = $businessLogic->getCourseViewInContiner($courseID);
            foreach ( $course as $x){
                $courseName = $x->getCourseName();
                $courseDesc = $x->getCourseDesc();
            }
            $studentCourse_array=[]; 
            if (empty($studentInCoursesObjectsArray)){
                include_once ('../views/studentInCourse.php');

                $printStudentToClass = new StudentInClassView(); 
                $printStudentToClass->printStudntInClass($studentCourse_array , $courseID ,$courseName ,$courseName);
            }
        
            else {
               
                 

                foreach($studentInCoursesObjectsArray as $student){
                    $studentId = $student->getStudentID(); 
                    array_push($studentCourse_array, $businessLogic->getStudentViewInContiner($studentId));
                }

                include_once ('../views/studentInCourse.php');

                $printStudentToClass = new StudentInClassView(); 
                $printStudentToClass->printStudntInClass($studentCourse_array , $courseID ,$courseName ,$courseDesc);

            }
      
         
            
            
        }

      
        function insertCourse($cust) {
            $businessLogic = new BL();
            $businessLogic->insertEmployee($cust);
        }

    }

    $courseController =  new CourseController();

    
    ?>