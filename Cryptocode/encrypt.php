<?php


//var_dump($rawSentence);
function simpleCrypt($rawSentence, $simpleCryptKey) {
	
	$cryptSentence = "";
	
	for ($i = 0; $i < sizeof($rawSentence); $i++) {
		
		switch ($rawSentence[$i]) {
			case 'a':
				if ($simpleCryptKey[0]) {
					$cryptSentence = $cryptSentence.'A';;
				} else {
					$cryptSentence = $cryptSentence.'a';
				}
				break;
			case 'b':
				if ($simpleCryptKey[1]) {
					$cryptSentence = $cryptSentence.'B';;
				} else {
					$cryptSentence = $cryptSentence.'b';
				}
				break;
			case 'c':
				if ($simpleCryptKey[2]) {
					$cryptSentence = $cryptSentence.'C';;
				} else {
					$cryptSentence = $cryptSentence.'c';
				}
				break;
			case 'd':
				if ($simpleCryptKey[3]) {
					$cryptSentence = $cryptSentence.'D';;
				} else {
					$cryptSentence = $cryptSentence.'d';
				}
				break;
			case 'e':
				if ($simpleCryptKey[4]) {
					$cryptSentence = $cryptSentence.'E';;
				} else {
					$cryptSentence = $cryptSentence.'e';
				}
				break;
			case 'f':
				if ($simpleCryptKey[5]) {
					$cryptSentence = $cryptSentence.'F';;
				} else {
					$cryptSentence = $cryptSentence.'f';
				}
				break;
			case 'g':
				if ($simpleCryptKey[6]) {
					$cryptSentence = $cryptSentence.'G';;
				} else {
					$cryptSentence = $cryptSentence.'g';
				}
				break;
			case 'h':
				if ($simpleCryptKey[7]) {
					$cryptSentence = $cryptSentence.'H';;
				} else {
					$cryptSentence = $cryptSentence.'h';
				}
				break;
			case 'i':
				if ($simpleCryptKey[8]) {
					$cryptSentence = $cryptSentence.'I';;
				} else {
					$cryptSentence = $cryptSentence.'i';
				}
				break;
			case 'j':
				if ($simpleCryptKey[9]) {
					$cryptSentence = $cryptSentence.'J';;
				} else {
					$cryptSentence = $cryptSentence.'j';
				}
				break;
			case 'k':
				if ($simpleCryptKey[10]) {
					$cryptSentence = $cryptSentence.'K';;
				} else {
					$cryptSentence = $cryptSentence.'k';
				}
				break;
			case 'l':
				if ($simpleCryptKey[11]) {
					$cryptSentence = $cryptSentence.'L';;
				} else {
					$cryptSentence = $cryptSentence.'l';
				}
				break;
			case 'm':
				if ($simpleCryptKey[12]) {
					$cryptSentence = $cryptSentence.'M';;
				} else {
					$cryptSentence = $cryptSentence.'m';
				}
				break;
			case 'n':
				if ($simpleCryptKey[13]) {
					$cryptSentence = $cryptSentence.'N';;
				} else {
					$cryptSentence = $cryptSentence.'n';
				}
				break;
			case 'o':
				if ($simpleCryptKey[14]) {
					$cryptSentence = $cryptSentence.'O';;
				} else {
					$cryptSentence = $cryptSentence.'o';
				}
				break;
			case 'p':
				if ($simpleCryptKey[15]) {
					$cryptSentence = $cryptSentence.'P';;
				} else {
					$cryptSentence = $cryptSentence.'p';
				}
				break;
			case 'q':
				if ($simpleCryptKey[16]) {
					$cryptSentence = $cryptSentence.'Q';;
				} else {
					$cryptSentence = $cryptSentence.'q';
				}
				break;
			case 'r':
				if ($simpleCryptKey[17]) {
					$cryptSentence = $cryptSentence.'R';;
				} else {
					$cryptSentence = $cryptSentence.'r';
				}
				break;
			case 's':
				if ($simpleCryptKey[18]) {
					$cryptSentence = $cryptSentence.'S';;
				} else {
					$cryptSentence = $cryptSentence.'s';
				}
				break;
			case 't':
				if ($simpleCryptKey[19]) {
					$cryptSentence = $cryptSentence.'T';;
				} else {
					$cryptSentence = $cryptSentence.'t';
				}
				break;
			case 'u':
				if ($simpleCryptKey[20]) {
					$cryptSentence = $cryptSentence.'U';;
				} else {
					$cryptSentence = $cryptSentence.'u';
				}
				break;
			case 'v':
				if ($simpleCryptKey[21]) {
					$cryptSentence = $cryptSentence.'V';;
				} else {
					$cryptSentence = $cryptSentence.'v';
				}
				break;
			case 'w':
				if ($simpleCryptKey[22]) {
					$cryptSentence = $cryptSentence.'W';;
				} else {
					$cryptSentence = $cryptSentence.'w';
				}
				break;
			case 'x':
				if ($simpleCryptKey[23]) {
					$cryptSentence = $cryptSentence.'X';;
				} else {
					$cryptSentence = $cryptSentence.'x';
				}
				break;
			case 'y':
				if ($simpleCryptKey[24]) {
					$cryptSentence = $cryptSentence.'Y';;
				} else {
					$cryptSentence = $cryptSentence.'y';
				}
				break;
			case 'z':
				if ($simpleCryptKey[25]) {
					$cryptSentence = $cryptSentence.'Z';;
				} else {
					$cryptSentence = $cryptSentence.'z';
				}
				break;
			default:
				$cryptSentence = $cryptSentence.$rawSentence[$i];
				break;
		}
	}
	
	return $cryptSentence;
}

function complexCrypt($rawSentence, $complexCryptKey) {
	
	//Générer une clef de 256 bit de longueur ?
	
	$A = array('a', 'A', '4', '@', 'à');
	$B = array('b', 'B', '8');
	$C = array('c', 'C', 'ç', '(');
	$D = array('d', 'D', '#');
	$E = array('e', 'E', 'é', 'è', '3');
	$F = array('f', 'F');
	$G = array('g', 'G', '6', '9');
	$H = array('h', 'H', '#');
	$I = array('i', 'I', '1', '|');
	$J = array('j', 'J');
	$K = array('k', 'K');
	$L = array('l', 'L', '£', '7');
	$M = array('m', 'M');
	$N = array('n', 'N');
	$O = array('o', 'O', '0', '°', '¤');
	$P = array('p', 'P');
	$Q = array('q', 'Q');
	$R = array('r', 'R');
	$S = array('s', 'S', '5', '$', '§');
	$T = array('t', 'T');
	$U = array('u', 'U', 'ù', 'µ', 'v', 'V');
	$V = array('v', 'V');
	$W = array('w', 'W', '2v', '2V', '²v', '²V');
	$X = array('x', 'X', '*', '+');
	$Y = array('y', 'Y');
	$Z = array('z', 'Z', '7');
	
	$all = array('A', 'B', 'C', 'D', 'E', 'F', 'G', 'H', 'I', 'J', 'K', 'L', 'M', 'N', 'O', 'P', 'Q', 'R', 'S', 'T', 'U', 'V', 'W', 'X', 'Y', 'Z');
	
	foreach ($all as $letter) {
		$x[$letter] = ${$letter};
	}
	
	//var_dump($x);
}

?>