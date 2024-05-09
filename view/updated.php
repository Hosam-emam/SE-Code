<?php
        require_once'../controller/DBController.php' ;
        require_once'../controller/contactController.php' ;
        require_once'../controller/settingController.php' ;


       
        
        
        $db=new DBController ;
        $con=new contact ;
        $profile= new myprofile ;



session_start();
$phone = $_SESSION['phone'];
   $firstName = $_SESSION['firstName'];
   $lastName = $_SESSION['lastName'];
   $email = $_SESSION['email'];
   $country = $_SESSION['country'];
   $gender = $_SESSION['gender'];
    
   $id=$_SESSION['user_id'] ;




   $profile->updateUser($id['id'], $firstName, $lastName, $phone, $email) ;

   




    ?>