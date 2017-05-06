<div class="container">
  <div class="row">
    Selectionnez la version :
    <select id="version">
      <option value="2-3">2.3</option>
      <option value="2-2" selected>2.2</option>
      <option value="2-1">2.1</option>
      <option value="2">2</option>
      <option value="1-02">1.02</option>
      <option value="1-01">1.01</option>
      <option value="1">1</option>
    </select>
  </div>
  <div id="2-3" class="row changelog-corp hidden">
    <h3 class="changelog">Version 2.3 - En Cours</h3>
    <ul class="add">
      <li>Recherche dans les listes (news et utilisateurs)</li>
	    <li>Pagination dans les listes (news et utilisateurs)</li>
    </ul>
    <ul class="remove">
    </ul>
    <ul class="other">
    </ul>
  </div>
  <div id="2-2" class="row changelog-corp">
    <h3 class="changelog">Version 2.2 - Terminé (05/05/2017)</h3>
    <ul class="add">
      <li>Nouveau style du panel admin</li>
      <li>Navigation au fléches dans l'affichage des news</li>
      <li>Fonctionalité mot de passe oublié</li>
      <li>Ajout de la gestion des utilisateurs</li>
      <li>Ajout des groupes d'utilisateurs</li>
    </ul>
    <ul class="remove">
    </ul>
    <ul class="other">
      <li>Changelog dynamique</li>
      <li>Optimisation de la base de donnée</li>
    </ul>
  </div>
  <div id="2-1" class="row changelog-corp hidden">
    <h3 class="changelog">Version 2.1 - Terminé (05/02/2017)</h3>
    <ul class="add">
      <li>Systéme de signalement de bug par l'utilisateur</li>
      <li>Création d'albums rassemblant les photos</li>
      <li>Possibilité d'afficher ou de masquer les albums et les photos</li>
      <li>Nouveau système d'alertes dynamiques</li>
      <li>Barres de temps sur les élèments dynamiques des écrans</li>
      <li>Preset pour la selection du temps et affichage en secondes</li>
    </ul>
    <ul class="remove">
      <li>Supression de l'ancien système de photos</li>
    </ul>
    <ul class="other">
      <li>Optimisation des animations des écrans (fluidité et résolution)</li>
      <li>Optimisation de la base de donnée</li>
    </ul>
  </div>
  <div id="2" class="row changelog-corp hidden">
    <h3 class="changelog">Version 2 - Terminé (01/02/2017)</h3>
    <ul class="add">
      <li>Page d'actualites/meteo</li>
      <li>Gestion des video Youtube dans les news</li>
      <li>Album photo</li>
      <li>Animations diverses</li>
      <li>Configuration par ecran</li>
      <li>Mise en place d'une page de maintenance</li>
      <li>Systeme d'apercu</li>
      <li>Véritable systeme de template</li>
    </ul>
    <ul class="remove">
      <li>Toute les vues doublons</li>
      <li>Lignes de code inutiles</li>
      <li>Chargement de librairies, helpers, modeles inutiles</li>
    </ul>
    <ul class="other">
      <li>Corections de syntaxe php dans les vues</li>
      <li>Optimisation du format des données</li>
      <li>Grosse restructuration du code, modèle MVC</li>
      <li>Alègement du code pour amélioration des performances (BestPractices CodeIgniter)</li>
    </ul>
  </div>
  <div id="1-02" class="row changelog-corp hidden">
    <h3 class="changelog">Version 1.02 - Terminé</h3>
    <ul class="add">
      <li>Changer visibilité au clic sur l'icone</li>
      <li>Systéme de "phrase du jour" aléatoire</li>
    </ul>
    <ul class="remove">
    </ul>
    <ul class="other">
    </ul>
  </div>
  <div id="1-01" class="row changelog-corp hidden">
    <h3 class="changelog">Version 1.01 - Terminé</h3>
    <ul class="add">
      <li>Ajout d'une confirmation à la supression des news</li>
      <li>Ajout des icones dynamique de la météo</li>
      <li>Ajout du changelog</li>
      <li>Ajout des news du BDE</li>
      <li>Ajout du refresh auto date et meteo du header</li>
    </ul>
    <ul class="remove">
      <li>Correction du bug d'affchage du carrousel</li>
    </ul>
    <ul class="other">
      <li>Mise en page syntaxique du code source</li>
      <li>Correction de la police du texte sur le slide</li>
    </ul>
  </div>
  <div id="1" class="row changelog-corp hidden">
    <h3 class="changelog">Version 1.0 - 04/01/2017 </h3>
    <ul class="add">
      <li>Ajout du service de News</li>
      <ul class="add">
        <li>Page de création</li>
        <li>Page d'édition</li>
      </ul>
    </ul>
    <ul class="remove">
    </ul>
    <ul class="other">
    </ul>
  </div>
  <div class="row">
    <div class="pull-left">
      <a href="<?php echo  site_url('admin'); ?>" type="button" class="btn btn-perso btn-danger"><i class="fa fa-arrow-left fa-fw" aria-hidden="true"></i> Retour</a>
    </div>
  </div>
</div>

<script type="text/javascript">
  var currentVersion = <?php echo $configs[0]['value']; ?>;

  if ($('#version option:selected').text() == currentVersion) {
    $('#version').toggleClass('currentVersion');
  } else {
    $('#version').toggleClass('oldVersion');
  }

  $('#version').change(function() {
    value = $("#version option:selected").val();
    console.log("change to " + value);
    version = '#' + value;

    $('.changelog-corp').each(function() {
      if (!$(this).hasClass('hidden')) {
        $(this).addClass('hidden');
      }
    });

    if ($('#version option:selected').text() == currentVersion) {
      $('#version').addClass('currentVersion');
      $('#version').removeClass('oldVersion');
    } else {
      $('#version').removeClass('currentVersion');
      $('#version').addClass('oldVersion');
    }

    $(version).removeClass('hidden');
  });
</script>