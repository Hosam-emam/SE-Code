<?php

require_once '../controller/DBController.php' ;
require_once '../controller/settingController.php' ;
$profile= new myprofile ;



session_start();
$phone = $_SESSION['phone'];
   $firstName = $_SESSION['firstName'];
   $lastName = $_SESSION['lastName'];
   $email = $_SESSION['email'];
   $country = $_SESSION['country'];
   $gender = $_SESSION['gender'];
    
   $id=$_SESSION['user_id'] ;




   
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>MY PROFILE</title>
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <link rel="stylesheet" type="text/css"
        href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="my profile.css">
</head>

<body>



    <div class="main">
        <div class="navbar">
            <div class="icon">
                <h2 class="logo">truecaller</h2>
            </div>

            <div class="menu">
                <ul class="mm">
                    <li><a href="home.php">HOME</a></li>
                    <li><a href="my profile.php">PROFILE</a></li>
                    <li><a href="ero.html">HELP</a></li>
                    <li><a href="index.login.php">LOGOUT </a></li>

                    <li class="dropdown">
                        <button class="dropbtn"><i class="fa fa-cog"></i></button>
                        <div class="dropdown-content">
                            <a href="favourite contact.html">favourite contact</a>
                            <a href="blocked contacts.html">blocked contact</a>
                        </div>
                </ul>
            </div>
        </div>



        <section class="py-5 my-5">
            <div class="container">
                <h1 class="mb-5">MY PROFILE</h1>
                <div class="bg-white shadow rounded-lg d-block d-sm-flex">
                    <div class="profile-tab-nav border-right">
                        <div class="p-4">
                            <div class="img-circle text-center mb-3">
                                <img src="img.JPG" alt="Image" class="shadow">
                            </div>
                            <h4 class="text-center"><?php
  echo $firstName; 
 ?></h4>
                        </div>
                        <div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist"
                            aria-orientation="vertical">
                            <a class="nav-link active" id="account-tab" data-toggle="pill" href="#account" role="tab"
                                aria-controls="account" aria-selected="true">
                                <i class="fa fa-home text-center mr-1"></i>
                                Account
                            </a>

                        </div>
                    </div>
                    <div class="tab-content p-4 p-md-5" id="v-pills-tabContent">
                        <form class="p-3 mt-3" method="POST" action="<?php



                       
                
                
                        if($_SERVER["REQUEST_METHOD"] == "POST") {
                            $_SESSION['firstName'] = $_POST['firstName'];
                            $_SESSION['lastName'] = $_POST['lastName'];
                            $_SESSION['phone'] = $_POST['phone'];
                            $_SESSION['email'] = $_POST['email'];
                             require_once '../controller/DBController.php' ;
                         require_once '../controller/contactController.php' ;
                         require_once '../controller/settingController.php' ;
                        
                        
                        $db=new DBController ;
                        $con=new contact ;
                        $profile= new myprofile ;
                
                        
                        
                         $firstName = $_SESSION['firstName'];
                         $lastName = $_SESSION['lastName'];
                         $email = $_SESSION['email'];
                         $country = $_SESSION['country'];
                         $gender = $_SESSION['gender'];
                          
                         $id=$_SESSION['user_id'] ;

                         $profile->updateUser($id['id'], $firstName, $lastName, $phone, $email) ;
                            header("Location:myprofile.php");
                            
                           
                            exit;
                         }
                        
                        
                        ?> ">

                            <div class="tab-pane fade show active" id="account" role="tabpanel"
                                aria-labelledby="account-tab">
                                <h3 class="mb-4">Account Settings</h3>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>First Name</label>
                                            <input type="text" name="firstName" class="form-control"
                                                value="<?php echo $firstName; ?>">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Last Name</label>
                                            <input type="text" name="lastName" class="form-control"
                                                value="<?php echo $lastName; ?>">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Email</label>
                                            <input type="text" name="email" class="form-control"
                                                value="<?php echo $email; ?>">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Phone number</label>
                                            <input type="text" name="phone" class="form-control"
                                                value="<?php echo $phone; ?>">
                                        </div>
                                    </div>

                                </div>

                            </div>
                    </div>
                    <div>




                        <button class="btn btn-primary" type="submit" name="update">update </button>
                        <a href="home.php">
                            <button class="btn btn-light">Cancel</button>
                        </a>
                        </form>

                    </div>

                </div>



        </section>


        <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
</body>

</html>