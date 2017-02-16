<form action="./index.php" method="POST">

	<label>Reference</label>
	<input type="text" name="ref" value="<?php echo $produit->getRef() ?>"/>
	<br>
	<label>Libelle</label>
	<input type="text" name="libelle" value="<?php echo $produit->getLibelle() ?>"/>
	<br>
	<label>Description</label>
	<input type="text" name="description" value="<?php echo $produit->getDescription() ?>"/>
	<br>
	<label>Prix Unitaire</label>
	<input type="text" name="prix_unitaire" value="<?php echo $produit->getPrixUnitaire() ?>"/>
	<br>
	<label>Quantite</label>
	<input type="text" name="quantite_stock" value="<?php echo $produit->getQuantiteStock() ?>"/>



	<input type="submit" value="Mettre à jour"/>
	<br>
	<label><?php if(isset($message)) echo $message ?></label>
	<input type="hidden" name="id" value="<?php echo $produit->getIdProduit() ?>"/>
	<input type="hidden" name="action" value="updateProduit"/>
</form>