<?php 
    include_once 'simpleView.php';
   
    
    if ( !empty($adminArray)){
        foreach ($adminArray as $admin){
            $adminName =  $admin->getAdminName();
            $adminEmail =  $admin->getUserName();
            $adminPhone =  $admin->getAdminPhone();
            $adminRole =  $admin->getUserPermissions();
            $adminPassword = $admin->getAdminPasswoed();
        }
    }
    
    else {
        $adminName=  'no admin';
        $adminEmail= 'no admin';
        $adminPhone = 'no admin';
    } 

    $name = $_GET['admin_name'];
    $role = $_GET["admin_role"];
    $image = $_GET["admin_image"];
    $admin_id = $_GET['admin_id'];


    $linkToCheck = "?admin_name=".$name .'&' .'admin_role='.$role .'&' .'admin_id='.$admin_id  .'&'
    .'admin_image='.$image ;

?>

<script type="text/javascript">
         
            function getConfirmation(){
               var retVal = confirm("Do you want to continue ?");
               if( retVal == true ){
                 return true;
               }
               else{
                  //return false;
               }
            }
         
      </script>

<div id='center'>
<div class="form-style-10">
<h1>Edit Admin<span>hamza tech</span></h1>
<form enctype="multipart/form-data" method='POST'  action='routerToDB.php<?php echo $linkToCheck; ?>' novalidate>
<div class="button-section">
<input type="submit" name="action" value='Edit Admin' <?php if ($adminRole=='owner' && ($role!='owner'  || $role!='manger' ) ) {echo 'visibility: hidden';} ?> />

<?php
    if ($role=='owner'){
        echo "<input type='submit' name='action' value='Delete Admin'  onclick='getConfirmation();'/>";
    }


?>
<input type="submit" name="action" value='Delete Admin'  style="display:none"/>

    
     <div class="section"><span>1</span>First Name &amp; Role</div>
    <div class="inner-wrap">
        <label>Your Full Name <input type="text" name="admin_name"  value="<?php echo $adminName; ?>" <?php if ($adminRole=='owner' && $role!='owner') {echo 'disabled="true"';} ?>/></label>
        
        <label>Role  
        
                <select name="admin_role"  <?php if (  $adminRole=='owner' && $role!='owner' ) {echo 'disabled="true"';} ?> /> 
                    
                    <option value="manger" <?php if($role=='manger'){echo 'selected="selected"';}   ?>  >manger</option>
                    <option value="sales"  <?php if($role=='sales'){echo 'selected="selected"';}   ?> >sales</option>
                    <?php if ( $role=='owner' ) {echo '<option value="owner" selected="selected">owner</option>';} ?>

            

                </select>
        
        </label>    
    
    </div>


   






    <div class="section"><span>2</span>Email &amp; Phone</div>
    <div class="inner-wrap">
        <label>Email Address <input type="email" name="admin_email"   value="<?php echo $adminEmail; ?>" <?php if ($adminRole=='owner' && $role!='owner') {echo 'disabled="true"';} ?>/></label>
        <label>Phone Number <input type="text" name="admin_phone"   value="<?php echo $adminPhone; ?>" <?php if ($adminRole=='owner' && $role!='owner') {echo 'disabled="true"';} ?>/></label>
    </div>

    <div class="section"><span>3</span>Passwords</div>
        <div class="inner-wrap">
        <label>Password <input type="text" name="admin_password"  <?php if ($adminRole=='owner' && $role!='owner') {echo 'disabled="true"';} ?> required /></label>
        <label>Confirm Password <input type="text" name="confirm_admin_password"  <?php if ($adminRole=='owner' && $role!='owner') {echo 'disabled="true"';} ?> required  /></label>
    </div>
    
    </div>


    
    <div class="section"><span>4</span>image</div>
        <div class="inner-wrap">
        <label for="image_uploads">Choose images to upload (PNG, JPG)</label>
        <input type="file" id="image_uploads" name="admin_image" accept=".jpg, .jpeg, .png" <?php if ($adminRole=='owner' && $role!='owner') {echo 'disabled="true"';} ?>  multiple>     
    </div>

    <div class="section"><span>4</span>Courses</div>
        <div class="inner-wrap" >
        <input type="text" name="eror" value= "
        <?php 
        if (isset($_SESSION['error'])){
                echo $_SESSION['error']; } ?>" style="background-color:Tomato;"  <?php if ($adminRole=='owner' && $role!='owner') {echo 'disabled="true"';} ?> readonly   />
         </div>
    </div>

</form>

</div>

</div>

