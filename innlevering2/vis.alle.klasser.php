<?php
	include("start.html");
	?>
<?php
	$filnavn="D:\\Sites\\home.hbv.no\\phptemp\\140020/klasse.txt";    
	$filoperasjon="r";  
		print ("Følgende klasser er registrert <br />;");    
	$fil = fopen($filnavn,$filoperasjon);
		while ($linje = fgets ($fil))
			  {
				  if ($linje != "")
				  	{
				  		$del = explode (";", $linje);
						$klassekode = trim ($del[0]);
						$klassenavn = trim ($del[1]);
						print ("$klassekode $klassenavn <br />;"); 
					}
				  }
		fclose ($fil); 
	include("slutt.html");
?>