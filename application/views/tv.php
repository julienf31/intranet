<style>
    .body{
        overflow: hidden;
    }
</style>

<div id="news" class="container-fluid animated hidden" style="overflow: hidden; cursor: none;">

<!-- START TITRE DE LA NEWS  -->

    <?php if(isset($view)) :?> <!-- Si la news existe  -->

        <?php if($item_type == 'bde' && $view['afficher_titre'] =='1' && $view['text_type'] != 'JSON'): ?> <!-- Titre BDE -->
            <div class="row">
                <div class="col-sm-12">
                    <h3 class="titrenews"><?php echo $view['titre']; ?></h3>
                </div>
            </div>

        <?php elseif($item_type=='news') : ?> <!-- Titre News -->
            <div class="row">
                <div class="col-sm-12">
                    <h3>Actualites <?php if($view['afficher_titre'] =='1'){echo '- '.$view['titre'];}; ?></h3>
                </div>
            </div>
        <?php endif; ?>

    <?php endif; ?>
<!-- END TITRE DE LA NEWS  -->

<!-- START CONTENU DE LA NEWS  -->

    <?php if(!isset($view)): ?> <!-- Si il n'y a pas de news a afficher -->
        <h3 class="titrenews">Il n'y a pas d'actualités à afficher, revenez plus tard ! :)</h3>
    
    <?php elseif($view['text_type'] == "JSON"): ?> <!-- Si c'est une video -->
        <?php $json = json_decode($view['texte']);?>
            <div id="player"></div>

        <script> //Script Youtube API

            // 2. This code loads the IFrame Player API code asynchronously.
            var tag = document.createElement('script');

            tag.src = "https://www.youtube.com/iframe_api";
            var firstScriptTag = document.getElementsByTagName('script')[0];
            firstScriptTag.parentNode.insertBefore(tag, firstScriptTag);

            // 3. This function creates an <iframe> (and YouTube player)
            //    after the API code downloads.
            var player;
            function onYouTubeIframeAPIReady() {
                player = new YT.Player('player', {
                    height: '100%',
                    width: '100%',
                    videoId: '<?php echo $json->videoId ?>',
                    events: {
                        'onReady': onPlayerReady,
                        'onStateChange': onPlayerStateChange
                    }
                });
            }

            // 4. The API will call this function when the video player is ready.
            function onPlayerReady(event) {
                event.target.setPlaybackQuality('small');
                if('<?php echo $item_type ?>' ==='bde'){
                    $("#player").attr('frameborder',"0").css('overflow','hidden').css('height','100%').css('width','100%').css('position','absolute').css('top','0').css('bottom','0').css('left','0').css('right','0');
                }else{
                    $("#player").attr('frameborder',"0").css('overflow','hidden').css('height','450px').css('width','100%').css('position','relative').css('top','0').css('bottom','0').css('left','0').css('right','0');
                }
                event.target.playVideo();
            }

            // 5. The API calls this function when the player's state changes.
            //    The function indicates that when playing a video (state=1),
            //    the player should play for six seconds and then stop.
            var done = false;
            function onPlayerStateChange(event) {
                if(event.data == YT.PlayerState.ENDED){
                    out();
                    setTimeout('refresh();', 500);
                }
            }
            function stopVideo() {
                player.stopVideo();
            }
        </script>

    <?php else: ?> <!-- Si c'est une news -->
        <div class="row">
            <div class="col-md-12">
                <img src="<?php echo base_url();?>uploads/<?php echo $view['image']; ?>" style="background-size: cover; width: 100%; height:<?php if ($item_type == 'news' || $view['afficher_titre']=='1'){echo '450px';}else{echo '506px';}; ?>;">
                <div class="carousel-caption"><p><?php echo $view['texte']; ?></p></div>
            </div>
        </div>	
        </div>
        </div>
        <div style="position: fixed; bottom: 0;left:0;right:0;">
            <div id="progress" class="row" style="position: relative; bottom: 0;height: 10px;">
              <div id="bar" style="background-color: white;"></div>
            </div>
            
        <script> // Script pour changer de news
            var durree = <?php echo $config['tps_affichage']; ?>;
            var durreeInt = durree * 1000;
            setInterval('refresh()', durreeInt);
            var animationIn = "<?php echo $current_config['animationOut']; ?>";
            console.log(durreeInt);
            var time = durreeInt - 500;
            console.log(time);
            setTimeout('out();', time);
        </script>

    <?php endif; ?>

<!-- END CONTENU DE LA NEWS  -->

</div>

<script>
      function move() {
          var timeS = parseInt(<?php echo $config['tps_affichage'] ?>);
          var time = timeS * 1000;
          var interval = time/100;
        var elem = document.getElementById("bar");
        var width = 1;
        var id = setInterval(frame, interval);
        function frame() {
          if (width >= 100) {
            clearInterval(id);
          } else {
            width += 1;
            elem.style.width = width + '%';
          }
        }
      }
      move();
    function refresh() {
        document.location.href = document.location.origin + '/index.php/<?php echo $item_type; ?>' + '/<?php echo $nextview ?>';
    }
    function out(){
        $('#news').addClass("<?php echo $current_config['animationOut']; ?>");
    }
    $(window).load(function(){
        $('#news').addClass("<?php echo $current_config['animationIn']; ?>").removeClass('hidden')
    }) 
</script>