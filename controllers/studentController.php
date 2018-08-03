<?php

   
include_once '../data/bl.php';


    class StudentController  {

        protected $student_id;

        function __construct(){



            if ( isset($_GET['student_id']) && !is_null($_GET['student_id'])  && ( !isset($_GET['action']) && !isset($_POST['action']) )       ){

                $this->student_id = $_GET['student_id']; 
    
                $this->student_view($this->student_id);
            }
               
        
            elseif(   ( (isset($_GET['action'])) && $_GET['action']=='editCourse' ) || ( (isset($_POST['action']))  &&  ($_POST['action']=='edit Student' ||  $_POST['action']=='Delete Student' ) )  ) { 
               
                $from_sql = new BL();
                $studentArray = $from_sql->getStudentViewInContiner($_GET['student_id']) ;
               
               
                include_once ("../views/editStudent.php");
            }
                   
            
            elseif ( ( (isset($_GET['action']) && $_GET['action']=='newStudent') || ( isset($_POST['action']) && ($_POST['action'])=='Add Student' ) )  ){
                
                include_once ("../views/addStudent.php");

           }
            
            
        }





      static function getAllStudents() {
            $businessLogic = new BL();
            $StudentsObjectsArray = $businessLogic->getAllStudents();
            return $StudentsObjectsArray;
        }


        function student_view($student_id){
           
            $from_sql = new BL();
            $studentArray=$from_sql->getStudentToViewInContiner($student_id);
            $studentCourseArray=$from_sql->getStudent_course($student_id);                                
            
            include_once '../views/schoolViewStudent.php';

            $print_view_student = new SchooleViewStudent();

            $print_view_student->student_to_view($student_id);

            
            $course_array = [];
            
            foreach($studentCourseArray as $array)
                {
                    
                    
                   array_push($course_array , ( $from_sql->getCourseViewInContiner($array->getCourseID())));
                   
                }                      

                
                foreach($course_array as $value) {
                    
                    $print_view_student->student_course_to_view( $value );
                   
                }
               
            
    }

    



    }


    $SchooleViewCoursePage =new StudentController();


?>



 