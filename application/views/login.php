	<div class="row resetrow">
		<div class="col-md-10 col-md-offset-1">
			<?php if($this->session->flashdata('forgot_error')): ?>
				<script type="text/javascript">
					var message = "<?php echo $this->session->flashdata('forgot_error') ?>";
					$.notify({message: message},{type: 'warning'});
				</script>
			<?php endif; ?>
			<?php if(form_error('emailforgot')): ?>
				<script type="text/javascript">
					var message = "<?php echo form_error('emailforgot')?>";
					$.notify({message: message},{type: 'warning'});
				</script>
			<?php endif; ?>
			<?php if($this->session->flashdata('info')): ?>
				<script type="text/javascript">
					var message = "<?php echo $this->session->flashdata('info')?>";
					$.notify({message: message},{type: 'info'});
				</script>
			<?php endif; ?>
			<?php if($this->session->flashdata('danger')): ?>
				<script type="text/javascript">
					var message = "<?php echo $this->session->flashdata('danger')?>";
					$.notify({message: message},{type: 'danger'});
				</script>
			<?php endif; ?>
		</div>
	</div>
	<div class="container">
		<!-- page de connexion -->
		<div class="row">
			<!-- Debut contenu-->
			<div class="col-md-8 col-md-offset-2">
			
				<div id="login"  class="col-md-6 col-md-offset-3  col-xs-8 col-xs-offset-2  animated">
				<div class="row accessrow">
					<label class="access">Connexion</label>
					<label class="access2">Accès restreint</label>
					</div>
				<div class="row loginform">
					<?php if (validation_errors()) : ?> 
						<div class="alert alert-danger alert-dismissible" role="alert">
							<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
							<?php echo validation_errors(); ?>
						</div>
					<?php endif; ?>
					<?php echo form_open('verifylogin'); ?>
					<form id="log" class="loginform" autocomplete="off"> 
						<div class="loginform">
							<div class="">
								<div class=""><i class="fa fa-user fa-fw input" aria-hidden="true"></i></div>
								<input type="text" class="login" id="username" name="username" placeholder="identifiant">
							</div>
						</div>
						<div style="clear:both;"></div>
						<div class="loginform">
							<div class="">
								<div class=""><i class="fa fa-lock fa-fw input" aria-hidden="true"></i></div>
								<input type="password" class="login" id="passowrd" name="password" placeholder="mot de passe">
							</div>
							<div style="clear:both;"></div>
							<br />
							<a id="forgot">Mot de passe oublié ?</a>
						</div>
						<button type="submit" class="btn btn-perso btn-success" value="Login"><i class="fa fa-sign-in" aria-hidden="true"></i> Connexion</button>
						<button type="reset" class="btn btn-perso btn-warning pull-right"><i class="fa fa-repeat" aria-hidden="true"></i> Reset</button>
					</form>
					</div>
					</div>
					<!-- PW FORGOT -->
					<div id="forgotform"  class="col-md-6 col-md-offset-3  col-xs-8 col-xs-offset-2 hidden animated">
						<div class="row accessrow">
					<label class="access">Mot de passe oublié</label>
					</div>
					<div class="row">
						<label class="access2">Saisissez votre adresse mail pour recevoir un e-mail de réinitialisation</label>
					</div>
				<div class="row loginform">
					<?php echo form_open('login'); ?>
						<form class="loginform"> 
							<div class="loginform">
								<div class="">
									<div class=""><i class="fa fa-envelope fa-fw input" aria-hidden="true"></i></div>
									<input type="text" class="login" id="emailforgot" name="emailforgot" placeholder="email">
								</div>
							</div>
							<div style="clear:both;"></div>
							<br />
							<button type="submit" class="btn btn-perso btn-success pull-right" value="Login"><i class="fa fa-send" aria-hidden="true"></i> Envoyer</button>
							<button id="back" type="button" class="btn btn-perso btn-danger"><i class="fa fa-arrow-left" aria-hidden="true"></i> Retour</button>
						</form>
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