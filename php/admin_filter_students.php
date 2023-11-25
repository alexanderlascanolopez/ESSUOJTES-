<?php
	include('databaseconnect.php');

	try {

		$a = isset($_POST["a"]) ? $_POST["a"] : "";
		$b = isset($_POST["b"]) ? $_POST["b"] : "";
	

		$a2 = "Student Number";
		$a3 = "Student Name";



	
		if($a == $a2){

			$by = "studnum";
		}

		if($a == $a3){

			$by = "fullname";
		}

	

		$dbh = new PDO("mysql:host=".DB_HOST.";dbname=".DB_NAME, DB_USER, DB_PASS);
		
		$qry = "SELECT * FROM students WHERE  $by like '%$b%'" ;

		$stmt = $dbh->prepare($qry);
			
		$stmt->bindParam(":a", $a);
		$stmt->execute();

		$count = $stmt->rowCount();

		if($count > 0){
			$arr = $stmt->FETCHALL();
			
			echo json_encode($arr);
		} else {
			$arr = array("status" => 0);
			echo json_encode($arr);
		}
	}
	catch (PDOException $e) {
		$arr = array("err" => $e->getMessage());
		echo json_encode($arr);
	}

	$dbh = null;

?>