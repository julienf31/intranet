<html lang="fr"><head>
    <title>
        Forgot Password  </title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
    <link href="<?= constant('VENDORS') ?>/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="<?= constant('ASSETS') ?>/style.css" rel="stylesheet">
    <link href='https://fonts.googleapis.com/css?family=Montserrat:400,700' rel='stylesheet' type='text/css'>
    <link href="https://fonts.googleapis.com/css?family=Raleway" rel="stylesheet">
    <link rel="stylesheet" href="<?= constant('ASSETS') ?>/font-awesome/css/font-awesome.min.css">
</head>
<body>
<div class="container-fluid" id="head">
    <div class="row">
        <div class="col-md-2" style="height: 20vh;">
        <a href="#"><img src='<?php echo 'cid:'.$img; ?>'style="height: 80%; padding: 8%;"/></a>
    </div>
</div>
<div class="container">
    <!-- page de connexion -->
    <div class="row" style="margin-top: 90px;">
        <!-- Debut contenu-->
        <div class="col-md-8 col-md-offset-2">
            Bonjour <?php echo $user['username']; ?>,<br><br>
            Une demande de réinitialisation de mot de passe à été éffectuée pour votre compte <a href="#"><?= $user['mail'] ?></a> sur l'application des télés d'YNOV TOULOUSE.<br>
            <br>
            Voici un lien de réinitialisation de votre mot de passe : <a href="<?= $link ?>"><?= $link ?></a>
            <br><br>
            Attention, ce lien n'est valable que 15 minutes.
            <br><br>
            <div class="alert alert-warning">
                <i class="fa fa-warning"></i> &nbsp;Si vous n'étes pas à l'origine de cette demande, ignorez cet email.
            </div>

        </div>

    </div>
</div>
<div style="clear:both; margin: 20px;"></div>
<footer>
    <div class="col-md-6 col-md-offset-3 foot" style="text-align: center;">
        <a href="http://intranet.local/login" class="lien footer"><i class="fa fa-sign-in" aria-hidden="true"></i> Acceder à l'application</a><br>
        <span class="footer"><strong>YNOV TOULOUSE TV</strong> v2.3</span>
    </div>
</footer>


</body></html>