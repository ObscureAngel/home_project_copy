<?php
//require_once '../connect_pdo.php';
session_start();
require_once 'connectors/GetRequest.class.php';
require_once 'connectors/AddRequest.class.php';
$bddSelect = new GetRequest("PDO");
?>
<!DOCTYPE html>
<html>
	
	<head>
<?php
require_once 'head.php';
if (!isset($_SESSION['user'])) {
	@session_destroy();
	header("Location: login.php");
} else {
	if (isset($_POST['ajouter'])) {
		$newFilm = array();
		
		if ($_POST['subtitle'] == -1) {
			$newFilm['subtitle'] = "null";
		} else {
			$newFilm['subtitle'] = $_POST['subtitle'];
		}
		
		if ($_POST['quality'] == -1) {
			$newFilm['quality'] = "null";
		} else {
			$newFilm['quality'] = $_POST['quality'];
		}
		
		$newFilm['title'] = $_POST['title'];
		$newFilm['duration'] = $_POST['duration'];
		$newFilm['type'] = $_POST['typeFilm'];
		$newFilm['category'] = $_POST['category'];
		$newFilm['audio'] = $_POST['audio'];
		$newFilm['entry'] = date('Y-m-D');
		//var_dump($newFilm);
		
		$add = new AddRequest("PDO");
		try {
			$add->addFilm($newFilm);
			header("Location: index.php");
		} catch (Exception $e) {
			echo "
			 <script type=\"text/javascript\">
			 alert('Erreur : ".$e->getMessage()."');
			 </script>
			 ";
		}
	}
?>
	</head>
	
	<body onbeforeunload="areYouSure();">
		
		<header>
			<h1 class="title" onclick="document.location='index.php'">Mediapedia</h1>
			<div class="navigation">
				<nav class="li-vertical">
					<ul style="list-style-type: none;">
						<?php 
						require 'pop-left-menu.php';
						?>
						<li><a href="index.php">Retour &agrave; l'accueil</a></li>
						<li><a href="searchFilm.php">Rechercher un film</a></li>
					</ul>
				</nav>
			</div>
		</header>
	
		<form name="ajoutFilm" action="ajoutFilm.php" method="post">
			<fieldset>
				<legend>Ajouter un film</legend>
				
				<label for="category">Genre du film : </label>
				<select id="category" name="category" required>
					<option disabled selected></option>
					<?php
					foreach ($bddSelect->getCategory() as $category) {
						echo '<option value="'.$category['categoryCode'].'">'.$category['categoryLabel'].'</option>
				';
					}
					?>
				</select>
				<br>
				
				<label for="typeFilm">Type de film : </label>
				<select id="typeFilm" name="typeFilm" required>
					<option disabled selected></option>
					<?php
					foreach ($bddSelect->getVideoType() as $type) {
						echo '<option value="'.$type['typeCode'].'">'.$type['typeLabel'].'</option>
				';
					}
					?>
				</select>
				<br>
				
				<label for="audio">Langue audio : </label>
				<select id="audio" name="audio" required>
					<option disabled selected></option>
					<?php
					foreach ($bddSelect->getAudio() as $audio) {
						echo '<option value="'.$audio['audioCode'].'">'.$audio['audioLabel'].'</option>
				';
					}
					?>
				</select>
				<br>
				
				<label for="subtitle">Langue des sous-titres du film : </label>
				<select name="subtitle" id="subtitle" required>
					<option disabled selected></option>
					<option value="-1">Aucun</option>
					<?php
					foreach ($bddSelect->getSubtitle() as $subtitle) {
						echo '<option value="'.$subtitle['subtitleCode'].'"> '.$subtitle['subtitleLabel'].'</option>
				';
					}
					?>
				</select>
				<br>
				
				<label for="quality">Qualit&eacute; vid&eacute;o du film : </label>
				<select name="quality" id="quality" required>
					<option disabled selected></option>
					<option value="-1">Inconnue ou double</option>
					<?php
					foreach ($bddSelect->getQuality() as $quality) {
						echo '<option value="'.$quality['qualityCode'].'"> '.$quality['qualityLabel'].'</option>
				';
					}
					?>
				</select>
				<br>
				
				<label for="title">Titre du film : </label>
				<input type="text" name="title" id="title" maxlength="60" required>
				<br>
				
				<label for="duration">Dur&eacute;e du film : </label>
				<input type="number" name="duration" id="duration" min="1" max="999" required>
			</fieldset>
			
			<input type="submit" class="envoi" name="ajouter" id="ajouter" value="Ajouter">
		</form>
		
		<script type="text/javascript">
			function areYouSure() {
				if (!confirm('T\'es sur ?')) {
					window.stop();
				}
			}
		</script>
		
	</body>
	
<?php 
}
?>
	
</html>