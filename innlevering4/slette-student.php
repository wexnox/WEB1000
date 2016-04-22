<?php
/**
 * Created by PhpStorm.
 * User: wexnox
 * Date: 22.02.2016
 * Time: 20.20
 */
    include ("base/start.php");
    include ('check.php');
?>
    <script src="js/funksjoner.js"></script>
    <div class="col-md-4">
        <h3>Velg den studenten du vil slette</h3>
        <form method="post" action="" id="studentBrukerNavn" name="sletteStudentSkjema" onsubmit="return bekreft()">
            <div class="form-group">
                <?php include ("sjekkboks-student.php"); ?>
            </div>
            <button class='btn btn-danger' type="submit" name="sletteStudentKnapp" id="sletteStudentKnapp" />Slett student</button>
        </form>
<?php
@$sletteStudentKnapp=$_POST["studentBrukerNavn"];
    if ($sletteStudentKnapp)
    {

        @$brukernavn=$_POST["studentBrukerNavn"]; // viktig at vi henter fra riktig her
        $antall=count($brukernavn);
        //if 0 selected
        if ($antall==0)
        {
            print ("<p>Ingen student ble valgt </p><br />");
        }
        else
        {
            for ($r=0;$r<$antall;$r++)
                {
                    $del=explode(" ", $brukernavn[$r]);
                    $brukernavn=$del[0];
                    $fornavn=$del[1];
                    $etternavn=$del[2];
                    $klassekode=$del[3];

                    $sqlSetning="DELETE FROM student WHERE brukernavn='$brukernavn' AND etternavn='$etternavn';";
                    mysqli_query($db,$sqlSetning) or die ("<p>Ikke mulig å slette data i databasen</p>");
                }
            print ("<p>De valgte studentene er nå slettet </p><br />");
        }
    }
include ("base/slutt.php");
?>