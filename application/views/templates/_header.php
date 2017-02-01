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
	$moduleGStyle = "height:100px;";
}
else if($moduleG == "_date.php"){
	$moduleGinnerHTML = 'class="col-md-5 date"';
	$moduleGStyle = "";
}
else if($moduleG == "_heure.php"){
	$moduleGinnerHTML = 'id="tplHeure" class="col-md-2 heure"';
	$moduleGStyle = "";
}
else if($moduleG == "_meteo.php"){
	$moduleGinnerHTML = 'class="col-md-2"';
	$moduleGStyle = "";
}
else{
	$moduleGinnerHTML = 'class="col-md-2"';
	$moduleGStyle = "";
}

if($moduleC == "_logo.php"){
	$moduleCinnerHTML = 'class="col-md-2"';
	$moduleCStyle = "height:100px;";
}
else if($moduleC == "_date.php"){
	$moduleCinnerHTML = 'class="col-md-5 col-md-offset-1 date"';
	$moduleCStyle = "";
}
else if($moduleC == "_heure.php"){
	$moduleCinnerHTML = 'id="tplHeure" class="col-md-2 heure"';
	$moduleCStyle = "";
}
else if($moduleC == "_meteo.php"){
	$moduleCinnerHTML = 'class="col-md-2"';
	$moduleCStyle = "";
}
else{
	$moduleCinnerHTML = 'class="col-md-2"';
	$moduleCStyle = "";
}

if($moduleD == "_logo.php"){
	$moduleDinnerHTML = 'class="col-md-2"';
	$moduleDStyle = "height:100px;";
}
else if($moduleD == "_date.php"){
	$moduleDinnerHTML = 'class="col-md-5 date"';
	$moduleDStyle = "";
}
else if($moduleD == "_heure.php"){
	$moduleDinnerHTML = 'id="tplHeure" class="col-md-2 pull-right heure"';
	$moduleDStyle = "";
}
else if($moduleD == "_meteo.php"){
	$moduleDinnerHTML = 'class="col-md-2"';
	$moduleDStyle = "";
}
else{
	$moduleDinnerHTML = 'class="col-md-2"';
	$moduleDStyle = "";
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