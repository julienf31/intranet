<style>
	.body{
		overflow: hidden;
	}
</style>
<div class="container-fluid">
<div id="carouselreload">
	<!-- page de news -->
		<!-- Debut contenu-->
			<!-- Debut contenu-->
			<h3>Actualités BDE</h3>
			<?php if(count($bde_list) == 0): ?>
				<h3 class="titrenews">Il n'y a pas d'actualités à afficher, revenez plus tard ! :)</h3>

			<?php else: ?>
			<div id="myCarousel" class="carousel slide" data-ride="carousel">

				<!-- Wrapper for slides -->
				<div class="carousel-inner">

					<!-- End Item -->
					<?php foreach ($bde_list as $key => $item): ?>
						<div class="item <?php if($key==0){ echo('active');} ?>">
							<img src="<?php echo base_url();?>/uploads/<?php echo $item['image']; ?>" style="background-size: cover; width: 100%; height: 520px;">
							<div class="carousel-caption">
								<h3 class="titrenews"><?php if($item['afficher_titre']=='1' ) {  echo $item['titre']; }?></h3>
								<p><?php echo $item['texte']; ?></p>
							</div>
						</div>
					<?php endforeach; ?>
				</div>
				<!-- End Carousel Inner -->
				<ul class="nav nav-pills nav-justified">
					<?php foreach ($bde_list as $key => $item): ?>
						<li data-target="#myCarousel" data-slide-to="<?php echo $key; ?>" <?php if($key==0){ echo( 'class="active"');}?>><a href="#"><?php echo $item['titre']; ?>
						<!-- <small>Lorem ipsum dolor sit</small></a></li> -->
					<?php endforeach; ?>
				</ul>
			</div>
		<?php endif; ?>
		</div>

			<!-- End Carousel -->
