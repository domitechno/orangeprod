<?php
	session_start();
	require_once("controleur/controleur.class.php");

	// Instanciation de la classe Controleur
	$unControleur = new Controleur();
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8" />
	<title> Orange </title>

	<!-- Add font awesome to project -->
	<script src="https://kit.fontawesome.com/41bd1494c1.js" crossorigin="anonymous"></script>

	<!-- Useful for responsive & mobile design -->
	<meta name="viewport" content="width=device-width, initial-scale=1" />

	<!-- Force php to reload after the css. Prevents cache issues -->
	<link rel="stylesheet" href="styles/style.css?v=<?php echo time(); ?>" />

	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
</head>
<body>

	<?php
		if ( ! isset($_SESSION['email']))
		{
			if (isset($_GET['page']))
				$page = $_GET['page'];
			else
				$page = 0; 

			switch($page)
			{
				case 0 : require_once("vue/form_connexion.php"); break;
				case 1 : require_once("vue/form_inscription.php"); break;
			}
		}
		
			
		/*
		 * Logique Inscription
		 */
		if (isset($_POST['sInscrire']))
		{
			$unControleur->createUser($_POST);

			$email = $_POST['email'];
			$mdp = $_POST['mdp'];
			$unUser = $unControleur->connect($email, $mdp);
		
			if ($unUser == null)
				echo "<br/> La création du compte à échoué";
			else
			{
				echo "<br/> Bienvenue ".$unUser['nom']." ".$unUser['prenom'];
				/* 
				 * Sauvegarder les données dans la session
				 */	
				$_SESSION['iduser'] = $unUser['iduser'];
				$_SESSION['email'] = $email;
				$_SESSION['nom'] = $unUser['nom'];
				$_SESSION['prenom'] = $unUser['prenom'];
				$_SESSION['role'] = $unUser['role'];

				// Recharger la page
				header("Location: index.php");
			}
		}
		

		/*
		 * Logique CONNEXION
		 */
		if (isset($_POST['seConnecter']))
		{
			$email = $_POST['email'];
			$mdp = $_POST['mdp'];

			$unUser = $unControleur->connect($email, $mdp);

			if ($unUser == null)
				echo "<br/> Veuillez vérifier vos identifiants";
			else
			{
				echo "<br/> Bienvenue ".$unUser['nom']." ".$unUser['prenom'];

				/* 
				 * Sauvegarder les données dans la session
				 */
				$_SESSION['iduser'] = $unUser['iduser'];
				$_SESSION['email'] = $email;
				$_SESSION['nom'] = $unUser['nom'];
				$_SESSION['prenom'] = $unUser['prenom'];
				$_SESSION['role'] = $unUser['role'];

				// Recharger la page
				header("Location: index.php");
			}
		}

		if (isset($_SESSION['email']))
		{
			/*
			 * Ce header devra comporter plusieurs vérifications pour les affichages : connecté/déconnecté & client/technicien
			 *
			 */
			require_once("header.php");

			if (isset($_GET['page']))
				$page = $_GET['page'];
			else
				$page = 0; 

			switch($page)
			{
				case 0 : require_once("home.php"); break;
				case 1 : require_once("gestion_mes_produits.php"); break;
				case 2 : require_once("gestion_produit.php"); break;
				case 3 : require_once("gestion_intervention.php"); break;
				case 4 : require_once("gestion_client.php"); break;
				case 5 : require_once("gestion_technicien.php"); break;
				case 6 :
					// Retirer email de la session
					unset($_SESSION['email']);

					// Détruire la session
					session_destroy();

					// Recharge la page index
					header("Location: index.php");
					break;
			}
			require_once("footer.php");
		}
	?>

	<script src="carrousel.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
</body>
</html>