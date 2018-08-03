<?php
    
    class Admin {
        private $admin_id;
        private $admin_name;
        private $admin_role;
        private $admin_phone;
        private $admin_email;
        private $admin_password;
        private $admin_image;
        
        // `admin_id`, `admin_name`, `admin_password`, `admin_role`, `admin_phone`, `admin_email` 

        function __construct($adminArray) {
            $this->admin_id = $adminArray['admin_id'];
            $this->admin_name = $adminArray['admin_name'];
            $this->admin_password = $adminArray['admin_password']; 
            $this->admin_role = $adminArray['admin_role'];
            $this->admin_phone =  $adminArray['admin_phone'];
            $this->admin_email = $adminArray['admin_email'];
            $this->admin_image = $adminArray['admin_image'];
         
            
        }

        function getUserName(){
            return $this->admin_email;
        }

        function getAdminID(){
            return $this->admin_id;
        }
        function getAdminPasswoed(){
            return $this->admin_password;
        }
        function getUserPermissions(){
            return $this->admin_role;
        }
        
        function getAdminName(){
            return $this->admin_name;
        }
        
        function getAdminRole(){
            return $this->admin_role;
        }
        function getAdminImage(){
            return $this->admin_image;
        }

        function getAdminPhone(){
            return $this->admin_phone;
        }
        
        
        function getAsHtmlRow() {
            return 
             
            "<div class='box-set'>
                 
                     <figure class='box'><b>$this->admin_name</b>
                     <div><p>$this->admin_role</p></div>

                     </figure>
                     
             </div><br>";  
                      
                     
         }
    }


?>