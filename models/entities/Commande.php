<?php

class Commande
{
	protected $idClient;
	protected $idCommande;
	protected $ref;
	protected $dateCommande;
	protected $dateExpedition;
	protected $libelle;

	public function getIdClient() {
		return $this->idClient;
	}

	public function setIdClient($idClient) {
		$this->idClient = $idClient;
	}

	public function getIdCommande() {
		return $this->idCommande;
	}

	public function setIdCommande($idCommande) {
		$this->idCommande = $idCommande;
	}

	public function getRef() {
		return $this->ref;
	}

	public function setRef($ref) {
		$this->ref = $ref;
	}

	public function getDateCommande() {
		return $this->dateCommande;
	}

	public function setDateCommande($dateCommande) {
		$this->dateCommande = $dateCommande;
	}

	public function getDateExpedition() {
		return $this->dateExpedition;
	}

	public function setDateExpedition($dateExpedition) {
		$this->dateExpedition = $dateExpedition;
	}

	public function getLibelle() {
		return $this->libelle;
	}

	public function setLibelle($libelle) {
		$this->libelle = $libelle;
	}

}
