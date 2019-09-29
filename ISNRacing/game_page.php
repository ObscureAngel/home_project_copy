<?php

session_start();

require_once 'scripts/connect_pdo.php';

if (isset($_GET['id'])) {
	$_SESSION['Pseudo_ID'] = $_GET['id'];
}
	
$select = "SELECT * FROM `joueurs` WHERE ID = ".$_GET['id'];
$ressult = $db->query($select);
$data = $result->fetchObject();

include("lang/decide_lang.php");

?>
<!DOCTYPE html>
<html> 
	<head>
		<?php include("part/head.php"); ?>
		
		<?php 
		if ($data->Tours >= 10) {
			$data->Tours = 0;
			$data->Wins = $data->Wins + 1;
			$data->Position = 0;
			$data->Fuel = 100;
			$data->Tires = 100;
			$data->AddFuel = 0;
			$data->ChangeTires = "no";
			$update = "UPDATE joueurs SET 
									Tours = ".$data->Tours.",
									Position = ".$data->Position.",
									Wins = ".$data->Wins.",
									Tires = ".$data->Tires.",
									ChangeTires = ".$data->ChangeTires.",
									Fuel = ".$data->Fuel.", 
									AddFuel = ".$data->AddFuel.", 
									
									WHERE ID = ".$_SESSION['Pseudo_ID'];
			$result = $db->exec($update);
			?>
			<script>
				alert('<?php echo TXT_GAME_WIN; ?>');
				document.location.href="account_page.php?id=<?php echo $_SESSION['Pseudo_ID']?>";
			</script>
			<?php
		}

		if ($data['Fuel'] <= 0 OR $data['Tires'] <= 0) {
			$data['Tours'] = 0;
			$data['Loses'] = $data['Loses'] + 1;
			$data['Position'] = 0;
			$data['Fuel'] = 100;
			$data['Tires'] = 100;
			$data["AddFuel"] = 0;
			$data['ChangeTires'] = "no";
			$sql = "UPDATE joueurs SET 
				Tours = ".$data["Tours"].",
				Position = ".$data["Position"].",
				Losess = ".$data['Loses'].",
				Tires = ".$data['Tires'].",
				ChangeTires = ".$data['ChangeTires'].",
				Fuel = ".$data["Fuel"].", 
				AddFuel = ".$data["AddFuel"].", 
				
				WHERE ID = ".$_SESSION['Pseudo_ID'];
			$res = mysqli_query($bdd,$sql) or die(mysql_error());
			?>
			<script>
				alert('<?php echo TXT_GAME_LOSE; ?>');
				document.location.href="account_page.php?id=<?php echo $_SESSION['Pseudo_ID']?>";
			</script>
			<?php
		}
		?>
	</head>
	
	<body background="img/background.png">
<?php

include "scripts/process.php";

include "pos_car.php";

include "change_car.php";

/* $_SESSION['pseudo'] = $data['Pseudo'];
$_SESSION['fuel'] = $data['Fuel'];
$_SESSION['pos'] = $data['Position'];
$_SESSION['tours'] = $data['Tours'];
$_SESSION['addFuel'] = $data['AddFuel'];
*/
//var_dump($data);

?>

	
		<header style="width : 1050px; height : 48px;">
			<p style="text-align:center;" class="common"><img src="img/race_flag.png" alt="Drapeau1"/><?php echo TXT_GAME_HEADER.$data['Pseudo']; ?> <img src="img/race_flag.png" alt="Drapeau1"/></p>
		</header>

		<article style="width : 1050px;">
			<div class="inline" style="width:300px; background-color : rgba(100,100,100,1);">
			
				<h1><?php echo TXT_GAME_MENU; ?></h1>
				
				<h3><?php echo TXT_GAME_INFO; ?></h3>
				
					<p><?php echo TXT_GAME_LAPS.$data['Tours']; ?></p>
					<p><?php echo TXT_GAME_LOCATE.$data['Position']; ?></p>
					<p><?php echo TXT_GAME_REMAIN_TIRES.$data['Tires']; ?>%</p>
					<p><?php echo TXT_GAME_REMAIN_FUEL.$data['Fuel']; ?>%</p>
					<h3><?php echo TXT_GAME_NEXT_LAP; ?></h3>
				<form method="post" name="command" action="pit-stop.php">
					<p><?php echo TXT_GAME_CHANGE_TIRES; ?><input type="checkbox" name="retires" value="yes"
					<?php
						if ($data['ChangeTires'] == "yes") {
							echo " checked";
						}
					?>
					/></p>
					<label for="refuel"><?php echo TXT_GAME_PIT_REFUEL; ?></label>
					<select name="refuel" id="refuel">
						<option value="0"<?php
						if ($data['AddFuel'] == "0") {
							echo " selected";
						}
						?> >0 %</option>
						<option value="25"<?php
						if ($data['AddFuel'] == "25") {
							echo " selected";
						}
						?> >25 %</option>
						<option value="50"<?php
						if ($data['AddFuel'] == "50") {
							echo " selected";
						}
						?> >50 %</option>
						<option value="75"<?php
						if ($data['AddFuel'] == "75") {
							echo " selected";
						}
						?> >75 %</option>
						<option value="95"<?php
						if ($data['AddFuel'] == "95") {
							echo " selected";
						}
						?> >95 %</option>
					</select>
					<br />
					<input type="submit" value="<?php echo TXT_GAME_PIT_STOP; ?>"/>
				</form>
			</div>
			
			<div class="inline" style="width: 700px; background-color : rgba(256,256,256,1);">
				<img src="img/circuit/<?php echo $data['Circuit']; ?>.png"/>	
				<img src="img/car/<?php echo $color; ?>/<?php echo $orientation; ?>.png" class="img_voiture" style="left : <?php echo $pos_x; ?>px; top : <?php echo $pos_y; ?>px;"/> 
			</div>
		</article>
		
		<footer style="width : 1050px;">
			<?php include("part/footer.php"); ?>
		</footer>
		
	</body>
	
</html>