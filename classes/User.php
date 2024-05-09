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

        public function Login($name, $password){//done

            $db = new Database();
            if($db->dbVerify($name,$password)){
                echo 'yaaaaaaaay';
            }else{
                echo 'mafesh ta\'deer';
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

        public function veiwContact($Contact){

        }

        public function viewProfile(){
            
        }
    }

?>