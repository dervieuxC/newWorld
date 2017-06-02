<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Material Design Bootstrap</title>
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.0/css/font-awesome.min.css">
    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <!-- Material Design Bootstrap -->
    <link href="css/mdb.min.css" rel="stylesheet">
    <!-- Your custom styles (optional) -->
    <link href="css/style.css" rel="stylesheet">
</head>
<body>
<script type="text/javascript">
    function afficher(etat) 
{ 
    document.getElementById("siretIban").style.visibility=etat;
} 
</script>
<?php include "haut.php"; 
    if(!(isset($_POST["adresse"]) && isset ($_POST["cp"]) && isset($_POST["ville"])))
    {
?>
<div class="col-lg-6 offset-lg-3">
    <form method="POST"  action="suiteInscription.php">
    <div class="card">
        <div class="card-block">
            <!--Header-->
            <div class="text-center">
                <h3><i class="fa fa-lock"></i> Confirmation Inscription:</h3>
                <hr class="mt-2 mb-2">
            </div>
            <input type='radio' name='status' value='consomateur' id='consomateur' onclick="afficher('hidden')" checked /> <label>Consommateur</label>
            <input type='radio' name='status' value='producteur' id='producteur' onclick="afficher('visible')"  /> <label>Producteur</label>
            <input type='radio' name='status' value='pointDeVente' id='pointDeVente' onclick="afficher('visible')" /> <label>Point de vente </label>
            <div class="md-form">
                <input placeholder="Adresse" type="text" id="adresse" name="adresse" class="form-control" required maxlength="75">
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
<?php 
    }
    else
    {
        include 'fonction.php';
        $verifForm=verifSuiteInscription($_POST["status"],$_POST["siret"],$_POST["iban"]);
        if(!($verifForm))
        {
?>
    <div class="col-lg-6 offset-lg-3">
    <form method="POST"  action="suiteInscription.php">
    <div class="card">
        <div class="card-block">
            <!--Header-->
            <div class="text-center">
                <h3><i class="fa fa-lock"></i> Confirmation Inscription:</h3>
                <hr class="mt-2 mb-2">
            </div>
            <input type='radio' name='status' value='consomateur' id='consomateur' onclick="afficher('hidden')" checked /> <label>Consommateur</label>
            <input type='radio' name='status' value='producteur' id='producteur' onclick="afficher('visible')"  /> <label>Producteur</label>
            <input type='radio' name='status' value='pointDeVente' id='pointDeVente' onclick="afficher('visible')" /> <label>Point de vente </label>
            <div class="md-form">
                <input placeholder="Adresse" type="text" id="adresse" name="adresse" class="form-control" required maxlength="75">
            </div>
            <div class="md-form">
                <input placeholder="Code Postal" type="text" id="cp" name="cp" class="form-control" required maxlength="5">
            </div>
            <div class="md-form">
                <input placeholder="Ville" type="text" id="ville" name="ville" class="form-control" required maxlength="25">
            </div>
            <fieldset id='siretIban'style='visibility:hidden'>
            <div class="md-form">
                <input placeholder="No Siret" type="text" id="siret" name="siret" class="form-control" maxlength="14">
            </div>
            <div class="md-form">
                <input placeholder="No Iban" type="text" id="iban" name="iban" class="form-control" maxlength="34">
            </div>
            </fieldset>
            <div class="text-center">
                <button class="btn btn-deep-purple">Suite</button>
            </div>
            Toute les informations ne sont pas bien remplies
        </div>
    </div>
    </form>
</div>
<?php 
    }
    else
    {
    $_SESSION["statusUtilisateur"]=$_POST["status"];
    $_SESSION["adresseUtilisateur"]=$_POST["adresse"];
    $_SESSION["cpUtilisateur"]=$_POST["cp"];
    $_SESSION["villeUtilisateur"]=$_POST["ville"];
    $_SESSION["siretUtilisateur"]=$_POST["siret"];
    $_SESSION["ibanUtilisateur"]=$_POST["iban"];
    header('location:inscriptionQuestion.php');
?>
 
<?php
}
}
?>
</body>

