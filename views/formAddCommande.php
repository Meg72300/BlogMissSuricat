<form method="POST" action="listProduit">
	<p>
		<label for="produit">Quel produit souhaitez-vous commander</label><br />
		<select name="produit" id="produit">
			<?php foreach ($listeProduit as $produit): ?>
				<option value="id">libelle</option>
			<?php endforeach ?>
		</select><br />
		<select name="produit" id="produit">
			<?php foreach ($listeProduit as $produit): ?>
				<option value="id">libelle</option>
			<?php endforeach ?>
		</select><br />
		<select name="produit" id="produit">
			<?php foreach ($listeProduit as $produit): ?>
				<option value="id">libelle</option>
			<?php endforeach ?>
		</select><br />
	</p>
</form>