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