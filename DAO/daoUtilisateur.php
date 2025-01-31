<?php
include '../model/utilisateur.php';
class DaoUtilisateur
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
    public function saveUser(Utilisateur $user)
    {
        try {
            $stm = $this->dbh->prepare("INSERT into utilisateur values(?,?,?,?,?)");
            $stm->bindValue(1, $user->getEmail());
            $stm->bindValue(2, $user->getPassword());
            $stm->bindValue(3, $user->getNom());
            $stm->bindValue(4, $user->getPrenom());
            $stm->bindValue(5, $user->getEtat());
            $stm->execute();
        } catch (PDOException $e) {
            print('Erreur :' . $e->getMessage());
        }
    }
    public function findUser($email, $password)
    {
        $utilisateur = null;
        $stm = $this->dbh->prepare("SELECT * FROM utilisateur WHERE email=? AND password=?");
        $stm->bindParam(1, $email);
        $stm->bindParam(2, $password);
        $stm->execute();
        $result = $stm->fetch(pdo::FETCH_ASSOC);
        if (!empty($result)) {
            $utilisateur = new Utilisateur($row['email'], $row['password'], $row['prenom'], $row['nom'], $row['etat']);
        }
        return $utilisateur;
    }
    public function findAdmin($email)
{
    $stm = $this->dbh->prepare("SELECT * FROM administrateur WHERE email = ?");
    $stm->bindParam(1, $email);
    $stm->execute();
    $result = $stm->fetch(PDO::FETCH_ASSOC);  // Utilisation correcte de PDO::FETCH_ASSOC

    if (!empty($result)) {
        return 1;  // Retourne 1 si un administrateur est trouvé
    }
    
    return 0;  // Retourne 0 si aucun administrateur n'est trouvé
}
public function findConseiller($email)
{
    $stm = $this->dbh->prepare("SELECT * FROM conseiller WHERE email = ?");
    $stm->bindParam(1, $email);
    $stm->execute();
    $result = $stm->fetch(PDO::FETCH_ASSOC);  // Utilisation correcte de PDO::FETCH_ASSOC

    if (!empty($result)) {
        return 1;  // Retourne 1 si un administrateur est trouvé
    }
    
    return 0;  // Retourne 0 si aucun administrateur n'est trouvé
}

public function findUserBloque($email)
{
    $stm = $this->dbh->prepare("SELECT * FROM userblocked WHERE email = ?");
    $stm->bindParam(1, $email);
    $stm->execute();
    $result = $stm->fetch(PDO::FETCH_ASSOC);  // Utilisation correcte de PDO::FETCH_ASSOC

    if (!empty($result)) {
        return 1;  // Retourne 1 si un administrateur est trouvé
    }
    
    return 0;  // Retourne 0 si aucun administrateur n'est trouvé
}


    public function allUsers()
    {
        $stm = $this->dbh->prepare("SELECT * FROM utilisateur ");
        $stm->execute();
        $result = $stm->fetchAll();

    return $result;
}
public function updateUser($email,$password,$state)
    {   $stm = $this->dbh->prepare("UPDATE utilisateur SET etat=? WHERE  email = ? AND password=? ");
        $stm->bindParam(1, $state);
        $stm->bindParam(2, $email);
        $stm->bindParam(3, $password);
        $stm->execute();
}

}