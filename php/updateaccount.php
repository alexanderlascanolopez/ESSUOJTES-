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
	
	

		$dbh = new PDO("mysql:host=".DB_HOST.";dbname=".DB_NAME, DB_USER, DB_PASS);

	




		$qry = "UPDATE adminaccounts SET `firstname`= :a,`middlename`= :b ,`lastname`= :c ,`nameext`= :d ,`fullname`= :e ,`college`= :f ,`department`= :g ,`program`= :h ,`position`= :i ,`password`= :k  WHERE `username` = :j";
		

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