<meta charset="utf-8">
<title>HygOnline</title>

 <meta name="viewport" content="width=device-width, initial-scale=1"><meta name="description" content="Espace reservé à la clientèle HygOnline. Veuillez vous identifiez pour accéder a votre espace clients.">
<!--<meta name="author" content="DEFI Informatique">
<meta name="viewport" content="width=device-width"> -->
<link rel="icon" type="image/x-icon" href="/favicon.ico">

<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
<link rel="stylesheet" href="<?php echo ASSETS_URL; ?>/css/material.min.css">
<link rel="stylesheet" href="<?php echo ASSETS_URL; ?>/css/roboto.min.css">
<link rel="stylesheet" href="<?php echo ASSETS_URL; ?>/css/styles.css">
<link rel="stylesheet" href="<?php echo ASSETS_URL; ?>/plugins/tablesorter/themes/theme.bootstrap_3.css">

<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script type="text/javascript" src="<?php echo ASSETS_URL; ?>/plugins/tablesorter/jquery.tablesorter.min.js"></script>
<script type="text/javascript" src="<?php echo ASSETS_URL; ?>/plugins/tablesorter/jquery.tablesorter.widgets.min.js"></script>


<script>
$(function() {

		$(".tablesorter").tablesorter({
			widgets : [ "uitheme" ],
			theme : "bootstrap",
			headerTemplate : '{content} {icon}',
			dateFormat : "ddmmyyyy",
			headers:{
				'.lien': {
					sorter: false
				}
			}
		});
});	
</script>