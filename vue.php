<?php

function displaySalle($data){ 
	print("<h3>Liste des salles</h3>");
	?>
  	<table class="table table-bordered table-hover">
  	<thead>
  	  <tr class="active"><th>Numero</th><th>Capacite</th><th>Temperature</th></tr>
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



function remplissage($salle){
	$content = getcontentSalle();
	$contenu;
	$max;
	while ($row = pg_fetch_row($content)){
		if($row[0]==$salle){
			$max=$row[2];
			$contenu++;
		}
	}
	return (($contenu/$max)*100);
}



function printState($value){
	if ($value<=60){
		print("progress-bar-success");
	}
	else if($value>60 && $value<90){
		print("progress-bar-warning");
	}
	else{
		print("progress-bar-danger");
	}
}



function contenuSalle($data,$salle){
		print("<h3>Contenu de la salle ".$salle."</h3>");
	
	?>
		<div class="progress">
  			<div class="progress-bar <?php printState(remplissage($salle))?>" role="progressbar" aria-valuenow="70" aria-valuemin="0" aria-valuemax="100" style="width:<?php print(remplissage($salle));?>%"><?php print(remplissage($salle));?>%
			</div>
		</div>
		<table class="table table-bordered table-hover">
  		<thead>
  	  		<tr class="active"><th>Numero Palette</th><th>Code Produit</th><th>Temp Min</th><th>Temp Max</th><th>Quantite</th></tr>
  		</thead>
  		<tbody>
  			<?php 
			while ($row = pg_fetch_row($data)){
				if($row[0]==$salle){
					if($row[8]=="t"){
						print("<tr><td>".$row[3]."</td><td>".$row[4]."</td><td>".$row[5]."</td><td>".$row[6]."</td><td>".$row[7]."</td></tr>\n");
					}	
					else{
						print("<tr class=\"danger\"><td>".$row[3]."</td><td>".$row[4]."</td><td>".$row[5]."</td><td>".$row[6]."</td><td>".$row[7]."</td></tr>\n");	
					}
				}
			}
	?>
		</tbody>
  		</table>

<?php 
}
?>
