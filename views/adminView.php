<?php

   

include_once 'simpleView.php';
      
            
class adminView{


function printToPage($adminArray){
    
    $name = $_GET['admin_name'];
    $role = $_GET["admin_role"];
    $image = $_GET["admin_image"];
    
    $linkToEditCourse =  "adminController.php?action=editAdmin&admin_name=$name&admin_role=$role&admin_image=$image";

    echo "<div id='content' class='table'>";

        
        echo "<div id='course_left'><span id='inMidaleOfPosiotion'><u><b>Administrators <a href='adminController.php?action=newAdmin&admin_name=$name&admin_role=$role&admin_image=$image'> &#10010;</a></span></b></u>";

        foreach($adminArray as $adminName)
        {


            $admin_role = $adminName->getAdminRole();
            $admin_id_to_show = $adminName->getAdminID();


            
            if( $admin_role == 'manger' || $admin_role == 'owner'  ){
                $link_to_admin_continer_view = "adminController.php?action=editAdmin".'&'."admin_name=".$name .'&' .'admin_role='.$role.'&'.'admin_image='.$image
                .'&'.'admin_id='.$admin_id_to_show  ;
                echo '<div><a href='.$link_to_admin_continer_view.'>'.  $adminName->getAsHtmlRow() .'</a></div>'; 
            }                                    
            
             
        }
        echo '</div>';

        echo "<div id='student_right'><span id='inMidaleOfPosiotion'><u><b>Sales <a href='adminController.php?action=newAdmin&admin_name=$name&admin_role=$role&admin_image=$image'> &#10010;</a></span></b></u>";

        foreach($adminArray as $adminName)
        {


            $admin_role = $adminName->getAdminRole();
            $admin_id_to_show = $adminName->getAdminID();

            
            
            if( $admin_role == 'sales' ){
                $link_to_admin_continer_view = "adminController.php?action=editAdmin".'&'."admin_name=".$name .'&' .'admin_role='.$role.'&'.'admin_image='.$image
                .'&'.'admin_id='.$admin_id_to_show  ;
                echo '<div><a href='.$link_to_admin_continer_view.'>'.  $adminName->getAsHtmlRow() .'</a></div>'; 
            }                                    
            
             
        }
        echo '</div>';





    
        echo '</div>';
        
        

    echo '</div>';
    }

}
$simpleView = new SimpleView();  




         

            
  








?>