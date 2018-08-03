<?php 

 if (isset($_GET['schoolView']) ){
    include_once ("../views/schoolView.php");

 }
elseif (isset($_GET['action']) && $_GET['action']='adminView' ){
    include_once ("adminController.php");
    

 }

?>