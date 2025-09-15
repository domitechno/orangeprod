<h2 class="form-head"> Liste de Mes Produits </h2>

<form method="post" class="form-filter">
	Filtrer par :
	<input type="text" name="mot" required />
	<input type="submit" name="Filtrer" value="Filtrer" />
</form>

<table class="table table-striped">
	<tr> 
		<th scope="col"> Id Produit </th>
		<th scope="col"> Nom </th>
		<th scope="col"> Prix </th>
		<th scope="col"> Fabricant </th>
		<th scope="col"> Date de Fabrication </th>
		<th scope="col"> Description </th>

		<?php

			if (isset($_SESSION["role"])/* && $_SESSION["role"]=="technicien"*/) {
				echo "<th scope='col'> Opérations </th>";
			}

		?>
	</tr>

	<?php

		foreach ($mesProduit as $monProduit)
		{
			$leProduit = $unControleur->selectWhereProduit($monProduit['idproduit']);
			echo "<tr>"; 
			echo "<th scope='row'>".$leProduit['idproduit']."</th>";
			echo "<td>".$leProduit['designation']."</td>";
			echo "<td>".$leProduit['prix']."</td>";
			echo "<td>".$leProduit['fabricant']."</td>";
			echo "<td>".$leProduit['datesortie']."</td>";
			echo "<td>".$leProduit['description']."</td>";
			echo "	<td>
						<a href='index.php?page=1&action=sup&idmesproduit=".$monProduit['idmesproduit']."'>
							<img src='images/trash.svg' height='30' width='30' />
						</a>
					</td>"; 
			echo "</tr>";
		}
	?>
</table>