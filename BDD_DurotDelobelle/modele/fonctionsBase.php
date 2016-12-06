<?php

function connexion($db_name){
	$c = pg_connect("host=localhost dbname=$db_name user=mdelobel password=postgres") 
	or die('Connexion impossible :'.pg_last_error());
	return $c;
}


function deconnexion($db){
	pg_close($db);
}


function getSalles(){
	$db=connexion('Projet_DelobelleDurot');
	$query = "SELECT * FROM listesalle;";
	$result = pg_query($db,$query) or die ('Echec de la requete :'. pg_last_error());
	return $result;
}
?>