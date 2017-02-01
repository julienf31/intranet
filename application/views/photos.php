<style>
body {
    background-image: url(<?php echo constant('ASSETS').'/img/fond-bois.jpg'; ?>);
    background-repeat:no-repeat;
    background-size: cover auto;
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
    <img id="img-<?php echo $key ?>" class="animated <?php if($key!=0) echo 'hidden'; ?>" src="<?php echo $lien_img; ?>" width="52%" height="62.5%" style="position: absolute; left: 26%; top: 10.3%;"></img>
    <?php
$key ++;
endforeach; ?>



</div>

<script type="text/javascript">
  function swap(id, idNext) {
      $(id).addClass('fadeOut');
      setTimeout(function() {
        $(id).addClass('hidden').removeClass('fadeOut');
      }, 500);
      setTimeout(function() {
        $(idNext).removeClass('hidden').addClass('fadeIn');
      }, 500);
  }

  var nbImages = <?php echo $key; ?>;
  var id = 0;
  var idNext = parseInt(id + 1);

  setInterval("slide()", 5000);

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
</script>