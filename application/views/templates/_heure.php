<script>
//REFRESH HERE
</script>
				<div id="tplHeure" class="col-md-2 col-md-offset-1 heure">
					<span class="pull-left">
					<?php $datestring = '%H<span class="blink">:</span>%i'; $time = time(); echo mdate($datestring, $time);?>
					</span>
				</div>