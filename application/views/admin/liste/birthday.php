<?php foreach ($liste_items as $key => $data) : ?>
	<div class="modal fade" id="myModal-<?php echo $data['id']; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
					<h4 class="modal-title" id="myModalLabel">Confirmation</h4>
				</div>
				<div class="modal-body">
					Voulez-vous vraiment supprimer l'anniversaire de <strong><?php echo $data['Prénom']." ".$data['Nom']; ?></strong>?
				</div>
				<div class="alert alert-warning" style="margin: 5px 10px;">
						<strong>Attention : </strong>Cette action est irrévoquable.
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
			<h3>Liste des anniversaires</h3>
			<div class="row">
				<div class="col-md-12" style="display: inline-block; margin-bottom: 10px;">
				<?php
					echo form_open('admin/liste/'.$item_type);
				?>
					<span style="text-align:left;">Groupes :</span>
					<select name="group">
						<option value="all">Tout</option>
						<?php
						foreach ($groups as $key => $group) {
							if($this->session->userdata('birthday_search') == $group['group_name'])
								$str = '<option value="'.$group['group_name'].'" selected>'.$group['group_name'].'</option>';
							else
								$str = '<option value="'.$group['group_name'].'">'.$group['group_name'].'</option>';
							echo $str;
						}
						?> 
					</select>
					<?php 
					$button = array(
							'name'          => 'filter',
							'id'            => 'filter',
							'class'			=> 'btn btn-success btn-perso',
							'type'          => 'submit',
							'style'			=> 'margin-bottom: 0;',
							'content'       => '<i class="fa fa-search fa-fw" aria-hidden="true"></i> Filtrer'
							);

					echo form_button($button);?>
					<div class="search pull-right">
					<?php
						$searchInput = array(
							'name'          => 'search',
							'type'			=> 'search',
							'id'            => 'search',
							'class'			=> 'login',
							'placeholder'   => 'Rechercher',
							'style'         => 'width: 250px;display: inline-block;'
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
				</div>
				<?php if($this->session->userdata('birthday_search')): ?>
				<div class="row" style="text-align: center;margin-bottom: 10px;">
					<span class="badge badge" style="border-radius: 0;"><a href="<?php echo site_url('clearSearch'); ?>"><i class="fa fa-times red" aria-hidden="true"></i></a> <?php echo 'Recherche de : '.$this->session->userdata('birthday_search'); ?></span>
				</div>
				<?php endif; ?>
				<form action="<?php echo site_url('admin/graduate_selection'); ?>" method="post">
			<table class="table table-striped table-hover">
				<tr>
					<th><input type="checkbox" name="selectall" id="checkAll"></th>
					<th>#</th>
					<th>Nom</th>
					<th>Prénom</th>
					<th>Classe</th>
					<th>Actions</th>
				</tr>
				<?php if(isset($liste_items) && is_array($liste_items) && count($liste_items)): ?>
                <?php foreach($liste_items as $key => $data) : ?>
				<?php if($from =="birthday"){
						$from = 0;
				}
				?>
					<tr key="<?php echo $key; ?>" class="<?php $key%2==0 ? 'even' : 'odd'; ?>">
						<td><input type="checkbox" name="group[]" value="<?php echo $data['id']; ?>" id=""></td>
						<td><?php echo $from+$key+1; ?></td>
						<td><?php echo $data['Nom']; ?></td>
						<td><?php echo $data['Prénom']; ?></td>
						<td><?php echo $data['group']; ?></td>
						<td><?php if($data['group'] != "Intervenant" && $data['group'] != "M2 Ingésup" && $data['group'] != "B3 Lim'Art"): ?><a href="<?php echo site_url('admin/graduate_student/').$data['id'];?>" data-toggle="tooltip" data-placement="top" title="Promouvoir"><i class="fa fa-graduation-cap green" aria-hidden="true"></i></a> |<?php else: ?> <span data-toggle="tooltip" data-placement="top" title="Pas de promotion possible" disabled><i class="fa fa-graduation-cap grey" aria-hidden="true"></i></span>  | <?php endif; ?> <a href="<?php echo site_url('edit/').$item_type.'/'.$data['id']; ?>" data-toggle="tooltip" data-placement="top" title="Editer"><i class="fa fa-pencil orange" aria-hidden="true"></i></a> | <a href="#myModal-<?php echo $data['id']; ?>" data-toggle="modal"><i class="fa fa-trash red" aria-hidden="true" data-toggle="tooltip" data-placement="top" title="Supprimer"></i></a></td>
					</tr>	
				<?php endforeach; ?>
				</table>
				Pour la selection <a href="" data-toggle="tooltip" data-placement="top" title="INDISPONIBLE - Export Excel"><i class="fa fa-file-excel-o orange" aria-hidden="true"></i></a> | 
				<a href="#" data-toggle="tooltip" data-placement="top" title="Promouvoir" onclick="$(this).closest('form').submit()"><i class="fa fa-graduation-cap green" aria-hidden="true"></i></a> | <a href="" data-toggle="modal"><i class="fa fa-trash red" aria-hidden="true" data-toggle="tooltip" data-placement="top" title="INDISPONIBLE - Supprimer"></i></a>
                <?php else: ?>
					<td colspan="7" align="center" >Pas d'anniversaires à afficher</td>
				</table>
				<?php endif; ?>

			<div class="row" style="text-align: center;">
				<?php echo $this->pagination->create_links(); ?>
			</div>
			</form>
				<div class="row">
					<div class="pull-left">
						<a href="<?php echo  site_url('admin'); ?>" type="button" class="btn btn-perso btn-danger"><i class="fa fa-arrow-left fa-fw" aria-hidden="true"></i> Retour</a>
					</div>
					<div class="pull-right">
						<a href="<?php echo  site_url('add/').$item_type; ?>" type="button" class="btn btn-perso btn-success"><i class="fa fa-plus fa-fw" aria-hidden="true"></i> Ajouter un anniversaire</a>
					</div>
				</div>
		</div>
	</div>