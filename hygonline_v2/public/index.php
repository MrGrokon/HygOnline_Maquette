<?php
include('constantes.php');

session_start();

$assets;

if ( isset($_SESSION['user']) == false ){
	header('Location: ./identification.php');
	exit();
}

	include(APPLICATION_PATH . '/requete_sql.php');
?>
<!DOCTYPE html>
<html>
<head>
<?php include(APPLICATION_PATH . '/block/head.php'); ?>
</head>
<body style="background-color: #fff !important;">
	<?php include(APPLICATION_PATH . '/block/navbar.php');?>

	<div id="wrapper" class="toggled">

		<?php include(APPLICATION_PATH .'/block/sidebar.php'); ?>

		<div id="page-content-wrapper">
			<div class="container-fluid xyz">
				<h3>Connecté en tant que : <?php echo $_SESSION['user']['nom'] . " - " . $_SESSION['user']['role']; ?></h3>

			<?php
				$page = '';
				if(isset($_GET['page'])) {
					$page = $_GET['page'];
				}
				if (isset($_GET['categ'])) {
					$categ = $_GET['categ'];
				}
				switch($page){
					case 'fichier':
						switch ($categ) {
							case 'facture':
								include(APPLICATION_PATH . '/doc_type/facture.php');
								break;
							
							case 'devis':
								include(APPLICATION_PATH . '/doc_type/devis.php');
								break;

							case 'contrat':
								include(APPLICATION_PATH . '/doc_type/contrat.php');
								break;

							case 'plan':
								include(APPLICATION_PATH . '/doc_type/plan.php');
								break;

							case 'interv':
								include(APPLICATION_PATH . '/doc_type/suivis_intervention.php');
								break;

							case 'fiche':
								include(APPLICATION_PATH . '/doc_type/fiche.php');
								break;
						}
					break;

					case 'perso':
						include(APPLICATION_PATH . '/doc_type/perso.php');
						break;

					case 'maintenance':
						include(APPLICATION_PATH . '/maintenance.php');
						break;

					case 'contact':
						include(APPLICATION_PATH . '/contact.php');
						break;

					case 'info':
						include(APPLICATION_PATH . '/full-news.php');
						break;

					case 'interventions':
						include(APPLICATION_PATH . '/intervention_history.php');
						break;

					case 'recherche':
						include(APPLICATION_PATH . '/recherche.php');
						break;

					case 'impayer':
						include(APPLICATION_PATH . '/impayer.php');
						break;

					case 'fiche':
						include(APPLICATION_PATH . '/doc_type/fiche_interv.php');
						break;

					case 'detail':
						include(APPLICATION_PATH . '/doc_type/contrat_detail.php');
						break;

					default:
						echo '<form method="post" action="./index.php?page=recherche" style="margin: 0;">
							<input type="text" name="search" placeholder="Rechercher">
							<input type="submit" value="Recherche" class="btn btn-xs btn-primary">
						</form>';

						include(APPLICATION_PATH . '/dashboard.php');
					break;


				}
			?>
				</div>
			</div>
		<div class="clearfix">&nbsp;</div>
	</div>

		<footer style="position: fixed; left: 270px; bottom: 0px; right: 0; padding: 0px 0 !important; background-color: orange; text-align: center; color: #222;">
			<p style="margin-top: 10px;">
				<a href="./index.php?page=contact" style="color: #222;">Contactez-nous</a>
				 - 
				<a href="./index.php?page=maintenance" style="color: #222;">Mentions Légales</a>
				-
				<a href="./index.php?page=maintenance" style="color: #222;">PatchNote</a>
			</p>
		</footer>
</body>
</html>