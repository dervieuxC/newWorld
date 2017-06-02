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
<div id="affichageProd"></div>
<fieldset id="form" style='visibility:hidden'>
<div class="col-lg-6 offset-lg-3">
    <form method="POST"  action="mesLots.php">
    <div class="card">
        <div class="card-block">
            <!--Header-->
            <div class="text-center">
                <h3><i class="fa fa-lock"></i> Ajouter un lot:</h3>
                <hr class="mt-2 mb-2">
            </div>
            <div class="md-form">
                <input placeholder="Quantite" type="number" id="qte" name="qte" class="form-control" required>
            </div>
            <div class="md-form">
            Date recolte
                    <select name="jour">
                    <?php
                    for($i=1;$i<32;$i++)
                    {
                        echo "<option>".$i."</option>";
                    }
                    ?>
                </select>
                <select name="mois">
                	<option>Janvier</option>
                	<option>fevrier</option>
                	<option>Mars</option>
                	<option>Avril</option>
                	<option>Mai</option>
                	<option>Juin</option>
                	<option>Juillet</option>
                	<option>Août</option>
                	<option>Septembre</option>
                	<option>Octobre</option>
                	<option>Novembre</option>
                	<option>Decembre</option>
                </select>
                <select name="annees">
                	<?php
                		for($i=2000;$i<2100;$i++)
                		{
                			echo "<option>".$i."</option>";
                		}
                	?>
                </select>
            </div>
            <div class="md-form">
                <input placeholder="Conservation (nombre de jour)" type="number" id="conservation" name="conservation" class="form-control" required>
            </div>
            mode de production:
            <input type='radio' name='modeProd' value='serre' id='serre' checked /> <label>Serre</label>
            <input type='radio' name='modeProd' value='pleineAire' id='pleineAire' /> <label>Pleine air</label>
            <br>
            <br>
            ramassage manuel:
            <input type='radio' name='ramassage' value='manuel' id='manuel' /> <label>oui</label>
            <input type='radio' name='ramassage' value='Nmanuel' id='Nmanuel' checked /> <label>non </label>
            <div class="md-form">
                <input placeholder="prix unitaire" type="number" id="prix" name="prix" class="form-control" step="0.01" required>
            </div>

            <div class="md-form">
            	<select>
            		<?php
            			$res=recupUnite();
            		while($data =mysql_fetch_assoc($res))
                    {
                        echo "<option>".$data["libelleUnite"]."</option>";
                    }
                    ?>
            		?>
            	</select>
            </div>
            <div class="text-center">
                <button class="btn btn-deep-purple">Valider</button>
            </div>
        </div>
    </div>
    </form>
    </fieldset>
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
    	document.getElementById('form').style.visibility='visible';
        }
</script>
</body>
</html>