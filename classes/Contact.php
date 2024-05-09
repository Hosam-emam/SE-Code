<?php
    class Contact extends Person{

        private $contactName;
        private $isBlocked;
        private $isFav;
        private $db;
        
        public function __construct(){
            $db = new Database();
            
        }
        
        public function addContact($phoneNumber,$contactName){
            $db = new Database();
            if($db->dbContact($phoneNumber,$contactName)){
                echo"done";
            }else{
                echo"fail";
            }
        }
        
        public function editContact($phoneNumber,$name){
            $db = new Database();
            if($db->dbEdit($phoneNumber,$name)){
                echo "done";
            }
            else{
                echo "not done";
            }

        }
        
        public function Report(){
            
        }
        
        public function deleteContact(){
            
        }
        
        public function Block(){
            
        }
        
        public function Unblock(){
            
        }
        
        public function Search(){
            
        }
        
        public function favoriteContact(){
            
        }
        
        public function shareContact(){
            
        }
    }
?>