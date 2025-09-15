<h2 class="form-head"> Ajout d'un Client </h2>
<form method="post" action="" class="insert-form">

	<label>Nom Client :</label>
	<input type="text" name="nom"
			value ="<?= ($client!=null) ? $client['nom'] : '' ?>" required />

	<label>Prénom :</label>
	<input type="text" name="prenom"
			value ="<?= ($client!=null) ? $client['prenom'] : '' ?>" required />

	<label>Numéro de téléphone :</label>
	<input type="text" name="tel"
			value ="<?= ($client!=null) ? $client['tel'] : '' ?>" required />

	<label>Email:</label>
	<input type="text" name="email"
			value ="<?= ($client!=null) ? $client['email'] : '' ?>" required />

	<label>Mot de passe:</label>
	<input type="password" name="mdp"
			value ="<?= ($client!=null) ? $client['mdp'] : '' ?>" required />

	
	<input type="hidden" name="role" value="client" />		


	<!-- Boutons Annuler & Confirmer -->
	<input type="reset" name="Annuler" value="Annuler">
	<input type="submit" 
		<?= ($client!=null) ? ' name ="Modifier" value="Modifier" ' : ' name="Valider" value="Valider" ' ?> />
			


	<?= ($client!=null) ? '<input type="hidden" name="iduser" value="'.$client['iduser'].'" />' : '' ?>

</form>