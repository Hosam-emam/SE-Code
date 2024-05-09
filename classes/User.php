<?php
    require_once "Person.php";
    require_once "Database.php";

    
    class User extends Person{

        private $Contacts;
        private $Chats;
        private $Profile;
        private $TrueCaller;
        private $db;

        public function __construct(){
           
        }

        public function Register($phoneNumber,$name, $password){//done
            $db = new Database();
            $db->dbInsert($phoneNumber, $name, $password);
        }

        public function Login($name,$password){//done

            $db = new Database();
            if($db->dbVerify($name,$password)){
                return true;
            }else{
                return false;
            }
        } 

        public function Logout(){
            session_unset();
            session_destroy();

        }
        public function rateApp($rating){ //done
            $db = new Database();
            if($db->dbRate($rating)){
                return true;
            }
            else{
                return false;
            }
        }

        public function initiateCall($Contact){
            
        }

        public function viewContact(){
            require_once 'Database.php';
            $db = new Database();
            $p_id = intval($_SESSION["UID"]);
            $sql = "SELECT * FROM contacts WHERE p_id ='$p_id'";
            $contacts = $db->query($sql);
    
            $sql = "SELECT count(*) as total FROM contacts WHERE p_id ='$p_id' ";
            $repeatTimes = $db->count($sql);
            $data = array($contacts, $repeatTimes);
            return $data;

        }
        public function Viewfavouritecontact()//done
        {
            session_start();
            require_once 'Database.php';
            $db = new Database();
            $p_id = intval($_SESSION["UID"]);
            $sql = "SELECT f_name,c_num FROM contacts WHERE p_id ='$p_id' and favorite='1'";
            $contacts = $db->query($sql);
    
            $sql = "SELECT count(*) as total FROM contacts WHERE p_id ='$p_id' and favorite='1'";
            $repeatTimes = $db->count($sql);
            $data = array($contacts, $repeatTimes);
            return $data;
        }

        public function viewProfile(){
            
        }
    }

?>