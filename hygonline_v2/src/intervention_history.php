<div class="panel panel-default">
	<h2 class="panel-heading">Les interventions à venir</h2>
	<div class="panel-body">
		<table class="table table-striped table-hover">
			<thead>
				<tr>
					<th>Date</th>
					<th>Adresse</th>
					<th>Client</th>
					<th>Objet</th>
					<th>Applicateur</th>
					<th>Réalisée</th>
				</tr>
			</thead>
		<tbody>

			<?php $data = get_interv($_SESSION['user']['id_client'], 0, null); ?>
			<?php foreach ($data as $indice => $value) :?>
			
				<tr>
					<td> <?php echo $value['disp_date']; ?> </td>
					<td> <?php echo $value['adresse_interv']; ?> </td>
					<td> <?php echo $value['nom_client']; ?> </td>
					<td> <?php echo $value['objet_interv']; ?> </td>
					<td> <?php echo $value['applicateur_interv']; ?> </td>
					
					<td>
						<?php 
							if ($value['est_effectuee'] == 0) {
								echo '<i class="glyphicon glyphicon-remove danger"></i>';
							}
							else{
								echo '<i class="glyphicon glyphicon-ok success"></i>';
							}
						?>
					</td>

				</tr>
				
			<?php endforeach; ?>
		</tbody>
	</table>
	</div>
</div>

<div class="panel panel-default">
	<h2 class="panel-heading">Les interventions effectuées</h2>
	<div class="panel-body">
		<table class="table table-striped table-hover">
			<thead>
				<tr>
					<th>Date</th>
					<th>Adresse</th>
					<th>Client</th>
					<th>Objet</th>
					<th>Applicateur</th>
					<th>Réalisée</th>
				</tr>
			</thead>
		<tbody>

			<?php $data = get_interv($_SESSION['user']['id_client'], 1, null); ?>
			<?php foreach ($data as $indice => $value) :?>
				<tr>
					<td> <?php echo $value['disp_date']; ?> </td>
					<td> <?php echo $value['adresse_interv']; ?> </td>
					<td> <?php echo $value['nom_client']; ?> </td>
					<td> <?php echo $value['objet_interv']; ?> </td>
					<td> <?php echo $value['applicateur_interv']; ?> </td>
					
					<td>
						<?php 
							if ($value['est_effectuee'] == 0) {
								echo '<i class="glyphicon glyphicon-remove warning"></i>';
							}
							else{
								echo '<i class="glyphicon glyphicon-ok success"></i>';
							}
						?>
					</td>		
				</tr>
			<?php endforeach; ?>
		</tbody>
	</table>
	</div>
	<a href='index.php' class="btn btn-xs btn-primary Fright">Retour à l'acceuil</a>
</div>
<div class="clearfix">&nbsp;</div>
<div class="clearfix">&nbsp;</div>
<div class="clearfix">&nbsp;</div>