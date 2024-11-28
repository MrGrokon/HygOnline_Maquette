    <div class="panel panel-default" id="tab2">
            
        <h2 class="panel-heading">Informations:</h2>
            
        <div class="panel-body">
               
            <?php $new = get_news(1); ?>

            <?php foreach ($new as $indice => $display) :?>
                
                <h3 style="margin-top: 0;"><?php echo $display['titre']; ?></h3>
                <img style="margin-bottom: 10px;" src="<?php echo $display['image']; ?>" >
                <p> 
                    <?php
                        $tst = explode(" ", $display['texte']);
                        for ($i=0; $i < 35; $i++) {                            
                            echo $tst[$i] . " "; 
                        } 
                        echo "..."; 
                    ?> 
                </p>
                
                <h4 class="Tright"><?php echo $display['auteur']; ?></h4>

            <?php endforeach; ?>

            <a href="./index.php?page=info" class="btn btn-xs btn-primary Fright" role="button">Lire la suite...</a>
                    
            <div class="clearfix">&nbsp;</div>

        </div>
        
    </div>

