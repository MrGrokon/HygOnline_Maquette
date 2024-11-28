<div class="col-md-7">
	<div class="panel panel-default" id="tab2">
		<h2 class="panel-heading">Contactez-nous:</h2>
		
		<form action="./index.php?page=maintenance" method="get" id="contact" class="panel-body">
			
			<div class="form-group">
				<select class="form-control">
					<option value="">Secrétariat</option>
					<option value="">Direction</option>
					<option value="">Comptabilité</option>
				</select>
			</div>


			<div class="form-group">
				<input type="text" class="form-control" name="nom" placeholder=" Nom Prénom" >
			</div>

			<div class="form-group">
				<input type="text" class="form-control" name="mail" placeholder="...@..." >
			</div>

			<div class="form-group">
				<input type="text" class="form-control" name="tel" placeholder="n° de Téléphone">
			</div>

			<div class="form-group">
				<input type="text" name="adress" placeholder="Adresse" class="form-control">	
			</div>

			<div class="row">
				<div class="form-group col-md-3">
					<input type="text" name="cp" placeholder="Code Postal" class="form-control">	
				</div>

				<div class="form-group col-md-9">
					<input type="text" name="ville" placeholder="Ville" class="form-control">
				</div>
			</div>
			
			<div class="form-group">
				<textarea class="form-control" rows="5" placeholder="Message"></textarea>
			</div>

			<button type="Submit" class="btn btn-success"><i class="glyphicon glyphicon-send"></i>&nbsp;&nbsp;Envoyer</button>	
		</form>
	</div>
</div>

<div class="col-md-5">

	<div class="headline"><h2>Contacts</h2></div>
	
		<ul class="list-unstyled margin-bottom-30">
			<li class="margin-bottom-15">
				<i class="fa fa-home"></i> 
				[[structure_adresse]], [[structure_cp]] [[structure_ville]]
			</li>
			
			<li class="margin-bottom-15">
				<a href="mailto:[[structure_mail]]"><i class="fa fa-envelope"></i> [[structure_mail]]</a>
			</li>

			<li class="margin-bottom-15">
				<a href="tel:0383901000"><i class="fa fa-phone"></i> [[structure_Telephone]]</a>
			</li>
		</ul>

	<div class="headline"><h2>Horaires</h2></div>
		<ul class="list-unstyled margin-bottom-30">
			<li>
				<strong>[[structure_jour]]</strong>
			</li>
			
			<li>
				[[structure_horaires]]
			</li>
		</ul>

</div>