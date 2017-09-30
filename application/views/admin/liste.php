<div class="container">
	<?php
		// notifications
		if($this->session->flashdata());
			$this->load->view('notifications');
	?>

	<?php 
		// chargement de la vue correspondante
		if($item_type == 'bde' || $item_type == 'news')
			$this->load->view('admin/liste/news');
		else if($item_type == 'album')
			$this->load->view('admin/liste/album');
		else if($item_type == 'photos')
			$this->load->view('admin/liste/photo');
		else if($item_type == 'user')
			$this->load->view('admin/liste/user');
		else if($item_type == 'birthday')
			$this->load->view('admin/liste/birthday');
		else if($item_type == 'screens')
			$this->load->view('admin/liste/screen');	
	?>
</div>


<!-- Scripts necessaires pour les listes -->

<script type="text/javascript">
// Script de lancement des modals
  $(function() {
      $(document).on('click','#myModal',function(e){
          $('#blockidval').val($(this).data('id'));
      });
  });

// Script de changement d'affichage des albums et de selection des checkboxs
$(document).ready(function() {
    $('#list').click(function(event){event.preventDefault();$('#albums .item').addClass('list-group-item');});
    $('#grid').click(function(event){event.preventDefault();$('#albums .item').removeClass('list-group-item');$('#albums .item').addClass('grid-group-item');});

	$('#checkAll').change(function () {
		$('input[type="checkbox"]').prop('checked', $(this).prop('checked'));
	});
});

</script>