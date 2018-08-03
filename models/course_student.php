<?php




    class Course_Student {
       
        private $course_id;
        private $student_id;
           

        function __construct($student_in_course_row) {
            
            $this->course_id = $student_in_course_row['course_id'];
            $this->student_id = $student_in_course_row['student_id'];
         
         }

          

        function getCourseID() {
            return $this->course_id;        
                     
         }

         function getStudentID() {
            return $this->student_id;        
                     
         }
         
    }
?>