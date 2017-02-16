<?php

abstract class Personne 
{
	protected $id;
	protected $civilite;
	protected $nom;
	protected $prenom;
	protected $dateNaissance;
	protected $adresse;
	protected $cp;
	protected $ville;

	public function getId() {
		return $this->id;
	}

	public function setId($id) {
		$this->id = $id;
	}

	public function getCivilite() {
		return $this->civilite;
	}

	public function setCivilite($civ) {
		$this->civilite = $civ;
	}

	public function getNom() {
		return $this->nom;
	}

	public function setNom($nom) {
		$this->nom = $nom;
	}

	public function getPrenom() {
		return $this->prenom;
	}

	public function setPrenom($prenom) {
		$this->prenom = $prenom;
	}

	public function getDateNaissance() {
		return $this->dateNaissance;
	}

	public function setDateNaissance($dateNaissance) {
		$this->dateNaissance = $dateNaissance;
	}

	public function getAdresse() {
		return $this->adresse;
	}

	public function setAdresse($adresse) {
		$this->adresse = $adresse;
	}

	public function getCp() {
		return $this->cp;
	}

	public function setCp($cp) {
		$this->cp = $cp;
	}

	public function getVille() {
		return $this->ville;
	}

	public function setVille($ville) {
		$this->ville = $ville;
	}
}