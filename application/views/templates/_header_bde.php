<?php
$city="Toulouse";
$country="FR"; //Two digit country code
$url="http://api.openweathermap.org/data/2.5/weather?q=".$city.",".$country."&APPID=c568aac6ef8e8c92ab7b8ad8e75cfe9e&units=metric&lang=fr";
$json=file_get_contents($url);
$weather=json_decode($json,true);
?>
		<div class="container-fluid" id="head">
			<div class="row">
		<?php  include('_logo.php'); ?>
		<?php  include('_date.php'); ?>
		<?php  include('_meteo.php'); ?>



			</div>
		</div>