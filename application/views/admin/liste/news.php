<?php foreach ($liste_items as $key => $data) : ?>
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
					<button type="button" class="btn btn-perso btn-default" data-dismiss="modal">Annuler</button>
					<a href="<?php echo site_url('delete/'). $item_type.'/'. $data['id']; ?>" type="button" class="btn btn-perso btn-success">Confirmer</a>
				</div>
			</div>
		</div>
	</div>
<?php endforeach; ?>
	<div class="row">
		<div class="col-md-10 col-md-offset-1">	
			<h3>Liste des articles - <?php echo $item_type; ?></h3>
			<div class="row">
				<div class="col-md-12 pull-right" style="display: inline-block; margin-bottom: 10px;text-align: right;">
					<?php
						echo form_open('admin/liste/'.$item_type);
						$searchInput = array(
							'name'          => 'search',
							'type'			=> 'search',
							'id'            => 'search',
							'class'			=> 'login',
							'placeholder'   => 'Rechercher',
							'style'         => 'width: 25%;display: inline-block;'
							);
						echo form_input($searchInput);
						$button = array(
							'name'          => 'lsearch',
							'id'            => 'searchButton',
							'class'			=> 'btn btn-success btn-perso',
							'type'          => 'submit',
							'style'			=> 'margin-bottom: 0;',
							'content'       => '<i class="fa fa-search fa-fw" aria-hidden="true"></i>'
							);
						echo form_button($button);
						echo form_close();
					?>
				</div>
				<?php if($this->session->userdata('search')): ?>
				<div class="row" style="text-align: center;margin-bottom: 10px;">
					<span class="badge badge" style="border-radius: 0;"><a href="<?php echo site_url('clearSearch'); ?>" data-toggle="tooltip" data-placement="top" title="Annuler la recherche"><i class="fa fa-times red" aria-hidden="true"></i></a> <?php echo 'Recherche de : '.$this->session->userdata('search'); ?></span>
				</div>
				<?php endif; ?>
			</div>
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
			<div class="row" style="text-align: center;">
			<?php echo $this->pagination->create_links(); ?>
			</div>
				<div class="row">
					<div class="pull-left">
						<a href="<?php echo  site_url('admin'); ?>" type="button" class="btn btn-perso btn-danger"><i class="fa fa-arrow-left fa-fw" aria-hidden="true"></i> Retour</a>
					</div>
					<div class="pull-right">
						<a href="<?php echo  site_url('add/').$item_type; ?>" type="button" class="btn btn-perso btn-success"><i class="fa fa-plus fa-fw" aria-hidden="true"></i> Ajouter une news</a>
					</div>
				</div>
		</div>
	</div>