<?php
	$filnavn="D:\\Sites\\home.hbv.no\\phptemp\\141629/klasse.txt";    
	$filoperasjon="r";    /* filoperasjon ("r" - for lesing) angitt  */
		print ("Følgende klasser er registrert <br />;");    
	$fil = fopen($filnavn,$filoperasjon);    /* filen åpnet */
		while ($linje = fgets ($fil))    /* en linje lest fra fil */
			  {
				  if ($linje != "")
				  	{
				  		$del = explode (";", $linje);
						$klassekode = trim ($del[0]);
						$klassenavn = trim ($del[1]);
					
						print ("$klassekode $klassenavn <br />;");    /* linjen skrevet ut */
					}
				  }
		fclose ($fil);    /* filen lukket */
?>