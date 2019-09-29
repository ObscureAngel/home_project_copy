<?php
// session_destroy();
session_start();
require_once '../scripts/connect_pdo.php';
if (isset($_GET['lang'])) {
	$lang = $_GET['lang'];
} else if (isset($_GET['lang']) == false) {
	$lang = "en";
}

	if (isset($_POST) == true) {
		// Si disconnected
		//if ((isset($_GET['cause']) == true) AND ($_GET['cause']) == 'disconnected') {
			if (isset($_POST['pseudo'])) {
				//verif du pseudo avec password
				
				
				$select = "SELECT `Password` FROM `joueurs` WHERE `ID` = ". $_POST['pseudo'] ; 
				//echo $sql;
				$result = $db->query($select);
				
				if ($data = $result->fetchObject()) {
					//echo $_POST['password'].$data["Password"];
					if($_POST['password'] == $data->Password) {
						$_SESSION['Pseudo_ID'] = $_POST['pseudo'];
						header('Location: ../account_page.php?id='.$_SESSION['Pseudo_ID']);
					}
				}
				
				?>
					<script>
						alert('Wrong username or password !');
						document.location.href="verifyLogin.php";
					</script>
				<?php
			}
		//}
		
		// Si on veut continuer
		if (isset($_POST['resumeOrStart']) == true) { 
			if ($_POST['resumeOrStart'] == 'resume') {
			
				if (isset($_POST['pseudo'])) {
					//verif du pseudo avec password
					
					$select = "SELECT `Password` FROM `joueurs` WHERE `ID` = ". $_POST['pseudo'] ; 
					//echo $sql;
					$result = $db->query($select);
					
					if ($data = $result->fetchObject()) {
						//echo $_POST['password'].$data["Password"];
						if($_POST['password'] == $data->Password) {
							$_SESSION['Pseudo_ID'] = $_POST['pseudo'];
							header('Location: ../account_page.php?id='.$_SESSION['Pseudo_ID']);
						}
					}
					
					?>
						<script>
							alert('Wrong username or password !');
							document.location.href="../index.php";
						</script>
					<?php
					
					
				}
			} else if ($_POST['resumeOrStart'] == 'start') {
				if (isset($_GET['lang']) == false) {
					header('Location: form_init.php?lang=en&page=init');
				} else if ($lang == "fr") {
					header('Location: form_init.php?lang=fr&page=init');
				} else if ($lang == "en") {
					header('Location: form_init.php?lang=en&page=init');
				} else if ($lang == "de") {
					header('Location: form_init.php?lang=de&page=init');
				}
			}
		}
	}

?>