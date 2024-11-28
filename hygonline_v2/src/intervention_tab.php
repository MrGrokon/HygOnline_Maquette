<div class="panel panel-default">
	<h2 class="panel-heading">Les 5 prochaines interventions</h2>
	
	<div style="padding: 10px;" class="panel-body">
		<table class="table table-striped table-hover">
			<thead>
				<tr>
					<th>Date</th>
					<th>Adresse</th>
					<th>Client</th>
					<th>Objet</th>
					<th>Applicateur</th>
				</tr>
			</thead>
			<tbody>

				<?php $data = get_interv($_SESSION['user']['id_client'], 0, 5); ?>
				<?php foreach ($data as $indice => $value) :?>
					<tr>
						<?php if($value['curr_disp_date'] == $value['disp_date']) :?>
							<td><?php echo "aujourd'huis"; ?></td>
						<?php else :?>
							<td><?php echo $value['disp_date']; ?></td>	
						<?php endif; ?>
						<td><?php echo $value['adresse_interv']; ?></td>
						<td><?php echo $value['nom_client']; ?></td>
						<td><?php echo $value['objet_interv']; ?></td>
						<td class="TCenter"><?php echo $value['applicateur_interv']; ?></td>
					</tr>
				<?php endforeach; ?>
			</tbody>
		</table>

	<div class="Fright">
		<a href="index.php?page=interventions" class="btn btn-xs btn-primary">Historique</a>
	</div>
	</div>
</div>