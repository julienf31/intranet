<?php
$city="Toulouse";
$country="FR"; //Two digit country code
$url = "http://api.openweathermap.org/data/2.5/forecast/daily?q=".$city.",".$country."&APPID=c568aac6ef8e8c92ab7b8ad8e75cfe9e&units=metric&lang=fr&mode=xml&cnt=1";

$context  = stream_context_create(array('http' => array('header' => 'Accept: application/xml')));

$xml = file_get_contents($url, false, $context);
$xml = simplexml_load_string($xml);
$location = $xml->location->name;
$sunset = $xml->sun['set'];
$sunrise = $xml->sun['rise'];
$timeday = $xml->forecast->time['day'];
$temp_max = $xml->forecast->time->temperature['max'];
$temp_min = $xml->forecast->time->temperature['min'];
?>
<div class="container-fluid">
	<div class="row">
		<div class="col-md-6">
			<div class="container-fluid">
				<h3>Infos :</h3>
				<div class="row">
				<div class="col-md-12" style="color: white;background-color: #ec4363;">
					<h4 style="margin-left:5px;">Météo de <?php echo $location; ?></h4>
					<ul>Températures du jour :
						<ul>Mini : <?php echo $temp_min; ?></ul>
						<ul>Maxi : <?php echo $temp_max; ?></ul>
					</ul>
					<ul><i class="step icon-sunrise size-48"></i> Lever du soleil : <?php echo substr($sunrise,11,5); ?></ul>
					<ul><i class="step icon-sunset size-48"></i> Coucher du soleil : <?php echo substr($sunset,11,5); ?></ul>
				</div>
				
				</div>
				<div class="row" style="min-height: 10px;"></div>
				<div class="row">
				<div class="col-md-7" style="color: white;background-color: #00AE9C;">
					<h4 style="margin-left:5px;">Anniversaires du jour :</h4><br/>
					<?php
					$now = date('d/m');
					$year = date('Y');
					$this->db->from('intervenants');
					$this->db->like('anniversaire',$now);					
					$query = $this->db->get();
    				$nb_anniv_inter = $query->num_rows();
				if($nb_anniv_inter != 0){
					echo '<h4 style="margin-left:5px;">Intervenants :</h4>';
					foreach ($query->result() as $row)
					{
					$birthdate = substr($row->anniversaire, -4);
					$age = $year-$birthdate;
					echo '<ul><i class="fa fa-birthday-cake" aria-hidden="true"></i> '.$row->prenom.' '.$row->nom.' ('.$age.' ans) </ul>';
					}
				}

					$this->db->from('etudiants');
					$this->db->like('anniversaire',$now);					
					$query_inter = $this->db->get();
    				$nb_anniv = $query->num_rows();
				if($nb_anniv == 0 && $nb_anniv_inter == 0){
					echo '<h4 style="margin-left:5px;">Il n\'y a pas d\'anniversaire aujourd\'hui</h4><br/>';
				}
				else{
					echo '<h4 style="margin-left:5px;">Etudiants :</h4>';
					foreach ($query_inter->result() as $row)
					{
					$birthdate = substr($row->anniversaire, -4);
					$age = $year-$birthdate;
					$promo = substr($row->Promo,0, 2);
					echo '<ul><i class="fa fa-birthday-cake" aria-hidden="true"></i> '.$row->Prénom.' '.$row->Nom.' ('.$age.' ans) </ul>';
					}
					echo "<br /><center><h4 style=\"margin-left:5px;\">Toute l'administration vous souhaite un joyeux anniversaire !</h4></center><br/>";
				}
			?>

				</div>
				<div class="col-md-5 pull-right" style="color: white;background-color: #666666;padding-left: -10px;overflow: hidden;width: 40%;">
					<h4 style="margin-left:5px;">On fête les :</h4>
				</div>

				</div> 
			</div>
		</div>
		<div class="col-md-6">
			<h3><i class="fa fa-twitter" style="color: #1da1f2" aria-hidden="true"></i><span style="color: #ec4363;"> F</span>il d'actualité Twitter : </h3>
			<center>
			<a class="twitter-timeline" href="https://twitter.com/search?q=ynov%20toulouse" data-widget-id="818447427300716545">Tweets sur ynov toulouse</a>
			<script>
				! function (d, s, id) {
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