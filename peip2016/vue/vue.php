<?php

function afficheTablesEcoles($data,$domaine){ ?>
  <table class="table">
  	<thead>
  	  <tr><th>Nom</th><th>URL</th><th>Latitude</th><th>Longitude</th></tr>
  	</thead>
  	<tbody>
<?php  
	$listEcole = array();
	if($domaine != "Tous"){
		$ecoleDomaine = getEcolesParDomaine($domaine);
		while ($row = pg_fetch_row($ecoleDomaine)){
			$listEcole[]=$row[0];//Ne recupere que les noms des ecoles
		}
	}
	
	while ($row = pg_fetch_row($data)) {
		if(in_array($row[0],$listEcole) OR $domaine=="Tous"){ //Verifie les noms des ecoles
		print("<tr><td>".$row[0]."</td><td><a href=".$row[1].">".$row[1]."</a></td><td>".$row[2]."</td><td>".$row[3]."</td></tr>");
		}
	}
?>
	</tbody>
  </table>
  
  
<?php
}

function listeDomaines($data,$domaine){	
	while ($row = pg_fetch_row($data)){
		if($row[0]==$domaine){
		print("<option selected value=".$row[0].">".$row[1]."</option>");
		}
		else{
			print("<option value=".$row[0].">".$row[1]."</option>");
		}
	}
}


function listeEcoles($selected){
	$data = getEcoles();
	while ($row = pg_fetch_row($data)){
		if(rtrim($row[0])==$selected){
			print("<option selected value=".$row[0].">".$row[0]."</option>");
		}
		else{
			print("<option value=".$row[0].">".$row[0]."</option>");
		}
	}
}


function mapMarker($data){
	while ($row = pg_fetch_row($data)) {
		print("plotll = new L.LatLng("."$row[2]".",".$row[3].", true);\n");
		print("plotmark = new L.Marker(plotll);\n");
		print("map.addLayer(plotmark);\n");
		print("plotmark.bindPopup('<a href=".$row[1].">Polytech ".$row[0]."</a>');\n");
		}
}

function mapMeteoMarker($data){
	while ($row = pg_fetch_row($data)) {
		$nom = rtrim($row[0]);
		print("plotll = new L.LatLng(".$row[2].",".$row[3].", true);\n");
		print("plotmark = new L.Marker(plotll);\n");
		print("map.addLayer(plotmark);\n");
		print("plotmark.bindPopup(\"");
		displayMeteoData($nom);
		print("\");");
	}
}

function kelvin2Celsius($temp){
	return $temp - 273.15;
}


function displayMeteoData($nom){
	$meteo = getDonneesMeteo($nom);
	print("<a href='".rtrim($meteo['url'])."'>Polytech ".$nom."</a><br>");
	print("Description : ".$meteo['description'] ."<br>");
	print("Temperature : ".kelvin2Celsius($meteo['temperature'])." °C<br>");
	print("<img src= '".$meteo['urlIcon']."'/><br>");
}

?>