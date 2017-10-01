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
					<a href="#picModal-<?php echo $photo['id']; ?>" class="btn btn-danger btn-perso" data-toggle="modal" ><i class="fa fa-trash fa-fw" aria-hidden="true"></i>supprimer</a>
					</div>
    	        </div>
			<?php endforeach; ?>
       	</div> 
	</div>
</div>
<div class="row">
	<div class="pull-left">
		<a href="<?php echo  site_url('liste/album'); ?>" type="button" class="btn btn-danger btn-perso"><i class="fa fa-arrow-left fa-fw" aria-hidden="true"></i> Retour</a>
	</div>
	<div class="pull-right">
		<a href="<?php echo  site_url('add/').$item_type.'/'.$content_album['id']; ?>" type="button" class="btn btn-success btn-perso"><i class="fa fa-plus fa-fw" aria-hidden="true"></i> Ajouter une photo</a>
	</div>
</div>