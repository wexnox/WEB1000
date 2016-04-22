<?php
/**
 * Created by PhpStorm.
 * User: wexnox
 * Date: 23.02.2016
 * Time: 09.49
 */
include ("start.html");
?>
<div class="row">
    <div class="col-md-6">

        <h3>Endre student</h3>
        <form method="post" action="" id="finnStudentSkjema" name="finnStudentSkjema">
            <div class="form-group">
                <label for="student">Student</label>
                <select name='brukernavn' id='brukernavn' class='form-control'>
                    <option>-- velg --</option>
                    <?php include ("listeboks-student.php"); ?>
                </select>
            </div>

            <button class='btn btn-default' value="#" type="submit" name="finnStudentKnapp" id="finnStudentKnapp">Finn student</button>
        </form>
    
    <?php
    @$finnStudentKnapp=$_POST["finnStudentKnapp"];
    if ($finnStudentKnapp)
    {
        $brukernavn=$_POST["brukernavn"];
        $sqlSetning="SELECT * FROM student WHERE brukernavn='$brukernavn';";
        $sqlResultat=mysqli_query($db,$sqlSetning) or die ("<p>Ikke mulig å hente data fra databasen</p>");
        $antallRader=mysqli_num_rows($sqlResultat);

        if ($antallRader==0)
        {
            print ("<p>Angitt student er ikke registrert</p> <br />");
        }
        else
        {
            $rad=mysqli_fetch_array($sqlResultat);
            $brukernavn=$rad["brukernavn"];
            $fornavn=$rad["fornavn"];
            $etternavn=$rad["etternavn"];
            $klassekode=$rad["klassekode"];


            print ("<form method='post' action='' id='endreStudentSkjema' name='endreStudentSkjema'>");
            print ("<div class='col-md-6'>");
            print ("<br><h4>Endre student</h4>");
            print ("<div class='form-group'><label>Brukernavn</label>  <input class='form-control' type='text' value='$brukernavn' name='brukernavn' id='brukernavn' readonly /></div>");
            print ("<div class='form-group'><label>Fornavn</label>     <input class='form-control' type='text' value='$fornavn' name='fornavn' id='fornavn' required /></div>");
            print ("<div class='form-group'><label>Etternavn</label>   <input class='form-control' type='text' value='$etternavn' name='etternavn' id='etternavn' required /></div>");
            print ("<div class='form-group'><label>Nåværende Klassekode</label>  <input class='form-control' type='text' value='$klassekode' name='klassekode' id='klassekode' readonly $klassenavn/></div>");
            print ("<div class='form-group'><label>Klassekode</label><select value='$klassekode' class='form-control'  name='klassekode' id='klassekode'>");



            include_once ("listeboks-endre-student-klassekode.php");

            print ("</select>");
            print ("</div>");
            print ("<button class='btn btn-default' type='submit' value='#' name='endreStudentKnapp' id='endreStudentKnapp'>Endre student</button>");
            print ("</div></div>");
            print ("</form>");
        }
    }

    @$endreStudentKnapp=$_POST["endreStudentKnapp"];
    if ($endreStudentKnapp)
    {

        $brukernavn=$_POST["brukernavn"];
        $fornavn=$_POST["fornavn"];
        $etternavn=$_POST["etternavn"];
        $klassekode=$_POST["klassekode"];


        if (!$brukernavn || !$fornavn || !$etternavn || !$klassekode )
        {
            print ("<p>Alle felt må fylles ut</p>>");
        }
        else
        {
            $sqlSetning="UPDATE student SET fornavn='$fornavn' , etternavn='$etternavn' , klassekode='$klassekode' WHERE brukernavn='$brukernavn';";
            mysqli_query($db,$sqlSetning) or die ("Ikke mulig å endre data i databasen");
            print ("Student med brukernavn;$brukernavn fornavn:$fornavn  etternavn:$etternavn  klassekode:$klassekode er endret ");

        }
    }
    include ("slutt.html");

    ?>
