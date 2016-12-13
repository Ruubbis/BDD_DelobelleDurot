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
<?php include('fonctionsBase.php'); ?>
<?php include('vue.php');?>
 
</head>


<body class="container">
<h1>Projet Base de Données</h1>
<br><br>
<?php 
	error_reporting(E_ALL);
	
	displaySalle(getSalles());

	foreach (listeSalle() as $value){ 
		contenuSalle(getcontentSalle(),$value);
	}
?>



</body>


</html>
