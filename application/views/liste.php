<div class="container">
	<div class="row">
		<div class="col-md-10 col-md-offset-1">
			<?php if($this->session->flashdata('message_success')): ?>
				<div class="alert alert-success">
					<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
					<?php echo $this->session->flashdata('message_success')?>
				</div>
			<?php endif; ?>
			<?php if($this->session->flashdata('message_warning')): ?>
				<div class="alert alert-warning">
					<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
					<?php echo $this->session->flashdata('message_warning')?>
				</div>
			<?php endif; ?>
			<?php if($this->session->flashdata('message_info')): ?>
				<div class="alert alert-info">
					<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
					<?php echo $this->session->flashdata('message_info')?>
				</div>
			<?php endif; ?>
			<?php if($this->session->flashdata('message_danger')): ?>
				<div class="alert alert-danger">
					<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
					<?php echo $this->session->flashdata('message_danger')?>
				</div>
			<?php endif; ?>
		</div>
	</div>
<?php 
	if($item_type == 'bde' || $item_type == 'news'):
		foreach ($liste_items as $key => $data) : ?>
	<div class="modal fade" id="myModal-<?php echo $data['id']; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
					<h4 class="modal-title" id="myModalLabel">Confirmation</h4>
				</div>
				<div class="modal-body">
					Voulez vous vraiment supprimer la news <strong><?php echo $data['titre']; ?></strong><br/>
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
	<!-- contenu liste news -->
	<div class="row">
		<!-- Debut contenu-->
		<div class="col-md-10 col-md-offset-1">
<!-- Remarque les léger changement de syntaxe sur les balises php-->	
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
							<td><a href="<?php echo site_url('update_state/').$item_type.'/'.$data['id'].'/0'; ?>" ><i class="fa fa-check green" aria-hidden="true"></i></a></td>
						<?php else : ?>
							<td><a href="<?php echo site_url('update_state/').$item_type.'/'.$data['id'].'/1'; ?>" ><i class="fa fa-times red" aria-hidden="true"></i></a></td>
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
	<?php elseif($item_type == 'photos'): ?>
	<?php foreach ($liste_items as $key => $data) : ?>
	<div class="modal fade" id="picModal-<?php echo $data['id']; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
					<h4 class="modal-title" id="myModalLabel">Confirmation</h4>
				</div>
				<div class="modal-body">
					Voulez vous vraiment supprimer la news <strong><?php echo $data['nom']; ?></strong><br/>
					Créée par <strong><?php echo $data['createur']; ?></strong> le <strong><?php echo $data['date']; ?></strong> ?
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
		<!-- Debut contenu-->
		<div class="col-md-10 col-md-offset-1">
<!-- Remarque les léger changement de syntaxe sur les balises php-->			
			<h3>Liste des articles - <?php echo $item_type; ?></h3>
			<table class="table table-striped table-hover">
				<tr>
					<th>#</th>
					<th>Nom</th>
					<th>Fichier</th>
					<th>Ajoutée par</th>
					<th>Visible</th>
					<th>Action</th>
				</tr>
				<?php if(isset($liste_items) && is_array($liste_items) && count($liste_items)): ?>
                <?php foreach($liste_items as $key => $data) : ?>
					<tr class="<?php $key%2==0 ? 'even' : 'odd'; ?>">
						<td><?php echo $key+1; ?></td>
						<td><?php echo substr($data['nom'],0,35); if(strlen($data['nom'])>35){echo ('...');} ?></td>
						<td title="<?php echo $data['url']; ?>" ><?php echo substr($data['url'],0,35); if(strlen($data['url'])>35){echo ('...');} ?></td>
						<td><?php echo $data['createur']; ?></td>
						<?php if($data['visible']): ?>
							<td><a href="<?php echo site_url('update_state/').$item_type.'/'.$data['id'].'/0'; ?>" ><i class="fa fa-check green" aria-hidden="true"></i></a></td>
						<?php else : ?>
							<td><a href="<?php echo site_url('update_state/').$item_type.'/'.$data['id'].'/1'; ?>" ><i class="fa fa-times red" aria-hidden="true"></i></a></td>
						<?php endif; ?>
						<td> <a href="#picModal-<?php echo $data['id']; ?>" data-toggle="modal" >supprimer</a></td>
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
					<?php if($item_type =="photos"): ?>
						<a href="<?php echo  site_url('add/').$item_type; ?>" type="button" class="btn btn-success"><i class="fa fa-plus fa-fw" aria-hidden="true"></i> Ajouter une photos</a>
					<?php else : ?>
						<a href="<?php echo  site_url('add/').$item_type; ?>" type="button" class="btn btn-success"><i class="fa fa-plus fa-fw" aria-hidden="true"></i> Ajouter une news</a>
					<?php endif; ?>
					</div>
				</div>
		</div>
	</div>
	<?php endif; ?>
</div>

<script type="text/javascript">
  $(function() {
      $(document).on('click','#myModal',function(e){
          $('#blockidval').val($(this).data('id'));
      });
  });
</script>