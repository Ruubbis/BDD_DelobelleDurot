<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8" />
<title>Bureau d'étude PEIP 2016</title>
<meta name="viewport" content="width=device-width, initial-scale=1.0" />
<link href="./css/bootstrap.css" rel="stylesheet" type="test/css" />
<link href="./css/bootstrap.min.css" rel="stylesheet" type="test/css" />
<link href="./css/bootstrap-theme.min.css" rel="stylesheet" type="test/css"/>
<link rel="stylesheet" href="http://cdn.leafletjs.com/leaflet-0.7.3/leaflet.css" />
<script src="http://cdn.leafletjs.com/leaflet-0.7.3/leaflet.js"></script>
<?php include('modele/fonctionsBase.php'); ?>
<?php include('vue/vue.php'); ?>

<script type="text/javascript">
  function init_markers() {
	  var plotll, plotmark, url,nom ;
	  var map = new L.Map('map');
	  
	  // Utilisation de OpenStreetmap pour les cartes
	  var osmUrl='http://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png';
	  var osmAttrib='Map data <a href="http://openstreetmap.org">OpenStreetMap</a> contributors';
	  var osm = new L.TileLayer(osmUrl, {minZoom: 3, maxZoom: 150, attribution: osmAttrib});
	  map.addLayer(osm);

	<?php 
		mapMarker(getEcoles());
	?>
      // carte centree sur dernier point
	  map.setView(plotll,6);  
    }
 </script>

<style type="text/css">
#map {
	height: 600px;
}
</style>


</head>


<body class="container" onLoad="init_markers();">
<h1 >Bureau d'étude Polytech 2016</h1>
<h2>Gestion des sites polytech</h2>


<div class="btn-group btn-group-justified" role="group" aria-label="...">
  <div class="btn-group" role="group">
    <a href="./index.html"><button type="button" class="btn btn-default">Index</button></a>
  </div>
  <div class="btn-group" role="group">
    <a href="./admin.php"><button type="button" class="btn btn-default">Tableau des ecoles</button></a>
  </div>
  <div class="btn-group" role="group">
    <a href="./carte.php"><button type="button" class="btn btn-default">Carte des ecoles</button></a>
  </div>
  <div class="btn-group" role="group">
    <a href="./carteMeteo.php"><button type="button" class="btn btn-default" data-toggle="carteMeteo.php">Carte Meteo</button></a>
  </div> 
  <div class="btn-group" role="group">
    <a href="./mobile.php"><button type="button" class="btn btn-default" data-toggle="mobile.php">Mobile</button></a>
  </div>  
  </div>
  <br>


<section>
  <div id="map"> </div>
</section>   
  
  </body>