<?php
	include('databaseconnect.php');
	try {

		$ab = isset($_POST['a']) ? $_POST['a'] : "";
		$bb = isset($_POST['b']) ? $_POST['b'] : "";
		$cb = isset($_POST['c']) ? $_POST['c'] : "";

		$dbh = new PDO("mysql:host=".DB_HOST.";dbname=".DB_NAME, DB_USER, DB_PASS);
		
		$qry = "SELECT * FROM `evaluators` WHERE `sy` = :a AND `semester` = :b AND `fullname` = :c";

		$stmt = $dbh->prepare($qry);
		$stmt->bindParam(":a", $ab);
		$stmt->bindParam(":b", $bb);
		$stmt->bindParam(":c", $cb);
		$stmt->execute();

		$count = $stmt->rowCount();

		if($count > 0){
			$data = $stmt->fetch(PDO::FETCH_ASSOC);

		
			$a1= $data["evaluatorid"];
			$a2= $data["firstname"];
			$a3= $data["middlename"];
			$a4= $data["lastname"];
			$a5= $data["nameextension"];
			$a6= $data["company"];
			$a7= $data["sy"];
			$a8= $data["position"];
			$a9= $data["username"];
			$a10= $data["password"];
			$a11= $data["code"];
			$a12= $data["semester"];



	
		

			$arr = array("a1" => $a1,"a2" => $a2,"a3" => $a3,"a4" => $a4,"a5" => $a5,"a6" => $a6,"a7" => $a7,"a8" => $a8,"a9" => $a9,"a10" => $a10,"a11" => $a11,"a12" => $a12,"status" => 1);
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