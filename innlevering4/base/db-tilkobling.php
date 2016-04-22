<?php
/**
 * Created by PhpStorm.
 * User: wexnox
 * Date: 23.02.2016
 * Time: 09.49
 */
	$host="";
	$user="";
	$password="";
	$database="";
	
	$db=mysqli_connect($host,$user,$password,$database) or die ("<p>Ikke kontakt med database-serveren</p>");
	?>