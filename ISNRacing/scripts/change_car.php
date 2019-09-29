<?php
//session_start();
//include "scripts/connec_mysqli.php";
$color = $data['Couleur'];
if ($data['Position'] <= 4) { // back front left right
	$orientation = "right";
} else if ($data['Position'] >= 5 AND $data['Position'] <= 7) {
	$orientation = "front";
} else if ($data['Position'] >= 8 AND $data['Position'] <= 14) {
	$orientation = "left";
} else if ($data['Position'] >= 15 AND $data['Position'] <= 17) {
	$orientation = "back";
} else if ($data['Position'] >= 18) {
	$orientation = "right";
}
?>