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
    private $query = "";
    private $db = "";
    private $conn = "";
    private bool|mysqli_result $result;
    private $users = [];

    function findByFirstName($search){
        $this->query = "SELECT * FROM user WHERE First_Name like '%$search%'";
        $this->users = $this->indexQueryResult($this->query);
        echo $this->users;
        return $this->users;
    }
    
    function findByLastName($search){
        $this->query = " SELECT * FROM user WHERE LastName like '%$search%'";
        $this->users = $this->indexQueryResult($this->query);
        return $this->users;
    }
    
    function findByID($search){
        $this->query = " SELECT * FROM user WHERE USER_ID like '%$search%'";
        $this->users = $this->indexQueryResult($this->query);
        return $this->users;
    }
	
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
            //echo $row["USER_ID"], $row["FIRST_NAME"], $row["LASTNAME"], $row["USERNAME"];
            ++$index;
        }
        mysqli_close($conn);

        return $users;
    }
	
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
            //echo $row["USER_ID"], $row["FIRST_NAME"], $row["LASTNAME"], $row["USERNAME"];
            ++$index;
        }
        mysqli_close($conn);
        return $users;
    }
    
    function findByRole($search){
        $this->query = " SELECT * FROM user WHERE Role_ID like '%$search%'";
        $this->users = $this->indexQueryResult($this->query);
        return $this->users;
    }
    
    function findByAddressID($search){
        $this->query = " SELECT * FROM user WHERE Address_ID like '%$search%'";
        $this->users = $this->indexQueryResult($this->query);
        return $this->users;
    }
    
    function findByCreditID($search){
        $this->query = " SELECT * FROM user WHERE Credit_ID like '%$search%'";
        $this->users = $this->indexQueryResult($this->query);
        return $this->users;
    }
    
	function deleteItem($id){
        $this->query = " DELETE * FROM user WHERE USER_ID like '%$id%'";
        $this->users = $this->indexQueryResult($this->query);
        return $this->users;
	}
	
	function updateOne($id, $person){
        $this->query = " UPDATE". $person ." user Where ID like '%$id%'";
        $this->users = $this->indexQueryResult($this->query);
        return $this->users;
	}
	
	function findByFirstNameWithAddress($n){
			//$n = search string
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
            echo "Could not retrieve data: " . mysqli_error($this->conn);
            return $this->users[0][array(9999, 'Not Found', 'Not Found', 'Not Found')];
        }

        $index = 0;
        while ($row = mysqli_fetch_assoc($this->result)) {
            $users[$index] = array(
                $row["USER_ID"], $row["FIRST_NAME"], $row["LASTNAME"], $row["USERNAME"]
            );
            //echo $row["USER_ID"], $row["FIRST_NAME"], $row["LASTNAME"], $row["USERNAME"];
            ++$index;
        }
        mysqli_close($this->conn);
        return $this->users;
    }
}
?>
