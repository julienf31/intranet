<html lang="fr">

<?php  include('_header.php'); ?>

	<body>
		<div class="container-fluid" id="head">
			<div class="row">
				<div class="col-md-2">
					<a href="<?php echo site_url('admin'); ?>"><img src="<?= constant('ASSETS') ?>/img/logo_ynovcampus_couleur.png" width="220px"></a>
				</div>
				<div class="col-md-4 col-md-offset-1 date">
				<div id="heure">
					Nous sommes le
					<strong>
					<?php setlocale (LC_TIME, 'fr_FR.utf8','fra');?>
					<?php echo (strftime("%A %d %B %Y")); ?>
					</strong>
					<br/> il est <strong><?php $datestring = '%H:%i'; $time = time(); echo mdate($datestring, $time);?></strong>
				</div>
				</div>
				<div class="col-md-4 col-md-offset-1 meteo row">
					<div class="col-md-3  nomarge">
						<!-- <img src="http://openweathermap.org/img/w/<?php echo $weather['weather'][0]['icon'];?>.png"> -->
						<?php if($weather['weather'][0]['id']==800): ?>
						<i class="step icon-sun size-72 pull-right" style="color: orange;"></i>
						<?php elseif($weather['weather'][0]['id']== 801): ?>
						<i class="step icon-sun size-72 pull-right" style="color: orange;"></i>
						<?php else: ?>
						<i class="step icon-cloud size-72 pull-right" style="color: grey;"></i>
						<?php endif; ?>
					</div>
					<div class="col-md-8" style="padding-left: 5px;">
						<strong><?php echo $weather['name']; ?></strong>
						<br/>
						<?php echo "Temp : ".$weather['main']['temp']." C° ".$weather['weather'][0]['description']."<br/>"; ?>
							<?php echo "Humidité : ".$weather['main']['humidity']."%"; ?>
					</div>
				</div>
			</div>
		</div>

<?= $contents ?>

<footer>
	<div class="col-md-6 col-md-offset-3" style="text-align: center;">
		<?php if($this->session->userdata('logged_in')): ?> 
			<a href="<?php echo site_url('logout'); ?>" class="lien footer"></br>
			<span class="majuscule"><?php  echo $username; ?></span>
			<i class="fa fa-sign-out" aria-hidden="true"></i> (Déconnexion)</a></br>
			<a href="<?php echo site_url('admin'); ?>" class="lien footer"> Administration</a></br>
		<?php else: ?>
			<a href="<?php echo site_url('login'); ?>" class="lien footer"><i class="fa fa-sign-in" aria-hidden="true"></i> Connexion</a></br>
		<?php endif; ?>
			<span class="footer">Page générée en <strong>{elapsed_time}</strong> secondes</span>
			<br/>
			<span class="footer">Propulsé par <strong>YNOV intranet</strong> v1.0</span>
	</div>
</footer>
<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<!-- Include all compiled plugins (below), or include individual files as needed -->
<script src="<?= constant('VENDORS') ?>/bootstrap/js/bootstrap.min.js"></script>
<script>

</script>

</body>

</html>