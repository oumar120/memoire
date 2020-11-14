<?php 
// Pour se connecter a la base de donnee db_school, on appelle le fichier de connexion
  include("connexion.php");

if(isset($_POST['envoyer'])){
	//On utilse la fonction trim() qui enléve les espace de debut et de fin de chaine
	$titre =htmlspecialchars($_POST['titre']);
	$auteur =htmlspecialchars($_POST['auteur']);
	$filiere=htmlspecialchars($_POST['filiere']);
	$universite=htmlspecialchars($_POST['universite']);
	$diplome=htmlspecialchars($_POST['diplome']);;
	$memoire=$_FILES['memoire']['name'];
	// chargement du fichier cv dans repertoire CV
	 if (isset($_FILES['memoire']) and $_FILES['memoire']['error']==0) {
	 	if($_FILES['memoire']['size']<=10000000){
	 		$extensionInfo=pathinfo($_FILES['memoire']['name']);
	 		$extensionUpload=$extensionInfo['extension'];
	 		$extensionAutorise=array('pdf','PDF','doc','docx');
	 		if(in_array($extensionUpload,$extensionAutorise)){
             move_uploaded_file($_FILES['memoire']['tmp_name'],'memoire/'.basename($memoire));
              $result=$bdd->prepare('insert into info (titre,auteur,filiere,universite,diplome,fichier,date_creation) value(?,?,?,?,?,?,NOW())');
               $req=$result->execute(array($titre,$auteur,$filiere,$universite,$diplome,$memoire));
	 		}
	 	}
	 }
	// Ecriture de la requete d'insertion sur la table etudiant
      if($req){ 
		  header("location:index.php?m=1");exit;
	  }else{
		  header("location:404.html");exit;
	}
}
?>





