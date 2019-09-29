<?php
/*Verif de session (verif par ID)*/

session_start();

require_once 'scripts/connect_pdo.php';

if (isset($_GET['id']) == false) {
	?>
	<script>
		alert('Sorry, you have been disconnected.');
		document.location.href="index.php";
	</script>
<?php } ?>