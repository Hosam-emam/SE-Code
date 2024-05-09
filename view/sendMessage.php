  <?php   

require_once '../controller/DBController.php' ;
require_once '../controller/chatController.php' ;

     
     $db=new DBController ;
     $mess =new message ;

     $chat_id=1 ;
     $voice="ttt";
     $isVoice=0;



     if (isset($_POST['sendBtn'])) 
        $text = $_POST['txt'];
        
        $mess->sendMessage($text,$chat_id,$voice,$isVoice);

    ?>