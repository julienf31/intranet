<style>
	.body{
		overflow: hidden;
	}
</style>
<div class="container-fluid">
		<!-- page de news -->
       <?php if($view['afficher_titre']=='1' ): ?> 
        <div class="row">
            <div class="col-sm-12">
		      <h3 class="titrenews"><?php echo $view['titre']; ?></h3>
            </div>
        </div>
    <?php endif; ?>

		<?php if(!isset($view)): ?>
		<h3 class="titrenews">Il n'y a pas d'actualités à afficher, revenez plus tard ! :)</h3>
        <?php elseif($view['text_type'] == "JSON"): ?>
            <?php
                $json = json_decode($view['texte']);
            ?>
            <div id="player"></div>
            <script>
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
                    event.target.playVideo();
                    $("#player").attr('frameborder',"0").css('overflow','hidden').css('height','100%').css('width','100%').css('position','absolute').css('top','0').css('bottom','0').css('left','0').css('right','0');
                }

                // 5. The API calls this function when the player's state changes.
                //    The function indicates that when playing a video (state=1),
                //    the player should play for six seconds and then stop.
                var done = false;
                function onPlayerStateChange(event) {
                    /*if (event.data == YT.PlayerState.PLAYING && !done) {
                     setTimeout(stopVideo, 6000);
                     done = true;
                     }*/
                    if(event.data == YT.PlayerState.ENDED){
                        refresh();
                    }
                }
                function stopVideo() {
                    player.stopVideo();
                }
            </script>
		<?php else: ?>
            <div class="row">
                <div class="col-md-12">
				<img src="<?php echo base_url();?>uploads/<?php echo $view['image']; ?>" style="background-size: cover; width: 100%; height:<?php if ($view['afficher_titre']=='1'){echo '450px';}else{echo '506px';}; ?>;">
			     <div class="carousel-caption"><p><?php echo $view['texte']; ?></p></div>
                 <div>
            </div>	

            <script>
                //setInterval('refresh()', <?php echo $config['tps_affichage'] ?>); //5 secondes
            </script>
			<?php endif; ?>
		
    </div>
        <script>
            function refresh() {
                document.location.href = document.location.origin + '/<?php echo $item_type; ?>'+'/<?php echo $nextview ?>';
            }
        </script>