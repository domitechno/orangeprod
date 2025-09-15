<h2 class="form-head"> Ajout d'un Technicien </h2>
<form method="post" action="" class="insert-form">

	<label>Nom Technicien :</label>
	<input type="text" name="nom"
			value ="<?= ($technicien!=null) ? $technicien['nom'] : '' ?>" required />

	<label>Prénom :</label>
	<input type="text" name="prenom"
			value ="<?= ($technicien!=null) ? $technicien['prenom'] : '' ?>" required />

	<label>Numéro de téléphone :</label>
	<input type="text" name="tel"
			value ="<?= ($technicien!=null) ? $technicien['tel'] : '' ?>" required />

	<label>Email:</label>
	<input type="text" name="email"
			value ="<?= ($technicien!=null) ? $technicien['email'] : '' ?>" required />

	<label>Mot de passe:</label>
	<input type="password" name="mdp"
			value ="<?= ($technicien!=null) ? $technicien['mdp'] : '' ?>" required />

	
	<input type="hidden" name="role" value="technicien" />	
			


	<!-- Boutons Annuler & Confirmer -->
	<input type="reset" name="Annuler" value="Annuler">
	<input type="submit" 
		<?= ($technicien!=null) ? ' name ="Modifier" value="Modifier" ' : ' name="Valider" value="Valider" ' ?> />
			


	<?= ($technicien!=null) ? '<input type="hidden" name="iduser" value="'.$technicien['iduser'].'" />' : '' ?>

</form>