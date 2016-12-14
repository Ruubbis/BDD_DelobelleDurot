<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8" />
<title>Projet BDD : Delobelle - Durot</title>
<meta name="viewport" content="width=device-width, initial-scale=1.0" />
<link href="./css/bootstrap.css" rel="stylesheet" type="text/css" />
<link href="./css/bootstrap-theme.min.css" rel="stylesheet" type="text/css"/>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>


<?php include('fonctionsBase.php'); ?>
<?php include('vue.php');?>
 
</head>


<body class="container">
<h1>Projet Base de Données</h1>
<div style="margin:20px auto 0 auto; height:1px; background-color:#888888; width:100%;"></div><br>
<?php 
	error_reporting(E_ALL);
	
	displaySalle(getSalles());
	print("</br></br><ul class=\"nav nav-tabs nav-pills nav-justified\">");

	print("<li class=\"active\"><a data-toggle=\"tab\" href=\"#".listeSalle()[0]."\">".listeSalle()[0]."</a></li>");
	foreach (array_slice(listeSalle(), 1) as $value){ 
		print("<li><a data-toggle=\"tab\" href=\"#".$value."\">".$value."</a></li>");
	}

	print("</ul></br>");

	print("<div class=\"tab-content\">");
	print("<div id=\"".listeSalle()[0]."\" class=\"tab-pane fade in active\">");
	contenuSalle(getcontentSalle(),listeSalle()[0]);
	print("</div>");
	foreach (array_slice(listeSalle(), 1) as $value){ 
		print("<div id=\"".$value."\" class=\"tab-pane fade\">");
		contenuSalle(getcontentSalle(),$value);
		print("</div>");
	}
?>
</div>


</body>


</html>
