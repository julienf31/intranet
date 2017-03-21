<html lang="fr">

<?php  include('_head.php'); ?>
<body>

<?php  if ($item_type=='news'): ?>
	<?php  include('_header.php'); ?>
<?php  endif; ?>
<?php  if ($item_type=='bde'): ?>
	<?php  include('_header_bde.php'); ?>
<?php  endif; ?>

<?= $contents ?>

<footer>
</footer>

</body>
</html>