<?php
/**
 * Created by PhpStorm.
 * User: wexnox
 * Date: 02.03.2016
 * Time: 17.24
 * Drop-down for nåværende klassekode
 */
    include ("base/db-tilkobling.php");
    include ('check.php');
    $sqlSetning="SELECT * FROM klasse ORDER BY klassekode;";
    $sqlResultat=mysqli_query($db,$sqlSetning) or die ("<p>Ikke mulig å hente data fra databasen</p>");

    $antallRader=mysqli_num_rows($sqlResultat);

    for ($r=1;$r<=$antallRader;$r++)
    {
        $rad=mysqli_fetch_array($sqlResultat);
        $klassekode=$rad['klassekode'];
        $klassenavn=$rad['klassenavn'];
        print ("<option value='$klassekode'>$klassekode $klassenavn </option>");
    }
?>