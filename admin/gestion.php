<!DOCTYPE html>
<html lang="fr">

<head>
  <meta charset="utf-8">
  <title>Memoire ESTM</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="">
  <meta name="author" content="">
  <!-- styles -->
  <link href="../assets/css/bootstrap.css" rel="stylesheet">
  <link href="../assets/css/bootstrap-responsive.css" rel="stylesheet">
  <link href="../assets/css/prettyPhoto.css" rel="stylesheet">
  <link href="../assets/js/google-code-prettify/prettify.css" rel="stylesheet">
  <link href="../assets/css/flexslider.css" rel="stylesheet">
  <link href="../assets/css/style.css" rel="stylesheet">
  <link href="../assets/color/default.css" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css?family=Droid+Serif:400,600,400italic|Open+Sans:400,600,700" rel="stylesheet">

  <!-- fav and touch icons -->
  <link rel="shortcut icon" href="../assets/ico/favicon.ico">
  <link rel="apple-touch-icon-precomposed" sizes="144x144" href="../assets/ico/apple-touch-icon-144-precomposed.png">
  <link rel="apple-touch-icon-precomposed" sizes="114x114" href="../assets/ico/apple-touch-icon-114-precomposed.png">
  <link rel="apple-touch-icon-precomposed" sizes="72x72" href="../assets/ico/apple-touch-icon-72-precomposed.png">
  <link rel="apple-touch-icon-precomposed" href="assets/ico/apple-touch-icon-57-precomposed.png">

  <!-- =======================================================
    Theme Name: Lumia
    Theme URL: https://bootstrapmade.com/lumia-bootstrap-business-template/
    Author: BootstrapMade.com
    Author URL: https://bootstrapmade.com
  ======================================================= -->
</head>


<body>
  <div id="wrapper">
    <header>
      <!-- Navbar
    ================================================== -->
      <div class="navbar navbar-static-top">
        <div class="navbar-inner">
          <div class="container">
            <!-- logo -->
            <div class="logo">
              <a href="../index.php"><img src="assets/img/logo.jpg" alt="" /></a>
            </div>
            <!-- end logo -->

            <!-- top menu -->
            <div class="navigation">
              <nav>
                <ul class="nav topnav">
                  <li class="active">
                    <a href="../index.php"><i class="icon-home"></i> Accueil </a>
                  </li>
                  <li> 
                    <a href="../formulaire.php"><i class="icon-cloud-upload"></i> Publiez votre Memoire</a>
                  </li>
                  <li>
                    <a href="../apropos.html"><i class="icon-briefcase"></i> a propos</a>
                  </li>
                    
                </ul>
              </nav>
            </div>
            <!-- end menu -->

          </div>
        </div>
      </div>
    </header>
    <?php
     include ("../connexion.php");
     $req=$bdd->query('select id,titre,auteur,filiere,fichier,universite,diplome,YEAR(date_creation) AS an,MONTH(date_creation) AS mois,DAY(date_creation) AS jour,HOUR(date_creation) AS heure,MINUTE(date_creation) AS minute,SECOND(date_creation) AS second from info where etat="invalide" order by date_creation desc');
     while ($donnee=$req->fetch()) {
     ?>
    <section id="maincontent">
      <div class="container">

        <div class="row">
          <div class="span12">
            <div class="call-action">
              <div class="list-group">
                <div class="list-group-item-heading">
                  <h6 class="pull-right">
                    <?php echo $donnee['jour'].'/'.$donnee['mois'].'/'.$donnee['an'].' '.$donnee['heure'].'h:'.$donnee['minute'].'min'; ?></h6>
                <h4><?php echo $donnee['titre'];  ?> </h4>
                <h6><strong>universite</strong> <?php echo $donnee['universite'] ;?></h6>
                  <h6><strong>Filiere</strong> <?php echo $donnee['filiere'] ;?></h6>
                <h6><strong>niveau</strong> <?php echo $donnee['diplome'] ;?></h6>
                <h6><strong>auteur</strong> <?php echo $donnee['auteur'] ;?></h6>
                </div>

              <div class="cta list-group-item-text pull-right">
              <a class="btn btn-large btn-theme" href="gestion.php?val=<?php echo $donnee['id'];?>">
              <i class="icon-open icon-white"></i>valider</a>
              <a class="btn btn-large btn-theme" href="gestion.php?sup=<?php echo $donnee['id'];?>">
              <i class="icon-open icon-white"></i>supprimer</a>
            <a target="_blank" class="btn btn-large btn-theme" href="../memoire/<?php echo $donnee['fichier'];?>">
              <i class="icon-open icon-white"></i>Ouvrir</a>
              </div>
              </div> 

            
            <!-- end tagline -->
          </div>
        </div> 
    </section>
  <?php } ?>
    <!-- Footer
 ================================================== -->
    <footer class="footer">
      
      <div class="verybottom">
        <div class="container">
          <div class="row">
              <p style="text-align: center;">
                 2020 - Tout droit reservé
              </p>
          </div>
        </div>
      </div>
    </footer>

  </div>
  <!-- end wrapper -->
  <a href="#" class="scrollup"><i class="icon-chevron-up icon-square icon-48 active"></i></a>

  <script src="assets/js/jquery.js"></script>
  <script src="assets/js/raphael-min.js"></script>
  <script src="assets/js/jquery.easing.1.3.js"></script>
  <script src="assets/js/bootstrap.js"></script>
  <script src="assets/js/google-code-prettify/prettify.js"></script>
  <script src="assets/js/jquery.elastislide.js"></script>
  <script src="assets/js/jquery.prettyPhoto.js"></script>
  <script src="assets/js/jquery.flexslider.js"></script>
  <script src="assets/js/jquery-hover-effect.js"></script>
  <script src="assets/js/animate.js"></script>

  <!-- Template Custom JavaScript File -->
  <script src="assets/js/custom.js"></script>

</body>
</html>
<?php
if (!empty($_GET['val'])) {
   $val=$_GET ['val'];
   include('../connexion.php');
   $bdd->query('update info set etat="valide" where id='.$val);
}
if (!empty($_GET['sup'])) {
   $sup=$_GET ['sup'];
   include('../connexion.php');
   $bdd->query('delete from info where id='.$sup);
}

?>