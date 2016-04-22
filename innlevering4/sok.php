<?php
/**
 * Created by PhpStorm.
 * User: wexnox
 * Date: 21.02.2016
 * Time: 20.46
 */
    include ("base/start.php");
    include ('check.php');
?>
<div class="row">
<div class="col-md-4">
    <form method="post" id="sokeSkjema" name="sokeSkjema">
    <div class="form-group">
        <h4>Søkestreng</h4>
        <input class="form-control" type="text" id="sokestreng" name="sokestreng" required placeholder="Søkeord"/>
        </div>
        <button class='btn btn-default' type="submit" value="#" id="sokeKnapp" name="sokeKnapp">Søk</button>
        <button class='btn btn-default' type="reset" value="#" id="nullstill" name="nullstill">Nullstill</button>
    </form>
<?php

    @$sokeKnapp = $_POST["sokeKnapp"];
// 1 Denne er for at den ikke skal kjøres automatisk før vi har trykket noe og
    if (isset($_POST["sokeKnapp"]))
// 2 slik at vi ikke får feil melding
    {

        $sokestreng = $_POST["sokestreng"];

        include("base/db-tilkobling.php");
        print ("<br><div class='alert alert-info' data='dissmisable' role='alert'>Føglene treff for: <strong>$sokestreng</strong></div>");
        // Klasse
        $sqlSetning = "SELECT * FROM klasse WHERE klassekode LIKE '$sokestreng' OR klassenavn LIKE '$sokestreng%' ;";
        $sqlResultat = mysqli_query($db, $sqlSetning) or die ("Ikke mulig å hente data fra databasen");
        $antallRader = mysqli_num_rows($sqlResultat);
        //table print
        if ($antallRader == 0) {
            print ("<p>Ingen treff i Klasse-tabellen</p>");
        } else {
            print ("<div class='row'>");
            print ("<div class='col-md-6'>");
            print ("<h4>Treff i Klasse-tabellen</h4>");
            print ("<table class='table table-striped table-bordered table-responsive table-hover' ");
            print ("<tr><th align='left'>klassegkode</th> <th align='left'>klassenavn</th> </tr>");

            for ($r = 1; $r <= $antallRader; $r++) {
                $rad = mysqli_fetch_array($sqlResultat);
                $klassekode = $rad["klassekode"];
                $klassenavn = $rad["klassenavn"];


                $tekst = "<tr>  <td>$klassekode</td> <td>$klassenavn</td>  </tr>";
                $tekstlengde = strlen($tekst);
                $sokestrenglengde = strlen($sokestreng);
                $startpos = stripos($tekst, $sokestreng);

                $hode = substr($tekst, 0, $startpos);
                $hale = substr($tekst, $startpos + $sokestrenglengde, $tekstlengde - $startpos - $sokestrenglengde);

                print ("$hode<strong>$sokestreng</strong>$hale");
            }
            print ("</table></br />");
            print('</div></div>');
        }
// STUDENT
        $sqlSetning = "SELECT * FROM student WHERE brukernavn LIKE '%$sokestreng%' OR etternavn LIKE '%$sokestreng%' OR fornavn LIKE '%$sokestreng%' OR klassekode LIKE '%$sokestreng%';";
        $sqlResultat = mysqli_query($db, $sqlSetning) or die ("<p>Ikke mulig å hente data fra databasen</p>");
        $antallRader = mysqli_num_rows($sqlResultat);
//table print
        if ($antallRader == 0) {
            print ("<div class='alert alert-info' data='dissmisable' role='alert'>Ingen treff i Student-tabellen</div>");
        } else {
            print ("<div class='row'>");
            print ("<div class='col-md-6'>");
            print ("<h4>Treff i student-tabellen</h4>");
            print ("<table class='table table-striped table-bordered table-responsive table-hover' ");
            print ("<tr><th align='left'>Brukernavn</th> <th align='left'>Etternavn</th> <th align='left'>Fornavn</th> <th align='left'>Klassekode</th> </tr>");

            for ($r = 1; $r <= $antallRader; $r++) {
                $rad = mysqli_fetch_array($sqlResultat);
                $brukernavn = $rad["brukernavn"];
                $etternavn = $rad["etternavn"];
                $fornavn = $rad["fornavn"];
                $klassekode = $rad["klassekode"];

                $tekst = "<tr> <td>$brukernavn</td> <td>$etternavn</td> <td>$fornavn</td> <td>$klassekode</td> </tr>";
                $tekstlengde = strlen($tekst);
                $sokestrenglengde = strlen($sokestreng);
                $startpos = stripos($tekst, $sokestreng);

                $hode = substr($tekst, 0, $startpos);
                $hale = substr($tekst, $startpos + $sokestrenglengde, $tekstlengde - $startpos - $sokestrenglengde);

                print ("$hode<strong>$sokestreng</strong>$hale");
            }
            print ("</table></br />");
            print ("</div></div>");
        }

    }

    include ("base/slutt.php");

?>