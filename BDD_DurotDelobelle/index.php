<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8" />
<title>KebabStreetMap</title>
<meta name="viewport" content="width=device-width, initial-scale=1.0" />
<link href="./css/bootstrap.css" rel="stylesheet" type="text/css" />
<link href="./css/bootstrap.min.css" rel="stylesheet" type="text/css" />
<link href="./css/bootstrap-theme.min.css" rel="stylesheet" type="text/css"/>
<!--  <link href="style/stars.css" rel="stylesheet" type="test/css"/>  -->
<script type="text/javascript" src="./js/jquery.js"></script>
<script type="text/javascript" src="star.js"></script>
<script type="text/javascript" src="./js/bootstrap.min.js"></script>
<link rel="stylesheet" href="http://cdn.leafletjs.com/leaflet-0.7.3/leaflet.css" />
<script src="http://cdn.leafletjs.com/leaflet-0.7.3/leaflet.js"></script>
<?php include('modele/fonctionsBase.php'); ?>
<?php include('vue/vue.php'); ?>

<style>
	<?php 
		//starCode();
	?>
	#map {height: 600px;}
</style>

<script type="text/javascript">
  function init_markers() {
	  var plotll, plotmark, url,nom ;
	  var map = new L.Map('map');
	  
	  // Utilisation de OpenStreetmap pour les cartes
	  var osmUrl='http://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png';
	  var osmAttrib='Map data <a href="http://openstreetmap.org">OpenStreetMap</a> contributors';
	  var osm = new L.Til<table class="tableLayer(osmUrl, {minZoom: 3, maxZoom: 150, attribution: osmAttrib});
	  map.addLayer(osm);

	<?php 
		mapMarker(getKebab());
	?>
      // carte centree sur dernier point
	  map.setView(plotll,13);  
    }
 </script>
 
 
</head>


<body class="container" onLoad="init_markers();">
<h1>KebabStreetMap</h1>
	<section>
  		<div id="map"> </div>
	</section>   

</body>


</html>