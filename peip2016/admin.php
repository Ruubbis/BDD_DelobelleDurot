<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8" />
<title>Bureau d'étude PEIP 2016</title>
<meta name="viewport" content="width=device-width, initial-scale=1.0" />
<link href="./css/bootstrap.css" rel="stylesheet" type="test/css" />
<link href="./css/bootstrap.min.css" rel="stylesheet" type="test/css" />
<link href="./css/bootstrap-theme.min.css" rel="stylesheet" type="test/css"/>
<script type="text/javascript" src="./js/jquery.js"></script>
<script type="text/javascript" src="./js/bootstrap.min.js"></script>
<?php 
include('modele/fonctionsBase.php');
include('vue/vue.php');?>
</head>


<body class="container">
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
  
 <form action="admin.php" method="get">
 
  	<label>Choisissez un domaine à filtrer : </label>
  	<select id="domaine" name="domaine" size="1">
  		<option value="Tous">Tous</option>
<?php
	$domaine="Tous";
	extract($_GET);
	
	
  	listeDomaines(getDomaines(),$domaine);
?>
	</select>
	<input type="submit" value="Envoyer"></input>
</form>

<br><br>
  <?php 
  	afficheTablesEcoles(getEcoles(),$domaine);
  ?>
  </body>
   
