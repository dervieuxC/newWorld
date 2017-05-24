<html>
<head>
<link rel="stylesheet" type="text/css" href="./style.css">
<?php
include 'tradFr.php';
//include 'fonction.php';
//include 'haut.php';
?>
<title>New World</title>
</head>
<body>
<ul id="menu-bar">
<li class="active"><a href="index.php">NW</a></li>
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
<img src="boucher.jpg" alt="boucher" id="boucher">
<img src="jardinier.jpg" alt="jardinier" id="jardinier">
<?php
include 'bas.php'
?>
</body>
</html>
