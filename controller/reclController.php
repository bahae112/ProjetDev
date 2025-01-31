<?php
include '../DAO/daoReclamation.php'; // Inclure la classe DaoReclamation
// include '../model/utilisateur.php'; // Inclure la classe Utilisateur
// include '../model/reclamation.php';
session_start();

$action = $_GET['action']; // Récupérer l'action par la méthode GET

$dao = new DaoReclamation(); // Instancier l'objet DaoReclamation

switch ($action) {
    case 'afficher': // Le cas d'affichage des réclamations
        $result = $dao->afficherReclamation();
        $tableRows = "<h2>Listes des réclamations</h2>
        <form id='deleteUsersForm'>
        <table border='1'>
        <tr>
            <th>ID</th>
            <th>Date de la Réclamation</th>
            <th>Client</th>
            <th>Contenu</th>
        </tr>";
        foreach ($result as $reclamation) {
            $tableRows .= "<tr>
                <td>" . $reclamation->getId() . "</td>
                <td>" . $reclamation->getDate() . "</td>
                <td>" . $reclamation->getUtilisateur() . "</td>
                <td>" . $reclamation->getCorps() . "</td>
            </tr>";
        }
        $tableRows .= "</table>  </form>";
        echo $tableRows;
        break;

    case 'afficher_user': // Le cas d'affichage des utilisateurs ayant fait une réclamation
        $utilisateurs = $dao->afficherReclamationUser();
        foreach ($utilisateurs as $utilisateur) {
            echo "Email: " . $utilisateur->getEmail() . "<br>";
            echo "Nom: " . $utilisateur->getNom() . "<br>";
            echo "Prénom: " . $utilisateur->getPrenom() . "<br>";
            echo "État: " . $utilisateur->getEtat() . "<br><br>";
        }
        break;

    // Autres cas à ajouter selon les besoins

    default:
        // Action par défaut si l'action n'est pas définie
        // Peut être une redirection vers une page d'erreur ou autre traitement
        break;
}
?>
