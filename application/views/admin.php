<?php
    $query = $this->db->query('select id from news');
    $nb_news = $query->num_rows();
	$query = $this->db->query('select id from news_bde');
	$nb_news_bde = $query->num_rows();

?>
<div class="container">
	<!-- page de news -->
	<div class="row">
		<!-- Debut contenu-->
		<div class="col-md-8 col-md-offset-2">
			<h3>Bienvenue <?php echo $username; ?></h3>
			<?php
			if($username=='admin' || $username=='root'){
			?>
			<h4>Gestion des news <span class="badge"><?php echo $nb_news; ?></span></h4>
			<a href="<?php echo site_url('home/liste'); ?>" class="btn btn-primary" type="button"><i class="fa fa-list fa-fw" aria-hidden="true"></i>
				Liste des news
			</a>
			<a href="<?php echo site_url('home/add_data'); ?>" class="btn btn-primary" type="button"><i class="fa fa-plus fa-fw" aria-hidden="true"></i>
				Ajout rapide
			</a>
			<a href="<?php echo site_url('home/'); ?>" class="btn btn-info" type="button" target="_blank"><i class="fa fa-eye fa-fw" aria-hidden="true"></i>
				Afficher Accueil
			</a>
			<br />
			<h4>Gestion des news BDE <span class="badge"><?php echo $nb_news_bde; ?></span></h4>
			<a href="<?php echo site_url('home/liste_bde'); ?>" class="btn btn-primary" type="button"><i class="fa fa-list fa-fw" aria-hidden="true"></i>
				News du BDE
			</a>
			<a href="<?php echo site_url('home/add_data_bde'); ?>" class="btn btn-primary" type="button"><i class="fa fa-plus fa-fw" aria-hidden="true"></i>
				Ajout rapide
			</a>
			<a href="<?php echo site_url('home/bde'); ?>" class="btn btn-info" type="button" target="_blank"><i class="fa fa-eye fa-fw" aria-hidden="true"></i>
				Afficher Accueil BDE
			</a>
			<h4>Gestion de la météo</h4>
			<a href="<?php echo site_url('home/configmeteo'); ?>" class="btn btn-success disabled" type="button"><i class="fa fa-cogs fa-fw" aria-hidden="true"></i>
				Paramétres météo
			</a>
			<a href="<?php echo site_url('home/meteo'); ?>" class="btn btn-info disabled" type="button" target="_blank"><i class="fa fa-eye fa-fw" aria-hidden="true"></i>
				Afficher la météo
			</a>
			<h4>Gestion du site</h4>
			<a href="<?php echo site_url('home/config'); ?>" class="btn btn-success" type="button"><i class="fa fa-cogs fa-fw" aria-hidden="true"></i>
				Modifier les paramétres
			</a>
			<a href="<?php echo site_url('home/changelog'); ?>" class="btn btn-warning" type="button"><i class="fa fa-eye fa-fw" aria-hidden="true"></i>
				Changelog
			</a>
			<?php }
				else if($username =='bde'){ ?>
			<h4>Gestion des news <span class="badge"><?php echo $nb_news_bde; ?></span></h4>
			<a href="<?php echo site_url('home/liste_bde'); ?>" class="btn btn-primary" type="button"><i class="fa fa-list fa-fw" aria-hidden="true"></i>
				News du BDE
			</a>
			<a href="<?php echo site_url('home/add_data_bde'); ?>" class="btn btn-primary" type="button"><i class="fa fa-plus fa-fw" aria-hidden="true"></i>
				Ajout rapide
			</a>
			<a href="<?php echo site_url('home/bde'); ?>" class="btn btn-info" type="button"><i class="fa fa-eye fa-fw" aria-hidden="true"></i>
				Afficher Accueil BDE
			</a>
				<?php } ?>
		</div>
	</div>
</div>