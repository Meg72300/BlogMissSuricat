<?php

class Client extends Personne
{
	private $bic;
	private $iban;

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
			$stmt = $pdo->prepare('INSERT INTO personne (civilite, nom, prenom, date_naissance, adresse, code_postal, ville) VALUES ( :civ, :nom, :prenom, :dateNaissance, :adresse, :cp, :ville)');

			//Binder les paramètres à la requête de manière sécurisée
			$stmt->bindParam(':civ', $this->civilite, PDO::PARAM_STR);
			$stmt->bindParam(':nom', $this->nom, PDO::PARAM_STR);
			$stmt->bindParam(':prenom', $this->prenom, PDO::PARAM_STR);
			$stmt->bindParam(':dateNaissance', $this->dateNaissance, PDO::PARAM_STR);
			$stmt->bindParam(':adresse', $this->adresse, PDO::PARAM_STR);
			$stmt->bindParam(':cp', $this->cp, PDO::PARAM_INT);
			$stmt->bindParam(':ville', $this->ville, PDO::PARAM_STR);

			//On exécute ensuite la requête préparée
			$stmt->execute();

			//On récupère l'id généré (auto-incrémenté) de la table personne
			$stmt2 = $pdo->prepare('SELECT MAX(id) FROM personne');
			$stmt2->execute();
			$obj = $stmt2->fetch(PDO::FETCH_OBJ);

			//On crée le client correspondant avec l'id correspondant
			//Préparation de la requête
			$stmt3 = $pdo->prepare('INSERT INTO client (id, bic, iban) VALUES (:id, :bic, :iban)');

			//Binder les paramètres à la requête de manière sécurisée
			$stmt3->bindParam(':id', $obj->id, PDO::PARAM_INT);
			$stmt3->bindParam(':bic', $this->bic, PDO::PARAM_STR);
			$stmt3->bindParam(':iban', $this->iban, PDO::PARAM_STR);

			//On exécute ensuite la requête préparée
			$stmt3->execute();

			return "Votre nouveau client a été enregistré avec succès";
		}
		catch(PDOException $e) {
			return "Votre enregistrement a échoué, en voici la raison : " . $e->getMessage();
		}

	}

	private function update($pdo) {

		try {
			//Exécuter la requête update d'une personne en base de donnée
			//Préparation de la requête
			$stmt = $pdo->prepare('UPDATE personne SET civilite = :civ, nom = :nom, prenom = :prenom, date_naissance = :dateNaissance, adresse = :adresse, code_postal = :cp, ville = :ville WHERE id = :id');

			//Binder les paramètres à la requête de manière sécurisée
			$stmt->bindParam(':id', $this->id, PDO::PARAM_INT);
			$stmt->bindParam(':civ', $this->civilite, PDO::PARAM_STR);
			$stmt->bindParam(':nom', $this->nom, PDO::PARAM_STR);
			$stmt->bindParam(':prenom', $this->prenom, PDO::PARAM_STR);
			$stmt->bindParam(':dateNaissance', $this->dateNaissance, PDO::PARAM_STR);
			$stmt->bindParam(':adresse', $this->adresse, PDO::PARAM_STR);
			$stmt->bindParam(':cp', $this->cp, PDO::PARAM_INT);
			$stmt->bindParam(':ville', $this->ville, PDO::PARAM_STR);

			//On exécute ensuite la requête préparée
			$stmt->execute();

			//On crée le client correspondant avec le même id correspondant
			//Préparation de la requête
			$stmt2 = $pdo->prepare('UPDATE client SET bic = :bic, iban = :iban WHERE id = :id');

			//Binder les paramètres à la requête de manière sécurisée
			$stmt2->bindParam(':id', $obj->id, PDO::PARAM_INT);
			$stmt2->bindParam(':bic', $this->bic, PDO::PARAM_STR);
			$stmt2->bindParam(':iban', $this->iban, PDO::PARAM_STR);

			//On exécute ensuite la requête préparée
			$stmt2->execute();

			return "Votre client a été mis à jour avec succès";
		}
		catch(PDOException $e) {
			return "Votre mise à jour a échoué, en voici la raison : " . $e->getMessage();
		}
	}

	public function delete($pdo) {

		//Supprimer un enregistrement en base de donnée
		//Faire un try catch qui renvoie un message pour indiquer si la suppression s'est bien déroulée ou non
		try{
			$stmt = $pdo->prepare('DELETE FROM personne WHERE id = :id');
			$stmt->bindParam(':id', $this->id, PDO::PARAM_INT);

			$stmt->execute();

			return "Votre client a bien été supprimé.";
		}
		catch(PDOException $e) {
			return "Votre suppression a échoué, en voici la raison : " . $e->getMessage();
		}
	}

	public function getBic() {
		return $this->bic;
	}

	public function setBic($bic) {
		$this->bic = $bic;
	}

	public function getIban() {
		return $this->iban;
	}

	public function setIban($iban) {
		$this->iban = $iban;
	}
}