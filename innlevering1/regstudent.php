<?php
	/* definering av variabler */
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
      $filnavn="D:\\Sites\\home.hbv.no\\phptemp\\141629/student.txt";    /* filnavn angitt */
      $filoperasjon="a";    /* filoperasjon ("a" - for tilføying) angitt  */
      $linje=$brukernavn . ";" . $fornavn . ";" . $etternavn . ";" . $klassekode . "\n";    /* linjen som skal skrives til fil opprettet */
      $fil = fopen($filnavn,$filoperasjon);     /* filen åpnet */
		fwrite ($fil,$linje);    /* en linje skrevet til fil */
		fclose ($fil);    /* filen lukket */
		print ("$brukernavn $fornavn $etternavn og $klassekode er nå registrert student");    /* melding skrevet */
    }
?>