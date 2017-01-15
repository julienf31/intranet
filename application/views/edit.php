<div id="container" class="container">
	<div class="row">
		<div class="col-md-8 col-md-offset-2">
				<h3>Edition de " <?php echo $current_data['titre']; ?> " - <?php echo $item_type; ?></h2>
				<form method="post" action="<?php echo site_url('update/').$item_type.'/'.$current_data['id']; ?>" name="data_register">
				<div class="form-group">
					<label>Titre</label>
					<input type="text" class="form-control" name="titre" value="<?php echo $current_data['titre']; ?>" required>
					<input type="checkbox" name="afficher_titre" <?php if($current_data[ 'afficher_titre']=='1' ) { echo 'checked'; } ?> value="1"> Afficher le titre dans la news
				</div>
				<div class="form-group">
					<label>Options</label>
					<br/>
					<input type="checkbox" name="visible" <?php if($current_data[ 'visible']=='1' ) { echo 'checked'; } ?> value="1"  > Rendre cette news visible
					<br/>
				</div>
				<div class="form-group">
					<label><i class="fa fa-picture-o" aria-hidden="true"></i> Image de fond</label>
					<input type="file" id="image" name="image">
					<p class="help-block">Format .jpeg/.jpg/.gif/.png , La taille idéale doit être de 1920 x 1080 px</p>
				</div>
				<label>Contenu de la News</label>
				<textarea id="text" name="texte" class="form-control" rows="6" >
				<?php echo $current_data['texte']; ?>
				</textarea><br />
				<div class="pull-left">
				<a href="<?php echo  site_url('liste/').$item_type; ?>" type="button" class="btn btn-danger"><i class="fa fa-arrow-left fa-fw" aria-hidden="true"></i> Retour</a>
			</div>
				<div class="pull-right">
					<button type="submit" class="btn btn-success"><i class="fa fa-floppy-o" aria-hidden="true"></i> Enregistrer</button>
				</div>
				</form>
					<br>
					<br>
		</div>
	</div>

</div>