<?php
	$sok = $_POST["sok"];
	$sok = trim($sok);
	var_dump($sok);
	$filnavn = "D:\\Sites\\home.hbv.no\\phptemp\\141629/student.txt";
	$filoperasjon = "r";
	
		print ("Følgene elever er i klassen <br><br>");
		
		$fil = fopen ($filnavn, $filoperasjon);
			//var_dump($fil);
			while ($line = fgets ($fil))
				{
					if ($line != "" )
					{
						$del = explode (";" , $line);
					 	 
						$brukernavn = trim ($del[0]);
						$fornavn = trim ($del[1]);
						$etternavn = trim ($del[2]);
						$klassekode = trim ($del[3]);
							
							if ($klassekode == $sok)
						{
							print ("$klassekode $brukernavn $fornavn $etternavn <br />");
							}
						}	
					}
	fclose ($fil);
?>