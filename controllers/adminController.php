<?php

//session_start();  

include_once '../data/bl.php';


class AdminController  {

    

    function __construct(){
            


            
            $this->viewAllAdmin();
            
            
            if ( (isset($_GET['action']) && $_GET['action']=='newAdmin') || (isset($_POST['action']) && $_POST['action']=='add Admin')  ){
                include_once '../views/addAdmin.php';
                
            }
            elseif ( (isset($_GET['action']) && $_GET['action']=='editAdmin') || (isset($_POST['action']) && $_POST['action']=='Edit Admin')  ){
                
                $from_sql = new BL();
                $adminArray = $from_sql->getAdmineToViewInContiner($_GET['admin_id']) ;
                include_once '../views/editAdmin.php';
            }
            
            
            
    }

    static function viewAllAdmin(){
            $from_sql = new BL();
            $adminArray=$from_sql->getAdministrator();


            include_once '../views/adminView.php';
            $adminView = new adminView();
            $adminView->printToPage($adminArray);
            
    }

}

$adminViewPage = new AdminController();






?>