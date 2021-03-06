<?php
class Database{
 
    // specify your own database credentials

   private string $host;
   private string $db_name;
   private string $username;
   private string $password;
    /*
       private string $host = "127.0.0.1:3306";
       private string $db_name = "eCommerce";
       private string $username = "root";
       private string $password = "root";
    */
    public $conn = null;

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
    public function dbConnect(){
        $this->host = "bv2rebwf6zzsv341.cbetxkdyhwsb.us-east-1.rds.amazonaws.com";
        $this->db_name = "g4asynvtu9x2oh4e";
        $this->username = "e0ugzn4gbm5rk7vn";
        $this->password = "iil0c5udr9vv6qbk";

        //
        // Enter your host name, database username, password, and database name.
        // If you have not set database password on localhost then set empty.

        //$servername = "localhost";
        //$user = "root";
        //$password = "root";
        //$databas = "ecommerce";
        /*
		private $servername = "bv2rebwf6zzsv341.cbetxkdyhwsb.us-east-1.rds.amazonaws.com";
		private $user = "e0ugzn4gbm5rk7vn";
		private $password = "iil0c5udr9vv6qbk";
		private $databas = "g4asynvtu9x2oh4e";
        */
        //Create Connection

        //mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
        $this->conn = mysqli_connect($this->host,$this->username,$this->password,$this->db_name);

        //Check Connection

        if (mysqli_connect_errno()){
            echo "Failed to connect to MySQL: " . mysqli_connect_error();
        }
        return $this->conn;
    }
}

