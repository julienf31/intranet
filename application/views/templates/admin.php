<html lang="fr">

<?php  include('_head.php'); ?>
	<body>
<?php  include('_header.php'); ?>

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