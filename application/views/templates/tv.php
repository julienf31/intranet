<html lang="fr">

<?php  include('_head.php'); ?>
<body>

<?php  if ($item_type=='news' | $item_type=='meteo'): ?>
	<?php  include('_header.php'); ?>
<?php  endif; ?>
<?php  if ($item_type=='bde'): ?>
	<?php  include('_header_bde.php'); ?>
<?php  endif; ?>
<?= $contents ?>

<footer>

</footer>
<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<!-- Include all compiled plugins (below), or include individual files as needed -->
<script src="<?= constant('VENDORS') ?>/bootstrap/js/bootstrap.min.js"></script>
<script>

</script>
	</body>
</html>