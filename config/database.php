<?php

class DatabaseClass
{
    private $host = "localhost";
    private $db_name = "api";
    private $username = "root";
    private $password = "";
    public $conn;

    //get the database  connection
    public function getConnection()
    {
        $this->conn = null;

        try
        {
            $this->connection = new PDO("mysql:host={$db_host};dbname={$db_name};", $db_username, $db_password);
            $this->connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $this->connection->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
        }
        catch(PDOException $e)
        {
            echo "Connection error: " . $e->getMessage();
        }
        return $this->conn;
    }
}

?>