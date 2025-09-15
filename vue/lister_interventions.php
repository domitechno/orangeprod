<h2 class="form-head"> Liste des Interventions </h2>

<form method="post" class="form-filter">
	Filtrer par :
	<input type="text" name="mot" required />
	<input type="submit" name="Filtrer" value="Filtrer" />
</form>

<table class="table table-striped">
	<tr> 
		<th scope="col"> Id Interventions </th>
		<th scope="col"> Client </th>
		<th scope="col"> Produit </th>
		<th scope="col"> Technicien attribué </th>
		<th scope="col"> Date de la Demande </th>
		<th scope="col"> Date de l'intervention </th>
		<th scope="col"> Description du problème </th>

		<?php

			if (isset($_SESSION["role"])/* && $_SESSION["role"]=="technicien"*/) {
				echo "<th scope='col'> Opérations </th>";
			}

		?>
	</tr>

	<?php
		foreach ($lesinterventions as $intervention)
		{
			$produit = $unControleur->selectWhereProduit($intervention['idproduit']);
			$client = $unControleur->selectWhereUser($intervention['idclient']);
			$technicien = $unControleur->selectWhereUser($intervention['idtechnicien']);
			echo "<tr>"; 
			echo "<th scope='row'>".$intervention['idintervention']."</th>";
			echo "<td>".$client['prenom']."</td>";
			echo "<td>".$produit['designation']."</td>";
			echo "<td>".$technicien['prenom']."</td>";
			echo "<td>".$intervention['datedemande']."</td>";
			echo "<td>".$intervention['dateintervention']."</td>";
			echo "<td>".$intervention['description']."</td>";
			
			if (isset($_SESSION["role"])/* && $_SESSION["role"]=="admin"*/) {
				echo "<td>
					<a href='index.php?page=3&action=sup&idintervention=".$intervention['idintervention']."'>
						<img src='images/trash.svg' height='30' width='30' />
					</a>
					<a href='index.php?page=3&action=edit&idintervention=".$intervention['idintervention']."'>
						<img src='images/update.svg' height='30' width='30' />
					</a>
				</td>"; 

				echo "</tr>";
			}
		}
	?>
</table>