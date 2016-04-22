<?php
/**
 * Created by PhpStorm.
 * User: wexnox
 * Date: 27.03.2016
 * Time: 20.47
 */

    include ("base/start.php");
    include ("base/db-tilkobling.php");
    include ('check.php');
?>
    <div class="row">
        <div class="col-md-4">
            <h3>Finn klassen</h3>
            <form method="post" action="" id="finnKlasseSkjema" name="finnKlasseSkjema">
                <div class="form-group">
                    <label for="klassekode">Velg klasse</label>
                    <select class="form-control" name="klassekode" id="klassekode">
                        <option value="">-- velg klasse --</option>
                            <?php include("listeboks-klassekode.php"); ?>
                    </select>

                </div>
                <button class="btn btn-default" type="submit"  value="#" name="finnKlasseKnapp" id="finnKlasseKnapp">Hent klasse</button>
            </form>

<?php
    @$finnKlasseKnapp=["finnKlasseKnapp"];
        if ($finnKlasseKnapp) {
            @$student=$_POST["klassekode"];
            $sqlSetning="SELECT student.fornavn,student.etternavn,student.klassekode,student.bildenr, bilde.filnavn FROM student LEFT JOIN bilde ON bilde.bildenr=student.bildenr WHERE klassekode='$student';";
            $sqlResultat=mysqli_query($db,$sqlSetning) or die ("<p>Ikke mulig å hente data fra databasen</p>");
            $antallRader=mysqli_num_rows($sqlResultat);

                if ($antallRader==0){
                    print ("");
                }
                else
            {
                    print ("<div class='col-md-12'>");
                    print ("<h3> Følgende studenter i valgte klasse </h3>");
                    print ("<table class='table table-striped table-bordered table-responsive table-hover' ");
                    print ("<tr><th align='left'>Fornavn</th><th align='left'>Etternavn</th><th align='left'>Bilde</th></tr> ");

                        for ($r = 1;$r<=$antallRader;$r++){
                            $rad = mysqli_fetch_array($sqlResultat);
                            $fornavn = $rad['fornavn'];
                            $etternavn = $rad['etternavn'];
                            $klassekode = $rad['klassekode'];
                            $bildenr = $rad ["bildenr"];
                            $filnavn = $rad ["filnavn"];

                            echo("<tr><td>$fornavn</td><td>$etternavn</td><td> <img src='https://home.hbv.no/phptemp/140020/$filnavn' alt='bilde'style='width: 100px;height: 80px;'> </td></tr>");
                        }
                    print ("</div>");
                    print ("</div>");
                    print ("</table>");
                    include("base/slutt.php");
                }
            }
?>