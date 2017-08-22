function validerRegistrerstudent()
{
	var feilmelding = "";
	if(document.regstudent.brukernavn.value == "") // tester om brukernavn er fylt ut
		{

			document.getElementById("melding").style.color="red";	
			document.getElementById("melding").innerHTML="Brukernavn er ikke korrekt fylt ut <br />";
			return false;
		}
	if(document.regstudent.fornavn.value == "") // tester om fornavn er fylt ut
		{

			document.getElementById("melding").style.color="red";
			document.getElementById("melding").innerHTML= "Fornavn er ikke fylt ut <br />";
			return false;
		}
	if(document.regstudent.etternavn.value == "") //tester om etternavn er fylt ut
		{

			document.getElementById("melding").style.color="red";
			document.getElementById("melding").innerHTML= "Etternavn er ikke fylt ut <br />";
			return false ;
		}
	if(document.regstudent.klassekode.value == "") // tester om klassekode er fylt ut
		{

			document.getElementById("melding").style.color="red";
			document.getElementById("melding").innerHTML= "Klassekode er ikke fylt ut <br />";
			return false;			
		}
	return (true );
}