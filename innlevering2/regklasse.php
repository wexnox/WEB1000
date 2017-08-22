<?php
	include("start.html");
?>
  <form method="post" action="reg-klasse.php" name="registrereklasse" onSubmit="return validerRegistrerklasse()">
  	Klassekode	<input type="text" id="klassekode" name="klassekode"onMouseOver="musInnklasse(this); bgyellow(this)" onMouseOut="musUt(); bgwhite(this)" onFocus="bgyellow(this)" onblur="bgwhite(this)" onclick="musInnklasse(this)" required onChange="visStudent(this.value)" /> <br /> 
  	Klassenavn	<input type="text" id="klassenavn" name="klassenavn" onMouseOver="musInnklasse(this); bgyellow(this)" onMouseOut="musUt(); bgwhite(this)" onFocus="bgyellow(this)" onblur="bgwhite(this)" onclick="musInnklasse(this)" required onChange="fjernMelding()"/>  <br /> 
  				<input type="Submit" value="Submit" id="Submit" name="Submit"/>
  				<input type="reset" value="Nullstill" id="nullstill" name="nullstill"  /> <br /> 
  </form>
<p id="melding"></p>
<script src="musinklasse.js"></script>
<script src="klassekode.js"> </script>
<script src="validerregistrerklasse.js"></script>
<?php
	include("slutt.html");
?>