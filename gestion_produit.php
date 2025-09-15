<div id="produit">
	<h2 class="page-title"> Produits </h2>

<?php
	if (isset($_SESSION['role'])) {

		$produit = null;

		if (isset($_GET['action']) && isset($_GET['idproduit']))
		{
			$action = $_GET['action'];
			$idproduit = $_GET['idproduit'];
			switch($action)
			{
				case "sup" : $unControleur->deleteproduit ($idproduit) ; break; 
				case "edit" : $produit = $unControleur->selectWhereproduit($idproduit); break;
				case "add" : $unControleur->insertMesProduits($idproduit); break;
			}
		}

		require_once ("vue/form_insert_produit.php");

		if (isset($_POST['Valider']))
		{
			$unControleur->insertProduit($_POST);  // appel de la fonction d'insertion 
			echo "<br> Insertion réussie du produit.";
		}

		else if (isset($_POST['Modifier']))
		{
			$unControleur->updateProduit($_POST); 
			//on recharge la page 
			header("Location: index.php?page=2"); 
		}
	}

	if (isset($_POST['Filtrer']))
	{
		$mot = $_POST['mot'];
		$lesproduits = $unControleur->selectLikeProduit ($mot);
	} else {
		// Récupérer les produits de la base de données
		$lesproduits = $unControleur->selectAllProduit();
	}
	
	//afficher les produits
	require_once ("vue/lister_produit.php"); 
?>
</div>