<?php 
include 'haut.php'; 
include 'fonction.php';
//var_dump($_POST);
if (isset($_POST["produit"])) {
    remplireLot($_POST["qte"],$_POST["jour"],$_POST["mois"],$_POST["annees"],$_POST["conservation"],$_POST["modeProd"],$_POST["ramassage"],$_POST["prix"],$_POST["unite"],$_POST["produit"]);
}
?>

<div id="tabLotProducteur">
<?php
	$result =  mesLots();
	$recupLot = "<table border width='100%'>";
	$recupLot .= "<tr><td>Nom</td><td>Quantité initiale</td><td>Quantitée restante</td><td>prix unitaire</td>";
	while($data = mysql_fetch_assoc($result)){
	// var_dump($data);
		$recupLot .= "<tr>";
		$recupLot .= "<td >".$data["libelleProd"]."</td>";
		$recupLot .= "<td>".$data["quantiteLot"]."</td>";
		$recupLot .= "<td>".$data["quantiteRestante"]."</td>";
		$recupLot .= "<td>".$data["prixUnitaireLot"]."</td>";

}
$recupLot .= "</table>";
echo $recupLot;
?>
</div>

</body>
</html>