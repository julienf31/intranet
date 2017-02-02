<style>
body {
    background: url(<?php echo constant('ASSETS').'/img/fond-bois.jpg'; ?>) repeat;
    background-size: cover auto;
    overflow: hidden;
}
</style>

<div class="container-fluid photos-tv">

  <img src="<?php echo constant('ASSETS').'/img/photos-fond.png'; ?>" width="100%" height="100%" style="position: absolute;"></img>

  <?php
$key = 0;
foreach($images as $count => $image): ?>
<?php 
if($image['type'] == 'file'){
  $lien_img = base_url().'uploads/'.$image['url'];
}
elseif($image['type'] == 'url'){
  $lien_img = $image['url'];
}
?>
<div  style="width: 52%;height: 62.5%;position: absolute; left: 25.67%; top: 10.3%;overflow: hidden;">
    <img id="img-<?php echo $key ?>" class="animated <?php if($key!=0) echo 'hidden'; ?>" src="<?php echo $lien_img; ?>" width="100%" height="100%"></img>
 </div>
    <?php
$key ++;
endforeach; ?>



</div>

<script type="text/javascript">
var image = <?php echo $current_config['tps_affichage']; ?>;
var imageTime = image*1000;
  function swap(id, idNext) {
    var transitionIn = "<?php echo $current_config['animationIn']; ?>";
    var transitionOut = "<?php echo $current_config['animationOut']; ?>";
      $(id).addClass(transitionOut);
      setTimeout(function() {
        $(id).addClass('hidden').removeClass(transitionOut);
      }, 1000);
      setTimeout(function() {
        $(idNext).addClass(transitionIn);
      }, 500);
      setTimeout(function() {
        $(idNext).removeClass('hidden');
      }, 500);
  }

  var nbImages = <?php echo $key; ?>;
  var id = 0;
  var idNext = parseInt(id + 1);

  setInterval("slide()", imageTime);

  function startSlide() {
    id = 0;
    idNext = parseInt(id + 1);
  }

  function slide() {
    imgId = "#img-" + id;
    imgIdNext = "#img-" + idNext;
    if (id == (nbImages - 1))
      endSlide();
    else {
      swap(imgId, imgIdNext);
      id = id + 1;
      idNext = idNext + 1;
    }
  }

  function endSlide() {
    swap(imgId, "#img-0");
    startSlide();
  }
  setInterval("location.reload(true);", 300000);
</script>