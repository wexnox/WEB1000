<?php
/**
 * Created by PhpStorm.
 * User: wexnox
 * Date: 19.03.2016
 * Time: 02.52
 */
    include ("base/start.php");
    include ("base/db-tilkobling.php");
    include ('check.php');

    $sqlSetning="SELECT * FROM bilde;";
    $sqlResultat=mysqli_query($db,$sqlSetning) or die ("Ikke mulig å hente data fra databasen");

    print ("<div class='col-md-6'>");
    print ("<h3>Registrerte bilder</h3>");
    print ("<table class='table table-striped table-bordered table-responsive table-hover' ");
    print ("<tr> <th align='left'>bildenr</th> <th align='left'>opplastingsdato</th> <th align='left'>filnavn</th> <th align='left'>beskrivelse</th> </tr>");

    $antallRader=mysqli_num_rows($sqlResultat);

        for ($r=1;$r<=$antallRader;$r++)
        {
            $rad = mysqli_fetch_array($sqlResultat);
            $bildenr = $rad["bildenr"];
            $opplastingsdato=$rad["opplastingsdato"];
            $filnavn = $rad["filnavn"];
            $beskrivelse=$rad["beskrivelse"];

            print ("<tr> <td>$bildenr</td> <td>$opplastingsdato</td><td><a href='https://home.hbv.no/phptemp/140020/$filnavn' target='_blank'>$filnavn</a> </td> <td>$beskrivelse</td> </tr>");
        }
    print('</div>');
    print ("</table>");
    include ("base/slutt.php");

?>