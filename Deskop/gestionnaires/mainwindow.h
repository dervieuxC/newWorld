#ifndef MAINWINDOW_H
#define MAINWINDOW_H

#include <QMainWindow>
#include <QTableWidgetItem>
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

private:
    Ui::MainWindow *ui;
    /**
     * @brief remplireTableauxEmploye
     *permet de clear le tableaux et de cherhcer dans la BDD tout les utilisateur et de les afficher dans le tableaux
     */
    void remplireTableauxEmploye();
};

#endif // MAINWINDOW_H
