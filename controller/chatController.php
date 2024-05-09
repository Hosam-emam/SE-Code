<?php

require_once '../controller/DBController.php' ;


class message
{
   //  private $userid;
     protected $db ;



public function sendMessage($text,$chat_id,$voice,$isVoice)
    {
             
         $this->db=new DBController;
         if($this->db->openConnection())
         
         {
            $query="insert into message(chat_id,text,voice,isVoice)
             values ($chat_id,'$text','$voice',$isVoice)";
            
              $this->db->insert($query);
         }
    
         else
         {
            echo "Error in Database Connection";
            return false; 
}
}



public function getLastestMessage()
    {
             
         $this->db=new DBController;
         if($this->db->openConnection())
         
         {
            $query="SELECT text FROM message ORDER BY id DESC LIMIT 1";
              $this->db->displayOne($query);

         }

         else
         {
            echo "Error in Database Connection";
            return false; 
}
}










function startRecording() {
   // Create a new MediaRecorder instance
   $recorder = new MediaRecorder($_POST['stream'], array('mimeType' => 'audio/webm'));
 
   // Start recording
   $recorder->start();
 
   // Save the recorder instance in the session
   $_SESSION['recorder'] = $recorder;
 }







}



?>