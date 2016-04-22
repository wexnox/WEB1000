<?php
/**
 * Created by PhpStorm.
 * User: wexnox
 * Date: 19.03.2016
 * Time: 02.40
 */

include ("base/start.php");
include ('check.php');
?>
    <div class="row">
        <div class="col-md-4">
            <h3>Registrerte bilder</h3>
                <form action="" method="post" enctype="multipart/form-data" id="registrerBildeSkjema" name="registrerBildeSkjema">
                    <div class="form-group">
                        <label>Bildenr</label>
                        <input class="form-control" type="text" id="bildenr" name="bildenr" required placeholder="Bildenr">
                    </div>
                    <div class="form-group">
                        <label for="beskrivelse">Beskrivelse</label>
                        <input class="form-control" type="text" id="beskrivelse" name="beskrivelse" required placeholder="beskrivelse">
                    </div>
                    <div class="form-group">
                        <label for="fil">Bilde</label>
                        <input type="file" id="fil" name="fil" size="60" placeholder="Bilde">
                    </div>
                    <button class="btn btn-default" type="submit" value="#" id="registrerBildeKnapp" name="registrerBildeKnapp">Registrer bilde</button>
                    <button class="btn btn-default" type="reset" id="nullstill" name="nullstill">Nullstill</button>
                </form>

<?php
@$registrerBildeKnapp=$_POST["registrerBildeKnapp"];
if ($registrerBildeKnapp)
    {
        $bildenr=$_POST["bildenr"];
        $beskrivelse=$_POST["beskrivelse"];

        $filnavn=$_FILES ["fil"]["name"];
        $filtype=$_FILES ["fil"]["type"];
        $filstorrelse=$_FILES["fil"]["size"];
        $tmpnavn=$_FILES ["fil"]["tmp_name"];
        $nyttnavn="D:\\Sites\\home.hbv.no\\phptemp\\140020/".$filnavn;

        if (!$bildenr || !$beskrivelse || !$filnavn)
        {
            print ("Alle felt må fylles ut og bilde må velges");
        }
        else
        {
            include ("base/db-tilkobling.php");

            if ($filtype !="image/gif" && $filtype !="image/jpeg" && $filtype !="image/png")
            {
                print ("Det er kun tillat å laste opp bilder");
            }
            elseif ($filstorrelse > 5000000 )
            {
                print ("Bildet er for stor til å kunne lastes opp");
            }
            else
            {
                $sqlSetning="SELECT * FROM bilde WHERE bildenr='$bildenr';";
                $sqlResultat=mysqli_query($db,$sqlSetning) or die ("Ikke mulig å hente data fra databasen");
                $antallRader=mysqli_num_rows($sqlResultat);

                if ($antallRader !=0)
                {
                    print ("Bildet er registrert fra før");
                }
                else
                {
                    move_uploaded_file($tmpnavn,$nyttnavn) or die ("Ikke mulig å laste opp fil");

                    $sqlSetning="INSERT INTO bilde (bildenr,filnavn,beskrivelse) VALUES ('$bildenr','$filnavn','$beskrivelse');";
                    mysqli_query($db,$sqlSetning) or die ("Ikke mulig å registrere data i databasen");

                    print ("Følgende bilde er nå registrert: <br />Bildenr: $bildenr <br /> filnavn: $filnavn <br /> beskrivelse: $beskrivelse <br />");
                    print ("</div>");
                    
                }
            }
        }
    }
include ("base/slutt.php");
?>