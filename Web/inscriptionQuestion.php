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
    <form method="POST"  action="finInscription.php">
    <div class="card">
        <div class="card-block">
            <!--Header-->
            <div class="text-center">
                <h3><i class="fa fa-lock"></i> Question Secrete:</h3>
                <hr class="mt-2 mb-2">
            </div>       
            <div>
                <select name="question">
                    <?php
                    include 'fonction.php';
                    $res=recupQuestion();
                    while($data =mysql_fetch_assoc($res))
                    {
                        echo "<option>".$data["libelleQuestion"]."</option>";
                    }
                    ?>
                </select>
            </div>
        <!--/Dropdown primary-->
            <div class="md-form">
                <input placeholder="Réponse" type="text" id="rep" name="rep" class="form-control" required maxlength="20" required>
            </div>

            <div class="text-center">
                <button class="btn btn-deep-purple">Terminer</button>
            </div>
        </div>
    </div>
    </form>
</div>
</body>



