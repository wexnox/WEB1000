<?php
	include("start.html");
	?>
<?php
	$filnavn="D:\\Sites\\home.hbv.no\\phptemp\\140020/student.txt"; 
	$filoperasjon="r";  
		print ("Følgende studenter er registrert <br />;");
	$fil = fopen($filnavn,$filoperasjon);
		while ($linje = fgets ($fil)) 
			  {
				  if ($linje != ";")
				  	{
				  		$del = explode (";", $linje);
						$brukernavn = trim ($del[0]);
						$fornavn = trim ($del[1]);
						$etternavn = trim ($del[2]);
						$klassekode = trim ($del[3]);
					
						print ("$brukernavn, $fornavn, $etternavn, $klassekode <br />;");
					}
				  }
		fclose ($fil); 
	include("slutt.html");
?>