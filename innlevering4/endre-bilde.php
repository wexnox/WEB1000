<?php
/**
 * Created by PhpStorm.
 * User: wexnox
 * Date: 19.03.2016
 * Time: 02.47
 */
    include ("base/start.php");
    include ('check.php');
?>
    <div class="row" xmlns="http://www.w3.org/1999/html">
        <div class="col-md-4">
            <h3>Endre bildebeskrivelse</h3>
                <form action="" method="post" name="finnBildeSkjema" id="finnBildeSkjema">
                <div class="form-group">
                    <label for="bildenr">Bilde</label>
                    <select class="form-control" name="bildenr" id="bildenr">
                        <option value="">-- velg --</option>
                        <?php include ("listeboks-bildenr.php"); ?>
                    </select>
                </div>
                    <button class="btn btn-default" type="submit" value="Finn bilde" name="finnBildeKnapp" id="finnBildeKnapp">Finn bilde</button>
                </form>

<?php
@$finnBildeKnapp=$_POST{"finnBildeKnapp"};
    if ($finnBildeKnapp)
    {
        $bildenr=$_POST["bildenr"];
    
        $sqlSetning="SELECT * FROM bilde WHERE bildenr='$bildenr';";
        $sqlResultat=mysqli_query($db,$sqlSetning) or die ("Ikke mulig å hente data fra databasen");
    
        $antallRader=mysqli_num_rows($sqlResultat);
    
        if ($antallRader==0)
        {
            print ("Angitt bilde er ikke registrert <br />");
        }
        else
        {
            $rad=mysqli_fetch_array($sqlResultat);
            $bildenr=$rad["bildenr"];
            $filnavn=$rad["filnavn"];
            $beskrivelse=$rad["beskrivelse"];
    
            print ("<form method='post' action='' id='endreBildeSkjema' name='endreBildeSkjema'>");
            print ("<div class='form-group'><label>Bildenr</label> <input class='form-control' type='text' value='$bildenr' name='bildenr' id='bildenr' readonly ></div>");
            print ("<div class='form-group'><label>Filnavn</label> <input class='form-control' type='text' value='$filnavn' name='filnavn' id='filnavn' readonly ></div>");
            print ("<div class='form-group'><label>Beskrivelse</label> <input class='form-control' type='text' value='$beskrivelse' name='beskrivelse' id='beskrivelse' required ></div>");
            print ("<button class='btn btn-default' type='submit' value='Endre bilde' name='endreBildeKnapp' id='endreBildeKnapp'>Endre bildebeskrivelse</button>");
            print ("</form>");
    
        }
    }
@$endreBildeKnapp=$_POST["endreBildeKnapp"];
    if ($endreBildeKnapp)
    {
        $bildenr=$_POST["bildenr"];
        $filnavn=$_POST["filnavn"];
        $beskrivelse=$_POST["beskrivelse"];
    
        if (!$bildenr || !$filnavn || !$beskrivelse)
        {
            print ("Alle felt må fylles ut");
        }
        else
        {
            $sqlSetning="UPDATE bilde SET filnavn='$filnavn' , beskrivelse='$beskrivelse' WHERE bildenr='$bildenr';";
            mysqli_query($db,$sqlSetning) or die ("Ikke mulig å endre data i databasen");
            print ("Bildet med bildenr $bildenr er nå endret <br />");
        }
    }
    include ("base/slutt.php");
?>