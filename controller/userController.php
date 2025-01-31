<?php
include '../DAO/daoUtilisateur.php';
$action = $_GET['action']; //recuperer les infos d'inscription par la methode get (est un dictionnaire)
$dao = new DaoUtilisateur();
switch ($action) {
    case 'insert': // le cas d'insert (deja specifie sur index)
        $email = $_POST['email'];
        $password = $_POST['password'];
        $prenom = $_POST['firstName'];
        $nom = $_POST['lastName'];
        if (isset($email, $password, $prenom, $nom)) {
            $user = new Utilisateur($email,$password,$prenom,$nom, "inactif");
            $dao->saveUser($user);
            header('location:../view/connexion.html');
        }
        break;

        case 'login':
        $email = $_POST['email'];
        $password = $_POST['password'];
        $user =$dao->findUser($email,$password);
        $administrateur =$dao->findAdmin($email);
        $conseiller =$dao->findConseiller($email);
        $userbloque =$dao->findUserBloque($email);
        if($administrateur!=0){
            $dao->updateUser($user->GetEmail(),$user->getPassword(),"actif"); 
            session_start();
            $_SESSION['utilisateur']=$user;
            header('location:../view/page1.html');
        }
        if($conseiller!=0 && $administrateur==0 && $user==null){
            $dao->updateUser($user->GetEmail(),$user->getPassword(),"actif"); 
            session_start();
            $_SESSION['utilisateur']=$user;
            header('location:../view/conversation.php');
        }
        if($conseiller!=0 &&  $user!=null &&  $userbloque!=1){
            $dao->updateUser($user->GetEmail(),$user->getPassword(),"actif"); 
            session_start();
            $_SESSION['utilisateur']=$user;
            header('location:../view/conversation.php');
        }
        else if($user!=null && $administrateur==0 && $userbloque!=1){
            $dao->updateUser($user->GetEmail(),$user->getPassword(),"actif"); 
            session_start();
            $_SESSION['utilisateur']=$user;
            header('location:../view/index.html');
        }
        else if($user!=null && $administrateur!=0){
            $dao->updateUser($user->GetEmail(),$user->getPassword(),"actif"); 
            session_start();
            $_SESSION['utilisateur']=$user;
            header('location:../view/page1.html');
        }
        else{
         header('location:../view/connexion.html');
       }
        break;

        case 'logout':
            session_start();
            $user=$_SESSION['utilisateur'];
            $user =$dao->updateUser($user->GetEmail(),$user->getPassword(),"inactif");            
            header('location:../view/connexion.html');
            break;

        case 'users':
        $result=$dao->allUsers();
        foreach ($result as $row) {
            $utilisateur = new Utilisateur($row['email'], $row['password'], $row['prenom'], $row['nom'], $row['etat']);
            echo "<div class='utilisateur-container'>";
            echo "<div class='utilisateur' style='background-color: #f9f9f9; padding: 10px; border-radius: 10px;margin-bottom:10px'>";
            echo $utilisateur->getEmail() . "<br><br>";
            echo "</div>";
            echo "</div>";
        }
            break;

        case 'state':
        $result=$dao->allUsers();
        foreach ($result as $row) {
            $utilisateur = new Utilisateur($row['email'], $row['password'], $row['prenom'], $row['nom'], $row['etat']);
            echo "<div class='etat-container'>";
            echo "<div class='etat' style='background-color: #f9f9f9; padding: 10px; border-radius: 5px;margin-bottom:10px'>";
            echo $utilisateur->getEtat() . "<br><br>";
            echo "</div>";
            echo "</div>";
        }
            break;

            case 'rapport':
                $result=$dao->allUsers();
                foreach ($result as $row) {
                    $utilisateur = new Utilisateur($row['email'], $row['password'], $row['prenom'], $row['nom'], $row['etat']);
                    echo "<div class='utilisateur-container'>";
                    echo "<div class='utilisateur' style='background-color: #f9f9f9; padding: 10px; border-radius: 10px; margin-bottom: 10px'>";
                    echo "<form action='../view/upload.php' method='post' enctype='multipart/form-data'>";
                    echo "<div class='form-group'>";
                    echo "<input type='text'  name='contenu' class='form-control-file'>";
                    echo "</div>";
                    echo "</form>";
                    echo "</div>";
                    echo "</div>";
                    
                }
                    break;
            
}
