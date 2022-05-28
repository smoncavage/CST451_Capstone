<!--/*
Stephan Moncavage
CST-451
Capstone Project
11 May 2022
*/-->
<?php
//include('../../autoloader.php');
//
require_once 'db.php';
class ProductDataService{
    private $db;
    private $conn;
    private $query;
    private $result;
    private $products = [];
    function findAllProducts(){
        /*
       $db = new Database();
        $conn = $db->dbConnect();
        if (mysqli_connect_errno()) {
            echo "Failed to connect to MySQL: " . mysqli_connect_error();
            exit();
        }
        $query = " SELECT * FROM products ";
        $result = mysqli_query($conn, $query);
        if(!$result){
            die("Could not retrieve data: " . mysqli_error($conn));
        }$products = [];
        $index = 0;
        while($row = mysqli_fetch_assoc($result)){
            $products[$index] = array(
                $row["Product_ID"], $row["Product_Name"], $row["Product_Description"], $row["Price"]
            );
            ++$index;
        }
        mysqli_close($conn);
        displayAllProducts($products);
        return $products
        */

        $this->query = "SELECT * FROM products ORDER BY Product_ID";
        $index = 0;
        $this->products[$index] = indexQueryResult($this->query);
        if(!$this->products){
            echo "No Results Found";
        }
        else {

            //echo "<div style=\"border:3px solid #5eb95d; background-color:grey; border-radius:5px; padding:16px;\">";
            echo "<div class = 'row'>";
            for ($x = 0; $x < count($this->products); $x++) {
                echo " <div class = 'col-sm-2' style=\"border:3px solid #5eb95d; background-color:grey; border-radius:2px; padding:2px;\">";
                echo "<form method='post' action= './cart.php?action=add&id=" . $this->products[$x][0] . "'>";
                echo "<img alt = '' src='../Presentation/css/assets/img/coming_soon.jpg' class='img-responsive' height='100' width='100'/>";
                echo "<h4 class='text-info'>" . $this->products[$x][1] . "</h4>";
                echo "<h4 class='text-danger'> $" . floatval($this->products[$x][3] / 1.000) . "</h4>";
                echo "<select id='quantity' name ='cart-quantity'>
									<option value ='1'>1</option>
									<option value ='2'>2</option>
									<option value ='3'>3</option>
									<option value ='4'>4</option>
									<option value ='5'>5</option>
								</select>";
                echo "<input type='hidden' name='product-id' value='" . $this->products[$x][0] . "'/>";
                echo "<input type='hidden' name='hidden_name' value='" . $this->products[$x][1] . "' />";
                echo "<input type='hidden' name='hidden_price' value='" . floatval($this->products[$x][3] / 1.000) . "' />";
                echo "<input type = 'submit' name = 'add_to_cart' class = 'boxed-btn' value = 'Add to Cart' ></input><br/>";

                echo "</div>";
                echo "</form>";
                //echo "</div>";
            }
            echo "</div>";
        }
        //displayAllProducts($products);
        return $this->products;
    }
    function findByProductName($search){
        $db = new Database();
        $conn = $db->dbConnect();
        if (mysqli_connect_errno()) {
            echo "Failed to connect to MySQL: " . mysqli_connect_error();
            exit();
        }
        $query = " SELECT * FROM products Where Product_Name like '%$search%'";
        $result = mysqli_query($conn, $query);
        if(!$result){
            die("Could not retrieve data: " . mysqli_error($conn));
        }
        $products = [];
        $index = 0;
        while($row = mysqli_fetch_assoc($result)){
            $products[$index] = array(
                $row["Product_ID"], $row["Product_Name"], $row["Product_Description"], $row["Price"]
            );
            ++$index;
        }
        mysqli_close($conn);
        displayAllProducts($products);
        return $products;
    }

    function findByProductPrice($search){
        $db = new Database();
        $conn = $db->dbConnect();
        if (mysqli_connect_errno()) {
            echo "Failed to connect to MySQL: " . mysqli_connect_error();
            exit();
        }
        $query = " SELECT * FROM products Where Product_Price like '%$search%'";
        $result = mysqli_query($conn, $query);
        if(!$result){
            die("Could not retrieve data: " . mysqli_error($conn));
        }$products = [];
        $index = 0;
        while($row = mysqli_fetch_assoc($result)){
            $products[$index] = array(
                $row["Product_ID"], $row["Product_Name"], $row["Product_Description"], $row["Price"]
            );
            ++$index;
        }
        mysqli_close($conn);
        displayAllProducts($products);
        return $products;
    }

    function findByProductID($search){
        $db = new Database();
        $conn = $db->dbConnect();
        $serch=intval($search);
        if (mysqli_connect_errno()) {
            echo "Failed to connect to MySQL: " . mysqli_connect_error();
            exit();
        }
        $query = " SELECT * FROM products Where Product_ID like '%$serch%'";
        $result = mysqli_query($conn, $query);
        if(!$result){
            die("Could not retrieve data: " . mysqli_error($conn));
        }$products = [];
        $index = 0;
        while($row = mysqli_fetch_assoc($result)){
            $products[$index] = array(
                $row["Product_ID"], $row["Product_Name"], $row["Product_Description"], $row["Price"]
            );
            ++$index;
        }
        mysqli_close($conn);
        displayAllProducts($products);
        return $products;
    }

    /**
     * @return array|void
     */
    public function indexQueryResult($qry)
    {
        $this->db = new Database();
        $this->conn = $this->db->dbConnect();
        if (mysqli_connect_errno()) {
            echo "Failed to connect to MySQL: " . mysqli_connect_error();
            exit();
        }
        $this->query = $qry;
        $this->result = mysqli_query($this->conn, $this->query);
        if (!$this->result) {
            die("Could not retrieve data: " . mysqli_error($this->conn));
        }

        $index = 0;
        while ($row = mysqli_fetch_assoc($this->result)) {
            $products[$index] = array(
                $row["Product_ID"], $row["Product_Name"], $row["Product_Description"], $row["Product_Price"], $row["Product_Picture"]
            );
            ++$index;
        }
        mysqli_close($this->conn);
        return $this->products;
    }
}
?>

