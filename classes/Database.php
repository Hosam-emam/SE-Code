<?php
    session_start();

class Database {
    private $servername = "localhost";
    private $username = "root";
    private $password = "";
    private $dbname = "truecaller";
    private $conn;

    public function __construct() {
        // Create connection
        $this->conn = new mysqli($this->servername, $this->username, $this->password, $this->dbname);
        
        // Check connection
        if ($this->conn->connect_error != "") {
            die("Connection failed: " . $this->conn->connect_error);
        }
    }
    
    // Get data from database
    public function getData($query) {
        $result = $this->conn->query($query);
        return $result;
    }

    // Insert data into the database
    public function dbInsert($phoneNumber, $name, $password) {
        $sql = "INSERT INTO user (`p_num`, `Name`, `password`) VALUES ('$phoneNumber', '$name', '$password')";
        $this->conn->query($sql);
    }

    public function search($data,$table,$col,$phoneNumber){
        $sql="SELECT $data from $table where $col = '$phoneNumber'";
        $result = $this->conn->query($sql);
        if($result->num_rows == 1){
            $row = $result->fetch_assoc();
            return $row;
        }
    }

    public function dbContact($phoneNumber,$contactName){
        $sql_p = "select p_id from user where p_num = '$phoneNumber'";
        $result = $this->conn->query($sql_p);
        $row = $result->fetch_assoc();
        echo $row['p_id'];
        $CID = $row['p_id'];
        if($result->num_rows == 1){
            $sql = "INSERT into contacts (p_id,c_num, Name) values('$CID','$phoneNumber', '$contactName')";
            $this->conn->query($sql);
            return true;
        }else{
            return false;
        }

    }

    public function makeReport($report,$contactNum){
        $CID = $this->search("c_id",'contacts','c_num',$contactNum);
        $PID= $_SESSION['UID'];
        $sql = "INSERT into report (p_id,c_id,data) values ('$PID','$CID','$report')";
        if($this->conn->query($sql)){
            return true;
        }
        return false;

    }

    public function openChat($phoneNumber){
        $PID = $_SESSION['UID'];
        $CID = $this->search("c_id",'contacts','c_num',$phoneNumber);
        $sql = "INSERT into chat (p_id,c_id,block,report) values ('$PID','$CID','0','1')";
        if($this->conn->query($sql)){
            return true;
        }
        return false;
    }

    public function delCont($phoneNumber){
        $sql = "DELETE from contacts where c_num = '$phoneNumber'";
        if($this->conn->query($sql)){
            return true;
        }
        else return false;
    }

    public function dbEdit($phoneNumber,$name){
        $sql = "UPDATE contacts SET Name = '$name' WHERE c_num = '$phoneNumber'";
        if($this->conn->query($sql)){
            return true;
        }
        return false;
    }

    public function dbRate($rating){
        if($_SESSION['UID']){
            $id = $_SESSION['UID'];
            $sql = "UPDATE user SET rating='$rating' where p_id = '$id'" ;
            $this->conn->query($sql);
            return true;
        }else{
            return false;
        }
    }

    public function dbVerify($name, $password) {
        try {
            // Prepare the SQL statement with placeholders
            $sql = "SELECT p_id ,p_num,Name, password FROM user WHERE Name = '$name' AND password = '$password' ";
            // Prepare the statement
            $result = $this->conn->query($sql);
            // Check if any rows are returned
            if ($result->num_rows == 1) {
                $row = $result->fetch_assoc();
                $_SESSION["Name"] = $row['Name'];
                $_SESSION["password"] = $row['password'];
                $_SESSION["Number"] = $row['p_num'];
                $_SESSION["UID"] = $row['p_id'];
                // Username and password combination is correct
                return true;
            } else {
                // Username and password combination is incorrect
                return false;
            }

        } catch (\Throwable $th) {
            // Log or handle the error
            error_log("Error in dbVerify: " . $th->getMessage());
            return false; // Return false to indicate login failure
        }
    }
    public function UnblockDB($PhoneNumber){
        $db = new Database();
        $CID = $this->search("c_id",'contacts','c_num',$phoneNumber);
        $sql = "UPDATE `contacts` SET `block` = '0' WHERE contacts.c_id = '$CID'";
        if($this->conn->query($sql)){
            return true;
        }
        return false;

    }
    public function blockDB($phoneNumber){
        $db = new Database();
        $CID = $this->search("c_id",'contacts','c_num',$phoneNumber);
        $PID = $_SESSION['UID'];
        $sql = "UPDATE `contacts` SET `block` = '1' WHERE contacts.c_num = '$phoneNumber'";
        if($this->conn->query($sql)){
            return true;
        }
        return false;
    }

    public function Unfav($phoneNumber){
        $db = new Database();
        $CID = $this->search("c_id",'contacts','c_num',$phoneNumber);
        $PID = $_SESSION['UID'];
        $sql = "UPDATE `contacts` SET `favorite` = '0' WHERE contacts.c_num = '$phoneNumber'";
        if($this->conn->query($sql)){
            return true;
        }
        return false;
    }

    public function fav($phoneNumber){
        $db = new Database();
        $CID = $this->search("c_id",'contacts','c_num',$phoneNumber);
        $PID = $_SESSION['UID'];
        $sql = "UPDATE `contacts` SET `favorite` = '1' WHERE contacts.c_num = '$phoneNumber'";
        if($this->conn->query($sql)){
            return true;
        }
        return false;
    }
    // public function view_contact()//done
    // {
    //     session_start();
    //     require_once 'Database.php';
    //     $db = new Database();
    //     $p_id = intval($_SESSION["p_id"]);
    //     $sql = "SELECT * FROM contacts WHERE p_id ='$p_id'";
    //     $contacts = $db->select($sql);

    //     $sql = "SELECT count(*) as total FROM contacts WHERE p_id ='$p_id' ";
    //     $repeatTimes = $db->count($sql);
    //     $data = array($contacts, $repeatTimes);
    //     return $data;
    // }
    // public function Viewblockedcontact()//done
    // {
    //     session_start();
    //     require_once 'Database.php';
    //     $db = new Database();
    //     $p_id = intval($_SESSION["p_id"]);
    //     $sql = "SELECT f_name,c_num FROM contacts WHERE p_id ='$p_id' and block='1'";
    //     $contacts = $db->select($sql);

    //     $sql = "SELECT count(*) as total FROM contacts WHERE p_id ='$p_id'and block='1' ";
    //     $repeatTimes = $db->count($sql);
    //     $data = array($contacts, $repeatTimes);
    //     return $data;

    // }
    // public function Viewfavouritecontact()//done
    // {
    //     session_start();
    //     require_once 'Database.php';
    //     $db = new Database();
    //     $p_id = intval($_SESSION["p_id"]);
    //     $sql = "SELECT f_name,c_num FROM contacts WHERE p_id ='$p_id' and favorite='1'";
    //     $contacts = $db->select($sql);

    //     $sql = "SELECT count(*) as total FROM contacts WHERE p_id ='$p_id' and favorite='1'";
    //     $repeatTimes = $db->count($sql);
    //     $data = array($contacts, $repeatTimes);
    //     return $data;
    // }
    // public function Viewemergencycontact()//done
    // {
    //     session_start();
    //     require_once 'Database.php';
    //     $db = new Database();
    //     $p_id = intval($_SESSION["p_id"]);
    //     $sql = "SELECT f_name,c_num FROM contacts WHERE p_id ='$p_id' and is_emer='1'";
    //     $contacts = $db->select($sql);

    //     $sql = "SELECT count(*) as total FROM contacts WHERE p_id ='$p_id' and is_emer='1'";
    //     $repeatTimes = $db->count($sql);
    //     $data = array($contacts, $repeatTimes);
    //     return $data;
    // }


    }
?>
