<footer>
	<div class="col-md-6 col-md-offset-3" style="text-align: center;">
		<?php if($this->session->userdata('logged_in')): ?> 
			<a href="<?php echo site_url('logout'); ?>" class="lien footer"></br>
			<span class="majuscule"><?php  echo $username; ?></br></span>
			<i class="fa fa-sign-out" aria-hidden="true"></i> Déconnexion</a></br>
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

	var clickEvent = false;
	$('#myCarousel').on('click', '.nav a', function () {
		clickEvent = true;
		console.log('weqjdnqw');
		$('.nav li').removeClass('active');
		$(this).parent().addClass('active');
	}).on('slid.bs.carousel', function (e) {
		if (!clickEvent) {
			var count = $('.nav').children().length - 1;
			var current = $('.nav li.active');
			current.removeClass('active').next().addClass('active');
			var id = parseInt(current.data('slide-to'));
			if (count == id) {
				$('.nav li').first().addClass('active');
			}
		}
		clickEvent = false;
	});
</script>

</body>

</html>