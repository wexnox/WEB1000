// JavaScript Document
function fjernMelding()
{
	"use strict";
  document.getElementById("melding").innerHTML="";   
}  

function visStudent(klassekode)
{
	"use strict";
  var foresporsel=new XMLHttpRequest();  // oppretter request-objekt 
  
  foresporsel.onreadystatechange=function() 
    {
      if (foresporsel.readyState===4 && foresporsel.status===200)  // responsen er fullført og vellykket 
        {
          document.getElementById("melding").innerHTML=foresporsel.responseText;  // responsteksten legges i meldingsfeltet 
        }
    };

  foresporsel.open("GET","klassekode-vis-student.php?klassekode="+klassekode);  // angir metode og URL 
  foresporsel.send();  // sender en request 
}