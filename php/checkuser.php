<?php
	include('databaseconnect.php');

	try {

		$_uname = isset($_POST["un"]) ? $_POST["un"] : "";
		$_pword = isset($_POST["pw"]) ? $_POST["pw"] : "";
		

		$dbh = new PDO("mysql:host=".DB_HOST.";dbname=".DB_NAME, DB_USER, DB_PASS);
		
		$qry = "SELECT * FROM `adminaccounts` WHERE `username`=:un AND `password`=:pw";

		$stmt = $dbh->prepare($qry);
		$stmt->bindParam(":un", $_uname);
		$stmt->bindParam(":pw", $_pword);
		$stmt->execute();

		$count = $stmt->rowCount();

		if($count > 0){
				$data = $stmt->fetch(PDO::FETCH_ASSOC);
				$a1= $data["firstname"];

			
			
			
				$arr = array("a1" => $a1, "status" => 1);
			
		} else {
			$arr = array("status" => 0);
		}
		echo json_encode($arr);
	}
	catch (PDOException $e) {
		$arr = array("err" => $e->getMessage());
		echo json_encode($arr);
	}

	$dbh = null;

?>