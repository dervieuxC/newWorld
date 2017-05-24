<html>
<head>
<link rel="stylesheet" type="text/css" href="./style.css">
<script language="javascript">
//Permet d'afficher les bons champs correspondant au consomateur et au producteur
function afficherConsoProducteur(etat) 
{ 
	document.getElementById("iban").style.visibility=etat;
	document.getElementById("siret").style.visibility=etat;
	document.getElementById("horraire").style.visibility='hidden';  
} 
//Permet
function afficherPDV(etat) 
{ 
	document.getElementById("iban").style.visibility=etat;
	document.getElementById("siret").style.visibility=etat;
	document.getElementById("horraire").style.visibility=etat;  
} 
function verifForm()
{
	var nomOk=document.getElementById("nom");
	var prenomOk=document.getElementById("prenom");
	var pseudoOk=document.getElementById("pseudo");
	var emailOk=document.getElementById("email");
	var rueOk=document.getElementById("rue");
	var cpOk=document.getElementById("codePostal");
	var villeOk=document.getElementById("ville");
	var telOk=document.getElementById("telephone");
	var reponseOk=document.getElementById("reponse");
		if(verifNom(nomOk) && verifPrenom(prenomOk) && verifPseudo(pseudoOk) && verifMail(emailOk) && verifRue(rueOk) && verifCodePostal(cpOk) && verifVille(villeOk) && verifTel(telOk) && verifReponse(reponseOk))
		{
			return true;			
		}
		else
		{
			alert("Tout les champs ne sont pas bien remplie");
			return false;
		}
}
function surligne(champ, erreur)
{
	if(erreur)
		champ.style.backgroundColor = "#fba";
	else
		champ.style.backgroundColor = "";
}

function verifNom(nom)
{   
	if(nom.value.length >30  || nom.value.length==0  )
	{
		surligne(nom, true);
		return false;
	}
	else
	{
		surligne(nom, false);
		return true;
	}
}

function verifPrenom(prenom)
{
	if(prenom.value.length>30 || prenom.value.length==0)
	{
		surligne(prenom, true);
		return false;
	}
	else
	{
		surligne(prenom, false);
		return true;
	}
}
function verifCodePostal(codePostal)
{
	var regex = /^[0-9]{5,5}$/;
	if(!regex.test(codePostal.value))
	{
		surligne(codePostal, true);
		return false;
	}
	else
	{
		surligne(codePostal, false);
		return true;
	}
}
function verifPseudo(pseudo)
{
	if(pseudo.value.length==0 || pseudo.value.length>15)
	{
		surligne(pseudo, true);
		return false;

	}
	else
	{
		surligne(pseudo, false);
		return true;

	}
}
function verifTel(numTel)
{
	var regex =/^[0-9]{10,10}$/;
	if(!regex.test(numTel.value))
	{
		surligne(numTel, true);
		return false;

	}
	else
	{
		surligne(numTel, false);
		return true;

	}
}
function verifRue(rue)
{
	if(rue.value.length==0 )
	{
		surligne(rue, true);
		return false;

	}
	else
	{
		surligne(rue, false);
		return true;

	}
}
function verifVille(ville)
{
	if(ville.value.length==0)
	{
		surligne(ville, true);
		return false;

	}
	else
	{
		surligne(ville, false);
		return true;

	}
}
function verifMail(mail)
{
	if(mail.value.length==0)
	{
		surligne(mail, true);
		return false;

	}
	else
	{
		surligne(mail, false);
		return true;

	}
}
function verifReponse(rep)
{
	if(rep.value.length==0)
	{
		surligne(rep, true);
		return false;

	}
	else
	{
		surligne(rep, false);
		return true;

	}
}
function verifIban(iban)
{
	var regex =/^[0-9A-Z]{27,27}$/;
	if(!regex.test(iban.value))
	{
		surligne(iban, true);
		return false;

	}
	else
	{
		surligne(iban, false);
		return true;

	}
}
function verifSiret(siret)
{
	var regex =/^[0-9]{14,14}$/;
	if(!regex.test(siret.value))
	{
		surligne(siret, true);
		return false;

	}
	else
	{
		surligne(siret, false);
		return true;

	}
}

</script>
</head>
<body>
<?php
include 'tradFr.php';
?>

<ul id="menu-bar">
<li><a href="index.php">NW</a></li>
<li><a href="#"><?php echo $menuAcheter ?></a>
</li>
<li><a href="#"><?php echo $menuProduire ?></a>
</li>
<li><a href="#"><?php echo $menuDistribuer ?></a></li>
<li><a href="inscription.php"><?php echo $menuInscription ?></a></li>
</ul>
</br>
<div id="mAccueil">
<p><?php
echo $messageAccueil1;
?></p>
<p><?php
echo $messageAccueil2;
?><p>
<p><?php
echo $messageAccueil3;
?></p>
<p><?php
echo $messageAccueil4;
?></p>
<p><?php
echo $messageAccueil5;
?></p>
</div>
</br>
<form method="POST"  action="validation.php" onsubmit="return verifForm(this)">
<table width='100%' border='0' cellspacing='1' cellpadding='1' id='inscription'>
<tr>
<td>
</td>
<td>
<input type='radio' name='status' value='consomateur' id='consomateur' onclick="afficherConsoProducteur('hidden')" checked /> <label>Consommateur</label>
<input type='radio' name='status' value='producteur' id='producteur' onclick="afficherConsoProducteur('visible')"  /> <label>Producteur</label>
<input type='radio' name='status' value='pointDeVente' id='pointDeVente' onclick="afficherPDV('visible')" /> <label>Point de vente </label>
</td>
</tr>
<tr>
<td align='right' width='30%'>
Nom* :
</td>
<td><input type='text' style='width:200' name='nom' id='nom' value="10" onblur="verifNom(this)"</td>
</tr>
<tr>
<td align='right' width='30%'>
Pr&eacute;nom* :
</td>
<td><input type='text' style='width:200' name='prenom' id='prenom'  onblur="verifPrenom(this)"</td>
</tr>
<tr>
<td align='right' width='30%'>
Pseudo* :
</td>
<td><input type='text' style='width:200' name='pseudo' id='pseudo'  onblur="verifPseudo(this)"</td>
</tr>

<tr>
<td align='right' width='30%'>
email* :
</td>
<td><input type='email' style='width:200' name='email' id='email' onblur="verifMail(this)"</td>
</tr>
<tr>
<td align='right' width='30%'>
adresse rue* :
</td>
<td><input type='text' style='width:200' name='rue' id='rue' onblur="verifRue(this)"</td>
</tr>
<tr>
<td align='right' width='30%'>
Cp* :
</td>
<td><input type='text' style='width:200' name='codePostal' id='codePostal' onblur="verifCodePostal(this)"</td>
</tr>
<tr>
<td align='right' width='30%'>
Ville* :
</td>
<td><input type='text' style='width:200' name='ville' id='ville' onblur="verifVille(this)"</td>
</tr>
<tr>
<td align='right' width='30%'>
Telephone :
</td>
<td><input type='tel' style='width:200' name='telephone' id='telephone' onblur="verifTel(this)"</td>
</tr>
<tr>
<td align='right' width='30%'>
question*
</td>
<td>
<select style='width:200' name='question' id='question'>
</select>
</td>
</tr>
<tr>
<td align='right' width='30%'>
r&eacute;ponse*
</td>
<td><input type='text' style='width:200' name='reponse' id='reponse' onblur="verifReponse(this)"</td>
</tr>

<tr id='iban'style='visibility:hidden'>
<td align='right' width='30%'>
IBAN :
</td>
<td><input type='text' style='width:200' name='iban' id='iban' onblur="verifIban(this)"</td>
</tr> 
<tr id='siret'style='visibility:hidden'>
<td align='right' width='30%'>
No Siret :	
</td>
<td><input type='text' style='width:200' name='siret' id='siret' onblur="verifSiret(this)"</td>
</tr>
<tr id='horraire'style='visibility:hidden'>
<td align='right' width='30%'>
horaire :
</td>
<td><input type='text' style='width:200' name='horraire' id='horraire'</td>
</tr> 
<tr>
<td></td>
<td><input type='submit' name='submit' value='Envoyer' border='0'></td>
</tr>
</table>
</form>

<?php
include 'bas.php'
?>

</body>
</html>
