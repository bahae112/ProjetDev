<?php
include '../model/message.php';
class DaoMessage
{
    private $dbh;

    public function __construct()
    {
        $this->dbh = new PDO('mysql:host=localhost;dbname=atelier8', "root", "");
    }

    public function getDbh()
    {
        return $this->dbh;
    }


    public function setDbh($dbh): void
    {
        $this->dbh = $dbh;
    }


    public function saveMessage(Message $msg)
    {
        try {
            $stm = $this->dbh->prepare("INSERT into message values(?,?,?,?)");
            $stm->bindValue(1, $msg->getId());
            $stm->bindValue(2, $msg->getMsg());
            $stm->bindValue(3, $msg->getEmetteur());
            $stm->bindValue(4, $msg->getDate());
            $stm->execute();
        } catch (PDOException $e) {
            print('Erreur :' . $e->getMessage());
        }
    }

    public function allMesgs()
    {
            $stm = $this->dbh->prepare("SELECT * FROM message order by date");
            $stm->execute();
            $result = $stm->fetchAll();

        return $result;
    }
  

}