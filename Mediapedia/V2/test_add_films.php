<?php
require_once 'connectors/config.inc.php';
require_once 'connectors/AddRequest.class.php';
require_once 'connectors/GetRequest.class.php';
require_once 'models/Movie.class.php';

$mov_test = new Movie(1, "Testons", "FN", FALSE);
$mov_test->setDuration(90);
try {
	$mov_test->setTotalSeason(0);
} catch (Exception $e) {
	echo $e->getMessage()." ";
}

//echo $mov_test->getParent()->toString();
var_dump($mov_test); 

/*
res_id       int NOT NULL ,
title        Varchar (60) NOT NULL ,
disabled     Bool NOT NULL DEFAULT false ,
adding_date  Date NOT NULL,
duration     Int,
res_type     Varchar (2),
season       int,
nbr_pages    int,
on_air_year  int,
format       Varchar (5),*/



?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>Add Film</title>
		<link href="../../style/bootstrap.css" rel="stylesheet" type="text/css" />
	</head>

	<body>
		<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="get">
			<label for="res_type">Resource type</label>
				<select name="res_type" id="res_type">
					<option disabled selected></option>
					<option value="AF">Animated film</option>
					<option value="NF">Normal film</option>
					<option value="NS">Normal serie</option>
					<option value="AS">Animated serie</option>
				</select>
			<label for="res_title">Title</label>
				<input type="text" name="res_title" id="res_title" style="text-transform: capitalize;">
			<label for="res_disabled_false">Disabled</label>
				<input type="radio" name="res_disabled" id="res_disabled_false" value="FALSE" checked>False
				<input type="radio" name="res_disabled" id="res_disabled_true" value="TRUE">True
			<label>Duration</label>
				<input type="number" name="res_duration" min="0" value="0" max="600">
			<label>Season number</label>
			<br>
			<input type="submit" name="save_it" value="Yolo" class="btn btn-default">
		</form>
	</body>
</html>
