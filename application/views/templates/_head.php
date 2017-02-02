<head>
  <title>
    <?= $title ?>
  </title>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <link href="<?= constant('ASSETS') ?>/animate.css" rel="stylesheet">
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
  <link href="<?= constant('VENDORS') ?>/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="<?= constant('ASSETS') ?>/style.css" rel="stylesheet">
  <link href='https://fonts.googleapis.com/css?family=Montserrat:400,700' rel='stylesheet' type='text/css'>
  <link rel="stylesheet" href="<?= constant('ASSETS') ?>/font-awesome/css/font-awesome.min.css">
  <link rel="stylesheet" href="<?= constant('ASSETS') ?>/icon/iconvault-preview.css" />
  <script src="<?= constant('ASSETS'); ?>/tinymce/js/tinymce/tinymce.min.js"></script>
  <script>
    tinymce.init({
      selector: '#text',
      language: 'fr_FR',
      height: 300,
      plugins: [
        'advlist autolink lists link image charmap print preview anchor',
        'searchreplace visualblocks code fullscreen preview',
        'insertdatetime media table colorpicker contextmenu paste code textcolor'
      ],
      toolbar1: 'undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | forecolor backcolor | preview',
      content_css: '//www.tinymce.com/css/codepen.min.css'
    });
  </script>
  <script src="http://code.jquery.com/jquery-latest.js">
  </script>
  <script src="<?= constant('VENDORS') ?>/bootstrap-notify/bootstrap-notify.js"></script>
  <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->
</head>