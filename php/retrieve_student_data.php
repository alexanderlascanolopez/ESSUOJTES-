<?php
	include('databaseconnect.php');
	try {

		$ab = isset($_POST['a']) ? $_POST['a'] : "";

		$dbh = new PDO("mysql:host=".DB_HOST.";dbname=".DB_NAME, DB_USER, DB_PASS);
		
		$qry = "SELECT * FROM `students` WHERE `studnum` LIKE :ab";

		$stmt = $dbh->prepare($qry);
		$stmt->bindParam(":ab", $ab);
		$stmt->execute();

		$count = $stmt->rowCount();

		if($count > 0){
			$data = $stmt->fetch(PDO::FETCH_ASSOC);

		
			$a1= $data["studnum"];
			$a2= $data["firstname"];
			$a3= $data["middlename"];
			$a4= $data["lastname"];
			$a5= $data["nameextension"];
			$a6= $data["college"];
			$a7= $data["department"];
			$a8= $data["program"];
			$a9= $data["fullname"];
			
			
		




	
		

			$arr = array("a1" => $a1,"a2" => $a2,"a3" => $a3,"a4" => $a4,"a5" => $a5,"a6" => $a6,"a7" => $a7,"a8" => $a8,"a9" => $a9,"status" => 1);
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