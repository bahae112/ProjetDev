<?php
include '../model/utilisateur.php'; // Inclure la classe Utilisateur
include '../model/reclamation.php'; // Inclure la classe Reclamation

class DaoReclamation {
    private $dbh;

    public function __construct() {
        $this->dbh = new PDO('mysql:host=localhost;dbname=atelier8', "root", "");
    }

    public function afficherReclamation() {
        $reclamations = array(); // Tableau pour stocker les réclamations

        // Requête pour sélectionner toutes les réclamations
        $stm = $this->dbh->prepare("SELECT * FROM reclamation");
        $stm->execute();

        // Parcourir les résultats et créer des objets Reclamation
        while ($row = $stm->fetch(PDO::FETCH_ASSOC)) {
            $reclamation = new Reclamation($row['id'], $row['corps'], $row['date'], $row['utilisateur']);
            $reclamations[] = $reclamation; // Ajouter la réclamation au tableau
        }

        return $reclamations; // Retourner le tableau des réclamations
    }

    public function afficherReclamationUser() {
        $utilisateurs = array(); // Tableau pour stocker les objets Utilisateur
    
        // Requête pour sélectionner les adresses email des utilisateurs ayant fait une réclamation
        $stm = $this->dbh->prepare("SELECT DISTINCT utilisateur FROM reclamation");
        $stm->execute();
    
        // Parcourir les résultats pour chaque adresse email
        while ($row = $stm->fetch(PDO::FETCH_ASSOC)) {
            $email = $row['utilisateur'];
    
            // Requête pour sélectionner les détails de l'utilisateur
            $userStm = $this->dbh->prepare("SELECT * FROM utilisateur WHERE email = ?");
            $userStm->bindParam(1, $email);
            $userStm->execute();
    
            // Récupérer les informations complètes de l'utilisateur
            $userRow = $userStm->fetch(PDO::FETCH_ASSOC);
            if ($userRow) {
                $utilisateur = new Utilisateur(
                    $userRow['email'],
                    $userRow['password'],
                    $userRow['prenom'],
                    $userRow['nom'],
                    $userRow['etat']
                );
                $utilisateurs[] = $utilisateur; // Ajouter l'objet Utilisateur au tableau
            }
        }
    
        return $utilisateurs; // Retourner le tableau d'objets Utilisateur ayant fait une réclamation
    }
    
}
?>
