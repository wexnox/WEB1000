<?php
	include("start.html");
	?>
<?php
	$klassekode = $_POST ["klassekode"];
	$klassenavn = $_POST ["klassenavn"];

  if (!$klassekode ||!$klassenavn)
    {
      print ("Begge feltene må fylles ut");
    }
  else
    {
      $filnavn="D:\\Sites\\home.hbv.no\\phptemp\\140020/klasse.txt";
      $filoperasjon="a"; 
      $linje=$klassekode . ";" . $klassenavn . "\n";
      $fil = fopen($filnavn,$filoperasjon);
		fwrite ($fil,$linje); 
		fclose ($fil);
		print ("$klassekode $klassenavn nå registrert klasse"); 
    }
	include("slutt.html");
?>