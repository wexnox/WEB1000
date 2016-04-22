<?php
error_reporting(E_ALL);
ini_set("display_errors", 1);
/**
 * Created by PhpStorm.
 * User: wexnox
 * Date: 21.02.2016
 * Time: 02.14
 */
include ('base/start.php');
include ('check.php');
?>
<div class="row">
    <div class="col-md-4">
        <h3>Register klasse</h3>
        <form method="post" action="" id="registrerKlasseSkjema" name="registrerKlasseSkjema" onSubmit="return validerRegistrerklasse()">
            <div class="form-group">
                <label>Klassekode</label>
                <input class="form-control" type="text" id="klassekode" name="klassekode" required placeholder="Klassekode">
            </div>
            <div class="form-group">
                <label>Klassenavn</label>
                <input class="form-control" type="text" id="klassenavn" name="klassenavn" required placeholder="Klassenavn">
            </div>
                <button class='btn btn-default' value="#" type="submit" id="registrerKlasseKnapp" name="registrerKlasseKnapp">Registere klasse</button>
                <button class='btn btn-default' type="reset" id="nullstill" name="nullstill">Nullstill</button>
        </form>

    <p id="melding"></p>
<script src="js/funksjoner.js"></script>
<?php
// får ikke disse frem! pga IIS server?
error_reporting(E_ALL);
ini_set("display_errors", 1);
    @$registrerKlasseKnapp=$_POST["registrerKlasseKnapp"];
    if ($registrerKlasseKnapp)
        {
            $klassekode=$_POST ["klassekode"];
            $klassenavn=$_POST ["klassenavn"];

            if(!$klassekode || !$klassenavn)
                {
                    print ("<p>Alle felt må fylles ut</p>");
                }
            else
                {
                    include ("base/validering.php");
                    $lovligKlassekode=validerKlassekode($klassekode);

                    if (!$lovligKlassekode)
                    {
                        print ("<p>Klassekode er ikke korrekt fylt ut</p> <br />");
                    }
                    else
                    {
                        include("base/db-tilkobling.php");

                        $sqlSetning = "SELECT * FROM klasse WHERE klassekode='$klassekode';";
                        $sqlResultat = mysqli_query($db, $sqlSetning) or die ("<p>Ikke mulig å hente data fra database serveren</p>");
                        $antallRader = mysqli_num_rows($sqlResultat);

                        if ($antallRader != 0)
                        {
                            print ("<p>Klassen er registrert fra før</p>");
                        }
                        else
                        {
                            $sqlSetning = "INSERT INTO klasse (klassekode,klassenavn) VALUES ('$klassekode','$klassenavn');";
                            mysqli_query($db, $sqlSetning) or die("<p>Ikke mulig å registrere data i databasen</p>");
                            print ("<p>Følgende klasser er nå registrert: $klassekode $klassenavn</p>");

                        }
                    }
                }
        }

    include ("base/slutt.php");
?>
