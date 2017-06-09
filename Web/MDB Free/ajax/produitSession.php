<?php 
$produit=$_POST["libelle"];
//var_dump($_POST);
$recupProduit= "<input type='text' id='produit' name='produit' class='form-control' value='".$produit."' readonly>"; 

header('Content-type: application/json');
?>
{
"produitSession": <?php echo json_encode($recupProduit, JSON_UNESCAPED_UNICODE); ?>
}