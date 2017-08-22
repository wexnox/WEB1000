<?php
	include("start.html");
?>
  <form method="post" action="regstudent.php" id="regstudent" name="regstudent" onSubmit="return (validerRegistrerstudent());">
Brukernavn<input type="text" id="brukernavn" name="brukernavn" onMouseOver="musInnstudent(this); bgyellow(this)" onMouseOut="musUt(); bgwhite(this)" onFocus="bgyellow(this)" onblur="bgwhite(this)" onclick="musInnstudent(this)" required onChange="fjernMelding()" /><br />
Fornavn	<input type="text" id="fornavn" name="fornavn" onMouseOver="musInnstudent(this); bgyellow(this)" onMouseOut="musUt(); bgwhite(this)" onFocus="bgyellow(this)" onblur="bgwhite(this)" onclick="musInnstudent(this)" required onChange="fjernMelding()" /><br />
Etternavn<input type="text" id="etternavn" name="etternavn"  onMouseOver="musInnstudent(this); bgyellow(this)" onMouseOut="musUt(); bgwhite(this)" onFocus="bgyellow(this)" onblur="bgwhite(this)" onclick="musInnstudent(this)" required onChange="fjernMelding()"/><br />
Klassekode<input type="text" id="klassekode" name="klassekode" onMouseOver="musInnstudent(this); bgyellow(this)" onMouseOut="musUt(); bgwhite(this)" onFocus="bgyellow(this)" onblur="bgwhite(this)" onclick="musInnstudent(this)" required onKeyUp="visStudent(this.value)" onChange="visStudent(this.value)"/><br />
        <input type="submit" value="Submit" id="Submit" name="Submit" />
        <input type="reset" value="Nullstill" id="nullstill" name="nullstill" /> <br />
  </form>
<p id="melding"></p>
	<script src="klassekode.js"> </script> 
	<script src="musinklasse.js"></script>
	<script src="validerregisterstudent.js"></script>
<?php
	include("slutt.html");
?>