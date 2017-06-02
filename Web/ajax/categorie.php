<?php
include '../fonction.php';

$rayon = $_POST["libelle"];
$result =  recupCat($rayon);
$recupCategorie = "";
while($data = mysql_fetch_assoc($result)){
    // var_dump($data);
    $recupCategorie .= "<button type='button' class='btn btn-secondary' onclick=' recupLaCategorie(\"".$data["libelleCat"]."\")' id='".$data["libelleCat"]. "'>".$data["libelleCat"]."</button>";
}

header('Content-type: application/json');
?>
{
"categorie": <?php echo json_encode($recupCategorie, JSON_UNESCAPED_UNICODE); ?>
}
