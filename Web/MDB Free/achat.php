
<?php
include 'haut.php';
?>
<div class="col-lg-6 offset-lg-3">
<?php
include 'fonction.php';
$res=recupRayon();
while($data =mysql_fetch_assoc($res))
{
    echo "<button type='button' class='btn btn-default' onclick='recupLeRayon(\"".$data["libelleRay"]."\")' id='".$data["libelleRay"]. "'>".$data["libelleRay"]."</button>";
}
?>
<div id="affichageCat" ></div>
<div id="affichageProd"></div>
</div>
<div id="affichageLot"></div>
<script type="text/javascript">
    function recupLeRayon(ray)
    {
        if (document.getElementById('affichageProd'))
        {
            document.getElementById('affichageProd').style.visibility='hidden';
        }
            $.ajax({
                url : "./ajax/categorie.php",
                type : "POST",
                dataType : "JSON",
                data : {libelle : ray},
                success : function(data)
                {
                    
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
                    document.getElementById('affichageProd').style.visibility='visible';
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
