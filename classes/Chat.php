<?php
    require_once 'Database.php';
    class Chat{
        private $chat_ID;
        private $db;
        public function __construct(){

        }
        public function chooseChat($phoneNumber){
            $db = new Database();
            $db->openChat($phoneNumber);
        }
    }
?>