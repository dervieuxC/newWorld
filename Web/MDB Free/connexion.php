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
<?php include "haut.php"; ?>


<div class="col-lg-6 offset-lg-3">
    <!--Form without header-->
    <?php
            // var_dump($_POST);
            if(!(isset($_POST["login"]) && isset($_POST["mdp"]))){
        ?>
        <form method="POST"  action="connexion.php">
    <div class="card">
        <div class="card-block">
            <!--Header-->
            <div class="text-center">
                <h3><i class="fa fa-lock"></i> Login:</h3>
                <hr class="mt-2 mb-2">
            </div>

            <div class="md-form">
                <input placeholder="login" type="text" id="login" name="login" class="form-control">
            </div>
            <div class="md-form">
                <input placeholder="Mot De Passe" type="Password" id="mdp" name="mdp" class="form-control">
            </div>
            <div class="text-center">
                <button class="btn btn-deep-purple">Login</button>
            </div>
        </div>
        </form>
        <!--Footer-->
        <div class="modal-footer">
            <div class="options">
                <p>Not a member? <a class="nav-link" href="inscription.php">Sign Up</a></p>
                <p>Forgot <a href="#">Password?</a></p>
            </div>
        </div>

    </div>
    <!--/Form without header-->
        <?php
            } else {
                include "fonction.php";
                $pseudo = $_POST["login"];
                $mdp = $_POST["mdp"];
                $id=connexionSite($pseudo, $mdp);
                // var_dump($id);
                if($id == -1){
        ?>
                    <form method="POST" action="connexion.php" >
                    <!--Form with header-->
                    <div class="card">
                        <div class="card-block">
                            <!--Header-->
                             <div class="text-center">
                                <h3><i class="fa fa-lock"></i> Login:</h3>
                                <hr class="mt-2 mb-2">
                            </div>
                            <!--Body-->
                            <div class="md-form">
                                <i class="fa fa-user prefix"></i>
                                 <input placeholder="login" type="text" id="login" name="login" class="form-control" value="<?php echo $pseudo; ?>">
                            </div>
                            <div class="md-form">
                                <i class="fa fa-lock prefix"></i>
                                <input placeholder="Mot De Passe" type="Password" id="mdp" name="mdp" class="form-control">
                            </div>

                            <div class="text-center">
                                <button class="btn btn-deep-purple">Login</button>
                            </div>
                            Votre pseudo ou votre mot de passe est incorrect.
                        </div>
                    </div>
                    <!--/Form with header-->
                </form>
        <?php
                } else {
                    $_SESSION["idUser"]=$id;
                    $typeU=recupTypeUser($id);
                    $_SESSION["typeUser"]=$typeU;
                    header('location:connexionReussie.php');
                }
            }
        ?>

</div>
</body>