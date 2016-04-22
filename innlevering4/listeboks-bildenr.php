<?php
/**
 * Created by PhpStorm.
 * User: wexnox
 * Date: 19.03.2016
 * Time: 02.56
 */

    
    include ("base/db-tilkobling.php");
    $sqlSetning="SELECT * FROM bilde ORDER BY bildenr;";
    $sqlResultat=mysqli_query($db,$sqlSetning) or die ("Ikke mulig å hente data fra databasen");

    $antallRader=mysqli_num_rows($sqlResultat);

    for ($r=1;$r<=$antallRader;$r++)
    {
        $rad=mysqli_fetch_array($sqlResultat);
        $bildenr=$rad["bildenr"];
        $filnavn=$rad["filnavn"];

        print ("<option value='$bildenr'>$bildenr $filnavn</option>");
    }
?>