 <?php
  
require_once '../controller/DBController.php' ;
require_once '../controller/contactController.php' ;
require_once '../controller/authController.php' ;
require_once '../controller/settingController.php' ;


session_start() ;
$db=new DBController ;
$con=new contact ;
$us=new register ;
$profile=new myprofile ;


$id=$_SESSION['user_id'] ;


   $phone = $_SESSION['phone'];
   $firstName = $_SESSION['firstName'];
   $lastName = $_SESSION['lastName'];
   $email = $_SESSION['email'];
   $country = $_SESSION['country'];
   $gender = $_SESSION['gender'];


$profile->updateUser($id['id'],'thomas',$lastName,$phone,$email);




echo $firstName ;



?>  