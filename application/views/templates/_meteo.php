<?php
$city="Toulouse";
$country="FR"; //Two digit country code
$url="http://api.openweathermap.org/data/2.5/weather?q=".$city.",".$country."&APPID=c568aac6ef8e8c92ab7b8ad8e75cfe9e&units=metric&lang=fr";
$json=file_get_contents($url);
$weather=json_decode($json,true);
?>
		<div class="container-fluid" id="head">
			<div class="row">
				<div class="col-md-2">
					<a href="<?php echo site_url('admin'); ?>"><img src="<?= constant('ASSETS') ?>/img/logo_ynovcampus_couleur.png" width="220px"></a>
				</div>
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
			</div>
		</div>