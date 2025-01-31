<?php

$email=$_POST['username'] ;
$password=$_POST['password'];
$con=new mysqli("localhost","root","","atelier8");
if (!$con){
die('erreur : '.mysqli_error($con));
}

if (isset($email,$password)){
    $requete = "SELECT * FROM utilisateur WHERE email='$email' AND password='$password'";
    $result=$con->query($requete);
    $user=$result->fetch_assoc();
    if(!empty($user)){
    session_start();
    $_SESSION['utilisateur']=$user['name'];
    header('location:bienvenu.php');
}
}
?>