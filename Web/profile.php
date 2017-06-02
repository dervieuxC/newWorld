    <?php include 'haut.php'; ?>
    <?php include 'fonction.php'; 
    if (isset($_POST["nom"])) {
        mofifProfil($_POST["nom"],$_POST["prenom"],$_POST["adresse"],$_POST["cp"],$_POST["ville"],$_POST["tel"],$_POST["mail"],$_POST["pseudo"],$_POST["iban"]);
    }
    $tabRes=recupProfil();
    ?>
    <div class="col-lg-6 offset-lg-3">
   <p>Nom:<?php echo $tabRes[1]; ?></p>
   <p>Prénom:<?php echo $tabRes[0]; ?></p>
   <p>Adresse:<?php echo $tabRes[2]; ?></p>
   <p>Code Postal:<?php echo $tabRes[6]; ?></p>
   <p>Ville:<?php echo $tabRes[3]; ?></p>
   <p>Telephone:<?php echo $tabRes[5]; ?></p>
   <p>Email:<?php echo $tabRes[4]; ?></p>
   <p>Pseudo:<?php echo $tabRes[7]; ?></p>
   <p>iban:<?php echo $tabRes[8]; ?></p>
   <p><a href="modifierProfil.php" class="btn btn-info" role="button">Modifier le Profil</a></p>
    </div>
</body>