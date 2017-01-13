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
	<link href="<?php echo base_url();?>owfont-master/css/owfont-regular.css" rel="stylesheet" type="text/css">
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
		setInterval('updateDiv("#heure")', 60000);
		setInterval('updateDiv("#date")', 900000); //15 minutes
		setInterval('updateDiv("#carouselreload")', 120000); //2 minutes
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