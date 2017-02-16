<?php

class Statut
{

	private $id;
	private $libelle;

	public function getId() {
		return $this->id;
	}

	public function setid($id) {
		$this->id = $id;
	}

	public function getLibelle() {
		return $this->libelle;
	}

	public function setLibelle($libelle) {
		$this->libelle = $libelle;
	}
}