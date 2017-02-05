<html lang="fr">
<?php  include('_head.php'); ?>
	<body>
<?php  include('_header.php'); ?>

<?= $contents ?>

<footer>
<link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/font-awesome/4.3.0/css/font-awesome.min.css">
    <div class="feedback right">
      <div class="tooltips">
          <div class="btn-group dropup">
            <button type="button" class="btn btn-primary dropdown-toggle btn-circle btn-lg" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              <i class="fa fa-bug fa-2x" title="Report Bug"></i>
            </button>
            <ul class="dropdown-menu dropdown-menu-right dropdown-menu-form">
              <li>
                <div class="report">
                  <h2 class="text-center">Signaler un bug</h2>
                  <form id="contactForm" class="doo" method="post" action="<?php echo  site_url('data/report_bug'); ?>">
                    <div class="col-sm-12">
                      <textarea required name="comment" class="form-control" placeholder="Merci de nous signaler les éventuels beugs ou correctifs à apporté pour nous aider a améliorer votre experience"></textarea>
                      <input name="screenshot" type="hidden" class="screen-uri">
                      <span class="screenshot pull-right"><i class="fa fa-camera cam" title="Take Screenshot"></i></span>
                     </div>
                     <div class="col-sm-12 clearfix">
                      <button class="btn btn-primary btn-block">Envoyer le rapport</button>
                     </div>
                 </form>
                </div>
                <div class="loading text-center hideme">
                  <h2>Veuillez patienter...</h2>
                  <h2><i class="fa fa-refresh fa-spin"></i></h2>
                </div>
                <div class="reported text-center hideme">
                  <h2>Merci !</h2>
                  <p>Nous avons bien reçu votre signalement, merci pour votre aide.</p>
                   <div class="col-sm-12 clearfix">
                      <button class="btn btn-success btn-block do-close">Fermer</button>
                   </div>
                </div>
                <div class="failed text-center hideme">
                  <h2>Oh no!</h2>
                  <p>Il semblerai que nous n'ayons pas reçu votre rapport.<br><br><a href="mailto:julien.fournier@ynov.com">Essayez de nous envoyer un mail.</a></p>
                   <div class="col-sm-12 clearfix">
                      <button class="btn btn-danger btn-block do-close">Fermer</button>
                   </div>
                </div>
              </li>
            </ul>
          </div>
      </div>
    </div>
    <script src="//cdnjs.cloudflare.com/ajax/libs/html2canvas/0.4.1/html2canvas.min.js"></script>

	<div class="col-md-6 col-md-offset-3" style="text-align: center;">
		<?php if($this->session->userdata('logged_in')): ?> 
			<a href="<?php echo site_url('logout'); ?>" class="lien footer"></br>
			<span class="majuscule"><?php  echo $username; ?></span>
			<i class="fa fa-sign-out" aria-hidden="true"></i> (Déconnexion)</a></br>
			<a href="<?php echo site_url('admin'); ?>" class="lien footer"> Administration</a></br>
		<?php else: ?>
			<a href="<?php echo site_url('login'); ?>" class="lien footer"><i class="fa fa-sign-in" aria-hidden="true"></i> Connexion</a></br>
		<?php endif; ?>
			<span class="footer">Page générée en <strong>{elapsed_time}</strong> secondes</span>
			<br/>
			<span class="footer">Propulsé par <strong>YNOV intranet</strong> v1.1</span>
	</div>
</footer>
<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<!-- Include all compiled plugins (below), or include individual files as needed -->
<script src="<?= constant('VENDORS') ?>/bootstrap/js/bootstrap.min.js"></script>
<script>
(function ( $ ) {
    $.fn.feedback = function(success, fail) {
    	self=$(this);
		self.find('.dropdown-menu-form').on('click', function(e){e.stopPropagation()})

		self.find('.screenshot').on('click', function(){
			self.find('.cam').removeClass('fa-camera fa-check').addClass('fa-refresh fa-spin');
			html2canvas($(document.body), {
				onrendered: function(canvas) {
					self.find('.screen-uri').val(canvas.toDataURL("image/png"));
					self.find('.cam').removeClass('fa-refresh fa-spin').addClass('fa-check');
				}
			});
		});

		self.find('.do-close').on('click', function(){
			self.find('.dropdown-toggle').dropdown('toggle');
			self.find('.reported, .failed').hide();
			self.find('.report').show();
			self.find('.cam').removeClass('fa-check').addClass('fa-camera');
		    self.find('.screen-uri').val('');
		    self.find('textarea').val('');
		});

		failed = function(){
			self.find('.loading').hide();
			self.find('.failed').show();
			if(fail) fail();
		}

		self.find('form').on('submit', function(){
			self.find('.report').hide();
			self.find('.loading').show();
			$.post( $(this).attr('action'), $(this).serialize(), null, 'json').done(function(res){
				if(res.result == 'success'){
					self.find('.loading').hide();
					self.find('.reported').show();
					if(success) success();
				} else failed();
			}).fail(function(){
				failed();
			});
			return false;
		});
	};
}( jQuery ));

$(document).ready(function () {
	$('.feedback').feedback();
});


</script>

</body>

</html>