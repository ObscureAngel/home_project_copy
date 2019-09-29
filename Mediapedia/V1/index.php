<!DOCTYPE HTML>
<?php
session_start();
//require_once 'connectors/AddRequest.class.php';
//$add = new AddRequest("PDO");

?>
<html>
	
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
						<li><a href="../">Retour sur HOME</a></li>
						<li><a href="searchFilm.php">Rechercher un film</a></li>
					</ul>
				</nav>
			</div>
		</header>
		
		<nav class="li-horizontal">
			<ul style="list-style-type: none;">
				<li><a href="searchFilm.php">Film</a></li>
				<li><a href="#">Livres</a></li>
				<li><a href="#">Musiques</a></li>
			</ul>
		</nav>
		
		<article class="container">
			<h1>Articles récents</h1>
			
			<div class="identite">
			</div>
		</article>
		
		<footer>
			
		</footer>
		
	</body>
</html>