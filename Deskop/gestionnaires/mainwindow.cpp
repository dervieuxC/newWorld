#include "mainwindow.h"
#include "ui_mainwindow.h"
#include <QSqlQuery>
#include <QSqlRecord>
#include <QDebug>
#include <QSqlError>
#include <QDate>
#include <QTime>
#include <QTableWidgetItem>
#include <QMessageBox>
#include <QListWidget>
#include <QListWidgetItem>

MainWindow::MainWindow(QWidget *parent) :
    QMainWindow(parent),
    ui(new Ui::MainWindow)
{
    ui->setupUi(this);
    remplireTableauxEmploye();
    chargerRayon();
    remplireComboDemandeProduit();
    //chargerCategorie();
    //chargerProduit();
    //iniDemandeAddProd();
    iniTableProducteur();
}

MainWindow::~MainWindow()
{
    delete ui;
}

int MainWindow::idMaxPersonnel()
{
    QSqlQuery queryMaxId("select ifnull(max(idPers),0)+1 from personnel");
    queryMaxId.exec();
    queryMaxId.first();
    int maxId=queryMaxId.value(0).toInt();
    qDebug() << "max id:" <<maxId << endl;
    return maxId;
}


void MainWindow::remplireTableauxEmploye()
{
    ui->tableWidgetEmploye->clear();
    QSqlQuery newquery("select idPers,nomPers,prenomPers,emailPers,loginPers,dateEmbauchePers from personnel where supprimePers=0");
    int nombreDEmploye=newquery.size();
    qDebug() << nombreDEmploye;
    ui->tableWidgetEmploye->setRowCount(nombreDEmploye);
    int numeroDeLigne=0;
    while(newquery.next())
    {
            int numeroDeColonne=0;
            for(int i=1;i < 6;i++)
            {
                QString resultat=newquery.value(i).toString();
                QTableWidgetItem * resultatConvertie= new QTableWidgetItem(resultat);
                if(numeroDeColonne==0)
                {
                    resultatConvertie->setData(32,newquery.value(0).toString());
                }
                ui->tableWidgetEmploye->setItem(numeroDeLigne,i-1,resultatConvertie);
                numeroDeColonne+=1;
            }
            numeroDeLigne+=1;
    }
    ui->pushButtonModifierEmploye->setDisabled(1);
    ui->pushButtonSuppEmploye->setDisabled(1);
}

void MainWindow::enableAjouter()
{
    QString pseudo=ui->lineEditLogin->text();
    QString nom=ui->lineEditNom->text();
    QString prenom=ui->lineEditPrenom->text();
    QString ssNb=ui->lineEditSSNb->text();
    if(pseudo!="" && nom!="" && prenom!="" && ssNb.length()==15 && (ui->radioButtonControlleur->isChecked() || ui->radioButtonGestionnaire->isChecked()))
    {
        ui->pushButtonAddEmploye->setEnabled(1);
    }
    else
    {
        ui->pushButtonAddEmploye->setDisabled(1);
    }
}

void MainWindow::chargerRayon()
{
    ui->listWidgetRayon->clear();
    QSqlQuery remplireRayon("select idRay,libelleRay from rayon;");
    int numeroDeLigne=0;
    while(remplireRayon.next())
    {
        QString newRayon=remplireRayon.value(1).toString();
        qDebug()<<newRayon;
        QListWidgetItem *newItem = new QListWidgetItem;
           newItem->setText(newRayon);
           newItem->setData(32,remplireRayon.value(0).toString());
           ui->listWidgetRayon->insertItem(numeroDeLigne, newItem);
          numeroDeLigne+=1;
    }
}

void MainWindow::chargerProduit(QString idCategorie)
{
    ui->listWidgetProduit->clear();
    QSqlQuery remplireProduit("select idProd,libelleProd from produit where idCat="+idCategorie+" and etatProd='VAL' and supprimeProd=0;");
    int numeroDeLigne=0;
    while(remplireProduit.next())
    {
        QString newProduit=remplireProduit.value(1).toString();
        qDebug()<<newProduit;
        QListWidgetItem *newItem = new QListWidgetItem;
           newItem->setText(newProduit);
           newItem->setData(32,remplireProduit.value(0).toString());
           ui->listWidgetProduit->insertItem(numeroDeLigne, newItem);
          numeroDeLigne+=1;
    }
}



void MainWindow::on_pushButtonModifierEmploye_clicked()
{
    //id=ui->tableWidgetEmploye->item(row,0)->data(32).toString();
    qDebug() << id;
    QString pseudo=ui->lineEditLogin->text();
    QString nom=ui->lineEditNom->text();
    QString prenom=ui->lineEditPrenom->text();
    QString mail=ui->lineEditEmail->text();
    QString codePostal=ui->lineEditPostalCode->text();
    QString ville=ui->lineEditTown->text();
    QString adresse=ui->lineEditAdress->text();
    QSqlQuery newquery("select idPers,nomPers,prenomPers,emailPers,codePostalPers,villePers,adressePers,loginPers from personnel where idPers="+ id +";");
    newquery.exec();
    newquery.next();
    QString nomBDD=newquery.value(1).toString();
    qDebug()<<nomBDD;
    QString prenomBDD=newquery.value(2).toString();
    QString emailBDD=newquery.value(3).toString();
    QString cpBDD=newquery.value(4).toString();
    QString villeBDD=newquery.value(5).toString();
    QString adresseBDD=newquery.value(6).toString();
    QString pseudoBDD=newquery.value(8).toString();
    qDebug() << pseudo+pseudoBDD;
    QMessageBox::StandardButton reply;
      reply = QMessageBox::question(this, "Validation modification", "vouler vous réellement modifier le profil de: "+ nomBDD + " " + prenomBDD,
                                    QMessageBox::Yes|QMessageBox::No);
      if (reply == QMessageBox::Yes) {
        qDebug() << "Yes was clicked";
        if (pseudo!=pseudoBDD)
        {
            QSqlQuery newUpdate("update personnel set loginPers='"+ pseudo+"' where idPers="+id+";");
            newUpdate.exec();
        }
        if(nom!=nomBDD)
        {
            QSqlQuery newUpdate("update personnel set nomPers='"+ nom +"' where idPers="+id+";");
            newUpdate.exec();
        }
        if(prenom!=prenomBDD)
        {
            QSqlQuery newUpdate("update personnel set prenomPers='"+ prenom+"' where idPers="+id+";");
            newUpdate.exec();
        }
        if(mail!=emailBDD)
        {
            QSqlQuery newUpdate("update personnel set emailPers='"+ mail+"' where idPers="+id+";");
            newUpdate.exec();
        }
        if(codePostal!=cpBDD)
        {
            QSqlQuery newUpdate("update personnel set codePostalPers='"+ codePostal+"' where idPers="+id+";");
            newUpdate.exec();
        }
        if(ville!=villeBDD)
        {
            QSqlQuery newUpdate("update personnel set villePers='"+ ville+"' where idPers="+id+";");
            newUpdate.exec();
        }
        if(adresse!=adresseBDD)
        {
            QSqlQuery newUpdate("update personnel set adressePers='"+ adresse+"' where idPers="+id+";");
            newUpdate.exec();
        }

      } else {
        qDebug() << "Yes was *not* clicked";
      }

    remplireTableauxEmploye();
}

void MainWindow::on_pushButtonAddEmploye_clicked()
{
    const QString possibleCharacters("ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789");
    QTime time;
    qsrand(time.currentTime().msec());
    QString randomString;
    for(int i=0; i<8; ++i)
    {
        int index = qrand() % possibleCharacters.length();
        QChar nextChar = possibleCharacters.at(index);
        randomString.append(nextChar);
    }
    qDebug() << randomString;
    qDebug() << QDate::currentDate();
    QDate now=QDate::currentDate();
    int id=idMaxPersonnel();
    QString nom=ui->lineEditNom->text();
    QString prenom=ui->lineEditPrenom->text();
    QString mail=ui->lineEditEmail->text();
    QString ssnb=ui->lineEditSSNb->text();
    QString date=now.toString("yyyy-MM-dd");
    qDebug () << date;
    QString codePostal=ui->lineEditPostalCode->text();
    QString pays="France";
    QString ville=ui->lineEditTown->text();
    QString adresse=ui->lineEditAdress->text();
    QString pseudo=ui->lineEditLogin->text();
    QString type;
    if (ui->radioButtonControlleur->isChecked())
    {
        type="1";
    }
    else
    {
        type="2";
    }
    QSqlQuery newEmploye;
    QString requete="insert into personnel values(";
    requete+=QString::number(id);
    requete+=",'";
    requete+=nom;
    requete+="','";
    requete+= prenom;
    requete+= "','";
    requete+=mail;
    requete+="','";
    requete+=ssnb;
    requete+="','";
    requete+=randomString;
    requete+="','";
    requete+=date;
    requete+="',";
    requete+="0";
    requete+=",'";
    requete+=codePostal;
    requete+="','";
    requete+=pays;
    requete+="','";
    requete+=ville;
    requete+="','";
    requete+=adresse;
    requete+="','";
    requete+=pseudo;
    requete+="',";
    requete+=type;
    requete+=");";
    qDebug()<< requete;
    if(newEmploye.exec(requete))
    {
    remplireTableauxEmploye();
    clearLineEditPersonnel();
    }
    else
    {
    qDebug()<<QSqlDatabase::database().lastError();
    qDebug()<<newEmploye.lastError().text();
    }

}

void MainWindow::clearLineEditPersonnel()
{
    ui->lineEditLogin->clear();
    ui->lineEditNom->clear();
    ui->lineEditPrenom->clear();
    ui->lineEditPostalCode->clear();
    ui->lineEditTown->clear();
    ui->lineEditAdress->clear();
    ui->lineEditSSNb->clear();
    ui->lineEditEmail->clear();
    ui->pushButtonSuppEmploye->setDisabled(1);
    ui->pushButtonModifierEmploye->setDisabled(1);
}

void MainWindow::on_pushButtonSuppEmploye_clicked()
{
    QSqlQuery newquery("select nomPers,prenomPers from personnel where idPers="+ id +";");
    newquery.exec();
    newquery.next();
    QString nomBDD=newquery.value(0).toString();
    QString prenomBDD=newquery.value(1).toString();
    QMessageBox::StandardButton reply;
      reply = QMessageBox::question(this, "Validation supression", "vouler vous réellement supprimer "+ nomBDD + " " + prenomBDD,
                                    QMessageBox::Yes|QMessageBox::No);
      if (reply == QMessageBox::Yes) {
        qDebug() << "Yes was clicked";
        QSqlQuery newDelete ("update personnel set supprimePers=1 where idPers="+id);
        newDelete.exec();
      } else {
        qDebug() << "Yes was *not* clicked";
      }
      remplireTableauxEmploye();
}

void MainWindow::on_tableWidgetEmploye_cellClicked(int row, int column)
{
    QList<QTableWidgetItem*> ligneRecup=ui->tableWidgetEmploye->selectedItems();
    id=ui->tableWidgetEmploye->item(row,0)->data(32).toString();
    qDebug() << id;
    QSqlQuery recupPersonnel("select loginPers,nomPers,prenomPers,emailPers,ssNb,codePostalPers,paysPers,villePers,adressePers from personnel where idPers="+id);
    recupPersonnel.exec();
    recupPersonnel.first();
    ui->lineEditLogin->setText(recupPersonnel.value(0).toString());
    ui->lineEditNom->setText(recupPersonnel.value(1).toString());
    ui->lineEditPrenom->setText(recupPersonnel.value(2).toString());
    ui->lineEditEmail->setText(recupPersonnel.value(3).toString());
    ui->lineEditSSNb->setText(recupPersonnel.value(4).toString());
    ui->lineEditPostalCode->setText((recupPersonnel.value(5).toString()));
    ui->lineEditTown->setText(recupPersonnel.value(7).toString());
    ui->lineEditAdress->setText(recupPersonnel.value(8).toString());
    ui->pushButtonSuppEmploye->setEnabled(1);
    ui->pushButtonModifierEmploye->setEnabled(1);
}

void MainWindow::on_pushButtonClearPers_clicked()
{
    clearLineEditPersonnel();
}



void MainWindow::on_lineEditLogin_textChanged(const QString &arg1)
{
    enableAjouter();
}

void MainWindow::on_lineEditPrenom_textChanged(const QString &arg1)
{
    enableAjouter();
}

void MainWindow::on_lineEditNom_textChanged(const QString &arg1)
{
    enableAjouter();
}

void MainWindow::on_lineEditSSNb_textChanged(const QString &arg1)
{
    enableAjouter();
}

void MainWindow::on_radioButtonGestionnaire_clicked()
{
    enableAjouter();
}

void MainWindow::on_radioButtonControlleur_clicked()
{
    enableAjouter();
}

void MainWindow::on_listWidgetRayon_itemClicked(QListWidgetItem *item)
{
    ui->listWidgetProduit->clear();
    ui->listWidgetCategorie->clear();
    QString idRay=item->data(32).toString();
    qDebug()<<idRay;
    chargerCategorie(idRay);
    ui->lineEditCategorie->setEnabled(1);
    ui->lineEditProduit->setDisabled(1);
    ui->pushButtonAddProduit->setDisabled(1);
    ui->lineEditCategorie->clear();
    ui->lineEditProduit->clear();
    idRayon=idRay;
    ui->pushButtonDeleteRayon->setEnabled(1);
    ui->pushButtonDeleteCat->setDisabled(1);
    ui->pushButtonDeleteProd->setDisabled(1);
}

void MainWindow::on_listWidgetCategorie_itemClicked(QListWidgetItem *item)
{
    ui->listWidgetProduit->clear();
    QString idCategorie=item->data(32).toString();
    qDebug()<<idCategorie;
    chargerProduit(idCategorie);
    ui->lineEditProduit->setEnabled(1);
    idCat=idCategorie;
    ui->pushButtonDeleteCat->setEnabled(1);
    ui->pushButtonDeleteProd->setDisabled(1);
}

void MainWindow::on_pushButtonAddRayon_clicked()
{
    QString newRayon=ui->lineEditRayon->text();
    QSqlQuery maxId("select ifnull(max(idRay),0)+1 from rayon;");
    maxId.exec();
    maxId.next();
    int idMax=maxId.value(0).toInt();
    qDebug()<<idMax;
    QString newId=QString::number(idMax);
    qDebug()<<newId+" "+newRayon;
    QSqlQuery newquery("insert into rayon(idRay,libelleRay) values("+newId+",'"+newRayon+"');");
    newquery.exec();
    chargerRayon();

}

void MainWindow::on_pushButtonAddCategorie_clicked()
{
    QString newCat=ui->lineEditCategorie->text();
    QSqlQuery maxId("select ifnull(max(idCat),0)+1 from categorie;");
    maxId.exec();
    maxId.next();
    int idMax=maxId.value(0).toInt();
    qDebug()<<idMax;
    QString newId=QString::number(idMax);
    qDebug()<<newId+" "+newCat;
    QSqlQuery newquery("insert into categorie values("+newId+",'"+newCat+"',"+ idRayon+");");
    newquery.exec();
}

void MainWindow::on_pushButtonAddProduit_clicked()
{
    QString newProd=ui->lineEditProduit->text();
    QSqlQuery maxId("select ifnull(max(idProd),0)+1 from produit;");
    maxId.exec();
    maxId.next();
    QString newId=maxId.value(0).toString();
    qDebug()<<newId+" "+newProd;
    QSqlQuery newquery("insert into produit(idProd,libelleProd,idCat) values("+newId+",'"+newProd+"',"+ idCat+");");
    newquery.exec();
}

void MainWindow::on_lineEditProduit_textChanged(const QString &arg1)
{
    if ( arg1=="")
    {
        ui->pushButtonAddProduit->setDisabled(1);
    }
    else
    {
        ui->pushButtonAddProduit->setEnabled(1);
    }
}

void MainWindow::on_lineEditCategorie_textChanged(const QString &arg1)
{
    if ( arg1=="")
    {
        ui->pushButtonAddCategorie->setDisabled(1);
    }
    else
    {
        ui->pushButtonAddCategorie->setEnabled(1);
    }
}

void MainWindow::on_pushButtonDeleteRayon_clicked()
{
    if (ui->listWidgetCategorie->count()==0)
    {
        QSqlQuery newDelete("delete from rayon where idRay="+idRayon);
        chargerRayon();
    }
    else
    {
        QMessageBox msgBox;
        msgBox.setText("Ce Rayon n'a pas put être modifier car il possède toujours des catégories");
        msgBox.exec();
    }
}

void MainWindow::on_pushButtonDeleteCat_clicked()
{
    if (ui->listWidgetProduit->count()==0)
    {
        QSqlQuery newDelete("delete from categorie where idCat="+idCat+";");
        chargerCategorie(idRayon);
    }
    else
    {
        QMessageBox msgBox;
        msgBox.setText("Cette catégorie n'a pas put être supprimer car il reste au moins un produit");
        msgBox.exec();
    }
}

void MainWindow::on_pushButtonDeleteProd_clicked()
{
    qDebug()<<idProd;
    QSqlQuery newDelete("delete from produit where idProd="+idProd+";");
    newDelete.exec();
    chargerProduit(idCat);
}

void MainWindow::on_lineEditRayon_textChanged(const QString &arg1)
{
    if ( arg1=="")
    {
        ui->pushButtonAddRayon->setDisabled(1);
    }
    else
    {
        ui->pushButtonAddRayon->setEnabled(1);
    }
}

void MainWindow::on_listWidgetProduit_itemClicked(QListWidgetItem *item)
{
    QString idProduit=item->data(32).toString();
    qDebug()<<idProduit;
    idProd=idProduit;
    ui->pushButtonDeleteProd->setEnabled(1);
}



void MainWindow::on_comboBoxDemandeProd_activated(const QString &arg1)
{
    qDebug()<<arg1;
    QString texte="select descriptionProd from produit where libelleProd='"+arg1+"';";
    QSqlQuery recupDescri("select descriptionProd from produit where libelleProd='"+arg1+"';");
    qDebug()<< texte;
    recupDescri.next();
    QString description=recupDescri.value(0).toString();
    ui->textEditDescriptionAddProd->setText(description);
    ui->lineEditAddProd->setText(arg1);
    ui->pushButtonNAddNewProd->setEnabled(true);
    ui->pushButtonAddNewProd->setEnabled(true);

}

void MainWindow::chargerCategorie(QString idRay)
{
    ui->listWidgetCategorie->clear();
    QSqlQuery remplireCategorie("select idCat,libelleCat from categorie where idRay="+ idRay+" and supprimeCat=0;");
    int numeroDeLigne=0;
    while(remplireCategorie.next())
    {
        QString newCategorie=remplireCategorie.value(1).toString();
        qDebug()<<newCategorie;
        QListWidgetItem *newItem = new QListWidgetItem;
           newItem->setText(newCategorie);
           newItem->setData(32,remplireCategorie.value(0).toString());
           ui->listWidgetCategorie->insertItem(numeroDeLigne, newItem);
          numeroDeLigne+=1;
    }
}

void MainWindow::on_pushButtonAddNewProd_clicked()
{
    QString description=ui->textEditDescriptionAddProd->toPlainText();
    QString libelle=ui->lineEditAddProd->text();
    int index=ui->comboBoxDemandeProd->currentIndex();
    QString idProd=ui->comboBoxDemandeProd->itemData(index).toString();
    qDebug()<<idProd;
    QSqlQuery changementProd("update produit set libelleProd='"+libelle+"',descriptionProd='"+description+"',etatProd='VAL' where idProd="+idProd+";");
    changementProd.exec();
    ui->comboBoxDemandeProd->clear();
    remplireComboDemandeProduit();
}

void MainWindow::remplireComboDemandeProduit()
{
    QSqlQuery demandeProduit("select libelleProd,idProd from produit where etatProd='ATT';");
    while(demandeProduit.next())
    {
        QString id=demandeProduit.value(1).toString();
        qDebug()<<id;
        QString libelle=demandeProduit.value(0).toString();
        ui->comboBoxDemandeProd->addItem(libelle,id);
    }
}



void MainWindow::on_pushButtonNAddNewProd_clicked()
{
    QString description=ui->textEditDescriptionAddProd->toPlainText();
    QString libelle=ui->lineEditAddProd->text();
    int index=ui->comboBoxDemandeProd->currentIndex();
    QString idProd=ui->comboBoxDemandeProd->itemData(index).toString();
    qDebug()<<idProd;
    QSqlQuery changementProd("update produit set libelleProd='"+libelle+"',descriptionProd='"+description+"',etatProd='REF' where idProd="+idProd+";");
    changementProd.exec();
    ui->comboBoxDemandeProd->clear();
    remplireComboDemandeProduit();
}
/*
 *
 *
 *  Partie Visite
 *
 *
 **/

void MainWindow::iniTableProducteur()
{
  QSqlQuery requeteProducteur("select nomU,prenomU,villeU from utilisateur where idTypeU=3;");
  int numeroDeLigne=0;
  while(requeteProducteur.next())
  {
      for(int i=0;i < 3;i++)
      {

          QString resultat=requeteProducteur.value(i).toString();
          qDebug()<<resultat;
          QTableWidgetItem * resultatConvertie= new QTableWidgetItem(resultat);
          ui->tableWidgetlistProducteur->setItem(numeroDeLigne,i,resultatConvertie);
      }
      numeroDeLigne+=1;


  }
}
