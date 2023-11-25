<?php
	include('databaseconnect.php');

	try {

		$a = isset($_POST["a"]) ? $_POST["a"] : "";
		$b = isset($_POST["b"]) ? $_POST["b"] : "";
		$c = isset($_POST["c"]) ? $_POST["c"] : "";

		$a1 = "School Year";
		$a2 = "Program";
		$a3 = "Intern Name";



		if($b == $a1){

			$by = "sy";
		}

		if($b == $a2){

			$by = "program";
		}

		if($b == $a3){

			$by = "fullname";
		}

	

		$dbh = new PDO("mysql:host=".DB_HOST.";dbname=".DB_NAME, DB_USER, DB_PASS);
		
		$qry = "SELECT * FROM interns WHERE  $by like '%$c%' and `evaluator` = :a" ;

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