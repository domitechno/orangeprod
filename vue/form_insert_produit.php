<h2 class="form-head"> Ajout d'un Produit </h2>
<form method="post" action="" class="insert-form">

	<label>Nom Produit :</label>
	<input type="text" name="designation"
			value ="<?= ($produit!=null) ? $produit['designation'] : '' ?>" required />

	<label>Prix :</label>
	<input type="text" name="prix"
			value ="<?= ($produit!=null) ? $produit['prix'] : '' ?>" required />

	<label>Fabricant :</label>
	<input type="text" name="fabricant"
			value ="<?= ($produit!=null) ? $produit['fabricant'] : '' ?>" required />

	<label>Date de fabrication :</label>
	<input type="date" name="datesortie"
			value ="<?= ($produit!=null) ? $produit['datesortie'] : '' ?>" required />

	<label>Description :</label>
	<input type="textarea" name="description"
			value ="<?= ($produit!=null) ? $produit['description'] : '' ?>" required />
			


	<!-- Boutons Annuler & Confirmer -->
	<input type="reset" name="Annuler" value="Annuler">
	<input type="submit" 
		<?= ($produit!=null) ? ' name ="Modifier" value="Modifier" ' : ' name="Valider" value="Valider" ' ?> />
			


	<?= ($produit!=null) ? '<input type="hidden" name="idproduit" value="'.$produit['idproduit'].'" />' : '' ?>

</form>