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
        
        public function Report($Report,$contact){
            $db = new Database();
            if($db->makeReport($Report,$contact)){
                return true;
            }
            return false;
        }
        
        public function deleteContact($phoneNumber){
            $db = new Database();
            if($db->delCont($phoneNumber)){
                echo"Deleted";
            }
            else{
                echo"couldn't delete";
            }
        }
        
        public function Block($phoneNumber){
            $db = new Database();
            $db->blockDB($phoneNumber);

        }
        
        public function Unblock($phoneNumber){
            $db = new Database();
            $db->UnblockDB($phoneNumber);
        }
        
        public function Search($phoneNumber){
            $db = new Database();
            return $db->search('*','contacts','c_num',"$phoneNumber");
        }
        
        public function favoriteContact($phoneNumber){
            $db = new Database();
            $db->fav($phoneNumber);
        }

        public function Viewblockedcontact()//done
        {
            session_start();
            require_once 'Database.php';
            $db = new Database();
            $p_id = intval($_SESSION["p_id"]);
            $sql = "SELECT f_name,c_num FROM contacts WHERE p_id ='$p_id' and block='1'";
            $contacts = $db->select($sql);
    
            $sql = "SELECT count(*) as total FROM contacts WHERE p_id ='$p_id'and block='1' ";
            $repeatTimes = $db->count($sql);
            $data = array($contacts, $repeatTimes);
            return $data;
    
        }
        // public function shareContact(){
            
        // }
    }
?>