<?php
    class Course {
        private $course_id;
        private $course_name;
        private $course_desc;
        private $course_image;
        private $going;
        
        
        //`id`, `event_name`, `event_desc`, `event_date`

        function __construct($eventParamsArray) {
            $this->course_id = $eventParamsArray['course_id'];
            $this->course_name = $eventParamsArray['course_name'];
            $this->course_desc = $eventParamsArray['course_desc'];
            $this->course_image = $eventParamsArray['course_image'];
            
         
        }

        function getAsHtmlRow() {
           return 
            
           "<div class='box-set'>
                
                    <figure class='box'><b>$this->course_name</b><div>
                    <div><img id='profile-img' class='profile-img-card' src='../".$this->course_image."'></div><div>
                    </figure>
                    
            </div><br>";  
                     
                    
        }
        function getCourseName() {
            return $this->course_name;        
                     
         }
         function getCourseDesc() {
            return $this->course_desc;        
                     
         }

        function getCourseID() {
            return $this->course_id;        
                     
         }
         function getCourseImage() {
            return $this->course_image;        
                     
         }

    

    }

?>