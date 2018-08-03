

<?php 
    include_once 'simpleView.php';
    //include_once '../controllers/adminController.php';
   

    $name = $_GET['admin_name'];
    $role = $_GET["admin_role"];
    $image = $_GET["admin_image"];

    $linkToCheck = "?admin_name=".$name .'&' .'admin_role='.$role .'&'   .'&'
    .'admin_image='.$image ;

?>
<div id='center'>
<div class="form-style-10">
<h1>Add Admin<span>hamza tech</span></h1>
<form enctype="multipart/form-data" method='POST'  action='routerToDB.php<?php echo $linkToCheck; ?>' novalidate>
<div class="button-section">
<input type="submit" name="action" value='add Admin' />
    
     <div class="section"><span>1</span>First Name &amp; Role</div>
    <div class="inner-wrap">
        <label>Your Full Name <input type="text" name="admin_name" /></label>
        <label>Role  
        
                <select name="admin_role"  <?php if (  $role!='owner' && $role!='manger' ) {echo 'disabled="true"';} ?> /> 
                    <option value="sales">sales</option>
                    <option value="manger">manger</option>
                    
                    <?php if ($role=='owner') {echo '<option value="owner">owner</option>';} ?>

            

                </select>
        
        </label>
    </div>

    <div class="section"><span>2</span>Email &amp; Phone</div>
    <div class="inner-wrap">
        <label>Email Address <input type="email" name="admin_email" /></label>
        <label>Phone Number <input type="text" name="admin_phone" /></label>
    </div>

    <div class="section"><span>3</span>Passwords</div>
        <div class="inner-wrap">
        <label>Password <input type="password" name="admin_password" /></label>
        <label>Confirm Password <input type="password" name="confirm_admin_password" /></label>
    </div>
    
    </div>


    
    <div class="section"><span>4</span>image</div>
        <div class="inner-wrap">
        <label for="image_uploads">Choose images to upload (PNG, JPG)</label>
        <input type="file" id="image_uploads" name="admin_image" accept=".jpg, .jpeg, .png" multiple>     
    </div>

    <div class="section"><span>4</span>Courses</div>
        <div class="inner-wrap" >
        <input type="text" name="eror" value= "
        <?php 
        if (isset($_SESSION['error'])){
                echo $_SESSION['error']; } ?>" readonly/>
         </div>
    </div>

</form>

</div>

</div>

