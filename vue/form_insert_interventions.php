<h2 class="form-head"> Ajout d'un Client </h2>
<form method="post" action="" class="insert-form">

	<label> Produit :</label>
	<select name="idproduit" required>
		<option value="" selected disabled hidden>Choisir</option>
		<?php
		foreach ($mesProduits as $monProduit)
		{
			$produit = $unControleur->selectWhereProduit($monProduit['idproduit']);
			echo "<option value='".$produit['idproduit']."'>";
			echo $produit['designation'];
			echo "</option>";
		}
		?>
	</select>


	<label> Votre Technicien :</label>
	<select name="idtechnicien" required>
		<option value="" selected disabled hidden>Choisir</option>
		<?php
		foreach ($lesTechniciens as $technicien)
		{
			echo "<option value='".$technicien['iduser']."'>";
			echo $technicien['prenom'] . ' ' . $technicien['nom'];
			echo "</option>";
		}
		?>
	</select>

	<label>Date l'intervention :</label>
	<input type="date" name="dateintervention"
			value ="<?= ($interventions!=null) ? $interventions['description'] : '' ?>" />


	<label>Description du problème :</label>
	<input type="text" name="description"
			value ="<?= ($interventions!=null) ? $interventions['description'] : '' ?>" required />

	
	<input type="hidden" name="idclient" value="<?= $Client['iduser'] ?>" />


	<!-- Boutons Annuler & Confirmer -->
	<input type="reset" name="Annuler" value="Annuler">
	<input type="submit" 
		<?= ($interventions!=null) ? ' name ="Modifier" value="Modifier" ' : ' name="Valider" value="Valider" ' ?> />
			


	<?= ($interventions!=null) ? '<input type="hidden" name="idintervention" value="'.$interventions['idintervention'].'" />' : '' ?>

</form>