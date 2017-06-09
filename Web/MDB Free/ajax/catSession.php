<?php 
$cat=$_POST["libelle"];
//var_dump($_POST);
$recupCat= "<input type='text' id='cat' name='cat' class='form-control' value='".$cat."' readonly>"; 

header('Content-type: application/json');
?>
{
"catSession": <?php echo json_encode($recupCat, JSON_UNESCAPED_UNICODE); ?>
}