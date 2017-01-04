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
	deconnexion($db);
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
	deconnexion($db);
	return $result;
}

function getetatSalle(){
	$db=connexion('Projet_DelobelleDurot');
	$query = "SELECT * FROM etatSalle;";
	$result = pg_query($db,$query) or die ('Echec de la requete :'. pg_last_error());
	deconnexion($db);
	return $result;
}

function getpaletteSeule(){
	$db=connexion('Projet_DelobelleDurot');
	$query = "SELECT * FROM paletteSeule;";
	$result = pg_query($db,$query) or die ('Echec de la requete :'. pg_last_error());
	deconnexion($db);
	return $result;
}

function deplacementPossible($palette,$salle){
	$paletteSeule = getpaletteSeule();
	$listeSalle = getetatSalle();
	$tempMin = 0;
	$tempMax = 0;

	while ($row = pg_fetch_row($paletteSeule)){
		if($row[0] == $palette){
			$tempMin = $row[1];
			$tempMax = $row[2];
		}
	}

	$tempSalle = 0;
	$pleine = 'f';

	while ($row = pg_fetch_row($listeSalle)){
		if($row[0] == $salle){
			$tempSalle = $row[1];
			$pleine = $row[4];
		}
	}

	
	if((($tempMin <= $tempSalle) and ($pleine == "f")) and ($tempMax >= $tempSalle)){
		assignation($palette, $salle);
		header("Refresh:0");
		print("<script> alert(\"Assignation réussie !\"); </script>");
	}
	else{
		print("<script> alert(\"Assignation échouée !\"); </script>");	
	}
}


function assignation($palette, $salle){
	$db=connexion('Projet_DelobelleDurot');
	$query = "UPDATE palette SET lieu='$salle' WHERE code='$palette';";
	$result = pg_query($db,$query) or die ('Echec de la requete :'. pg_last_error());
	deconnexion($db);
	return $result;

}

?>
