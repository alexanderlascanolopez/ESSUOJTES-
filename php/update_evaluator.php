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
		$lb  = isset($_POST['l']) ? $_POST['l'] : "";
		$mb  = isset($_POST['m']) ? $_POST['m'] : "";
		$nb  = isset($_POST['n']) ? $_POST['n'] : "";
		$ob  = isset($_POST['o']) ? $_POST['o'] : "";
	


		$dbh = new PDO("mysql:host=".DB_HOST.";dbname=".DB_NAME, DB_USER, DB_PASS);

	
		$qry = "UPDATE evaluators SET `firstname`= :b,`middlename`= :c ,`lastname`= :d ,`nameextension`= :e ,`fullname`= :f ,`company`= :g ,`sy`= :h ,`semester`= :i ,`position`= :j,`username`= :k,`password`= :l,`code`= :m ,`connum`= :n,`address`= :o WHERE `evaluatorid` = :a";
		

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
				$stmt->bindParam(":l", $lb);
				$stmt->bindParam(":m", $mb);
				$stmt->bindParam(":n", $nb);
				$stmt->bindParam(":o", $ob);
		
	
		
		
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