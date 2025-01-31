<?php
class UserBlocked {
    private $email;
    private $raison;

    // Constructeur
    public function __construct($email, $raison) {
        $this->email = $email;
        $this->raison = $raison;
    }

    // Getter pour email
    public function getEmail() {
        return $this->email;
    }

    // Setter pour email
    public function setEmail($email) {
        $this->email = $email;
    }

    // Getter pour raison
    public function getRaison() {
        return $this->raison;
    }

    // Setter pour raison
    public function setRaison($raison) {
        $this->raison = $raison;
    }
}
?>
