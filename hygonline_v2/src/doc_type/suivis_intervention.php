<div class="panel panel-default">
	<h2 class="panel-heading">Les interventions à venir: <i class="glyphicon glyphicon-remove danger"></i> </h2>

	<div style="padding: 10px;" class="panel-body">
		<table class="table table-striped table-hover">
			<thead>
				<tr>
					<th>Date</th>
					<th>Adresse</th>
					<th>Objet</th>
					<th>Bon d'intervention</th>
					<th>Rapport d'intervention</th>
					<th>Fiches associées</th>
				</tr>
			</thead>
			<tbody>
				<?php $data = get_interv($_SESSION['user']['id_client'], 0, null); ?>
				<?php foreach ($data as $indice => $value) :?>

					<tr>
						<?php if($value['curr_disp_date'] == $value['disp_date']) :?>
							<td class="Tleft"><?php echo "aujourd'huis"; ?></td>
						<?php else :?>
							<td class="Tleft"><?php echo $value['disp_date']; ?></td>	
						<?php endif; ?>

						<td class="Tleft"> <?php echo $value['adresse_interv']; ?> </td>
						<td class="Tleft"> <?php echo $value['objet_interv']; ?> </td>

						<td class="Tcenter"> 
							<?php 
								$type = "bi";
								$size = taille_fichier($value['lien_bi']);
								echo '<a href="./download.php?file='.$value['id_intervention'].'&type='. $type .'" target="_blank">'. $value['nom_bi'] .'</a> <span style="font-size: 75%;">(' . $size . ')</span>'; 
							?>
						</td>

						<td class="Tcenter"> 
							<?php 
								$type = "ri";
								$size = taille_fichier($value['lien_ri']);
								echo '<a href="./download.php?file='.$value['id_intervention'].'&type='. $type .'" target="_blank">'. $value['nom_ri'] .'</a> <span style="font-size: 75%;">(' . $size . ')</span>'; 
							?>
						</td>

						<td class="Tcenter"> <a href="index.php?page=fiche&id=<?php echo $value['id_intervention']; ?>"> <i class="glyphicon glyphicon-file info"></i> </a> </td>

					</tr>

				<?php endforeach; ?>
			</tbody>
		</table>		
	</div>
</div>

 <!-- _________________________________________________________________________________________ -->

<div class="panel panel-default">
	<h2 class="panel-heading">Les interventions passées: <i class="glyphicon glyphicon-ok success"></i> </h2>

	<div style="padding: 10px;" class="panel-body">
		<table class="table table-striped table-hover">
			<thead>
				<tr>
					<th>Date</th>
					<th>Adresse</th>
					<th>Objet</th>
					<th>Bon d'intervention</th>
					<th>Rapport d'intervention</th>
					<th>Fiches associées</th>
				</tr>
			</thead>
			<tbody>
				<?php $data = get_interv($_SESSION['user']['id_client'], 1, null); ?>
				<?php foreach ($data as $indice => $value) :?>

					<tr>
						<?php if($value['curr_disp_date'] == $value['disp_date']) :?>
							<td class="Tleft"><?php echo "aujourd'huis"; ?></td>
						<?php else :?>
							<td class="Tleft"><?php echo $value['disp_date']; ?></td>	
						<?php endif; ?>

						<td class="Tleft"> <?php echo $value['adresse_interv']; ?> </td>
						<td class="Tleft"> <?php echo $value['objet_interv']; ?> </td>

						<td class="Tcenter"> 
							<?php 
								$type = "bi";
								$size = taille_fichier($value['lien_bi']);
								echo '<a href="./download.php?file='.$value['id_intervention'].'&type='. $type .'" target="_blank">'. $value['nom_bi'] .'</a> <span style="font-size: 75%;">(' . $size . ')</span>'; 
							?>
						</td>

						<td class="Tcenter"> 
							<?php 
								$type = "ri";
								$size = taille_fichier($value['lien_ri']);
								echo '<a href="./download.php?file='.$value['id_intervention'].'&type='. $type .'" target="_blank">'. $value['nom_ri'] .'</a> <span style="font-size: 75%;">(' . $size . ')</span>'; 
							?>
						</td>

						<td class="Tcenter"> <a href="index.php?page=fiche&id=<?php echo $value['id_intervention']; ?>"> <i class="glyphicon glyphicon-file info"></i> </a> </td>

					</tr>

				<?php endforeach; ?>
			</tbody>
		</table>		
	</div>
</div>
<div class="clearfix"></div>
<a href='index.php' class="btn btn-xs btn-primary Fright">Retour a l'acceuil</a>