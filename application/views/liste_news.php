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
                foreach($view_data as $key => $data) {
						echo'<tr';
						if($i%2==0){echo 'class="even">';}else{echo'class="odd">';}
						echo '<td>'.$i.'</td>';
						echo '<td>'.$data['titre'].'</td>';
						echo '<td>'.$data['date'].'</td>';
						echo '<td>'.$data['auteur'].'</td>';
						if($data['visible']){
							echo '<td><a href="'.site_url('home/update_state/'.$data['id'].'/0').'" ><i class="fa fa-check green" aria-hidden="true"></i></a></td>';
						}
						else{
							echo '<td><a href="'.site_url('home/update_state/'.$data['id'].'/1').'" ><i class="fa fa-times red" aria-hidden="true"></i></a></td>';
						}
						echo '<td><a href="'.site_url('home/edit_data/'.$data['id']).'">editer</a> | <a href="'.site_url('home/delete_data/'.$data['id']).'"  onClick="return confirm(\'Voulez vous vraiment supprimer cette news ?\')">supprimer</a></td>';
						echo '</tr>';
					
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
							<a href="<?php echo  site_url('home/add_data'); ?>" type="button" class="btn btn-success"><i class="fa fa-plus fa-fw" aria-hidden="true"></i> Ajouter une news</a>
						</div>
					</div>

		</div>
	</div>
</div>

<script type="text/javascript">
  $(function() {
      $(document).on('click','#myModal',function(e){
          $('#blockidval').val($(this).data('id'));
      });
  });
</script>