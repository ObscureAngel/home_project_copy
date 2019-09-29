<?php
session_start();

require_once 'scripts/connect_pdo.php';

/* // Compteur d'IP connectée
$dnns = "SELECT count(ip) as nb FROM cpt_connectes WHERE ip=".$_SERVER['remote_addr'];
mysqli_query($bdd,$dnns) or die(mysql_error());

echo $_SERVER['remote_addr'];
echo 'test1';
if($dnns['nb']>0)
{
    $sql = "UPDATE cpt_connectes SET timestamp = '".time()."' WHERE ip=".$_SERVER['remote_addr'];
	// mysqli_query($bdd,$sql) or die(mysql_error());
	echo 'test2';
}
else
{
	// $sql = "INSERT INTO cpt_connectes (ip, timestamp) VALUES ('".$_SERVER['remote_addr']."', '".time()."' )";
	// mysqli_query($bdd,$sql) or die(mysql_error()); // PROBLEM !!!
}
$times_m_5mins = time()-(60*5);

// $sql = "DELETE * FROM cpt_connectes WHERE timestamp < ".$times_m_5mins;
// mysqli_query($bdd,$sql) or die(mysql_error()); // PROBLEM !!!
	
$dnns2 = "SELECT count(ip) as nb FROM cpt_connectes";
// mysqli_query($bdd,$dnns2) or die(mysql_error());

echo 'test3';
// echo '<p>Il y a actuellement <strong>'.$dnns2['nb'].'</strong> connecté.</p>'; */


// Compteur de visites
if(file_exists('txt/compteur_visites.txt'))
{
        $compteur_f = fopen('txt/compteur_visites.txt', 'r+');
        $compte = fgets($compteur_f);
}
else
{
        $compteur_f = fopen('txt/compteur_visites.txt', 'a+');
        $compte = 0;
}
if(!isset($_SESSION['compteur_de_visite']))
{
        $_SESSION['compteur_de_visite'] = 'visite';
        $compte++;
        fseek($compteur_f, 0);
        fputs($compteur_f, $compte);
}
fclose($compteur_f);

include "lang/decide_lang.php";

?>

<!DOCTYPE html>

<html>

	<head>
		<?php include "part/head.php"; ?>
		<script>
			function language() {
				var lang;
				lang = document.getElementById("lang").value;
				if (lang == "en") {
					document.location.href="index.php?lang=en";
				} else if (lang == "fr") {
					document.location.href="index.php?lang=fr";
				} else if (lang == "de") {
					document.location.href="index.php?lang=de";
				}
			}
		</script>
	</head>
	
	<body background="img/background.png" id="home">
		
		<div id="navPanel">
			<img src="img/tires_menu.png" alt="Checking your connection" id="tires"/>
			<a href="contact.php"> Contact me ! </a>
		</div>
			
		<header style="width : 700px;">
			<p style="margin-top : auto; margin-bottom : auto;"><?php echo TXT_INDEX_HEADER; ?></p>
		</header>
		
		<article style="width : 700px;">			
			<select name="lang" id="lang">
				<option value="en" selected>English</option>
				<option value="fr">Français</option>
				<option value="de">Deutsch</option>
			</select>
			<button type="button" onclick="language();"><?php echo TXT_INDEX_SELECT_LANG; ?></button>
			<br />
			
			<br />
			<img src="img/img_center.png" class="img_menu"/>
			<br />
			<br />
			
			<?php /*include("part/wip.php");*/ ?>
			
			<form method="post" name="start" action="scripts/redirect.php?lang=<?php
			if (isset($_GET['lang'])) { 
				echo $_GET['lang'];
			} else if (isset($_GET['lang']) == false) {
				echo "en";
			} ?>">

				<label><?php echo TXT_INDEX_START; ?></label>
						<input type="radio" value="start" name="resumeOrStart">
				<br />
				<br />

				<label><?php echo TXT_INDEX_RESUME; ?></label>
					<input type="radio" checked value="resume" name="resumeOrStart">
				<br />
				
				<?php // requete mysqli
				
				$select = "SELECT * FROM joueurs";
				$result = $db->query($select); 
				?>
				
				<label for="pseudo"><?php echo TXT_INDEX_USER; ?></label>
					<select id="pseudo" name="pseudo">
				<?php
					while ($data = $result->fetchObject()) {
						?>
						<option value="<?php echo $data->ID;?>"><?php echo $data->Pseudo;?></option>
						<?php
					}
				?>
				</select>
				<label><?php echo TXT_INDEX_PASS; ?></label>
					<input type="password" name="password">
				<br />
				<br />	
				<input type="submit" id="submit" value="<?php echo TXT_INDEX_SUBMIT; ?>" />
				
			</form>
			
			<p><strong><?php echo $compte; ?></strong><?php echo TXT_INDEX_VISIT; ?></p>
			
		</article>
		
		<footer style="width : 700px;">
			<a href="../">Back to HOME</a>
			<?php require 'part/footer.php'; ?>
		</footer>
		
	</body>
	
</html>