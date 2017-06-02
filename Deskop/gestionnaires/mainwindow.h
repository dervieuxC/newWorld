#ifndef MAINWINDOW_H
#define MAINWINDOW_H

#include <QMainWindow>
#include <QTableWidgetItem>
#include <QListWidgetItem>

namespace Ui {
class MainWindow;
}

class MainWindow : public QMainWindow
{
    Q_OBJECT
    
public:
    explicit MainWindow(QWidget *parent = 0);
    ~MainWindow();
    int idMaxPersonnel();
    void clearLineEditPersonnel();
    /**
     * @brief remplireTableauxEmploye
     *permet de clear le tableaux et de cherhcer dans la BDD tout les utilisateur et de les afficher dans le tableaux
     */
    void remplireTableauxEmploye();
    void enableAjouter();
    void chargerRayon();
    void chargerCategorie(QString idRay);
    void chargerProduit(QString idCat);
    void remplireComboDemandeProduit();
    void test();

private slots:
    /**
     * @brief bouton modifier employe
     *Permet de modifier certaine information d'un employe
     */
    void on_pushButtonModifierEmploye_clicked();
    /**
     * @brief bouton ajouter employe
     *Permet d'ajouter un employe à la BDD
     */
    void on_pushButtonAddEmploye_clicked();
    /**
     * @brief bouton supprimer employe
     *Permet de supprimer un employe de la BDD
     */
    void on_pushButtonSuppEmploye_clicked();

    void on_tableWidgetEmploye_cellClicked(int row, int column);

    void on_pushButtonClearPers_clicked();

    void on_lineEditLogin_textChanged(const QString &arg1);

    void on_lineEditPrenom_textChanged(const QString &arg1);

    void on_lineEditNom_textChanged(const QString &arg1);

    void on_lineEditSSNb_textChanged(const QString &arg1);

    void on_radioButtonGestionnaire_clicked();

    void on_radioButtonControlleur_clicked();

    void on_listWidgetRayon_itemClicked(QListWidgetItem *item);

    void on_listWidgetCategorie_itemClicked(QListWidgetItem *item);

    void on_pushButtonAddRayon_clicked();

    void on_pushButtonAddCategorie_clicked();

    void on_pushButtonAddProduit_clicked();

    void on_lineEditProduit_textChanged(const QString &arg1);

    void on_lineEditCategorie_textChanged(const QString &arg1);

    void on_pushButtonDeleteRayon_clicked();

    void on_pushButtonDeleteCat_clicked();

    void on_pushButtonDeleteProd_clicked();

    void on_lineEditRayon_textChanged(const QString &arg1);

    void on_listWidgetProduit_itemClicked(QListWidgetItem *item);

    void on_comboBoxDemandeProd_activated(const QString &arg1);
private:
    Ui::MainWindow *ui;
    QString id;
    QString idRayon;
    QString idCat;
    QString idProd;
};

#endif // MAINWINDOW_H
