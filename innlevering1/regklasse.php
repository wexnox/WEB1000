<?php
	/* definering av variabler */
	$klassekode = $_POST ["klassekode"];
	$klassenavn = $_POST ["klassenavn"];    /* variable gitt verdier fra feltene i HTML-skjemaet */

  if (!$klassekode ||!$klassenavn)
    {
      print ("Begge feltene må fylles ut");
    }
  else
    {
      $filnavn="D:\\Sites\\home.hbv.no\\phptemp\\141629/klasse.txt";    /* filnavn angitt */
      $filoperasjon="a";    /* filoperasjon ("a" - for tilføying) angitt  */
      $linje=$klassekode . ";" . $klassenavn . "\n";    /* linjen som skal skrives til fil opprettet */
      $fil = fopen($filnavn,$filoperasjon);     /* filen åpnet */
		fwrite ($fil,$linje);    /* en linje skrevet til fil */
		fclose ($fil);    /* filen lukket */
		print ("$klassekode $klassenavn nå registrert klasse");    /* melding skrevet */
    }
?>