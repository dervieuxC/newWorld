<?php
	mysql_connect("localhost", "adminDBNewWorld", "xuactf42" ) or die("Erreur de connexion à mysql");
	// Sélection de la base coursphp
	mysql_select_db("dbNewWorld" ) or die("Impossible de sélectionner cette base de données");

	$requete1="set names utf8;";
	$res1=mysql_query($requete1);

	$requete= "select concat(utilisateur.villeU,',France') as location, true as stopover from visite inner join ControleProducteur on visite.idVisite=ControleProducteur.idVisite inner join utilisateur on ControleProducteur.idU=utilisateur.idU where visite.controleur=".$_GET["idControleur"].";";

	$result = mysql_query($requete);

	while($donnees=mysql_fetch_assoc($result))
	{
		if($donnees["stopover"]==1)
		{
			$donnees["stopover"]=TRUE;
		}
		$res[] =$donnees;
	}
	echo json_encode($res);
?>