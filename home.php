<div id="home">

	<div id="home-head">
		<div id="carrousel-container">
			<!-- 
			If you want to add an image:
			- add it to the src folder
			- refer to it in this file as a carrousel selector
			- add background img in css (search for .img-selector:nth-child())
			- add ref in "slide" array in js file
			-->
			<div id="carrousel">
				<!-- Conteneur de l'image -->
				<div id="slider"></div>
				<!-- Flèches précédent & suivant -->
				<div id="precedent" onclick="ep_changeSlide(-1)">&#10094;</div>
				<div id="suivant" onclick="ep_changeSlide(1)">&#10095;</div>
			</div>

			<!-- Icones défilantes -->
			<div id="carrousel-selector">
				<div id="carrousel-selector__container">
					<div class="img-selector img-focus" onclick="ep_moveSlide(0)">
						<div class="darkFilterImg" style="opacity: 0;"></div>
					</div>
					<div class="img-selector" onclick="ep_moveSlide(1)"><div class="darkFilterImg"></div></div>
					<div class="img-selector" onclick="ep_moveSlide(2)"><div class="darkFilterImg"></div></div>
					<div class="img-selector" onclick="ep_moveSlide(3)"><div class="darkFilterImg"></div></div>
				</div>
			</div>

			<!-- Image Modal -->

			<div id="myModal">
				<div id="modal-container" onClick="ep_closeModal()">
					<span id="close" onClick="ep_closeModal()">&times;</span>
					<img src="" class="modal-content" id="img01" />
				</div>
			</div>

		</div>

		<div id="more-info">

			<h1> Bienvenue <?=$_SESSION['nom'] . " " . $_SESSION['prenom'] ?>! </h1>
		</div>
	</div>

	<div id="home-shop">
		<?php
			$lesproduits = $unControleur->selectAllProduit(); 
			require_once("vue/lister_produit.php");
		?>
	</div>

	<?php
	// Insérer un Produit dans mesProduits depuis la page d'accueil
		if (isset($_GET['action']) && isset($_GET['idproduit']))
		{
			$action = $_GET['action'];
			$idproduit = $_GET['idproduit'];
			switch($action)
			{
				case "add" : $unControleur->insertMesProduits($idproduit); break;
			}
		}
	?>
</div>