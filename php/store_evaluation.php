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

		$pb  = isset($_POST['p']) ? $_POST['p'] : "";
		$qb  = isset($_POST['q']) ? $_POST['q'] : "";
		$rb  = isset($_POST['r']) ? $_POST['r'] : "";
		$sb  = isset($_POST['s']) ? $_POST['s'] : "";
		$tb  = isset($_POST['t']) ? $_POST['t'] : "";
		$ub  = isset($_POST['u']) ? $_POST['u'] : "";
		$vb  = isset($_POST['v']) ? $_POST['v'] : "";
		$wb  = isset($_POST['w']) ? $_POST['w'] : "";
		$xb  = isset($_POST['x']) ? $_POST['x'] : "";
		$yb  = isset($_POST['y']) ? $_POST['y'] : "";
		$zb  = isset($_POST['z']) ? $_POST['z'] : "";
		$a  = isset($_POST['aa']) ? $_POST['aa'] : "";
		$b  = isset($_POST['bb']) ? $_POST['bb'] : "";


	
	
		
		
		$ed  = "add";

				

		$dup = 0;

		$dbh = new PDO("mysql:host=".DB_HOST.";dbname=".DB_NAME, DB_USER, DB_PASS);

		

		$qry = "";


	


					if($ed == "add"){
						
					    $qry= "INSERT INTO evaluations( `student`, `schoolyear`, `sem`, `evaluator`, `eposition`, `econnum`, `ecomp`, `eaddr`, `a`, `b`, `c`, `d`, `e`, `f`, `g`, `h`, `i`, `j`, `k`, `l`, `m`, `n`, `o`, `p`, `q`, `r`, `total`, `comments`) VALUES " . 
							   "(:a, :b, :c, :d, :e, :f, :g, :h, :i, :j, :k, :l, :m, :n, :o, :p, :q, :r, :s, :t, :u, :v, :w, :x, :y,:z, :aa, :bb )";



					} 
					
					if($ed == "add") {
						$checker = "SELECT * FROM evaluations WHERE `student` = :a AND `schoolyear` = :b AND `sem` = :c ";

						$fdup = $dbh->prepare($checker);
						$fdup->bindParam(":a", $ab);
						$fdup->bindParam(":b", $bb);
						$fdup->bindParam(":c", $cb);

					

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
				$stmt->bindParam(":l", $lb);
				$stmt->bindParam(":m", $mb);
				$stmt->bindParam(":n", $nb);
				$stmt->bindParam(":o", $ob);

				$stmt->bindParam(":p", $pb);
				$stmt->bindParam(":q", $qb);
				$stmt->bindParam(":r", $rb);
				$stmt->bindParam(":s", $sb);
				$stmt->bindParam(":t", $tb);
				$stmt->bindParam(":u", $ub);
				$stmt->bindParam(":v", $vb);
				$stmt->bindParam(":w", $wb);
				$stmt->bindParam(":x", $xb);
				$stmt->bindParam(":y", $yb);
				$stmt->bindParam(":z", $zb);
				$stmt->bindParam(":aa", $a);
				$stmt->bindParam(":bb", $b);
			

	
				
			

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