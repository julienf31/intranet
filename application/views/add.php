<div id="container" class="container">
	<div class="row">
		<div class="col-md-8 col-md-offset-2">
			<h3>Créer un article - <?php echo $item_type; ?> </h3>
			<br>
			<form method="post" action="<?php echo site_url('insert/').$item_type; ?>" name="data_register" enctype="multipart/form-data">
			
				<div class="form-group">
					<label>Titre</label>
					<input type="text" class="form-control" name="titre" required>
					<input id="check_afficher_titre" type="checkbox" name="afficher_titre" checked value="1"> Afficher le titre dans la news
				</div>
				<div class="form-group">
					<label>Options</label>
					<br/>
					<input type="checkbox" name="visible" checked value="1"> Rendre cette news visible
					<br/>
				</div>
				<div class="form-group">
					<label><i class="fa fa-picture-o" aria-hidden="true"></i> Image de fond</label>
					<input type="file" id="imageup" name="imageup">
					<p class="help-block">Format .jpeg/.jpg/.gif/.png , La taille idéale doit être de 1920 x 1080 px</p>
				</div>
				<label>Contenu de la news</label>
				<textarea id="text" class="form-control" name="texte"></textarea>
				<br />
				<div class="pull-left">
					<a href="<?php echo  site_url('liste/').$item_type; ?>" type="button" class="btn btn-danger"><i class="fa fa-arrow-left fa-fw" aria-hidden="true"></i> Retour</a>
				</div>
				<div class="pull-right">
					<button type="submit" class="btn btn-success" value="Send" id="submit"><i class="fa fa-floppy-o" aria-hidden="true"></i> Enregistrer</button>
				</div>
			</form>
		</div>
	</div>
</div>