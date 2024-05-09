<?php
require_once '../controller/DBController.php' ;






class myprofile{
    protected $db ;


function updateUser($id, $firstName, $lastName, $phoneNumber, $email){
    $this->db=new DBController;
    if($this->db->openConnection()){
        $sql = "UPDATE user SET firstName = '$firstName', lastName = '$lastName' , phoneNumber =$phoneNumber , email ='$email'  WHERE id ='$id' ";
        echo 'updated succesfully';
       $this->db->update($sql);
        
        
    }
  
    else 
    {
        echo"error in databse connection" ;
        return false ;

    }
}


}




?>