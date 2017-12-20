<?php
$url="http://dev.julien-fournier.fr/version.json";
$json=file_get_contents($url);
$version=json_decode($json,true);
?>
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <h3>Paramétres du site :</h3>
            <div class="panel">
                <div class="panel-body">
                    <div class="update">
                        Vérification de la version <i class="fa fa-spinner fa-pulse fa-fw"></i>
                    </div>
                    
                        <label class="control-label" for="url">URL du site</label>
                        <input type="text" class="form-control" id="url" aria-describedby="url" placeholder="website.domain" value="<?php echo $configs[2]['value']; ?>" style="width:50%;" >
                        <span id="url" class="help-block">URL d'accés au site</span>

                </div>
            </div>
            <div class="panel">
                <div class="panel-body">
                    <label class="control-label" for="url">Mettre à jour l'application</label>
                    <div class="pull-right">
                        <a href="<?php echo  site_url('admin/updateApplication'); ?>" class="btn btn-perso btn-success" value="update" id=""><i class="fa fa-download" aria-hidden="true"></i> Mettre à jour</a>
                    </div>
                </div>
            </div>
            <div class="panel">
                <div class="panel-body">
                    <label class="control-label" for="url">Sauvegarde et sécuritée</label>
                    <div class="pull-right">
                        <a href="<?php echo  site_url('admin/saveApplication'); ?>" class="btn btn-perso btn-success" value="update" id=""><i class="fa fa-save" aria-hidden="true"></i> Sauvegarder</a>
                    </div>
                    <span id="url" class="help-block">Denriére sauvegarde effectuée le : <?= $save['date'] ?></span>
                    <span id="url" class="help-block">Taille de l'application : <?= $save['size'] ?></span>
                </div>
            </div>
            <div class="row">
                <div class="pull-left">
                    <a href="<?php echo  site_url('admin'); ?>" type="button" class="btn btn-perso btn-danger"><i class="fa fa-arrow-left fa-fw" aria-hidden="true"></i> Retour</a>
                </div>
                <div class="pull-right">
                    <button type="submit" class="btn btn-perso btn-success" value="Send" id="submit"><i class="fa fa-floppy-o" aria-hidden="true"></i> Enregistrer</button>
                </div>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript">
var beta =  <?php echo $configs[3]['value']; ?>;
var version = <?php echo $configs[0]['value']; ?>;
if(beta == "1"){
    var lastVersion = "<?php echo $version["intranet"]["beta"]; ?>";
}
else{
    var lastVersion = "<?php echo $version["intranet"]["stable"]; ?>";
}
var test = function(){
    if(version == lastVersion){
        $('.update').html("Vous disposez de la derniére version (" + version + ") <i class=\"fa fa-check fa-fw\"></i>").removeClass("update").addClass("updateOk");
    }
    else{
        $('.update').html("Une mise à jour est requise ! (" + version + ") -> (" + lastVersion + ") <i class=\"fa fa-close fa-fw\"></i>").removeClass("update").addClass("updateWrong");
    }
}
$('document').ready(function(){
setTimeout(test, 2000);
});
</script>