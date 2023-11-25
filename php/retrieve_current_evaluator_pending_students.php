<?php
	include('databaseconnect.php');

	try {

		$id  = isset($_POST['a']) ? $_POST['a'] : "";
		$st  = isset($_POST['stat']) ? $_POST['stat'] : "";

		$dbh = new PDO("mysql:host=".DB_HOST.";dbname=".DB_NAME, DB_USER, DB_PASS);
		
		$qry = "SELECT * FROM interns where evaluator = :ab AND status = :a";

		$stmt = $dbh->prepare($qry);
		$stmt->bindParam(":ab", $id);
		$stmt->bindParam(":a", $st);
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