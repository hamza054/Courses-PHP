<?php 
    
    include_once 'schoolView.php';
   
    

    if ( !empty($courseArray)){
        foreach ($courseArray as $course){
            $courseName =  $course->getCourseName();
            $courseDesc =  $course->getCourseDesc();
            
        }
    }
    else {

        $courseName= 'no course';
        $courseDesc = 'no course';
    } 
    
    $name = $_GET['admin_name'];
    $role = $_GET["admin_role"];
    $image = $_GET["admin_image"];
    $cours_id= $_GET['course_id'];

    
    $linkToCheck = "?admin_name=".$name .'&' .'admin_role='.$role .'&' .'course_id='.$cours_id  .'&'
    .'admin_image='.$image ;
    
    

?>



<div id='center'>
<div class="form-style-10">
<h1>Edit Course <span>hamza tech</span></h1>
<form enctype="multipart/form-data" method='POST'  action='routerToDB.php<?php echo $linkToCheck; ?>' novalidate>
<div class="button-section"  >
     <input type="submit" name="action" value='edit Course' <?php if ($role=='sales') {echo 'visibility: hidden';} ?>/>
     <input type="submit" name="action" value='Delete Course' <?php if ($role=='sales') {echo 'visibility: hidden';} ?>/>

   
     <div class="section"><span>1</span>  Name </div>
    <div class="inner-wrap" >
        <label>Course Name <input type="text" name="course_name" value="<?php echo $courseName; ?>" <?php if ($role=='sales') {echo 'disabled="true"';} ?> autofocus/></label>
        
    </div>

    <div class="section"><span>2</span>Discription</div>
    <div class="inner-wrap">
        <label>Discription <input type="text" name="course_desc" value= "<?php echo $courseDesc; ?>" <?php if ($role=='sales') {echo 'disabled="true"';} ?>/></label>
    </div>

    <div class="section"><span>3</span>image</div>
        <div class="inner-wrap">
        <label for="image_uploads">Choose images to upload (PNG, JPG)</label>
        <input type="file" id="image_uploads" name="course_image" accept=".jpg, .jpeg, .png"  <?php if ($role=='sales') {echo 'disabled="true"';} ?> multiple>     
    </div>
     
 
    <div class="section"><span>4</span>Courses</div>
        <div class="inner-wrap" >
        <input type="text" name="eror" value= "
        <?php 
        if (isset($_SESSION['error'])){
                echo $_SESSION['error']; } ?>" readonly/>
         </div>
    </div>
    
    </div>

</form>
</div>
</div>



