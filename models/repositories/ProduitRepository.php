<?php

//Les objets repository permettent de récupérer des enregistrements en base de données
//Toutes les requpetes select sont donc sensées s'y trouver

class ProduitRepository
{

	//Récupère la liste de tous les clients en base de données
	public function getAll($pdo) {

		//Effectuer la requête en bdd pour récupérer l'ensemble des clients enregistrés en bdd
		$resultats = $pdo->query('SELECT id, ref, libelle, description, prix_unitaire, quantite_stock FROM produit');

		$resultats->setFetchMode(PDO::FETCH_OBJ);

		//Boucler sur tous les enregistrements récupérés grâce à votre requête SELECT
		//et pour chaque enregistrement :
		// 1 -  instancier un objet client
		// 2 -  hydrater ses attributs avec les valeurs récupérées en bdd
		// 3 - pour chaque objet client instanciés et hydratés, les ajouter dans un tableau
		// 4 - retourner ensuite ce tableau avec l'instruction return

		$listeProduit = array();

		while($obj = $resultats->fetch()){	

			$produit = new Produit();
			$produit->setIdProduit($obj->id);
			$produit->setRef($obj->ref);
			$produit->setLibelle($obj->libelle);
			$produit->setDescription($obj->description);
			$produit->setPrixUnitaire($obj->prix_unitaire);
			$produit->setQuantiteStock($obj->quantite_stock);

			$listeProduit[] = $produit;

		}

		return $listeProduit;
	}

		//Récupère un client en fonction de l'id renseigné
	public function getOneById($pdo, $id) {

		//Effectuer la requête en bdd pour récupérer le client correspondant à l'id renseigné
		$resultat = $pdo->query('SELECT id, ref, libelle, description, prix_unitaire, quantite_stock FROM produit WHERE id = ' . $id);

		$resultat->setFetchMode(PDO::FETCH_OBJ);

		$obj = $resultat->fetch();
		
		//Ensuite :
		// 1 -  instancier un objet client
		// 2 -  hydrater ses attributs avec les valeurs récupérées en bdd
		// 3 -  retourner ensuite cet objet

$produit = new Produit();
			$produit->setIdProduit($obj->id);
			$produit->setRef($obj->ref);
			$produit->setLibelle($obj->libelle);
			$produit->setDescription($obj->description);
			$produit->setPrixUnitaire($obj->prix_unitaire);
			$produit->setQuantiteStock($obj->quantite_stock);

		return $produit;
	}
}