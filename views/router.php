

<?php


    class RouterForForm {

        
        public static function page_router_by_Permissions($access_permissions){
            
            switch ( $access_permissions ) {
    
                case 'user ok':
                   
                    
                    include_once('viewControl.php');
                    
                    $owner_control = new ViewControl();

                    break;
                
                                 
                case 'password not good':
                   echo "password not good";
                   include('index.php');
                    
                   break;

                case 'no user found':
                    echo "no user found";
                     break;
            }
            



        }


        public static function bring_req_page($bottun_pressed){
            
            $page = $bottun_pressed;

            switch ($page) {
                
                case 'school':
            
                   
                    include '';
                    break;
                
                case 'admin':
                    
                    include '';
                    break;
                    
                 
            }
        

        }
    }


?>