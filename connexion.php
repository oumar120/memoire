<?php 
$bdd= new PDO('mysql:host=localhost;dbname=memoire','root','',array(PDO::ATTR_ERRMODE=>PDO::ERRMODE_EXCEPTION));
if(!$bdd){
	echo"Connexion impossible";
	exit;
}
?>