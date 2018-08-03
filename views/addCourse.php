

<?php 
    
    include_once 'schoolView.php';
    
    $name = $_GET['admin_name'];
    $role = $_GET["admin_role"];
    $image = $_GET["admin_image"];
   
    $linkToCheck = "?admin_name=".$name .'&' .'admin_role='.$role .'&'. 'admin_image='.$image ;
?>


<div id='center'>
<div class="form-style-10">
<h1>Add Course  <span>hamza tech</span></h1>
<form enctype="multipart/form-data" method='POST'  action='routerToDB.php<?php echo $linkToCheck; ?>' novalidate>
<div class="button-section"  >
     <input type="submit" name="action" value='Add Course' <?php if ($role=='sales') {echo 'visibility: hidden';} ?>/>

   
     <div class="section"><span>1</span>  Name </div>
    <div class="inner-wrap" >
        <label>Course Name <input type="text" name="course_name"  autofocus/></label>
        
    </div>

    <div class="section"><span>2</span>Discription</div>
    <div class="inner-wrap">
        <label>Discription<input type="text" name="course_desc" /></label>
    </div>

    <div class="section"><span>3</span>image</div>
        <div class="inner-wrap">
        <label for="image_uploads">Choose images to upload (PNG, JPG)</label>
        <input type="file" id="image_uploads" name="course_image" accept=".jpg, .jpeg, .png"  multiple>     
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

</form>
</div>
</div>



