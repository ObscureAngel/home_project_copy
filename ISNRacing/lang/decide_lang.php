<?php

if (isset($_GET['page']) == false) {
	if (isset($data->Langue) == true) {
		if ($data->Langue == 'fr') {           // si la langue est 'fr' (français) on inclut le fichier fr_FR.php
			include('lang/fr_FR.php');
		} 

		else if ($data->Langue == 'en') {      // si la langue est 'en' (anglais) on inclut le fichier en_EN.php
			include('lang/en_US.php');
		}
		
		else if ($data->Langue == 'de') {      // si la langue est 'de' (allemand) on inclut le fichier de_DE.php
			include('lang/de_DE.php');
		}


	} else if (isset($_GET['lang']) == true) {
		if ($_GET['lang'] == 'fr') {           // si la langue est 'fr' (français) on inclut le fichier fr_FR.php
			include('lang/fr_FR.php');
		} 

		else if ($_GET['lang'] == 'en') {      // si la langue est 'en' (anglais) on inclut le fichier en_EN.php
			include('lang/en_US.php');
		}
		
		else if ($_GET['lang'] == 'de') {      // si la langue est 'de' (allemand) on inclut le fichier de_DE.php
			include('lang/de_DE.php');
		}


	} else {                       // si aucune langue n'est déclarée on inclut le fichier en_EN.php par défaut
		include('lang/en_US.php');
	}
}

if ((isset($_GET['page'])) == true AND ($_GET['page'] == 'about' OR $_GET['page'] == 'init')){
	if (isset($data['Langue']) == true) {
		if ($data->Langue == 'fr') {           // si la langue est 'fr' (français) on inclut le fichier fr_FR.php
			include('../lang/fr_FR.php');
		} 

		else if ($data->Langue == 'en') {      // si la langue est 'en' (anglais) on inclut le fichier en_EN.php
			include('../lang/en_US.php');
		}
		
		else if ($data->Langue == 'de') {      // si la langue est 'de' (allemand) on inclut le fichier de_DE.php
			include('../lang/de_DE.php');
		}


	} else if (isset($_GET['lang']) == true) {
		if ($_GET['lang'] == 'fr') {           // si la langue est 'fr' (français) on inclut le fichier fr_FR.php
			include('../lang/fr_FR.php');
		} 

		else if ($_GET['lang'] == 'en') {      // si la langue est 'en' (anglais) on inclut le fichier en_EN.php
			include('../lang/en_US.php');
		}
		
		else if ($_GET['lang'] == 'de') {      // si la langue est 'de' (allemand) on inclut le fichier de_DE.php
			include('../lang/de_DE.php');
		}


	} else {                       // si aucune langue n'est déclarée on inclut le fichier en_EN.php par défaut
		include('../lang/en_US.php');
	}
}

?> 