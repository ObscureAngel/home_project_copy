<!DOCTYPE HTML>
<?php
session_start();
require_once 'connectors/GetRequest.class.php';
$bddSelect = new GetRequest("PDO");
if (!isset($_GET['type'])) {
	$recherche = 1;
	$_GET['value'] = "";
} else {
	switch ($_GET['type']) {
		case 'genre':
			$recherche = 1;
			break;
		
		case 'audio':
			$recherche = 2;
			break;
		
		case 'subtitle':
			$recherche = 3;
			break;
		
		case 'quality':
			$recherche = 4;
			break;
			
		default:
			$recherche = 1;
			break;
	}
}
?>
<html data-ng-app="recherche">
	
	<head>
		<?php require_once 'head.php';?>
	</head>
	
	<body>
		
		<header>
			<h1 class="title" onclick="document.location='index.php'">Mediapedia</h1>
			<div class="navigation">
				<nav class="li-vertical">
					<ul style="list-style-type: none;">
						<?php 
						require 'pop-left-menu.php';
						?>
						<li><a href="index.php">Retour</a></li>
					</ul>
				</nav>
			</div>
		</header>
		
		<nav class="li-horizontal" data-ng-init="recherche = <?php echo $recherche; ?>">
			<ul style="list-style-type: none;">
				<li><a href="#" data-ng-click="recherche = 1" data-ng-class="{active:recherche==1}">Genre</a></li>
				<li><a href="#" data-ng-click="recherche = 2" data-ng-class="{active:recherche==2}">Audio</a></li>
				<li><a href="#" data-ng-click="recherche = 3" data-ng-class="{active:recherche==3}">Sous-Titres</a></li>
				<li><a href="#" data-ng-click="recherche = 4" data-ng-class="{active:recherche==4}">Qualit&eacute;</a></li>
			</ul>
		</nav>
		
		<article>
			<div id="searchGenre">
			
				<form method="get" action="<?php echo $_SERVER['PHP_SELF']; ?>" id="genre" data-ng-show="recherche === 1">
					<fieldset class="search_form" class="form-group">
						<label for="genre">Genre du film</label>
						<br>
						<select name="value" id="genre" required>
							<option disabled selected>Choisissez un genre</option>
							<?php
							foreach ($bddSelect->getCategory() as $category) {
								if ($category['categoryCode'] == $_GET['value'] && $_GET['type'] == "genre") {
									echo '<option value="'.$category['categoryCode'].'" selected> '.$category['categoryLabel'].'</option>
				';
								} else {
									echo '<option value="'.$category['categoryCode'].'"> '.$category['categoryLabel'].'</option>
				';
								}
								
							}
							?>
						</select>
					</fieldset>
					<input type="hidden" name="type" value="genre">
					<br /><br />
					<input type="submit" value="Rechercher">
				</form>
				
				<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="get" id="audio" data-ng-show="recherche === 2">
					<fieldset class="search_form">
						<label for="audio">Langue audio du film</label>
						<br>
						<select name="value" id="audio" required>
							<option disabled selected>Choisissez une langue</option>
							<?php
							foreach ($bddSelect->getAudio() as $audio) {
								if ($audio['audioCode'] == $_GET['value'] && $_GET['type'] == "audio") {
									echo '<option value="'.$audio['audioCode'].'" selected> '.$audio['audioLabel'].'</option>
				';
								} else {
									echo '<option value="'.$audio['audioCode'].'"> '.$audio['audioLabel'].'</option>
				';
								}
								
							}
							?>
						</select>
					</fieldset>
					<input type="hidden" name="type" value="audio">
					<br /><br />
					<input type="submit" value="Rechercher">
				</form>
				
				<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="get" id="subtitle" data-ng-show="recherche === 3">
					<fieldset class="search_form">
						<label for="subtitle">Langue des sous-titres du film</label>
						<br>
						<select name="value" id="subtitle" required>
							<option disabled selected>Choisissez une langue</option>
							<?php
							foreach ($bddSelect->getSubtitle() as $subtitle) {
								if ($subtitle['subtitleCode'] == $_GET['value'] && $_GET['type'] == "subtitle") {
									echo '<option value="'.$subtitle['subtitleCode'].'" selected> '.$subtitle['subtitleLabel'].'</option>
				';
								} else {
									echo '<option value="'.$subtitle['subtitleCode'].'"> '.$subtitle['subtitleLabel'].'</option>
				';
								}
								
							}
							?>
						</select>
					</fieldset>
					<input type="hidden" name="type" value="subtitle">
					<br /><br />
					<input type="submit" value="Rechercher">
				</form>
				
				<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="get" id="quality" data-ng-show="recherche === 4">
					<fieldset class="search_form">
						<label for="quality">Qualit&eacute; vid&eacute;o du film</label>
						<br>
						<select name="value" id="quality" required>
							<option disabled selected>Choisissez une qualit&eacute;</option>
							<?php
							foreach ($bddSelect->getQuality() as $quality) {
								if ($quality['qualityCode'] == $_GET['value'] && $_GET['type'] == "quality") {
									echo '<option value="'.$quality['qualityCode'].'" selected> '.$quality['qualityLabel'].'</option>
					';
								} else {
									echo '<option value="'.$quality['qualityCode'].'"> '.$quality['qualityLabel'].'</option>
					';
								}
							}
							?>
						</select>
					</fieldset>
					<input type="hidden" name="type" value="quality">
					<br /><br />
					<input type="submit" value="Rechercher">
				</form>
				
			</div>
		</article>
		
		<?php 
		if (isset($_POST['type']) || isset($_GET['type'])) {
		?>
		<article>
			<div id="head" class="table_resultat">
				<table border="1">
					<tr>
						<th style="width: 120px;">Type</th>
						<th style="width: 400px;">Titre</th>
						<th style="width: 125px;">Genre</th>
						<th style="width: 125px;">Audio</th>
						<th style="width: 125px;">Sous-titres</th>
						<th style="width: 125px;">Qualit&eacute;</th>
						<th style="width: 100px;">Dur&eacute;e</th>
					</tr>
					
					<?php
					 if (isset($_GET['type'])) {
						$search = array(
							"filter" => $_GET['type'],
							"value" => $_GET['value'],
						);
					} else if (isset($_POST['type'])) {
						$search = array(
							"filter" => $_POST['type'],
							"value" => $_POST['value'],
						);
					}
					
					$result = $bddSelect->getListFromSearch($search);
					
					foreach ($result as $row) {
						echo '<tr>';
							echo '<td>'.$row['type'].'</td>';
							
							/*if (!isset($_SESSION['user'])) {
								echo '<td><a href="#" onclick="errLogin()">'.$row['title'].'</a></td>';
							} else {*/
								echo '<td><a href="voirFilm.php?ref_video='.$row['type_ref'].'_'.$row['movie'].'&type='.$search['filter'].'&value='.$search['value'].'">'.$row['title'].'</a></td>';
							//}
							
							echo '<td>'.$row['category'].'</td>';
							echo '<td>'.$row['audio'].'</td>';
							echo '<td>'.$row['subtitle'].'</td>';
							echo '<td>'.$row['quality'].'</td>';
							echo '<td>'.$row['duration'].' minutes</td>';
						echo '</tr>';
					}
					?>
				</table>
			</div>
		</article>
		<?php 
		}
		?>
		
		<footer>
			
		</footer>
		
		<script type="text/javascript">
			function errLogin() {
				if(confirm('Veuillez vous connecter pour consulter la fiche du film.\n(En cliquant sur "Ok", vous allez être redirigé vers la page de connexion)')) {
					document.location.href='login.php';
				}
			}
		</script>
	</body>
</html>