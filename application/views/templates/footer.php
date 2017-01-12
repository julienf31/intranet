<footer>
	<div class="col-md-6 col-md-offset-3" style="text-align: center;">
		<?php 
	if($this->session->userdata('logged_in')){ 
		echo "<a href=\"" .site_url('home/logout')."\" class=\"lien footer\"></br> ";
		echo "<span class=\"majuscule\">";
		echo (isset($username))?$username :"Guest </br>";
		echo "</span>";
		echo " (<i class=\"fa fa-sign-out\" aria-hidden=\"true\"></i> Déconnexion)</a></br>";
		echo "<a href=\"" .site_url('home/admin')."\" class=\"lien footer\"> Administration</a></br> ";
	}
	else{
		echo"<a href=\"" .site_url('login')."\" class=\"lien footer\"><i class=\"fa fa-sign-in\" aria-hidden=\"true\"></i> Connexion</a></br>";
	}
	?>
			<span class="footer">Page générée en <strong>{elapsed_time}</strong> secondes</span>
			<br/>
			<span class="footer">Propulsé par <strong>YNOV intranet</strong> v1.0</span>
	</div>
</footer>

</body>

</html>