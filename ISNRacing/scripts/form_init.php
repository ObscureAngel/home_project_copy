<?php
session_start();

if (isset($_GET['form']) == true) {
if ($_GET['form'] == 1) { // envoi des données apres le formulaire

	if(isset($_POST['pseudo'])) {
				
		$pseudo = $_POST['pseudo'];
		$couleur = $_POST['couleur'];
		$password = $_POST['password'];
		$langue = $_POST['langue'];
	
	}
	
	include "connec_mysqli.php";
	

	// On ajoute un joueur
	$sql = "INSERT INTO joueurs (Pseudo, Password, Couleur, Langue, Tours, Position, Tires, ChangeTires, Fuel, AddFuel, LastUpdate, Start, End) VALUES ('".$pseudo."', '".$password."', '".$couleur."', '".$langue."', 0, 0, 100, 'no', 100, 0, ".time().",".time().", 0)";
	mysqli_query($bdd,$sql) or die(mysql_error());
		
	header('Location: ../index.php');
		
}

}

include("../lang/decide_lang.php");

?>

<!DOCTYPE html>
<html>
	
	<head>
		<?php include("../part/head.php"); ?>
		<script>
			function language() {
				lang = document.getElementById("lang").value;
				if (lang == "en") {
					document.location.href="../index.php?lang=en";
				} else if (lang == "fr") {
					document.location.href="../index.php?lang=fr";
				}
			}
		</script>
	</head>
	
	<body background="../img/background.png">
		
		<header style="width : 500px;">
			<p class="common"><?php echo TXT_INIT_HEADER; ?></p>
		</header>
		
		<article style="width : 500px;">
		
		<form method="post" name="number" action="form_init.php?form=1"> 
			<br />
				<label for="pseudo"><?php echo TXT_INIT_PLAYER; ?></label>
					<input type="text" name="pseudo" />
				<br />
				<br />
				<label for="password"><?php echo TXT_INIT_PASS; ?></label>
					<input type="password" name="password" />
				<br />
				<br />
				<label for="couleur"><?php echo TXT_INIT_COLOR; ?></label>
					<select name="couleur" >
						<option value="red"><?php echo TXT_INIT_RED; ?></option>
						<option value="yellow"><?php echo TXT_INIT_YELLOW; ?></option>
						<option value="green"><?php echo TXT_INIT_GREEN; ?></option>
						<option value="blue"><?php echo TXT_INIT_BLUE; ?></option>
						<option value="violet"><?php echo TXT_INIT_VIOLET; ?></option> 
					</select> 
				<br />
				<br />
				<label for="langue"><?php echo TXT_INIT_LANG; ?></label>
					<select name="langue">
						<option value="en" selected>English</option>
						<option value="fr">Français</option>
						<option value="de">Deutsch</option>
					</select>
				<br />
				<br />
			<br />
			<input type=submit value="<?php echo TXT_INIT_SUBMIT; ?>" />
		</form>		

		
		</article>
		
		<footer style="width : 500px;">
			<?php include("../part/footer.php"); ?>
		</footer>
		
	</body>
</html>