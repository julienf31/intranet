<?php
$city="Toulouse";
$country="FR";
$url="http://api.openweathermap.org/data/2.5/weather?q=".$city.",".$country."&APPID=c568aac6ef8e8c92ab7b8ad8e75cfe9e&units=metric&lang=fr";
$json=file_get_contents($url);
$weather=json_decode($json,true);

$moduleG = "_".$current_config['moduleGauche'].".php";
$moduleC = "_".$current_config['moduleCentre'].".php";
$moduleD = "_".$current_config['moduleDroite'].".php";
?>
		<div class="container-fluid" id="head">
			<div class="row">
		<?php  if($moduleG != "_.php") include($moduleG); ?>
		<?php  if($moduleC != "_.php") include($moduleC); ?>
		<?php  if($moduleD != "_.php") include($moduleD); ?>
			</div>
		</div>