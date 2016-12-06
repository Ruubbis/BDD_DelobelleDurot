<?php

function connexion($db_name){
	$c = pg_connect("host=localhost dbname=$db_name user=mdelobel password=postgres") 
	or die('Connexion impossible :'.pg_last_error());
	return $c;
}


function deconnexion($db){
	pg_close($db);
}


function getEcoles(){
	$db=connexion('mdelobel_ecole');
	$query = "SELECT * FROM ecole;";
	$result = pg_query($db,$query) or die ('Echec de la requete :'. pg_last_error());
	return $result;
}


function getDomaines(){
	$db=connexion('mdelobel_ecole');
	$query = "SELECT * FROM domaine;";
	$result = pg_query($db,$query) or die ('Echec de la requete :'.pg_last_error());
	return $result;
}

function getNomDomaine($id){
	$db=connexion('mdelobel_ecole');
	$query = "SELECT nom FROM domaine WHERE id= $id;";
	$result = pg_query($db,$query) or die ('Echec de la requete :'.pg_last_error());
	return $result['nom'];
}


function getEcolesParDomaine($entry){
	$db=connexion('mdelobel_ecole');
	$query = "SELECT refecole, domaine.nom FROM domaine_ecole JOIN domaine ON id=refdomaine WHERE domaine.id=$entry";
	$result = pg_query($db,$query) or die ('Echec de la requete :'.pg_last_error());
	return $result;	
}

function getDonneesMeteo($nom){
	
	$data = getEcoles();
	while ($row = pg_fetch_row($data)) {
		if(rtrim($row[0])==rtrim($nom)){ //Verifie les noms des ecoles
			$lat = $row[2];
	 		$long = $row[3];
	 		$url = $row[1];
			}
		}
	
	$meteo_url = "http://api.openweathermap.org/data/2.5/weather?lang=fr&lat=".$lat."&lon=".$long."&appid=ec0f4fe491c8fb8336a613588b00ef74";
	$service = curl_init();
	curl_setopt($service,CURLOPT_URL, $meteo_url);
	curl_setopt($service,CURLOPT_PROXY, "proxy.polytech-lille.fr");
	curl_setopt($service,CURLOPT_PROXYPORT, 3128);
	curl_setopt($service,CURLOPT_RETURNTRANSFER, 1);
		
	$query = json_decode(curl_exec($service));
	curl_close($service);
	$t = $query -> weather;
	$desc = $t[0] -> description;
	$icon = $t[0] -> icon;
	
	$meteo = Array(
			'nom' => $nom,
			'url' => $url,
			'description' => $desc,
			'temperature' => $query -> main -> temp,
			'urlIcon' => "http://openweathermap.org/img/w/".$icon.".png"
			);	
	
	return $meteo;
	
}
?>