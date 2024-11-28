<?php $contrat_duree = get_contrat($_SESSION['user']['id_client'], 1); ?>
<?php if ($contrat_duree) :?>

	<div class="panel panel-default">
		<div class="panel-heading">
		<h2>Contrats sur la durée</h2>
		</div>
		<div class="panel-body">
			<table class="table table-striped table-hover tablesorter">
				<thead>
					<tr>
						<th>Du</th>
						<th>Au</th>
						<th>Libellé</th>
						<th>N°</th>
						<th>Montant Total</th>
						<th>Adresse</th>
						<th>En cours(etat)</th>
						<th class="lien">Lien</th>
						<th class="lien">Affichage Détaillé</th>
					</tr>
				</thead>
				<tbody>
					<?php foreach ($contrat_duree as $indice => $duree) :?>
						<tr>
							<td class="Tleft"> <?php echo $duree['disp_date']; ?> </td>
							<td class="Tleft"> <?php echo $duree['disp_echeance']; ?> </td>
							<td class="Tleft"> <?php echo $duree['nom_contrat']; ?> </td>
							<td class="Tcenter"> <?php echo $duree['numero_contrat']; ?> </td>
							<td class="Tright"> <?php echo $duree['montant_total'] . " €"; ?> </td>
							<td class="Tleft"> <?php echo $duree['adresse_contrat']; ?> </td>
							
							<?php if ($duree['est_effectuee'] == 0) :?>
								<td class="Tcenter"> <i class="glyphicon glyphicon-remove danger"></i> </td>
							<?php elseif ($duree['est_effectuee'] == 1) :?>
								<td class="Tcenter"> <i class="glyphicon glyphicon-time warning"></i> </td>
							<?php elseif ($duree['est_effectuee'] == 2) :?>
								<td class="Tcenter"> <i class="glyphicon glyphicon-ok success"></i> </td>
							<?php endif; ?>

							<td  class="Tcenter"> 
							<?php 
								$type = "contrat";
								$size = taille_fichier($duree['lien']);
								echo '<a href="./download.php?file='.$duree['id_contrat'].'&type='. $type .'" target="_blank"><i class="glyphicon glyphicon-download-alt info"></i></a> <span style="font-size: 75%;">(' . $size . ')</span>'; 

							?> 
							</td>

							<td class="Tcenter"> <a href="index.php?page=detail&id=<?php echo $duree['id_contrat']; ?>"> <i class="glyphicon glyphicon-info-sign info"></i> </a> </td>

						</tr>
					<?php endforeach; ?>
				</tbody>
			</table>
		</div>
	</div>

<?php endif; ?>

<?php $contrat_ponct = get_contrat($_SESSION['user']['id_client'], 2) ?>
<?php if ($contrat_ponct) :?>

	<div class="panel panel-default">
		<div class="panel-heading">
		<h2>Contrats ponctuels</h2>
		</div>
		<div class="panel-body">
			<table class="table table-striped table-hover tablesorter">
				<thead>
					<tr>
						<th>Date</th>
						<th>Libellé</th>
						<th>N°</th>
						<th>Montant Total</th>
						<th>Adresse</th>
						<th>En cours(etat)</th>
						<th class="lien">Lien</th>
						<th class="lien">Affichage Détaillé</th>
					</tr>
				</thead>
				<tbody>
					<?php foreach ($contrat_ponct as $indice => $ponct) :?>
						<tr>
							<td class="Tleft"> <?php echo $ponct['disp_date']; ?> </td>
							<td class="Tleft"> <?php echo $ponct['nom_contrat']; ?> </td>
							<td class="Tcenter"> <?php echo $ponct['numero_contrat']; ?> </td>
							<td class="Tright"> <?php echo $ponct['montant_total'] . " €"; ?> </td>
							<td class="Tleft"> <?php echo $ponct['adresse_contrat']; ?> </td>
							
							<?php if ($ponct['est_effectuee'] == 0) :?>
								<td class="Tcenter"> <i class="glyphicon glyphicon-remove danger"></i> </td>
							<?php elseif ($ponct['est_effectuee'] == 1) :?>
								<td class="Tcenter"> <i class="glyphicon glyphicon-time warning"></i> </td>
							<?php elseif ($ponct['est_effectuee'] == 2) :?>
								<td class="Tcenter"> <i class="glyphicon glyphicon-ok success"></i> </td>
							<?php endif; ?>

							<td class="Tcenter">
							<?php 
								$type = "contrat";
								$size = taille_fichier($ponct['lien']);
								echo '<a href="./download.php?file='.$ponct['id_contrat'].'&type='. $type .'" target="_blank"><i class="glyphicon glyphicon-download-alt info"></i></a> <span style="font-size: 75%;">(' . $size . ')</span>'; 

							?> 
							</td>

							<td class="Tcenter"> <a href="index.php?page=detail&id=<?php echo $ponct['id_contrat']; ?>"> <i class="glyphicon glyphicon-info-sign info"></i> </a> </td>

						</tr>
					<?php endforeach; ?>
				</tbody>
			</table>
		</div>
	</div>

	<a href='index.php' class="btn btn-xs btn-primary Fright">Retour a l'acceuil</a>

<?php endif; ?>