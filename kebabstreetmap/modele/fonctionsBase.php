<?php

function connexion($db_name){
	$c = pg_connect("host=localhost dbname=$db_name user=mdelobel password=postgres") 
	or die('Connexion impossible :'.pg_last_error());
	return $c;
}


function deconnexion($db){
	pg_close($db);
}


function getKebab(){
	$db=connexion('kebabstreetmap');
	$query = "SELECT * FROM liste_kebab;";
	$result = pg_query($db,$query) or die ('Echec de la requete :'. pg_last_error());
	return $result;
}


function getNotes($id){
	$db=connexion('kebabstreetmap');
	$query = "SELECT * FROM notes WHERE refkebab = ".$id.";";
	$result = pg_query($db,$query) or die ('Echec de la requete :'. pg_last_error());
	return $result;
}


function moyenne($id){
	$notes = getNotes($id);
	$sum = 0;
	$compt = 0;
	while ($row = pg_fetch_row($notes)){
		$sum += $row[1];
		$compt +=1;
		}
	if ($compt>0){
		$moy = $sum/$compt;
	}
	else{
		$moy = -1;
	}
	return $moy;	
}


function getComments($id){
	$db=connexion('kebabstreetmap');
	$query = "SELECT * FROM comments WHERE refkebab = ".$id.";";
	$result = pg_query($db,$query) or die ('Echec de la requete :'. pg_last_error());
	return $result;
}

function addNotes($kebab,$note){
	$db=connexion('kebabstreetmap');
	$query = "INSERT INTO notes ($kebab,$notes);";
	$result = pg_query($db,$query) or die ('Echec de la requete :'. pg_last_error());
	return $result;
}

function addComment($owner, $text, $refkebab){
	$db=connexion('kebabstreetmap');
	$query = "INSERT INTO comments (owner,text,refkebab) VALUES ($owner, $text, $refkebab);";
	$result = pg_query($db,$query) or die ('Echec de la requete :'. pg_last_error());
	return $result;
}

?>
