<?php
	include('databaseconnect.php');

	try {



		$dbh = new PDO("mysql:host=".DB_HOST.";dbname=".DB_NAME, DB_USER, DB_PASS);





		$qry = "SELECT MAX(evalid) AS maximum FROM evaluators";
		$stmt = $dbh->prepare($qry);
		$stmt->execute();
		$row = $stmt->fetch(PDO::FETCH_ASSOC);
		$maximum = $row['maximum'];
		$arr = array("unid" => $maximum,"status" => 1);









echo json_encode($arr);

	}
	catch (PDOException $e) {
		$arr = array("err" => $e->getMessage());
		echo json_encode($arr);
	}

	$dbh = null;
?>