<?php



include_once 'schoolView.php';

       
class StudentInClassView{


    
    function printStudntInClass($studentInCoursesObjectsArray , $courseID , $courseName , $courseDesc){
       
        $name = $_GET['admin_name'];
        $role = $_GET["admin_role"];
        $image = $_GET["admin_image"];

        
        $linkToEditCourse =  "courseControlloer.php?addCourse=editCourse&course_id=$courseID&admin_name=$name&admin_role=$role&admin_image=$image";
        echo "<span id='center'>";
        
        if ($role == 'owner' || $role=='manger' ){
            
            echo "<button type='button' > <a href='$linkToEditCourse'> Edit</a></button>";
            echo "<hr>";
        }
        
        
        
        echo "<b><h2>$courseName"." ,".sizeof($studentInCoursesObjectsArray)." Student in Class:</b></h2>";
        echo "<div><pre>$courseDesc</pre></div>";
        
        if ( empty($studentInCoursesObjectsArray) ){
            echo "no student in class...";
        }
        else {


            foreach ($studentInCoursesObjectsArray as $studentObj){
                foreach($studentObj as $stu){
                    echo $stu->getAStudentViewContiner();
                }
              
            }

        }



    }
    



}



?>