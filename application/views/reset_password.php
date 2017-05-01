	<div class="container">
		<!-- page de connexion -->
		<div class="row">
			<!-- Debut contenu-->
			<div class="col-md-8 col-md-offset-2">
				<div id="login"  class="col-md-6 col-md-offset-3  col-xs-8 col-xs-offset-2 loginform animated">
					<?php if (validation_errors()) : ?> 
						<div class="alert alert-danger alert-dismissible" role="alert">
							<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
							<?php echo validation_errors(); ?>
						</div>
					<?php endif; ?>
					<label class="connexion">Changement du mot de passe</label><br /><br />
                        <h5>Bonjour <span><?php echo $firstName; ?></span>, saisissez votre nouveau mot de passe</h5>     
                        <?php 
                        $fattr = array('class' => 'form-signin');
                        echo form_open(site_url().'login/reset_password/token/'.$token, $fattr); ?>
                        <div class="" style="margin: 10px 0;">
                            <div class=""><i class="fa fa-lock fa-fw input" aria-hidden="true"></i></div>
                        <?php echo form_password(array('name'=>'password', 'id'=> 'password', 'placeholder'=>'password', 'class'=>'login', 'value' => set_value('password'))); ?>
                        <?php echo form_error('password') ?>
                        </div>
                        <div style="clear:both;"></div>
                        <div class="form-group" style="margin: 10px 0;">
                            <div class=""><i class="fa fa-lock fa-fw input" aria-hidden="true"></i></div>
                        <?php echo form_password(array('name'=>'passconf', 'id'=> 'passconf', 'placeholder'=>'confirm password', 'class'=>'login', 'value'=> set_value('passconf'))); ?>
                        <?php echo form_error('passconf') ?>
                        </div>
                        <div style="clear:both;"></div>
                        <?php echo form_submit(array('value'=>'Reset Password', 'class'=>'btn btn-lg btn-success btn-block btn-perso', 'style'=>'margin-top: 30px; display: block;',)); ?>
                        <?php echo form_close(); ?>
					</div>
				</div>
			</div>
		</div>
	</div>
	<script type="text/javascript">
		$('#forgot').click(function(){
			$('#login').addClass("flipOutY");
			setTimeout(function() {
				$('#login').addClass("hidden").removeClass("flipOutY");
				$('#forgotform').removeClass("hidden").addClass("flipInY");
			}, 1000);
			
		})
		$('#back').click(function(){
			$('#forgotform').addClass("flipOutY");
			setTimeout(function() {
				$('#forgotform').addClass("hidden").removeClass("flipOutY");
				$('#login').removeClass("hidden").addClass("flipInY");
			}, 1000);
		})
		<?php if(($this->session->flashdata('forgot_error')) || (form_error('emailforgot'))): ?>
		function showForgotForm(){
			$('#login').addClass("hidden");
			$('#forgotform').removeClass("hidden");
		}
		showForgotForm();
		<?php endif; ?>
		
	</script>