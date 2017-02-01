<div class="container">
  <div class="row">
    <div class="col-md-8 col-md-offset-2">
      <h3>Paramétres de l'ecran
        <?php echo $item_type; ?>
      </h3>
      <form method="post" action="<?php echo site_url('update/config_tv/').$item_type; ?>" name="data_register" enctype="multipart/form-data">
        <?php if($item_type != 'photos'): ?>
        <div class="panel">
          <div class="panel-heading">
            <h3 class="panel-title">Paramétres géneraux</h3>
          </div>
          <div class="panel-body" style="padding-bottom:0px;">
            <div class="form-group">
              <label>Configuration des en-têtes</label>
              <div class="row">
                <div class="col-xs-4">
                  <p class="help-block">Gauche</p>
                  <select class="form-control" name="moduleGauche">
				          	<option value="" <?php if($current_config['moduleCentre'] == "" ) echo "selected"; ?>>Aucun</option>
                    <?php foreach($modules as $module): ?>
                      <option value="<?php echo $module['nom']; ?>" <?php if($current_config['moduleGauche'] == $module['nom'] ) echo "selected"; ?>>
                        <?php echo $module['nom']; ?>
                      </option>
                      <?php endforeach; ?>
                  </select>
                </div>
                <div class="col-xs-4">
                  <p class="help-block">Centre</p>
                  <select class="form-control" name="moduleCentre">
				           <option value="" <?php if($current_config['moduleCentre'] == "" ) echo "selected"; ?>>Aucun</option>
                    <?php foreach($modules as $module): ?>
                      <option value="<?php echo $module['nom']; ?>" <?php if($current_config['moduleCentre'] == $module[ 'nom'] ) echo "selected"; ?>>
                        <?php echo $module['nom']; ?>
                      </option>
                      <?php endforeach; ?>
                  </select>
                </div>
                <div class="col-xs-4">
                  <p class="help-block">Droite</p>
                  <select class="form-control" name="moduleDroite">
				        	<option value="" <?php if($current_config['moduleCentre'] == "" ) echo "selected"; ?>>Aucun</option>
                    <?php foreach($modules as $module): ?>
                      <option value="<?php echo $module['nom']; ?>" <?php if($current_config['moduleDroite'] == $module['nom'] ) echo "selected"; ?>>
                        <?php echo $module['nom']; ?>
                      </option>
                      <?php endforeach; ?>
                  </select>
                </div>
              </div>
              <p class="help-block">Selectionnez les modules à afficher en haut de l'affichage</p>
            </div>
          </div>
          <div class="panel-body" style="padding-bottom:0px;">
            <div class="form-group">
              <label><i class="fa fa-picture-o" aria-hidden="true"></i> Logo de l'en-tête</label>
              <input type="file" id="logoup" name="logoup">
              <p class="help-block">Format .jpeg/.jpg/.gif/.png , La taille idéale doit être de 220 x 100 px</p>
            </div>
          </div>
        </div>
        <?php endif; ?>
        <div class="panel">
          <div class="panel-heading">
            <h3 class="panel-title">Paramétres d'affichage</h3>
          </div>
          <div class="panel-body">
            <div class="col-md-6">
              <label class="control-label" for="url">Transition d'entrée:</label>
              <select class="form-control" name="animationIn">
              <option value="" <?php if($current_config['animationIn'] == "" ) echo "selected"; ?>>Aucune</option>
                <?php foreach($animationsIn as $animation): ?>
                      <option value="<?php echo $animation['nom']; ?>" <?php if($current_config['animationIn'] == $animation['nom'] ) echo "selected"; ?>>
                        <?php echo $animation['nom']; ?>
                      </option>
                <?php endforeach; ?>
              </select>
            </div>
            <div class="col-md-6">
              <label class="control-label" for="url">Transition de sortie:</label>
              <select class="form-control" name="animationOut">
              <option value="" <?php if($current_config['animationIn'] == "" ) echo "selected"; ?>>Aucune</option>
                <?php foreach($animationsOut as $animation): ?>
                      <option value="<?php echo $animation['nom']; ?>" <?php if($current_config['animationOut'] == $animation['nom'] ) echo "selected"; ?>>
                        <?php echo $animation['nom']; ?>
                      </option>
                <?php endforeach; ?>
              </select>
            </div>
            <div class="col-md-6"><br />
              <label class="control-label" for="url">Durée d'affichage</label>
              <div class="input-group">
                <input type="text" class="form-control" name="tps_affichage" value="<?php echo $current_config['tps_affichage'];?>">
              <div class="input-group-addon">ms</div>
              </div>
              <span id="url" class="help-block">Temps d'affichages des news en ms</span>
            </div>
          </div>
          </div>
          <div class="row">
            <div class="pull-left">
              <a href="<?php echo  site_url('admin'); ?>" type="button" class="btn btn-danger"><i class="fa fa-arrow-left fa-fw" aria-hidden="true"></i> Retour</a>
            </div>
            <div class="pull-right">
              <button type="submit" class="btn btn-success" value="Send" id="submit"><i class="fa fa-floppy-o" aria-hidden="true"></i> Enregistrer</button>
            </div>
          </div>
      </form>
      
    </div>
  </div>