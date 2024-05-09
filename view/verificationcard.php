<?php
  
 require_once '../controller/DBController.php' ;
 
 require_once '../controller/contactController.php' ;
 $db=new DBController ;
  $con=new contact ;

 if (isset($_POST['phone'])) {
  $phone = $_POST['phone'];
  
  
  // Call your PHP function with the input values
  
  // $searchByNumberResult= 
  $results=$con->searchByNumber($phone);
  
}
 

  
?>

<!DOCTYPE html>
<html>

<head>
    <link rel="stylesheet" href="verificationcard.css">
    <title>phone number identification</title>

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
                    <li><a href="my profile.html">PROFILE</a></li>
                    <li><a href="ero.html">HELP</a></li>
                    <li><a href="index.login.php">logout </a></li>
                </ul>
            </div>
        </div>


        <div class="wrapper">
            <div class="logo">
                <img src="truecaller.png" alt="">
            </div>
            <div class="text-center mt-4 name">
                Verification card
            </div>


            <div class="details">
                <h2>Name</h2>
                <p><?php  if ($results) {
  echo $results['name']; // Output the value of the 'username' column for the first row
} else {
  echo "Query failed"; // Output an error message if the query failed
} ?></p>
                <h2>Phone Number</h2>
                <p><?php  echo $phone; ?></p>
            </div>
        </div>
        </form>
    </div>
</body>

</html>;