<?php
session_start();

include "scripts/connec_mysqli.php";

include "lang/decide_lang.php";

?>

<!DOCTYPE HTML>
<html>
	<head>
		<?php include("part/head.php"); ?>
		<!--link href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.1/css/bootstrap.min.css" rel="stylesheet"-->
	</head>
	
	<body background="img/background.png">

		<header>
			<p class="common">Contact</p>
		</header>
		
		<article class="contact" style="height : 400px;">
			<p class="common">You have a problem, an idea ? You can contact me with this e-mail adress : <a href="mailto:support@isn-racing.comoj.com">support@isn-racing.comoj.com</a><p>
		</article>
		
		<!-- V1 -->
		<!--div class="">
		<?php if(array_key_exists('errors',$_SESSION)): ?>
			<div class="">
			<?= implode('<br>', $_SESSION['errors']); ?>
			</div>
			<?php endif; ?>
			<?php if(array_key_exists('success',$_SESSION)): ?>
			<div class="">Votre email à bien été transmis !</div>
			<?php endif; ?>
			<form action="send_form.php" method="post">
				<div class="">
					<div class="inline contact">
						<div class="">
							<label for="inputname">Votre nom</label>
							<input required type="text" name="name" class="" id="inputname" value="<?php echo isset($_SESSION['inputs']['name'])? $_SESSION['inputs']['name'] : ''; ?>">
						</div>
					</div>
					<div class="inline contact">
						<div class="">
							<label for="inputemail">Votre email</label>
							<input required type="email" name="email" class="" id="inputemail" value="<?php echo isset($_SESSION['inputs']['email'])? $_SESSION['inputs']['email'] : ''; ?>">
						</div>
					</div>
					<div class="contact">
						<div class="contact">
							<label for="inputmessage" class="contact">Votre message</label>
							<textarea required id="inputmessage" name="message" class=""><?php echo isset($_SESSION['inputs']['message'])? $_SESSION['inputs']['message'] : ''; ?></textarea>
						</div>
					</div>
					<div class="">
						<div class="">
						<label for="checkspam"><input type="checkbox" name="antispam" id="checkspam">Je ne suis pas un robot.</label>
						</div>
					</div>
					<div class="">
					<button type="submit" class="">Envoyer</button>
					</div>
				</div>
			</form>
		</div-->

		<footer> <!--style="width : 700px;"-->
			<?php include("part/footer.php"); ?>
		</footer>
	</body>
</html>

<?php
unset($_SESSION['inputs']); // on nettoie les données précédentes
unset($_SESSION['success']);
unset($_SESSION['errors']);
?>