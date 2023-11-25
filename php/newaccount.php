<?php
	include('databaseconnect.php');

	try {
	
		$ab  = isset($_POST['a']) ? $_POST['a'] : "";
		$bb  = isset($_POST['b']) ? $_POST['b'] : "";
		$cb  = isset($_POST['c']) ? $_POST['c'] : "";
		$db  = isset($_POST['d']) ? $_POST['d'] : "";
		$eb  = isset($_POST['e']) ? $_POST['e'] : "";
		$fb  = isset($_POST['f']) ? $_POST['f'] : "";
		$gb  = isset($_POST['g']) ? $_POST['g'] : "";
		$hb  = isset($_POST['h']) ? $_POST['h'] : "";
		$ib  = isset($_POST['i']) ? $_POST['i'] : "";
		$jb  = isset($_POST['j']) ? $_POST['j'] : "";
		$kb  = isset($_POST['k']) ? $_POST['k'] : "";
	
	
		
		
		$ed  = "add";

				

		$dup = 0;

		$dbh = new PDO("mysql:host=".DB_HOST.";dbname=".DB_NAME, DB_USER, DB_PASS);

		

		$qry = "";


	


					if($ed == "add"){
						
					    $qry= "INSERT INTO adminaccounts( `firstname`, `middlename`, `lastname`, `nameext`, `fullname`, `college`, `department`, `program`, `position`, `username`, `password`) VALUES " . 
							   "(:a, :b, :c, :d, :e, :f, :g, :h, :i, :j, :k)";



					} 
					
					if($ed == "add") {
						$checker = "SELECT * FROM adminaccounts WHERE `username` = :co ";

						$fdup = $dbh->prepare($checker);
						$fdup->bindParam(":co", $jb);

					

						$fdup->execute();

						$count = $fdup->rowCount();

						if($count > 0)
							$dup++;
							
						}	



		
			
				
				$stmt = $dbh->prepare($qry);
				$stmt->bindParam(":a", $ab);
				$stmt->bindParam(":b", $bb);
				$stmt->bindParam(":c", $cb);
				$stmt->bindParam(":d", $db);
				$stmt->bindParam(":e", $eb);
				$stmt->bindParam(":f", $fb);
				$stmt->bindParam(":g", $gb);
				$stmt->bindParam(":h", $hb);
				$stmt->bindParam(":i", $ib);
				$stmt->bindParam(":j", $jb);
				$stmt->bindParam(":k", $kb);
			

	
				
			

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