<div class="panel panel-default">
	<div class="panel-heading">
		<h2>Fiches de Sécurité</h2>
	</div>

	<div style="padding: 10px;" class="panel-body">
		<table class="table table-striped table-hover tablesorter">
			<thead>
				<tr>
					<th>Produit</th>
					<th>Risque</th>
					<th class="lien">Lien</th>
				</tr>
			</thead>
			<tbody>
				<?php $fiches_utilisee = get_fiches($_SESSION['user']['id_client']); ?>
				<?php foreach ($fiches_utilisee as $indice => $fiche) :?>
					<tr>
						<td class="Tleft"> <?php echo $fiche['nom_produit']; ?> </td>
						<td class="Tcenter"> <?php echo $fiche['risque']; ?> </td>

						<td class="Tcenter"> 
							<?php 
								$type = "fiche";
								$size = taille_fichier($fiche['lien']);
								echo '<a href="./download.php?file='.$fiche['id_fiche'].'&type='. $type .'" target="_blank">' . '<i class="glyphicon glyphicon-download-alt info"></i>' . '</a> <span style="font-size: 75%;">(' . $size . ')</span>'; 
							?>
						</td>

					</tr>
				<?php endforeach; ?>
			</tbody>
		</table>
		<a href='index.php' class="btn btn-xs btn-primary Fright">Retour a l'acceuil</a>
	</div>
</div>