<?php
$city="Toulouse";
$country="FR"; //Two digit country code
$url="http://api.openweathermap.org/data/2.5/weather?q=".$city.",".$country."&APPID=c568aac6ef8e8c92ab7b8ad8e75cfe9e&units=metric&lang=fr";
$json=file_get_contents($url);
$weather=json_decode($json,true);
?>
<html lang="fr">
	<head>
		<title>Intranet ynov</title>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
		<link href="<?php echo base_url();?>bootstrap/css/bootstrap.min.css" rel="stylesheet">
		<link href="<?php echo base_url();?>asset/style.css" rel="stylesheet">
		<link href='https://fonts.googleapis.com/css?family=Montserrat:400,700' rel='stylesheet' type='text/css'>
		<link rel="stylesheet" href="<?php echo base_url();?>asset/font-awesome/css/font-awesome.min.css">
		<link rel="stylesheet" href="<?php echo base_url();?>/asset/icon/iconvault-preview.css" />
		<script src='//cdn.tinymce.com/4/tinymce.min.js'></script>
		<script>
			tinymce.init({
				selector: '#text',
				height: 300,
				plugins: [
				'advlist autolink lists link image charmap print preview anchor',
				'searchreplace visualblocks code fullscreen',
				'insertdatetime media table contextmenu paste code textcolor'
			],
				toolbar: 'undo redo | insert | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image | forecolor backcolor',
				content_css: '//www.tinymce.com/css/codepen.min.css'
			});
		</script>
		<script src="http://code.jquery.com/jquery-latest.js">
		</script>
		<script language=javascript>
			function updateDiv($div) {
				$($div).load(window.location.href + " " + $div);
			}
			function updateSlide($func1,$func2){

			}
			setInterval('updateDiv("#heure")', 1000);
			setInterval('updateDiv("#date")', 900000); //15 minutes
			setInterval('updateDiv("#carouselreload") ', 6000); //2 minutes rechargement fait bug
		</script>
		<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
		<!-- Include all compiled plugins (below), or include individual files as needed -->
		<script src="<?php echo base_url();?>bootstrap/js/bootstrap.min.js"></script>
		<script>
			$(document).ready( function() {
		$('#myCarousel').carousel({
		interval:   4000
		});
		
		var clickEvent = false;
		$('#myCarousel').on('click', '.nav a', function() {
			clickEvent = true;
			$('.nav li').removeClass('active');
					$(this).parent().addClass('active');
		}).on('slid.bs.carousel', function(e) {
		if(!clickEvent) {
			var count = $('.nav').children().length -1;
			var current = $('.nav li.active');
			current.removeClass('active').next().addClass('active');
			var id = parseInt(current.data('slide-to'));
			if(count == id) {
					$('.nav li').first().addClass('active');
			}
		}
		clickEvent = false;
		});
		});
		</script>
		<!--[if lt IE 9]>
		<script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
		<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
		<![endif]-->
		<!-- Include Google Maps JS API -->
		<script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?libraries=places&key=AIzaSyDyEmDNOcnLCO8PFxJR4W5qtQN9dNHcvwg">
		</script>
		<!-- Custom JS code to bind to Autocomplete API -->
		<!-- find it here: https://github.com/lewagon/google-place-autocomplete/blob/gh-pages/autocomplete.js -->
		<!-- We'll detail this file in the article -->
		<script type="text/javascript" src="<?php echo base_url();?>/asset/js/autocomplete.js"></script>
	</head>
	<body>
		<div class="container-fluid" id="head">
			<div class="row">
				<div class="col-md-2">
					<a href="<?php echo site_url('home/admin'); ?>"><img src="<?php echo base_url();?>img/logo_ynovcampus_couleur.png" width="220px"></a>
				</div>
				<div class="col-md-4 col-md-offset-1 date">
					<div id="heure">
						Nous sommes le
						<strong>
						<?php
						setlocale (LC_TIME, 'fr_FR.utf8','fra');
						echo (strftime("%A %d %B %Y"));
						?>
						</strong>
						<br/> il est <strong><?php $datestring = '%H:%i'; $time = time(); echo mdate($datestring, $time);?></strong>
					</div>
				</div>
				<div class="col-md-4 col-md-offset-1 meteo row">
					<div class="col-md-3  nomarge">
						<!-- <img src="http://openweathermap.org/img/w/<?php echo $weather['weather'][0]['icon'];?>.png"> -->
						<?php
						if($weather['weather'][0]['id']==800)
						echo '<i class="step icon-sun size-72 pull-right" style="color: orange;"></i>';
						else if($weather['weather'][0]['id']== 801)
						echo '<i class="step icon-sun size-72 pull-right" style="color: orange;"></i>';
						else
						echo '<i class="step icon-cloud size-72 pull-right" style="color: grey;"></i>';
						?>
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