#ifndef DIALOGAJOUTPRODUIT_H
#define DIALOGAJOUTPRODUIT_H

#include <QDialog>

namespace Ui {
class DialogAjoutProduit;
}

class DialogAjoutProduit : public QDialog
{
    Q_OBJECT
    
public:
    explicit DialogAjoutProduit(QWidget *parent = 0);
    ~DialogAjoutProduit();
    
private:
    Ui::DialogAjoutProduit *ui;
};

#endif // DIALOGAJOUTPRODUIT_H
