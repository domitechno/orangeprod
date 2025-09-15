<div id="technicien">
	<h2 class="page-title"> Technicien </h2>
	
<?php
	if (isset($_SESSION['role'])/* && $_SESSION['role']=="technicien"*/) {

		$technicien = null;

		if (isset($_GET['action']) && isset($_GET['iduser']))
		{
			$action = $_GET['action'];
			$idtechnicien = $_GET['iduser'];
			switch($action)
			{
				case "sup" : $unControleur->deletetUser($idtechnicien) ; break; 
				case "edit" : $technicien = $unControleur->selectWhereUser($idtechnicien); break; 
			}
		}

		require_once ("vue/form_insert_technicien.php");

		if (isset($_POST['Valider']))
		{
			$unControleur->createUser($_POST);  // appel de la fonction d'insertion 
			echo "<br> Insertion réussie du technicien$technicien.";
		}

		else if (isset($_POST['Modifier']))
		{
			$unControleur->updateUser($_POST); 
			//on recharge la page 
			header("Location: index.php?page=5"); 
		}
	}

	if (isset($_POST['Filtrer']))
	{
		$mot = $_POST['mot'];
		$lestechniciens = $unControleur->selectLikeTechnicien ($mot);
	} else {
		// Récupérer les produits de la base de données
		$lestechniciens = $unControleur->selectAllTechnicien();
	}
	
	//afficher les produits
	require_once ("vue/lister_technicien.php"); 
?>

</div>