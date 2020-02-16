<?php
function checktest($uname,$pass)
	{
		include "config/database.php" ;
		$conn = new mysqli($host,$username,$password,$dbname);
		if($conn->connect_error){
			die("connection failed : " .$conn->connect_error);

		}
		$sql = "CALL checkTest('$uname','$pass')";
		 $result = $conn->query($sql) or die($conn->error);
		$conn->close();
		if($result->num_rows>0)
		{
			return "1";
		}
		else {
			return "0";
			}
		
	}

?>