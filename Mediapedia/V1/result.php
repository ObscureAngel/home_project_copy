<?php
session_start();
require_once '../connectors/GetRequest.class.php';
$selectBdd = new GetRequest("PDO");
?>
<!DOCTYPE html>
<html>
	
	<head>
		<?php require_once 'head.php';?>
	</head>
	
	<body>
		
		<header>
			<h1 class="title" onclick="document.location='searchFilm.php'">Mediapedia</h1>
			<div class="navigation">
				<nav class="li-vertical">
					<ul style="list-style-type: none;">
						<?php 
						require 'pop-left-menu.php';
						?>
						<li><a href="searchFilm.php">Retour</a></li>
					</ul>
				</nav>
			</div>
		</header>
		
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
				<tbody>
					<?php
					if (isset($_POST)) {
						$search = array(
							"filter" => $_POST['type'],
							"value" => $_POST['value'],
						);
					} else if (isset($_GET)) {
						$search = array(
							"filter" => $_GET['type'],
							"value" => $_GET['value'],
						);
					}
					
					$result = $selectBdd->getListFromSearch($search);
					
					foreach ($result as $row) {
						echo '<tr>';
							echo '<td>'.$row['type'].'</td>';
							
							if (!isset($_SESSION['user'])) {
								echo '<td><a href="#" onclick="errLogin()">'.$row['title'].'</a></td>';
							} else {
								echo '<td><a href="voirFilm.php?ref_video='.$row['type_ref'].'_'.$row['movie'].'&type='.$search['filter'].'&value='.$search['value'].'">'.$row['title'].'</a></td>';
							}
							
							echo '<td>'.$row['category'].'</td>';
							echo '<td>'.$row['audio'].'</td>';
							echo '<td>'.$row['subtitle'].'</td>';
							echo '<td>'.$row['quality'].'</td>';
							echo '<td>'.$row['duration'].' minutes</td>';
						echo '</tr>';
					}
					?>
				</tbody>
			</table>
		</div>
		<script type="text/javascript">
			function errLogin() {
				if(confirm('Veuillez vous connecter pour consulter la fiche du film.\n(En cliquant sur "Ok", vous allez être redirigé vers la page de connexion)')) {
					document.location.href='login.php';
				}
			}
		</script>
	</body>
</html>