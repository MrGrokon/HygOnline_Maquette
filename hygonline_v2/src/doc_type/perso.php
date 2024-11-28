
<?php $perso = get_CategPersoById($_GET['id']); ?>

<?php foreach ($perso as $indice => $categ) :?>

<div class="panel panel-default">

	<div class="panel-heading">
		<h1 class="Fleft"> <?php echo $categ['libelle']; ?> </h1>

		<div class="clearfix"></div>

		<?php if (isset($categ['html_header'])) :?>
			<p> <?php echo $categ['html_header']; ?> </p>
		<?php endif; ?>
	</div>

	<div class="panel-body">
		<table class="table table-striped table-hover tablesorter">
			<thead>
				<tr>
					<th>Date</th>
					<th>Libellé</th>
					<th>Objet</th>
					<th class="lien">Lien</th>
				</tr>
			</thead>

			<?php $f_perso = get_FichierPersoById($_GET['id']); ?>
			<?php foreach ($f_perso as $indice => $fichier) :?>

			<tbody>
				<tr>
					<td class="Tleft"> <?php echo $fichier['date_fichier']; ?> </td>
					<td class="Tleft"> <?php echo $fichier['nom_fichier']; ?> </td>
					<td class="Tleft"> <?php echo $fichier['objet_fichier']; ?> </td>
					<?php 
						$type = "perso";
						echo '<td class="Tcenter"><a href="./download.php?file='.$fichier['id_fichier'].'&type='. $type .'" target="_blank"><i class="glyphicon glyphicon-download-alt info"></i></a>'; 
						$size = taille_fichier($fichier['lien']);
						echo  " <span style='font-size: 75%;'>(" . $size . ")</span></td>";
					?>
				</tr>
			</tbody>

			<?php endforeach; ?>

		</table>

		<?php if (isset($categ['html_footer'])) :?>
			<p> <?php echo $categ['html_footer']; ?> </p>
		<?php endif; ?>
		
		<a href='index.php' class="btn btn-xs btn-primary Fright">Retour a l'acceuil</a>
	</div>

</div>

<?php endforeach; ?>
<div class="clearfix"></div>
<div class="clearfix"></div>
<div class="clearfix"></div>