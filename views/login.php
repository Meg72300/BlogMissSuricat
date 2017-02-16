<form action="./index.php" method="POST">

	<label>Login</label>
	<input type="text" name="login"/>
	<br>
	<label>Mot de passe</label>
	<input type="text" name="pwd"/>
	<br>
	<input type="submit" value="Connexion"/>
	<label><?php if(isset($message)) echo $message ?></label>
	<input type="hidden" name="action" value="verifLogin"/>
</form>