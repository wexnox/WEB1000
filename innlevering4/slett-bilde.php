<?php
/**
 * Created by PhpStorm.
 * User: wexnox
 * Date: 19.03.2016
 * Time: 02.36
 */
include ("base/start.php");
include ('check.php');
?>

<script src="js/funksjoner.js"></script>

<div class="row">
    <div class="col-md-3">
        <h3>Slett bilde</h3>
        <div class="form-group">
            <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" id="slettBildeSkjema" name="slettBildeSkjema" >
                <label>Bilde</label>
                <select class='form-control' name='bildenr'>
                    <?php include ("listeboks-bildenr.php") ?>
                </select>
                <button class='btn btn-danger' value="#" type="submit" id="slettBilde" name="slettBilde">Slett Bilde</button>
            </form>
        </div>

        <?php

        @$bildenr=$_POST["bildenr"];
        if ($bildenr)
        {
            $bildenr=$_POST["bildenr"];

            $sqlSetning="SELECT bildenr FROM student WHERE bildenr='$bildenr';";
            $sqlResultat=mysqli_query($db,$sqlSetning) or die ("Ikke mulig å hente data fra databasen");

            $rad=mysqli_fetch_array($sqlResultat);
            $bilde_id=$rad["bildenr"];

            if($bilde_id == $bildenr) {

                print ("HAHAHA DU KAN IKKE SLETTE DETTE BILDE FORDI DET TILHØRER LASSE <br />");

            }

            elseif($bilde_id != $bildenr) {

                $sqlSetning="DELETE FROM bilde WHERE bildenr='$bildenr';";
                mysqli_query($db,$sqlSetning) or die ("Ikke mulig å slette data i databasen");

                $mappenavn="D:\\Sites\\home.hbv.no\\phptemp\\140020/".$filnavn;
                unlink ("$mappenavn") or die ("Ikke mulig å slette bilde på serveren");

                print ("Følgende bilde er nå slettet: $bildenr $filnavn <br />");

            }
        }
        ?>

        <?php

        include("base/slutt.php");

        ?>
