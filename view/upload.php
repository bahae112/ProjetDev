<?php 
// Récupérer le contenu du fichier téléchargé
$contenu = $_POST['contenu'];

// Connexion à la base de données
$con = new mysqli("localhost", "root", "", "atelier8");
if ($con->connect_error) {
    die('Erreur de connexion : ' . $con->connect_error);
}

// Préparation de la requête pour éviter les injections SQL
$stmt = $con->prepare("INSERT INTO rapport (contenu) VALUES (?)");
if (!$stmt) {
    die('Erreur de préparation : ' . $con->error);
}

// Lier le paramètre et exécuter la requête
$stmt->bind_param("s", $contenu);
$result = $stmt->execute();

if ($result) {
    echo "element ajoute";
    exit;
} else {
    echo 'Échec : ' . $stmt->error;
}

$stmt->close();
$con->close(); 
?>
