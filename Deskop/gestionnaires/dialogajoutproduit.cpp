#include "dialogajoutproduit.h"
#include "ui_dialogajoutproduit.h"

DialogAjoutProduit::DialogAjoutProduit(QWidget *parent) :
    QDialog(parent),
    ui(new Ui::DialogAjoutProduit)
{
    ui->setupUi(this);
}

DialogAjoutProduit::~DialogAjoutProduit()
{
    delete ui;
}
