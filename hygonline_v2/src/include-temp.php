<?php 
    $data = test_date_interv($_SESSION['user']['id_client']);
    $left = 0;
    $freq = frequence($_SESSION['user']['id_client']);


?>

<?php $notif_interv = get_interv($_SESSION['user']['id_client'], 0, 1); ?>
<?php foreach ($notif_interv as $indice => $interv) :?>
    
        
        <div style="margin-top: 20px; margin-bottom: 0; border-radius: 5px; box-shadow: 0 0 4px 2px rgba( 0, 0, 0, 0.2 );" class="alert alert-warning">

            <h2 class="panel-heading">
                <i class="glyphicon glyphicon-warning-sign"></i> 
                     Avis de passage :
            </h2>

            <div class="panel-body">
                <h4>la prochaine intervention aurra lieu dans <span style="font-weight: bold;"><?php echo $interv['days_left'];?> jours</span></h4>
                <p> et portera sur un(e) <span style="font-weight: bold;"> <?php echo $interv['objet_interv']; ?> </span></p>
                <p>en date du <span style="font-weight: bold;"> <?php echo $interv['disp_date']; ?> </span></p>


            </div>
        </div>


    
<?php endforeach; ?>




    <!-- _________________________________________________________ -->

<?php $count = count_retard($_SESSION['user']['id_client']); ?>
<?php $montant_total = 0; ?>    
<?php foreach ($count as $indice => $nmb_retard) :?>

    <?php if ($nmb_retard['nmb_retard'] > 1) :?>

        <div style="margin-top: 20px; margin-bottom: 0; border-radius: 5px; box-shadow: 0 0 4px 2px rgba( 0, 0, 0, 0.2 );" class="alert alert-danger">
            <h2 class="panel-heading">
                <i class="glyphicon glyphicon-warning-sign"></i> 
                     Vous avez des factures en retard:
            </h2>

            <div class="panel-body">
                <h4>vous avez <span style="font-weight: bold";> <?php echo $nmb_retard['nmb_retard']; ?> paiement(s) en retard </span> <a class="info" href="./index.php?page=impayer">(les afficher)</a></h4>
                <?php $retard = new_retard($_SESSION['user']['id_client']); ?>
                <?php foreach ($retard as $indice => $valeur) :?>
                    <?php 
                        if ($valeur['est_soldee'] == 1) {
                            $montant_total = $montant_total + $valeur['reste'];
                        }
                        else
                            $montant_total = $montant_total + $valeur['montant_facture'];
                    ?>
                <?php endforeach; ?>
                <h4>pour un montant total de: <span style="font-weight: bold;"> <?php echo $montant_total; ?> €</span></h4>
            </div>

        </div>

    <?php endif; ?>


<?php endforeach; ?>