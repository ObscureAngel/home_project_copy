<?php

session_start();

require_once 'scripts/connect_pdo.php';

?>
<!DOCTYPE html>
<html>

	<head>
		<?php include("part/head.php");
		//include "scripts/verifyLogin.php";

/*if (isset($_GET['id']) == false) {
	//header('error.php');
}*/

/*if (isset($_GET['id']) == false) {
	header('scripts/verifyLogin.php');
} else {*/
	if (isset($_SESSION['Pseudo_ID']) == false) {
		$_SESSION['Pseudo_ID'] = $_GET['id'];
	}
//}
	
$select = "SELECT * FROM joueurs WHERE ID = ".$_SESSION['Pseudo_ID'];
$result = $db->query($select);
$data = $result->fetchObject();

include "lang/decide_lang.php";

?>

		<script>
			function disconnect() {
				var connect;
				connect = document.getElementById("connect").value;
				if (connect == 0) {
					<?php session_destroy(); ?>
					document.location.href="index.php";
				}
			}
			function race() {
				var circuit;
				circuit = document.getElementById("circuit").value;
				if (circuit == 1) {
					<?php $sql = "UPDATE joueurs SET Circuit = 'simring' WHERE ID = ".$_SESSION['Pseudo_ID']; ?>
					document.location.href="game_page.php?id=<?php echo $_SESSION['Pseudo_ID']?>";
				}
			}
		</script>
	</head>

	<body background="img/background.png">
	
		<?php include "scripts/verifyLogin.php"; ?>
	
		<button style="position : right;" type="button" id="connect" value="0" onclick="disconnect();"><?php echo TXT_ACCOUNT_DISCONNECT; ?></button>
	
		<header style="width : 1000px;">
			<p><?php echo $data->Pseudo; ?><?php echo TXT_ACCOUNT_PAGE; ?></p> <?php // Fonction PHP pour l'emplacement de la constante TXT_ACCOUNT_PAGE ?>
		</header>
		
		<article style="width : 1000px;">
			
			<div class="inline" style="width : 480px;">
				<h1><?php echo TXT_ACCOUNT_CIRCUIT; ?></h1>
				<p>Simring : <button type="button" id="circuit" value="1" onclick="race();"><?php echo TXT_ACCOUNT_GO; ?> !</button></p>
			</div>
			
			<div class="inline" style="width : 480px;">
				<h1><?php echo TXT_ACCOUNT_STATISTICS; ?></h1>
				<p><?php echo TXT_ACCOUNT_WINS; ?> : <?php //echo $data->Wins; ?></p>
				<p><?php echo TXT_ACCOUNT_LOSES; ?> : <?php //echo $data->Loses; ?></p>
			</div>
			
		</article>
		
		<footer style="width : 1000px">
			<?php include("part/footer.php"); ?>
		</footer>
		
	</body>
	
</html>