<footer>

</footer>
<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<!-- Include all compiled plugins (below), or include individual files as needed -->
<script src="<?php echo base_url();?>bootstrap/js/bootstrap.min.js"></script>
<script>
	$('#myCarousel').carousel({
		interval: 2000;
	});

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