<?php
	include("start.html");
?>
	<form method="post" action="visklasseliste.php" id="visklasseliste.php" name="visklasseliste.php"> 
    Søk i klasseliste: 	<input type="search" name="sok" id="sok" required onFocus="bgyellow(this)" onblur="bgwhite(this)" />
    					<input type="submit" />
    </form>
<?php
	include("slutt.html");
?>
	