<!DOCTYPE html>

<html>

	<head>
		<title>Cryptocode</title>
		<meta http-equiv="content-type" content="text/html" charset="iso-8859-1">
		<link href="style/bootstrap.css" rel="stylesheet" type="text/css" />
	</head>

	<?php
	if (isset($_POST['cryptMethod'])) {
		require 'encrypt.php';
		if ($_POST['cryptMethod'] == "simple") {
			$cryptKey = "";
			$cryptSentence = "";
			$sentence = str_split($_POST['sentence']);

			if (!isset($_POST['cryptKey']) or isset($_POST['reencrypt'])) {
				/*
				 * The simple crypt key is generated by 26 random number
				 */
				for ($i = 0; $i < 26; $i++) {
					$cryptKey = $cryptKey.rand(0, 1);
				}
			} else {
				$cryptKey = $_POST['cryptKey'];
			}

			$cryptSentence = simpleCrypt($sentence, $cryptKey);
		} else {
			complexCrypt($_POST['sentence'], "yolo");
		}
	}
	?>

	<body style="text-align: center;">

		<header>
			<h1>Words to password</h1>
			<?php if (isset($_POST['cryptMethod'])) echo '<br><a href="." class="btn btn-default">Go back</a>';?>
		</header>

		<article style="text-align: left;">
		<?php
		if (!isset($_POST['cryptMethod'])) {
		?>
			<form action="" method="post">
				<fieldset>
					<legend>Cryptocode</legend>
					<label for="sentence">Type your sentence only in lowercases letters : </label>
						<input type="text" id="sentence" name="sentence" required>
					<br><br>

					<label> Crypt method : </label>
					<span>Simple</span>
						<input type="radio" name="cryptMethod" id="cryptMethod" value="simple" required>
					<span>Complex</span>
						<input type="radio" name="cryptMethod" id="cryptMethod" value="complex">
				</fieldset>
				<br>
				<input type="submit" value="Encrypt">
			</form>
		<?php
		} else {
			?>
			<fieldset>
				<legend>Cryptocode</legend>
				<label>Encrypted sentence : </label>
					<?php  echo $cryptSentence; ?>
				<br><br>

				<label> Crypt method : </label>
					<?php
					if ($_POST['cryptMethod'] == "simple") {
						$simpleCryptKey = $cryptKey;
						echo '<span>Simple</span>';
					} else if ($_POST['cryptMethod'] == "complex") {
						$complexCryptKey = $cryptKey;
						echo '<span>Complex</span>';
					}
					?>
				<br><br>

				<label>Encrypted key : </label>
					<?php  echo $simpleCryptKey; ?>
			</fieldset>
			<br>
			<form action="" method="post">
				<input type="hidden" name="sentence" value="<?php echo $_POST['sentence']; ?>">
				<input type="hidden" name="cryptMethod" value="<?php echo $_POST['cryptMethod']; ?>">
				<input type="hidden" name="cryptKey" value="<?php echo $cryptKey; ?>">
				<input type="submit" name="reencrypt" value="Try an other key">
			</form>
		<?php
		}
		?>
		</article>

		<footer>
			<p><a href="../">Back to HOME</a></p>
			<p>Created by Maxime BEACCO</p>
			<p>Copyright &copy; 2017 - 2015 | All Rights Reserved</p>
		</footer>

	</body>

</html>