<div id="mes-produits">
	<h2 class="page-title"> Mes produits </h2>

<?php
	$mesProduit = null;

	if (isset($_GET['action']) && isset($_GET['idmesproduit']))
	{
		$action = $_GET['action'];
		$idMesProduit = $_GET['idmesproduit'];
		switch($action)
		{
			case "sup" : $unControleur->deleteMesProduit ($idMesProduit) ; break;
		}
	}

	if (isset($_POST['Filtrer']))
	{
		$mot = $_POST['mot'];
		$mesProduit = $unControleur->selectLikeMesProduit ($mot);
	} else {
		// Récupérer les produits de la base de données
		$mesProduit = $unControleur->selectAllMesProduit();
	}
	
	//afficher les produits
	require_once ("vue/lister_mes_produit.php"); 
?>
</div>