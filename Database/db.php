<?php
class Database{
 
    // specify your own database credentials
    private string $host = "bv2rebwf6zzsv341.cbetxkdyhwsb.us-east-1.rds.amazonaws.com";
    private string $db_name = "e0ugzn4gbm5rk7vn";
    private string $username = "iil0c5udr9vv6qbk ";
    private string $password = "g4asynvtu9x2oh4e";
  /*
    private string $host = "127.0.0.1:3306";
    private string $db_name = "eCommerce";
    private string $username = "root";
    private string $password = "root";
*/	
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
    public function dbConnect(){

        //
        // Enter your host name, database username, password, and database name.
        // If you have not set database password on localhost then set empty.

        $servername = "localhost";
        $user = "root";
        $password = "root";
        $databas = "ecommerce";

		//$servername = "bv2rebwf6zzsv341.cbetxkdyhwsb.us-east-1.rds.amazonaws.com";
		//$user = "iil0c5udr9vv6qbk";
		//$password = "g4asynvtu9x2oh4e";
		//$databas = "e0ugzn4gbm5rk7vn";

        //Create Connection

        //mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
        $conn = mysqli_connect($servername,$user,$password,$databas);

        //Check Connection

        if (mysqli_connect_errno()){
            echo "Failed to connect to MySQL: " . mysqli_connect_error();
        }
        return $conn;
    }
}
?>
