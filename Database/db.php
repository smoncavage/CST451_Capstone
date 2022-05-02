<?php
class Database{
 
    // specify your own database credentials
    private string $host = "bv2rebwf6zzsv341.cbetxkdyhwsb.us-east-1.rds.amazonaws.com";
    private string $db_name = "e0ugzn4gbm5rk7vn";
    private string $username = "iil0c5udr9vv6qbk ";
    private string $password = "g4asynvtu9x2oh4e";
    public $conn;

    // get the database connection
    public function getConnection(): ?PDO
    {
 
        $this->conn = null;
 
        try{
            $this->conn = new PDO("mysql:host=" . $this->host . ";dbname=" . $this->db_name, $this->username, $this->password);
        }catch(PDOException $exception){
            echo "Connection error: " . $exception->getMessage();
        }
 
        return $this->conn;
    }
}
?>
