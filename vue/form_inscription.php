<div id= "inscription">

	<div class="connexion_form_container">

		<div class="connexion_form">
			<h2 class="page-title"> Créer un compte </h2>

			<form method="post">

			<div class="login-container">
				<input class="login-input" type="text" name="nom" placeholder=" " />
				<label class="login-label"> Nom :</label>
			</div>
			<div class="login-container">
				<input class="login-input" type="text" name="prenom" placeholder=" " />
				<label class="login-label"> Prenom :</label>
			</div>
			<div class="login-container">
				<input class="login-input" type="text" name="email" placeholder=" " />
				<label class="login-label"> Email :</label>
			</div>
			<div class="login-container">
				<input class="login-input" type="text" name="tel" placeholder=" " />
				<label class="login-label"> Numéro de téléphone :</label>
			</div>
			<div class="login-container">
				<input class="login-input" type="password" name="mdp" placeholder=" " />
				<label class="login-label"> Mot de passe :</label>
			</div>
			
			<div class="login-btns">
				<input type="reset" name="Annuler" value="Annuler" class="reset-btn">
				<input type="submit" name="sInscrire" value="Inscription" class="confirm-btn">
			</div>

			<input type="hidden" name="role" value="client" />	

			</form>
		</div>
	</div>


	<div class="connexion_bg">
		<img src="http://localhost/Orange/images/inscription_bg.svg" />
		<div>
			<p>Déjà un compte?</p>
			<span>
				<a href="index.php?page=0">Se connecter</a>
			</span>
		</div>
	</div>
</div>