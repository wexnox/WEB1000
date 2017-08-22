// Explains whats required to submit the form klasse
function musInnklasse(element)
{
"use strict";
 document.getElementById("melding").style.color="black";

   if (element === document.getElementById("klassekode"))
	{
	  document.getElementById("melding").innerHTML="Klassekode skal bestå av 2 bokstaver og 1 tall";
	}
   if (element === document.getElementById("klassenavn"))
	{
	  document.getElementById("melding").innerHTML="Klassenavn må fylles ut";
	}
}  
document.onclick = musInnklasse();

// Explains whats required to submit the form
function musInnstudent(element)
{
"use strict";
 document.getElementById("melding").style.color="black";

   if (element === document.getElementById("brukernavn"))
	{
	  document.getElementById("melding").innerHTML="Brukernavn må fylles ut";
	}
   if (element === document.getElementById("fornavn"))
	{
	  document.getElementById("melding").innerHTML="Fornavn må fylles ut";
	}
   if (element === document.getElementById("etternavn"))
	{
	  document.getElementById("melding").innerHTML="Etternavn må fylles ut";
	}
   if (element === document.getElementById("klassekode"))
	{
	  document.getElementById("melding").innerHTML="Klassekode skal bestå av 2 bokstaver og 1 tall";
	}  
}  
document.onclick = musInnstudent();
function musUt()
{
	"use strict";
document.getElementById("melding").innerHTML="";
}