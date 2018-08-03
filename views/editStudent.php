

<?php 
    
    include 'schoolView.php';
   
    if ( !empty($studentArray)){
        foreach ($studentArray as $student){
            $studentName =  $student->getStudentName();
            $studentEmail =  $student->getStudentEmail();
            $studentPhone =  $student->getStudentPhone();
        }
    }
    
    else {
        $studentName=  'no student';
        $studentEmail= 'no student';
        $studentPhone = 'no student';
    } 



    $name = $_GET['admin_name'];
    $role = $_GET["admin_role"];
    $image = $_GET["admin_image"];
    $student_id= $_GET['student_id'];

    
    $linkToCheck = "?admin_name=".$name .'&' .'admin_role='.$role .'&' .'student_id='.$student_id  .'&'
    .'admin_image='.$image ;

    

?>


<div id='center'>
<div class="form-style-10">
<h1>Edit Student<span>hamza tech</span></h1>
<form enctype="multipart/form-data" method='POST'  action='routerToDB.php<?php echo $linkToCheck; ?>' novalidate>

<div class="button-section">
     <input type="submit" name="action" value='edit Student' />
     <span class="right"><input type="submit" role="button" name="action" value='Delete Student'/></span>

   
     <div class="section"><span>1</span>  Name </div>
    <div class="inner-wrap">
        <label> Full Name <input type="text" name="student_name" value="<?php echo $studentName; ?>" /></label>
        
    </div>

    <div class="section"><span>2</span>Email &amp; Phone</div>
    <div class="inner-wrap">
        <label>Email Address <input type="email" name="student_email" value="<?php echo $studentEmail; ?>" /></label>
        <label>Phone Number <input type="text" name="student_phone" value="<?php echo $studentPhone; ?>" /></label>
    </div>

    <div class="section"><span>3</span>image</div>
        <div class="inner-wrap">
        <label for="image_uploads">Choose images to upload (PNG, JPG)</label>
        <input type="file" id="image_uploads" name="student_image" accept=".jpg, .jpeg, .png" multiple>     
    </div>

    <div class="section"><span>4</span>Courses</div>
        <div class="inner-wrap custom-control custom-checkbox" >
        <label for="image_uploads">Choose Courses :</label>
        
    
    <?php 
        
        $course = new CourseController(); 
        $coursesArray = $course->getAllCourses();
        foreach ( $coursesArray  as $course ){
            $courseName = $course->getCourseName();
            $courseID = $course->getCourseID();
            echo "<input type='checkbox' class='custom-control-input' id='customCheck' name='courses[]' value=$courseID>
            <label class='custom-control-label' for='customCheck'> $courseName </label>";
        }
        
    ?>
      
    </div>
    
    <div class="section"><span>4</span>Courses</div>
        <div class="inner-wrap" >
        <input type="text" name="eror" value= "
        <?php 
        if (isset($_SESSION['error'])){
                echo $_SESSION['error']; } ?>" readonly />
         </div>
    </div>



    
    
    </div>
    
    </div>

</form>
</div>
</div>



