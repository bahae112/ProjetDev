<?php
class Reclamation {
    private $id;
    private $corps;
    private $date;
    private $utilisateur;

    // Constructeur
    public function __construct($id, $corps, $date, $utilisateur) {
        $this->id = $id;
        $this->corps = $corps;
        $this->date = $date;
        $this->utilisateur = $utilisateur;
    }

    // Getter pour id
    public function getId() {
        return $this->id;
    }

    // Setter pour id
    public function setId($id) {
        $this->id = $id;
    }

    // Getter pour corps
    public function getCorps() {
        return $this->corps;
    }

    // Setter pour corps
    public function setCorps($corps) {
        $this->corps = $corps;
    }

    // Getter pour date
    public function getDate() {
        return $this->date;
    }

    // Setter pour date
    public function setDate($date) {
        $this->date = $date;
    }

    // Getter pour utilisateur
    public function getUtilisateur() {
        return $this->utilisateur;
    }

    // Setter pour utilisateur
    public function setUtilisateur($utilisateur) {
        $this->utilisateur = $utilisateur;
    }
}
?>
