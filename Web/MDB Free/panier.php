
<?php
include 'haut.php';
include 'fonction.php';
    if(!(isset($_GET["idProd"]))){
        if(!(isset($_SESSION["panier"]))){
            echo"<h1>Panier vide</h1>";
        } else {
            for($nbreProduit = 0; $nbreProduit < count($_SESSION["panier"]); $nbreProduit++){
                ?>
                <center>
                <table border width="50%">
                    <tr>
                        <td><?php echo $_SESSION["panier"][$nbreProduit]["nomProd"]; ?></td>
                        <td><?php echo $_SESSION["panier"][$nbreProduit]["quantiteProd"]; ?></td>
                    </tr>
                </table>
                </center>
                <?php
            }
                echo "<form action='./commande.php'>";
                echo "<input type='submit' value='Commander'/>";
                echo "</form>";
        }
    } else {
        $idProd = $_GET["idProd"];
        $nomProd = $_GET["nomProd"];
        // var_dump($nomProd);
        $quantiteProd = $_POST["quantiteProd"];
        // $_SESSION["utilisateur"];
        if(isset($_SESSION["panier"])){
            $nbreProd = 0;
            // var_dump(count($_SESSION["panier"]));
            while(($nbreProd != count($_SESSION["panier"])) && ($_SESSION["panier"][$nbreProd]["nomProd"] != $nomProd)){
                // var_dump($nbreProd);
                // echo "while";
                $nbreProd++;
            }
            if($nbreProd == count($_SESSION["panier"])){
                // echo "blabla";
                $i = count($_SESSION["panier"]);
                // var_dump($i);
                $_SESSION["panier"][$i]["idProd"] = $idProd;
                $_SESSION["panier"][$i]["nomProd"] = $nomProd;
                $_SESSION["panier"][$i]["quantiteProd"] = $quantiteProd;
            } else {
                // echo "else";
                $quantiteProdSession = $_SESSION["panier"][$nbreProd]["quantiteProd"];
                $quantiteMax = (int) $quantiteProdSession + (int) $quantiteProd;
                $_SESSION["panier"][$nbreProd]["quantiteProd"] = $quantiteMax;
            }   
        } else {
            $i = 0;
            $_SESSION["panier"][$i]["idProd"] = $idProd;
            $_SESSION["panier"][$i]["nomProd"] = $nomProd;
            $_SESSION["panier"][$i]["quantiteProd"] = $quantiteProd;
            // var_dump($_SESSION["panier"]);
        }
        // var_dump($_GET);
        // var_dump($_POST);
    
        for($nbreProduit = 0; $nbreProduit < count($_SESSION["panier"]); $nbreProduit++){
?>
            <center>
            <table border width="50%">
                <tr>
                    <td><?php echo $_SESSION["panier"][$nbreProduit]["nomProd"]; ?></td>
                    <td><?php echo $_SESSION["panier"][$nbreProduit]["quantiteProd"]; ?></td>
                </tr>
            </table>
            </center>
<?php
        }
        echo "<form action='./commande.php'>";
        echo "<input type='submit' value='Commander'/>";
        echo "</form>";
    }
?>
</body>
</html>