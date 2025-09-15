<h2 class="form-head"> Liste des Produits </h2>

<?php
	if (isset($_GET['page']))
			$page = $_GET['page'];
		else
			$page = 0;

	if ($page != 0)
	{
		echo "<form method='post' class='form-filter'>";
		echo 	"Filtrer par :";
		echo 	"<input type='text' name='mot' required />";
		echo	"<input type='submit' name='Filtrer' value='Filtrer' />";
		echo "</form>";
	}
?>

<table class="table table-striped">
	<thead class="thead-dark">
		<tr> 
			<th scope="col"> Id Produit </th>
			<th scope="col"> Nom </th>
			<th scope="col"> Prix </th>
			<th scope="col"> Fabricant </th>
			<th scope="col"> Date de Fabrication </th>
			<th scope="col"> Description </th>

			<?php
				if (isset($_GET['page']))
					$page = $_GET['page'];
				else
					$page = 0;

				if (!(isset($_SESSION["role"]) && $_SESSION["role"]=="technicien" && $page == 0)) {
					echo "<th scope='col'> Opérations </th>";
				}

			?>
		</tr>
	</thead>
	<tbody>
	<?php
		if (isset($_GET['page']))
			$page = $_GET['page'];
		else
			$page = 0;

		foreach ($lesproduits as $produit)
		{
			echo "<tr>"; 
			echo "<th scope='row'>".$produit['idproduit']."</th>";
			echo "<td>".$produit['designation']."</td>";
			echo "<td>".$produit['prix']."</td>";
			echo "<td>".$produit['fabricant']."</td>";
			echo "<td>".$produit['datesortie']."</td>";
			echo "<td>".$produit['description']."</td>";

			if ($page == 2)
			{
				if (isset($_SESSION["role"]) && $_SESSION["role"]=="technicien")
				{
			echo "<td>
				<a href='index.php?page=2&action=sup&idproduit=".$produit['idproduit']."'>
					<img src='images/trash.svg' height='30' width='30' />
				</a>
				<a href='index.php?page=2&action=edit&idproduit=".$produit['idproduit']."'>
					<img src='images/update.svg' height='30' width='30' />
				</a>
			</td>"; 
				}
				
				if (isset($_SESSION["role"]) && $_SESSION["role"]=="client")
				{
			echo "<td>
					<a href='index.php?page=2&action=add&idproduit=".$produit['idproduit']."'>
						<img src='images/cart.svg' height='30' width='30' />
					</a>
				</td>"; 					
				}

			} 
			else if (isset($_SESSION["role"]) && $_SESSION["role"]=="client")
			{
			echo "<td>
					<a href='index.php?action=add&idproduit=".$produit['idproduit']."'>
						<img src='images/cart.svg' height='30' width='30' />
					</a>
				</td>"; 

			}
			echo "</tr>";
		}
	?>
</tbody>
</table>