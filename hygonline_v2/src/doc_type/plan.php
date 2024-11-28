<div class="panel panel-default">	
	<div class="panel-heading">
		<h1 class="Fleft">Vos Plans et Pièges</h1>
		<div class="clearfix"></div>
	</div>

	<div style="padding: 10px;" class="panel-body">
		
	<table class="table table-striped table-hover tablesorter">
		<thead>
			<tr>
				<th>Date</th>
				<th>Libellé</th>
				<th>Adresse</th>
				<th>Objet</th>
				<th class="lien">Lien</th>
			</tr>
		</thead>
		<tbody>
		<?php $fichier = getFichier('plan', $_SESSION['user']['id_client']); ?>
			<?php foreach ($fichier as $indice => $plan) :?>
				<tr>
					<td class="Tleft"> <?php echo $plan['disp_date_plan']; ?> </td>
					<td class="Tleft"> <?php echo $plan['nom_plan']; ?> </td>
					<td class="Tleft"> <?php echo $plan['adresse_contrat']; ?> </td>
					<td class="Tleft"> <?php echo $plan['objet_plan']; ?> </td>


					<td class="Tcenter"> 
						<?php 
							$type = "plan";
							$size = taille_fichier($plan['lien']);
							echo '<a href="./download.php?file='.$plan['id_plan'].'&type='. $type .'" target="_blank"><i class="glyphicon glyphicon-download-alt info"></i></a> <span style="font-size: 75%;">(' . $size . ')</span>'; 

						?> 
					</td>
				</tr>
			<?php endforeach; ?>
		</tbody>
	</table>

	<a href='index.php' class="btn btn-xs btn-primary Fright">Retour a l'acceuil</a>

	</div>
</div>