<!DOCTYPE HTML>
<?php
error_reporting(E_ALL);
ini_set("display_errors",1);

session_start();
require_once 'connect_pdo.php';
?>
<html>
	
	<head>
		<?php require_once 'head.php';?>
	</head>
	
	<body>
	
<?php 
/*if (!isset($_SESSION['user'])) {
	@session_destroy();
	header("Location: login.php");
} else {*/
?>
		
		<header>
			<h1 class="title" onclick="document.location='searchFilm.php'">Mediapedia</h1>
			<div class="navigation">
				<nav class="li-vertical">
					<ul style="list-style-type: none;">
						<?php 
						require 'pop-left-menu.php';
						?>
						<li><a onclick="redirectResult()" href="#">Retour</a></li>
					</ul>
				</nav>
			</div>
		</header>
		
		<?php 
		$tab_ref = explode("_", $_GET['ref_video']);
		$select = "SELECT * FROM mov_film_serie
			LEFT JOIN mov_audio USING(code_audio)
			LEFT JOIN mov_subtitle USING(code_subtitle)
			LEFT JOIN mov_quality USING(code_quality)
			LEFT JOIN mov_genre USING(code_genre)
			WHERE ref_type = '".$tab_ref[0]."' AND ref_video = ".$tab_ref[1];
		$result = $db->query($select);
		$data = $result->fetchObject();
		if (empty($data->design_sub)) {
			$data->design_sub = "Aucune";
		}
		?>
		
		<fieldset class="identite">
			<legend>Description</legend>
			<table>
				<tr>
					<td>Titre : <?php echo trim($data->titre); ?></td>
					<td>Langue audio : <?php echo trim($data->design_audio); ?></td>
				</tr>
				<tr>
					<td>R&eacute;f&eacute;rence : <?php echo trim($data->ref_type)."-".$data->ref_video; ?></td>
					<td>Langue sous-titres : <?php echo trim($data->design_sub); ?></td>
				</tr>
			</table>
		</fieldset>

<?php 
//}
?>
		<form action="searchFilm.php" method="get" name="retourResult" style="background-color: rgba(0, 0, 0, 0);">
			<input type="hidden" name="type" value="<?php echo $_GET['type'];?>">
			<input type="hidden" name="value" value="<?php echo $_GET['value'];?>">
		</form>
		<script type="text/javascript">
			function redirectResult() {
				document.retourResult.submit();
			}
		</script>
	</body>
</html>