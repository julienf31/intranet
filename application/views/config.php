<div class="container">
	<div class="row">
		<div class="col-md-8 col-md-offset-2">
			<h3>Paramétres du site :</h3>
			<div class="panel">
				<div class="panel-heading">
					<h3 class="panel-title">Paramétres géneraux</h3>
				</div>
				<div class="panel-body">
					<div class="col-md-6 form-group">
						<label class="control-label" for="url">URL du site</label>
						<input type="text" class="form-control" id="url" aria-describedby="url" placeholder="http://localhost/" disabled="disabled">
						<span id="url" class="help-block">URL d'accés à la racine du site</span>
					</div>
					<div class="col-md-6 form-group">
						<label class="control-label" for="extension">Extension des fichiers</label>
						<input type="text" class="form-control" id="extension" aria-describedby="extension" placeholder=".html" disabled="disabled">
						<span id="extension" class="help-block">Extension des fichiers à afficher</span>
					</div>
					<div class="col-md-6 form-group">
						<label class="control-label" for="meteo">Météo</label>
						<input type="text" class="form-control" id="user_input_autocomplete_address" aria-describedby="meteo" placeholder="Toulouse" >
						<span id="meteo" class="help-block">Nom de la ville pour la météo</span>
					</div>
				</div>
			</div>
			<div class="panel">
				<div class="panel-heading">
					<h3 class="panel-title">Paramétres des News</h3>
				</div>
				<div class="panel-body">
					<div class="col-md-6 form-group">
						<label class="control-label" for="url">Durée d'affichage</label>
						<div class="input-group">
							<input type="text" class="form-control" id="affichage" aria-describedby="affichage" placeholder="4000" disabled="disabled">
							<div class="input-group-addon">ms</div>
						</div>
						<span id="url" class="help-block">Temps d'affichages des news en ms</span>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>