
<?php /* ?>	
		<div class="panel panel-default" id="tab1">
			
			<div class="panel-heading">
				<h2>Votre dernier contrat</h2>
				<?php 
					$lastContrat = getLastContrat($_SESSION['user']['id_client']);
					foreach ($lastContrat as $indice => $contrat) :?>
						<h4 class="Fleft"> <?php echo $contrat['nom_contrat'] . " - n°" . $contrat['numero_contrat']; ?> </h4>
						<h5 class="Fright"> <?php echo $contrat['objet_contrat']; ?> </h5>
					

				<div class="clearfix"></div>
			</div>

			<div style="padding: 10px;" class="panel-body">
				<table class="table table-striped table-hover tablesorter">
					<thead>
						<tr>
							<th>Libellé</th>
							<th class="lien">Lien</th>
						</tr>
					</thead>
					<tbody>

						<?php $lastFacture = getFacture($_SESSION['user']['id_client'], $contrat['id_contrat']); ?>
						<?php foreach ($lastFacture as $indice => $facture) :?>
							<tr>
								<td> <?php echo $facture['nom_facture']; ?> </td>
								<td> <?php echo $facture['lien_facture']; ?> </td>
							</tr>
						<?php endforeach; ?>

						<?php $lastDevis = getDevis($_SESSION['user']['id_client'], $contrat['id_contrat']); ?>
						<?php foreach ($lastDevis as $indice => $devis) :?>
							<tr>
								<td> <?php echo $devis['nom_devis']; ?> </td>
								<td> <?php echo $devis['lien_devis']; ?> </td>
							</tr>
						<?php endforeach; ?>

						<?php $lastPlan = getPlan($_SESSION['user']['id_client'], $contrat['id_contrat']); ?>
						<?php foreach ($lastPlan as $indice => $Plan) :?>
							<tr>
								<td> <?php echo $Plan['nom_plan']; ?> </td>
								<td> <?php echo $Plan['lien_plan']; ?> </td>
							</tr>
						<?php endforeach; ?>

						<?php $lastBI = getBI($_SESSION['user']['id_client'], $contrat['id_contrat']); ?>
						<?php foreach ($lastBI as $indice => $BI) :?>
							<tr>
								<td> <?php echo $BI['nom_bi']; ?> </td>
								<td> <?php echo $BI['lien_bi']; ?> </td>
							</tr>
						<?php endforeach; ?>

						<?php $lastRI = getRI($_SESSION['user']['id_client'], $contrat['id_contrat']); ?>
						<?php foreach ($lastRI as $indice => $RI) :?>
							<tr>
								<td> <?php echo $RI['nom_ri']; ?> </td>
								<td> <?php echo $RI['lien_ri']; ?> </td>
							</tr>
						<?php endforeach; ?>
					</tbody>
				</table>		
			</div>
			<?php endforeach; ?>
		</div>
<?php */ ?>