<?php
	include('databaseconnect.php');
	try {

		$ab = isset($_POST['a']) ? $_POST['a'] : "";

		$dbh = new PDO("mysql:host=".DB_HOST.";dbname=".DB_NAME, DB_USER, DB_PASS);
		
		$qry = "SELECT * FROM `evaluations` WHERE `evalid` LIKE :ab";

		$stmt = $dbh->prepare($qry);
		$stmt->bindParam(":ab", $ab);
		$stmt->execute();

		$count = $stmt->rowCount();

		if($count > 0){
			$data = $stmt->fetch(PDO::FETCH_ASSOC);


		
		
			$a1= $data["student"];
			$a2= $data["schoolyear"];
			$a3= $data["sem"];
			$a4= $data["evaluator"];
			$a5= $data["eposition"];
			$a6= $data["econnum"];
			$a7= $data["ecomp"];
			$a8= $data["eaddr"];
			$a9= $data["a"];
			$a10= $data["b"];
			$a11= $data["c"];
			$a12= $data["d"];

			$a13= $data["e"];
			$a14= $data["f"];
			$a15= $data["g"];
			$a16= $data["h"];
			$a17= $data["i"];
			$a18= $data["j"];
			$a19= $data["k"];
			$a20= $data["l"];
			$a21= $data["m"];
			$a22= $data["n"];
			$a23= $data["o"];
			$a24= $data["p"];
			$a25= $data["q"];
			$a26= $data["r"];
			$a27= $data["total"];
			$a28= $data["comments"];
	





	
		

			$arr = array("a1" => $a1,"a2" => $a2,"a3" => $a3,"a4" => $a4,"a5" => $a5,"a6" => $a6,"a7" => $a7,"a8" => $a8,"a9" => $a9,"a10" => $a10,"a11" => $a11,"a12" => $a12,"a13" => $a13,"a14" => $a14,"a15" => $a15,"a16" => $a16,"a17" => $a17,"a18" => $a18,"a19" => $a19,"a20" => $a20,"a21" => $a21,"a22" => $a22,"a23" => $a23,"a24" => $a24,"a25" => $a25,"a26" => $a26,"a27" => $a27,"a28" => $a28,"status" => 1);
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