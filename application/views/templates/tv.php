<html lang="fr">

<?php  include('_header.php'); ?>
<body>

<?php  if ($item_type=='news' | $item_type=='meteo'): ?>
	<?php  include('_meteo.php'); ?>
<?php  endif; ?>
<?= $contents ?>

<footer>

</footer>
<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<!-- Include all compiled plugins (below), or include individual files as needed -->
<script src="<?= constant('VENDORS') ?>/bootstrap/js/bootstrap.min.js"></script>
<script>
	$('#myCarousel').carousel({
		interval: 6000
	});

	var clickEvent = false;
	$('#myCarousel').on('click', '.nav a', function () {
		clickEvent = true;
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
	function refresh() {
      location.reload();
}
	setInterval('refresh()', 120000); //2 minutes
</script>
	</body>
</html>