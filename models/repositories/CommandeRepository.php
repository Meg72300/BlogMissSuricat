<?php

//Les objets repository permettent de récupérer des enregistrements en base de données
//Toutes les requpetes select sont donc sensées s'y trouver

class CommandeRepository
{

	//Récupère la liste de tous les clients en base de données
	public function getAll($pdo) {

		//Effectuer la requête en bdd pour récupérer l'ensemble des clients enregistrés en bdd
		$resultats = $pdo->query('SELECT client_id, c.id, date_cmd, date_expedition,  ref, s.libelle FROM commande c INNER JOIN statut s ON statut_id = s.id');

		$resultats->setFetchMode(PDO::FETCH_OBJ);

		//Boucler sur tous les enregistrements récupérés grâce à votre requête SELECT
		//et pour chaque enregistrement :
		// 1 -  instancier un objet client
		// 2 -  hydrater ses attributs avec les valeurs récupérées en bdd
		// 3 - pour chaque objet client instanciés et hydratés, les ajouter dans un tableau
		// 4 - retourner ensuite ce tableau avec l'instruction return

		$listeCommande = array();

		while($obj = $resultats->fetch()){	

			$commande = new Commande();
			$commande->setIdClient($obj->client_id);
			$commande->setIdCommande($obj->id);
			$commande->setRef($obj->ref);
			$commande->setDateCommande($obj->date_cmd);
			$commande->setDateExpedition($obj->date_expedition);
			$commande->setLibelle($obj->libelle);

			$listeCommande[] = $commande;

		}

		return $listeCommande;
	}
}