<?php
	/*
		classe qui gère la connexion au SGBD Mysql et l'ensemble 
		des requêtes injection et extraction des données
	*/
	class Modele {
		private $unPDO; //objet de la classe PDO : PHP DATA OBJECT

		public function __construct () {
			try {
				// Nom du chemin, UserName, Password
				$this->unPDO = new PDO("mysql:host=localhost;dbname=orange", "root", "");
			}
			catch(PDOException $exp) {
				echo "Erreur connexion : ".$exp->getMessage();
			}
		}


		/********************************************************************/
		/********************* Gestion des Utilisateurs *********************/
		/********************************************************************/



		public function connect($email, $mdp)
		{
			// Ecriture de la requete
			$requete = "SELECT * FROM user WHERE email = :email and mdp = :mdp;";

			$donnees = array(":email"=>$email,
								":mdp"=>$mdp
							);

			// Préparation de la requête 
			$connect = $this->unPDO->prepare ($requete);

			$connect->execute ($donnees);

			return $connect->fetch();
		}



		public function createUser($tab)
		{
			$requete = "insert into user values (
							null,
							:nom,
							:prenom,
							:email,
							:tel,
							:mdp,
							:role
						);";
		
			$donnees = array(":nom"=>$tab['nom'],
								":prenom"=>$tab['prenom'],
								":email"=>$tab['email'],
								":tel"=>$tab['tel'],
								":mdp"=>$tab['mdp'],
								":role"=>$tab['role']
							);

			$logon = $this->unPDO->prepare ($requete);

			$logon->execute ($donnees);
		}

		public function selectAllClient()
		{
			$requete = "SELECT * FROM user WHERE role = 'client';";

			$select = $this->unPDO->prepare($requete);
			$select->execute();
			
			return $select->fetchAll();
		}

		public function selectAllTechnicien()
		{
			$requete = "SELECT * FROM user WHERE role = 'technicien';";

			$select = $this->unPDO->prepare($requete);
			$select->execute();
			
			return $select->fetchAll();
		}

		public function deleteUser ($idUser)
		{
			$requete = "DELETE from user WHERE iduser=:iduser;";

			$donnees = array(":iduser"=>$idUser);

			$delete = $this->unPDO->prepare($requete);
			$delete->execute($donnees);
		}

		public function updateUser ($tab){
			$requete = "UPDATE user SET nom = :nom,
										prenom = :prenom,
										email = :email,
										tel = :tel,
										mdp = :mdp
								WHERE iduser = :iduser;";

			$donnees = array(":nom"=>$tab['nom'],
								":prenom"=>$tab['prenom'],
								":email"=>$tab['email'],
								":tel"=>$tab['tel'],
								":mdp"=>$tab['mdp'],
								":iduser"=>$tab['iduser']
							);

			$update = $this->unPDO->prepare($requete);
			$update->execute($donnees);
		}

		public function selectWhereUser ($idUser) {
			$requete = "SELECT * FROM user WHERE iduser = :iduser;";

			$donnees = array(":iduser"=>$idUser);
			$select = $this->unPDO->prepare($requete);
			$select->execute($donnees);

			return $select->fetch();
		}

		public function selectLikeClient ($mot){
			$requete = "SELECT * FROM user WHERE (nom LIKE :mot
													or prenom LIKE :mot
													or email LIKE :mot
													or tel LIKE :mot)
												AND role = 'client';";

			$donnees = array(":mot"=>"%".$mot."%");
			$select = $this->unPDO->prepare($requete);
			$select-> execute($donnees);

			return $select->fetchAll();
		}

		public function selectLikeTechnicien ($mot){
			$requete = "SELECT * FROM user WHERE (nom LIKE :mot
													or prenom LIKE :mot
													or email LIKE :mot
													or tel LIKE :mot)
												AND role = 'technicien';";

			$donnees = array(":mot"=>"%".$mot."%");
			$select = $this->unPDO->prepare($requete);
			$select-> execute($donnees);

			return $select->fetchAll();
		}



		/******************************************************************/
		/********************* Gestion des promotions *********************/
		/******************************************************************/
		public function insertProduit ($tab) {
			// Ecriture de la requête SQL
			$requete = "insert into produit value(null, :designation, :prix, :fabricant, :datesortie, :description);";

			// Creation d'un tableau de données de correspondance entre les paramètres PDO et les données reçues en entrée
			$donnees = array(":designation"=>$tab['designation'],
								":prix"=>$tab['prix'],
								":fabricant"=>$tab['fabricant'],
								":datesortie"=>$tab['datesortie'],
								":description"=>$tab['description']
							);

			// Préparation de la requête
			$insert = $this->unPDO->prepare ($requete);

			// Execution de la requête
			$insert->execute ($donnees);
		}

		public function selectAllProduit (){
			$requete = "SELECT * FROM produit;";
			$select = $this->unPDO->prepare($requete);
			$select->execute();

			return $select->fetchAll();
		}

		public function deleteProduit ($idProduit){
			$requete = "DELETE from produit WHERE idproduit=:idproduit;";

			$donnees = array(":idproduit"=>$idProduit);
			$delete = $this->unPDO->prepare($requete);
			$delete->execute($donnees);
		}

		public function updateProduit ($tab){
			$requete = "UPDATE produit SET designation = :designation,
												prix = :prix,
												fabricant = :fabricant,
												datesortie = :datesortie,
												description = :description
										WHERE idproduit = :idproduit;";

			$donnees = array(":designation"=>$tab['designation'],
								":prix"=>$tab['prix'],
								":fabricant"=>$tab['fabricant'],
								":datesortie"=>$tab['datesortie'],
								":description"=>$tab['description'],
								":idproduit"=>$tab['idproduit']
							);
			$update = $this->unPDO->prepare($requete);
			$update->execute($donnees);
		}

		public function selectWhereProduit ($idProduit) {
			$requete = "SELECT * FROM produit WHERE idproduit = :idproduit;";

			$donnees = array(":idproduit"=>$idProduit);
			$select = $this->unPDO->prepare($requete);
			$select->execute($donnees);

			return $select->fetch();
		}

		public function selectLikeProduit ($mot){
			$requete = "SELECT * FROM produit where designation LIKE :mot
													or prix LIKE :mot
													or fabricant LIKE :mot
													or datesortie LIKE :mot
													or description LIKE :mot;";

			$donnees = array(":mot"=>"%".$mot."%");
			$select = $this->unPDO->prepare($requete);
			$select-> execute($donnees);

			return $select->fetchAll();
		}


	    /**************************************************************/
		/**************** Fonctions MES PRODUIT ***********************/
		/**************************************************************/


		public function insertMesProduits($idproduit)
		{
			$requete = "INSERT INTO mesproduit VALUES(null, :idproduit, :iduser);";

			$iduser = $_SESSION['iduser'];
			$donnees = array(":idproduit"=>$idproduit, ":iduser"=>$iduser);

			$insert = $this->unPDO->prepare($requete);
			$insert->execute($donnees);
		}

		
		public function selectAllMesProduit()
		{
			$requete = "SELECT * FROM mesproduit WHERE iduser = :idclient;";

			$idclient = $_SESSION['iduser'];
			$donnees = array(":idclient"=>$idclient);

			$select = $this->unPDO->prepare($requete);
			$select->execute($donnees);

			return $select->fetchAll();
		}

		public function selectLikeMesProduit($mot)
		{
			$requete = "SELECT * FROM produit, mesproduit WHERE 
													(designation LIKE :mot
													or prix LIKE :mot
													or fabricant LIKE :mot
													or datesortie LIKE :mot
													or description LIKE :mot)
												AND produit.idproduit = mesproduit.idproduit;";

			$donnees = array(":mot"=>"%".$mot."%");
			$select = $this->unPDO->prepare($requete);
			$select-> execute($donnees);

			return $select->fetchAll();
		}

		public function deleteMesProduit ($idMesProduit){
			$requete = "DELETE from mesproduit WHERE idmesproduit=:idmesproduit;";

			$donnees = array(":idmesproduit"=>$idMesProduit);
			$delete = $this->unPDO->prepare($requete);
			$delete->execute($donnees);
		}



		/****************************************************************/
		/**************** Fonctions INTERVENTIONS ***********************/
		/****************************************************************/


		public function insertIntervention($tab)
		{
			$requete = "INSERT INTO intervention VALUES(null, :idtechnicien, :idclient, :idproduit, :datedemande, :dateintervention, :description);";

			$date = date('Y/m/d', time());

			$donnees = array(":idtechnicien"=>$tab['idtechnicien'],
							":idclient"=>$tab['idclient'],
							":idproduit"=>$tab['idproduit'],
							":datedemande"=>$date,
							":dateintervention"=>"0000-00-00",
							":description"=>$tab['description']
							);

			$insert = $this->unPDO->prepare($requete);
			$insert->execute($donnees);
		}

		public function selectAllInterventions()
		{
			$requete = "SELECT * FROM intervention;";

			$select = $this->unPDO->prepare($requete);
			$select->execute();

			return $select->fetchAll();
		}

		public function selectAllMesInterventions()
		{
			$requete = "SELECT * FROM intervention WHERE idclient = :idclient;";

			$idclient = $_SESSION['iduser'];
			$donnees = array(":idclient"=>$idclient);

			$select = $this->unPDO->prepare($requete);
			$select->execute($donnees);

			return $select->fetchAll();
		}


		// FINIIIR
		public function selectLikeMesIntervention($mot)
		{
			/*$requete = "SELECT * FROM intervention i, produit p, user u
											WHERE (i.description LIKE :mot
													or p.designation LIKE :mot
													or u.prenom LIKE :mot
													or u.nom LIKE :mot)
												AND i.idproduit = p.idproduit
												AND i.idtechnicien = u.iduser
												AND i.idclient = u.iduser;";*/

			$requete = "SELECT * FROM intervention WHERE
														description like :mot,
													AND idclient = :idclient;";

			$idclient = $_SESSION['iduser'];
			$donnees = array(":mot"=>"%".$mot."%", ":idclient"=>$idclient);
			$select = $this->unPDO->prepare($requete);
			$select-> execute($donnees);

			return $select->fetchAll();
		}

		public function deleteIntervention ($idIntervention)
		{
			$requete = "DELETE from intervention WHERE idintervention=:idintervention;";

			$donnees = array(":idintervention"=>$idIntervention);
			$delete = $this->unPDO->prepare($requete);
			$delete->execute($donnees);
		}

		public function selectWhereIntervention ($idIntervention) {
			$requete = "SELECT * FROM intervention WHERE idintervention = :idintervention;";

			$donnees = array(":idintervention"=>$idIntervention);
			$select = $this->unPDO->prepare($requete);
			$select->execute($donnees);

			return $select->fetch();
		}

		public function updateIntervention ($tab)
		{
			$requete = "UPDATE intervention SET idtechnicien = :idtechnicien,
												idclient = :idclient,
												idproduit = :idproduit,
												datedemande = :datedemande,
												dateintervention = :dateintervention,
												description = :description,
										WHERE idproduit = :idproduit;";

			$donnees = array(":idtechnicien"=>$tab['idtechnicien'],
								":idclient"=>$tab['idclient'],
								":idproduit"=>$tab['idproduit'],
								":datedemande"=>$tab['datedemande'],
								":dateintervention"=>$tab['dateintervention'],
								":description"=>$tab['description'],
								":idproduit"=>$tab['idproduit']
							);
			$update = $this->unPDO->prepare($requete);
			$update->execute($donnees);
		}

	} 

?>