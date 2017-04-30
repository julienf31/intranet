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
var version = <?php echo $configs[0]['value']; ?>;
var curVersion = "2.2"; // trouver un systéme pour ca
var test = function(){
    console.log(version);
    if(version == curVersion){
        console.log("ok");
        $('.update').html("Vous disposez de la derniére version (" + version + ") <i class=\"fa fa-check fa-fw\"></i>").removeClass("update").addClass("updateOk");
    }
    else{
        console.log("pas ok");
        $('.update').html("Une mise à jour est requise ! (" + version + ") -> (" + curVersion + ") <i class=\"fa fa-close fa-fw\"></i>").removeClass("update").addClass("updateWrong");
    }
}
$('document').ready(function(){
setTimeout(test, 2000);
});
</script>