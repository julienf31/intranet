<div class="container">
	<div class="row">
		<div class="col-md-8 col-md-offset-2">
			<h3>Paramétres de l'ecran <?php echo $item_type; ?></h3>
			<form method="post" action="<?php echo site_url('update/config_tv/').$item_type; ?>" name="data_register">
			<div class="panel">
				<div class="panel-heading">
					<h3 class="panel-title">Paramétres géneraux</h3>
				</div>
<!-- 				<div class="panel-body">
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
				</div> -->
			</div>
			<div class="panel">
				<div class="panel-heading">
					<h3 class="panel-title">Paramétres d'affichage</h3>
				</div>
				<div class="panel-body">
					<div class="col-md-6 form-group">
						<label class="control-label" for="url">Durée d'affichage</label>
						<div class="input-group">
							<input type="text" class="form-control" name="tps_affichage" placeholder="<?php echo $current_config['tps_affichage'];?>">
							<div class="input-group-addon">ms</div>
						</div>
						<span id="url" class="help-block">Temps d'affichages des news en ms</span>
					</div>
				</div>
			</div>
					<div class="row">
					<div class="pull-left">
						<a href="<?php echo  site_url('admin'); ?>" type="button" class="btn btn-danger"><i class="fa fa-arrow-left fa-fw" aria-hidden="true"></i> Retour</a>
					</div>
					<div class="pull-right">
					<button type="submit" class="btn btn-success" value="Send" id="submit"><i class="fa fa-floppy-o" aria-hidden="true"></i> Enregistrer</button>
				</div>

				</div>
			</form>	
		</div>
	</div>
</div>