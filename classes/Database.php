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

    public function dbContact($phoneNumber,$contactName){
        $sql_p = "select p_id from user where p_num = '$phoneNumber'";
        $result = $this->conn->query($sql_p);
        if($result->num_rows == 1){
            $row = $result->fetch_assoc();
            $CID = $row['p_id'];
            $sql = "INSERT into contacts (p_id,c_num, Name) values('$CID','$phoneNumber', '$contactName')";
            $this->conn->query($sql);
            return true;
        }else{
            echo"Error: There is no such User";
            return false;
        }

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
}
?>
