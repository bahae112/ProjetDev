<?php
include '../DAO/daoRapport.php';
include '../model/rapport.php';
session_start();
$action = $_GET['action']; //recuperer les infos d'inscription par la methode get (est un dictionnaire)
$dao = new DaoRapport();
switch ($action) {
    case 'rapport':
        $result=$dao->allUsers();
        foreach ($result as $row) {
            $utilisateur = new Utilisateur($row['visibility'], $row['name'], $row['website'], $row['telephone'], $row['email'], $row['password'], $row['birthdate'], $row['description'], $row['etat']);
            echo "<div class='utilisateur-container'>";
            echo "<div class='utilisateur' style='background-color: #f9f9f9; padding: 10px; border-radius: 10px; margin-bottom: 10px'>";
            echo "<form action='../view/upload.php' method='post' enctype='multipart/form-data'>";
            echo "<div class='form-group'>";
            echo "<input type='text' id='fileToUpload' name='fileToUpload' class='form-control-file'>";
            echo "</div>";
            echo "</form>";
            echo "</div>";
            echo "</div>";
            
        }
            break;
}
