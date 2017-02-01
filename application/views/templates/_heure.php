<style>
	.white{
		color: white;
	}
</style>
<script>
    $(document).ready(function() {
        setInterval(function() {
          if ($('.blink').hasClass('white')) {
            $('.blink').removeClass('white');
          } else {
            $('.blink').addClass('white');
          }
        }, 1000);
      });

   function updateDiv($div){
      $($div).load(location.href + " " + $div + ">*", "");
    }
    setInterval("updateDiv('#tplHeure');",5000);

</script>

					<span id="heureDroite" class="pull-left">
					<?php $datestring = '%H<span class="blink">:</span>%i'; $time = time(); echo mdate($datestring, $time);?>
					</span>
