<?php
//session_start();

//Variables
	$maxPos = 20; // Nombre de position par tour de circuit
	$tempsTour = 10; // Durée d'un tour de jeu (recalculs de la position, carburant,...)
	$maxTour = 10; // Nbr de tours avant la fin
	$conso = 1;
	$consoPneu = 0.5; //Usure des pneus
	
	$vitesse = 1;
	// $vitesseMax = 100;
	// $acceleration = 15;
	//  $deceleration = -15;
	
	$timeOut = 30*1; // secondes
	
	date_default_timezone_set('Europe/Paris');
	

	// Recuperation SQL
	//include "scripts/connec_mysqli.php";
	$sql = "SELECT * FROM joueurs WHERE ID = ".$_SESSION['Pseudo_ID'];
	$result = mysqli_query($bdd,$sql) or die(mysql_error());

	if ($data = $result->fetch_assoc()) {
	
	// if ($data["End"] == 0) {
		
		
		// Calcul du temps écoulé
		$deltaTime = time() - $data['LastUpdate'];
		
		if ($deltaTime > $timeOut) { // Si la derniere connection est trop lointaine...
			$deltaTime = $timeOut;
			
			$saveTime = $data['LastUpdate'] + $deltaTime;
			
			?><article> <?php echo TXT_GAME_TIME_OUT .date('d/m/Y', $saveTime). TXT_GAME_TIME_OUT_TO .date('H:i:s', $saveTime);?></article><br /><?php
		}
		
		
		
		// Calcul de la vitesse
		/* $DeltaSpeed = $data['FormSpeed'] - $data['Speed'];
		if ($DeltaSpeed > 0 ) { // On accelere!
			if($DeltaSpeed > $acceleration ) { $DeltaSpeed = $acceleration;} //Mais pas trop...
			
			$data['Speed'] = $data['Speed'] + $DeltaSpeed;
			
			
		} else if ($DeltaSpeed < 0 ) { //On ralentit!
			if($DeltaSpeed < $deceleration ) { $DeltaSpeed = $deceleration;} 
			
			$data['Speed'] = $data['Speed'] + $DeltaSpeed;
		} */
		
		// Enlever le fuel et mettre a jour la position.
		for($i=0; $i<$deltaTime; $i = $i+$tempsTour) {
			
			// Calcul de l'usure des pneus
			$data['Tires'] = $data['Tires'] - $consoPneu;
			
			// Consomation
				//$conso = (($DeltaSpeed - $deceleration)/2) * ($data['Speed']/100);
				$data["Fuel"] = $data["Fuel"] - $conso;
				
			// Calcul prochaine position
				//if($data["Fuel"] = 0) { // Panne d'essence!
					//$data["Fuel"] = 0;
					// $data["Speed"] = $deceleration;
				//}
				$data["Position"] = $data["Position"] + $vitesse; // $data['Speed']/50;
				
				
				
			// +1 Tour!
				while ($data["Position"] >= $maxPos) { 
					$data["Position"] = $data["Position"] - $maxPos;
					$data["Tours"]++;
					if ($data["Tours"] >= $maxTour) {
						$temps = time() - $data['Start'];
						
						$data["End"] = time();
						//$sql ="INSERT INTO Scores (Pseudo, Temps, Date) VALUES ('".$data['Pseudo']."', '".$temps."', '".$data["End"]."')";
						//mysqli_query($bdd,$sql) or die(mysql_error());
					}
			
					// Changement des pneus
					if ($data['ChangeTires'] == "yes") {
						$data['Tires'] = 100;
						$data['ChangeTires'] = "no";
					}
			
					if($data["AddFuel"] > 0) { // Si on a choisis de faire le plein.
						$data["Fuel"] = $data["Fuel"] + $data["AddFuel"];
						$data["AddFuel"] = 0;
						if($data["Fuel"]>100) {
							$data["Fuel"] = 100;
						}
					}
				}
			
		}
		
		// var_dump($data);
		
		//maj de la base de donnée
		$newTime = time() - ($deltaTime - $i);
		$sql = "UPDATE joueurs SET 
								Tours = '".$data["Tours"]."', 
								Position = '".$data["Position"]."',
								Wins = '".$data['Wins']."',
								Loses = '".$data['Loses']."',
								Tires = '".$data['Tires']."',
								ChangeTires = '".$data['ChangeTires']."',
								Fuel = '".$data["Fuel"]."', 
								AddFuel = '".$data["AddFuel"]."', 
								LastUpdate = '".$newTime."', 
								End = ".$data["End"].", 
								
								WHERE ID = ".$_SESSION['Pseudo_ID'];
		
		mysqli_query($bdd,$sql) or die(mysql_error());
		
	}
		//echo "<article>Fuel: ".$data["Fuel"]." Pos: ".$data["Position"]." Tours: ".$data["Tours"]."</article><br />";
	// }
?>

