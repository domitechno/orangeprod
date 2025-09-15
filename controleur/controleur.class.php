<?php
	require_once("modele/modele.class.php");

	class Controleur {
		private $unModele;

		public function __construct()
		{
			// Instanciation de la classe Modele
			$this->unModele = new Modele();
		}




		/********************************************************************/
		/********************* Gestion des Utilisateurs *********************/
		/********************************************************************/

		public function connect($email, $mdp)
		{
			// Contrôler les données avant l'insertion dans la table promotion

			// On apelle la méthode du Modèle
			return $this->unModele->connect($email, $mdp);
		}

		public function createUser($tab)
		{
			// Contrôler les données avant l'insertion dans la table promotion

			// On apelle la méthode du Modèle
			return $this->unModele->createUser($tab);
		}

		public function selectAllClient()
		{
			return $this->unModele->selectAllClient();
		}

		public function selectAllTechnicien()
		{
			return $this->unModele->selectAllTechnicien();
		}

		public function deleteUser($idUser)
		{
			$this->unModele->deleteUser($idUser);
		}

		public function updateUser ($tab)
		{
			$this->unModele->updateUser($tab);
		}

		public function selectWhereUser($idUser)
		{
			return $this->unModele->selectWhereUser($idUser);
		}

		public function selectLikeClient($mot)
		{
			return $this->unModele->selectLikeClient($mot);
		}

		public function selectLikeTechnicien($mot)
		{
			return $this->unModele->selectLikeClient($mot);
		}


		/************************************************************************/
		/************************* Gestion des produits *************************/
		/************************************************************************/
		public function insertProduit ($tab)
		{
			// Contrôler les données avant l'insertion dans la table promotion

			// On apelle la méthode du Modèle
			$this->unModele->insertProduit($tab);
		}

		public function selectAllProduit ()
		{
			$lesProduits = $this->unModele->selectAllProduit();

			// On réalise les contrôles

			return $lesProduits;
		}

		public function selectLikeProduit ($mot)
		{
			$lesProduits = $this->unModele->selectLikeProduit($mot);

			// On réalise les contrôles

			return $lesProduits;
		}

		public function deleteProduit ($idProduit)
		{
			$this->unModele->deleteProduit($idProduit);
		}

		public function updateProduit ($tab)
		{
			return $this->unModele->updateProduit($tab);
		}

		public function selectWhereProduit ($idProduit)
		{
			return $this->unModele->selectWhereProduit($idProduit);
		}



	    /**************************************************************/
		/**************** Fonctions MES PRODUIT ***********************/
		/**************************************************************/


		public function insertMesProduits($idproduit)
		{
			$this->unModele->insertMesProduits($idproduit);
		}

		public function selectAllMesProduit()
		{
			return $this->unModele->selectAllMesProduit();
		}

		public function selectLikeMesProduit ($mot)
		{
			$mesProduits = $this->unModele->selectLikeMesProduit($mot);

			return $mesProduits;
		}

		public function deleteMesProduit ($idMesProduit)
		{
			$this->unModele->deleteMesProduit($idMesProduit);
		}



	    /****************************************************************/
		/**************** Fonctions INTERVENTIONS ***********************/
		/****************************************************************/


		public function insertIntervention($tab)
		{
			$this->unModele->insertIntervention($tab);
		}

		public function selectAllInterventions()
		{
			return $this->unModele->selectAllInterventions();
		}

		public function selectAllMesInterventions()
		{
			return $this->unModele->selectAllMesInterventions();
		}

		public function selectLikeMesIntervention($mot)
		{
			return $this->unModele->selectLikeMesIntervention($mot);
		}

		public function deleteIntervention ($idIntervention)
		{
			$this->unModele->deleteIntervention($idIntervention);
		}

		public function selectWhereIntervention ($idIntervention)
		{
			return $this->unModele->selectWhereIntervention($idIntervention);
		}

		public function updateIntervention ($tab)
		{
			$this->unModele->selectWhereIntervention($tab);
		}

	}
?>