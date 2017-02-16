<?php

class Produit
{
	protected $id;
	protected $ref;
	protected $libelle;
	protected $description;
	protected $prix_unitaire;
	protected $quantite_stock;

	public function getIdProduit() {
		return $this->id;
	}

	public function setIdProduit($id) {
		$this->id = $id;
	}

	public function getRef() {
		return $this->ref;
	}

	public function setRef($ref) {
		$this->ref = $ref;
	}

	public function getLibelle() {
		return $this->libelle;
	}

	public function setLibelle($libelle) {
		$this->libelle = $libelle;
	}

	public function getDescription() {
		return $this->description;
	}

	public function setDescription($description) {
		$this->description = $description;
	}

	public function getPrixUnitaire() {
		return $this->prix_unitaire;
	}

	public function setPrixUnitaire($prix_unitaire) {
		$this->prix_unitaire = $prix_unitaire;
	}

	public function getQuantiteStock() {
		return $this->quantite_stock;
	}

	public function setQuantiteStock($quantite_stock) {
		$this->quantite_stock = $quantite_stock;
	}

	public function save($pdo) {
		
		//Si l'id est renseigné à l'appel de la méthode alors c'est une mise à jour, sinon $id équivaut à false et alors l'objet client actuel doit faire l'objet d'un nouvel enregistrement.
		if($this->id) {
			//appeler la bonne méthode
			$message = $this->update($pdo);
			return $message;
		} else {
			$message = $this->insert($pdo);
			return $message;
		}
	}

	private function insert($pdo) {

		try {
			//Exécuter la requête insert d'une personne en base de donnée
			//Préparation de la requête
			$stmt = $pdo->prepare('INSERT INTO produit (ref, libelle, description, prix_unitaire, quantite_stock) VALUES ( :ref, :libelle, :description, :prix_unitaire, :quantite_stock)');

			//Binder les paramètres à la requête de manière sécurisée
			$stmt->bindParam(':ref', $this->ref, PDO::PARAM_STR);
			$stmt->bindParam(':libelle', $this->libelle, PDO::PARAM_STR);
			$stmt->bindParam(':description', $this->description, PDO::PARAM_STR);
			$stmt->bindParam(':prix_unitaire', $this->prix_unitaire, PDO::PARAM_STR);
			$stmt->bindParam(':quantite_stock', $this->quantite_stock, PDO::PARAM_STR);
			//On exécute ensuite la requête préparée
			$stmt->execute();

			//On récupère l'id généré (auto-incrémenté) de la table personne
			$stmt2 = $pdo->prepare('SELECT MAX(id) FROM produit');
			$stmt2->execute();
			$obj = $stmt2->fetch(PDO::FETCH_OBJ);



			return "Votre nouveau produit a été enregistré avec succès";
		}
		catch(PDOException $e) {
			return "Votre enregistrement a échoué, en voici la raison : " . $e->getMessage();
		}

	}

	private function update($pdo) {

		try {
			//Exécuter la requête update d'une personne en base de donnée
			//Préparation de la requête
			$stmt = $pdo->prepare('UPDATE produit SET ref = :ref, libelle = :libelle, description = :description, prix_unitaire = :prix_unitaire, quantite_stock = :quantite_stock WHERE id = :id');

			//Binder les paramètres à la requête de manière sécurisée
			$stmt->bindParam(':id', $this->id, PDO::PARAM_INT);
			$stmt->bindParam(':ref', $this->ref, PDO::PARAM_STR);
			$stmt->bindParam(':libelle', $this->libelle, PDO::PARAM_STR);
			$stmt->bindParam(':description', $this->description, PDO::PARAM_STR);
			$stmt->bindParam(':prix_unitaire', $this->prix_unitaire, PDO::PARAM_STR);
			$stmt->bindParam(':quantite_stock', $this->quantite_stock, PDO::PARAM_STR);


			//On exécute ensuite la requête préparée
			$stmt->execute();

			//On crée le client correspondant avec le même id correspondant
			//Préparation de la requête

			return "Votre produit a été mis à jour avec succès";
		}
		catch(PDOException $e) {
			return "Votre mise à jour a échoué, en voici la raison : " . $e->getMessage();
		}
	}

	public function delete($pdo) {

		//Supprimer un enregistrement en base de donnée
		//Faire un try catch qui renvoie un message pour indiquer si la suppression s'est bien déroulée ou non
		try{
			$stmt = $pdo->prepare('DELETE FROM produit WHERE id = :id');
			$stmt->bindParam(':id', $this->id, PDO::PARAM_INT);

			$stmt->execute();

			return "Votre produit a bien été supprimé.";
		}
		catch(PDOException $e) {
			return "Votre suppression a échoué, en voici la raison : " . $e->getMessage();
		}
	}

}
