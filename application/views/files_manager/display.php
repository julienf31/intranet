<style>
  .img-selected {
    border: 2px solid green;
    height: 150px;
    margin: 6px;
    opacity: 1 !important;
  }
  
  img.files_preview {
    margin: 10px;
    height: 150px;
    opacity: 0.6;
  }
</style>
<!-- Modal -->
<div id="displayFiles">
<div id="files_manager" class="modal fade" role="dialog">
  <div class="modal-dialog modal-lg">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <div class="row">
          <div class="col-md-12">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            <h4 class="modal-title">Fichiers</h4><span id="printSelected">Pas de fichiers séléctioné</span>
            <input type="text" name="search" value="" class="pull-right"></input>
          </div>
        </div>
      </div>
      <div class="modal-body list">
        <?php foreach ($files as $key => $file): ?>
          <img id="<?php echo $key; ?>" src="<?php echo base_url().'/uploads/'.$file; ?>" class="files_preview" title="<?php echo $file; ?>"></img>
          <?php endforeach; ?>
            <?php $key = sizeof($files); ?>
      </div>
      <div class="modal-footer">
        <button id="select" class="btn btn-perso btn-success disabled" disabled>Selectioner</button>
        <button type="button" class="btn btn-info btn-perso" data-toggle="modal" data-target="#upload_img">Ajouter</button>
        <button type="button" class="btn btn-perso btn-danger" data-dismiss="modal">Fermer</button>
      </div>
    </div>

  </div>
</div>
<!-- UPLOAD IMG MODAL -->
<div id="upload_img" class="modal fade" role="dialog">
  <div class="modal-dialog ">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Ajouter une image</h4>
      </div>
      <div class="modal-body">
        <form id="form-upload" action="<?php echo site_url('files_manager/uploadImage') ?>" method="POST" class="myForm" enctype="multipart/form-data">
          <input type="file" id="file" name="userfile" multiple />
          <input type="button" value="submit" onclick="submitFile();" />
        </form>
      </div>
      <div class="modal-footer">
        <a href="" type="button" class="btn btn-perso btn-warning">Ajouter</a>
        <button type="button" class="btn btn-perso btn-danger" data-dismiss="modal">Fermer</button>
      </div>
    </div>

  </div>
</div>
</div>
<script type="text/javascript">
  var name;
  $('img').on("click", function(e) {
    $('img').removeClass('img-selected');
    $(this).addClass('img-selected');
    $('#select').removeAttr('disabled').removeClass('disabled');
    name = $(this).attr('title');
    $('#printSelected').text(name);
  });

  $('#select').on("click", function(e) {
    console.log('Fichier choisis : ' + name);
    $("#files_manager").modal("hide");
    $('#file').text(name);
    $('#fileUp').val(name);
  });


  function submitFile() {
    var formUrl = $('#form-upload').attr('action');
    var inputFile = $('input#file');
    var fileName;
    var key = <?php echo $key-1; ?>;
    var filesToUpload = inputFile[0].files;
    // make sure there is file(s) to upload
    if (filesToUpload.length > 0) {
      // provide the form data
      // that would be sent to sever through ajax
      var formData = new FormData();

      for (var i = 0; i < filesToUpload.length; i++) {
        var file = filesToUpload[i];
        formData.append("file[]", file, file.name);
      }
    }
    $.ajax({
      url: formUrl,
      type: 'POST',
      data: formData,
      mimeType: "multipart/form-data",
      contentType: false,
      cache: false,
      processData: false,
      success: function(data, textSatus, jqXHR) {
        //now get here response returned by PHP in JSON fomat you can parse it using JSON.parse(data)
        console.log(data);
        for (var i = 0; i < filesToUpload.length; i++) {
          var file = filesToUpload[i];
          console.log(file);
          key++;
          fileName = '<img id="' + key + '" src="<?php echo base_url(); ?>/uploads/' + file['name'] + '" class="files_preview" title="' + file['name'] + '"></img>';
          $('.list').append(fileName);
        }
      },
      error: function(jqXHR, textStatus, errorThrown) {
        //handle here error returned
      }
    });
  }

</script>