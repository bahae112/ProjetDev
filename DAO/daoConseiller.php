<?php
include '../model/utilisateur.php';

class DaoConseillerFinancier {
    private $dbh;

    public function __construct() {
        $this->dbh = new PDO('mysql:host=localhost;dbname=atelier8', "root", "");
    }

    public function getDbh() {
        return $this->dbh;
    }

    public function setDbh($dbh): void {
        $this->dbh = $dbh;
    }

    public function saveConseiller(Utilisateur $conseiller) {
        try {
            $stm = $this->dbh->prepare("INSERT INTO utilisateur (email, password, prenom, nom, etat) VALUES (?, ?, ?, ?, ?)");
            $stm->bindValue(1, $conseiller->getEmail());
            $stm->bindValue(2, $conseiller->getPassword());
            $stm->bindValue(3, $conseiller->getPrenom());
            $stm->bindValue(4, $conseiller->getNom());
            $stm->bindValue(5, $conseiller->getEtat());
            $stm->execute();
        } catch (PDOException $e) {
            print('Erreur :' . $e->getMessage());
        }
    }

    public function findConseiller($email, $password) {
        $conseiller = null;
        $stm = $this->dbh->prepare("SELECT * FROM utilisateur WHERE email = ? AND password = ?");
        $stm->bindParam(1, $email);
        $stm->bindParam(2, $password);
        $stm->execute();
        $result = $stm->fetch(PDO::FETCH_ASSOC);
        if (!empty($result)) {
            $conseiller = new Utilisateur($result['email'], $result['password'], $result['prenom'], $result['nom'], $result['etat']);
        }
        return $conseiller;
    }

    public function allConseillers() {
        $stm = $this->dbh->prepare("SELECT * FROM utilisateur");
        $stm->execute();
        $result = $stm->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    }

    public function updateConseiller($email, $password, $state) {
        $stm = $this->dbh->prepare("UPDATE utilisateur SET etat = ? WHERE email = ? AND password = ?");
        $stm->bindParam(1, $state);
        $stm->bindParam(2, $email);
        $stm->bindParam(3, $password);
        $stm->execute();
    }

    public function deleteConseiller($email) {
        $stm = $this->dbh->prepare("DELETE FROM utilisateur WHERE email = ?");
        $stm->bindParam(1, $email);
        $stm->execute();
    }

    public function blockConseiller($email, $raison) {
        try {
            $stm = $this->dbh->prepare("INSERT INTO userblocked (email, raison) VALUES (?, ?)");
            $stm->bindValue(1, $email);
            $stm->bindValue(2, $raison);
            $stm->execute();
        } catch (PDOException $e) {
            print('Erreur :' . $e->getMessage());
        }
    }

    public function unblockConseiller($email) {
        try {
            $stm = $this->dbh->prepare("DELETE FROM userblocked WHERE email = ?");
            $stm->bindParam(1, $email);
            $stm->execute();
        } catch (PDOException $e) {
            print('Erreur :' . $e->getMessage());
        }
    }
}

?>
