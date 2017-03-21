<?php
$city="Toulouse";
$country="FR";
$url="http://api.openweathermap.org/data/2.5/weather?q=".$city.",".$country."&APPID=c568aac6ef8e8c92ab7b8ad8e75cfe9e&units=metric&lang=fr";
$json=file_get_contents($url);
$weather=json_decode($json,true);

$moduleG = "_".$current_config['moduleGauche'].".php";
$moduleC = "_".$current_config['moduleCentre'].".php";
$moduleD = "_".$current_config['moduleDroite'].".php";

if($moduleG == "_logo.php"){
	$moduleGinnerHTML = 'class="col-md-2"';
	$moduleGStyle = "height: 20vh;";
}
else if($moduleG == "_date.php"){
	$moduleGinnerHTML = 'class="col-md-5 date"';
	$moduleGStyle = "height: 20vh;";
}
else if($moduleG == "_heure.php"){
	$moduleGinnerHTML = 'id="tplHeure" class="col-md-2 heure"';
	$moduleGStyle = "height: 20vh;";
}
else if($moduleG == "_meteo.php"){
	$moduleGinnerHTML = 'class="col-md-2"';
	$moduleGStyle = "height: 20vh;";
}
else{
	$moduleGinnerHTML = 'class="col-md-2"';
	$moduleGStyle = "height: 20vh;";
}

if($moduleC == "_logo.php"){
	$moduleCinnerHTML = 'class="col-md-2"';
	$moduleCStyle = "height: 20vh;";
}
else if($moduleC == "_date.php"){
	$moduleCinnerHTML = 'class="col-md-8 text-center date"';
	$moduleCStyle = "height: 20vh;";
}
else if($moduleC == "_heure.php"){
	$moduleCinnerHTML = 'id="tplHeure" class="col-md-2 heure"';
	$moduleCStyle = "height: 20vh;";
}
else if($moduleC == "_meteo.php"){
	$moduleCinnerHTML = 'class="col-md-2"';
	$moduleCStyle = "height: 20vh;";
}
else{
	$moduleCinnerHTML = 'class="col-md-2"';
	$moduleCStyle = "height: 20vh;";
}

if($moduleD == "_logo.php"){
	$moduleDinnerHTML = 'class="col-md-2"';
	$moduleDStyle = "height: 20vh;";
}
else if($moduleD == "_date.php"){
	$moduleDinnerHTML = 'class="col-md-5 date"';
	$moduleDStyle = "height: 20vh;";
}
else if($moduleD == "_heure.php"){
	$moduleDinnerHTML = 'id="tplHeure" class="col-md-2 pull-right heure"';
	$moduleDStyle = "height: 20vh;";
}
else if($moduleD == "_meteo.php"){
	$moduleDinnerHTML = 'class="col-md-2"';
	$moduleDStyle = "height: 20vh;";
}
else{
	$moduleDinnerHTML = 'class="col-md-2"';
	$moduleDStyle = "height: 20vh;";
}

?>
<div class="container-fluid" id="head">
	<div class="row">
		<div <?php echo $moduleGinnerHTML.'" style="'.$moduleGStyle.'"'; ?>>
		<?php  if($moduleG != "_.php") include($moduleG); ?>
		</div>
		<div <?php echo $moduleCinnerHTML.'" style="'.$moduleCStyle.'"'; ?>>
		<?php  if($moduleC != "_.php") include($moduleC); ?>
		</div>
		<div <?php echo $moduleDinnerHTML.'" style="'.$moduleDStyle.'"'; ?>>
		<?php  if($moduleD != "_.php") include($moduleD); ?>
		</div>
	</div>
</div>