<?php

		session_start();

		if ( isset($_SESSION['user']) == false ){
			header('Location: ./identification.php');
			exit();
		}

	 	include('./block/head.php');
	 	include('./requete_sql.php');
?>
<!DOCTYPE html>
<html>
<head>
</head>
<body style="background-color: #fff !important;">
	<?php include('./block/navbar.php'); ?>

	<div id="wrapper" class="toggled">

		<?php include('./block/sidebar.php'); ?>

		<div id="page-content-wrapper">
			<h3>Connecté en temps que : <?= $_SESSION['user']['role']; ?></h3>

			<h1 class="danger">catégorie inéxistante</h1>

		</div>
	</div>

		<footer style="position: fixed; left: 270px; bottom: 0px; right: 0; padding: 0px 0 !important; background-color: orange; text-align: center; color: #222;">
			<p style="margin-top: 10px;">
				<a href="./maintenance.php" style="color: #222;">Assitance</a>
				 - 
				<a href="./maintenance.php" style="color: #222;">A propos de nous</a>
				 - 
				<a href="./index.php?page=contact" style="color: #222;">Contacts</a>
				 - 
				<a href="./maintenance.php" style="color: #222;">Service Client</a>
				 - 
				<a href="./maintenance.php" style="color: #222;">Mentions Légales</a>
				-
				<a href="./maintenance.php" style="color: #222;">PatchNote</a>
			</p>
		</footer>
</body>
</html>