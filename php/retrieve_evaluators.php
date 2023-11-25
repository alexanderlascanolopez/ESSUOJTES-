<?php
	include('databaseconnect.php');

	try {


	$sy = isset($_POST['a']) ? $_POST['a'] : "";
	$sem = isset($_POST['b']) ? $_POST['b'] : "";
		

		$dbh = new PDO("mysql:host=".DB_HOST.";dbname=".DB_NAME, DB_USER, DB_PASS);
		
		$qry = "SELECT * FROM evaluators where  `sy` Like :a AND `semester` Like :b ";

		$stmt = $dbh->prepare($qry);
		$stmt->bindParam(":a", $sy);
		$stmt->bindParam(":b", $sem);
	
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