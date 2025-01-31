<?php
include '../model/utilisateur.php';
session_start();
if (isset($_SESSION['utilisateur'])){
    echo "<button class='btn ' style='border-right: 1px solid #ccc;overflow-y: auto;background-color: black;'><a href='../controller/userController.php?action=logout' style='text-decoration: none; color: white;'>Déconnexion</a></button>
    ";
   
}
else {
    header('location:login.html');
}
?>