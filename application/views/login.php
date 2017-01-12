	<div class="container">
		<!-- page de connexion -->
		<div class="row">
			<!-- Debut contenu-->
			<div class="col-md-8 col-md-offset-2">
				<h3>Connexion à l'interface d'administration</h3>
				<div class="col-md-6 col-md-offset-3">
			<!-- 	Ici c'est la syntaxe php qui ne vas pas et t'oblige a faire plein d'echo			
				<?php if(validation_errors()) { 
							echo '<div class="alert alert-danger alert-dismissible" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>';
							echo validation_errors();
							echo '</div>';
				}?> 
			-->
					<?php if (validation_errors()) : ?> 
						<div class="alert alert-danger alert-dismissible" role="alert">
							<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
							<?php echo validation_errors(); ?>
						</div>
					<?php endif; ?>
					<?php echo form_open('verifylogin'); ?>
					<form>
						<div class="form-group">
							<label for="connexion">Connexion</label>
							<div class="input-group">
								<div class="input-group-addon"><i class="fa fa-user fa-fw" aria-hidden="true"></i></div>
								<input type="text" class="form-control" id="username" name="username" placeholder="login">
							</div>
						</div>
						<div class="form-group">
							<div class="input-group">
								<div class="input-group-addon"><i class="fa fa-lock fa-fw" aria-hidden="true"></i></div>
								<input type="password" class="form-control" id="passowrd" name="password" placeholder="password">
							</div>
							<a href="#">Mot de passe oublié ?</a>
						</div>
						<button type="submit" class="btn btn-success" value="Login"><i class="fa fa-sign-in" aria-hidden="true"></i> Connexion</button>
						<button type="reset" class="btn btn-warning"><i class="fa fa-repeat" aria-hidden="true"></i> Reset</button>
					</form>
				</div>
			</div>
		</div>
	</div>