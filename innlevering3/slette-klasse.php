<?php
/**
 * Created by PhpStorm.
 * User: wexnox
 * Date: 22.02.2016
 * Time: 20.19
 */
    include ("start.html");
?>
<script src="funksjoner.js"></script>
    <div class="row">
<div class="col-md-3">
<h3>Slette klasse</h3>
<form method="post" action="" id="sletteKlasseSkjema" name="sletteKlasseSkjema" onsubmit="return bekreft()">
<div class="form-group">
    <label>Klassekode</label>
    <select class="form-control" name="klassekode" id="klassekode">
        <?php include ("listeboks-klassekode.php"); ?>
    </select>

    <button class='btn btn-default' type="submit" value="#" name="sletteKlasseKnapp" id="sletteKlasseKnapp"/>Slett klasse</button>
</form>
</div>
<?php
    @$sletteKlasseKnapp=$_POST ["sletteKlasseKnapp"];
        if ($sletteKlasseKnapp)
        {
            $klassekode=$_POST["klassekode"];
            $sqlSetning="DELETE FROM klasse WHERE klassekode='$klassekode';";
            mysqli_query($db,$sqlSetning) or die ("<p>Ikke mulig å slette data i databasen</p>");

            print("<p>Følgende klasse er slettet: $klassekode</p> <br />");
            print ("</div>");
        }

    include ("slutt.html");
?>