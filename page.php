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
  
    <div class="container">
      <div class="row">
        <form action="recherche.php" method="get" class="form-inline pull-right span12">
      <input type="text" name="search" placeholder="rechercher par titre,filiere,universite ou niveau" class="span7 form-control" style="margin-top:4px;">
              <input type="submit" name="rechercher" value="rechercher" class="btn form-control" style="background-color:rgb(52,152,219);color:white;margin-top:4px;">
</form>
      
    </div>
  </div>
    <?php
    if (!empty($_GET['p'])) {
      $page=$_GET['p'];
       include ("connexion.php");
      if ($page==1) {
     $req=$bdd->query('select titre,auteur,filiere,universite,diplome,fichier,YEAR(date_creation) AS an,MONTH(date_creation) AS mois,DAY(date_creation) AS jour,HOUR(date_creation) AS heure,MINUTE(date_creation) AS minute,SECOND(date_creation) AS second from info where etat="valide" order by date_creation desc limit 10,10');
      if ($req->rowCount()==0) {
       echo "<h2 style='text-align:center'>pas de contenu pour cette page!</h2>";
     }
     while ($donnee=$req->fetch()){
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
    <?php }}
    else if ($page==2) {
       $req=$bdd->query('select titre,auteur,filiere,universite,diplome,fichier,YEAR(date_creation) AS an,MONTH(date_creation) AS mois,DAY(date_creation) AS jour,HOUR(date_creation) AS heure,MINUTE(date_creation) AS minute,SECOND(date_creation) AS second from info where etat="valide" order by date_creation desc limit 20,10');
       if ($req->rowCount()==0) {
       echo "<h2 style='text-align:center'>pas de contenu pour cette page!</h2>";
     }
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
   <?php  }}
   else if ($page==3) {
       $req=$bdd->query('select titre,auteur,filiere,universite,diplome,fichier,YEAR(date_creation) AS an,MONTH(date_creation) AS mois,DAY(date_creation) AS jour,HOUR(date_creation) AS heure,MINUTE(date_creation) AS minute,SECOND(date_creation) AS second from info where etat="valide" order by date_creation desc limit 30,10');
        if ($req->rowCount()==0) {
       echo "<h2 style='text-align:center'>pas de contenu pour cette page!</h2>";
     }
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
    <?php }}
    else if ($page==4) {
       $req=$bdd->query('select titre,auteur,filiere,universite,diplome,fichier,YEAR(date_creation) AS an,MONTH(date_creation) AS mois,DAY(date_creation) AS jour,HOUR(date_creation) AS heure,MINUTE(date_creation) AS minute,SECOND(date_creation) AS second from info where etat="valide" order by date_creation desc limit 40,10');
        if ($req->rowCount()==0) {
       echo "<h2 style='text-align:center'>pas de contenu pour cette page!</h2>";
     }
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
    <?php }}
    else if ($page==5) {
       $req=$bdd->query('select titre,auteur,filiere,universite,diplome,fichier,YEAR(date_creation) AS an,MONTH(date_creation) AS mois,DAY(date_creation) AS jour,HOUR(date_creation) AS heure,MINUTE(date_creation) AS minute,SECOND(date_creation) AS second from info where etat="valide" order by date_creation desc limit 50,10');
        if ($req->rowCount()==0) {
       echo "<h2 style='text-align:center'>pas de contenu pour cette page!</h2>";
     }
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
    <?php}}
    else if ($page==6) {
       $req=$bdd->query('select titre,auteur,filiere,universite,diplome,fichier,YEAR(date_creation) AS an,MONTH(date_creation) AS mois,DAY(date_creation) AS jour,HOUR(date_creation) AS heure,MINUTE(date_creation) AS minute,SECOND(date_creation) AS second from info where etat="valide" order by date_creation desc limit 60,10');
        if ($req->rowCount()==0) {
       echo "<h2 style='text-align:center'>pas de contenu pour cette page!</h2>";
     }
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
  <?php }}
  else if ($page==7) {
       $req=$bdd->query('select titre,auteur,filiere,universite,diplome,fichier,YEAR(date_creation) AS an,MONTH(date_creation) AS mois,DAY(date_creation) AS jour,HOUR(date_creation) AS heure,MINUTE(date_creation) AS minute,SECOND(date_creation) AS second from info where etat="valide" order by date_creation desc limit 70,10');
        if ($req->rowCount()==0) {
       echo "<h2 style='text-align:center'>pas de contenu pour cette page!</h2>";
     }
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
    <?php }}
    else if ($page==8) {
       $req=$bdd->query('select titre,auteur,filiere,universite,diplome,fichier,YEAR(date_creation) AS an,MONTH(date_creation) AS mois,DAY(date_creation) AS jour,HOUR(date_creation) AS heure,MINUTE(date_creation) AS minute,SECOND(date_creation) AS second from info where etat="valide" order by date_creation desc limit 80,10');
        if ($req->rowCount()==0) {
       echo "<h2 style='text-align:center'>pas de contenu pour cette page!</h2>";
     }
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
    <?php }}
    else if ($page==9) {
       $req=$bdd->query('select titre,auteur,filiere,universite,diplome,fichier,YEAR(date_creation) AS an,MONTH(date_creation) AS mois,DAY(date_creation) AS jour,HOUR(date_creation) AS heure,MINUTE(date_creation) AS minute,SECOND(date_creation) AS second from info where etat="valide" order by date_creation desc limit 90,10');
        if ($req->rowCount()==0) {
       echo "<h2 style='text-align:center'>pas de contenu pour cette page!</h2>";
     }
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
  <?php }}
  else{
       $req=$bdd->query('select titre,auteur,filiere,universite,diplome,fichier,YEAR(date_creation) AS an,MONTH(date_creation) AS mois,DAY(date_creation) AS jour,HOUR(date_creation) AS heure,MINUTE(date_creation) AS minute,SECOND(date_creation) AS second from info where etat="valide" order by date_creation desc limit 100,10');
        if ($req->rowCount()==0) {
       echo "<h2 style='text-align:center'>pas de contenu pour cette page!</h2>";
     }
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
  <?php }}
} ?>
<div class="container">
  <div class="row"> 
<?php
  switch ($page) { case 1:?>
     <ul class="pager">
<li><a href="page.php?p=1"  style="background-color:rgb(52,152,219);color:white;">1</a></li>
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
    <?php break;  case 2:?>
     <ul class="pager">
<li><a href="page.php?p=1">1</a></li>
<li><a href="page.php?p=2" style="background-color:rgb(52,152,219);color:white;">2</a></li>
<li><a href="page.php?p=3">3</a></li>
<li><a href="page.php?p=4">4</a></li>
<li><a href="page.php?p=5">5</a></li>
<li><a href="page.php?p=6">6</a></li>
<li><a href="page.php?p=7">7</a></li>
<li><a href="page.php?p=8">8</a></li>
<li><a href="page.php?p=9">9</a></li>
<li><a href="page.php?p=10">10</a></li>
</ul>
<?php break;  case 3:?>
<ul class="pager">
<li><a href="page.php?p=1">1</a></li>
<li><a href="page.php?p=2">2</a></li>
<li><a href="page.php?p=3" style="background-color:rgb(52,152,219);color:white;">3</a></li>
<li><a href="page.php?p=4">4</a></li>
<li><a href="page.php?p=5">5</a></li>
<li><a href="page.php?p=6">6</a></li>
<li><a href="page.php?p=7">7</a></li>
<li><a href="page.php?p=8">8</a></li>
<li><a href="page.php?p=9">9</a></li>
<li><a href="page.php?p=10">10</a></li>
</ul>
<?php break;  case 4:?>
<ul class="pager">
<li><a href="page.php?p=1">1</a></li>
<li><a href="page.php?p=2">2</a></li>
<li><a href="page.php?p=3">3</a></li>
<li><a href="page.php?p=4" style="background-color:rgb(52,152,219);color:white;">4</a></li>
<li><a href="page.php?p=5">5</a></li>
<li><a href="page.php?p=6">6</a></li>
<li><a href="page.php?p=7">7</a></li>
<li><a href="page.php?p=8">8</a></li>
<li><a href="page.php?p=9">9</a></li>
<li><a href="page.php?p=10">10</a></li>
</ul>
<?php break;  case 5:?>
<ul class="pager">
<li><a href="page.php?p=1">1</a></li>
<li><a href="page.php?p=2">2</a></li>
<li><a href="page.php?p=3">3</a></li>
<li><a href="page.php?p=4">4</a></li>
<li><a href="page.php?p=5" style="background-color:rgb(52,152,219);color:white;">5</a></li>
<li><a href="page.php?p=6">6</a></li>
<li><a href="page.php?p=7">7</a></li>
<li><a href="page.php?p=8">8</a></li>
<li><a href="page.php?p=9">9</a></li>
<li><a href="page.php?p=10">10</a></li>
</ul>
<?php break;  case 6:?>
<ul class="pager">
<li><a href="page.php?p=1">1</a></li>
<li><a href="page.php?p=2">2</a></li>
<li><a href="page.php?p=3">3</a></li>
<li><a href="page.php?p=4">4</a></li>
<li><a href="page.php?p=5">5</a></li>
<li><a href="page.php?p=6" style="background-color:rgb(52,152,219);color:white;">6</a></li>
<li><a href="page.php?p=7">7</a></li>
<li><a href="page.php?p=8">8</a></li>
<li><a href="page.php?p=9">9</a></li>
<li><a href="page.php?p=10">10</a></li>
</ul>
<?php break;  case 7:?>
<ul class="pager">
<li><a href="page.php?p=1">1</a></li>
<li><a href="page.php?p=2">2</a></li>
<li><a href="page.php?p=3">3</a></li>
<li><a href="page.php?p=4">4</a></li>
<li><a href="page.php?p=5">5</a></li>
<li><a href="page.php?p=6">6</a></li>
<li><a href="page.php?p=7" style="background-color:rgb(52,152,219);color:white;">7</a></li>
<li><a href="page.php?p=8">8</a></li>
<li><a href="page.php?p=9">9</a></li>
<li><a href="page.php?p=10">10</a></li>
</ul>
<?php break;  case 8:?>
<ul class="pager">
<li><a href="page.php?p=1">1</a></li>
<li><a href="page.php?p=2">2</a></li>
<li><a href="page.php?p=3">3</a></li>
<li><a href="page.php?p=4">4</a></li>
<li><a href="page.php?p=5">5</a></li>
<li><a href="page.php?p=6">6</a></li>
<li><a href="page.php?p=7">7</a></li>
<li><a href="page.php?p=8" style="background-color:rgb(52,152,219);color:white;">8</a></li>
<li><a href="page.php?p=9">9</a></li>
<li><a href="page.php?p=10">10</a></li>
</ul>
<?php break;  case 9:?>
<ul class="pager">
<li><a href="page.php?p=1">1</a></li>
<li><a href="page.php?p=2">2</a></li>
<li><a href="page.php?p=3">3</a></li>
<li><a href="page.php?p=4">4</a></li>
<li><a href="page.php?p=5">5</a></li>
<li><a href="page.php?p=6">6</a></li>
<li><a href="page.php?p=7">7</a></li>
<li><a href="page.php?p=8">8</a></li>
<li><a href="page.php?p=9" style="background-color:rgb(52,152,219);color:white;">9</a></li>
<li><a href="page.php?p=10">10</a></li>
</ul>
<?php break;  case 10:?>
<ul class="pager">
<li><a href="page.php?p=1">1</a></li>
<li><a href="page.php?p=2">2</a></li>
<li><a href="page.php?p=3">3</a></li>
<li><a href="page.php?p=4">4</a></li>
<li><a href="page.php?p=5">5</a></li>
<li><a href="page.php?p=6">6</a></li>
<li><a href="page.php?p=7">7</a></li>
<li><a href="page.php?p=8">8</a></li>
<li><a href="page.php?p=9">9</a></li>
<li><a href="page.php?p=10" style="background-color:rgb(52,152,219);color:white;">10</a></li>
</ul>
<?php break;} ?>
  </div>
</div>
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
</body>
</html>
