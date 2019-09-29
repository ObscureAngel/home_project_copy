<?php
require_once '../../connect_pdo.php';
session_start();
?>
<!DOCTYPE html>
<html>
	
	<head>
		<?php require_once 'head.php';?>
	</head>
	
<?php 
if (!isset($_SESSION['user'])) {
	@session_destroy();
	header("Location: login.php");
} else {
	//https://blog.niap3d.com/calendrier-javascript/
	//https://blog.niap3d.com/fr/24,10,news-69-Calendrier-javascript-gratuit-jsSimpleDatePickr-v2.html
	//https://blog.niap3d.com/download/jsSimpleDatePickr/jsSimpleDatePickrInit_exemple1.html
?>
	
	<body>
		
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
				<legend>Ajouter une personne</legend>
				<label>NOM* : </label>
				<input type="text" name="nomPers" placeholder="NOM" required />
				<br>
				
				<label for="dateNaissance">Date de naissance* : </label>
				<input type="date" id="dateNaissance" name="dateNaissance" placeholder="aaaa-mm-jj" required />
				<br>
				
				<label for="pays">Nationnalit&eacute;* : </label>
				<select name="pays" id="pays" required>
					<option disabled selected></option>
					<?php 
					$select = "SELECT * FROM mov_pays";
					$result = $db->query($select);
					while ($data = $result->fetchObject()) {
						echo '<option value="'.$data->code_pays.'">'.$data->libelle_pays.'</option>';
					}
					?>
				</select>
				<br>
				
				<label>Pr&eacute;nom* : </label>
				<input type="text" name="prenomPers" placeholder="Pr&eacute;nom" required />
				<br>
				
				<label for="dateDeces">Date de d&eacute;c&egrave;s : </label>
				<input type="date" id="dateDeces" name="dateDeces" placeholder="aaaa-mm-jj"/>
				
				
				
				
				
				<br><br>
				<span>* Champs obligatoires</span>
				<br>
			</fieldset>
			<br>
			<input type="submit" class="envoi" name="ajouter" id="ajouter" value="Ajouter">
		</form>
		<script type="text/javascript">
			//A décommenter plus tard, code fonctionnel
			/*window.onbeforeunload = function() {
				return "Vous allez quitter un formulaire d'ajout d'information(s).";
			};*/
		</script>
	</body>

<?php 
}
?>
	
</html>