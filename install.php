<?php 
if ($_GET["validate"] == 1) {
	$command = "mysql -u root home < /home/mbeacco/public_html/home_project/home.sql";
	
	$output = shell_exec($command );
	echo $command;
}
?>

<!DOCTYPE html>
<html lang="fr">

	<head>
		<title>HOME</title>
		<meta http-equiv="content-type" content="text/html" charset="iso-8859-1">
		<meta name="author" content="ObscureAngel">
		<link href="img/home_favicon.ico" rel="icon" type="image/x-icon" />
		<link href="style/bootstrap.css" rel="stylesheet" type="text/css" />
	</head>
	
	<body>
		<article>
			You have not configured the database required for the application, click <a href="?validate=1">here</a> to install it.
		</article>
	</body>

</html>