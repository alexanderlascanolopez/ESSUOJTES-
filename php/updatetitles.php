<?php
	include('databaseconnect.php');

	try {

		$ab  = isset($_POST['a']) ? $_POST['a'] : "";
		$bb  = isset($_POST['b']) ? $_POST['b'] : "";
	
	
	

		$dbh = new PDO("mysql:host=".DB_HOST.";dbname=".DB_NAME, DB_USER, DB_PASS);

	

		$bq = 1;


		$qry = "UPDATE odiptitle SET `tit1`= :a,`tit2`= :b   WHERE `odipid` = :j";
		

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