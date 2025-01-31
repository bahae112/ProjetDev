<?php
include '../DAO/daoMessage.php';
include '../model/utilisateur.php';
session_start();
$action = $_GET['action']; //recuperer les infos d'inscription par la methode get (est un dictionnaire)
$dao = new DaoMessage();
switch ($action) {
    case 'send': // le cas d'insert (deja specifie sur index)
        $msg=new Message (0,$_POST['message'],$_SESSION['utilisateur']->getEmail(),date("Y-m-d H:i:s"));
        $dao->saveMessage($msg);
        break;
    case 'msgs':
        $result=$dao->allMesgs();
        foreach ($result as $row) {
            $msg=new Message($row['id'],$row['message'],$row['emetteur'], $row['date']);
            echo "<div class='message' style='border-radius: 10px;background-color: #dcf8c6;align-self: flex-end;'>";
            echo $msg->getEmetteur() . " " . $msg->getDate() . ":<br>" . $msg->getMsg() . "<br><br>";
            echo "</div>";
        }
        
        break;
 
}
