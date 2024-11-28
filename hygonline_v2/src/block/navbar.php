<nav class="navbar navbar-material-yellow navbar-fixed-top">
	<div class="container-fluid">
    	<div class="navbar-brand">
	        <img class="navbar-brand-img" src="<?php echo ASSETS_URL; ?>/img/logo.png" style="background-color: white;">

	        <a id="menu-toggle" class="navbar-brand-text" href="#">
		        <span class="hidden-xs" style="font-size: 150%;">
		        	<?php $nom_entreprise = "[[structure_nom]]"; ?>
			         HygOnline - <?php echo $nom_entreprise; ?>
		        </span>
	        </a>
	        
	    </div>
	    <div id="navbar" class="collapse navbar-collapse navbar-responsive-collapse">


		    <ul class="nav navbar-nav navbar-right">

		    	<li>
		    		<a href="index.php?page=contact">Contactez-nous</a>
		    	</li>

		    	<li>
		    		<a href="deconnexion.php" class="danger">Déconnexion</a>
		    	</li>
		    </ul>
		</div>
	</div>
</nav>