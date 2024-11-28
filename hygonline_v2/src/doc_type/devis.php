<div class="panel panel-default">	
	<div class="panel-heading">
		<h1 class="Fleft">Vos Devis</h1>
		<div class="clearfix"></div>
	</div>

	<div style="padding: 10px;" class="panel-body">
		
	<table class="table table-striped table-hover tablesorter">
		<thead>
			<tr>
				<th>Date</th>
				<th>N°</th>
				<th>Libellé</th>
				<th>Objet</th>
				<th>Montant</th>
				<th>Accepter</th>
				<th class="lien">Lien</th>
			</tr>
		</thead>
		<tbody>
		<?php $fichier = getFichier('devis', $_SESSION['user']['id_client']); ?>
			<?php foreach ($fichier as $indice => $devis) :?>
				<tr>
					<td class="Tleft"> <?php echo $devis['disp_date_devis']; ?> </td>
					<td class="Tcenter"> <?php echo $devis['numero_devis']; ?> </td>
					<td class="Tleft"> <?php echo $devis['nom_devis']; ?> </td>
					<td class="Tleft"> <?php echo $devis['objet_devis']; ?> </td>
					<td class="Tright"> <?php echo $devis['montant_devis'] . " €"; ?> </td>

					<td class="Tcenter"> 
						<?php
							if ($devis['est_accepter'] == 0) {
								echo '<i class="glyphicon glyphicon-remove danger"></i>';
							} 
							else{
								echo '<i class="glyphicon glyphicon-ok success"></i>';
							}
						?>	
					</td>

					<td class="Tcenter"> 
						<?php 
							$type = "devis";
							$size = taille_fichier($devis['lien']);
							echo '<a href="./download.php?file='.$devis['id_devis'].'&type='. $type .'" target="_blank"><i class="glyphicon glyphicon-download-alt info"></i></a> <span style="font-size: 75%;">(' . $size . ')</span>'; 

						?> 
					</td>
				</tr>
			<?php endforeach; ?>
		</tbody>
	</table>

	<a href='index.php' class="btn btn-xs btn-primary Fright">Retour a l'acceuil</a>

	</div>
</div>