<?php $interv_detail = get_detail_LinkedInterv($_SESSION['user']['id_client'], $_GET['id']); ?>
<?php 
$valeur = get_Contrat_ByID($_SESSION['user']['id_client'], $_GET['id']);
if(!$valeur) {
	die('Pas de contrat');
}

 ?>

<div class="row">
	<div class="col-md-12">
		<div class="panel panel-default">
			<div class="panel-heading">
				<h2>Détail Contrat</h2>
				<h4> <?php echo $valeur['nom_contrat'] . " - n°" . $valeur['numero_contrat']; ?> </h4>
				<h4> objet: <?php echo $valeur['objet_contrat']; ?> </h4>
				<h4> adresse: <?php echo $valeur['adresse_contrat']; ?> </h4>

				<?php if ($valeur['date_contrat'] == $valeur['echeance_contrat']): ?>
					<h4 class="Fright"> en date du: <?php echo $valeur['date_contrat']; ?> </h4>

				<?php else: ?>
					<h4 class="Fright">du: <?php echo $valeur['disp_date']; ?> au: <?php echo $valeur['disp_echeance']; ?> </h4>

				<?php endif ?>

				<div class="clearfix"></div>
			</div>

				
			<div class="panel-body">
				<div class="row">
					<div class="col-md-4">
						<div class="panel panel-default">
							<div class="panel-heading">
								<h2>Les documments liés: </h2>
							</div>
							<div class="panel-body">
								<table class="table table-striped table-hover tablesorter">
									<thead>
										<tr>
											<th>Nom</th>
											<th>Date</th>
											<th class="lien">Lien</th>
										</tr>
									</thead>
									<tbody>

										<?php $facture = getFichierByContrat('facture', $_SESSION['user']['id_client'], $_GET['id']); ?>
										<?php foreach ($facture as $key => $fact): ?>
											<tr>
												<td> <?php echo $fact['nom_facture']; ?> </td>
												<td> <?php echo $fact['disp_date']; ?> </td>
												
												<td  class="Tcenter"> 
												<?php 
													$type = "facture";
													$size = taille_fichier($fact['lien']);
													echo '<a href="./download.php?file='.$fact['id_facture'].'&type='. $type .'" target="_blank"><i class="glyphicon glyphicon-download-alt info"></i></a> <span style="font-size: 75%;">(' . $size . ')</span>'; 

												?> 
												</td>

											</tr>
										<?php endforeach; ?>

										<?php $devis = getFichierByContrat('devis', $_SESSION['user']['id_client'], $_GET['id']); ?>
										<?php foreach ($devis as $key => $dev): ?>
											<tr>
												<td> <?php echo $dev['nom_devis']; ?> </td>
												<td> <?php echo $dev['disp_date']; ?> </td>
												
												<td  class="Tcenter"> 
												<?php 
													$type = "devis";
													$size = taille_fichier($dev['lien']);
													echo '<a href="./download.php?file='.$dev['id_devis'].'&type='. $type .'" target="_blank"><i class="glyphicon glyphicon-download-alt info"></i></a> <span style="font-size: 75%;">(' . $size . ')</span>'; 

												?> 
												</td>
											
											</tr>
										<?php endforeach; ?>

										<?php $plan = getFichierByContrat('plan', $_SESSION['user']['id_client'], $_GET['id']); ?>
										<?php foreach ($plan as $key => $pl): ?>
											<tr>
												<td> <?php echo $pl['nom_plan']; ?> </td>
												<td> <?php echo $pl['disp_date']; ?> </td>
												
												<td  class="Tcenter"> 
												<?php
													$type = "plan";
													$size = taille_fichier($pl['lien']);
													echo '<a href="./download.php?file='.$pl['id_plan'].'&type='. $type .'" target="_blank"><i class="glyphicon glyphicon-download-alt info"></i></a> <span style="font-size: 75%;">(' . $size . ')</span>'; 

												?> 
												</td>

											</tr>
										<?php endforeach; ?>
											
										</tbody>
									</table>
								</div>
							</div>
						</div>
					
					<div class="col-md-8">
						<div class="panel panel-default">
							<div class="panel-heading">
								<h2> Les interventions liées: </h2>
							</div>
							<div class="panel-body">
								<table class="table table-striped table-hover tablesorter">
									<thead>
										<tr>
											<th>Date</th>
											<th>Adresse</th>
											<th>Objet</th>
											<th>Bon d'intervention</th>
											<th>Rapport d'intervention</th>
										</tr>
									</thead>
									<tbody>
										
										<?php $intervention = get_detail_LinkedInterv($_SESSION['user']['id_client'], $_GET['id']); ?>
										<?php foreach ($intervention as $key => $interv): ?>
											<tr>
												<td> <?php echo $interv['disp_date']; ?> </td>
												<td> <?php echo $interv['adresse_interv']; ?> </td>
												<td> <?php echo $interv['objet_interv']; ?> </td>
												
												<td class="Tcenter"> 
													<?php 
														$type = "bi";
														$size = taille_fichier($interv['lien_bi']);
														echo '<a href="./download.php?file='.$interv['id_intervention'].'&type='. $type .'" target="_blank">'. $interv['nom_bi'] .'</a> <span style="font-size: 75%;">(' . $size . ')</span>'; 
													?>
												</td>

												
												<td class="Tcenter"> 
													<?php 
														$type = "ri";
														$size = taille_fichier($interv['lien_ri']);
														echo '<a href="./download.php?file='.$interv['id_intervention'].'&type='. $type .'" target="_blank">'. $interv['nom_ri'] .'</a> <span style="font-size: 75%;">(' . $size . ')</span>'; 
													?>
												</td>

											</tr>
										<?php endforeach ?>

									</tbody>
								</table>
							</div>
						</div>
					</div>
				</div>
				
			</div>
		</div>
	</div>
</div>
	<a href='index.php' class="btn btn-xs btn-primary Fright">Retour a l'acceuil</a>
		<a href='index.php?page=fichier&categ=contrat' class="btn btn-xs btn-primary Fright" style="margin-right: 10px;">Retour aux contrats</a>