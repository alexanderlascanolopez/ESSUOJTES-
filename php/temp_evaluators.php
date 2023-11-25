<?php
	include('databaseconnect.php');

	try {
	
		$ab  = isset($_POST['a']) ? $_POST['a'] : "";
		$bb  = isset($_POST['b']) ? $_POST['b'] : "";

	
	
		
		
		$ed  = "add";

				

		$dup = 0;

		$dbh = new PDO("mysql:host=".DB_HOST.";dbname=".DB_NAME, DB_USER, DB_PASS);

		

		$qry = "";


	


					if($ed == "add"){
						
					    $qry= "INSERT INTO tempevaluators( `user`, `code`) VALUES " . 
							   "(:a, :b)";



					} 
					
					if($ed == "add") {
						$checker = "SELECT * FROM tempevaluators WHERE `user` = :co ";

						$fdup = $dbh->prepare($checker);
						$fdup->bindParam(":co", $ab);

					

						$fdup->execute();

						$count = $fdup->rowCount();

						if($count > 0)
							$dup++;
							
						}	



		
			
				
				$stmt = $dbh->prepare($qry);
				$stmt->bindParam(":a", $ab);
				$stmt->bindParam(":b", $bb);
		
			

	
				
			

		if($dup > 0)
			$arr = array("status" => 2);
		else {
			$stmt->execute();
			$arr = array("status" => 1);
		}
		echo json_encode($arr);
	}
	catch (PDOException $e) {
		echo $e->getMessage();
		$arr = array("status" => 0);
		echo json_encode($arr);
	}

	$dbh = null;
?>