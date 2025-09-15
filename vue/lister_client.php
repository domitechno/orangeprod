<h2 class="form-head"> Liste des Client </h2>

<form method="post" class="form-filter">
	Filtrer par :
	<input type="text" name="mot" required />
	<input type="submit" name="Filtrer" value="Filtrer" />
</form>

<table class="table table-striped">
	<tr> 
		<th scope="col"> Id Client </th>
		<th scope="col"> Nom </th>
		<th scope="col"> Prénom </th>
		<th scope="col"> Email </th>
		<th scope="col"> Numéro de téléphone </th>

		<?php

			if (isset($_SESSION["role"])/* && $_SESSION["role"]=="technicien"*/) {
				echo "<th scope='col'> Opérations </th>";
			}

		?>
	</tr>

	<?php
		foreach ($lesclients as $client)
		{
			echo "<tr>"; 
			echo "<th scope='row'>".$client['iduser']."</th>";
			echo "<td>".$client['nom']."</td>";
			echo "<td>".$client['prenom']."</td>";
			echo "<td>".$client['email']."</td>";
			echo "<td>".$client['tel']."</td>";
			
			if (isset($_SESSION["role"])) {
				echo "<td>
					<a href='index.php?page=4&action=sup&iduser=".$client['iduser']."'>
						<img src='images/trash.svg' height='30' width='30' />
					</a>
					<a href='index.php?page=4&action=edit&iduser=".$client['iduser']."'>
						<img src='images/update.svg' height='30' width='30' />
					</a>
				</td>"; 

				echo "</tr>";
			}
		}
	?>
</table>