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
<?php
include "haut.php";
echo ($_SESSION["etatUtilisateur"]);
    if ($_SESSION["etatUtilisateur"]=='NVAL')
    {
?>

<?php
        if (!(isset($_POST["mdp1"]) && isset($_POST["mdp2"])))
        {
?>
<div class="col-lg-6 offset-lg-3">
    première connexion
    <form method="POST"  action="connexionReussie.php">
    <div class="card">
        <div class="card-block">
            <!--Header-->
            <div class="text-center">
                <h3><i class="fa fa-lock"></i> Initialisation du mot de passe:</h3>
                <hr class="mt-2 mb-2">
            </div>

            <div class="md-form">
                <input placeholder="Nouveau Mot De passe" type="Password" id="mdp1" name="mdp1" class="form-control">
            </div>
            <div class="md-form">
                <input placeholder="Confirmation Mot De Passe" type="Password" id="mdp2" name="mdp2" class="form-control">
            </div>
            <div class="text-center">
                <button class="btn btn-deep-purple">Validation</button>
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
            $verifMdp=verifIniMdp($_POST["mdp1"],$_POST["mdp2"]);
            echo $verifMdp;
            if(!($verifMdp))
            {
?>
    <div class="col-lg-6 offset-lg-3">
    première connexion
    <form method="POST"  action="connexionReussie.php">
    <div class="card">
        <div class="card-block">
            <!--Header-->
            <div class="text-center">
                <h3><i class="fa fa-lock"></i> Initialisation du mot de passe:</h3>
                <hr class="mt-2 mb-2">
            </div>

            <div class="md-form">
                <input placeholder="Nouveau Mot De passe" type="Password" id="mdp1" name="mdp1" class="form-control">
            </div>
            <div class="md-form">
                <input placeholder="Confirmation Mot De Passe" type="Password" id="mdp2" name="mdp2" class="form-control">
            </div>
            <div class="text-center">
                <button class="btn btn-deep-purple">Validation</button>
            </div>
            Vos deux mot de passe ne correspondent pas!
        </div>
    </div>
    </form>
</div>
<?php
            }
            else
            {
                $_SESSION["mdpUtilisateur"]=$_POST["mdp1"];
                header('location:suiteInscription.php');
        }
    }
}
else
{
?>
Vous êtes bien connecté!    
<a class="btn btn-primary" href="index.php" role="button">Retour au site</a>
<?php
}
?>
</body>
