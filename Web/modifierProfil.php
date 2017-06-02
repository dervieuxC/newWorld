<?php include 'haut.php'; ?>
<?php include 'fonction.php'; 
$tabRes=recupProfil();
?>
<div class="col-lg-6 offset-lg-3">
    <form method="POST"  action="profile.php">
    <div class="card">
        <div class="card-block">
            <!--Header-->
            <div class="text-center">
                <h3><i class="fa fa-lock"></i> Modification Profil:</h3>
                <hr class="mt-2 mb-2">
            </div>
            <div class="md-form">
                <input placeholder="Nom" type="text" id="nom" name="nom" class="form-control" required maxlength="" value="<?php echo $tabRes[1] ?>">
            </div>
            <div class="md-form">
                <input placeholder="Prenom" type="text" id="prenom" name="prenom" class="form-control" required maxlength="" value="<?php echo $tabRes[0] ?>">
            </div>
            <div class="md-form">
                <input placeholder="Adresse" type="text" id="adresse" name="adresse" class="form-control" required maxlength="" value="<?php echo $tabRes[2] ?>">
            </div>
            <div class="md-form">
                <input placeholder="Code Postal" type="text" id="cp" name="cp" class="form-control" required maxlength="5" value="<?php echo $tabRes[6] ?>">
            </div>
            <div class="md-form">
                <input placeholder="Ville" type="text" id="ville" name="ville" class="form-control" required maxlength="" value="<?php echo $tabRes[3] ?>">
            </div>
             <div class="md-form">
                <input placeholder="Telephone" type="text" id="tel" name="tel" class="form-control" required maxlength="12" value="<?php echo $tabRes[5] ?>">
            </div>
             <div class="md-form">
                <input placeholder="Email" type="text" id="mail" name="mail" class="form-control" required maxlength="" value="<?php echo $tabRes[4] ?>">
            </div>
            <div class="md-form">
                <input placeholder="pseudo" type="text" id="pseudo" name="pseudo" class="form-control" required maxlength="" value="<?php echo $tabRes[7] ?>">
            </div>
            <div class="md-form">
                <input placeholder="iban" type="text" id="iban" name="iban" class="form-control" required maxlength="34" value="<?php echo $tabRes[8] ?>">
            </div>
            <div class="text-center">
                <button class="btn btn-deep-purple">Modifier</button>
            </div>
        </div>
    </div>
    </form>
</div>







