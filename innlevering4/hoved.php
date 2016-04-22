<?php
/**
 * Created by PhpStorm.
 * User: wexnox
 * Date: 23.03.2016
 * Time: 23.26
 */
    session_start();
    @$innloggetBruker=$_SESSION["brukernavn"];
        if (!$innloggetBruker) {
            print ("Denne siden krever innlogging <br />");
        }
        else {
            include ("base/start.php");
            print ("<div class='row'><div class='col-md-8'>");
            print ("<h3>Velkommen til startsiden</h3>");
            print ("<h4>Du er logget inn som $innloggetBruker</h4>");
            print ("<p>I menyen til venstre finner du ulike valg som kan utføres ved bruk av denne applikasjonen</p></div></div>");
            include ("base/slutt.php");
        }
?>