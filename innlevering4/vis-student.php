<?php
/**
 * Created by PhpStorm.
 * User: wexnox
 * Date: 21.02.2016
 * Time: 17.48
 */
    include ("base/start.php");
    include ("base/db-tilkobling.php");
    include ('check.php');
    $sqlSetning="SELECT * FROM student ORDER BY brukernavn;";
    $sqlResultat=mysqli_query($db,$sqlSetning) or die ("<p>Ikke mulig å hente data fra databasen</p>");
    $antallRader=mysqli_num_rows($sqlResultat);
    print ("<div class='col-md-6'>");
    print ("<h3> Registrerte studenter </h3>");
    print ("<table class='table table-striped table-bordered table-responsive table-hover'");
    print ("<tr><th align='left'>Brukernavn</th><th align='left'>Fornavn</th><th align='left'>Etternavn</th><th align='left'>Klassekode</th><th align='left'>Innleverings frist</th></tr>");
        for ($r=1;$r<=$antallRader;$r++)
        {
            $rad=mysqli_fetch_array($sqlResultat);
            $brukernavn=$rad['brukernavn'];
            $fornavn=$rad['fornavn'];
            $etternavn=$rad['etternavn'];
            $klassekode=$rad['klassekode'];
            $dato=$rad['leveringsfrist'];
            print ("<tr><td>$brukernavn</td><td>$fornavn</td><td>$etternavn</td><td>$klassekode</td><td>$dato</td></tr>");
        }
        print ("</div>");
        print ("</table>");
    include ("base/slutt.php");
?>