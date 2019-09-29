<?

session_start();



if (isset($_POST['speed'])) {

	if (is_numeric($_POST['speed'])) {

		if($_POST['speed'] > 0 and $_POST['speed'] <= 100) { 

			include "connec_mysqli.php";

			$sql = "UPDATE joueurs SET FormSpeed = ".$_POST['speed']." WHERE ID = ".$_SESSION['Pseudo_ID'];

			echo $sql;

			mysqli_query($bdd,$sql) or die(mysql_error());

		}

	}

}



header('Location: ../game_page.php');

?>