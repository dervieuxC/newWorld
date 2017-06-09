<?php
include 'haut.php';
include 'fonction.php';
?>
<div class="col-lg-6 offset-lg-3">
<?php
$res=recupRayon();
while($data =mysql_fetch_assoc($res))
{
    echo "<button type='button' class='btn btn-default' onclick=' recupLeRayon(\"".$data["libelleRay"]."\")' id='".$data["libelleRay"]. "'>".$data["libelleRay"]."</button>";
}
?>
<div id="affichageCat" ></div>
	<fieldset id="form" style='visibility:hidden'>
    	<form method="POST"  action="validationAddProduit.php">
    		<div class="card">
        		<div class="card-block">
            <!--Header-->
            		<div class="text-center">
                		<h3><i class="fa fa-lock"></i> Ajouter un type de produit:</h3>
                		<hr class="mt-2 mb-2">
            		</div>
            		<div id="afficheCatSession"></div>
            		<div class="md-form">
                		<input placeholder="Nom" type="text" id="nom" name="nom" class="form-control" required maxlength="100" >
            		</div>
            		<div class="md-form">
            			Description
   						<textarea type="text" id="description" name="description" class="md-textarea" required></textarea>
					</div>
            		<div class="text-center">
                		<button class="btn btn-deep-purple">Valider</button>
            		</div>
        		</div>
    		</div>
    	</form>
    </fieldset>
</div>
<script type="text/javascript">
    function recupLeRayon(ray)
    {
        document.getElementById('form').style.visibility='hidden';
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
        document.getElementById('form').style.visibility='visible';
            $.ajax({
                url : "./ajax/catSession.php",
                type : "POST",
                dataType : "JSON",
                data : {libelle : cat},
                success : function(data)
                {
                    $("#afficheCatSession").html(data.catSession);
                }
            });
    }
</script>
</body>
</html>
