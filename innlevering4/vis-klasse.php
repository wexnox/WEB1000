<?php
/**
 * Created by PhpStorm.
 * User: wexnox
 * Date: 21.02.2016
 * Time: 17.47
 */
    include ("base/start.php");
    include ("base/db-tilkobling.php");
    include ('check.php');
    $sqlSetning="SELECT * FROM klasse ORDER BY klassekode;";
    $sqlResultat=mysqli_query($db,$sqlSetning) or die ("Ikke mulig å hente data fra databasen");
    $antallRader=mysqli_num_rows($sqlResultat);
    print ("<div class='col-md-6'>");
    print ("<h3> Registrerte klasser </h3>");
    print ("<table class='table table-striped table-bordered table-responsive table-hover' ");
    print ("<tr><th align='left'>Klassekode</th><th align='left'>Klassenavn</th></tr> ");
        for ($r=1;$r<=$antallRader;$r++) {
                $rad=mysqli_fetch_array($sqlResultat);
                $klassekode=$rad['klassekode'];
                $klassenavn=$rad['klassenavn'];
                print ("<tr><td>$klassekode</td> <td>$klassenavn</td></tr>");
            }
    print('</div>');
    print ("</table>");
    include ("base/slutt.php");
?>