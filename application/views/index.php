<div class="container-fluid">
<div id="carouselreload">
	<!-- page de news -->
		<!-- Debut contenu-->
			<!-- Debut contenu-->
			<h3>Actualités</h3>
			<?php
				$this->db->from('news');
					$this->db->where('visible',1);					
					$query = $this->db->get();
    				$nb_news = $query->num_rows();
				if($nb_news == 0){
					echo '<h3 class="titrenews">Il n\'y a pas d\'actualités à afficher, revenez plus tard ! :)</h3>';
				}
				else{
			?>
			<div id="myCarousel" class="carousel slide" data-ride="carousel">

				<!-- Wrapper for slides -->
				<div class="carousel-inner">

					<!-- End Item -->
					<?php
					$i = 0;
					foreach ($query->result() as $row)
					{
					?>

						<div class="item <?php if($i==0){ echo('active');} ?>">
							<img src="<?php echo base_url();?>/uploads/<?php echo $row->image; ?>" style="background-size: cover; width: 100%; height: 550px;">
							<div class="carousel-caption">
								<h3 class="titrenews"><?php echo $row->titre; ?></h3>
								<p><?php echo $row->texte; ?></p>
							</div>
						</div>
						<?php $i++; } ?>
				</div>
				<!-- End Carousel Inner -->
				<ul class="nav nav-pills nav-justified">
					<?php
				$i = 0;
				foreach ($query->result() as $row)
					{
					?>
						<li data-target="#myCarousel" data-slide-to="<?php echo $i; ?>" <?php if($i==0){ echo( 'class="active"');}?>><a href="#"><?php echo $row->titre; ?>
						<!-- <small>Lorem ipsum dolor sit</small></a></li> -->
						<?php $i++; } ?>
				</ul>



			</div>
			<?php
				}
			?>
	</div>

			<!-- End Carousel -->
