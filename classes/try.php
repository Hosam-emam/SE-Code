<?php
    require_once 'User.php';
    require_once 'Contact.php';
    require_once 'Chat.php';
    $user = new User();
    $contact = new Contact();
    $chat = new Chat();

    $user->Login('hos','pass');

    // $data = $user->viewContact();
    // foreach($data as $dat){
    //     echo"$dat <br>";
    // }
    // $user->Register("100312","hos","pass");
    // echo $_SESSION['Name'];
    // echo$_SESSION['password'];
    // echo $_SESSION['UID'];
    // $contact->addContact('01124','yoth yoth');
    // $contact->editContact('01123','not yoth yoth');
    // $contact->deleteContact('01123');
    // $contact->Report('bad thing', '01124');
    // $contact->Block('01124');
    // $contact->Unblock('01124');
    // $total = $contact->Search('01124');
    // foreach($total as $tot){
    //     echo "$tot <br>";
    // }
    $chat->chooseChat('01123')


?>