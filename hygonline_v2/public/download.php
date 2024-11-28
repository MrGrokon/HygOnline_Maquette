<?php
session_start();
include('constantes.php');

include(APPLICATION_PATH . '/requete_sql.php');

if(isset($_GET['file']) && isset($_GET['type'])){
	$id_fichier = $_GET['file'];
	$file_type = $_GET['type'];
	
	if ($file_type == "perso") {
		$client_id = NULL;
	}
	else{
		$client_id = $_SESSION['user']['id_client'];
	}

	$file = getFichierById($file_type, $id_fichier, $client_id);
	if($file == null){
		exit;
	}

	$basepath = APPLICATION_PATH . '/../docs/';
	$chemincomplet = $basepath . $file['lien'];


	$content = file_get_contents($chemincomplet);
	header("Content-Disposition: inline; filename=$filename");
	header("Content-type: application/pdf");
	header('Cache-Control: private, max-age=0, must-revalidate');
	header('Pragma: public');
	echo $content;
	exit;
}
?>