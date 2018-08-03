<?php


include_once 'schoolView.php';



class SchooleViewStudent   {


    function student_to_view($student_id){
        
        $name = $_GET['admin_name'];
        $role = $_GET["admin_role"];
        $image = $_GET["admin_image"];  
        
        $linkToEditCourse =  "studentController.php?action=editCourse&student_id=$student_id&admin_name=$name&admin_role=$role&admin_image=$image";


        if ($role == 'owner' || $role=='manger' || $role=='sales' ){
            echo "<span id='center'>";
            echo "<button type='button' > <a href='$linkToEditCourse'> Edit</a></button>";
            echo "<hr>";
        }


            $from_sql = new BL();
            $studentArray=$from_sql->getStudentToViewInContiner($student_id);
            $studentCourseArray=$from_sql->getStudent_course($student_id);                                
                
                echo "<span id='center'>";
                foreach($studentArray as $studentNameArray)
                {
                                       
                    
                    echo  "<br><span class=''>";                
                    echo "<img id='userImg' src='../".$studentNameArray->getStudentImage()."'>"
                    .'<b>'.$studentNameArray->getStudentName().'</b>.'
                    ."</span>";
                    
                    
                }  
            }

    function student_course_to_view( $value ){
      
            foreach ($value as $key){
                $img = "../".$key->getCourseImage();
                echo "<div>";
                echo "<br><span><img id='userImg' src=".$img.' />'."<b>".$key->getCourseName()."</b></span><br>";
                echo "</div>";
                
                

                 }
            }
            
                

                              
            
    
   




}

$SchooleViewCoursePage =new SchooleViewStudent();





?>