<div class="container-fluid">
  <img src="http://www.psdgraphics.com/file/blank-polaroid-frame.jpg" width="100%" height="100%" style="position: absolute;"></img>

  <?php
$key = 0;
foreach($images as $image): ?>

    <img id="img-<?php echo $image['id'] ?>" class="animated <?php if($key!=0) echo 'hidden'; else echo 'active' ?>" src="<?php echo $image['url']; ?>" width="52%" height="62.5%" style="position: absolute; left: 26%; top: 10.3%;"></img>
    <?php
$key ++;
endforeach; ?>



</div>

<script type="text/javascript">
  function swap(id, idNext) {
    if ($(id).hasClass('hidden')) {
      $(idNext).addClass('fadeOut');
      setTimeout(function() {
        $(idNext).addClass('hidden').removeClass('fadeOut');
      }, 500);
      setTimeout(function() {
        $(id).removeClass('hidden').addClass('fadeIn');
      }, 500);
    } else {
      $(id).addClass('fadeOut');
      setTimeout(function() {
        $(id).addClass('hidden').removeClass('fadeOut');
      }, 500);
      setTimeout(function() {
        $(idNext).removeClass('hidden').addClass('fadeIn');
      }, 500);
    }
  }

  var nbImages = <?php echo $key; ?>;
  var id = nbImages - (nbImages - 1);
  var idNext = parseInt(id + 1);

  setInterval("slide()", 5000);

  function startSlide() {
    id = nbImages - (nbImages - 1);
    idNext = parseInt(id + 1);
  }

  function slide() {
    imgId = "#img-" + id;
    imgIdNext = "#img-" + idNext;
    if (id == nbImages)
      endSlide();
    else {
      swap(imgId, imgIdNext);
      id = id + 1;
      idNext = idNext + 1;
    }

  }

  function endSlide() {
    swap(imgId, "#img-1");
    startSlide();
  }
</script>