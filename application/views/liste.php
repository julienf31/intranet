<div class="container">

<!-- Notifications -->
	<div class="row">
		<div class="col-md-10 col-md-offset-1">
			<?php if($this->session->flashdata('message_success')): ?>
				<script type="text/javascript">
					var message = "<?php echo $this->session->flashdata('message_success')?>";
					$.notify({message: message},{type: 'success'});
				</script>
			<?php endif; ?>
			<?php if($this->session->flashdata('message_warning')): ?>
				<script type="text/javascript">
					var message = "<?php echo $this->session->flashdata('message_warning')?>";
					$.notify({message: message},{type: 'warning'});
				</script>
			<?php endif; ?>
			<?php if($this->session->flashdata('message_info')): ?>
				<script type="text/javascript">
					var message = "<?php echo $this->session->flashdata('message_info')?>";
					$.notify({message: message},{type: 'info'});
				</script>
			<?php endif; ?>
			<?php if($this->session->flashdata('message_danger')): ?>
				<script type="text/javascript">
					var message = "<?php echo $this->session->flashdata('message_danger')?>";
					$.notify({message: message},{type: 'danger'});
				</script>
			<?php endif; ?>
		</div>
	</div>

<!-- Fin Notifications -->

<!-- Liste news -->

<?php if($item_type == 'bde' || $item_type == 'news'):
		foreach ($liste_items as $key => $data) : ?>
	<div class="modal fade" id="myModal-<?php echo $data['id']; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
					<h4 class="modal-title" id="myModalLabel">Confirmation</h4>
				</div>
				<div class="modal-body">
					Voulez-vous vraiment supprimer la news <strong><?php echo $data['titre']; ?></strong><br/>
					Créée par <strong><?php echo $data['auteur']; ?></strong> le <strong><?php echo $data['date']; ?></strong> ?
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-default" data-dismiss="modal">Annuler</button>
					<a href="<?php echo site_url('delete/'). $item_type.'/'. $data['id']; ?>" type="button" class="btn btn-success">Confirmer</a>
				</div>
			</div>
		</div>
	</div>
	<?php endforeach; ?>
	<div class="row">
		<div class="col-md-10 col-md-offset-1">	
			<h3>Liste des articles - <?php echo $item_type; ?></h3>
			<table class="table table-striped table-hover">
				<tr>
					<th>#</th>
					<th>Titre</th>
					<th>Ajoutée le</th>
					<th>Créée par</th>
					<th>Visible</th>
					<th>Actions</th>
				</tr>
				<?php if(isset($liste_items) && is_array($liste_items) && count($liste_items)): ?>
                <?php foreach($liste_items as $key => $data) : ?>
					<tr class="<?php $key%2==0 ? 'even' : 'odd'; ?>">
						<td><?php echo $key+1; ?></td>
						<td><?php echo substr($data['titre'],0,35); if(strlen($data['titre'])>35){echo ('...');} ?></td>
						<td><?php echo $data['date']; ?></td>
						<td><?php echo $data['auteur']; ?></td>
						<?php if($data['visible']): ?>
							<td><a href="<?php echo site_url('update_state/').$item_type.'/'.$data['id'].'/0'; ?>" ><i id="green" class="fa fa-check green" aria-hidden="true"></i></a></td>
						<?php else : ?>
							<td><a href="<?php echo site_url('update_state/').$item_type.'/'.$data['id'].'/1'; ?>" ><i id="red" class="fa fa-times red" aria-hidden="true"></i></a></td>
						<?php endif; ?>
						<td><a href="<?php echo site_url('edit/').$item_type.'/'.$data['id'].'/'.$data['text_type']; ?>">editer</a> | <a href="#myModal-<?php echo $data['id']; ?>" data-toggle="modal" >supprimer</a></td>
					</tr>	
				<?php endforeach; ?>
                <?php else: ?>
					<td colspan="7" align="center" >Pas de News à afficher</td>
				<?php endif; ?>
			</table>
				<div class="row">
					<div class="pull-left">
						<a href="<?php echo  site_url('admin'); ?>" type="button" class="btn btn-danger"><i class="fa fa-arrow-left fa-fw" aria-hidden="true"></i> Retour</a>
					</div>
					<div class="pull-right">
						<a href="<?php echo  site_url('add/').$item_type; ?>" type="button" class="btn btn-success"><i class="fa fa-plus fa-fw" aria-hidden="true"></i> Ajouter une news</a>
					</div>
				</div>
		</div>
	</div>

<!-- Fin liste news -->

<!-- Liste album -->

	<?php elseif($item_type == 'album'): ?>
	<!-- DEBUT MODAL ALBUM-->
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
						<button type="button" class="btn btn-default" data-dismiss="modal">Annuler</button>
						<a href="<?php echo site_url('delete/'). $item_type.'/'. $album['id']; ?>" type="button" class="btn btn-success">Confirmer</a>
					</div>
				</div>
			</div>
		</div>
		<?php endforeach; ?>
	<!-- FIN  MODAL ALBUM-->
	<div class="well well-sm">
        <strong><?php echo $nb_album; ?> Albums / <?php echo $nb_photos; ?> Photos</strong>
        <div class="btn-group">
            <a  id="list" class="btn btn-default btn-sm"><span class="glyphicon glyphicon-th-list">
            </span>Liste</a> <a id="grid" class="btn btn-default btn-sm"><span
                class="glyphicon glyphicon-th"></span>Grille</a>
        </div>
		<div class="pull-right">
			<a href="<?php echo  site_url('add/').$item_type; ?>" type="button" class="btn btn-success"><i class="fa fa-plus fa-fw" aria-hidden="true"></i> Créer un album</a>
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
                            <a class="btn btn-success" href="<?php echo  site_url('edit/').$item_type.'/'.$album['id'].'/0'; ?>">Editer l'album</a>
                            <a class="btn btn-success" href="<?php echo  site_url('liste/').'photos/'.$album['id'].''; ?>">Gestion des photos</a>
							<a href="#albModal-<?php echo $album['id']; ?>" class="btn btn-danger" data-toggle="modal" ><i class="fa fa-trash fa-fw" aria-hidden="true"></i> Supprimer l'album</a>
						</div>
                    </div>
                </div>
            </div>
        </div>
    	<?php endforeach; ?>
    </div>
	<div class="row">
		<div class="pull-left">
			<a href="<?php echo  site_url('admin'); ?>" type="button" class="btn btn-danger"><i class="fa fa-arrow-left fa-fw" aria-hidden="true"></i> Retour</a>
		</div>
		<div class="pull-right">
			<a href="<?php echo  site_url('add/').$item_type; ?>" type="button" class="btn btn-success"><i class="fa fa-plus fa-fw" aria-hidden="true"></i> Créer un album</a>
		</div>
	</div>

<!-- Fin liste album -->

<!-- Liste photos -->

	<?php elseif($item_type == 'photos'): ?>
<!-- DEBUT MODAL PHOTOS-->
		<?php foreach($photos as $key_photos => $photo): ?>
	<div class="modal fade" id="picModal-<?php echo $photo['id']; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
					<h4 class="modal-title" id="myModalLabel">Confirmation</h4>
				</div>
				<div class="modal-body">
					Voulez-vous vraiment supprimer la photo <strong><?php echo $photo['name']; ?></strong><br/>
					Créée par <strong><?php echo $photo['created_by']; ?></strong> le <strong><?php echo $photo['created']; ?></strong> ?
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-default" data-dismiss="modal">Annuler</button>
					<a href="<?php echo site_url('delete/'). $item_type.'/'. $photo['id'].'/'.$photo['album_id']; ?>" type="button" class="btn btn-success">Confirmer</a>
				</div>
			</div>
		</div>
	</div>
	<?php endforeach; ?>
<!-- FIN  MODAL PHOTOS-->
	<h3>Gestion des photos de l'album : <?php echo $content_album['name']; ?></h3>
	<link rel="stylesheet" href="//frontend.reklamor.com/fancybox/jquery.fancybox.css" media="screen">
	<script src="//frontend.reklamor.com/fancybox/jquery.fancybox.js"></script>
	<div class="container">
		<div class="row">
			<div class='list-group gallery'>
			<?php foreach($photos as $key_photos => $photo): ?>
           	 <div class='col-sm-4 col-xs-6 col-md-3 col-lg-3'>
             	   <a class="fancybox thumbnail" rel="ligthbox" data-toggle="tooltip" data-placement="top" title="<?php echo $photo['url']; ?>">
                	    <img class="img-responsive" alt="" <?php if($photo['type'] == 'url'){echo 'src="'.$photo['url'].'"';} elseif($photo['type'] == 'file') echo 'src="'.base_url().'uploads/'.$photo['url'].'"'; ?> />
             	   </a><?php echo $photo['name']; ?>
					<br/>
					Visibilité : <?php if($photo['show_photo']): ?>
							<a href="<?php echo site_url('update_state/').$item_type.'/'.$photo['id'].'/0\/'.$photo['album_id']; ?>" ><i class="fa fa-check green" aria-hidden="true"></i></a>
						<?php else : ?>
							<a href="<?php echo site_url('update_state/').$item_type.'/'.$photo['id'].'/1\/'.$photo['album_id']; ?>" ><i class="fa fa-times red" aria-hidden="true"></i></a>
						<?php endif; ?>

					<div class="pull-right">
					<a href="#picModal-<?php echo $photo['id']; ?>" class="btn btn-danger" data-toggle="modal" ><i class="fa fa-trash fa-fw" aria-hidden="true"></i>supprimer</a>
					</div>
    	        </div>
			<?php endforeach; ?>
        	</div> 
		</div>
	</div>
	<div class="row">
		<div class="pull-left">
			<a href="<?php echo  site_url('liste/album'); ?>" type="button" class="btn btn-danger"><i class="fa fa-arrow-left fa-fw" aria-hidden="true"></i> Retour</a>
		</div>
		<div class="pull-right">
			<a href="<?php echo  site_url('add/').$item_type.'/'.$content_album['id']; ?>" type="button" class="btn btn-success"><i class="fa fa-plus fa-fw" aria-hidden="true"></i> Ajouter une photo</a>
		</div>
	</div>

<!-- Fin liste photos -->

	<?php endif; ?>
</div>

<!-- Scripts necessaires pour les listes -->

<script type="text/javascript">
// Script de lancement des modals
  $(function() {
      $(document).on('click','#myModal',function(e){
          $('#blockidval').val($(this).data('id'));
      });
  });

// Script de changement d'affichage des albums
$(document).ready(function() {
    $('#list').click(function(event){event.preventDefault();$('#albums .item').addClass('list-group-item');});
    $('#grid').click(function(event){event.preventDefault();$('#albums .item').removeClass('list-group-item');$('#albums .item').addClass('grid-group-item');});
});

$(document).ready(function(){
    $('[data-toggle="tooltip"]').tooltip(); 
});
test();
</script>
