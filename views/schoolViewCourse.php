<?php

require_once '../data/bl.php';

require_once 'schoolView.php';


class SchooleViewCourse extends  SimpleView {

      

    protected $admin;
    
    protected $role;

    protected $course_id;

        

    function __construct(){

            if ( isset($_GET['course_id']) && !is_null($_GET['course_id'])){
                
                $this->course_id = $_GET['course_id']; 

                $this->set_course_view($this->course_id);
            }
               
        
            else { 
                echo 'please try again';
            }
        
    }

    function set_course_view($course_id){
           
            

            $from_sql = new BL();
            $courseArray=$from_sql->getCourseViewInContiner($course_id);
                                          
                echo "<span id='center'>";
                foreach($courseArray as $courseNameArray)
                {
                    $img = "../".$courseNameArray->getCourseImage();
                    echo "<img id='image_continer' src=".$img.' />';
                          
                    echo '<div>'.$courseNameArray->getCourseToContiner() .'<br><br><br>';
                    
                     
                     
                }  

            
    }


}

$courseDit = new SchooleViewCourse();


?>