<div class="container">
	<!-- contenu liste news -->
	<div class="row">
		<!-- Debut contenu-->
		<div class="col-md-8 col-md-offset-2">
			<?php if($this->session->flashdata('message')){?>
				<div class="alert alert-success">
					<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
					<?php echo $this->session->flashdata('message')?>
				</div>
				<?php } ?>

					<h3>Liste des news</h3>
					<table class="table table-striped table-hover">
						<tr>
							<th>#</th>
							<th>Titre</th>
							<th>Ajoutée le</th>
							<th>Créée par</th>
							<th>Visible</th>
							<th>Actions</th>
						</tr>
						<?php
                if(isset($view_data) && is_array($view_data) && count($view_data)): $i=1;
                foreach ($view_data as $key => $data) {
						echo'<tr';
						if($i%2==0){echo 'class="even">';}else{echo'class="odd">';}
						echo '<td>'.$i.'</td>';
						echo '<td>'.$data['titre'].'</td>';
						echo '<td>'.$data['date'].'</td>';
						echo '<td>'.$data['auteur'].'</td>';
						if($data['visible']){
							echo '<td><i class="fa fa-check green" aria-hidden="true"></i></td>';
						}
						else{
							echo '<td><i class="fa fa-times red" aria-hidden="true"></i></td>';
						}
						echo '<td><a href="'.site_url('home/edit_data_bde/'. $data['id'].'').'">editer</a> | <a data-toggle="modal" href="#myModal">supprimer</a></td>';
						echo '</tr>';
						?>
							<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
								<div class="modal-dialog" role="document">
									<div class="modal-content">
										<div class="modal-header">
											<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
											<h4 class="modal-title" id="myModalLabel">Supprimer la news ?</h4>
										</div>
										<div class="modal-body">
											Vous etes sur le point de supprimer la news : <strong><?php echo $data['titre']; ?></strong>
											<br /> créée par
											<?php echo '<strong>'.$data['auteur'].'</strong> le <strong>'.$data['date'].'</strong>'; ?>
										</div>
										<div class="modal-footer">
											<button type="button" class="btn btn-warning" data-dismiss="modal">Annuler</button>
											<a type="button" href="<?php echo site_url('home/delete_data_bde/'.$data['id']) ?>" class="btn btn-success" role="button">Confirmer</a>
										</div>
									</div>
								</div>
							</div>
							<?php 
					
					  $i++;
                      }
                    else:
						echo "<td colspan=\"7\" align=\"center\" >Pas de News à afficher</td>";
				
				endif;
				?>


					</table>
					<div class="row">
						<div class="pull-left">
							<a href="<?php echo  site_url('home/admin'); ?>" type="button" class="btn btn-danger"><i class="fa fa-arrow-left fa-fw" aria-hidden="true"></i> Retour</a>
						</div>
						<div class="pull-right">
							<a href="<?php echo  site_url('home/add_data_bde'); ?>" type="button" class="btn btn-success"><i class="fa fa-plus fa-fw" aria-hidden="true"></i> Ajouter une news</a>
						</div>
					</div>

		</div>
	</div>
</div>