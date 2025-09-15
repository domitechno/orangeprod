<div id="intervention">
	<h2 class="page-title"> Interventions </h2>

<?php
	if (isset($_SESSION['role'])) {

		$interventions = null;

		if (isset($_GET['action']) && isset($_GET['idintervention']))
		{
			$action = $_GET['action'];
			$idintervention = $_GET['idintervention'];
			switch($action)
			{
				case "sup" : $unControleur->deleteIntervention($idintervention) ; break; 
				case "edit" : $interventions = $unControleur->selectWhereintervention($idintervention); break; 
			}
		}

		$mesProduits = $unControleur->selectAllMesProduit();
		$idUser = $_SESSION['iduser'];
		$Client = $unControleur->selectWhereUser($idUser);
		$lesTechniciens = $unControleur->selectAllTechnicien();
		require_once ("vue/form_insert_interventions.php");

		if (isset($_POST['Valider']))
		{
			$unControleur->insertIntervention($_POST);  // appel de la fonction d'insertion 
			echo "<br> Insertion réussie du interventions";
		}

		else if (isset($_POST['Modifier']))
		{
			$unControleur->updateIntervention($_POST); 
			//on recharge la page 
			header("Location: index.php?page=3"); 
		}
	}

	if (isset($_POST['Filtrer']))
	{
		$mot = $_POST['mot'];
		$lesinterventions = $unControleur->selectLikeMesIntervention ($mot);
	} else {
		// Récupérer les interventions de la base de données
		$lesinterventions = $unControleur->selectAllInterventions();
	}
	
	//afficher les interventions
	require_once ("vue/lister_interventions.php"); 
?>
</div>