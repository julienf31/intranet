	<div class="container">
		<!-- page de connexion -->
		<div class="row">
			<!-- Debut contenu-->
			<div class="col-md-8 col-md-offset-2">
				<div class="col-md-6 col-md-offset-3  col-xs-8 col-xs-offset-2 loginform">
					<?php if (validation_errors()) : ?> 
						<div class="alert alert-danger alert-dismissible" role="alert">
							<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
							<?php echo validation_errors(); ?>
						</div>
					<?php endif; ?>
					<?php echo form_open('verifylogin'); ?>
					<form class="loginform"> 
						<label class="connexion">Connexion</label><br /><br />
						<div class="loginform">
							<div class="">
								<div class=""><i class="fa fa-user fa-fw input" aria-hidden="true"></i></div>
								<input type="text" class=" login" id="username" name="username" placeholder="login">
							</div>
						</div>
						<div style="clear:both;"></div>
						<div class="loginform">
							<div class="">
								<div class=""><i class="fa fa-lock fa-fw input" aria-hidden="true"></i></div>
								<input type="password" class="login" id="passowrd" name="password" placeholder="password">
							</div>
							<div style="clear:both;"></div>
							<br />
							<a href="#">Mot de passe oublié ?</a>
							<br /><br /><br />
						</div>
						<button type="submit" class="btn btn-perso btn-success" value="Login"><i class="fa fa-sign-in" aria-hidden="true"></i> Connexion</button>
						<button type="reset" class="btn btn-perso btn-warning pull-right"><i class="fa fa-repeat" aria-hidden="true"></i> Reset</button>
					</form>
				</div>
			</div>
		</div>
	</div>