<!DOCTYPE HTML>
<?php 
//require_once 'connect_pdo.php';
//session_start();
?>
<html>

	<head>
		<title>HOME</title>
		<meta http-equiv="content-type" content="text/html" charset="iso-8859-1">
		<meta name="author" content="ObscureAngel">
		<link href="img/home_favicon.ico" rel="icon" type="image/x-icon" />
		<link href="style/bootstrap.css" rel="stylesheet" type="text/css" />
<?php

/*if (isset($_SESSION['user'])) {
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
}*/

?>

	</head>

	<body>
	
		<header style="width: auto; height: 50px; background-color: grey; padding-top:10px; text-align: right;">
			<form action="login.php" method="post">
				<table style="text-align: right; margin-right: 10px; margin-left:auto;">
					<tr>
						<td><label for="user">Pseudonyme : </label></td>
						<td>&nbsp;</td>
						<td><input type="text" name="user" id="user" required></td>
						<td>&nbsp;</td>
						<td><label for="pass">Mot de passe : </label></td>
						<td>&nbsp;</td>
						<td><input type="password" name="pass" id="pass" required></td>
						<td>&nbsp;</td>
						<td><button type="submit" class="envoi" name="login">Me connecter</button></td>
					</tr>
				</table>
			</form>
		</header>
		
		<article>
			<h1>Projet HOME</h1>
			<div style="width: 350px; text-align: justify;">
				<cite>Int&eacute;grer une gestion des sessions cross-service (ex: un utilisateur connect&eacute; sur Mediapedia
				n'a pas besoin de se reconnecter sur ISNRacing ou Cryptocode, et apparition d'un bandeau de connexion sur
				HOME).</cite>
			</div>
			<br>
			<a href="Cryptocode/">Cryptocode</a>
			<a href="ISNRacing/">ISNRacing</a>
			<a href="Mediapedia/">Mediapedia</a>
		</article>
		
		<footer>
			
		</footer>
		
		<script type="text/javascript">
			document.getElementById('user').focus;
		</script>
		
	</body>

</html>