<?php
require_once '../controller/DBController.php' ;
require_once '../controller/authController.php' ;




session_start();

if($_SERVER["REQUEST_METHOD"] == "POST") {

   $_SESSION['firstName'] = $_POST['firstName'];
   $_SESSION['lastName'] = $_POST['lastName'];
   $_SESSION['email'] = $_POST['email'];
   $_SESSION['country'] = $_POST['country'];
   $_SESSION['gender'] = $_POST['gender'];
   $_SESSION['gender'] = $_POST['gender'];
  
   


   





   $phone = $_SESSION['phone'];
   $firstName = $_SESSION['firstName'];
   $lastName = $_SESSION['lastName'];
   $email = $_SESSION['email'];
   $country = $_SESSION['country'];
   $gender = $_SESSION['gender'];

   $us= new register ;
   $us->makeProfile($phone,$firstName,$lastName,$email,$country,$gender) ;
   $us= new register ;
   $id = $us->getUser_id($firstName,$lastName,$phone) ;
   
   $_SESSION['user_id'] = $id ;
   



   




   // $firstName = $_POST['firstName'] ?? '';
// $lastName = $_POST['lastName'] ?? '';
// $email = $_POST['email'] ?? '';
// $country = $_POST['country'] ?? '';
// $gender = $_POST['gender'] ?? '';
   

   // Redirect to a new page
   header("Location: home.php") ;
   
   exit;
}
?>
<!DOCTYPE html>
<html>

<head>
    <link rel="stylesheet" href="style.user.css">
    <title>USER PROFILE</title>
</head>


<div class="wrapper">
    <div class="logo">
        <img src="truecaller.png" alt="">
    </div>
    <div class="text-center mt-4 name">
        CREATE A PROFILE
    </div>
    <form id="userForm" class="p-3 mt-3" method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
        <div class="form-field d-flex align-items-center">
            <span class="fas fa-key"></span>
            <input name="firstName" type="text" id="firstName" placeholder="first name" value="">
        </div>
        <div class=" form-field d-flex align-items-center">
            <span class="fas fa-key"></span>
            <input name="lastName" type="text" id="lastName" placeholder="last name" value="">
        </div>
        <div class=" form-field d-flex align-items-center">
            <span class="fas fa-key"></span>
            <input name="email" type="text" id="email" placeholder="EMAIL" value="">
        </div>
        <div class="form-field d-flex align-items-center">
            <span class="fas fa-key"></span>
            <input name="country" type="text" id="country" placeholder="COUNTRY" value="">
        </div>
        <div class="form-field d-flex align-items-center">
            <span class="fas fa-key"></span>
            <input name="gender" type="text" id="gender" placeholder="GENDER" value="">
        </div>
        <button class="btn mt-3" type="submit" name="submit"> Make Profile</button>
    </form>

</div>
<!-- // 
// $firstName = $_POST['firstName'] ?? '';
// $lastName = $_POST['lastName'] ?? '';
// $email = $_POST['email'] ?? '';
// $country = $_POST['country'] ?? '';
// $gender = $_POST['gender'] ?? '';

// if (!empty($firstName) && !empty($lastName) && !empty($email) && !empty($country) && !empty($gender)) {
//     header("Location: home.html");
//     exit;
// }
//  -->


</html>