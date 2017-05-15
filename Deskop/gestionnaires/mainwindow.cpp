#include "mainwindow.h"
#include "ui_mainwindow.h"
#include <QSqlQuery>
#include <QSqlRecord>
#include <QDebug>
#include <QSqlError>
#include <QDate>
#include <QTime>
#include <QTableWidgetItem>

MainWindow::MainWindow(QWidget *parent) :
    QMainWindow(parent),
    ui(new Ui::MainWindow)
{
    ui->setupUi(this);
    remplireTableauxEmploye();
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
    int nombreDeColonne=6;
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
}

void MainWindow::on_pushButtonModifierEmploye_clicked()
{

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
    QString adresse1=ui->lineEditAdress->text();
    QString adresse2=ui->lineEditAdress2->text();
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
    requete+=adresse1;
    requete+="','";
    requete+=adresse2;
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
    ui->lineEditAdress2->clear();
    ui->lineEditSSNb->clear();
    ui->lineEditEmail->clear();
}

void MainWindow::on_pushButtonSuppEmploye_clicked()
{

}

void MainWindow::on_tableWidgetEmploye_cellClicked(int row, int column)
{
    QList<QTableWidgetItem*> ligneRecup=ui->tableWidgetEmploye->selectedItems();
    QString id;
    id=ui->tableWidgetEmploye->item(row,0)->data(32).toString();
    qDebug() << id;
    QSqlQuery recupPersonnel("select loginPers,nomPers,prenomPers,emailPers,ssNb,codePostalPers,paysPers,villePers,adresse1Pers,adresse2Pers from personnel where idPers="+id);
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
    ui->lineEditAdress2->setText(recupPersonnel.value(9).toString());
}

void MainWindow::on_pushButtonClearPers_clicked()
{
    clearLineEditPersonnel();
}
