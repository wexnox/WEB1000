<?php
// får ikke disse frem! pga IIS server?
error_reporting(E_ALL);
ini_set("display_errors", 1);
/**
 * Created by PhpStorm.
 * User: wexnox
 * Date: 23.02.2016
 * Time: 18.19
 *
 */
function validerKlassekode($klassekode)
{
    $lovligKlassekode=true;

    // hvis den er tom
    if (!$klassekode)
    {
        $lovligKlassekode=false;
        print ("Klassekode må fylles ut");
    }
    // hvis det er mindre en tre bokstaver
    else if (strlen($klassekode) < 3)
    {
        $lovligKlassekode=false;
        print ("Klassekode må inneholde minst 3 tegn");

    }
    else if (ctype_alpha(substr($klassekode, -1)))
    {
        $lovligKlassekode=false;
        print ("Må ha tall på slutten");
    }
    else if (ctype_lower(substr($klassekode, 0, -1)))
    {
        $lovligKlassekode=false;
        print ("Klassekoden må inneholde kun store bokstaver og 1 tall på slutten");
    }
    else {
        for ($teller = 1; $teller <= 3; $teller++) {
            $tegn[$teller] = substr($klassekode, $teller - 1, 1);
        }
        if ($tegn[1] < "A" || $tegn[1] > "Z" || $tegn[2] < "A" || $tegn[2] > "Z" || $tegn[3] < "A" || $tegn[3] > "Z") {
            $lovligKlassekode = false;
        }
    }
    return $lovligKlassekode;
}
// det er veldig irriterende at denne ? > er redundant
?>