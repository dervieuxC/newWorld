/*
*drop database dbNewWorld;
*grant all privileges on dbNewWorld.* to adminNewWorld@localhost identified by 'xuactf42';
*/

CREATE TABLE `localite`(`noInsee` varchar(10),`nomLoc` varchar(50),`codePostalLoc` varchar(10),`acheminement` varchar(50),primary key(`noInsee`));

CREATE TABLE `pointDeVente`(`idPdv` INTEGER,`adressePdv` varchar(50),`codePostalPdv` VARCHAR(5),`nomPdv` varchar(50),`activitePdv` varchar(50),`villePdv` varchar(30),`telephonePdv` VARCHAR(12),`responsablePdv` VARCHAR(50),primary key(`idPdv`));

CREATE TABLE `rayon`(`idRay` int(11),`libelleRay` varchar(30),`supprimeRay` BOOL,primary key(`idRay`));

CREATE TABLE `question`(`idQuestion` INTEGER,`libelleQuestion` VARCHAR(125),primary key(`idQuestion`));

CREATE TABLE `typePersonnel`(`idTypeP` INTEGER,`libelleTypeP` VARCHAR(25),primary key(`idTypeP`));

CREATE TABLE `typeUtilisateur`(`idTypeU` INTEGER,`libelletypeU` VARCHAR(25),primary key(`idTypeU`));

CREATE TABLE `jour`(`idJour` INTEGER,`libelleJour` VARCHAR(15),primary key(`idJour`));

CREATE TABLE `ouvert`(`horaire` VARCHAR(50),`idJour` INTEGER NOT NULL,`idPdv` INTEGER NOT NULL, foreign key (`idJour`) references jour(`idJour`), foreign key (`idPdv`) references pointDeVente(`idPdv`),primary key(`idJour`,`idPdv`));

CREATE TABLE `unite`(`idUnite` INTEGER,`libelleUnite` VARCHAR(50),primary key(`idUnite`));

CREATE TABLE `categorie`(`idCat` INTEGER,`libelleCat` varchar(30),`supprimeCat` BOOL,`idRay` int(11) NOT NULL, foreign key (`idRay`) references rayon(`idRay`),primary key(`idCat`));

CREATE TABLE `produit`(`idProd` INTEGER,`libelleProd` varchar(100),`puProd` float,`qteProd` INTEGER,`supprimeProd` BOOL,`etatProd` VARCHAR(4),`descriptionProd` VARCHAR(255),`imageProd` VARCHAR(255),`idCat` INTEGER NOT NULL, foreign key (`idCat`) references categorie(`idCat`),primary key(`idProd`));

CREATE TABLE `utilisateur`(`idU` INTEGER,`prenomU` VARCHAR(30),`nomU` VARCHAR(30),`dateNaissanceU` date,`adresseU` VARCHAR(75),`villeU` varchar(25),`emailU` varchar(50),`telephoneU` FLOAT(12),`codePostalU` varchar(10),`motDePasseU` varchar(100),`dateInscriptionU` date,`etatU` VARCHAR(4),`pseudoU` VARCHAR(15),`paysU` VARCHAR(30),`reponseU` VARCHAR(20),`idQuestion` INTEGER NOT NULL,`idTypeU` INTEGER NOT NULL, foreign key (`idQuestion`) references question(`idQuestion`), foreign key (`idTypeU`) references typeUtilisateur(`idTypeU`),primary key(`idU`));

CREATE TABLE `personnel`(`idPers` INTEGER,`nomPers` VARCHAR(25),`prenomPers` VARCHAR(25),`emailPers` VARCHAR(40),`ssNb` VARCHAR(15),`motDePassePers` VARCHAR(20),`dateEmbauchePers` DATE,`supprimePers` BOOL,`codePostalPers` VARCHAR(10),`paysPers` VARCHAR(30),`villePers` VARCHAR(80),`adressePers` VARCHAR(255),`loginPers` VARCHAR(15),`idTypeP` INTEGER NOT NULL, foreign key (`idTypeP`) references typePersonnel(`idTypeP`),primary key(`idPers`));

CREATE TABLE `lot`(`idLot` INTEGER,`quantiteLot` INTEGER,`dateRecolteLot` date,`nbJourConservationLot` INTEGER,`uniteDeVenteLot` INTEGER,`modeProductionLot` varchar(25),`ramassageManuelLot` tinyint(1),`prixUnitaireLot` float,`idProd` INTEGER NOT NULL,`idU` INTEGER NOT NULL,`idUnite` INTEGER NOT NULL, foreign key (`idProd`) references produit(`idProd`), foreign key (`idU`) references utilisateur(`idU`), foreign key (`idUnite`) references unite(`idUnite`),primary key(`idProd`,`idU`,idLot));

CREATE TABLE `proposerA`(`idPdv` INTEGER NOT NULL,`idProd` INTEGER NOT NULL,`idU` INTEGER NOT NULL,`idLot` INTEGER NOT NULL, foreign key (`idPdv`) references pointDeVente(`idPdv`), foreign key (`idProd`,`idU`,idLot) references lot(`idProd`,`idU`,idLot),primary key(`idPdv`,`idProd`,`idU`,idLot));

CREATE TABLE `visite`(`idVisite` INTEGER,`libelleVisite` VARCHAR(40),`dateVisite` DATE,gestionnaire INTEGER NOT NULL,controleur INTEGER NOT NULL, foreign key (gestionnaire) references personnel(`idPers`), foreign key (controleur) references personnel(`idPers`),primary key(`idVisite`));

CREATE TABLE `ControleProducteur`(`visiteConcluante` BOOL,`motifRejet` VARCHAR(250),`heureDebutControle` TIME,`heureFinControle` TIME,`idVisite` INTEGER NOT NULL,`idU` INTEGER NOT NULL, foreign key (`idVisite`) references visite(`idVisite`), foreign key (`idU`) references utilisateur(`idU`),primary key(`idVisite`,`idU`));

CREATE TABLE `commande`(`idCommande` INTEGER,`libelleCommande` VARCHAR(25),`idU` INTEGER NOT NULL,`idPdv` INTEGER NOT NULL, foreign key (`idU`) references utilisateur(`idU`), foreign key (`idPdv`) references pointDeVente(`idPdv`),primary key(`idCommande`));

CREATE TABLE `panier`(`quantite` INTEGER,`idProd` INTEGER NOT NULL,`idU` INTEGER NOT NULL,`idLot` INTEGER NOT NULL,`idCommande` INTEGER NOT NULL, foreign key (`idProd`,`idU`,idLot) references lot(`idProd`,`idU`,idLot), foreign key (`idCommande`) references commande(`idCommande`),primary key(`idProd`,`idU`,idLot,`idCommande`));

CREATE TABLE `Choisir`(`idPdv` INTEGER NOT NULL,`idU` INTEGER NOT NULL, foreign key (`idPdv`) references pointDeVente(`idPdv`), foreign key (`idU`) references utilisateur(`idU`),primary key(`idPdv`,`idU`));