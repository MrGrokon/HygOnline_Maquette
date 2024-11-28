<?php 
	
	function get_db(){
		if(APPLICATION_ENV == 'production') {
			$db = new PDO('mysql:host=localhost;dbname=hyg_dev2', 'hyg_dev', 'XRcD3]+b438q_Dc');
		} else {
			$db = new PDO('mysql:host=localhost;dbname=hyg_dev2', 'root', '');
		}
		return $db;
}

// ----------------- HygOnline_v2 nouvelles requettes -------------------------------------------------

function test ($email, $mdp){
	$db = get_db();
	$stmt = $db->prepare("SELECT users.*, clients.nom FROM users, clients
						WHERE clients.id_client = users.id_client
						AND email = :email 
						AND motdepasse = :mdp");
	$stmt->bindValue('email', $email, PDO::PARAM_STR);
	$stmt->bindValue('mdp', $mdp, PDO::PARAM_STR);
	$stmt->execute();
	$data = $stmt->fetchAll(PDO::FETCH_ASSOC);
	return $data;
}

function getFichier($file_type, $client_id, $name=null){
	$db = get_db();
	switch ($file_type) {
		case 'facture':
			$sql = "SELECT factures.*, 
					DATE_FORMAT(`date_facture`, '%d/%m/%Y') AS `disp_date_facture`, 
					DATE_FORMAT(`echeance_facture`, '%d/%m/%Y') AS `disp_echeance_facture` 
					FROM factures, contrats, clients
					WHERE factures.id_contrat = contrats.id_contrat
					AND contrats.id_client = clients.id_client
					AND clients.id_client = :client_id";
					if (isset($name)) {
						$sql = $sql . " AND nom_facture LIKE '%" . $name ."%'";
					}
			break;
		
		case 'devis':
			$sql = "SELECT devis.*, DATE_FORMAT(`date_devis`, '%d/%m/%Y') AS `disp_date_devis`
					FROM devis, contrats, clients
					WHERE devis.id_contrat = contrats.id_contrat
					AND contrats.id_client = clients.id_client
					AND clients.id_client = :client_id";
					if (isset($name)) {
						$sql = $sql . " AND nom_devis LIKE '%" . $name ."%'";
					}
			break;

		case 'plan':
			$sql = "SELECT plans.*, contrats.adresse_contrat, 
					DATE_FORMAT(`date_plan`, '%d/%m/%Y') AS `disp_date_plan` 
					FROM plans, contrats, clients
					WHERE plans.id_contrat = contrats.id_contrat
					AND contrats.id_client = clients.id_client
					AND clients.id_client = :client_id";
					if (isset($name)) {
						$sql = $sql . " AND nom_plan LIKE '%" . $name ."%'";
					}
			break;

		case 'contrat':
			$sql = "SELECT contrats.*,
					DATE_FORMAT(`date_contrat`, '%d/%m/%Y') AS `disp_date_contrat` 
					FROM contrats, clients
					WHERE contrats.id_client = clients.id_client
					AND clients.id_client = :client_id";
					if (isset($name)) {
						$sql = $sql . " AND nom_contrat LIKE '%" . $name ."%'";
					}
			break;

		case 'bi':
			$sql = "SELECT id_intervention, objet_interv, date_bi, nom_bi, lien_bi, interventions.est_effectuee,
					clients.nom,
					contrats.objet_contrat, contrats.nom_contrat, contrats.est_effectuee,
					DATE_FORMAT(`date_bi`, '%d/%m/%Y') AS `disp_date_bi` 
					FROM interventions, contrats, clients
					WHERE interventions.id_contrat = contrats.id_contrat
					AND contrats.id_client = clients.id_client
					AND clients.id_client = :client_id";
					if (isset($name)) {
						$sql = $sql . " AND nom_bi LIKE '%" . $name ."%'";
					}
			break;

		case 'ri':
			$sql = "SELECT id_intervention, objet_interv, date_ri, nom_ri, lien_ri, interventions.est_effectuee,
					clients.nom,
					contrats.objet_contrat, contrats.nom_contrat, contrats.est_effectuee,
					DATE_FORMAT(`date_ri`, '%d/%m/%Y') AS `disp_date_ri` 
					FROM interventions, contrats, clients
					WHERE interventions.id_contrat = contrats.id_contrat
					AND contrats.id_client = clients.id_client
					AND clients.id_client = :client_id";
					if (isset($name)) {
						$sql = $sql . " AND nom_ri LIKE '%" . $name ."%'";
					}
			break;

		case 'fiche':
			$sql = "SELECT fiches_securitees.*
					FROM interventions, contrats, clients, produits_utilises, fiches_securitees
					WHERE fiches_securitees.id_produit = produits_utilises.id_produit
					AND produits_utilises.id_interv = interventions.id_intervention
					AND interventions.id_contrat = contrats.id_contrat
					AND contrats.id_client = clients.id_client
					AND clients.id_client = :client_id";
					if (isset($name)) {
						$sql = $sql . " AND nom_produit LIKE '%" . $name ."%'";
					}
			break;

		case 'perso':
			$sql = "SELECT fichiers_perso.*
					FROM categories_perso, fichiers_perso
					WHERE fichiers_perso.id_categ = categories_perso.id_categ";
					if (isset($name)) {
						$sql = $sql . " AND nom_fichier LIKE '%" . $name ."%'";
					}
			break;


	}
	$stmt = $db->prepare($sql);
	$stmt->bindValue('client_id', $client_id, PDO::PARAM_INT);

	$stmt->execute();

	$data = $stmt->fetchAll(PDO::FETCH_ASSOC);
	return $data;
}

function getFichierByContrat($file_type, $id_client, $id_contrat){
	$db = get_db();
	switch ($file_type){
		case 'facture':
			$sql = "SELECT factures.*, 
					DATE_FORMAT(`date_facture`, '%d/%m/%Y') AS `disp_date`, 
					DATE_FORMAT(`echeance_facture`, '%d/%m/%Y') AS `disp_echeance` 
					FROM factures, contrats, clients
					WHERE factures.id_contrat = contrats.id_contrat
					AND contrats.id_contrat = :id_contrat
					AND contrats.id_client = clients.id_client
					AND clients.id_client = :id_client";
			break;

		case 'devis':
			$sql = "SELECT devis.*, 
					DATE_FORMAT(`date_devis`, '%d/%m/%Y') AS `disp_date`
					FROM devis, contrats, clients
					WHERE devis.id_contrat = contrats.id_contrat
					AND contrats.id_contrat = :id_contrat
					AND contrats.id_client = clients.id_client
					AND clients.id_client = :id_client";
			break;

		case 'plan':
			$sql = "SELECT plans.*, contrats.adresse_contrat, 
					DATE_FORMAT(`date_plan`, '%d/%m/%Y') AS `disp_date` 
					FROM plans, contrats, clients
					WHERE plans.id_contrat = contrats.id_contrat
					AND contrats.id_contrat = :id_contrat
					AND contrats.id_client = clients.id_client
					AND clients.id_client = :id_client";
			break;

		case 'bi':
			$sql = "SELECT id_intervention, objet_interv, date_bi, nom_bi, lien_bi, interventions.est_effectuee,
					clients.nom,
					DATE_FORMAT(`date_bi`, '%d/%m/%Y') AS `disp_date`,
					contrats.objet_contrat, contrats.nom_contrat, contrats.est_effectuee
					FROM interventions, contrats, clients
					WHERE interventions.id_contrat = contrats.id_contrat
					AND contrats.id_contrat = :id_contrat
					AND contrats.id_client = clients.id_client
					AND clients.id_client = :id_client";
			break;

		case 'ri':
			$sql = "SELECT id_intervention, objet_interv, date_ri, nom_ri, lien_ri, interventions.est_effectuee,
					clients.nom,
					DATE_FORMAT(`date_plan`, '%d/%m/%Y') AS `disp_date`,
					contrats.objet_contrat, contrats.nom_contrat, contrats.est_effectuee
					FROM interventions, contrats, clients
					WHERE interventions.id_contrat = contrats.id_contrat
					AND contrats.id_contrat = :id_contrat
					AND contrats.id_client = clients.id_client
					AND clients.id_client = :id_client";
			break;
	}

	$stmt = $db->prepare($sql);
	$stmt->bindValue('id_client', $id_client, PDO::PARAM_INT);
	$stmt->bindValue('id_contrat', $id_contrat, PDO::PARAM_INT);
	$stmt->execute();

	$data = $stmt->fetchAll(PDO::FETCH_ASSOC);
	return $data;
}

function getFichierById($file_type, $id_fichier, $client_id){
	$db = get_db();
	switch ($file_type) {
		case 'facture':
			$sql = "SELECT factures.* FROM factures, contrats, clients
					WHERE factures.id_contrat = contrats.id_contrat
					AND contrats.id_client = clients.id_client
					AND clients.id_client = :client_id
					AND factures.id_facture = :id_fichier";
			break;
		
		case 'devis':
			$sql = "SELECT devis.* FROM devis, contrats, clients
					WHERE devis.id_contrat = contrats.id_contrat
					AND contrats.id_client = clients.id_client
					AND clients.id_client = :client_id
					AND devis.id_devis = :id_fichier";
			break;

		case 'plan':
			$sql = "SELECT plans.* FROM plans, contrats, clients
					WHERE plans.id_contrat = contrats.id_contrat
					AND contrats.id_client = clients.id_client
					AND clients.id_client = :client_id
					AND plans.id_plan = :id_fichier";
			break;

		case 'contrat':
			$sql = "SELECT contrats.* FROM contrats, clients
					WHERE contrats.id_client = clients.id_client
					AND clients.id_client = :client_id
					AND contrats.id_contrat = :id_fichier";
			break;

		case 'bi':
			$sql = "SELECT id_intervention, objet_interv, date_bi, nom_bi, lien_bi AS lien, interventions.est_effectuee,
					clients.nom,
					contrats.objet_contrat, contrats.nom_contrat, contrats.est_effectuee
					FROM interventions, contrats, clients
					WHERE interventions.id_contrat = contrats.id_contrat
					AND contrats.id_client = clients.id_client
					AND clients.id_client = :client_id
					AND interventions.id_intervention = :id_fichier";
			break;

		case 'ri':
			$sql = "SELECT id_intervention, objet_interv, date_ri, nom_ri, lien_ri AS lien, interventions.est_effectuee,
					clients.nom,
					contrats.objet_contrat, contrats.nom_contrat, contrats.est_effectuee
					FROM interventions, contrats, clients
					WHERE interventions.id_contrat = contrats.id_contrat
					AND contrats.id_client = clients.id_client
					AND clients.id_client = :client_id
					AND interventions.id_intervention = :id_fichier";
			break;

		case 'fiche':
			$sql = "SELECT fiches_securitees.*
					FROM interventions, contrats, clients, produits_utilises, fiches_securitees
					WHERE fiches_securitees.id_produit = produits_utilises.id_produit
					AND produits_utilises.id_interv = interventions.id_intervention
					AND interventions.id_contrat = contrats.id_contrat
					AND contrats.id_client = clients.id_client
					AND clients.id_client = :client_id
					AND fiches_securitees.id_fiche = :id_fichier";
			break;

		case 'perso':
			$sql = "SELECT fichiers_perso.*
					FROM categories_perso, fichiers_perso
					WHERE fichiers_perso.id_categ = categories_perso.id_categ
					AND fichiers_perso.id_fichier = :id_fichier";
			break;
	}
	$stmt = $db->prepare($sql);
	if (isset($client_id)) {
		$stmt->bindValue('client_id', $client_id, PDO::PARAM_INT);

	}
	$stmt->bindValue('id_fichier', $id_fichier, PDO::PARAM_INT);
	$stmt->execute();

	$data = $stmt->fetchAll(PDO::FETCH_ASSOC);
	
	if(count($data) > 0){
		return $data[0];
	}else{
		return null;
	}
}

function get_Categories_Perso(){
	$db = get_db();
	$sql = "SELECT * FROM categories_perso";
	$stmt = $db->prepare($sql);
	$stmt->execute();

	$data = $stmt->fetchAll(PDO::FETCH_ASSOC);
	return $data;
}

function get_CategPersoById($categ_id){
	$db = get_db();
	$sql = "SELECT * FROM categories_perso WHERE id_categ = :categ_id";
	$stmt = $db->prepare($sql);
	$stmt->bindValue('categ_id', $categ_id, PDo::PARAM_INT);
	$stmt->execute();

	$data = $stmt->fetchAll(PDO::FETCH_ASSOC);
	return $data;
}

function get_FichierPersoById($categ_id){
	$db = get_db();
	$sql = "SELECT * 
			FROM fichiers_perso 
			WHERE id_categ = :categ_id";

	$stmt = $db->prepare($sql);
	$stmt->bindValue('categ_id', $categ_id, PDO::PARAM_INT);
	$stmt->execute();

	$data = $stmt->fetchAll(PDO::FETCH_ASSOC);
	return $data;
}
function get_Contrat_ByID($id_client, $id_contrat){
	$db = get_db();
	$sql = "SELECT contrats.*,
			DATE_FORMAT(`date_contrat`, '%d/%m/%Y') AS `disp_date`,
			DATE_FORMAT(`echeance_contrat`, '%d/%m/%Y') AS `disp_echeance`
			FROM contrats, clients
			WHERE contrats.id_client = clients.id_client
			AND clients.id_client = :id_client
			AND contrats.id_contrat = :id_contrat";

	$stmt = $db->prepare($sql);
	$stmt->bindValue('id_client', $id_client, PDO::PARAM_INT);
	$stmt->bindValue('id_contrat', $id_contrat, PDO::PARAM_INT);
	$stmt->execute();

	$data = $stmt->fetchAll(PDO::FETCH_ASSOC);
	if ($data) {
		return $data[0];
	}
	return null;	
}

function new_retard($id_client){
	$db=get_db();
	$sql = "SELECT factures.*,
			DATE_FORMAT(`date_facture`, '%d/%m/%Y') AS `disp_date`,
			DATE_FORMAT(`echeance_facture`, '%d/%m/%Y') AS `disp_echeance`
			FROM clients, factures 
			WHERE factures.id_client = clients.id_client 
			AND factures.id_client = :id_client
			AND factures.echeance_facture < CURRENT_DATE
			AND (factures.est_soldee = 1 OR factures.est_soldee = 0)";

	$stmt = $db->prepare($sql);
	$stmt->bindValue('id_client', $id_client, PDO::PARAM_INT);
	$stmt->execute();

	$data = $stmt->fetchAll(PDO::FETCH_ASSOC);
	return $data;
}

function count_retard($id_client){
	$db = get_db();
	$sql = "SELECT COUNT(*) AS nmb_retard
			FROM clients, factures 
			WHERE factures.id_client = clients.id_client 
			AND factures.id_client = :id_client
			AND factures.echeance_facture < CURRENT_DATE
			AND (factures.est_soldee = 1 OR factures.est_soldee = 0)";

	$stmt = $db->prepare($sql);
	$stmt->bindValue('id_client', $id_client, PDO::PARAM_INT);
	$stmt->execute();

	$data = $stmt->fetchAll(PDO::FETCH_ASSOC);
	return $data;
}

function get_ficheProduit($id_interv){
	$db = get_db();
	$sql = "SELECT fiches_securitees.*, produits_utilises.quantitee_utilisee 
			FROM fiches_securitees, produits_utilises, interventions
			WHERE fiches_securitees.nom_produit = produits_utilises.nom_produit
			AND produits_utilises.id_interv = interventions.id_intervention
			AND interventions.id_intervention = :id_interv";

	$stmt = $db->prepare($sql);
	$stmt->bindValue('id_interv', $id_interv, PDO::PARAM_INT);
	$stmt->execute();

	$data = $stmt->fetchAll(PDO::FETCH_ASSOC);
	return $data;
}

function get_contrat($id_client, $sur_la_duree=null){
	$db = get_db();
	$sql = "SELECT contrats.*, clients.nom,
			DATE_FORMAT(`date_contrat`, '%d/%m/%Y') AS `disp_date`,
			DATE_FORMAT(`echeance_contrat`, '%d/%m/%Y') AS `disp_echeance`
			FROM contrats, clients
			WHERE contrats.id_client = clients.id_client
			AND contrats.id_client = :id_client";

	if ($sur_la_duree == 1) {
		$sql = $sql . " AND contrats.date_contrat != contrats.echeance_contrat";
	}
	elseif($sur_la_duree == 2){
		$sql = $sql . " AND contrats.date_contrat = contrats.echeance_contrat";
	}
			

	$stmt = $db->prepare($sql);
	$stmt->bindValue('id_client', $id_client, PDO::PARAM_INT);
	$stmt->execute();

	$data = $stmt->fetchAll(PDO::FETCH_ASSOC);
	return $data;
}

function get_fiches($id_client){
	$db = get_db();
	$sql = "SELECT fiches_securitees.* 
			FROM fiches_securitees, produits_utilises, interventions, contrats
			WHERE fiches_securitees.id_produit = produits_utilises.id_produit
			AND produits_utilises.id_interv = interventions.id_intervention
			AND interventions.id_contrat = contrats.id_contrat
			AND contrats.id_client = :id_client";

	$stmt = $db->prepare($sql);
	$stmt->bindValue('id_client', $id_client, PDO::PARAM_INT);
	$stmt->execute();

	$data = $stmt->fetchAll(PDO::FETCH_ASSOC);
	return $data;
}

/*function get_detail_LinkedFile($id_client, $id_contrat){
// ------------------> LinkedFile <--------------------------
	$db = get_db();
	$sql = "SELECT factures.nom_facture, factures.date_facture, factures.lien,
			devis.nom_devis, devis.date_devis, devis.lien,
			plans.date_plan, plans.date_plan, plans.lien,
			contrats.*
			FROM clients, contrats, factures, devis, plans
			WHERE factures.id_contrat = contrats.id_contrat
			AND devis.id_contrat = contrats.id_contrat
			AND plans.id_contrat = contrats.id_contrat
			AND contrats.id_contrat = :id_contrat
			AND contrats.id_client = clients.id_client
			AND clients.id_client = :id_client";

	$stmt = $db->prepare($sql);
	$stmt->bindValue('id_client', $id_client, PDO::PARAM_INT);
	$stmt->bindValue('id_contrat', $id_contrat, PDO::PARAM_INT);
	$stmt->execute();

	$data = $stmt->fetchAll(PDO::FETCH_ASSOC);
	return $data;
}*/

function get_detail_LinkedInterv($id_client, $id_contrat){
// ------------------> LinkedInterv <--------------------------
	$db = get_db();
	$sql = "SELECT interventions.*,
			DATE_FORMAT(`date_interv`, '%d/%m/%Y') AS `disp_date`
			FROM interventions, contrats, clients
			WHERE interventions.id_contrat = contrats.id_contrat
			AND contrats.id_contrat = :id_contrat
			ANd contrats.id_client = clients.id_client
			AND clients.id_client = :id_client";

	$stmt = $db->prepare($sql);
	$stmt->bindValue('id_contrat', $id_contrat, PDO::PARAM_INT);
	$stmt->bindValue('id_client', $id_client, PDO::PARAM_INT);
	$stmt->execute();

	$data = $stmt->fetchAll(PDO::FETCH_ASSOC);
	return $data;
}
// ----------------- HygOnline_v2 nouvelles requettes -------------------------------------------------

function verif($client, $categ){
	$db=get_db();
	$stmt= $db->prepare("SELECT * FROM categories_non_affichees");
	$stmt->execute();
	$data = $stmt->fetchAll(PDO::FETCH_ASSOC);

	foreach ($data as $key => $value) {
		if ($value['id_client'] == $client && $value['id_categorie'] == $categ) {
		header('Location: ./erreur.php');
		}
	}
}

function get_news($limit = null){
	$db = get_db();

	$sql = "SELECT titre, date_new, texte, auteur, image, est_affichee, 
			DATE_FORMAT(`date_new`, '%d/%m/%Y') AS `disp_date` 
			FROM news 
			WHERE est_affichee = 1 
			ORDER BY date_new DESC";
	if ($limit){
		$sql = $sql . " LIMIT :limit";
	}

	$stmt = $db->prepare($sql);

	if ($limit) {
		$stmt->bindValue('limit', $limit, PDO::PARAM_INT);
	}

	$stmt->execute();
	$data = $stmt->fetchAll(PDO::FETCH_ASSOC);

	return $data;
}

function get_interv($client_id, $effectuee = NULL, $limit=NULL){
	$db = get_db();

	$sql = "SELECT interventions.*, CURRENT_DATE, clients.nom AS nom_client, 
			DATE_FORMAT(`date_interv`, '%d/%m/%Y') AS `disp_date`,
			DATE_FORMAT(CURRENT_DATE, '%d/%m/%Y') AS `curr_disp_date`,
			DATEDIFF(date_interv, CURRENT_DATE) AS days_left
			FROM interventions, contrats, clients
			WHERE interventions.id_contrat = contrats.id_contrat
			AND contrats.id_client = clients.id_client
			AND clients.id_client = :client_id";

			if (isset($effectuee)) {
				$sql = $sql . " AND interventions.est_effectuee = :effectuee";
			}

			if (isset($limit)) {
				$sql = $sql . " LIMIT :limit";
			}

	$stmt = $db->prepare($sql);

	if (isset($effectuee)) {
		$stmt->bindValue('effectuee', $effectuee, PDO::PARAM_INT);
	}
	if (isset($limit)) {
		$stmt->bindValue('limit', $limit, PDO::PARAM_INT);
	}
	$stmt->bindValue('client_id', $client_id, PDO::PARAM_INT);


	$stmt->execute();
	$data = $stmt->fetchAll(PDO::FETCH_ASSOC);
	return $data;
}

function test_date_interv($client_id){
	$db = get_db();

	$sql = "SELECT *, 
			DATE_FORMAT(`date_interv`, '%d/%m/%Y') AS `disp_date`,
			DATE_FORMAT(CURRENT_DATE, '%d/%m/%Y') AS `curr_disp_date`,
			DATEDIFF(date_interv, CURRENT_DATE ) AS days_left
			FROM `intervention` 
			WHERE est_effectuee = 0 
			AND client_id = :client_id 
			ORDER BY date_interv DESC";
		
		// on devra imposer un teste a la var days_left (<15 -> i+1 vous avez i intervention bientot)

	$stmt = $db->prepare($sql);
	$stmt->bindValue('client_id', $client_id, PDO::PARAM_INT);
	$stmt->execute();

	$data = $stmt->fetchAll(PDO::FETCH_ASSOC);
	return $data;
}

function frequence($id_client){
	$db = get_db();
	$sql = "SELECT frequence_notif FROM clients WHERE id_client = :id_client";
	$stmt = $db->prepare($sql);
	$stmt->bindValue('id_client', $id_client, PDO::PARAM_INT);
	$stmt->execute();

	$data = $stmt->fetchAll(PDO::FETCH_ASSOC);
	return $data;
}

function taille_fichier($file){
	$filepath = APPLICATION_PATH . "/../docs/" . $file;
	$taille = filesize($filepath);

	if ($taille >= 1048576){
		$taille = round($taille / 1048576 * 100) / 100 . " Mo";
	}
	elseif ($taille >= 1024){
		$taille = round($taille / 1024 * 100) / 100 . " Ko";
	}

	else{
		$taille = $taille . " o";
	} 
	if($taille==0) {$taille="-";}

	return $taille;
}
// ---------------------------------------------------
 //  Nouvelle notif d'intervention !!!
function next_date($id_client){
	$db = get_db();
	$sql = "SELECT DATEDIFF(date_interv, CURRENT_DATE) AS difference, objet, 
			DATE_FORMAT(`date_interv`, '%d/%m/%Y') AS `disp_date`
			FROM intervention 
			WHERE date_interv >= CURRENT_DATE 
			AND client_id = :id_client 
			AND est_effectuee = 0
			ORDER BY date_interv ASC
			LIMIT 1 ";

	$stmt = $db->prepare($sql);
	$stmt->bindValue('id_client', $id_client, PDO::PARAM_INT);
	$stmt->execute();

	$data = $stmt->fetchAll(PDO::FETCH_ASSOC);
	return $data;
}
// --------------------------------------------------

function recherche($id_client, $name){
	$db = get_db();
	$sql = "SELECT nom, numero, lien, id_fichier 
		FROM fichiers 
		WHERE client_id = " . $id_client ." 
		AND nom LIKE '%" . $name ."%'";
		//il faudra peut-etre prendre en compte les categories_non-afficher ?


	$stmt = $db->prepare($sql);
	//$stmt->bindValue('id_client', $id_client, PDO::PARAM_INT);
	//$stmt->bindValue('name', $name, PDO::PARAM_STR);
	$stmt->execute();
	//echo $sql;
	$data = $stmt->fetchAll(PDO::FETCH_ASSOC);
	return $data;
}
?>