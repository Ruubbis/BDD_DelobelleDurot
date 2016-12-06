<?php

function displaySalle($data){ 
?>
  <table class="table">
  	<thead>
  	  <tr><th>Numero</th><th>Capacite</th><th>Temperature</th></tr>
  	</thead>
  	<tbody>
  	<?php 
  	while ($row = pg_fetch_row($data)){
  		print("<tr><td>".$row[0]."</td><td>".$row[1]."</td><td>".$row[2]."</td></tr>");
  	}
  	?>
	</tbody>
  </table>
<?php 
}
function test(){
	print("test");
}

/*function listeDomaines($data,$domaine){	
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
*/?>
