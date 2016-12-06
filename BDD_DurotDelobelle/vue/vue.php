<?php

include('../modele/fonctionsBase.php');


function starCode(){
	for($i=0;$i<=100;$i++){
		print(".stars-".$i.":after { width: ".$i."%; }");
	}
}

function starPrint($note){
	print('<div><span class="stars-container stars-'.$note.'">★★★★★</span></div>');
}


function mapMarker($data){
	while ($row = pg_fetch_row($data)) {
		print("plotll = new L.LatLng(".$row[3].",".$row[4].", true);\n");
		print("plotmark = new L.Marker(plotll);\n");
		print("map.addLayer(plotmark);\n");
		print("plotmark.bindPopup('");
		print('<div id="info">');
		print(rtrim($row[1])."<br>");
		print(rtrim($row[7])." - ".rtrim($row[8])."<br>");
		/*if(rtrim($row[2]) != ""){
			print("<a href=".rtrim($row[2]).">Site Web</a><br>");
		}
		if($row[6] != ""){
			print("Telephone : ".$row[6]."<br>");
		}
		print("Prix moyen :".$row[5]."€<br>");
		$moy = moyenne($row[0]);
		//if ($moy!=-1){
		//	starPrint(intval($moy * 100 / 5));
		//}*/
		print("<a href=\"./pages/comments.php?id=$row[0]\">Plus d\'info</a>");
		print("</div>');\n");
		}
}




?>
