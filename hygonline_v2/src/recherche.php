
<form method="post" action="./index.php?page=recherche" style="margin: 0;">
	<input type="text" name="search" placeholder="Rechercher" 
		<?php	if(isset($_POST['search'])){echo ' value="' . $_POST['search'] .'"';}?> >
	<input type="submit" value="Recherche" class="btn btn-xs btn-primary">
</form>


<div class="panel panel-default">
	<div class="panel-heading">
		<h1>Resultats pour: <span style="font-size: 75%; font-weight:bold;"><?php echo $_POST['search']; ?> </span></h1>
	</div>
	<div style="padding: 10px;" class="panel-body">
		<table class="table table-striped table-hover tablesorter">
			<thead>
				<tr>
					<th>Libellé</th>
					<th>N°</th>
					<th class="lien">Lien</th>
				</tr>
			</thead>

			<tbody>
				<?php $fichier_recherche = getFichier('facture', $_SESSION['user']['id_client'], $_POST['search']); ?>
				<?php foreach ($fichier_recherche as $indice => $facture): ?>
					<tr>
						<td> <?php echo $facture['nom_facture']; ?> </td>
						<td> <?php echo $facture['numero_facture']; ?> </td>
						<td class="Tcenter"> 
							<?php 
								$type = "facture";
								$size = taille_fichier($facture['lien']);
								echo '<a href="./download.php?file='.$facture['id_facture'].'&type='. $type .'" target="_blank"><i class="glyphicon glyphicon-download-alt info"></i></a> <span style="font-size: 75%;">(' . $size . ')</span>'; 

							?> 
						</td>
					</tr>
				<?php endforeach ?>

				<?php $fichier_recherche = getFichier('devis', $_SESSION['user']['id_client'], $_POST['search']); ?>
				<?php foreach ($fichier_recherche as $indice => $devis): ?>
					<tr>
						<td> <?php echo $devis['nom_devis']; ?> </td>
						<td> <?php echo $devis['numero_devis']; ?> </td>
						<td class="Tcenter"> 
							<?php 
								$type = "devis";
								$size = taille_fichier($devis['lien']);
								echo '<a href="./download.php?file='.$devis['id_devis'].'&type='. $type .'" target="_blank"><i class="glyphicon glyphicon-download-alt info"></i></a> <span style="font-size: 75%;">(' . $size . ')</span>'; 

							?> 
						</td>
					</tr>
				<?php endforeach ?>

				<?php $fichier_recherche = getFichier('contrat', $_SESSION['user']['id_client'], $_POST['search']); ?>
				<?php foreach ($fichier_recherche as $indice => $contrat): ?>
					<tr>
						<td> <?php echo $contrat['nom_contrat']; ?> </td>
						<td> <?php echo $contrat['numero_contrat']; ?> </td>
						<td class="Tcenter"> 
							<?php 
								$type = "contrat";
								$size = taille_fichier($contrat['lien']);
								echo '<a href="./download.php?file='.$contrat['id_contrat'].'&type='. $type .'" target="_blank"><i class="glyphicon glyphicon-download-alt info"></i></a> <span style="font-size: 75%;">(' . $size . ')</span>'; 

							?> 
						</td>
					</tr>
				<?php endforeach ?>

				<?php $fichier_recherche = getFichier('bi', $_SESSION['user']['id_client'], $_POST['search']); ?>
				<?php foreach ($fichier_recherche as $indice => $bi): ?>
					<tr>
						<td> <?php echo $bi['nom_bi']; ?> </td>
						<td> <?php echo $bi['id_intervention']; ?> </td>
						<td class="Tcenter"> 
							<?php 
								$type = "bi";
								$size = taille_fichier($bi['lien_bi']);
								echo '<a href="./download.php?file='.$bi['id_intervention'].'&type='. $type .'" target="_blank"><i class="glyphicon glyphicon-download-alt info"></i></a> <span style="font-size: 75%;">(' . $size . ')</span>'; 

							?> 
						</td>
					</tr>
				<?php endforeach ?>

				<?php $fichier_recherche = getFichier('ri', $_SESSION['user']['id_client'], $_POST['search']); ?>
				<?php foreach ($fichier_recherche as $indice => $ri): ?>
					<tr>
						<td> <?php echo $ri['nom_ri']; ?> </td>
						<td> <?php echo $ri['id_intervention']; ?> </td>
						<td class="Tcenter"> 
							<?php 
								$type = "ri";
								$size = taille_fichier($ri['lien_ri']);
								echo '<a href="./download.php?file='.$ri['id_intervention'].'&type='. $type .'" target="_blank"><i class="glyphicon glyphicon-download-alt info"></i></a> <span style="font-size: 75%;">(' . $size . ')</span>'; 

							?> 
						</td>
					</tr>
				<?php endforeach ?>

				<?php $fichier_recherche = getFichier('perso', $_SESSION['user']['id_client'], $_POST['search']); ?>
				<?php foreach ($fichier_recherche as $indice => $perso): ?>
					<tr>
						<td> <?php echo $perso['nom_fichier']; ?> </td>
						<td> <?php echo $perso['id_fichier']; ?> </td>
						<td class="Tcenter"> 
							<?php 
								$type = "perso";
								$size = taille_fichier($perso['lien']);
								echo '<a href="./download.php?file='.$perso['id_fichier'].'&type='. $type .'" target="_blank"><i class="glyphicon glyphicon-download-alt info"></i></a> <span style="font-size: 75%;">(' . $size . ')</span>'; 

							?> 
						</td>
					</tr>
				<?php endforeach ?>

			</tbody>
		</table>
		<a href='index.php' class="btn btn-xs btn-primary Fright">Retour a l'acceuil</a>
	</div>
</div>
<div class="clearfix">&nbsp;</div>
<div class="clearfix">&nbsp;</div>
<div class="clearfix">&nbsp;</div>