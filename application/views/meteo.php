<?php
$city="Toulouse";
$country="FR";
$url = "http://api.openweathermap.org/data/2.5/forecast/daily?q=".$city.",".$country."&APPID=c568aac6ef8e8c92ab7b8ad8e75cfe9e&units=metric&lang=fr&mode=json&cnt=2";

$json = file_get_contents($url);
$json = json_decode($json);

$location = $json->city->name;
$meteos = $json->list;

$gorafi = "http://www.legorafi.fr/feed/";

$content = simplexml_load_file($gorafi);
$infos = $content->channel->item;
$key_info = 0;
foreach ($infos as $info){
    $key_info++;
}
?>
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-6">
        <div class="container-fluid">
          <h3>Infos :</h3>
          <div class="row">
            <?php foreach ($meteos as $key_meteo=>$meteo) : ?>
              <div id="meteo-<?php echo $key_meteo; ?>" class="col-md-12 row-eq-height animated <?php if($key_meteo == 0) echo 'flipInX'; else  echo 'hidden'; ?>" style="color: white;<?php if($key_meteo!=1)echo 'background-color: #ec4363;'; else echo 'background-color: #00AE9C;'; ?> min-height: 180px;">
                <div class="col-md-7">
                  <h4 style="margin-left:5px;"><?php echo $location; ?> - Météo <?php if($key_meteo == 0) echo 'du jour'; else echo 'de Demain'; ?></h4>
                  <ul>Températures :
                    <ul>Mini :
                      <?php echo $meteo->temp->min; ?> °C</ul>
                    <ul>Maxi :
                      <?php echo $meteo->temp->max; ?> °C</ul>
                  </ul>
                  <ul>Conditions météo :
                    <ul>Vitesse du vent :
                      <?php echo $meteo->speed; ?> km/h</ul>
                    <ul>Ciel :
                      <?php echo $meteo->weather[0]->description; ?>
                    </ul>
                  </ul>
                </div>
                <div class="col-md-5">
                  <?php if($key_meteo == 0): ?>
                    <br />
                    <br/>
                    <span style="margin-left:5px;">Actuellement :</span>
                    <div class="v-center">
                      <?php include('templates/_meteo2.php'); ?>
                    </div>
                    <?php endif; ?>
                </div>
              </div>
              <?php endforeach; ?>
          </div>
          <div class="row" style="min-height: 10px;"></div>
          <div class="row">
            <div class="col-md-7" style="color: white;background-color: #00AE9C;">
              <h4 style="margin-left:5px;">Anniversaires du jour :</h4>
              <?php if(count($anniversaire_etu) == 0 && count($anniversaire_inter) == 0): ?>
                <center>
                  <h4 style="margin-left:5px;margin-top: 10px;">Pas d'anniverssaire aujourd'hui</h4></center>
                <?php else: ?>
                  <?php if(count($anniversaire_inter) != 0) : ?>
                    <h4 style="margin-left:5px; margin-top: 10px;">Intervenants :</h4>
                    <?php foreach ($anniversaire_inter as $key => $item_int): ?>
                      <ul><i class="fa fa-birthday-cake" aria-hidden="true"></i>
                        <?php echo $item_int['prenom'].' '.$item_int['nom']; ?>
                      </ul>
                      <?php endforeach; ?>
                        <?php endif; ?>
                          <?php if(count($anniversaire_etu) != 0) : ?>
                            <h4 style="margin-left:5px;margin-top: 10px;">Etudiants :</h4>
                            <?php foreach ($anniversaire_etu as $key => $item): ?>
                              <ul><i class="fa fa-birthday-cake" aria-hidden="true"></i>
                                <?php echo $item['Prénom'].' '.$item['Nom']; ?>
                              </ul>
                              <?php endforeach; ?>
                                <?php endif; ?>
                                  <center>
                                    <h4 style="margin-left:5px;">Tout le staff vous souhaite un joyeux anniversaire !</h4></center>
                                  <?php endif; ?>
            </div>
            <div class="col-md-5 pull-right" style="color: white;background-color: #666666;padding-left: -10px;overflow: hidden;width: 40%;">
              <h4 style="margin-left:5px;">On fête les :</h4>
              <center>
                <h4 style="margin-left:5px;"><?php echo $fete['Fete']; ?></h4></center>
            </div>
          </div>
          <div class="row" style="min-height: 10px;"></div>
          <div class="row">

            <div id="info" class="col-md-12" style="color: white;background-color: #ec4363;">
              <div class="row">
                <h4 style="margin-left:5px; margin-top: 10px;">Actualités du jour :</h4>
                <?php $info = rand(0, $key_info-1); ?>
                  <h4 id="titre_news" class="animated fadeInUpBig" style="margin-left:5px;margin-bottom: 10px;"><?php echo $infos[$info]->title.'</div>'; ?></h4>

                  <?php echo '<p class="descriptionInfos animated fadeInUpBig">'.$infos[$info]->description.'</p>'; ?>
              </div>
            </div>
            <div id="progress" class="row">
              <div id="bar"></div>
            </div>
          </div>
        </div>
        <div class="col-md-6">
          <h3><i class="fa fa-twitter" style="color: #1da1f2" aria-hidden="true"></i><span style="color: #ec4363;"> F</span>il d'actualité Twitter : </h3>
          <center>
            <a class="twitter-timeline" href="https://twitter.com/search?q=ynov%20toulouse" data-widget-id="818447427300716545">Tweets sur ynov toulouse</a>
            <script>
              ! function(d, s, id) {
                var js, fjs = d.getElementsByTagName(s)[0],
                  p = /^http:/.test(d.location) ? 'http' : 'https';
                if (!d.getElementById(id)) {
                  js = d.createElement(s);
                  js.id = id;
                  js.src = p + "://platform.twitter.com/widgets.js";
                  fjs.parentNode.insertBefore(js, fjs);
                }
              }(document, "script", "twitter-wjs");
            </script>
          </center>
        </div>
      </div>
    </div>
    <script>
      function swap() {
        if ($("#meteo-0").hasClass('hidden')) {
          $("#meteo-1").addClass('flipOutX').removeClass('flipInX');
          setTimeout('displayMeteoTomorrow(0)', 1000);
          setTimeout('displaymeteoToday(1)', 1000);
        } else {
          $("#meteo-0").addClass('flipOutX').removeClass('flipInX');
          setTimeout('displaymeteoToday(0)', 1000);
          setTimeout('displayMeteoTomorrow(1)', 1000);
        }
      }

      function displaymeteoToday(show) {
        if (show == 1) {
          $('#meteo-1').removeClass('flipOutX');
          $("#meteo-0").addClass('flipInX').removeClass('hidden');
        } else {
          $("#meteo-0").addClass('hidden');
        }
      }

      function displayMeteoTomorrow(show) {
        if (show == 1) {
          $('#meteo-0').removeClass('flipOutX');
          $("#meteo-1").addClass('flipInX').removeClass('hidden');
        } else {
          $("#meteo-1").addClass('hidden');
        }
      }

      setInterval('swap()', 10000);

      function move() {
        var elem = document.getElementById("bar");
        var width = 1;
        var id = setInterval(frame, 100);

        function frame() {
          if (width >= 100) {
            clearInterval(id);
          } else {
            width += .5;
            elem.style.width = width + '%';
          }
        }
      }

      function updateDiv($div) {
        $($div).load(window.location.href + " " + $div);
        setTimeout('move();', 1000);
      }
      move();
      setInterval('updateDiv("#info")', 20000);
    </script>