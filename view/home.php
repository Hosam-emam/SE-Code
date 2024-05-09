<?php
require_once '../controller/contactController.php' ;
require_once '../controller/DBController.php' ;
require_once '../controller/authController.php' ;



session_start();

$id=$_SESSION['user_id'] ;
echo $id['id'] ;




$con=new contact ;
session_start();
$id=$_SESSION['user_id'] ;
$contacts=$con->retrieveContacts($id['id']);

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title>truecaller</title>
    <link rel="stylesheet" href="home.css">
    <link rel="stylesheet" href="https://cdn.tutorialjinni.com/intl-tel-input/17.0.8/css/intlTelInput.css" />
    <script src="https://cdn.tutorialjinni.com/intl-tel-input/17.0.8/js/intlTelInput.min.js"></script>


    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Inter&display=swap" rel="stylesheet">

    <script src="https://kit.fontawesome.com/6b20b1c14d.js" crossorigin="anonymous"></script>

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
                    <li><a href="myprofile.php">PROFILE</a></li>
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


        <div class="container">
            <!--  SEARCH FORM -->
            <header class="header">

                <form class="search-bar">
                    <input type="search-name" class="contact-search" name="search-area" placeholder="Search">
                </form>

                <!--  ADD-CONTACT BUTTON/ICON -->
                <a href="edit.html"><i class="fas fa-plus-circle add"></i></a>
            </header>

            <!--  CONTACT LIST -->
            <!--  -->

            <section class="contacts-library">
                <?php foreach($contacts as $row): ?>

                <ul class="contacts-list">

                    <a href="profile.html">
                        <div class="contact-section">
                            <li class="list__item">
                                <p class="contact-name"><?php echo $row['contactName']; ?></p>
                            </li>

                            <li class="list__item">
                                <a href="edit.html"><i class="fas fa-minus-circle add"></i></a>
                            </li>
                        </div>
                    </a>
                    <hr>
                </ul>
                <?php endforeach; ?>
            </section>
        </div>






        <div class="icons">
            <a href="#">
                <ion-icon name="logo-facebook"></ion-icon>
            </a>
            <a href="#">
                <ion-icon name="logo-instagram"></ion-icon>
            </a>
            <a href="#">
                <ion-icon name="logo-twitter"></ion-icon>
            </a>
            <a href="#">
                <ion-icon name="logo-google"></ion-icon>
            </a>
            <a href="#">
                <ion-icon name="logo-skype"></ion-icon>
            </a>
        </div>
        <script src="https://unpkg.com/ionicons@5.4.0/dist/ionicons.js"></script>
        <div class="wrapper">
            <div class="logo">
                <img src="truecaller.png" alt="">
                <b> Identification
                </b>
            </div>
            <form class="p-3 mt-3" method="POST" action="verificationcard.php" id="search-form">
                <div class="form-field d-flex align-items-center">
                    <input name="phone" type="text" id="phone" placeholder="write the phone" required>
                </div>
                <button class="btn mt-3" type="submit" name="submit">search number</button>
            </form>
        </div>

        <!-- <script>
            var input = document.querySelector("#phone");
            window.intlTelInput(input, {
                separateDialCode: true,
            });

            document.getElementById("search-form").addEventListener("submit", function (event) {
                event.preventDefault();
                var phone = document.getElementById("phone").value;
                window.location.href = "verificationcard.php";
            });
        </script> -->


</body>

</html>