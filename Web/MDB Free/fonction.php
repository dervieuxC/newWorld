<?php
include "connexionBDD.php";
/*
*@brief inscription
*fonction permettant d'envoyer les données saisie par l'utilisateur dans le formulaire d'inscription dans la base de *données 
*/
function inscription()
{	
	//récupérer les informations entrer par l'utilisateur
	$nomInscription=$_POST['nom'];
	$prenomInscription=$_POST['prenom'];
	$pseudoInscription=$_POST['pseudo'];
	$emailInscription=$_POST['email'];
	$telInscription=$_POST['telephone'];
	$dateJour=date("y-m-d");
	$mdpInscription=chaine_aleatoire(8);
	$idInscription=maxId()+1;
	$texteRequete="insert into utilisateur(idU,nomU,prenomU,pseudoU,emailU,telephoneU,idQuestion,idTypeU,dateInscriptionU,motDePasseU,etatU) values ($idInscription,'$nomInscription','$prenomInscription','$pseudoInscription','$emailInscription','$telInscription',1,3,'$dateJour','$mdpInscription','NVAL');";
	echo $texteRequete;
	$resultat=mysql_query($texteRequete) or die ("erreur sql");
	envoyeMailPremierMDP($mdpInscription);
	return $resultat;
	echo mysql_error();
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
    mysql_close();
}

function maxId()
{
	$texteRequete="select ifnull(max(idU),0) from utilisateur;";
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
	//mail($destinataire,$sujet,$message,);
}

function connexionSite($pseudo,$mdp)
{
	$texteRequete="select idU,etatU from utilisateur where pseudoU='".$pseudo."' and motDePasseU='".$mdp."';";
	echo $texteRequete;
	$resultat=mysql_query($texteRequete);
	$tabInfos=mysql_fetch_array($resultat);
	$idUser=$tabInfos[0];
	echo $idUser;
	$_SESSION["etatUtilisateur"]=$tabInfos[1];
	if(isset($idUser))
		{
			return $idUser;
		}
		else
		{
			return -1;
		}
}

function recupTypeUser ($idUser)
{
	$texteRequete="select idTypeU from utilisateur where idU=".$idUser.";";
	$resultat=mysql_query($texteRequete);
	$tabInfos=mysql_fetch_array($resultat);
	$typeU=$tabInfos[0];
	return $typeU;

}

function verifIniMdp ($mdp1,$mdp2)
{
	if($mdp1==$mdp2)
	{
		return TRUE;
	}
	else
	{
		return FALSE;
	}
}

function verifSuiteInscription($status,$siret,$iban)
{
	echo $siret;
	echo $status;
	if ($status=='producteur' || $status=='pointDeVente')
	{
		if (!((strlen($siret)==14) and (strlen($iban)==34)))
		{
			return FALSE;
		}
		else
		{
			return TRUE;
		}
	}
	else
	{
	return TRUE;
	}	
}

function recupQuestion()
{
	$texteRequete="select libelleQuestion from question where libelleQuestion!='Pas de Question';";
	$resultat=mysql_query($texteRequete);
	return $resultat;
}

function finInscription($question,$rep)
{
	$mdp=$_SESSION["mdpUtilisateur"];
	$adresse=$_SESSION["adresseUtilisateur"];
	$cp=$_SESSION["cpUtilisateur"];
	$ville=$_SESSION["villeUtilisateur"];
	$siret=$_SESSION["siretUtilisateur"];
	$iban=$_SESSION["ibanUtilisateur"];
	$requeteType="select idTypeU from typeUtilisateur where libelletypeU='".$_SESSION["statusUtilisateur"]."';";
	$resType=mysql_query($requeteType);
	$tabType=mysql_fetch_array($resType);
	$type=$tabType[0];
	$requeteQuestion="select idQuestion from question where libelleQuestion='".$question."';";
	$resQuestion=mysql_query($requeteQuestion);
	$tabQuestion=mysql_fetch_array($resQuestion);
	$idQ=$tabQuestion[0];
	if ($type==1)
	{
		$etat='AVIS';
	}
	else
	{
		$etat='VAL';
	}
	echo $idQ;
	echo $rep;
	echo $mdp;
	echo $adresse;
	echo $cp;
	echo $ville;
	echo $siret;
	echo $etat;
	echo $_SESSION["idUser"];
	$texteRequete="update utilisateur set  motDePasseU='".$mdp."' , adresseU='".$adresse."' , codePostalU='".$cp."' , villeU='".$ville."' , siretU='".$siret."' , idTypeU=".$type." , idQuestion=".$idQ." , reponseU='".$rep."' , etatU='".$etat."' , ibanU='".$iban."' where idU=".$_SESSION["idUser"]." ;";
	echo $texteRequete;

	mysql_query($texteRequete);
	echo mysql_error();
}

function recupRayon()
{
	$texteRequete="select libelleRay from rayon;";
	$resultat=mysql_query($texteRequete);
	return $resultat;
}

function recupCat($rayon)
{
	$texteRequete="select libelleCat from categorie inner join rayon on rayon.idRay=categorie.idRay where libelleRay='".$rayon."' ;";
	$resultat=mysql_query($texteRequete);
	return $resultat;
}

function recupProfil()
{
	$texteRequete="select prenomU,nomU,adresseU,villeU,emailU,telephoneU,codePostalU,pseudoU,ibanU from utilisateur where idU=".$_SESSION["idUser"]." ;";
	$resultat=mysql_query($texteRequete);
	$tabU=mysql_fetch_array($resultat);
	return $tabU;
}

function mofifProfil($nom,$prenom,$adresse,$cp,$ville,$tel,$email,$pseudo,$iban)
{
	$texteRequete="update utilisateur set nomU='".$nom."' , prenomU='".$prenom."' , adresseU='".$adresse."' , codePostalU='".$cp."' , villeU='".$ville."' , telephoneU='".$tel."' , emailU='".$email."' , pseudoU='".$pseudo."' , ibanU='".$iban."' where idU=".$_SESSION["idUser"].";";
	mysql_query($texteRequete);
}

function recupProd($cat)
{
	$texteRequete="select libelleProd from produit inner join categorie on categorie.idCat=produit.idCat where libelleCat='".$cat."' and etatProd='VAL' and supprimeProd=0 ;";
	$resultat=mysql_query($texteRequete);
	return $resultat;
}

function listeLots($produit){
    $requete = "Select p.idProd,p.descriptionProd, p.imageProd, l.quantiteLot - l.uniteDeVenteLot as quantiteLot, l.dateRecolteLot, l.nbJourConservationLot, l.modeProductionLot, l.ramassageManuelLot, l.prixUnitaireLot from produit p inner join lot l on p.idProd = l.idProd where p.libelleProd = '".$produit."';";
    $result = mysql_query($requete) or die ('listeLot');
    return $result;
}

function recupUnite()
{
	$texteRequete="select libelleUnite from unite;";
	$resultat=mysql_query($texteRequete);
	return $resultat;
}

function remplireLot($qte,$jour,$mois,$annees,$conservation,$modeProd,$ramassage,$prix,$unite,$produit)
{
	if($ramassage=='manuel')
	{
		$ram=1;
	}
	else
	{
		$ram=0;
	}
	//recuperer l'id max +1 pour incrementer 
	$requeteIdMax="select max(idLot)+1 from lot;";
	$resultatIdMax=mysql_query($requeteIdMax);
    $tabInfosIdMax=mysql_fetch_array($resultatIdMax);
    $maxId=$tabInfosIdMax[0];
    //recuperer l'id du produit selectionner
    $requeteIdProd="select idProd from produit where libelleProd='".$produit."' ;";
    $resultatIdProd=mysql_query($requeteIdProd);
    $tabInfosIdProd=mysql_fetch_array($resultatIdProd);
    $idProd=$tabInfosIdProd[0];
    //recuperer l'id de l'unite
    $texteRequeteIdUnite="select idUnite from unite where libelleUnite='".$unite."' ;";
    $resultatIdUnite=mysql_query($texteRequeteIdUnite);
    $tabInfosIdUnite=mysql_fetch_array($resultatIdUnite);
    $idUnite=$tabInfosIdUnite[0];
    //requete finale pour l'insertion du lot
	$texteRequete="insert into lot (idLot,quantiteLot,dateRecolteLot,nbJourConservationLot,uniteDeVenteLot,modeProductionLot,ramassageManuelLot,prixUnitaireLot,idProd,idU,idUnite) values (".$maxId.",".$qte.",'".$annees."-".$mois."-".$jour."',".$conservation.",0,'".$modeProd."',".$ram.",".$prix.",".$idProd.",".$_SESSION["idUser"].",".$idUnite.");";
	//echo $texteRequete;
	mysql_query($texteRequete);
	//echo mysql_error();
}

function mesLots()
{
	$requeteLotProducteur="select p.libelleProd,l.quantiteLot - l.uniteDeVenteLot as quantiteRestante,l.quantiteLot,l.prixUnitaireLot from lot l inner join produit p on l.idProd=p.idProd where l.idU=".$_SESSION["idUser"].";";
	$resultat=mysql_query($requeteLotProducteur);
	return $resultat;
}

function addDemandeProd($libelle,$description,$cat)
{
	//
	$requeteIdMax="select max(idProd)+1 from produit;";
	$resultatIdMax=mysql_query($requeteIdMax);
    $tabInfosIdMax=mysql_fetch_array($resultatIdMax);
    $maxId=$tabInfosIdMax[0];
    //
    $requeteIdCat="select idCat from categorie where libelleCat='".$cat."' ;";
    $resultatIdCat=mysql_query($requeteIdCat);
    $tabInfosIdCat=mysql_fetch_array($resultatIdCat);
    $idCat=$tabInfosIdCat[0];
    //
	$texteRequete="insert into produit (idProd,libelleProd,supprimeProd,etatprod,descriptionProd,idCat) values(".$maxId.",'".$libelle."',0,'ATT','".$description."',".$idCat.");";
	mysql_query($texteRequete);
}