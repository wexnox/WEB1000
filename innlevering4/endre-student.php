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
    <div class="col-md-6">

        <h3>Endre student</h3>
        <form method="post" action="" id="finnStudentSkjema" name="finnStudentSkjema">
            <div class="form-group">
                <label for="brukernavn">Student</label>
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
            print ("<strong>Angitt student er ikke registrert</strong>");
        }
        else
        {
            $rad=mysqli_fetch_array($sqlResultat);
            $brukernavn=$rad["brukernavn"];
            $fornavn=$rad["fornavn"];
            $etternavn=$rad["etternavn"];
            $klassekode=$rad["klassekode"];
            // la til bildenr
            $bildenr=$rad["bildenr"];


            print ("<form method='post' action='' id='endreStudentSkjema' name='endreStudentSkjema'>");
            print ("<div class='col-md-6'>");
            print ("<br><h4>Endre student</h4>");
            print ("<div class='form-group'><label>Brukernavn</label>  <input class='form-control' type='text' value='$brukernavn' name='brukernavn' id='brukernavn' readonly /></div>");
            print ("<div class='form-group'><label>Fornavn</label>     <input class='form-control' type='text' value='$fornavn' name='fornavn' id='fornavn' required /></div>");
            print ("<div class='form-group'><label>Etternavn</label>   <input class='form-control' type='text' value='$etternavn' name='etternavn' id='etternavn' required /></div>");
            // drop down på bildenr

            print ("<div class='form-group'><label>Nåværende Bildenr</label><input class='form-control' type='text' value='$bildenr' name='bildenr' id='bildenr' readonly /></div>");
            print ("<div class='form-group'><label>Nytt bildenr</label><select value='$bildenr' class='form-control'  name='bildenr' id='bildenr'>");
            print ("<option selected='$bildenr'>$bildenr</option>");
            include_once ("listeboks-bildenr.php");
            print ("</select>");
            //            her starter klasse delen
            print ("<div class='form-group'><label>Nåværende Klassekode</label>  <input class='form-control' type='text' value='$klassekode' name='klassekode' id='klassekode' readonly $klassenavn/></div>");
            print ("<div class='form-group'><label>Klassekode</label><select value='$klassekode' class='form-control'  name='klassekode' id='klassekode'>");
            print ("<option selected='$klassekode'>$klassekode  </option>");
            include_once ("listeboks-endre-student-klassekode.php");
            // her slutter klasse delen
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
        $bildenr=$_POST["bildenr"];

        if (!$brukernavn || !$fornavn || !$etternavn || !$klassekode || !$bildenr)
        {
            print ("<strong>Alle felt må fylles ut</strong>");
        }
        else
        {
            $sqlSetning="UPDATE student SET fornavn='$fornavn' , etternavn='$etternavn' , klassekode='$klassekode' , bildenr='$bildenr' WHERE brukernavn='$brukernavn';";
            mysqli_query($db,$sqlSetning) or die ("Ikke mulig å endre data i databasen");
            print ("<p>Følgende student data er nå endret;</p>");
            print ("<strong>Brukernavn:</strong>$brukernavn<br>");
            print ("<strong>Fornavn:</strong> $fornavn<br>");
            print ("<strong>Etternavn:</strong>$etternavn<br>");
            print ("<strong>Bildenr:</strong>$bildenr<br>");
            print ("<strong>Klassekode:</strong>$klassekode<br>");
        }
    }
    include ("base/slutt.php");

    ?>
