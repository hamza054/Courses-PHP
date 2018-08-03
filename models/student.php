<?php
    class Student{
        private $student_id;
        private $student_name;
        private $student_phone;
        private $student_email;
        private $student_image;

        function __construct($userParamsArray) {
            $this->student_id = $userParamsArray['student_id'];
            $this->student_name = $userParamsArray['student_name'];
            $this->student_phone = $userParamsArray['student_phone'];
            $this->student_email = $userParamsArray['student_email'];
            $this->student_image = $userParamsArray['student_image'];
        }

        function getAsHtmlRow() {
            return 
             
            "<div class='box-set'>   
                <figure class='box'><b>$this->student_name</b>
                    <div><p>$this->student_email</p></div>
                    <div><p>$this->student_phone</p></div>
                    <div><img id='profile-img' class='profile-img-card' src='../".$this->student_image."'></div>
                </figure>
            
             </div><br>";  
        }

        function getAStudentViewContiner() {
            return 
             
            "<br><span class=''>
                
            <img id='userImg' src='../".$this->student_image."'>
            <b>$this->student_name</b>
            </span>                        
            ";  
        }


        function getStudentName(){
            return $this->student_name;
        }

        
        function getStudentID() {
            return $this->student_id;        
                     
         }
       
         function getStudentImage() {
            return $this->student_image;        
                     
         }
      
         function getStudentEmail(){
            return $this->student_email;
        }

        function getStudentPhone(){
            return $this->student_phone;
        }

    }

?>