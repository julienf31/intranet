<div id="container" class="container">
	<div class="row">
		<div class="col-md-8 col-md-offset-2">
		<?php if($item_type == 'news' || $item_type == 'bde'): ?>
			<h3>Créer un article - <?php echo $item_type; ?> </h3>
			<br>
			<form method="post" action="<?php echo site_url('insert/').$item_type; ?>" name="data_register" enctype="multipart/form-data">
			
				<div class="form-group">
					<label>Titre</label>
					<input type="text" class="form-control" name="titre" required>
					<input id="check_afficher_titre" type="checkbox" name="afficher_titre" checked value="1"> Afficher le titre dans la news
				</div>
				<div class="form-group">
					<label style="display:block;">Options</label>
					<p style="display:inline-block;margin-right:10px;">Type d'article</p>
					<select class="form-control" name="type_select" id="type_select" style="width: 12%;display:inline-block;">
						<option value="News">News</option>
						<option value="Video">Video</option>
					</select>
					<br/>
					<br/>
					<input type="checkbox" name="visible" checked value="1"> Rendre cette news visible
					<br/>
				</div>
			<div id="news_fields">
				<div class="form-group">
					<label><i class="fa fa-picture-o" aria-hidden="true"></i> Image de fond</label>
					<input type="file" id="imageup" name="imageup">
					<p class="help-block">Format .jpeg/.jpg/.gif/.png , La taille idéale doit être de 1920 x 1080 px</p>
				</div>
				<label>Contenu de la news</label>
				<textarea id="text" class="form-control" name="texte"></textarea>
			</div>
			<div id="video_fields" class="hidden">
				<div class="form-group">
					<label><i class="fa fa-camera" aria-hidden="true"></i> Video</label>
					<input type="text" class="form-control" name="video_url">
					<em>Inserer le lien Youtube de la video</em>
				</div>
			</div>
				<br />
				<div class="pull-left">
					<a href="<?php echo  site_url('liste/').$item_type; ?>" type="button" class="btn btn-perso btn-danger"><i class="fa fa-arrow-left fa-fw" aria-hidden="true"></i> Retour</a>
				</div>
				<div class="pull-right">
					<button type="submit" class="btn btn-perso btn-success" name="send-btn" value="Send" id="submit"><i class="fa fa-floppy-o" aria-hidden="true"></i> Enregistrer</button>
				</div>
				<div class="pull-right" style="margin-right:5px;">
					<button type="submit" name="preview-btn" class="btn btn-perso btn-info" formtarget="_blank"><i class="fa fa-eye fa-fw" aria-hidden="true"></i> Apercu</a>
				</div>
			</form>
			<?php elseif($item_type == 'album'): ?>
				<h3>Créer un album </h3>
			<br>
			<form method="post" action="<?php echo site_url('insert/').$item_type; ?>" name="data_register" enctype="multipart/form-data">
			
				<div class="form-group">
					<label>Titre de l'album</label>
					<input type="text" class="form-control" name="name" required>
				</div>
			<div id="news_fields">
				<div class="form-group">
					<label><i class="fa fa-picture-o" aria-hidden="true"></i> Image de l'album</label>
					<input type="file" id="imageup" name="imageup">
					<p class="help-block">Format .jpeg/.jpg/.gif/.png , La taille idéale doit être de 1920 x 1080 px</p>
				</div>
				<label>Description de l'album</label>
				<textarea class="form-control" name="desc"></textarea>
			</div>
				<br />
				<div class="pull-left">
					<a href="<?php echo  site_url('liste/').$item_type; ?>" type="button" class="btn btn-danger"><i class="fa fa-arrow-left fa-fw" aria-hidden="true"></i> Retour</a>
				</div>
				<div class="pull-right">
					<button type="submit" class="btn btn-success" name="send-btn" value="Send" id="submit"><i class="fa fa-floppy-o" aria-hidden="true"></i> Enregistrer</button>
				</div>
			</form>
			<?php elseif($item_type == 'photos'): ?>
			<h3>Ajouter une photo à l'album : <?php echo $content_album['name']; ?></h3>
			<form method="post" action="<?php echo site_url('insert/').$item_type.'/'.$content_album['id']; ?>" name="data_register" enctype="multipart/form-data">
				<div class="form-group">
					<label>Nom</label>
					<input type="text" class="form-control" name="nom" required>
				</div>
				<div class="form-group">
					<label style="display:block;">Options</label>
					<input type="checkbox" name="visible" checked value="1"> Afficher la photo
					<br/>
					<p style="display:inline-block;margin-right:10px;">Type d'image</p>
					<select class="form-control" name="img_select" id="img_select" style="width: 12%;display:inline-block;">
						<option value="upload">Upload</option>
						<option value="url">Lien</option>
					</select>
				</div>
			<div id="upload_fields" class="">
				<div class="form-group">
					<label><i class="fa fa-picture-o" aria-hidden="true"></i> Image</label>
					<input type="file" id="imageup" name="imageup">
					<p class="help-block">Format .jpeg/.jpg/.gif/.png , La taille idéale doit être de 1920 x 1080 px</p>
				</div>
			</div>
			<div id="url_fields" class="hidden">
				<div class="form-group">
					<label><i class="fa fa-picture-o" aria-hidden="true"></i> Image</label>
					<input type="text" class="form-control" name="image_url">
					<em>Inserer le lien de l'image</em>
				</div>
			</div>
				<br />
				<div class="pull-left">
					<a href="<?php echo  site_url('liste/').$item_type.'/'.$content_album['id']; ?>" type="button" class="btn btn-perso btn-danger"><i class="fa fa-arrow-left fa-fw" aria-hidden="true"></i> Retour</a>
				</div>
				<div class="pull-right">
					<button type="submit" class="btn btn-perso btn-success" name="send-btn" value="Send" id="submit"><i class="fa fa-floppy-o" aria-hidden="true"></i> Enregistrer</button>
				</div>
				<div class="pull-right" style="margin-right:5px;">
					<button type="submit" name="preview-btn" class="btn btn-perso btn-info" formtarget="_blank"><i class="fa fa-eye fa-fw" aria-hidden="true"></i> Apercu</a>
				</div>
			</form>
			<?php elseif($item_type == 'user'): ?>
			<h3>Ajouter un utilisateur</h3>
			<br>
			<form method="post" action="<?php echo site_url('insert/').$item_type; ?>" name="data_register" enctype="multipart/form-data">
			
				<div class="form-group">
					<label>Username</label>
					<input type="text" class="form-control" name="username" style="width: 50%;" required>
				</div>
				<div class="form-group">
					<label style="display:block;">Groupe</label>
					<select class="form-control" name="group" style="width: 12%;display:inline-block;">
						<?php foreach ($groups as $key => $group): ?>
						<option value="<?php echo $group['name']; ?>"><?php echo $group['name']; ?></option>
						<?php endforeach; ?>
					</select>
					<br/>
					<br/>
					<input type="checkbox" name="active" checked value="1"> Activer ce compte
					<br/>
				</div>
				<div class="form-group">
					<label>Mail</label>
					<input type="mail" class="form-control" name="mail" style="width: 60%;" required>
				</div>

				<div class="form-group">
					<label>Password</label>
					<input type="password" class="form-control" name="password" style="width: 50%;" required><br />
					<input type="password" class="form-control" name="password-confirm" style="width: 50%;" required>
				</div>
			
				<br />
				<div class="pull-left">
					<a href="<?php echo  site_url('liste/').$item_type; ?>" type="button" class="btn btn-perso btn-danger"><i class="fa fa-arrow-left fa-fw" aria-hidden="true"></i> Retour</a>
				</div>
				<div class="pull-right">
					<button type="submit" class="btn btn-perso btn-success" name="send-btn" value="Send" id="submit"><i class="fa fa-floppy-o" aria-hidden="true"></i> Enregistrer</button>
				</div>
			</form>
			<?php endif; ?>
		</div>
	</div>
</div>
<script>

$('#type_select').on('change', function() {
  if (this.value == "Video") {
$('#news_fields').addClass('hidden');
$('#video_fields').removeClass('hidden');
  };
  if (this.value == "News") {
$('#video_fields').addClass('hidden');
$('#news_fields').removeClass('hidden');
  };
})

$('#img_select').on('change', function() {
  if (this.value == "url") {
$('#upload_fields').addClass('hidden');
$('#url_fields').removeClass('hidden');
  };
  if (this.value == "upload") {
$('#url_fields').addClass('hidden');
$('#upload_fields').removeClass('hidden');
  };
})

</script>