<!-- Notifications -->
	<div class="row resetrow">
		<div class="col-md-10 col-md-offset-1">
			<?php if($this->session->flashdata('success')): ?>
				<script type="text/javascript">
					var message = "<?php echo $this->session->flashdata('success')?>";
					$.notify({message: message},{type: 'success'});
				</script>
			<?php endif; ?>
			<?php if($this->session->flashdata('warning')): ?>
				<script type="text/javascript">
					var message = "<?php echo $this->session->flashdata('warning')?>";
					$.notify({message: message},{type: 'warning'});
				</script>
			<?php endif; ?>
			<?php if($this->session->flashdata('info')): ?>
				<script type="text/javascript">
					var message = "<?php echo $this->session->flashdata('info')?>";
					$.notify({message: message},{type: 'info'});
				</script>
			<?php endif; ?>
			<?php if($this->session->flashdata('danger')): ?>
				<script type="text/javascript">
					var message = "<?php echo $this->session->flashdata('danger')?>";
					$.notify({message: message},{type: 'danger'});
				</script>
			<?php endif; ?>
		</div>
	</div>

<!-- Fin Notifications -->
<div class="container">
	<!-- page de news -->
	<div class="row accessrow">
		<h3>Bienvenue <?php echo $username; ?></h3>
	</div>
	<div class="row" style="margin: 0 -30px ; padding: 0;">
		<!-- Debut contenu-->
		<div class="col-md-6">
			
			<?php
			if($user['group']=='admin'){
			?>
			<div class="adminBlock">
				<h4><a href="<?php echo site_url('news'); ?>" target="_blank" data-toggle="tooltip" data-placement="top" title="Apercu de la page"><i class="fa fa-eye fa-fw view" aria-hidden="true" ></i></a> Gestion des news <span class="badge"><?php echo $nb_news; ?></span></h4>
				<a href="<?php echo site_url('liste/news'); ?>" class="btn btn-perso btn-success" type="button"><i class="fa fa-list fa-fw" aria-hidden="true"></i>
					Liste des news
				</a>
				<a href="<?php echo site_url('add/news'); ?>" class="btn btn-perso btn-success" type="button"><i class="fa fa-plus fa-fw" aria-hidden="true"></i>
					Ajout rapide
				</a>
				<a href="<?php echo site_url('config/news'); ?>" class="btn btn-perso btn-danger " type="button"><i class="fa fa-cogs fa-fw" aria-hidden="true"></i>
					Parametres News
				</a>
			</div>
			<div class="adminBlock">
				<h4><a href="<?php echo site_url('bde'); ?>" target="_blank" data-toggle="tooltip" data-placement="top" title="Apercu de la page"><i class="fa fa-eye fa-fw view" aria-hidden="true" ></i></a> Gestion des news BDE <span class="badge"><?php echo $nb_news_bde; ?></span></h4>
				<a href="<?php echo site_url('liste/bde'); ?>" class="btn btn-perso btn-success" type="button"><i class="fa fa-list fa-fw" aria-hidden="true"></i>
					News du BDE
				</a>
				<a href="<?php echo site_url('add/bde'); ?>" class="btn btn-perso btn-success" type="button"><i class="fa fa-plus fa-fw" aria-hidden="true"></i>
					Ajout rapide
				</a>
				<a href="<?php echo site_url('config/bde'); ?>" class="btn btn-perso btn-danger" type="button"><i class="fa fa-cogs fa-fw" aria-hidden="true"></i>
					Parametres BDE
				</a>
			</div>
			<div class="adminBlock">
				<h4><a href="<?php echo site_url('photos'); ?>" target="_blank" data-toggle="tooltip" data-placement="top" title="Apercu de la page"><i class="fa fa-eye fa-fw view" aria-hidden="true" ></i></a> Gestion de l'album photos <span class="badge"><?php echo $nb_photos; ?></span></h4>
				<a href="<?php echo site_url('liste/album'); ?>" class="btn btn-perso btn-success" type="button"><i class="fa fa-list fa-fw" aria-hidden="true"></i>
					Liste des albums
				</a>
				<a href="<?php echo site_url('config/photos'); ?>" class="btn btn-perso btn-danger" type="button"><i class="fa fa-cogs fa-fw" aria-hidden="true"></i>
					Parametres de l'album
				</a>
			</div>
			<div class="adminBlock">
				<h4><a href="<?php echo site_url('meteo'); ?>" target="_blank" data-toggle="tooltip" data-placement="top" title="Apercu de la page"><i class="fa fa-eye fa-fw view" aria-hidden="true" ></i></a> Gestion de la météo</h4>
				<a href="<?php echo site_url('meteo_config'); ?>" class="btn btn-perso btn-danger disabled" type="button" disabled><i class="fa fa-cogs fa-fw" aria-hidden="true"></i>
					Paramétres météo <span class="label label-warning">soon</span>
				</a>
			</div>
		</div>
		<div class="col-md-6">
			<div class="adminBlock">
				<h4>Gestion des utilisateurs <span class="badge"><?php echo $nb_users; ?></span> <span class="badge badge-yellow">new</span></h4>
				<a href="<?php echo site_url('liste/user'); ?>" class="btn btn-perso btn-success" type="button"><i class="fa fa-list fa-fw" aria-hidden="true"></i>
					Liste des utilisateurs
				</a>
				<a href="<?php echo site_url('add/user'); ?>" class="btn btn-perso btn-success" type="button"><i class="fa fa-plus fa-fw" aria-hidden="true"></i>
					Ajouter un utilisateur 
				</a>
			</div>
			<div class="adminBlock">
				<h4>Gestion des écrans <span class="badge badge-danger">beta</span></h4>
				<a href="<?php echo site_url('liste/user'); ?>" class="btn btn-perso btn-success disabled" type="button"><i class="fa fa-list fa-fw" aria-hidden="true"></i>
					Liste des écrans <span class="label label-warning">soon</span>
				</a>
				<a href="<?php echo site_url('add/user'); ?>" class="btn btn-perso btn-success disabled" type="button"><i class="fa fa-plus fa-fw" aria-hidden="true"></i>
					Ajouter un écran <span class="label label-warning">soon</span>
				</a>
			</div>
			<div class="adminBlock">
				<h4>Gestion des anniversaires <span class="badge"><?php echo $nb_birthdays; ?></span> <span class="badge badge-danger">beta</span></h4>
				<a href="<?php echo site_url('liste/birthday'); ?>" class="btn btn-perso btn-success" type="button"><i class="fa fa-list fa-fw" aria-hidden="true"></i>
					Liste des anniversaires
				</a>
				<a href="<?php echo site_url('add/birthday'); ?>" class="btn btn-perso btn-success disabled" type="button"><i class="fa fa-plus fa-fw" aria-hidden="true"></i>
					Ajouter une entrée <span class="label label-warning">soon</span>
				</a>
			</div>
			<div class="adminBlock">
			<h4>Gestion du site</h4>
				<a href="<?php echo site_url('config'); ?>" class="btn btn-perso btn-danger" type="button"><i class="fa fa-cogs fa-fw" aria-hidden="true"></i>
					Paramétres
				</a>
				<a href="<?php echo site_url('changelog'); ?>" class="btn btn-perso btn-warning" type="button"><i class="fa fa-eye fa-fw" aria-hidden="true"></i>
					Changelog
				</a>
				<a href="<?php echo site_url('maintenance'); ?>" class="btn btn-perso btn-info" type="button" target="_blank"><i class="fa fa-eye fa-fw" aria-hidden="true"></i>
					Page de maintenance
				</a>
			</div>
			<?php }
				else if($user['group']=='bde'){ ?>
			<div class="adminBlock">
				<h4>Gestion des news <span class="badge"><?php echo $nb_news_bde; ?></span></h4>
				<a href="<?php echo site_url('liste/bde'); ?>" class="btn btn-perso btn-danger" type="button"><i class="fa fa-list fa-fw" aria-hidden="true"></i>
					News du BDE
				</a>
				<a href="<?php echo site_url('add/bde'); ?>" class="btn btn-perso btn-danger" type="button"><i class="fa fa-plus fa-fw" aria-hidden="true"></i>
					Ajout rapide
				</a>
				<a href="<?php echo site_url('config/bde'); ?>" class="btn btn-perso btn-success" type="button"><i class="fa fa-cogs fa-fw" aria-hidden="true"></i>
					Parametres BDE
				</a>
				<a href="<?php echo site_url('bde'); ?>" class="btn btn-perso btn-info" type="button" target="_blank"><i class="fa fa-eye fa-fw" aria-hidden="true"></i>
					Afficher BDE
				</a>
			</div>
				<?php } ?>
		</div>
	</div>
</div>

<!-- Pop up nouveautées -->
<div class="modal fade" id="update" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Nouveautés dans la version 2.2</h4>
      </div>
      <div class="modal-body">
	  	<ul class="add">
    		<li>Cliquez sur <i class="fa fa-eye fa-fw view" aria-hidden="true" ></i> pour avoir un apercu des pages</li>
			<li>Nouveau style du panel admin</li>
			<li>Navigation au fléches dans l'affichage des news</li>
			<li>Fonctionalité mot de passe oublié</li>
			<li>Ajout de la gestion des utilisateurs</li>
		</ul>
      </div>
      <div class="modal-footer">
        <a  class="btn btn-danger btn-perso" style="margin: 0;" data-dismiss="modal">Fermer</a>
        <a href="<?php echo site_url('maskUpdates'.'/'.$user['id']); ?>" class="btn btn-default btn-perso">Ne plus afficher</a>
      </div>
    </div>
  </div>
</div>

<script type="text/javascript">
<?php if($user['showUpdates']){
	echo "$('#update').modal('show');";
} ?>
</script>