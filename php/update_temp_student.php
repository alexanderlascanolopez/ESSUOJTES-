<?php
	include('databaseconnect.php');

	try {

		$ab  = isset($_POST['a']) ? $_POST['a'] : "";
		$bb  = isset($_POST['b']) ? $_POST['b'] : "";
	
	


		$dbh = new PDO("mysql:host=".DB_HOST.";dbname=".DB_NAME, DB_USER, DB_PASS);

	
		$qry = "UPDATE tempstudent SET `code`= :b WHERE `user` = :a";
		

		$stmt = $dbh->prepare($qry);


				$stmt->bindParam(":a", $ab);
				$stmt->bindParam(":b", $bb);
		
	
		
		
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