<?php
if (isset($_GET['page']) == true AND ($_GET['page'] == 'about' OR $_GET['page'] == 'init')) {
	$href_foot_about = "DarkAngel.php?page=about";
	$href_foot_changelog = "../changelog.php";
	$href_foot_contact = "../contact.php";
} else {
	$href_foot_about = "about/DarkAngel.php?page=about";
	$href_foot_changelog = "changelog.php";
	$href_foot_contact = "contact.php";
}




?>

	<p class="common foot"><?php echo TXT_FOOT_DEVELOPED; ?><a href="<?php echo $href_foot_about; ?>">DarkAngel</a></p>
	<p class="common foot"><?php echo TXT_FOOT_VERSION; ?> 0.4.2 - <a href="<?php echo $href_foot_changelog; ?>" class="common foot"><?php echo TXT_FOOT_CHANGELOG; ?></a> - <a href="<?php echo $href_foot_contact; ?>" class="common foot">Contact</a></p>
	<p class="common foot"><?php echo TXT_FOOT_COPY; ?></p>