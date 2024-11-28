<?php 
include('constantes.php');

	session_start(); 
	include(APPLICATION_PATH . '/block/head.php');
	include(APPLICATION_PATH . '/requete_sql.php'); 

	if (isset($_SESSION['user'])) {
		header('Location: ./index.php');
		exit();
	}



	$email = "";
	$motdepasse = "";
	if (isset($_POST['email'])) {
		$email = strip_tags($_POST['email']);
		$motdepasse = strip_tags($_POST['mdp_user']);

		$data = test($email, $motdepasse);
		foreach($data as $indice => $user){
			unset($user['motdepasse']);
			$_SESSION['user'] = $user;
			header('Location: ./index.php');
			exit();
		}
	}	
?>

<!DOCTYPE html>
<html>
<head>
<link rel="icon" type="image/x-icon" href="/favicon.ico">
</head>
<body style="background-color: yellow;">
	<div style="background-color: white; text-align: center;">
		<img src="<?php echo ASSETS_URL; ?>/img/logo.png">

		<form action="identification.php" method="post" style="margin-bottom: 5px;">
			<span>Adresse Mail </span>
			<input type="text" name="email" placeholder="...">
			<br></br>
			<span>Mot de passe</span>
			<!-- typer=text --><input type="password" name="mdp_user" placeholder="..." encrypted>
			<br></br>
			<input style="margin-bottom: 10px;" type="submit" value="Connexion">
		</form>
	</div>
</body>
<footer style="position: absolute; left: 0px; bottom: 0px; right: 0; padding: 0px 0 !important; background-color: orange; text-align: center; color: #222;">
	<p style="margin-top: 10px;">
		<a href="./maintenance.php" style="color: #222;">Mentions Légales</a>
		-
		<a href="./maintenance.php" style="color: #222;">PatchNote</a>
	</p>
</footer>
</html>