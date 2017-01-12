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
							echo '<td><a href="'.site_url('home/update_state_bde/'.$data['id'].'/0').'" ><i class="fa fa-check green" aria-hidden="true"></i></a></td>';
						}
						else{
							echo '<td><a href="'.site_url('home/update_state_bde/'.$data['id'].'/1').'" ><i class="fa fa-times red" aria-hidden="true"></i></a></td>';
						}
						echo '<td><a href="'.site_url('home/edit_data_bde/'.$data['id']).'">editer</a> | <a href="#myModal-'.$data['id'].'">supprimer</a></td>';
						echo '</tr>';
					
					  $i++;
                      }
                    else:
						echo "<td colspan=\"7\" align=\"center\" >Pas de News à afficher</td>";
				
				endif;
				                foreach ($view_data as $key => $data) {
									?>
				
<div class="modal fade" id="myModal-<?php echo $data['id']; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Modal title</h4>
      </div>
      <div class="modal-body">
        ...
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
</div>
			<?php } ?>

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