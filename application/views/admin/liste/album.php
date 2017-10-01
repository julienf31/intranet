<?php foreach($liste_items as $key => $album): ?>
	<div class="modal fade" id="albModal-<?php echo $album['id']; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
		    	<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
					<h4 class="modal-title" id="myModalLabel">Confirmation</h4>
				</div>
				<div class="modal-body">
					Voulez-vous vraiment supprimer la photo <strong><?php echo $album['name']; ?></strong><br/>
					Créée par <strong><?php echo $album['created_by']; ?></strong> le <strong><?php echo $album['created']; ?></strong> ?
				</div>
				<div class="alert alert-warning" style="margin: 5px 10px;">
					<strong>Attention : </strong>Supprimer cet album supprimera l'ensemble des photos qu'il contient.
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-perso btn-default" data-dismiss="modal">Annuler</button>
					<a href="<?php echo site_url('delete/'). $item_type.'/'. $album['id']; ?>" type="button" class="btn btn-perso btn-success">Confirmer</a>
				</div>
			</div>
		</div>
	</div>
<?php endforeach; ?>

<div class="well well-sm">
    <strong><?php echo $nb_album; ?> Albums / <?php echo $nb_photos; ?> Photos</strong>
    <div class="btn-group">
        <a  id="list" class="btn btn-perso btn-default btn-sm"><span class="glyphicon glyphicon-th-list">
        </span>Liste</a> <a id="grid" class="btn btn-perso btn-default btn-sm"><span class="glyphicon glyphicon-th"></span>Grille</a>
    </div>
	<div class="pull-right">
		<a href="<?php echo  site_url('add/').$item_type; ?>" type="button" class="btn btn-perso btn-success"><i class="fa fa-plus fa-fw" aria-hidden="true"></i> Créer un album</a>
	</div>
</div>
<div id="albums" class="row list-group">
    <?php foreach($liste_items as $key => $album): ?>
    <div class="item  col-xs-4 col-lg-4 list-group-item">
        <div class="thumbnail">
            <img class="group list-group-image" src="<?php echo base_url();?><?php if($album['url'] != 'uploads') echo 'uploads/'.$album['url']; else echo 'assets/img/album.png'; ?>" alt="" width="auto"/>
                <div class="caption">
                    <h4 class="group inner list-group-item-heading">
                    <?php echo $album['name']; ?></h4>
                    <p class="group inner list-group-item-text">
                        <?php echo $album['desc']; ?>
                        <div class="row">
                            <div class="col-xs-12 col-md-6">
                            <?php 
                                $query = $this->db->query('select id from photos where album_id = '.$album['id']);
                                $query2 = $this->db->query('select id from photos where album_id = '.$album['id'].' and show_photo = 1');
                                $nb_album = $query->num_rows();
                                $nb_visible = $query2->num_rows();
                            ?>
                            <p class="lead">
                                Photos : <?php echo $nb_visible.'/'.$nb_album; ?></p>
								Visibilité :<?php if($album['show_album']): ?>
							<a href="<?php echo site_url('update_state/').$item_type.'/'.$album['id'].'/0/'; ?>" ><i class="fa fa-check green" aria-hidden="true"></i></a>
						<?php else : ?>
							<a href="<?php echo site_url('update_state/').$item_type.'/'.$album['id'].'/1/'; ?>" ><i class="fa fa-times red" aria-hidden="true"></i></a>
						<?php endif; ?>
                        </div>
                        <div class="col-xs-12 col-md-8" style="margin-bottom: 10px;">
                            <a class="btn btn-perso btn-success" href="<?php echo  site_url('edit/').$item_type.'/'.$album['id'].'/0'; ?>">Editer l'album</a>
                            <a class="btn btn-perso btn-success" href="<?php echo  site_url('liste/').'photos/'.$album['id'].''; ?>">Gestion des photos</a>
							<a href="#albModal-<?php echo $album['id']; ?>" class="btn btn-perso btn-danger" data-toggle="modal" ><i class="fa fa-trash fa-fw" aria-hidden="true"></i> Supprimer l'album</a>
						</div>
                    </div>
                </div>
            </div>
        </div>
    <?php endforeach; ?>
</div>
<div class="row">
	<div class="pull-left">
		<a href="<?php echo  site_url('admin'); ?>" type="button" class="btn btn-perso btn-danger"><i class="fa fa-arrow-left fa-fw" aria-hidden="true"></i> Retour</a>
	</div>
	<div class="pull-right">
		<a href="<?php echo  site_url('add/').$item_type; ?>" type="button" class="btn btn-perso btn-success"><i class="fa fa-plus fa-fw" aria-hidden="true"></i> Créer un album</a>
	</div>
</div>