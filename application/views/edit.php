<div id="container" class="container">
	<div class="row">
		<div class="col-md-8 col-md-offset-2">
		<?php if($item_type == 'news' || $item_type == 'bde'): ?>
				<h3>Edition de " <?php echo $current_data['titre']; ?> " - <?php echo $item_type; ?></h2>
				<form method="post" action="<?php echo site_url('update/').$item_type.'/'.$current_data['id'].'/'.$current_data['text_type']; ?>" name="data_register" enctype="multipart/form-data">
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

				<?php if($current_data['text_type'] == 'TEXT'): ?>
				<div class="form-group">
					<label><i class="fa fa-picture-o" aria-hidden="true"></i> Image de fond</label>
					<input type="file" id="imageedit" name="imageedit">
					<input type="text" id="imagesave" name="imagesave" value="<?php echo $current_data['image'] ?>" class="hidden">
					<p class="help-block">Format .jpeg/.jpg/.gif/.png , La taille idéale doit être de 1920 x 1080 px</p>
				</div>
				<label>Contenu de la News</label>
				<textarea id="text" name="texte" class="form-control" rows="6" >
				<?php echo $current_data['texte']; ?>
				</textarea>
				<?php endif; ?>

				<?php if($current_data['text_type'] == 'JSON'): ?>
				<div class="form-group">
					<label><i class="fa fa-camera" aria-hidden="true"></i> Video</label>
					<input type="text" class="form-control" name="video_url" value="<?php echo $current_data['texte'] ?>"></input>
					<em>Inserer le lien Youtube de la video</em>
				</div>
				<?php endif; ?>
				<br />

				<div class="pull-left">
				<a href="<?php echo  site_url('liste/').$item_type; ?>" type="button" class="btn btn-danger"><i class="fa fa-arrow-left fa-fw" aria-hidden="true"></i> Retour</a>
			</div>
				<div class="pull-right">
					<button type="submit" class="btn btn-success" name="send-btn"><i class="fa fa-floppy-o" aria-hidden="true"></i> Enregistrer</button>
				</div>
				<div class="pull-right" style="margin-right:5px;">
					<button type="submit" name="preview-btn" class="btn btn-info" formtarget="_blank"><i class="fa fa-eye fa-fw" aria-hidden="true"></i> Apercu</a>
				</div>
				</form>
					<br>
					<br>
		<?php elseif($item_type == 'album'): ?>
		<h3>Editer l'album - <?php echo $current_data['name']; ?></h3>
			<br>
			<form method="post" action="<?php echo site_url('update/').$item_type.'/'.$current_data['id'].'/0'; ?>" name="data_register" enctype="multipart/form-data">
			
				<div class="form-group">
					<label>Titre de l'album</label>
					<input type="text" class="form-control" name="name" value="<?php echo $current_data['name']; ?>" required>
				</div>
			<div id="news_fields">
				<div class="form-group">
					<label><i class="fa fa-picture-o" aria-hidden="true"></i> Image de l'album</label>
					<input type="file" id="imageup" name="imageup">
					<p class="help-block">Format .jpeg/.jpg/.gif/.png , La taille idéale doit être de 1920 x 1080 px</p>
				</div>
				<label>Description de l'album</label>
				<textarea class="form-control" name="desc"><?php echo $current_data['desc']; ?></textarea>
			</div>
				<br />
				<div class="pull-left">
					<a href="<?php echo  site_url('liste/').$item_type; ?>" type="button" class="btn btn-danger"><i class="fa fa-arrow-left fa-fw" aria-hidden="true"></i> Retour</a>
				</div>
				<div class="pull-right">
					<button type="submit" class="btn btn-success" name="send-btn" value="Send" id="submit"><i class="fa fa-floppy-o" aria-hidden="true"></i> Enregistrer</button>
				</div>
			</form>
		<?php endif; ?>
		</div>
	</div>

</div>