<?php
	include('databaseconnect.php');

	try {
	
	$type  = isset($_POST['type']) ? $_POST['type'] : "";
	$eval = isset($_POST['a']) ? $_POST['a'] : "";

		

	$dbh = new PDO("mysql:host=".DB_HOST.";dbname=".DB_NAME, DB_USER, DB_PASS);
		
	

		if($type == "enrolled"){

		$qry = "SELECT count(1) AS maximum FROM students";
		$stmt = $dbh->prepare($qry);
		$stmt->execute();
		$row = $stmt->fetch(PDO::FETCH_ASSOC);
		$maximum = $row['maximum'];


	}

			if($type == "evaluations"){

		$qry = "SELECT count(1) AS maximum FROM evaluations";
		$stmt = $dbh->prepare($qry);
		$stmt->execute();
		$row = $stmt->fetch(PDO::FETCH_ASSOC);
		$maximum = $row['maximum'];


	}

		if($type == "supervisors"){

		$qry = "SELECT count(1) AS maximum FROM evaluators";
		$stmt = $dbh->prepare($qry);
		$stmt->execute();
		$row = $stmt->fetch(PDO::FETCH_ASSOC);
		$maximum = $row['maximum'];


	}


 	if($type == "total"){

		$qry = "SELECT count(1) AS maximum FROM interns where evaluator = :ab";
		$stmt = $dbh->prepare($qry);
		$stmt->bindParam(":ab", $eval);
		$stmt->execute();
		$row = $stmt->fetch(PDO::FETCH_ASSOC);
		$maximum = $row['maximum'];


	}



	if($type == "pending"){
	$stat1 = "PENDING";

		$qry = "SELECT count(1) AS maximum FROM interns where evaluator = :ab AND status = :st1";

		$stmt = $dbh->prepare($qry);
		$stmt->bindParam(":ab", $eval);
		$stmt->bindParam(":st1", $stat1);
		$stmt->execute();
		$row = $stmt->fetch(PDO::FETCH_ASSOC);
		$maximum = $row['maximum'];

	}

	if($type == "evaluated"){
	$stat1 = "EVALUATED";

		$qry = "SELECT count(1) AS maximum FROM interns where evaluator = :ab AND status = :st1";

		$stmt = $dbh->prepare($qry);
		$stmt->bindParam(":ab", $eval);
		$stmt->bindParam(":st1", $stat1);
		$stmt->execute();
		$row = $stmt->fetch(PDO::FETCH_ASSOC);
		$maximum = $row['maximum'];

	}

	



		


			$arr = array("unid" => $maximum,"status" => 1);
		

		echo json_encode($arr);
	}
	catch (PDOException $e) {
		$arr = array("err" => $e->getMessage());
		echo json_encode($arr);
	}

	$dbh = null;
?>