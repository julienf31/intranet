		<?php
$city="Toulouse";
$country="FR"; //Two digit country code
$url="http://api.openweathermap.org/data/2.5/weather?q=".$city.",".$country."&APPID=c568aac6ef8e8c92ab7b8ad8e75cfe9e&units=metric&lang=fr";
$json=file_get_contents($url);
$weather=json_decode($json,true);
?>

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
					<div  style="padding-left: 5px; color: white;">
						<?php echo "Temp : ".round($weather['main']['temp'])." C° <br/>".$weather['weather'][0]['description']."<br/>"; ?>
							<?php echo "Humidité : ".$weather['main']['humidity']."%"; ?>
					</div>
