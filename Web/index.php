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
    <!-- Start your project here-->
    <!--Navbar-->
   <?php include "haut.php"; ?>
<div class="row">
    <div class="col-lg-8">
        <center>
            <p>Les meilleurs produits de saison.</p>
            <p>Du producteur à l'artisan et au consommateur</p> 
            <p>Ni usine, ni camion, ni grande surface.</p>
            <p>La terre et l'homme à nouveau respectés.</p>
            <p>New World</p>
            <hr>
        </center>
        <div class="row">
            <div class="col-lg-3">
                <div class="card text-center">
                    <div class="card-header default-color-dark white-text">
                        Producteur 
                    </div>
                    <div class="card-block">
                        <h4 class="card-title">Agriculteurs, éleveurs</h4>
                        <p class="card-text">Vous souhaitez proposer au juste prix des produits de qualité, sains, frais et de saison.</p>
                        <a href="inscription.php" class="btn btn-default" role="button">S'inscrire</a>
                    </div>
                    <div class="card-footer text-muted default-color-dark white-text">
                        <p>déjà 243 inscrits</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 offset-lg-1">
                <div class="card text-center">
                    <div class="card-header default-color-dark white-text">
                        Consommateur 
                    </div>
                    <div class="card-block">
                        <h4 class="card-title">Adulte éco-responsable</h4>
                        <p class="card-text">Vous êtes un père ou une mère de famille responsable qui sait non seulement que l'on doit manger sain mais aussi que pour maintenir un centre ville et des campagnes peuplés, il est nécessaire de donner leurs chances aux producteurs et artisants.Les emplois que vous maintenez aujourd'hui seront peut-être ceux de vos enfants. Il faut développer l'activité locale en réduisant les coûts de transport ainsi que les intermédiaires. Vous souhaitez proposer au juste prix des produits de qualité, sains, frais et de saison.</p>
                        <a href="inscription.php" class="btn btn-default" role="button">S'inscrire</a>
                    </div>
                    <div class="card-footer text-muted default-color-dark white-text">
                        <p>déjà 5243 inscrits</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 offset-lg-1">
                <div class="card text-center">
                    <div class="card-header default-color-dark white-text">
                        Artisans 
                    </div>
                    <div class="card-block">
                        <h4 class="card-title">Artisan de l'alimentaire</h4>
                        <p class="card-text">Vous transformez les produits frais locaux et souhaitez maintenir votre commerce de centre ville face à l'omniprésence des grandes surfaces. Vous voyez chaque jour autour de vous des magasins qui ferment. NewWorld peut vous permettre un complément d'activité. Tentez cela ne coûte rien.</p>
                        <a href="inscription.php" class="btn btn-default" role="button">S'inscrire</a>
                    </div>
                    <div class="card-footer text-muted default-color-dark white-text">
                        <p>déjà 302 inscrits</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-4">
        <img src="boucher.jpg" >
        <div class="card card-block">
            <h4 class="card-title">Boucher, charcutier, boulanger</h4>
            <p class="card-text">Ils transforment les produits locaux en respectant la charte et maintiennent les savoir faire et les centre villes vivants.</p>
        </div>
        <img src="jardinier.jpg" height="400px" width="610px">
                <div class="card card-block">
            <h4 class="card-title">Paysans/Maraicher</h4>
            <p class="card-text">En cultivant la Terre, ils la rendent plus propice...</p>
        </div>
    </div>
</div>
    <!-- SCRIPTS -->
    <!-- JQuery -->
    <script type="text/javascript" src="js/jquery-3.1.1.min.js"></script>
    <!-- Bootstrap tooltips -->
    <script type="text/javascript" src="js/tether.min.js"></script>
    <!-- Bootstrap core JavaScript -->
    <script type="text/javascript" src="js/bootstrap.min.js"></script>
    <!-- MDB core JavaScript -->
    <script type="text/javascript" src="js/mdb.min.js"></script>
</body>

</html>
