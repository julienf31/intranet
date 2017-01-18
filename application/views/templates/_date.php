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