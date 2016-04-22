<?php
/**
 * Created by PhpStorm.
 * User: wexnox
 * Date: 24.02.2016
 * Time: 00.38
 * Øvre drop-down
 */
    include ("base/db-tilkobling.php");
    include ('check.php');
    $sqlSetning="SELECT * FROM student klasse ORDER BY brukernavn;";
    $sqlResultat=mysqli_query($db,$sqlSetning) or die ("<p>Ikke mulig å hente data fra databasen</p>");
    $antallRader=mysqli_num_rows($sqlResultat);

    for ($r=1;$r<=$antallRader;$r++)
    {
        $rad=mysqli_fetch_array($sqlResultat);
        $brukernavn=$rad["brukernavn"];
        $fornavn=$rad["fornavn"];
        $etternavn=$rad["etternavn"];
        $klassekode=$rad["klassekode"];
        $klassenavn=$rad["klassenavn"];
        $bildenr=$rad["bildenr"];
        print ("<option value='$brukernavn'> $etternavn $fornavn $klassekode</option>");
    }
?>