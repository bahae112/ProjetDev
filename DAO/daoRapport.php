<?php
include '../model/message.php';
class DaoRapport
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


    public function saveRapport(Rapport $rapport)
    {
        try {
            $stm = $this->dbh->prepare("INSERT into message values(?,?,?,?)");
            $stm->bindValue(1, $rapport->getId());
            $stm->bindValue(2, $rapport->getUser());
            $stm->bindValue(3, $msg->getContenu());
            $stm->bindValue(4, $msg->getLink());
            $stm->execute();
        } catch (PDOException $e) {
            print('Erreur :' . $e->getMessage());
        }
    }

    public function allRapports()
    {
            $stm = $this->dbh->prepare("SELECT * FROM rapport order by id");
            $stm->execute();
            $result = $stm->fetchAll();

        return $result;
    }
  

}