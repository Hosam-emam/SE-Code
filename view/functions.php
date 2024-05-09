<?php
        require_once'../controller/DBController.php' ;
        require_once'../controller/contactController.php' ;

       
        
        
        $db=new DBController ;
        $con=new contact ;




        
        $isfavourite=0;
        $isblock=0;
        session_start();

$id=$_SESSION['user_id'] ;
        $user_id= $id['id'];

if (isset($_POST['name']) && isset($_POST['number'])) {
    $name = $_POST['name'];
    $number = $_POST['number'];
    
    // Call your PHP function with the input values
    $con->addContact($name,$number,$isfavourite,$isblock,$user_id);
  }


 


     ?>