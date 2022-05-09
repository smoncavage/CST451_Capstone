<!--
Stephan Moncavage
CST-236
Milestone 2
06 March 2021
-->
<?php
include '../../autoloader.php';
include './db.php';
class UserDataService{
    function findByFirstName($search){
        $db = new Database();
        $conn = $db->dbConnect();
        if (mysqli_connect_errno()) {
            echo "Failed to connect to MySQL: " . mysqli_connect_error();
            exit();
        }
        $query = "SELECT * FROM users Where First_Name like '%$search%'";
        $result = mysqli_query($conn, $query);
        if(!$result){
            die("Could not retrieve data: " . mysqli_error($conn));
        }
        $users = [];
        $index = 0;
        while($row = mysqli_fetch_assoc($result)){
            $users[$index] = array(
                $row["ID"], $row["First_Name"], $row["Last_Name"]
            );
            ++$index;
        }
        mysqli_close($conn);
        displayAllUsers($users);
    }
    
    function findByLastName($search){
        $db = new Database();
        $conn = $db->dbConnect();
        if (mysqli_connect_errno()) {
            echo "Failed to connect to MySQL: " . mysqli_connect_error();
            exit();
        }
        $query = " SELECT * FROM users Where Last_Name like '%$search%'";
        $result = mysqli_query($conn, $query);
        if(!$result){
            die("Could not retrieve data: " . mysqli_error($conn));
        }$users = [];
        $index = 0;
        while($row = mysqli_fetch_assoc($result)){
            $users[$index] = array(
                $row["ID"], $row["First_Name"], $row["Last_Name"]
            );
            ++$index;
        }
        mysqli_close($conn);
        displayAllUsers($users);
    }
    
    function findByID($search){
        $db = new Database();
        $conn = $db->dbConnect();
        $serch=intval($search);
        if (mysqli_connect_errno()) {
            echo "Failed to connect to MySQL: " . mysqli_connect_error();
            exit();
        }
        $query = " SELECT * FROM users Where ID like '%$search%'";
        $result = mysqli_query($conn, $query);
        if(!$result){
            die("Could not retrieve data: " . mysqli_error($conn));
        }$users = [];
        $index = 0;
        while($row = mysqli_fetch_assoc($result)){
            $users[$index] = array(
                $row["ID"], $row["First_Name"], $row["Last_Name"]
            );
            ++$index;
        }
        mysqli_close($conn);
        displayAllUsers($users);
    }
	
    function findByUsername($search){
        $db = new Database();
        $conn = $db->dbConnect();
        if (mysqli_connect_errno()) {
            echo "Failed to connect to MySQL: " . mysqli_connect_error();
            exit();
        }
        $query = " SELECT * FROM users Where Username like '%$search%'";
        $result = mysqli_query($conn, $query);
        if(!$result){
            die("Could not retrieve data: " . mysqli_error($conn));
        }$users = [];
        $index = 0;
        while($row = mysqli_fetch_assoc($result)){
            $users[$index] = array(
                $row["ID"], $row["First_Name"], $row["Last_Name"], $row["Username"]
            );
            ++$index;
        }
        mysqli_close($conn);
        displayAllUsers($users);
    }
    
    function findByRole($search){
        $db = new Database();
        $conn = $db->dbConnect();
        if (mysqli_connect_errno()) {
            echo "Failed to connect to MySQL: " . mysqli_connect_error();
            exit();
        }
        $query = " SELECT * FROM ecommerce.users Where Username like '%$search%'";
        $result = mysqli_query($conn, $query);
        if(!$result){
            die("Could not retrieve data: " . mysqli_error($conn));
        }$users = [];
        $index = 0;
        while($row = mysqli_fetch_assoc($result)){
            $users[$index] = array(
                $row["ID"], $row["First_Name"], $row["Last_Name"], $row["Username"]
            );
            ++$index;
        }
        mysqli_close($conn);
        displayAllUsers($users);
    }
    
    function findByAddressID($search){
        $db = new Database();
        $conn = $db->dbConnect();
        if (mysqli_connect_errno()) {
            echo "Failed to connect to MySQL: " . mysqli_connect_error();
            exit();
        }
        $query = " SELECT * FROM ecommerce.users Where Address_ID like '%$search%'";
        $result = mysqli_query($conn, $query);
        if(!$result){
            die("Could not retrieve data: " . mysqli_error($conn));
        }$users = [];
        $index = 0;
        while($row = mysqli_fetch_assoc($result)){
            $users[$index] = array(
                $row["ID"], $row["First_Name"], $row["Last_Name"], $row["Username"]
            );
            ++$index;
        }
        mysqli_close($conn);
        displayAllUsers($users);
    }
    
    function findByCreditID($search){
        $db = new Database();
        $conn = $db->dbConnect();
        if (mysqli_connect_errno()) {
            echo "Failed to connect to MySQL: " . mysqli_connect_error();
            exit();
        }
        $query = " SELECT * FROM ecommerce.users Where Credit_ID like '%$search%'";
        $result = mysqli_query($conn, $query);
        if(!$result){
            die("Could not retrieve data: " . mysqli_error($conn));
        }$users = [];
        $index = 0;
        while($row = mysqli_fetch_assoc($result)){
            $users[$index] = array(
                $row["ID"], $row["First_Name"], $row["Last_Name"], $row["Username"]
            );
            ++$index;
        }
        mysqli_close($conn);
        displayAllUsers($users);
    }
    
	function deleteItem($id){
		
	}
	
	function updateOne($id, $person){
		
	}
	
	function findByFirstNameWithAddress($n){
			//$n = search string
        $db = new Database();
        $conn = $db->dbConnect();
			$qry = $conn->prepare("UNION USERS.ID, ISDEFAULT, First_Name, Last_Name, STREET, CITY, STATE, POSTALCODE
				FROM USERS
				JOIN ADDRESSES
				ON USERS.id = ADDRESSES.USERS_id
				WHERE First_Name LIKE ?");
			if(!$qry){
				echo "Could not bind tables together." .$conn->error;
				exit;
			}
			
			$like_n = "%".$n."%";
			$qry->bind_param("s", $like_n);
			
			$qry->execute();
			
			$result = $qry->get_result();
			
			if(!$result){
				echo "Current query has an error of: " .$conn->error;
				return null;
				exit;
			}
			if($result->num_rows ==0){
				return null;
				exit;
			}
	}
}
?>
