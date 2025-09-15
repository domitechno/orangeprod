<h2 class="form-head"> Liste des Technicien </h2>

<form method="post" class="form-filter">
	Filtrer par :
	<input type="text" name="mot" required />
	<input type="submit" name="Filtrer" value="Filtrer" />
</form>

<table class="table table-striped">
	<tr> 
		<th scope="col"> Id Technicien </th>
		<th scope="col"> Nom </th>
		<th scope="col"> Prénom </th>
		<th scope="col"> Numéro de téléphone </th>
		<th scope="col"> Adresse </th>

		<?php

			if (isset($_SESSION["role"])/* && $_SESSION["role"]=="technicien"*/) {
				echo "<th scope='col'> Opérations </th>";
			}

		?>
	</tr>

	<?php
		foreach ($lestechniciens as $technicien)
		{
			echo "<tr>"; 
			echo "<th scope='row'>".$technicien['iduser']."</th>";
			echo "<td>".$technicien['nom']."</td>";
			echo "<td>".$technicien['prenom']."</td>";
			echo "<td>".$technicien['email']."</td>";
			echo "<td>".$technicien['tel']."</td>";
			
			if (isset($_SESSION["role"])/* && $_SESSION["role"]=="admin"*/) {
				echo "<td>
					<a href='index.php?page=5&action=sup&iduser=".$technicien['iduser']."'>
						<img src='images/trash.svg' height='30' width='30' />
					</a>
					<a href='index.php?page=5&action=edit&iduser=".$technicien['iduser']."'>
						<img src='images/update.svg' height='30' width='30' />
					</a>
				</td>"; 

				echo "</tr>";
			}
		}
	?>
</table>