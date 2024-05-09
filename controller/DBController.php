<?php 

class DBController
{
    
    public $dbHost="localhost";
    public $dbUser="root";
    public $dbPassword="";
    public $dbName="dbtruecaller";
    public $connection;

    public function openConnection()
    {
        $this->connection=new mysqli($this->dbHost,$this->dbUser,$this->dbPassword,$this->dbName);
        if($this->connection->connect_error)
        {
            echo " Error in Connection : ".$this->connection->connect_error;
            return false;
        }
        else
        {
            return true;
        }
    }

    public function closeConnection()
    {
        if($this->connection)
        {
            $this->connection->close();
        }
        else
        {
            echo "Connection is not opened";
        }
    }

    public function select($qry)
    {
        $result=$this->connection->query($qry);
        if(!$result)
        {
            echo "Error : ".mysqli_error($this->connection);
            return false;
        }
        else
        {
             return $result->fetch_all(MYSQLI_ASSOC);
        }

    }
    public function selectOne($qry)
{
    $result = $this->connection->query($qry);
    if (!$result) {
        echo "Error : " . mysqli_error($this->connection);
        return false;
    } else {
        return $result->fetch_assoc();
    }
}




    public function displayOne($qry)
    {
        $result = $this->connection->query($qry);
        if (!$result) {
            echo "Error : " . mysqli_error($this->connection);
            return false;
        } else {

            if ($result->num_rows > 0) {
                $row = $result->fetch_assoc();
                echo $row["text"];       
        }

    }

    }



    public function insert($qry)
    {
        $result=$this->connection->query($qry);
        if(!$result)
        {
            echo "Error : ".mysqli_error($this->connection);
            return false;
        }
        else
        {
             return $this->connection->insert_id;
        }

    }
    public function delete($qry)
    {
        $result=$this->connection->query($qry);
        if(!$result)
        {
            echo "Error : ".mysqli_error($this->connection);
            return false;
        }
        else
        {
             return $result;
        }

    }
    public function update($qry)
{
    $result = $this->connection->query($qry);
    if (!$result) {
        echo "Error: " . mysqli_error($this->connection);
        return false;
    } else {
        return mysqli_affected_rows($this->connection);
    }
}

}

?>