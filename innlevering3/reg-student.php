<?php
/**
 * Created by PhpStorm.
 * User: wexnox
 * Date: 21.02.2016
 * Time: 17.48
 */
include ('start.html');
?><div class="row">
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
            <button class='btn btn-default' value="#" type="submit" id="registrerStudentKnapp" name="registrerStudentKnapp">Registere Student</button>
            <button class='btn btn-default' type="reset" id="nullstill" name="nullstill">Nullstill</button>
        </div>
    </form>
</div>
<p id="melding"></p>
<script src="funksjoner.js"></script>
<?php
    @$registrerStudentKnapp = $_POST ["registrerStudentKnapp"];
        if ($registrerStudentKnapp)
        {
            $brukernavn=$_POST ["brukernavn"];
            $fornavn=$_POST ["fornavn"];
            $etternavn=$_POST ["etternavn"];
            $klassekode=$_POST ['klassekode'];
            if(!$brukernavn || !$fornavn || !$etternavn)
            {
                print ("<p>Alle felt må fylles ut</p>");
            }
            else
            {
                include ('db-tilkobling.php');
                    $sqlSetning="SELECT * FROM student WHERE brukernavn='$brukernavn'";
                    $sqlResultat=mysqli_query($db,$sqlSetning) or die ("<p>Ikke mulig å hente data fra database serveren</p>");
                    $antallRader=mysqli_num_rows($sqlResultat);

                    if ($antallRader !=0)
                    {
                        print ("<p>Studenten er registrert fra før</p>");
                    }
                    else
                    {
                        $sqlSetning="INSERT INTO student (brukernavn,fornavn, etternavn, klassekode) VALUES ('$brukernavn','$fornavn','$etternavn','$klassekode');";
                        mysqli_query($db,$sqlSetning) or die("Ikke mulig å registrere data i databasen");

                        print ("<p>Følgende data om student er nå registrert: $brukernavn $fornavn $etternavn $klassekode</p>");
                        print ("</div>");
                    }
                }
        }
include ("slutt.html");
?>