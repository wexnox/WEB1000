// JavaScript Document
////Klasse
function validerRegistrerklasse() {
"use strict";
	var klassekode = document.getElementById("klassekode").value;
	var klassenavn = document.getElementById("klassenavn").value;
	var feilmelding = "";
		if (!klassekode)  // Er klassekode er ikke korrekt fylt ut? 
			{
				feilmelding = "klassekode er ikke korrekt fylt ut <br />";
			}
		if (!klassenavn)  // Er klassenavn er ikke fylt ut? 
			{
				feilmelding = feilmelding + "klassenavn er ikke fylt ut <br />";
			}
		if (klassekode && klassenavn)  // Er alle felt er korrekt fylt ut 
			{
				return true;
			}
		else
			{
				document.getElementById("melding").style.color="red";	
				document.getElementById("melding").innerHTML=feilmelding;	
				return false;
			}	
}