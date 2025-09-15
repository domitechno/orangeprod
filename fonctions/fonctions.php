<?php
	function connexion ()
	{
		$con = mysqli_connect("localhost", "root", "", "orange");
		if($con == null)
		{
			echo "Erreur de connexion à la BDD.";
		}
		return $con; 
	}

	function deconnexion ($con)
	{
		mysqli_close($con);
	}







    /*******************************************************/
	/**************** Fonctions USER ***********************/
	/*******************************************************/

    function selectWhereUser($email, $mdp)
	{
		// Ecriture de la requete 
		$requete = "select * from user where email ='".$email."' and mdp ='".$mdp."';";

		// Connexion 
		$con = connexion ();

		$leResultat = mysqli_query($con, $requete);
		$unUser = mysqli_fetch_assoc($leResultat); //tableau associatif

		// Déconnexion 
		deconnexion($con);

		return $unUser; 
	}



	function createUser($tab)
	{
		$requete = "insert into user values (
						null,
						'".$tab['nom']."',
						'".$tab['prenom']."',
						'".$tab['email']."',
						'".$tab['tel']."',
						'".$tab['mdp']."',
						'client'
					);";
	
		$con = connexion();

		mysqli_query($con, $requete); 
		deconnexion($con); 
	}



    /**********************************************************/
	/**************** Fonctions PRODUIT ***********************/
	/**********************************************************/

	function insertProduit($tab)
	{
		$requete = "insert into produit values (
						null,
						'".$tab['designation']."',
						'".$tab['prix']."',
						'".$tab['fabricant']."', 
						'".$tab['datesortie']."', 
						'".$tab['description']."'
					);";
		echo "En train d'inserer <br />";
		$con = connexion();
		mysqli_query($con, $requete);
		deconnexion($con);
	}

	function selectWhereProduit($idproduit)
	{
		$requete = "select * from produit where idproduit = ".$idproduit.";";

		$con = connexion();
		$leResultat = mysqli_query($con, $requete);
		$produit = mysqli_fetch_assoc($leResultat);

		deconnexion($con);

		return ($produit);
	}

	function selectAllProduit()
	{
		$requete = "select * from produit;";

		$con = connexion();
		$lesProduits = mysqli_query($con, $requete);
		deconnexion($con);

		return ($lesProduits);
	}

	function deleteProduit($idproduit)
	{
		$requete = "delete from produit where idproduit = ".$idproduit.";";

		$con = connexion();
		mysqli_query($con, $requete);
		deconnexion($con);
	}

	function updateProduit($produit)
	{
		$requete = "update produit set
						designation = '".$produit['designation']."',
						prix = '".$produit['prix']."',
						fabricant = '".$produit['fabricant']."',
						datesortie = '".$produit['datesortie']."',
						description = '".$produit['description']."'
						where idproduit = '".$produit['idproduit']."';";

		$con = connexion();
		mysqli_query($con, $requete);
		deconnexion($con);
	}

	function selectSearchProduit($mot)
	{
		$requete = "select * from produit where
						designation like '%".$mot."%' or
						prix like '%".$mot."%' or
						fabricant like '%".$mot."%' or
						datesortie like '%".$mot."%' or
						description like '%".$mot."%';
						";
		$con = connexion();
		$lesProduits = mysqli_query($con, $requete);
		deconnexion($con);
		return ($lesProduits);
	}




    /**************************************************************/
	/**************** Fonctions MES PRODUIT ***********************/
	/**************************************************************/


	function insertMesProduits($idproduit)
	{
		$iduser = $_SESSION['iduser'];
		$requete = "insert into mesproduit values(null, '".$idproduit."', '".$iduser."');";

		$con = connexion();
		mysqli_query($con, $requete);
		deconnexion($con);
	}

?>