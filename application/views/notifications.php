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