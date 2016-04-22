<?php
/**
 * Created by PhpStorm.
 * User: wexnox
 * Date: 23.02.2016
 * Time: 09.49
 */
    include ("base/start.php");
    include ('check.php');
?>
<div class="row">
<div class="col-md-4">
<h3>Endre klasse</h3>
<form method="post" action="" id="finnKlasseSkjema" name="finnKlasseSkjema">
<div class="form-group">
    <label>Klassekode</label>
    <select class="form-control" name="klassekode" id="klassekode">
    <option value="">-- velg --</option>
        <?php include ("listeboks-klassekode.php"); ?>
    </select>
    </div>
    <button class='btn btn-default' type="submit" value="#" name="finnKlasseKnapp" id="finnKlasseKnapp">Endre Klasse</button>
</form>
<br>
<?php
    @$finnKlasseKnapp=$_POST["finnKlasseKnapp"];
        if($finnKlasseKnapp)
        {
            $klassekode=$_POST ["klassekode"];
            $sqlSetning="SELECT * FROM klasse WHERE klassekode='$klassekode';";
            $sqlResultat=mysqli_query($db,$sqlSetning) or die ("<p>Ikke mulig å hente data fra databasen</p>");
            $antallRader=mysqli_num_rows($sqlResultat);
            if ($antallRader==0)
            {
                print ("<p>Angitt klasse er ikke registrert</p> <br />");
            }
            else
            {
                $rad=mysqli_fetch_array($sqlResultat);
                $klassekode=$rad["klassekode"];
                $klassenavn=$rad["klassenavn"];             
                print ("<form method='post' action='' id='endreKlasseKnapp' name='endreKlasseKnapp'> ");
                print ("<div class='form-group'><label>Klassekode</label> <input class='form-control' type='text' value='$klassekode' name='klassekode' id='klassekode' readonly></div>");
                print ("<div class='form-group'><label>Klassenavn</label> <input class='form-control' type='text' value='$klassenavn' name='klassenavn' id='klassenavn' required /></div>");
                print ("<button class='btn btn-default' type='submit' value='Endre klasse' name='endreKlasseKnapp' id='endreKlasseKnapp'>Endre klasse</button>");
                print ("</form>");

            }
        }
    @$endreKlasseKnapp=$_POST["endreKlasseKnapp"];
        if($endreKlasseKnapp)
        {
            $klassekode=$_POST["klassekode"];
            $klassenavn=$_POST["klassenavn"];
            if (!$klassekode || !$klassenavn)
            {
                print("<p>Alle felt må fylles ut</p>");
            }
            else
            {
                $sqlSetning="UPDATE klasse SET klassenavn='$klassenavn' WHERE klassekode='$klassekode';";
                mysqli_query($db,$sqlSetning) or die ("<p>Ikke mulig å endre data i databasen</p>");
                print ("Faget med klassekode $klassekode er endret");
                print ("</div>");
            }
        }
include ("base/slutt.php");
?>
