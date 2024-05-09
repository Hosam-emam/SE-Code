       <?php        
require_once '../controller/DBController.php' ;
require_once '../controller/chatController.php' ;

     
     $db=new DBController ;

     $mess =new message ;
        
        $mess->getLastestMessage();
        ?>