<?php
if (isset($_SESSION['user'])) {
	echo '<li><span id="user">Bienvenue '.$_SESSION['user'].'</span></li>
	<br>';
	
	if ($_SESSION['user'] == 'admin') {
		echo '<li><a href="ajoutFilm.php">Ajouter un film</a></li>';
		echo '<li><a href="ajoutPersFilm.php">Ajouter une personne</a></li>';
	}
	echo '<li><a href="logout.php">Se d&eacute;connecter</a></li>
	<br>';
} else {
	echo '<li><a onclick="javascript:window.open(\'login.php\', \'_self\');">Se connecter</a></li>
	<br>';
}

?>