<html>
<head>
<link rel="stylesheet" type="text/css" href="./style.css">
</head>
<body>
<?php
include 'tradFr.php';

?>

<ul id="menu-bar">
<li><a href="index.php">NW</a></li>
<li><a href="#"><?php echo $menuAcheter ?></a>
</li>
<li><a href="#"><?php echo $menuProduire ?></a>
</li>
<li><a href="#"><?php echo $menuDistribuer ?></a></li>
<li><a href="inscription.php"><?php echo $menuInscription ?></a></li>
</ul>
</br>
<div id="mAccueil">
<p><?php
echo $messageAccueil1;
?></p>
<p><?php
echo $messageAccueil2;
?><p>
<p><?php
echo $messageAccueil3;
?></p>
<p><?php
echo $messageAccueil4;
?></p>
<p><?php
echo $messageAccueil5;
?></p>
</div>
</br>

<?php
include 'fonction.php';
inscription();
//chaine_aleatoire(8);
?>
<?php
include 'bas.php'
?>
</body>
</html>
