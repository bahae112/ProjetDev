<?php
class Utilisateur
{
	private $email;
	private $password;
	private $nom;
	private $prenom;
	private $etat;

	public function __construct($email, $password,$nom,$prenom,$etat)
	{
		$this->email = $email;
		$this->password = $password;
		$this->nom = $nom;
		$this->prenom = $prenom;
		$this->etat = $etat;
	}


	public function getEtat()
	{
		return $this->etat;
	}
	public function setEtat($etat): void
	{
		$this->etat = $etat;
	}

	public function setEmail($email): void
	{
		$this->email = $email;
	}

	public function setPassword($password): void
	{
		$this->password = $password;
	}
	public function getEmail()
	{
		return $this->email;
	}

	public function getPassword()
	{
		return $this->password;
	}
	public function getNom()
	{
		return $this->nom;
	}
	public function getPrenom()
	{
		return $this->prenom;
	}
	public function setNom($nom): void
	{
		$this->nom = $nom;
	}
	public function setPrenom($prenom): void
	{
		$this->prenom = $prenom;
	}
}
?>