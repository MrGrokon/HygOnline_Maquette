
<div class="panel panel-default">
	<div class="panel-heading">
		<h2>Fiches de Sécurité associées:</h2>
	</div>
	<div style="padding: 10px;" class="panel-body">
		<table class="table table-striped table-hover tablesorter">
			<thead>
				<tr>
					<th>Produit</th>
					<th>Quantitée utilisée</th>
					<th>Risque</th>
					<th class="lien">Lien</th>
				</tr>
			</thead>
			<tbody>
				<?php $produit = get_ficheProduit($_GET['id']); ?>
				<?php foreach ($produit as $indice => $fiche) :?>
					<tr>
						
					<td class="Tleft"> <?php echo $fiche['nom_produit']; ?> </td>
					<td class="Tcenter"> <?php echo $fiche['quantitee_utilisee']; ?> </td>
					<td class="Tcenter"> <?php echo $fiche['risque']; ?> </td>

					<td class="Tcenter"> 
					<?php 
						$type = "fiche";
						$size = taille_fichier($fiche['lien']);
						echo '<a href="./download.php?file='.$fiche['id_fiche'].'&type='. $type .'" target="_blank"><i class="glyphicon glyphicon-download-alt info"></i></a> <span style="font-size: 75%;">(' . $size . ')</span>'; 

					?> 
					</td>

					</tr>
				<?php endforeach; ?>
			</tbody>
		</table>

		<a href='index.php' class="btn btn-xs btn-primary Fright">Retour a l'acceuil</a>
		<a href='index.php?page=fichier&categ=interv' class="btn btn-xs btn-primary Fright" style="margin-right: 10px;">Retour aux interventions</a>

	</div>
</div>