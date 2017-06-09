insert into rayon (idRay,libelleRay,supprimeRay) values (1,'legumes',0);
insert into rayon (idRay,libelleRay,supprimeRay) values (2,'fruit',0);
insert into rayon (idRay,libelleRay,supprimeRay) values (3,'charcuterie',0);
insert into rayon (idRay,libelleRay,supprimeRay) values (4,'cereale',0);	

insert into categorie (idCat,libelleCat,supprimeCat,idRay) values (1,'carotte',0,1);
insert into categorie (idCat,libelleCat,supprimeCat,idRay) values (2,'champignon',0,1);
insert into categorie (idCat,libelleCat,supprimeCat,idRay) values (3,'chou',0,1);
insert into categorie (idCat,libelleCat,supprimeCat,idRay) values (4,'pomme',0,2);
insert into categorie (idCat,libelleCat,supprimeCat,idRay) values (5,'pêche',0,2);
insert into categorie (idCat,libelleCat,supprimeCat,idRay) values (6,'tomate',0,2);
insert into categorie (idCat,libelleCat,supprimeCat,idRay) values (7,'jambon',0,3);
insert into categorie (idCat,libelleCat,supprimeCat,idRay) values (8,'saucice',0,3);
insert into categorie (idCat,libelleCat,supprimeCat,idRay) values (9,'saucisson',0,3);
insert into categorie (idCat,libelleCat,supprimeCat,idRay) values (10,'riz',0,4);
insert into categorie (idCat,libelleCat,supprimeCat,idRay) values (11,'seigle',0,4);
insert into categorie (idCat,libelleCat,supprimeCat,idRay) values (12,'blé',0,4);


insert into produit (idProd,libelleProd,supprimeProd,etatProd,descriptionProd,idCat) values (1,'de Luc',0,'VAL','carotte de Luc',1);
insert into produit (idProd,libelleProd,supprimeProd,etatProd,descriptionProd,idCat) values (2,'de Meaux',0,'VAL','carotte de Meaux',1);
insert into produit (idProd,libelleProd,supprimeProd,etatProd,descriptionProd,idCat) values (3,'de Paris',0,'VAL','champignon de Paris',2);
insert into produit (idProd,libelleProd,supprimeProd,etatProd,descriptionProd,idCat) values (4,'Pleurote',0,'VAL','Le pleurote',2);
insert into produit (idProd,libelleProd,supprimeProd,etatProd,descriptionProd,idCat) values (5,'chinois',0,'VAL','Chou chinois',3);
insert into produit (idProd,libelleProd,supprimeProd,etatProd,descriptionProd,idCat) values (6,'rouge',0,'VAL','chou rouge',3);
insert into produit (idProd,libelleProd,supprimeProd,etatProd,descriptionProd,idCat) values (7,'de Bruxelles',0,'VAL','chou de bruxelles',3)
insert into produit (idProd,libelleProd,supprimeProd,etatProd,descriptionProd,idCat) values (8,'golden',0,'VAL','Pomme golden',4);
insert into produit (idProd,libelleProd,supprimeProd,etatProd,descriptionProd,idCat) values (9,'pink lady',0,'VAL','pomme pink lady',4);
insert into produit (idProd,libelleProd,supprimeProd,etatProd,descriptionProd,idCat) values (10,'granny smith',0,'VAL','pomme granny smith',4);
insert into produit (idProd,libelleProd,supprimeProd,etatProd,descriptionProd,idCat) values (11,'api',0,'ATT','pomme api',4);
insert into produit (idProd,libelleProd,supprimeProd,etatProd,descriptionProd,idCat) values (13,'plate',0,'VAL','pêche plate',5);
insert into produit (idProd,libelleProd,supprimeProd,etatProd,descriptionProd,idCat) values (14,'de vigne',0,'VAL','pêche de vigne',5);
insert into produit (idProd,libelleProd,supprimeProd,etatProd,descriptionProd,idCat) values (15,'cerise',0,'VAL','tomate cerise',6);
insert into produit (idProd,libelleProd,supprimeProd,etatProd,descriptionProd,idCat) values (16,'coeur de boeuf',0,'VAL','tomate coeur de boeuf',6);
insert into produit (idProd,libelleProd,supprimeProd,etatProd,descriptionProd,idCat) values (17,'de marmande',0,'ATT','tomate de marmande',6);
insert into produit (idProd,libelleProd,supprimeProd,etatProd,descriptionProd,idCat) values (18,'cru',0,'VAL','jambon cru',7);
insert into produit (idProd,libelleProd,supprimeProd,etatProd,descriptionProd,idCat) values (19,'cuit',0,'VAL','jambon cuit',7);
insert into produit (idProd,libelleProd,supprimeProd,etatProd,descriptionProd,idCat) values (20,'fumée',0,'VAL','saucice fumée',8);
insert into produit (idProd,libelleProd,supprimeProd,etatProd,descriptionProd,idCat) values (21,'merguez',0,'VAL','merguez',8);
insert into produit (idProd,libelleProd,supprimeProd,etatProd,descriptionProd,idCat) values (22,'sèche',0,'VAL','saucice sèche',8);
insert into produit (idProd,libelleProd,supprimeProd,etatProd,descriptionProd,idCat) values (23,'brioché',0,'VAL','saucisson brioché',9);
insert into produit (idProd,libelleProd,supprimeProd,etatProd,descriptionProd,idCat) values (24,'salami',0,'VAL','salami',9);
insert into produit (idProd,libelleProd,supprimeProd,etatProd,descriptionProd,idCat) values (25,'sec',0,'VAL','saucisson sec',9);
insert into produit (idProd,libelleProd,supprimeProd,etatProd,descriptionProd,idCat) values (26,'à l''ail',0,'VAL','saucisson à l''ail',9);
insert into produit (idProd,libelleProd,supprimeProd,etatProd,descriptionProd,idCat) values (27,'blanc',0,'VAL','riz blanc',10);
insert into produit (idProd,libelleProd,supprimeProd,etatProd,descriptionProd,idCat) values (28,'basmati',0,'VAL','riz basmati',10);
insert into produit (idProd,libelleProd,supprimeProd,etatProd,descriptionProd,idCat) values (29,'cargo',0,'ATT','riz cargo',10);
insert into produit (idProd,libelleProd,supprimeProd,etatProd,descriptionProd,idCat) values (30,'grand de russie',0,'VAL','seigle grand de russie',11);
insert into produit (idProd,libelleProd,supprimeProd,etatProd,descriptionProd,idCat) values (31,'Schlanstedt',0,'VAL','seigle de Schlanstedt',11);
insert into produit (idProd,libelleProd,supprimeProd,etatProd,descriptionProd,idCat) values (32,'hiver de brie',0,'VAL','seigle d''hiver de brie',11);
insert into produit (idProd,libelleProd,supprimeProd,etatProd,descriptionProd,idCat) values (33,'dur',0,'VAL','blé dur',12);
insert into produit (idProd,libelleProd,supprimeProd,etatProd,descriptionProd,idCat) values (34,'tendre',0,'VAL','blé tendre',12);
insert into produit (idProd,libelleProd,supprimeProd,etatProd,descriptionProd,idCat) values (35,'tordu',0,'REF','blé tordu',12);

insert into pointDeVente (idPdv,adressePdv,codePostalPdv,nomPdv,activitePdv,villePdv,telephonePdv,responsablePdv) values (1,'2 rue charles aurouze','05000','chapiChapeau','vendeur de chapeau','Gap','0623568974','lorent chaplet');
insert into pointDeVente (idPdv,adressePdv,codePostalPdv,nomPdv,activitePdv,villePdv,telephonePdv,responsablePdv) values (2,'27 place du fort','05230','chez bernard','brasserie','Chorges','0492457896','bernard lavillier');
insert into pointDeVente (idPdv,adressePdv,codePostalPdv,nomPdv,activitePdv,villePdv,telephonePdv,responsablePdv) values (3,'12 grande rue','05100','pharmacie','pharmacie','Embrun','0492568974','anne hestezi');

insert into typePersonnel (idTypeP,libelleTypeP) values (1,'controleur');
insert into typePersonnel (idTypeP,libelleTypeP) values (2,'gestionnaire');

insert into personnel (idPers,nomPers,prenomPers,emailPers,ssNb,motDePassePers,dateEmbauchePers,supprimePers,codePostalPers,paysPers,villePers,adressePers,loginPers,idTypeP) values (1,'dervieux','corentin','cdervieux@gmail.com','12541236544123','password','2012-08-12',0,'05110','France','La saulce','20 allées des chênes','cdervieux',2);
insert into personnel (idPers,nomPers,prenomPers,emailPers,ssNb,motDePassePers,dateEmbauchePers,supprimePers,codePostalPers,paysPers,villePers,adressePers,loginPers,idTypeP) values (2,'julien','kappler','jkappler@gmail.com','123456789123456','password','2012-09-27',0,'05000','France','Gap','25 chemins du domaine du lac','jkappler',1);
insert into personnel (idPers,nomPers,prenomPers,emailPers,ssNb,motDePassePers,dateEmbauchePers,supprimePers,codePostalPers,paysPers,villePers,adressePers,loginPers,idTypeP) values (3,'fred','joly','fjoly@gmail.com','123456789025896','password','2012-12-21',0,'05000','France','Gap','2C chemins des huppes','fjoly',1);
insert into personnel (idPers,nomPers,prenomPers,emailPers,ssNb,motDePassePers,dateEmbauchePers,supprimePers,codePostalPers,paysPers,villePers,adressePers,loginPers,idTypeP) values (4,'alexis','huguet','ahuguet@gmail.com','147852369123456','password','2015-02-24',1,'05000','Fance','Gap','','ahuguet',1);

insert into jour (idJour,libelleJour) values (1,'lundi');
insert into jour (idJour,libelleJour) values (2,'mardi');
insert into jour (idJour,libelleJour) values (3,'mecredi');
insert into jour (idJour,libelleJour) values (4,'jeudi');
insert into jour (idJour,libelleJour) values (5,'vendredi');
insert into jour (idJour,libelleJour) values (6,'samedi');
insert into jour (idJour,libelleJour) values (7,'dimanche');

insert into ouvert (horaire,idJour,idPdv) values ('8H30-12H et 14H-17H',1,1);
insert into ouvert (horaire,idJour,idPdv) values ('8H30-12H et 14H-17H',2,1);
insert into ouvert (horaire,idJour,idPdv) values ('8H30-12H et 14H-17H',3,1);
insert into ouvert (horaire,idJour,idPdv) values ('8H30-12H et 14H-17H',4,1);
insert into ouvert (horaire,idJour,idPdv) values ('8H30-12H et 14H-17H',5,1);
insert into ouvert (horaire,idJour,idPdv) values ('8H30-12H',6,1);
insert into ouvert (horaire,idJour,idPdv) values ('8H30-15H',1,2);
insert into ouvert (horaire,idJour,idPdv) values ('8H30-15H',2,2);
insert into ouvert (horaire,idJour,idPdv) values ('8H30-15H',3,2);
insert into ouvert (horaire,idJour,idPdv) values ('8H30-15H',4,2);
insert into ouvert (horaire,idJour,idPdv) values ('8H30-15H',5,2);
insert into ouvert (horaire,idJour,idPdv) values ('8H30-15H',6,2);
insert into ouvert (horaire,idJour,idPdv) values ('8H30-15H',7,2);
insert into ouvert (horaire,idJour,idPdv) values ('9H-12H et 13H-18H',1,3);
insert into ouvert (horaire,idJour,idPdv) values ('9H-12H et 13H-18H',2,3);
insert into ouvert (horaire,idJour,idPdv) values ('9H-16H',3,3);
insert into ouvert (horaire,idJour,idPdv) values ('9H-12H et 13H-18H',4,3);
insert into ouvert (horaire,idJour,idPdv) values ('9H-12H et 13H-18H',5,3);
insert into ouvert (horaire,idJour,idPdv) values ('9H-16',6,3);

insert into question (idQuestion,libelleQuestion) values (1,'Pas de Question');
insert into question (idQuestion,libelleQuestion) values (2,'Quel est le nom de jeune fille de votre mère?');
insert into question (idQuestion,libelleQuestion) values (3,'Quel est votre super héros favoris?');
insert into question (idQuestion,libelleQuestion) values (4,'Quel est le nom de votre premier animal de compagnie?');

insert into typeUtilisateur (idTypeU,libelleTypeU) values (3,'client');
insert into typeUtilisateur (idTypeU,libelleTypeU) values (2,'point de vente');
insert into typeUtilisateur (idTypeU,libelleTypeU) values (1,'producteur');

insert into utilisateur (idU,prenomU,nomU,dateNaissanceU,adresseU,villeU,emailU,telephoneU,codePostalU,motDePasseU,dateInscriptionU,etatU,pseudoU,paysU,reponseU,idTypeU,idQuestion) values(1,'jean','dupont','1975-11-25','12 Avenue Commandant Dumont','Gap','jdupont@gmail.com','0492456321','05000','password','2016-11-12','VAL','jdupont','France','duval',3,2);
insert into utilisateur (idU,prenomU,nomU,dateNaissanceU,adresseU,villeU,emailU,telephoneU,codePostalU,motDePasseU,dateInscriptionU,etatU,pseudoU,paysU,reponseU,idTypeU,idQuestion) values(2,'anne','hestezi','1982-09-14','12 grande rue','Embrun','ahestezi@gmail.com','0492584769','05100','password','2017-01-25','VAL','ahestezi','France','superman',2,3);
insert into utilisateur (idU,prenomU,nomU,dateNaissanceU,adresseU,villeU,emailU,telephoneU,codePostalU,motDePasseU,dateInscriptionU,etatU,pseudoU,paysU,reponseU,idTypeU,idQuestion) values(3,'bernard','lavillier','1979-05-21','27 place du fort','Chorges','blavillier@gmail.com','0492235689','05230','password','2016-02-29','VAL','blavillier','France','pistache',2,4);
insert into utilisateur (idU,prenomU,nomU,dateNaissanceU,adresseU,villeU,emailU,telephoneU,codePostalU,motDePasseU,dateInscriptionU,etatU,pseudoU,paysU,reponseU,idTypeU,idQuestion) values(4,'lorent','chaplet','1964-06-28','2 rue charles aurouze','Gap','lchaplet@gmail.com','0492452369','05000','password','2016-11-02','VAL','lchaplet','France','batman',2,3);
insert into utilisateur (idU,prenomU,nomU,dateNaissanceU,adresseU,villeU,emailU,telephoneU,codePostalU,motDePasseU,dateInscriptionU,etatU,pseudoU,paysU,reponseU,idTypeU,idQuestion) values(5,'april','oneil','1956-01-02','20 avenue du collège','Laragne-montéglin','aoneil@gmail.com','0492581523','05300','password','2016-10-09','VAL','aoneil','France','rigel',1,2);
insert into utilisateur (idU,prenomU,nomU,dateNaissanceU,adresseU,villeU,emailU,telephoneU,codePostalU,motDePasseU,dateInscriptionU,etatU,pseudoU,paysU,reponseU,idTypeU,idQuestion) values(6,'jean','racine','1969-08-14','1002 les bernards','La bâtie-neuve','jracine@gmail.com','0492122657','05230','password','2013-09-16','VAL','jracine','France','titi',1,4);
insert into utilisateur (idU,prenomU,nomU,dateNaissanceU,adresseU,villeU,emailU,telephoneU,codePostalU,motDePasseU,dateInscriptionU,etatU,pseudoU,paysU,reponseU,idTypeU,idQuestion) values(7,'jack','lemiel','1971-11-08','23 chemins des evêques','Gap','jlemiel@gmail.com','049325489','05000','password','2016-09-24','NVAL','jlemiel','France','panpan',1,4);
insert into utilisateur (idU,prenomU,nomU,dateNaissanceU,adresseU,villeU,emailU,telephoneU,codePostalU,motDePasseU,dateInscriptionU,etatU,pseudoU,paysU,reponseU,idTypeU,idQuestion) values(8,'luc','hiluque','1951-05-24','8 avenue des esclots','Saint-Bonnet-en-Champsaur','lhiluque@gmail.com','0492356848','05500','password','2017-04-21','A-VIS','lhiluque','France','faker',1,3);

insert into unite (idUnite,libelleUnite) values (1,'sac 1kg');
insert into unite (idUnite,libelleUnite) values (2,'sac 3kg');	
insert into unite (idUnite,libelleUnite) values (3,'sac 5kg');
insert into unite (idUnite,libelleUnite) values (4,'sac 10kg');
insert into unite (idUnite,libelleUnite) values (5,'unite');
insert into unite (idUnite,libelleUnite) values (6,'douzaine');

insert into lot (idLot,quantiteLot,dateRecolteLot,nbJourConservationLot,uniteDeVenteLot,modeProductionLot,ramassageManuelLot,prixUnitaireLot,idProd,idU,idUnite) values (1,10,'2017-01-24',150,0,'pleine aire',1,9.63,26,7,5);
insert into lot (idLot,quantiteLot,dateRecolteLot,nbJourConservationLot,uniteDeVenteLot,modeProductionLot,ramassageManuelLot,prixUnitaireLot,idProd,idU,idUnite) values (2,25,'2016-08-19',10,10,'en serre',1,15.65,15,8,2);
insert into lot (idLot,quantiteLot,dateRecolteLot,nbJourConservationLot,uniteDeVenteLot,modeProductionLot,ramassageManuelLot,prixUnitaireLot,idProd,idU,idUnite) values (3,40,'2017-11-05'),20,29,'en terre',0,3.70,10,6,1);
insert into lot (idLot,quantiteLot,dateRecolteLot,nbJourConservationLot,uniteDeVenteLot,modeProductionLot,ramassageManuelLot,prixUnitaireLot,idProd,idU,idUnite) values (4,120,'2017-05-12',10,118,'pleine aire',1,21.36,33,5,4);
insert into lot (idLot,quantiteLot,dateRecolteLot,nbJourConservationLot,uniteDeVenteLot,modeProductionLot,ramassageManuelLot,prixUnitaireLot,idProd,idU,idUnite) values (5,280,'2016-08-01',40,280,'pleine aire',1,15.98,21,5,6);

insert into visite (idVisite,libelleVisite,dateVisite,gestionnaire,controleur) values(1,'première visite','2017-02-12',1,2);
insert into visite (idVisite,libelleVisite,dateVisite,gestionnaire,controleur) values(2,'visite nouveau produit','2017-03-15',1,3);
insert into visite (idVisite,libelleVisite,dateVisite,gestionnaire,controleur) values(3,'première visite','2017-05-22',1,2);
insert into visite (idVisite,libelleVisite,dateVisite,gestionnaire,controleur) values(4,'visite régulière','2017-05-22',1,2);
insert into visite (idVisite,libelleVisite,dateVisite,gestionnaire,controleur) values(5,'visite revalidation','2017-05-22',1,3);

insert into ControleProducteur (visiteConcluante,motifRejet,heureDebutControle,heureFinControle,idVisite,idU) values(1,'','10:31:00','11:45:00',1,6);
insert into ControleProducteur (visiteConcluante,motifRejet,heureDebutControle,heureFinControle,idVisite,idU) values(0,'mauvais mode de production','14:12:00','14:56:00'2,7);
insert into ControleProducteur (idVisite,idU) values(3,8);
insert into ControleProducteur (idVisite,idU) values(4,6);
insert into ControleProducteur (idVisite,idU) values(5,7);