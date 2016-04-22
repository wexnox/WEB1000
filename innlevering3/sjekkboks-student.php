<?php
/**
 * Created by PhpStorm.
 * User: wexnox
 * Date: 23.02.2016
 * Time: 18.47
 */
    include ("db-tilkobling.php");

    $sqlSetning="SELECT * FROM student ORDER BY brukernavn;";
    $sqlResultat=mysqli_query($db,$sqlSetning) or die ("<p>Ikke mulig å hente data fra databasen</p>");
    $antallRader=mysqli_num_rows($sqlResultat);
    //print ("<select name='brukernavn' id='brukernavn'>");
    for ($r=1;$r<=$antallRader;$r++)
    {
        $rad=mysqli_fetch_array($sqlResultat);
        $brukernavn=$rad["brukernavn"];
        $fornavn=$rad["fornavn"];
        $etternavn=$rad["etternavn"];
        $klassekode=$rad["klassekode"];

        print ("<input type='checkbox' id='studentBrukerNavn' name='studentBrukerNavn[]' value='$brukernavn $fornavn $etternavn $klassekode'/> $brukernavn $etternavn $fornavn $klassekode <br />");
    }
?>
<?php
