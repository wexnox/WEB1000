<?php
/**
 * Created by PhpStorm.
 * User: wexnox
 * Date: 23.03.2016
 * Time: 23.26
 */

?>

<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
<link rel="stylesheet" type="text/css" href="css/style.css" media="screen" title="stilark">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.10.0/css/bootstrap-select.min.css">
<div class="container">
    <div class="row">
        <div class="col-md-4">
            <h3>Registrer bruker</h3>
            <form action="" id="registrerBrukerSkjema" name="registrerBrukerSkjema" method="post">
                <div class="form-group">
                    <label>Brukernavn</label>
                    <input class="form-control" type="text" name="brukernavn" id="brukernavn" placeholder="Brukernavn">
                </div>
                <div class="form-group">
                    <label>Passord</label>
                    <input class="form-control" type="password" name="passord" id="passord" placeholder="Passord">
                </div>
                <button class='btn btn-default' type="submit" name="registrerBrukerKnapp" value="#">Registrer bruker</button>
                <button class='btn btn-default' type="reset" name="nullstill" id="nullstill" >Nullstill</button>
            </form>
<?php
@$registrerBrukerKnapp=$_POST["registrerBrukerKnapp"];
if ($registrerBrukerKnapp)
{
    include ("base/db-tilkobling.php");

    $brukernavn=$_POST["brukernavn"];
    $passord=$_POST["passord"];

    if ( !$brukernavn || !$passord)
    {
        print ("<strong><h4>Brukernavn og passord må fylles ut </h4> </strong><br /><br />");
    }
    else
    {
        $sqlSetning="SELECT * FROM bruker WHERE brukernavn='$brukernavn';";
        $sqlResultat=mysqli_query($db,$sqlSetning) or die ("<strong><h3>Ikke mulig å hente data fra databasen</h3> </strong><br />");

        if (mysqli_num_rows($sqlResultat) !=0)
        {
            print ("<strong><h3>Brukernavnet er registrert fra før</h3> </strong><br /> <br />");
        }
        else
        {
            $krypterPassord=md5($passord);
            $sqlSetning="INSERT INTO bruker VALUES ('$brukernavn', '$krypterPassord')";
            mysqli_query($db,$sqlSetning) or die ("<strong><h3>Ikke mulig å registrere data i databasen</h3> </strong><br />");

            print ("Brukernavn: $brukernavn er nå registrert <br />");
            print ("<a href='innlogging.php'> Gå til innloggingssiden </a>");
            print ("</div>");
            print ("</div>");
            print ("</div>");

        }
    }
}
?>