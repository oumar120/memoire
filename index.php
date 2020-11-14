
<!DOCTYPE html>
<html lang="fr">

<head>
  <meta charset="utf-8">
  <title>e-memoire</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="">
  <meta name="author" content="">
  <!-- styles -->
  <link href="assets/css/bootstrap.css" rel="stylesheet">
  <link href="assets/css/bootstrap-responsive.css" rel="stylesheet">
  <link href="assets/css/prettyPhoto.css" rel="stylesheet">
  <link href="assets/js/google-code-prettify/prettify.css" rel="stylesheet">
  <link href="assets/css/flexslider.css" rel="stylesheet">
  <link href="assets/css/style.css" rel="stylesheet">
  <link href="assets/color/default.css" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css?family=Droid+Serif:400,600,400italic|Open+Sans:400,600,700" rel="stylesheet">

  <!-- fav and touch icons -->
  <link rel="shortcut icon" href="assets/ico/logo.png">
  <link rel="apple-touch-icon-precomposed" sizes="144x144" href="assets/ico/apple-touch-icon-144-precomposed.png">
  <link rel="apple-touch-icon-precomposed" sizes="114x114" href="assets/ico/apple-touch-icon-114-precomposed.png">
  <link rel="apple-touch-icon-precomposed" sizes="72x72" href="assets/ico/apple-touch-icon-72-precomposed.png">
  <link rel="apple-touch-icon-precomposed" href="assets/ico/apple-touch-icon-57-precomposed.png">
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
              <a href="index.php"><img src="assets/img/logo.jpg" alt="" /></a>
            </div>
            <!-- end logo -->

            <!-- top menu -->
            <div class="navigation">
              <nav>
                <ul class="nav topnav">
                  <li class="active">
                    <a href="index.php"><i class="icon-home"></i> Accueil </a>
                  </li>
                  <li> 
                    <a href="formulaire.html"><i class="icon-cloud-upload"></i> Publiez votre Memoire</a>
                  </li>
                  <li>
                    <a href="apropos.html"><i class="icon-briefcase"></i> a propos</a>
                  </li>
                    
                </ul>
              </nav>
            </div>
            <!-- end menu -->

          </div>
        </div>
      </div>
    </header>
    <section id="intro">

      <div class="container">
        <div class="row">
          <div class="span12">
            <!-- Place somewhere in the <body> of your page -->
            <div id="mainslider" class="flexslider">
              <ul class="slides">
                <li data-thumb="assets/img/slides/flexslider/estm.jpg">
                  <img src="assets/img/slides/flexslider/estm.jpg" alt="" />
                  <div class="flex-caption primary">
                    <p>Premier site web permettant aux etudiants des universités <br/> public et privés du sénégal de publier leurs memoires ou thèses<br/> de manière tout à fait gratuit</p>
                  </div>
                </li>
                <li data-thumb="assets/img/slides/flexslider/ucad.jpg">
                  <img src="assets/img/slides/flexslider/ucad.jpg" alt="" />
                  <div class="flex-caption warning">
                    <p>Que vous souhaitiez publier votre mémoire ou que vous soyiez<br/> à la recherche de mémoire pour élaborer un document académique,<br/> e-memoire saura répondre à vos attentes</p>
                  </div>
                </li>
                <li data-thumb="assets/img/slides/flexslider/ugb.jpg">
                  <img src="assets/img/slides/flexslider/ugb.jpg" alt="" />
                  <div class="flex-caption success">
                    <p>Une fois publié, votre mémoire sert de guide à des milliers <br/> d'étudiants du meme domaine <br/>De quoi etre fier! </p>
                  </div>
                </li>
                <li data-thumb="assets/img/slides/flexslider/uasz.jpg">
                  <img src="assets/img/slides/flexslider/uasz.jpg" alt="" />
                </li>
                <li data-thumb="assets/img/slides/flexslider/thies.jpg">
                  <img src="assets/img/slides/flexslider/thies.jpg" alt="" />
                </li>
                <li data-thumb="assets/img/slides/flexslider/uadb.jpg">
                  <img src="assets/img/slides/flexslider/uadb.jpg" alt="" />
                </li>
              </ul>
            </div>
          </div>
        </div>
      </div>
    </section>
    <div class="container">
      <div class="row">
          <form action="recherche.php" method="get" class="form-inline pull-right span12">
      <input type="text" name="search" placeholder="rechercher par titre,filiere,universite ou niveau" class="span7 form-control" style="margin-top:4px;">
              <input type="submit" name="rechercher" value="rechercher" class="btn form-control" style="background-color:rgb(52,152,219);color:white;margin-top:4px;">
</form>
        
      </div>
      
    </div>
    <?php
       include ("connexion.php");
     $req=$bdd->query('select titre,auteur,filiere,universite,diplome,fichier,YEAR(date_creation) AS an,MONTH(date_creation) AS mois,DAY(date_creation) AS jour,HOUR(date_creation) AS heure,MINUTE(date_creation) AS minute,SECOND(date_creation) AS second from info where etat="valide" order by date_creation desc limit 0,10');
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
                <h4><strong>universite:</strong> <?php echo $donnee['universite'] ;?></h4>
                  <h4><strong>Filiere:</strong> <?php echo $donnee['filiere'] ;?></h4>
                </div>

              <div class="cta list-group-item-text pull-right">
            <a target="_blank" title="ouvrir le fichier" class="btn btn-large btn-theme" href="memoire/<?php echo $donnee['fichier'];?>">
              <i class="icon-open icon-white"></i>Ouvrir</a>
              </div>
              </div>   
            <!-- end tagline -->
          </div>
        </div> 
    </section>
   <?php }?>
 <ul class="pager">
<li><a href="page.php?p=1" >1</a></li>
<li><a href="page.php?p=2">2</a></li>
<li><a href="page.php?p=3">3</a></li>
<li><a href="page.php?p=4">4</a></li>
<li><a href="page.php?p=5">5</a></li>
<li><a href="page.php?p=6">6</a></li>
<li><a href="page.php?p=7">7</a></li>
<li><a href="page.php?p=8">8</a></li>
<li><a href="page.php?p=9">9</a></li>
<li><a href="page.php?p=10">10</a></li>
</ul>
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
  <?php
   if (!empty($_GET['m'])) {
     $m=$_GET['m'];
  if ($m==1) {?>
    <script>
alert("Publication reussie! votre mémoire est en cours de validation "+"      "+" Merci pour votre contribution");
    </script>
 <?php }}?>
</body>
</html>
