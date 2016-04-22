<?php
/**
 * Created by PhpStorm.
 * User: wexnox
 * Date: 21.02.2016
 * Time: 17.48
 */
    include ('base/start.php');
    include ('check.php');
?>


    <div class="row">
        <div class="col-md-4">
            <h3>Register student</h3>
            <form method="post" action="" id="registrerKlasseSkjema" name="registrerKlasseSkjema" onSubmit="return validerRegistrerklasse()">
                <div class="form-group">
                    <label>Brukernavn</label>
                    <input class="form-control" type="text" id="brukernavn" name="brukernavn" required placeholder="brukernavn">
                   
                </div> 
                <div class="form-group">
                    <label>Fornavn</label>
                    <input class="form-control" type="text" id="fornavn" name="fornavn" required placeholder="Fornavn">
                </div>
                <div class="form-group">
                    <label>Etternavn</label>
                    <input class="form-control" type="text" id="etternavn" name="etternavn" required placeholder="Etternavn">
                </div>
                <div class="form-group">
                    <label>Klassekode</label>
                    <select class="form-control" name="klassekode" id="klassekode">
                        <?php include ('listeboks-student-klassekode.php'); ?>
                    </select>
                </div>

                <div class="form-group">
                    <label>Bildenr</label>
                    <input class="form-control" type="text" id="bildenr" name="bildenr" required placeholder="Bildenr">
                </div>
                <div class="form-group">
                    <label for="calender">Innleverings frist</label>
                    <input class="form-control" type="text" id="datepicker" name="datepicker" >
                </div>
                    <button class='btn btn-default' value="#" type="submit" id="registrerStudentKnapp" name="registrerStudentKnapp">Registere Student</button>
                    <button class='btn btn-default' type="reset" id="nullstill" name="nullstill">Nullstill</button>
            </form>
<p id="melding"></p>
<script src="js/funksjoner.js"></script>
<?php
    @$registrerStudentKnapp = $_POST ["registrerStudentKnapp"];
        if ($registrerStudentKnapp)
        {
            $brukernavn=$_POST ["brukernavn"];
            $fornavn=$_POST ["fornavn"];
            $etternavn=$_POST ["etternavn"];
            $klassekode=$_POST ["klassekode"];


            $bildenr=$_POST["bildenr"];
            $dato=$_POST["datepicker"];
            if(!$brukernavn || !$fornavn || !$etternavn || !$klassekode || !$bildenr)
            {
                print ("<p>Alle felt må fylles ut</p>");
            }
            else
            {
                include ('base/db-tilkobling.php');
                    $sqlSetning="SELECT * FROM student WHERE brukernavn='$brukernavn'";
                    $sqlResultat=mysqli_query($db,$sqlSetning) or die ("<p>Ikke mulig å hente data fra database serveren 11</p>");
                    $antallRader=mysqli_num_rows($sqlResultat);

                    if ($antallRader !=0)
                    {
                        print ("<p>Studenten er registrert fra før</p>");
                    }
                    else
                    {
                        $sqlSetning="INSERT INTO student (brukernavn, fornavn, etternavn, klassekode, bildenr, leveringsfrist) VALUES ('$brukernavn','$fornavn','$etternavn','$klassekode','$bildenr','$dato');";
                        mysqli_query($db,$sqlSetning) or die("Ikke mulig å registrere data i databasen 22");

                        print ("<p>Følgende data om student er nå registrert:</p>");
                        print ("<strong>Brukernavn:</strong>$brukernavn<br>");
                        print ("<strong>Fornavn:</strong> $fornavn<br>");
                        print ("<strong>Etternavn:</strong>$etternavn<br>");
                        print ("<strong>Bildenr:</strong>$bildenr<br>");
                        print ("<strong>Klassekode:</strong>$klassekode<br>");
                        print ("<strong>Neste Innlevering</strong>$dato<br>");
                        print ("</div>");
                        print ("</div>");
                    }
                }
        }
include ("base/slutt.php");
?>