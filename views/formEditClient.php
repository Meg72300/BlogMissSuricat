<form action="./index.php" method="POST">

	<label>Civilité</label>
	<input type="text" name="civ" value="<?php echo $client->getCivilite() ?>"/>
	<br>
	<label>Nom</label>
	<input type="text" name="nom" value="<?php echo $client->getNom() ?>"/>
	<br>
	<label>Prénom</label>
	<input type="text" name="prenom" value="<?php echo $client->getPrenom() ?>"/>
	<br>
	<label>Date de naissance</label>
	<input type="text" name="date_naissance" value="<?php echo $client->getDateNaissance() ?>"/>
	<br>
	<label>Adresse</label>
	<input type="text" name="adresse" value="<?php echo $client->getAdresse() ?>"/>
	<br>
	<label>Code Postal</label>
	<input type="text" name="code_postal" value="<?php echo $client->getCp() ?>"/>
	<br>
	<label>Ville</label>
	<input type="text" name="ville" value="<?php echo $client->getVille() ?>"/>
	<br>
	<label>IBAN</label>
	<input type="text" name="iban" value="<?php echo $client->getIban() ?>"/>
	<br>
	<label>BIC</label>
	<input type="text" name="bic" value="<?php echo $client->getBic() ?>"/>

	<input type="submit" value="Mettre à jour"/>
	<br>
	<label><?php if(isset($message)) echo $message ?></label>
	<input type="hidden" name="id" value="<?php echo $client->getId() ?>"/>
	<input type="hidden" name="action" value="updateClient"/>
</form>