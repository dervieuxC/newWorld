<?php
include '../fonction.php';

$produit = $_POST["nomProduit"];
$result =  listeLots($produit);
$recupLot = "<table border width='100%'>";
$recupLot .= "<tr><td>Nom</td><td>Quantitée restante</td><td>prix unitaire</td><td>Descritpion technique</td><td>Image</td><td>	Quantitée voulue</td></tr>";
while($data = mysql_fetch_assoc($result)){
	// var_dump($data);
	$recupLot .= "<tr>";
	$recupLot .= "<td >".$data["descriptionProd"]."</td>";
	$recupLot .= "<td>".$data["quantiteLot"]."</td>";
	$recupLot .= "<td>".$data["prixUnitaireLot"]."€</td>";
	$descritpion = "Date de la récolte : ".$data["dateRecolteLot"].". <br>";
	$descritpion .= "Vous pouvez conserver ce lot pendant : ".$data["nbJourConservationLot"]."jours. <br>";
	$descritpion .= "Il a été produit ".$data["modeProductionLot"].". <br>";
	if($data["ramassageManuelLot"] == 1){
		$descritpion .= "Ramassé manuellement.";
	} else {
		$descritpion .= "Pas ramassé manuellement.";
	}
	$recupLot .= "<td><center>".$descritpion."</center></td>";
	$recupLot .= "<td></td>";
	$recupLot .= "<td><form action='panier.php?nomProd=".$data["descriptionProd"]."&idProd=".$data["idProd"]."' method='POST'>";
	$recupLot .= "<input type='number' 	value='1' min='1' max='".$data["quantiteLot"]."' name='quantiteProd' />";
	$recupLot .= "<input type='submit' value='Ajouter'/>";
	$recupLot .= "</form></td>";
	$recupLot .= "</tr>";
}
$recupLot .= "</table>";

header('Content-type: application/json');
?>
{
"lot": <?php echo json_encode($recupLot, JSON_UNESCAPED_UNICODE); ?>
}