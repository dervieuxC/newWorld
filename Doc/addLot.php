<?php 
include 'haut.php';
include 'fonction.php'; 
?>
<div class="col-lg-6 offset-lg-3">
<?php
include 'fonction.php';
$res=recupRayon();
while($data =mysql_fetch_assoc($res))
{
    echo "<button type='button' class='btn btn-default' onclick=' recupLeRayon(\"".$data["libelleRay"]."\")' id='".$data["libelleRay"]. "'>".$data["libelleRay"]."</button>";
}
?>
<div id="affichageCat" ></div>
<div id="affichageProd"></div>
</div>
<div class="col-lg-6 offset-lg-3">
    <form method="POST"  action="suiteInscription.php">
    <div class="card">
        <div class="card-block">
            <!--Header-->
            <div class="text-center">
                <h3><i class="fa fa-lock"></i> Ajouter un lot:</h3>
                <hr class="mt-2 mb-2">
            </div>
            <div class="md-form">
                <input placeholder="" type="text" id="adresse" name="adresse" class="form-control" required maxlength="75">
            </div>
            <div class="md-form">
                <input placeholder="Code Postal" type="text" id="cp" name="cp" class="form-control" required maxlength="5">
            </div>
            <div class="md-form">
                <input placeholder="Ville" type="text" id="ville" name="ville" class="form-control" required maxlength="25">
            </div>
            <fieldset id='siretIban'style='visibility:hidden'>
            <div class="md-form">
                <input placeholder="No Siret" type="text" id="siret" name="siret" class="form-control">
            </div>
            <div class="md-form">
                <input placeholder="No Iban" type="text" id="iban" name="iban" class="form-control" maxlength="34">
            </div>
            </fieldset>
            <div class="text-center">
                <button class="btn btn-deep-purple">Suite</button>
            </div>
        </div>
    </div>
    </form>
</div>
<div id="affichageLot"></div>
<script type="text/javascript">
    function recupLeRayon(ray)
    {
            $.ajax({
                url : "./ajax/categorie.php",
                type : "POST",
                dataType : "JSON",
                data : {libelle : ray},
                success : function(data)
                {
                    document.getElementById('affichageLot').style.visibility='hidden';
                    $("#affichageCat").html(data.categorie);
                }
            });
    }

    function recupLaCategorie(cat)
    {
            $.ajax({
                url : "./ajax/produit.php",
                type : "POST",
                dataType : "JSON",
                data : {libelle : cat},
                success : function(data)
                {
                    $("#affichageProd").html(data.produit);
                }
            });
    }

    function affichageLot(produit)
    {
            $.ajax({
                url : "./ajax/lot.php",
                type : "POST",
                dataType : "JSON",
                data : {nomProduit : produit},
                success : function(data)
                {
                    $("#affichageLot").html(data.lot);
                }
            });
        }
</script>
</body>
</html>