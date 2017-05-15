#include <QApplication>
#include "mainwindow.h"
#include <QSqlDatabase>

int main(int argc, char *argv[])
{
    QApplication a(argc, argv);
    QSqlDatabase maBase=QSqlDatabase::addDatabase("QMYSQL");
    maBase.setDatabaseName("dbNewWorld");
    maBase.setHostName("localhost");
    maBase.setUserName("adminNewWorld");
    maBase.setPassword("xuactf42");
    if(maBase.open())
    {
        MainWindow w;
        w.show();
        return a.exec();
    }
    else
        return -125;
}
