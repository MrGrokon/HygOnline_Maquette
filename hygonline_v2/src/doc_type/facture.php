<div class="panel panel-default">	
	<div class="panel-heading">
		<h1 class="Fleft">Vos Factures</h1>
		<div class="clearfix"></div>
	</div>

	<div style="padding: 10px;" class="panel-body">
		
	<table class="table table-striped table-hover tablesorter">
		<thead>
			<tr>
				<th>Date</th>
				<th>N°</th>
				<th>Libellé</th>
				<th>Montant</th>
				<th>Soldée(reste)</th>
				<th>Echéance</th>
				<th class="lien">Lien</th>
			</tr>
		</thead>
		<tbody>
		<?php $fichier =  getFichier('facture', $_SESSION['user']['id_client']); ?>
			<?php foreach ($fichier as $indice => $facture) :?>
				<tr>
					<td class="Tleft"> <?php echo $facture['disp_date_facture']; ?> </td>
					<td class="Tcenter"> <?php echo $facture['numero_facture']; ?> </td>
					<td class="Tleft"> <?php echo $facture['nom_facture']; ?> </td>
					<td class="Tright"> <?php echo $facture['montant_facture'] . " €"; ?> </td>

					<td class="Tcenter"> 
						<?php
							if ($facture['est_soldee'] == 0) {
								echo '<i class="glyphicon glyphicon-remove danger"></i>';
							} 
							elseif ($facture['est_soldee'] == 2) {
								echo '<i class="glyphicon glyphicon-ok success"></i>';
							}
							else{
								echo '<i class="glyphicon glyphicon-time warning"></i>';
								if ($facture['reste']) {
									echo " " . $facture['reste'] . " €";
								}
							}
						?>	
					</td>

					<td class="Tleft"> <?php echo $facture['disp_echeance_facture']; ?> </td>

					<td class="Tcenter"> <?php 
						$type = "facture";
						$size = taille_fichier($facture['lien']);
						echo '<a href="./download.php?file='.$facture['id_facture'].'&type='. $type .'" target="_blank"><i class="glyphicon glyphicon-download-alt info"></i></a> <span style="font-size: 75%;">(' . $size . ')</span>'; 

					?> 
					</td>
				</tr>
			<?php endforeach; ?>
		</tbody>
	</table>

	<a href='index.php' class="btn btn-xs btn-primary Fright">Retour a l'acceuil</a>

	</div>
</div>