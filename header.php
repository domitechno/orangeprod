<header>

	<a href="index.php?page=0" id="header-logo"> <img src="images/orange_logo.svg" alt="Logo Orange" /> </a>
	
	<?php
		if (isset($_SESSION['email']))
		{
			echo '
			<ul id="navbar-list">
				<li class="header-btn">
					<a href="index.php?page=0"> Accueil </a>
				</li>

				<li class="header-border">
				</li>';

			if (isset($_SESSION['role']) && $_SESSION['role'] == "client")
			{
				echo
					'<li class="header-btn">
						<a href="index.php?page=1"> Mes Produits </a>
					</li>
				
				<li class="header-border">
				</li>';
			}

			echo'
				<li class="header-btn">
					<a href="index.php?page=2"> Magasin </a>
				</li>
				
				<li class="header-border">
				</li>

				<li class="header-btn">
					<a href="index.php?page=3"> Interventions </a>
				</li>
				
				<li class="header-border">
				</li>';


			if (isset($_SESSION['role']) && $_SESSION['role'] == "technicien")
			{
				echo '
					<li class="header-btn">
						<a href="index.php?page=4"> Clients </a>
					</li>
				
					<li class="header-border">
					</li>

					<li class="header-btn">
						<a href="index.php?page=5"> Techniciens </a>
					</li>
				
					<li class="header-border">
					</li>';
			}

			echo'		
				<li class="header-btn">
					<a href="index.php?page=6"> Se déconnecter </a>
				</li>
			</ul>
			';
		}
	?>
</header>