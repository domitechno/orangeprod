<div id="client">
	<h2 class="page-title"> Client </h2>

<?php
	if (isset($_SESSION['role'])/* && $_SESSION['role']=="technicien"*/) {

		$client = null;

		if (isset($_GET['action']) && isset($_GET['iduser']))
		{
			$action = $_GET['action'];
			$idclient = $_GET['iduser'];
			switch($action)
			{
				case "sup" : $unControleur->deleteUser ($idclient) ; break; 
				case "edit" : $client = $unControleur->selectWhereUser($idclient); break; 
			}
		}

		require_once ("vue/form_insert_client.php");

		if (isset($_POST['Valider']))
		{
			$unControleur->createUser($_POST);  // appel de la fonction d'insertion 
			echo "<br> Insertion réussie du client$client.";
		}

		else if (isset($_POST['Modifier']))
		{
			$unControleur->updateUser($_POST); 
			//on recharge la page 
			header("Location: index.php?page=4"); 
		}
	}

	if (isset($_POST['Filtrer']))
	{
		$mot = $_POST['mot'];
		$lesclients = $unControleur->selectLikeClient ($mot);
	} else {
		// Récupérer les clients de la base de données
		$lesclients = $unControleur->selectAllClient();
	}
	
	//afficher les clients
	require_once ("vue/lister_client.php"); 
?>

</div>