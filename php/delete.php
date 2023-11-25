<?php
	include('databaseconnect.php');

	try {

		$id  = isset($_POST['id']) ? $_POST['id'] : "";
		$type  = isset($_POST['type']) ? $_POST['type'] : "";

		$dbh = new PDO("mysql:host=".DB_HOST.";dbname=".DB_NAME, DB_USER, DB_PASS);




 if($type == "student"){
		$qry = "DELETE FROM `students` WHERE `studnum` Like :a";

}

 if($type == "evaluator"){
		$qry = "DELETE FROM `evaluators` WHERE `evaluatorid` Like :a";

}





		$stmt = $dbh->prepare($qry);
		$stmt->bindParam(":a", $id);
		
		$stmt->execute();
		$arr = array("status" => 1);

		echo json_encode($arr);
	}
	catch (PDOException $e) {
		echo $e->getMessage();
		$arr = array("status" => 0);
		echo json_encode($arr);
	}

	$dbh = null;
?>