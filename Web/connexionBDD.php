<?php
	$co=mysql_connect("localhost", "adminDBNewWorld", "xuactf42" ) or die("Erreur de connexion à mysql");
	// Sélection de la base coursphp
	mysql_select_db("dbNewWorld" ) or die("Impossible de sélectionner cette base de données");
	mysql_set_charset('utf8',$co);
?>