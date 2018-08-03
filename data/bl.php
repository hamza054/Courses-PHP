<?php
     require_once '../data/data.php';
     require_once '../models/course.php';
     require_once '../models/student.php'; 
     require_once '../models/admin.php';
     require_once '../models/course_student.php';
    
    
     class BL {
  

        

        function getCourse() {
            $adapter = new Data();
            $query = "SELECT * FROM `course_table`";
            $coursetTable = $adapter->fetch($query);
            // SQL DataTable to Array of Objects
            $courseObjectsArray = array();
            foreach($coursetTable as $courseRow) {

                array_push($courseObjectsArray, new Course($courseRow));
            }
            return $courseObjectsArray;
        }

        function getStudentViewInContiner($studentID) {
            $adapter = new Data();
            // 
            $query = "SELECT * FROM `student_table` WHERE `student_id`=$studentID  ";
            
            $studentTable = $adapter->fetch($query);
            // SQL DataTable to Array of Objects
            $studentObjectsArray = array();
            foreach($studentTable as $studentRow) {
                array_push($studentObjectsArray, new Student($studentRow));
                }
            return $studentObjectsArray;
        }


        function getCourseViewInContiner($courseID) {
            $adapter = new Data();
            // 
            $query = "SELECT * FROM `course_table` WHERE `course_id`=$courseID  ";
            
            $coursetTable = $adapter->fetch($query);

            
            // SQL DataTable to Array of Objects
            $courseObjectsArray = array();
            foreach($coursetTable as $courseRow) {
                array_push($courseObjectsArray, new Course($courseRow));
                }
            return $courseObjectsArray;
        }

        function insertCouese($course_name,  $course_desc , $course_image ) {
            $adapter = new Data();
            
            $query = "INSERT INTO `course_table`( `course_name`, `course_desc`, `course_image`)
            VALUES ('$course_name', '$course_desc' , '$course_image'  )";
            $adapter->fetch($query);
            //return "data save good";
        }


        function insertStudent($student_name,  $student_email , $student_phone , $course_image ) {
            $adapter = new Data();
            
            $query = "INSERT INTO `student_table`( `student_name`, `student_phone`, `student_email`, `student_image`)
            VALUES ('$student_name', '$student_email' , '$student_phone' , '$course_image'  )";
            $adapter->fetch($query);
            //return "data save good";
        }
       
        function insertStudentCourses ( $studentCourseArray , $studentID ){
            $adapter = new Data();
            foreach($studentCourseArray as $course){
                $query = "INSERT INTO `student_in_course`(`course_id`, `student_id`)
                VALUES ('$course', '$studentID' )";
                $adapter->fetch($query); 
            }
        
        }






        //UPDATE `course_table` SET `course_id`=[value-1],`course_name`=[value-2],`course_desc`=[value-3],`course_image`=[value-4] WHERE 1
        function updateCourse($course_name,  $course_desc , $course_image , $courseID){
            $adapter = new Data();
            
            $query= "UPDATE `course_table` SET `course_name`='$course_name',`course_desc`='$course_desc',`course_image`='$course_image' WHERE `course_id`=$courseID";
            $adapter->fetch($query);

        } 

        function updateStudent($student_name,  $student_email , $student_phone , $pictureToDB , $studentID){
            $adapter = new Data();
            $query= "UPDATE `student_table` SET `student_name`='$student_name',`student_phone`='$student_phone',`student_email`='$student_email' ,`student_image`='$pictureToDB' 
            WHERE `student_id`=$studentID";
            $adapter->fetch($query);

        } 


        function updateAdmin($admin_name,  $admin_password , $admin_role , $admin_phone , $admin_email , $pictureToDB , $adminID){
            $adapter = new Data();
            $admin_passwordMD5 = md5($admin_password);
            $query= "UPDATE `administrator_table` SET `admin_name`='$admin_name',`admin_password`='$admin_passwordMD5' ,`admin_role`='$admin_role',`admin_phone`='$admin_phone',`admin_email`='$admin_email',`admin_image`='$pictureToDB'
             WHERE `admin_id`=$adminID"; 
            $adapter->fetch($query);

        } 


        function getCouresStudents($courseID){
            //return all the student in spcific course 
            $adapter = new Data();
            
            $query = "SELECT * FROM `student_in_course` WHERE `course_id`=$courseID";
            
            $studentInCourseTable = $adapter->fetch($query);

            // SQL DataTable to Array of Objects
            $studentInCourseArray = array();
            foreach($studentInCourseTable as $student_in_course_row) {
                
                array_push($studentInCourseArray, new Course_Student($student_in_course_row));
                
            }
            return $studentInCourseArray;
        }


        function getAllStudents(){
            $adapter = new Data();
            // 
            $query = "SELECT * FROM `student_table`";
            $userTable = $adapter->fetch($query);
            // SQL DataTable to Array of Objects
            $studentObjectsArray = array();
            foreach($userTable as $studentRow) {
                array_push($studentObjectsArray, new Student($studentRow));
                }
            return $studentObjectsArray;
        }


        function getStudentToViewInContiner($studentID) {
            $adapter = new Data();
            // 
            $query = "SELECT * FROM `student_table` WHERE `student_id`=$studentID  ";
            
            $userTable = $adapter->fetch($query);
            // SQL DataTable to Array of Objects
            $studentObjectsArray = array();
            foreach($userTable as $studentRow) {
                array_push($studentObjectsArray, new Student($studentRow));
                }
            return $studentObjectsArray;
        }

        function getAdministrator() {
            $adapter = new Data();
            
            $query = "SELECT * FROM `administrator_table`";
            $adminTable = $adapter->fetch($query);
            // SQL DataTable to Array of Objects
            $adminObjectsArray = array();
            foreach($adminTable as $adminRow) {
                array_push($adminObjectsArray, new Admin($adminRow));
                }
            return $adminObjectsArray;
        }



        function getAdmineToViewInContiner($adminID) {
            $adapter = new Data();
            // 
            $query = "SELECT * FROM `administrator_table` WHERE `admin_id`=$adminID ";
            
            $adminTable = $adapter->fetch($query);
            // SQL DataTable to Array of Objects
            $adminObjectsArray = array();
            
            foreach($adminTable as $adminRow) {
                array_push($adminObjectsArray, new Admin($adminRow));
                }
            return $adminObjectsArray;
        }
        function insertAdmin($admin_name, $admin_password, $admin_role,$admin_phone,$admin_email, $pictureToDB  ) {
            $adapter = new Data();
            $admin_passwordMD5 = md5($admin_password);
            $query = "INSERT INTO `administrator_table`( `admin_name`, `admin_password`, `admin_role`,`admin_phone`, `admin_email`, `admin_image`)
            VALUES ('$admin_name', '$admin_passwordMD5' , '$admin_role' , '$admin_phone' , '$admin_email',   '$pictureToDB' )";
            $adapter->fetch($query);
        }


        function getStudent_course($studentID) {
            $adapter = new Data();
            $query = "SELECT * FROM `student_in_course` WHERE `student_id`=$studentID  ";
            $student_in_course_Table = $adapter->fetch($query);
            // SQL DataTable to Array of Objects
            $student_in_course_array = array();
            foreach($student_in_course_Table as $student_in_course_row) {

                array_push($student_in_course_array, new Course_Student($student_in_course_row));
            }
            return $student_in_course_array;
        }

   
        //DELETE FROM `course_table` WHERE `course_id`= 5
                
        function delete_course($courseID) {
            $adapter = new Data();
            $query = "DELETE FROM `course_table` WHERE `course_id`=$courseID ";
            
            $adapter->fetch($query);

            $query = "DELETE FROM `student_in_course` WHERE `course_id`=$courseID ";
            
            $adapter->fetch($query);
     
        }
    
        //DELETE FROM `student_table` WHERE `student_id`

        function delete_studnet($studentID) {
            $adapter = new Data();
            $query = "DELETE FROM `student_table` WHERE `student_id`=$studentID ";
            
            $adapter->fetch($query);

            $query = "DELETE FROM `student_in_course` WHERE `student_id`=$studentID ";
            
            $adapter->fetch($query);
     
        }
      
        function delete_studnet_courses($studentID) {
            $adapter = new Data();
            $query = "DELETE FROM `student_in_course` WHERE `student_id`=$studentID ";
            $adapter->fetch($query);
     
        }
        
        function dalateAdminFromDB($adminID) {
            $adapter = new Data();
            $query = "DELETE FROM `administrator_table` WHERE `admin_id`=$adminID ";
            $adapter->fetch($query);
     
        }
        
    }

?>