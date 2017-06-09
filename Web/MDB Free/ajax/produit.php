<?php
include '../fonction.php';

$categorie = $_POST["libelle"];
$result =  recupProd($categorie);
$recupProduit = "";
while($data = mysql_fetch_assoc($result)){
    // var_dump($data);
    $recupProduit .= "<button type='button' class='btn btn-secondary' onclick=' affichageLot(\"".$data["libelleProd"]."\")' id='".$data["libelleProd"]. "'>".$data["libelleProd"]."</button>";
}

header('Content-type: application/json');
?>
{
"produit": <?php echo json_encode($recupProduit, JSON_UNESCAPED_UNICODE); ?>
}
