<?php     
  $angittKlassekode=$_GET ["klassekode"];
  print ("<table border=0>");	// starten på tabellen definert 
  $filnavn="D:\\Sites\\home.hbv.no\\phptemp\\140020/student.txt";// angitt filnavn 
  $filoperasjon="r"; // filoperasjon ("r" - for lesing) 
  $fil = fopen($filnavn,$filoperasjon); // filen åpnet 
  while ($linje = fgets ($fil))	// en linje lest fra fil
    {
      if ($linje != "")	// linjen lest fra fil er ikke tom 
        {
          $del = explode (";" , $linje); // innholdet av linjen delt opp 
          $brukernavn=trim($del[0]);	// Brukernavn hentet ut 
          $fornavn=trim($del[1]);	// Fornavn hentet ut 
          $etternavn=trim($del[2]);	// Etternavn hentet ut 
		  $klassekode=trim($del[3]);	// Klassehentet ut 
          if ($angittKlassekode==$klassekode )  // klassekode finnes på fil 
            {
               print ("<tr> <td> $klassekode $brukernavn $fornavn $etternavn </td> </tr>");  // Ny rad blir skrevet 
            }
        }
    }
  fclose ($fil);	// filen lukkes 
  print ("</table>");	// Definerer slutten på tabellen 
?>