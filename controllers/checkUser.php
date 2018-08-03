<?php 
        
    
    require_once '../data/bl.php';
    require_once '../views/router.php';
   
    
    class checkUserInsideSystem {

        private $userNameFromView ; 
        private $userPasswordFromView ; 
        private $access_permissions;
        private $page;


        function __construct(){
            
            if (isset($_POST['user_email']) && isset($_POST['user_password']) ){

                $this->userNameFromView = $_POST['user_email'];
                $this->userPasswordFromView = $_POST['user_password'];
                
                $this->access_permissions = $this->checkIFinside( $this->userNameFromView ,  $this->userPasswordFromView); 

                $this->router_by_Permissions($this->access_permissions);  

            }
        }
        
        function checkIfInside( $userNameFromView, $userPasswordFromView ){
           
            $admin_name_from_sql = new BL();
            $adminArray=[];
            $adminTableObj = $admin_name_from_sql->getAdministrator();
            
            $check_if_user_is_in_DB = 'no user found';
            $checkUserFlag = false;

            foreach($adminTableObj as $obj => $admin)
            {
                
                $user_name_array= $admin->getUserName();  
                 
                if($user_name_array == $userNameFromView){
                    
                    $user_password= $admin->getAdminPasswoed();


                    if($user_password == (MD5($userPasswordFromView))){
                        
                        $_GET["admin_name"] = $admin->getAdminName();
                        $_GET["admin_role"] = $admin->getAdminRole();
                        $_GET["admin_image"] = $admin->getAdminImage();
                        $_GET["admin_id"] = $admin->getAdminID();
                        $checkUserFlag= 'user ok';
                        return $checkUserFlag;
                        
                    }
                    else {
                             
                        $checkUserFlag=='password not good';
                            

                        }
                
                }

                else {
                            
                    $checkUserFlag=='user not found';     
                }
                
            }
                
                if ($checkUserFlag=='password not good'){
                    echo 'password not good<br>';
                    echo "<button class='btn btn-default' type='submit'><a  href='../index.php' role='button'>Back</a> </button>";
                }
                elseif($checkUserFlag=='user not found') {
                    echo 'user not found<br>';
                            echo "<button class='btn btn-default' type='submit'><a  href='../index.php' role='button'>Back</a> </button>";
                }
                else {
                    
                    echo 'Permission denied to this site <br>';
                    echo "<button class='btn btn-default' type='submit'><a  href='../index.php' role='button'>Back</a> </button>";
                }

        }

        
            
        
        function router_by_Permissions($access_permissions){
                if($access_permissions ==='user ok'){

                    include_once "../views/simpleView.php";    
                    $view = new SimpleView();
                    

                }
                    
        }       
        
        
        
 

    }

    $check_if_iside_system = new checkUserInsideSystem();
    
?>
