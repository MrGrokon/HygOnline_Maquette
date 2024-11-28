
<div class="panel panel-default">
	<div class="panel-heading">
		<h1 class="Fleft">Vos Impayés</h1>
		<div class="clearfix"></div>
	</div>

	<div class="panel-body">
		<table class="table table-striped table-hover tablesorter">
			<thead>
				<tr>
					<th>Date</th>
					<th>N°</th>
					<th>libellé</th>
					<th>Echéance</th>
					<th>Montant</th>
					<th>Soldée(reste)</th>
					<th class="lien">Lien</th>
				</tr>
			</thead>
			<tbody>
				<?php $display = new_retard($_SESSION['user']['id_client']); ?>
				<?php foreach ($display as $indice => $valeur) :?>
				<tr>
					<td><?php echo $valeur['disp_date']; ?></td>
					<td><?php echo $valeur['numero_facture']; ?></td>
					<td><?php echo $valeur['nom_facture']; ?></td>
					<td><?php echo $valeur['disp_echeance']; ?></td>
					<td><?php echo $valeur['montant_facture'] . " €"; ?></td>
					
					<?php 
					if ($valeur['est_soldee']=="0") {
						echo '<td class="TCenter"><i class="glyphicon glyphicon-remove danger"></i></td>';
					}
					if ($valeur['est_soldee']=="1") {
						echo '<td class="TCenter"><i class="glyphicon glyphicon-time warning"></i>';
						if ($valeur['reste']) {
							echo " " . $valeur['reste'] . " €</td>";
						}
					}
					?>


					<?php 
						$type = "facture";
						echo '<td class="TCenter"><a href="./download.php?file='.$valeur['id_facture'].'&type='. $type .'" target="_blank"><i class="glyphicon glyphicon-download-alt info"></i></a>'; 
						$size = taille_fichier($valeur['lien']);
						echo  " <span style='font-size: 75%;'>(" . $size . ")</span></td>";
					?>

				</tr>
			<?php endforeach; ?>
			</tbody>
		</table>
		<a href='index.php' class="btn btn-xs btn-primary Fright">Retour a l'acceuil</a>
	</div>
</div>

<div class="clearfix">&nbsp;</div>
<div class="clearfix">&nbsp;</div>
<div class="clearfix">&nbsp;</div>