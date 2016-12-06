<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8" />
<title>Projet BDD : Delobelle - Durot</title>
<meta name="viewport" content="width=device-width, initial-scale=1.0" />
<link href="./css/bootstrap.css" rel="stylesheet" type="text/css" />
<link href="./css/bootstrap.min.css" rel="stylesheet" type="text/css" />
<link href="./css/bootstrap-theme.min.css" rel="stylesheet" type="text/css"/>
<script type="text/javascript" src="./js/jquery.js"></script>
<script type="text/javascript" src="./js/bootstrap.min.js"></script>
<link rel="stylesheet" href="http://cdn.leafletjs.com/leaflet-0.7.3/leaflet.css" />
<script src="http://cdn.leafletjs.com/leaflet-0.7.3/leaflet.js"></script>
<?php include('modele/fonctionsBase.php'); ?>
<?php include('vue/vue.php');?>
 
</head>


<body class="container">
<h1>Projet Base de Donnée</h1>

<?php 
	displaySalle(getSalles());
?>

</body>


</html>