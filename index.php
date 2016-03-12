<!DOCTYPE html >
<html>
  <head>
  <meta charset="utf-8">
  <link rel="stylesheet" href="css.php">
	 <?php
	// Spielregeln

	 function schachregeln($_zugnr, $_vonZeile, $_vonSpalte, $_nachZeile, $_nachSpalte)
				{
				if ($_vonZeile == $_nachZeile && $_vonSpalte == $_nachSpalte) {		// Überprüfung das er nicht auf das gleiche Feld springt
					return false;
				}

			/*	if ($_vonZeile == $_vonSpalte == '&nbsp;')				// Leere Felder können kein Feld ausgewählten

						if ($_zugnr%2) $figur = substr($_schachbrett[$_vonZeile][$_vonSpalte],2,4);
						echo $figur;
			*/
					return true;
				
			}


	?>

  <title>Schachbett von Frank</title>
  </head>
  
  
  <body>
  <header><h1 class="Frank_Ueberschrift">Schachbrett von <a href="http://frank-panzer.de" target="_blank">Frank Panzer</a></h1></header>
  <a href="http://www.schach-bremen.de/lehrbuch/" target="_blank">Spielregeln</a> - <a href="index.php">Spiel Neu beginnen</a>
	<div>
		<table class="Frank_T">
			<?php

			//include (chat.php);

				$RookW  = '&#9814;';
				$KnightW = '&#9816;';
				$BishopW = '&#9815;';
				$KingW = '&#9812;';
				$QueenW = '&#9813;';
				$PawnW = '&#9817;';
				$RookB = '&#9820;';		
				$KnightB = '&#9822;';
				$BishopB = '&#9821;';
				$KingB = '&#9818;';
				$QueenB = '&#9819;';
				$PawnB = '&#9823;';
				
				$zugnr = 1;
				$playercolor = "Orange";
				
				
				$schachfeld = array(
					array('&#92;','A','B','C','D','E','F','G','H','&#47;'),
					array('8',$RookB,$KnightB,$BishopB,$QueenB,$KingB,$BishopB,$KnightB,$RookB,'8'),
					array('7',$PawnB,$PawnB,$PawnB,$PawnB,$PawnB,$PawnB,$PawnB,$PawnB,'7'),
					array('6','','','','','','','','','6'),
					array('5','','','','','','','','','5'),
					array('4','','','','','','','','','4'),
					array('3','','','','','','','','','3'),
					array('2',$PawnW,$PawnW,$PawnW,$PawnW,$PawnW,$PawnW,$PawnW,$PawnW,'2'),
					array('1',$RookW,$KnightW,$BishopW,$QueenW,$KingW,$BishopW,$KnightW,$RookW,'1'),
					array('&#47;','A','B','C','D','E','F','G','H','&#92;'),
				);
				
				$spielstand = $schachfeld;
				
				if (isset ($_GET['spielstand'])) {
					$schachfeld = unserialize(urldecode($_GET['spielstand']));
					}



				
				if (isset ($_GET['zugnummer']))						// Bewegungsänderung
				{
					//Spielstand abspeicherung in eine Textdatei

					if(file_exists('spielstand.txt'))
							{
							$handle = fopen("spielstand.txt","r");
							$spielstand=unserialize(base64_decode(fread($handle,filesize("spielstand.txt"))));
							fclose($handle);
							// print_r($spielstand);
							}
								else
							{
								echo "Datei nicht gefunden";
							}

					$zugnr = $_GET['zugnummer'];
						
					if ($zugnr % 2)
							{
								$playercolor = "Blau";
							}
						else
							{
								$playercolor = "Orange";
							}
				}
					if (isset ($_GET['Von']) && isset ($_GET['Nach'])) {
						$vonZeile = 9-(ord(substr($_GET['Von'],1,1))-48);			// '2' zur Zahl 2 machen , nach ord hab ich 50 , 48 abziehen, dann ..
						$vonSpalte = (ord(substr($_GET['Von'],0,1))-64);			// A
						$nachZeile = 9-(ord(substr($_GET['Nach'],1,1))-48);			// 4
						$nachSpalte = (ord(substr($_GET['Nach'],0,1))-64);			// A						
						
						if 	(schachregeln($zugnr,$vonZeile, $vonSpalte,$nachZeile, $nachSpalte)) {	// Aufruf der Funktion zur Regelüberprüfung
												
							$zugnr++;
							echo "Dies ist der ".$zugnr.". Zug und damit ist $playercolor an der Reihe. ";
							
							$schachfeld[$nachZeile][$nachSpalte] = $schachfeld[$vonZeile][$vonSpalte];
							$schachfeld[$vonZeile][$vonSpalte] = '';			// Feld leeren von dem die Figur wegezogen wird
							
							$spielstand = $schachfeld; 		// der aktuelle spielstand wird in eine neue variable/neues array uebergeben	
						}
						else {
							echo "<p>Dein $zugnr. Zug war nicht regelkonform, $playercolor, bitte wiederholen.</p>";
							$spielstand = $schachfeld; 
						}
						
					}
									
					else {
						echo "Bitte machen Sie den $zugnr. Zug, $playercolor.</p>";
						$spielstand = $schachfeld; 
					}
				
				foreach($schachfeld as $zeile) { 	//holt aus $spielstand nacheinander alle einzelnen zeilen, die in eine temp Variable gesteckt werden
					echo "<tr>";
						foreach($zeile as $zelle) {							
							if ($zelle == $RookW || $zelle == $KnightW || $zelle == $BishopW || $zelle == $KingW || $zelle == $QueenW  || $zelle == $PawnW) {							
								echo "<td class='white'>$zelle</td>";							
							}
							
							else if ($zelle == $RookB || $zelle == $KnightB || $zelle == $BishopB || $zelle == $KingB || $zelle == $QueenB  || $zelle == $PawnB) {								
								echo "<td class='black'>$zelle</td>";							
							}
							
							else {							
								echo "<td>$zelle</td>";							
							}
						}
					echo "</tr></div>";

					//Speicherung in Textdatei
					$spielstatus=base64_encode(serialize($spielstand));    //spielstand wird für übergabe an datei kodiert!
					$handle=fopen("spielstand.txt","w");
					//fwrite ($handle,$zugnr."|");
					fwrite($handle,$spielstatus);
					fclose($handle);
					unset($handle);
				}	
				
				// User Eingabefeld
				?>
				<form action="" method="GET" >

		<?php // Von ?>
		<div class="Von_Nach">

				<label><span>Von - Nach</span><br></label>
					<select name="Von" size="4" title="Von" multiple>
				<?php
					for($i='A';$i<='H';$i++)
					{
						for($j='1';$j<='8';$j++)
							{
								if (!empty($spielstand[9-$j][ord($i)-64])) {
								echo "<option value=".$i.$j.">".$i.$j."</option>";
								}
							}
					}
				?>
				</select>


		<?php // Nach ?>

				<label>  </label>
				<select name="Nach" size="4" title="Nach">
				<?php
				 for($i='A';$i<='H';$i++)
				 {  
					for($j='1';$j<='8';$j++)
						{							
								if (empty($spielstand[9-$j][ord($i)-64])) {
								echo "<option value=".$i.$j.">".$i.$j."</option>"; 
								}
						}
				 }				 
				 
				echo "</select><br><input type='hidden' name='zugnummer' value='".$zugnr."'>";
				echo "<input type='hidden' name='spielstand' value='" . urlencode(serialize($spielstand)) . "'>";
				echo "<input type='submit' value='Zug machen!'></form>";
				?>
		</div>


		</table>

	</div>

  
  </body>
  
</html>