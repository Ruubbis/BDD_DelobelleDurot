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

function listeSalle(){
	$list = array();
	$salle = getSalles();
	while ($row = pg_fetch_row($salle)){
		$list[]=$row[0];
	}
	return $list;
}


function getcontentSalle(){
	$db=connexion('Projet_DelobelleDurot');
	$query = "SELECT * FROM contenu;";
	$result = pg_query($db,$query) or die ('Echec de la requete :'. pg_last_error());
	return $result;
}

?>
