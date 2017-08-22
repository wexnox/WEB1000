<?php
	$filnavn="D:\\Sites\\home.hbv.no\\phptemp\\141629/student.txt";    /* filnavn angitt */
	$filoperasjon="r";    /* filoperasjon ("r" - for lesing) angitt  */
		print ("Følgende studenter er registrert <br />;");    /* overskrift skrevet ut */
	$fil = fopen($filnavn,$filoperasjon);    /* filen åpnet */
		while ($linje = fgets ($fil))    /* en linje lest fra fil */
			  {
				  if ($linje != ";")
				  	{
				  		$del = explode (";", $linje);
						$brukernavn = trim ($del[0]);
						$fornavn = trim ($del[1]);
						$etternavn = trim ($del[2]);
						$klassekode = trim ($del[3]);
					
						print ("$brukernavn, $fornavn, $etternavn, $klassekode <br />;");    /* linjen skrevet ut */
					}
				  }
		fclose ($fil);    /* filen lukket */
?>