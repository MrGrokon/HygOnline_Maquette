<div id="sidebar-wrapper">
	<ul style="font-size: 105%;" class="nav sidebar-nav">
		<li>
			<span class='glyphicon glyphicon-home'></span>
			<span><a href='index.php' class='title'>Accueil</a></span>
		</li>

		
		<?php if ($_SESSION['user']['role']== "admin" || $_SESSION['user']['role'] == "comptable"): ?>
			<li> 
				<span class="glyphicon glyphicon-list-alt"></span>
				<span class="title">Administratif</span>
			</li>
			<ul>
				<li><a href='index.php?page=fichier&categ=facture'>Factures</a></li>
				<li><a href='index.php?page=fichier&categ=devis'>Devis</a></li>
				<li><a href='index.php?page=fichier&categ=contrat'>Contrats</a></li>
			</ul>
		<?php endif; ?>


		<?php if ($_SESSION['user']['role'] == "admin" || $_SESSION['user']['role'] == "technicien"): ?>
			<li>
				 <span class='glyphicon glyphicon-wrench'></span>
				 <span class='title'>Technique</span>
			 </li>
			<ul>
				<li><a href='index.php?page=fichier&categ=plan'>Plans et Pièges</a></li>
				<li><a href='index.php?page=fichier&categ=interv'>Suivis d'interventions</a></li>
				<li><a href='index.php?page=fichier&categ=fiche'>Fiches de sécurité</a></li>
			</ul>
		<?php endif; ?>
		
		<li>
			<span class='glyphicon glyphicon-user'></span>
			<span class='title'>Documents Personnalisés</span>
		</li>
		<ul>
			<?php $perso = get_Categories_Perso() ?>
			<?php foreach ($perso as $indice => $categorie) :?>
				
				<li><a href="index.php?page=perso&id=<?php echo $categorie['id_categ']; ?>"> <?php echo $categorie['libelle']; ?> </a></li>

			<?php endforeach; ?>
		</ul>
		
	</ul>
</div>

