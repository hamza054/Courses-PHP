

<?php

    class SimpleView{

        function __construct(){

            $this->upNavigation(); 
            $this->bottemNavigiation();
    
    }

       
  
       function upNavigation(){

       
        $name = $_GET['admin_name'];
        $role = $_GET["admin_role"];
        $admin_image = $_GET["admin_image"];
        
        
        $link_to_school = "viewsControlloer.php?schoolView=schoolView&admin_name=".$name.'&'.'admin_role='.$role.'&'.'admin_image='.$admin_image  ;

        $link_to_admin = "viewsControlloer.php?action=adminView&admin_name=".$name.'&'.'admin_role='.$role.'&'.'admin_image='.$admin_image ;
          
        echo "

        <!doctype html>
            <html lang=''>
            <meta charset='utf-8'>
            <meta http-equiv='X-UA-Compatible' content='IE=edge'>
            <meta name='viewport' content='width=device-width, initial-scale=1'>
            <link rel='stylesheet' href='..\style\style.css'>
            <link href='https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css' rel='stylesheet' type='text/css' />
            <link rel='stylesheet' href='..\style\style_add.css'>

            <script src='http://code.jquery.com/jquery-latest.min.js' type='text/javascript'></script>
            <script src='script.js'></script>
            <title>School site</title>
            </head>
            
            <body>

            <div id='cssmenu'>
                <ul>
                
                    <li class='active'></li>
                    <li><img id='schooleImage' src='../style/image/harvard-logo-1500x500ff.jpg'></li>
                    <li><a href=".$link_to_school."><span>School</span></a></li>
        ";
        if ( $role === 'sales')
        {

        }
        else {
            
            echo "
                    
                <li><a href=".$link_to_admin."><span>Administration</span></a></li>
                    
            ";   
        }

                 
                        
                        
       }

       function bottemNavigiation(){
        
        $admin_image = $_GET["admin_image"];
        $admin_name = $_GET["admin_name"];
        $admin_role = $_GET["admin_role"];
        
        echo "
                    <li class='last'><img id='profile-img' class='profile-img-card' src='../".$admin_image."'></li>
                    
                    <li class='last '>$admin_name $admin_role  <br> <a href='../index.php'>logout</a></li>
                    <li class='last '></li>
                </ul>
                </div>

            </body>

        </html>";
        
       

       }

    }
    
   

?>