<?php
	include('databaseconnect.php');

	try {

		$a = isset($_POST["a"]) ? $_POST["a"] : "";
		$b = isset($_POST["b"]) ? $_POST["b"] : "";
	

		$a1 = "Student Name";
		$a2 = "School Year";
		$a3 = "Company";
		$a4 = "Evaluator";



	
		if($a == $a1){

			$by = "fullname";
		}

		if($a == $a2){

			$by = "sy";
		}


		if($a == $a3){

			$by = "company";
		}


		if($a == $a4){

			$by = "evaluator";
		}

	

		$dbh = new PDO("mysql:host=".DB_HOST.";dbname=".DB_NAME, DB_USER, DB_PASS);
		
		$qry = "SELECT * FROM interns WHERE  $by like '%$b%'" ;

		$stmt = $dbh->prepare($qry);
			
		$stmt->bindParam(":a", $a);
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