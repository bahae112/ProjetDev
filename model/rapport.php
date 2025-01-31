<?php

class Rapport {
    // Déclaration des attributs
    private $id;
    private $user;
    private $contenu;
    private $link;

    // Constructeur
    public function __construct($id, $user, $contenu, $link) {
        $this->id = $id;
        $this->user = $user;
        $this->contenu = $contenu;
        $this->link = $link;
    }

    // Getters
    public function getId() {
        return $this->id;
    }

    public function getUser() {
        return $this->user;
    }

    public function getContenu() {
        return $this->contenu;
    }

    public function getLink() {
        return $this->link;
    }

    // Setters
    public function setId($id) {
        $this->id = $id;
    }

    public function setUser($user) {
        $this->user = $user;
    }

    public function setContenu($contenu) {
        $this->contenu = $contenu;
    }

    public function setLink($link) {
        $this->link = $link;
    }
}

?>
