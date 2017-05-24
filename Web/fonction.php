<?php
/*
*@brief inscription
*fonction permettant d'envoyer les données saisie par l'utilisateur dans le formulaire d'inscription dans la base de *données 
*/
function inscription()
{	
	// Connexion à MySQL  
	mysql_connect("localhost", "adminDBNewWorld", "xuactf42" ) or die("Erreur de connexion à mysql");
	// Sélection de la base coursphp
	mysql_select_db("dbNewWorld" ) or die("Impossible de sélectionner cette base de données");
	//récupérer les informations entrer par l'utilisateur
	$nomInscription=$_POST['nom'];
	$prenomInscription=$_POST['prenom'];
	$pseudoInscription=$_POST['pseudo'];
	$emailInscription=$_POST['email'];
	$rueInscription=$_POST['rue'];
	$CPInscription=$_POST['codePostale'];
	$villeInscription=$_POST['ville'];
	$telInscription=$_POST['telephone'];
	$questionInscription=$_POST['question'];
	$reponseInscription=$_POST['reponse'];
	$statutInscription=$_POST['status'];
	$dateJour=date("m.d.y");
	$mdpInscription=chaine_aleatoire(8);
	$idInscription=maxId()+1;
	if ($statutInscription=='Producteur')
	{
		$ibanInscription=$_POST['iban'];
		$siretInscription=$_POST['siret'];
	}
	if ($statutInscription=='PointDeVente')
	{
		$ibanInscription=$_POST['iban'];
		$siretInscription=$_POST['siret'];
		//$horaireInscription
	}
	$texteRequete="insert into User values ($idInscription,'$nomInscription','$prenomInscription','$telInscription','$statutInscription','$emailInscription','$pseudoInscription','$mdpInscription','$dateJour',1,1,'$rueInscription');";
	echo $texteRequete;
	$resultat=mysql_query($texteRequete) or die ("erreur sql");
	envoyeMailPremierMDP($mdpInscription);
	return $resultat;
	//mettre les informations récupérer dans la BDD	
}

function chaine_aleatoire($nb_car, $chaine = 'azertyuiopqsdfghjklmwxcvbn123456789')
{
    $nb_lettres = strlen($chaine) - 1;
    $generation = '';
    for($i=0; $i < $nb_car; $i++)
    {
        $pos = mt_rand(0, $nb_lettres);
        $car = $chaine[$pos];
        $generation .= $car;
    }
echo $generation;
    return $generation;
}

function maxId()
{
	// Connexion à MySQL  
	mysql_connect("localhost", "adminDBNewWorld", "xuactf42" ) or die("Erreur de connexion à mysql");
	// Sélection de la base coursphp
	mysql_select_db("dbNewWorld" ) or die("Impossible de sélectionner cette base de données");
	$texteRequete="select max(id) from User;";
	$resultat=mysql_query($texteRequete);//j'obtiens mon curseur
        $tabInfos=mysql_fetch_array($resultat);//il n'y a qu'une seule ligne renvoyee je la prend et la met ds un tableau
        $maxId=$tabInfos[0];//le premier champ sera ds la premiere case du tableau
	return $maxId;	
}

function envoyeMailPremierMDP($mdp)
{		
	$destinataire=$_POST['email'];
	$sujet="Inscription new world";
	$message="votre mot de passe est :"+$mdp;
	mail($destinataire,$sujet,$message,);
}
?>
