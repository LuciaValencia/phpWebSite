<?php
class Database {
    private $host = "localhost"; 
    private $db_name = "YouTravel";
    private $username = "root";
    public $conn;
    
    public function getConnection(){
        $this->conn = null;
        try {
            $this->conn=new PDO("mysql:host=".$this->host.";dbname=".$this->db_name. ";charset=utf8", $this->username);
        }catch(PDOException $exception) {
            echo "Connection error: " . $exception->getMessage();
        } 
        return $this->conn;
    }
}
?>