<?php
    $query = $this->db->query('select id from news');
    $nb_news = $query->num_rows();
	$query = $this->db->query('select id from news_bde');
	$nb_news_bde = $query->num_rows();
	$query = $this->db->query('select id from photos');
	$nb_photos = $query->num_rows();

?>
<div class="container">
	<!-- page de news -->
	<div class="row">
		<!-- Debut contenu-->
		<div class="col-md-10 col-md-offset-2">
			<h3>Bienvenue <?php echo $username; ?></h3>
			<?php
			if($user['group']=='admin'){
			?>
			<h4>Gestion des news <span class="badge"><?php echo $nb_news; ?></span></h4>
			<!-- Pour tous les URL, masquer au plus les noms de tes controlers/fonctions, pour cela, configurer des routes -->
			<a href="<?php echo site_url('liste/news'); ?>" class="btn btn-perso btn-success" type="button"><i class="fa fa-list fa-fw" aria-hidden="true"></i>
				Liste des news
			</a>
			<a href="<?php echo site_url('add/news'); ?>" class="btn btn-perso btn-success" type="button"><i class="fa fa-plus fa-fw" aria-hidden="true"></i>
				Ajout rapide
			</a>
			<a href="<?php echo site_url('config/news'); ?>" class="btn btn-perso btn-danger " type="button"><i class="fa fa-cogs fa-fw" aria-hidden="true"></i>
				Parametres News
			</a>
			<a href="<?php echo site_url('news'); ?>" class="btn btn-perso btn-info" type="button" target="_blank"><i class="fa fa-eye fa-fw" aria-hidden="true"></i>
				Afficher News
			</a>

			<br />
			<h4>Gestion des news BDE <span class="badge"><?php echo $nb_news_bde; ?></span></h4>
			<a href="<?php echo site_url('liste/bde'); ?>" class="btn btn-perso btn-success" type="button"><i class="fa fa-list fa-fw" aria-hidden="true"></i>
				News du BDE
			</a>
			<a href="<?php echo site_url('add/bde'); ?>" class="btn btn-perso btn-success" type="button"><i class="fa fa-plus fa-fw" aria-hidden="true"></i>
				Ajout rapide
			</a>
			<a href="<?php echo site_url('config/bde'); ?>" class="btn btn-perso btn-danger" type="button"><i class="fa fa-cogs fa-fw" aria-hidden="true"></i>
				Parametres BDE
			</a>
			<a href="<?php echo site_url('bde'); ?>" class="btn btn-perso btn-info" type="button" target="_blank"><i class="fa fa-eye fa-fw" aria-hidden="true"></i>
				Afficher BDE
			</a>

			<h4>Gestion de l'album photos <span class="badge"><?php echo $nb_photos; ?></span></h4>
			<a href="<?php echo site_url('liste/album'); ?>" class="btn btn-perso btn-success" type="button"><i class="fa fa-list fa-fw" aria-hidden="true"></i>
				Liste des albums
			</a>
			<a href="<?php echo site_url('config/photos'); ?>" class="btn btn-perso btn-danger" type="button"><i class="fa fa-cogs fa-fw" aria-hidden="true"></i>
				Parametres de l'album
			</a>
			<a href="<?php echo site_url('photos'); ?>" class="btn btn-perso btn-info" type="button" target="_blank"><i class="fa fa-eye fa-fw" aria-hidden="true"></i>
				Afficher l'album
			</a>

			<h4>Gestion de la météo</h4>
			<a href="<?php echo site_url('meteo_config'); ?>" class="btn btn-perso btn-danger disabled" type="button" disabled><i class="fa fa-cogs fa-fw" aria-hidden="true"></i>
				Paramétres météo
			</a>
			<a href="<?php echo site_url('meteo'); ?>" class="btn btn-perso btn-info" type="button" target="_blank"><i class="fa fa-eye fa-fw" aria-hidden="true"></i>
				Afficher la météo
			</a>
			<h4>Gestion des utilisateurs <span class="badge badge-danger">beta</span></h4>
			<a href="<?php echo site_url('liste/user'); ?>" class="btn btn-perso btn-success" type="button"><i class="fa fa-list fa-fw" aria-hidden="true"></i>
				Liste des utilisateurs
			</a>
			<a href="<?php echo site_url(''); ?>" class="btn btn-perso btn-success disabled" type="button"><i class="fa fa-plus fa-fw" aria-hidden="true"></i>
				Ajouter un utilisateur <span class="label label-warning">soon</span>
			</a>
			<h4>Gestion du site</h4>
			<a href="<?php echo site_url('config'); ?>" class="btn btn-perso btn-danger disabled" type="button"><i class="fa fa-cogs fa-fw" aria-hidden="true"></i>
				Modifier les paramétres
			</a>
			<a href="<?php echo site_url('changelog'); ?>" class="btn btn-perso btn-warning" type="button"><i class="fa fa-eye fa-fw" aria-hidden="true"></i>
				Changelog
			</a>
			<a href="<?php echo site_url('maintenance'); ?>" class="btn btn-perso btn-info" type="button" target="_blank"><i class="fa fa-eye fa-fw" aria-hidden="true"></i>
				Page de maintenance
			</a>
			<?php }
				else if($user['group']=='bde'){ ?>
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

				<?php } ?>
		</div>
	</div>
</div>