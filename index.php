<!DOCTYPE HTML>
<?php
error_reporting(E_ALL);
ini_set("display_errors",1);

require_once 'connect_pdo.php';
session_start();
?>
<html>

	<head>
		<title>HOME</title>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<meta name="author" content="ObscureAngel">
		<link href="img/home_favicon.ico" rel="icon" type="image/x-icon" />
		<link href="bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
		<script type="text/javascript" src="bootstrap/js/bootstrap.min.js"></script>
		<!-- style type="text/css">
			body {
				z-index: 0;
			}
			header {
				z-index: 100;
				padding-top: 10px;
				/*text-align: right;*/
			}
			#login {
				text-align: right;
			}
			#login>table {
				/*display: initial;*/
				text-align: center;
				background-color: red;
			}
			#connectMenu {
				display: none;
			}
		</style -->
		<?php
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
			}
		}
		?>
	</head>

	<body>

		<header>
		<?php
		if (isset($_SESSION['user'])) {
			echo '<p>
				Bienvenue '.$_SESSION['user'].'
				<a href="logout.php">   D&eacute;connexion</a>
			</p>';
		} else {
		?>
			<div class="navbar navbar-fixed-top navbar-default">
				<div class="navbar-header">
					<a class="navbar-brand" href="#">HOME Project</a>
					<a class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
						<span class="glyphicon glyphicon-bar"></span>
						<span class="glyphicon glyphicon-bar"></span>
						<span class="glyphicon glyphicon-bar"></span>
					</a>
				</div>
				<div class="container">
					<div class="navbar-collapse collapse">
						<ul class="nav navbar-nav">
							<li class="active"><a href="#"><i class="glyphicon glyphicon-home icon-white"></i> Home</a></li>
							<li><a href="Cryptocode/">Cryptocode</a></li>
							<li><a href="ISNRacing/">ISNRacing</a></li>
							<li><a href="Mediapedia/V2/test_add_films.php">Mediapedia</a></li>
							<li class="dropdown">
								<a href="#" class="dropdown-toggle" data-toggle="dropdown">Dropdown <b class="caret"></b></a>
								<ul class="dropdown-menu" aria-labelledby="dLabel" role="menu">
									<li><a href="#">Action</a></li>
									<li><a href="#">Another action</a></li>
									<li><a href="#">Something else here</a></li>
									<li class="divider"></li>
									<li class="nav-header">Nav header</li>
									<li><a href="#">Separated link</a></li>
									<li><a href="#">One more separated link</a></li>
								</ul>
							</li>
						</ul>
						<ul class="nav pull-right navbar-nav">
							<li class="dropdown" id="menuLogin"><a class="dropdown-toggle" href="#" data-toggle="dropdown" id="navLogin">Login</a>
								<div class="dropdown-menu" style="padding: 17px;">
									<form method="post" action="login.php" name="login">
										<input name="user" id="user" placeholder="Username" type="email" class="form-control">
										<input name="pass" id="pass" placeholder="Password" type="password"> <br>
										<button type="submit" name="btnLogin" id="btnLogin" class="btn btn-default navbar-btn">Login</button>
									</form>
								</div>
							</li>
						</ul>
					</div><!-- /.navbar-collapse -->
				</div><!-- /.container -->
			</div><!-- /.navbar -->
		<?php
		}
		?>
		</header>

		<article class="container" style="margin-top: 50px;">
			<h1>Projet HOME</h1>
			<div>
				<cite>Int&eacute;grer une gestion des sessions cross-service (ex: un utilisateur connect&eacute; sur Mediapedia
				n'a pas besoin de se reconnecter sur ISNRacing ou Cryptocode, et apparition d'un bandeau de connexion sur
				HOME).</cite>

			</div>
			<br>
			<div>
				<cite>Remplacer le bouton textuel de d&eacute;connexion par une image power on/off.</cite>

			</div>
			<br>

		</article>

		<script type="text/javascript">
			function display(elemID) {
				var elem = document.getElementById(elemID);
				var connectMenu = document.getElementById('connectMenu');
				connectMenu.style.display = 'none';
				elem.style.display = 'initial';

			}
			function easeOutQuint(t) { return 1+(--t)*t*t*t*t }
		</script>
	</body>
</html>
