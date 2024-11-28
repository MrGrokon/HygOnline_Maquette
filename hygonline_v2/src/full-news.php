
<div class="col-md-12">
    <div class="panel panel-default" id="tab2">
        <h2 class="panel-heading">Informations:</h2>
        <div class="panel-body">
       
        <?php $full_new = get_news(); ?>
        <?php foreach ($full_new as $key => $value) :?>

             <h3><?php echo $value['titre']; ?></h3>
                        <img style="margin-bottom: 10px; margin-left: auto;" src="<?php echo $value['image']; ?>" >
                        <p> <?php echo $value['texte']; ?> </p>
                        <h4 class="Tright"><?php if($value['auteur']){echo "de: " . $value['auteur'] . ", ";} echo "le: " . $value['disp_date'];?></h4>


                    <?php endforeach; ?>

          <div class="clearfix">&nbsp;</div>
          </div>
    </div>
    <a href='index.php' class="btn btn-xs btn-primary Fright">Retour a l'acceuil</a>
    <div class="clearfix">&nbsp;</div>
    <div class="clearfix">&nbsp;</div>
    <div class="clearfix">&nbsp;</div>    
</div>
