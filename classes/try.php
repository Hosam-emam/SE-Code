<?php
    require_once 'User.php';
    require_once 'Contact.php';
    $user = new User();
    $contact = new Contact();

    // $user->Register("100312","hos","pass");
    $user->Login('hos','pass');
    // echo $_SESSION['Name'];
    // echo$_SESSION['password'];
    // echo $_SESSION['UID'];
    $contact->addContact('01123','yoth yoth');
    $contact->editContact('01123','not yoth yoth');


?>