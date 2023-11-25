<?php
	include('databaseconnect.php');

	try {

		$ab  = isset($_POST['a']) ? $_POST['a'] : "";
		$bb  = isset($_POST['b']) ? $_POST['b'] : "";
		$bq  = isset($_POST['c']) ? $_POST['c'] : "";
	
	
	
	

		$dbh = new PDO("mysql:host=".DB_HOST.";dbname=".DB_NAME, DB_USER, DB_PASS);

	




		$qry = "UPDATE odipquestions SET `question`= :a,`rating`= :b   WHERE `id` = :j";
		

		$stmt = $dbh->prepare($qry);


				$stmt->bindParam(":a", $ab);
				$stmt->bindParam(":b", $bb);
				$stmt->bindParam(":j", $bq);
		
		
	
		
		
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