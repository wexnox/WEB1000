<?php
	include("start.html");
	?>
<?php
	$brukernavn = $_POST["brukernavn"];
	$fornavn = $_POST ["fornavn"];
	$etternavn = $_POST ["etternavn"];
	$klassekode = $_POST["klassekode"];

  if (!$brukernavn || !$fornavn || !$etternavn ||!$klassekode)
    {
      print ("Alle feltene må fylles ut");
    }
  else
    {
      $filnavn="D:\\Sites\\home.hbv.no\\phptemp\\140020/student.txt";
      $filoperasjon="a"; 
      $linje=$brukernavn . ";" . $fornavn . ";" . $etternavn . ";" . $klassekode . "\n"; 
      $fil = fopen($filnavn,$filoperasjon);
		fwrite ($fil,$linje);
		fclose ($fil);
		print ("$brukernavn $fornavn $etternavn og $klassekode er nå registrert student");
    }
	include("slutt.html");
?>