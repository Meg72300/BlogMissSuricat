<form action="./index.php" method="POST">

	<label>Reference</label>
	<input type="text" name="ref" />
	<br>
	<label>Libelle</label>
	<input type="text" name="libelle" />
	<br>
	<label>Description</label>
	<input type="text" name="description" />
	<br>
	<label>Prix Unitaire</label>
	<input type="text" name="prix_unitaire" />
	<br>
	<label>Quantite</label>
	<input type="text" name="quantite_stock" />
	<br>

	<input type="submit" value="Ajouter"/>
	<br>
	<label><?php if(isset($message)) echo $message ?></label>
	<input type="hidden" name="action" value="insertProduit"/>
</form>