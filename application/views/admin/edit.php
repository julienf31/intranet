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
				<a href="<?php echo  site_url('liste/').$item_type; ?>" type="button" class="btn btn-perso btn-danger"><i class="fa fa-arrow-left fa-fw" aria-hidden="true"></i> Retour</a>
			</div>
				<div class="pull-right">
					<button type="submit" class="btn btn-perso btn-success" name="send-btn"><i class="fa fa-floppy-o" aria-hidden="true"></i> Enregistrer</button>
				</div>
				<div class="pull-right" style="margin-right:5px;">
					<button type="submit" name="preview-btn" class="btn btn-perso btn-info" formtarget="_blank"><i class="fa fa-eye fa-fw" aria-hidden="true"></i> Apercu</a>
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
					<a href="<?php echo  site_url('liste/').$item_type; ?>" type="button" class="btn btn-perso btn-danger"><i class="fa fa-arrow-left fa-fw" aria-hidden="true"></i> Retour</a>
				</div>
				<div class="pull-right">
					<button type="submit" class="btn btn-perso btn-success" name="send-btn" value="Send" id="submit"><i class="fa fa-floppy-o" aria-hidden="true"></i> Enregistrer</button>
				</div>
			</form>
			<?php elseif($item_type == 'user'): ?>
			<h3>Editer l'utilisateur - <?php echo $current_data['username']; ?></h3>
			<br>
			<form method="post" action="<?php echo site_url('update/').$item_type.'/'.$current_data['id']; ?>" name="data_register" enctype="multipart/form-data">
			
				<div class="form-group">
					<label>Username</label>
					<input type="text" class="form-control" name="username" style="width: 50%;"  value="<?php echo $current_data['username']; ?>" required>
				</div>
				<div class="form-group">
					<label style="display:block;">Groupe</label>
					<select class="form-control" name="group" style="width: 12%;display:inline-block;">
						<?php foreach ($groups as $key => $group): ?>
						<option value="<?php echo $group['name']; ?>" <?php if( $current_data['group'] == $group['name']){ echo 'selected';} ?>><?php echo $group['name']; ?></option>
						<?php endforeach; ?>
					</select>
					<br/>
					<br/>
					<input type="checkbox" name="active" <?php if( $current_data['active'] == true){ echo 'checked';} ?> value="1"> Activer ce compte
					<br/>
				</div>
				<div class="form-group">
					<label>Mail</label>
					<input type="mail" class="form-control" name="mail" style="width: 60%;" value="<?php echo $current_data['mail']; ?>" required>
				</div>
			
				<br />
				<div class="pull-left">
					<a href="<?php echo  site_url('liste/').$item_type; ?>" type="button" class="btn btn-perso btn-danger"><i class="fa fa-arrow-left fa-fw" aria-hidden="true"></i> Retour</a>
				</div>
				<div class="pull-right">
					<button type="submit" class="btn btn-perso btn-success" name="send-btn" value="Send" id="submit"><i class="fa fa-floppy-o" aria-hidden="true"></i> Enregistrer</button>
				</div>
			</form>
			<?php elseif($item_type == 'birthday'): ?>
			<h3>Editer l'anniversaire - <?php echo $current_data['Nom'].' '.$current_data['Prénom'];  ?></h3>
			<br>
			<form method="post" action="<?php echo site_url('update/').$item_type.'/'.$current_data['id']; ?>" name="data_register" enctype="multipart/form-data">
			
				<div class="form-group">
					<label>Prénom</label>
					<input type="text" class="form-control" name="surname" style="width: 50%;"  value="<?php echo $current_data['Prénom']; ?>" required>
					<label>Nom</label>
					<input type="text" class="form-control" name="name" style="width: 50%;"  value="<?php echo $current_data['Nom']; ?>" required>

				</div>
				<div class="form-group">
					<label style="display:block;">Groupe</label>
					<select class="form-control" name="group" style="display:inline-block;">
						<?php foreach ($groups as $key => $group): ?>
						<option value="<?php echo $group['group_name']; ?>" <?php if( $current_data['group'] == $group['group_name']){ echo 'selected';} ?>><?php echo $group['group_name']; ?></option>
						<?php endforeach; ?>
					</select>
					<br/>
					<br/>
				</div>
				<div class="form-group">
					<label>Naissance</label>
					<input type="mail" class="form-control" name="birthdate" style="width: 60%;" value="<?php echo $current_data['date']; ?>" required>
				</div>
			
				<br />
				<div class="pull-left">
					<a href="<?php echo  site_url('liste/').$item_type; ?>" type="button" class="btn btn-perso btn-danger"><i class="fa fa-arrow-left fa-fw" aria-hidden="true"></i> Retour</a>
				</div>
				<div class="pull-right">
					<button type="submit" class="btn btn-perso btn-success" name="send-btn" value="Send" id="submit"><i class="fa fa-floppy-o" aria-hidden="true"></i> Enregistrer</button>
				</div>
			</form>
			<?php elseif($item_type == 'screens'): ?>
			<h3>Editer l'écran - <?php echo $current_data['description'];  ?></h3>
			<br>
			<form method="post" action="<?php echo site_url('update/').$item_type.'/'.$current_data['id']; ?>" name="data_register" enctype="multipart/form-data">
			
				<div class="form-group">
					<label>Nom de l'écran</label>
					<input type="text" class="form-control" name="name" style="width: 50%;"  value="<?php echo $current_data['description']; ?>" required>
				</div>
				<div class="form-group">
					<label style="display:block;">Type</label>
					<select class="form-control" name="group" style="display:inline-block;" disabled>
						<option value="<?php echo $current_data['item_type']; ?>"><?php echo $current_data['item_type']; ?></option>
					</select>
					<br/>
					<br/>
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