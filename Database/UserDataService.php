<!--
/*
Stephan Moncavage
CST-451
Capstone Project
06 May 2022
User Data Service
*/
-->
<?php

include 'db.php';
class UserDataService{
    //Retrieve all User Data
    public function getAllUserData(){
        $db = new Database();
        $conn = $db->dbConnect();
        $query =" SELECT * FROM user";
        $result = mysqli_query($conn, $query);
        $users = [];
        if (!$result) {
            echo "Could not retrieve data: " . mysqli_error($conn);
            return $users[0][array(9999, 'Not Found', 'Not Found', 'Not Found')];
        }
        $index = 0;
        while ($row = mysqli_fetch_assoc($result)) {
            $users[$index] = array(
                $row["USER_ID"], $row["FIRST_NAME"], $row["LASTNAME"], $row["USERNAME"]
            );
            ++$index;
        }
        mysqli_close($conn);
        return $users;
    }
    //Search for person by First Name
    function findByFirstName($search){
        $db = new Database();
        $conn = $db->dbConnect();
        $query = "SELECT * FROM user WHERE First_Name like '%$search%'";
        $result = mysqli_query($conn, $query);
        $users = [];
        if (!$result) {
            echo "Could not retrieve data: " . mysqli_error($conn);
            return $users[0][array(9999, 'Not Found', 'Not Found', 'Not Found')];
        }
        $index = 0;
        while ($row = mysqli_fetch_assoc($result)) {
            $users[$index] = array(
                $row["USER_ID"], $row["FIRST_NAME"], $row["LASTNAME"], $row["USERNAME"]
            );
            ++$index;
        }
        mysqli_close($conn);
        return $users;
    }
    //Search for person by LastName
    function findByLastName($search){
        $db = new Database();
        $conn = $db->dbConnect();
        $query = " SELECT * FROM user WHERE LastName like '%$search%'";
        $result = mysqli_query($conn, $query);
        $users = [];
        if (!$result) {
            echo "Could not retrieve data: " . mysqli_error($conn);
            return $users[0][array(9999, 'Not Found', 'Not Found', 'Not Found')];
        }
        $index = 0;
        while ($row = mysqli_fetch_assoc($result)) {
            $users[$index] = array(
                $row["USER_ID"], $row["FIRST_NAME"], $row["LASTNAME"], $row["USERNAME"]
            );
            ++$index;
        }
        mysqli_close($conn);
        return $users;
    }
    //Search for person by their associated ID
    function findByID($search){
        $db = new Database();
        $conn = $db->dbConnect();
        $query = " SELECT * FROM user WHERE USER_ID like '%$search%'";
        $result = mysqli_query($conn, $query);
        $users = [];
        if (!$result) {
            echo "Could not retrieve data: " . mysqli_error($conn);
            return $users[0][array(9999, 'Not Found', 'Not Found', 'Not Found')];
        }
        $index = 0;
        while ($row = mysqli_fetch_assoc($result)) {
            $users[$index] = array(
                $row["USER_ID"], $row["FIRST_NAME"], $row["LASTNAME"], $row["USERNAME"]
            );
            ++$index;
        }
        mysqli_close($conn);
        return $users;
    }
	//Search for person by their associated username
    function findByUsername($search){
        $db = new Database();
        $conn = $db->dbConnect();
        $query = " SELECT * FROM user WHERE USERNAME like '%$search%'";
        $result = mysqli_query($conn, $query);
        $users = [];
        if (!$result) {
            echo "Could not retrieve data: " . mysqli_error($conn);
            return $users[0][array(9999, 'Not Found', 'Not Found', 'Not Found')];
        }
        $index = 0;
        while ($row = mysqli_fetch_assoc($result)) {
            $users[$index] = array(
                $row["USER_ID"], $row["FIRST_NAME"], $row["LASTNAME"], $row["USERNAME"]
            );
            ++$index;
        }
        mysqli_close($conn);
        return $users;
    }
	//search for person by their password to compare against their user ID
	function findByPassword($search){
        $db = new Database();
        $conn = $db->dbConnect();
        $query = " SELECT * FROM user WHERE PASSWORD like '%$search%'";
        $result = mysqli_query($conn, $query);
        $users = [];
        if (!$result) {
            echo "Could not retrieve data: " . mysqli_error($conn);
            return $users[0][array(9999, 'Not Found', 'Not Found', 'Not Found')];
        }
        $index = 0;
        while ($row = mysqli_fetch_assoc($result)) {
            $users[$index] = array(
                $row["USER_ID"], $row["FIRST_NAME"], $row["LASTNAME"], $row["USERNAME"]
            );
            ++$index;
        }
        mysqli_close($conn);
        return $users;
    }
    //Return all Persons by a given "Role"
    function findByRole($search){
        $db = new Database();
        $conn = $db->dbConnect();
        $query = " SELECT * FROM user WHERE Role_ID like '%$search%'";
        $result = mysqli_query($conn, $query);
        $users = [];
        if (!$result) {
            echo "Could not retrieve data: " . mysqli_error($conn);
            return $users[0][array(9999, 'Not Found', 'Not Found', 'Not Found')];
        }
        $index = 0;
        while ($row = mysqli_fetch_assoc($result)) {
            $users[$index] = array(
                $row["USER_ID"], $row["FIRST_NAME"], $row["LASTNAME"], $row["USERNAME"]
            );
            ++$index;
        }
        mysqli_close($conn);
        return $users;
    }
    //Search for person by their address
    function findByAddressID($search){
        $db = new Database();
        $conn = $db->dbConnect();
        $query = " SELECT * FROM user WHERE Address_ID like '%$search%'";
        $result = mysqli_query($conn, $query);
        $users = [];
        if (!$result) {
            echo "Could not retrieve data: " . mysqli_error($conn);
            return $users[0][array(9999, 'Not Found', 'Not Found', 'Not Found')];
        }
        $index = 0;
        while ($row = mysqli_fetch_assoc($result)) {
            $users[$index] = array(
                $row["USER_ID"], $row["FIRST_NAME"], $row["LASTNAME"], $row["USERNAME"]
            );
            ++$index;
        }
        mysqli_close($conn);
        return $users;
    }
    //Search for person by their associated Credit Card Information
    function findByCreditID($search){
        $db = new Database();
        $conn = $db->dbConnect();
        $query = " SELECT * FROM user WHERE Credit_ID like '%$search%'";
        $result = mysqli_query($conn, $query);
        $users = [];
        if (!$result) {
            echo "Could not retrieve data: " . mysqli_error($conn);
            return $users[0][array(9999, 'Not Found', 'Not Found', 'Not Found')];
        }
        $index = 0;
        while ($row = mysqli_fetch_assoc($result)) {
            $users[$index] = array(
                $row["USER_ID"], $row["FIRST_NAME"], $row["LASTNAME"], $row["USERNAME"]
            );
            ++$index;
        }
        mysqli_close($conn);
        return $users;
    }
    //Future CRUD Function
	function deleteItem($id){
        $db = new Database();
        $conn = $db->dbConnect();
        $query = " DELETE * FROM user WHERE USER_ID like '%$id%'";
        $result = mysqli_query($conn, $query);
        $users = [];
        if (!$result) {
            echo "Could not retrieve data: " . mysqli_error($conn);
            return $users[0][array(9999, 'Not Found', 'Not Found', 'Not Found')];
        }
        $index = 0;
        while ($row = mysqli_fetch_assoc($result)) {
            $users[$index] = array(
                $row["USER_ID"], $row["FIRST_NAME"], $row["LASTNAME"], $row["USERNAME"]
            );
            ++$index;
        }
        mysqli_close($conn);
        return $users;
	}
	//Future CRUD function
	function updateOne($id, $person){
        $db = new Database();
        $conn = $db->dbConnect();
        $query = " UPDATE". $person ." user Where ID like '%$id%'";
        $result = mysqli_query($conn, $query);
        $users = [];
        if (!$result) {
            echo "Could not retrieve data: " . mysqli_error($conn);
            return $users[0][array(9999, 'Not Found', 'Not Found', 'Not Found')];
        }
        $index = 0;
        while ($row = mysqli_fetch_assoc($result)) {
            $users[$index] = array(
                $row["USER_ID"], $row["FIRST_NAME"], $row["LASTNAME"], $row["USERNAME"]
            );
            ++$index;
        }
        mysqli_close($conn);
        return $users;
	}
	//Return both the person and their associated Address information
    //Future CRUD function
	function findByFirstNameWithAddress($n){
        $db = new Database();
        $conn = $db->dbConnect();
			$qry = $conn->prepare("UNION USERS.UserID, ISDEFAULT, First_Name, LastName, STREET, CITY, STATE, POSTALCODE
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
				//exit;
			}
			if($result->num_rows ==0){
				return null;
				//exit;
			}
	}
}
?>
