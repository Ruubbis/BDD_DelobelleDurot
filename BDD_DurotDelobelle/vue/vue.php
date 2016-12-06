<?php

function displaySalle($data){ 
	print("<h3>Liste des salles</h3>");
	?>
  <table class="table table.striped">
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


function contenuSalle($data,$salle){
	print("<h3>Contenu de la salle ".$salle."</h3>")
	
	?>
	
	
	<table class="table table-bordered table-hover">
  	<thead>
  	  <tr class="active"><th>Numero Palette</th><th>Code Produit</th><th>Temperature Mini</th><th>Temperature Max</th><th>Quantite</th></tr>
  	</thead>
  	<tbody>
  	<?php 
	while ($row = pg_fetch_row($data)){
		if($row[0]==$salle){
			if($row[1]>=$row[4] && $row[1]<=$row[5]){
				print("<tr><td>".$row[2]."</td><td>".$row[3]."</td><td>".$row[4]."</td><td>".$row[5]."</td><td>".$row[6]."</td></tr>\n");
			}	
			else{
				print("<tr class=\"danger\"><td>".$row[2]."</td><td>".$row[3]."</td><td>".$row[4]."</td><td>".$row[5]."</td><td>".$row[6]."</td></tr>\n");	
			}
		}
	}
	?>
	</tbody>
  </table>
<?php 
}


?>
