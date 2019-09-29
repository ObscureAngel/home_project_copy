<!DOCTYPE HTML>
<?php 
require_once '../../connect_pdo.php';
session_start();
?>
<html>

	<head>
		<title>Mediapedia</title>
		<meta http-equiv="content-type" content="text/html" charset="utf-8">
		<meta name="author" content="ObscureAngel">
		<link href="" rel="icon" type="image/x-icon" />
		<link href="style2.css" rel="stylesheet" type="text/css" />
<?php

if (isset($_SESSION['user'])) {
	header("location: index.php");
}

if (isset($_POST['login'])) {
	$select = "SELECT username FROM mov_pers_inscrit WHERE username = '".$_POST['user']."'";
	$result = $db->query($select);
	$data = $result->fetchObject();
	
	if (!$data) {
		session_destroy();
		?>
		<script type="text/javascript">
			alert('Vous n\'avez aucun compte.\nVeuillez vous inscrire.')
			document.location.href='signin.php';
		</script>
		<?php
	} else {
		$_SESSION['user'] = $_POST['user'];
		header("location: index.php");
	}
}

?>

	</head>

	<body>
	
		<header>
			<h1 class="title" onclick="document.location='index.php'">Mediapedia</h1>
			<div class="navigation">
				<nav class="li-vertical">
					<ul style="list-style-type: none;">
						<li><a href="index.php">Retour &agrave; l'accueil</a></li>
						<li><a href="signin.php">S'inscrire</a></li>
					</ul>
				</nav>
			</div>
		</header>
		
		<form action="login.php" method="post">
			<table style="margin: auto auto;">
				<tr>
					<td><label for="user">Pseudonyme : </label></td>
					<td><input type="text" name="user" id="user" required></td>
				</tr>
				<tr>
					<td><label for="pass">Mot de passe : </label></td>
					<td><input type="password" name="pass" id="pass" required></td>
				</tr>
				<tr>
					<td colspan="2">&nbsp;</td>
				</tr>
				<tr>
					<td colspan="2"><button type="submit" class="envoi" name="login" style="margin: auto auto;">Me connecter</button></td>
				</tr>
			</table>
			
			<br><br>
			
		</form>
		
		<script type="text/javascript">
			window.onload = function() {
				document.getElementById('user').focus();
			}
		</script>
		
	</body>

</html>