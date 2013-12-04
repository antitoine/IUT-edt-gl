<!DOCTYPE html>
<html>
<head>
	<meta http-equiv="content-type" content="text/html; charset=utf-8">
	<link rel="stylesheet" media="screen" type="text/css" title="design" href="CSS/design.css" />
	<link rel="shortcut icon" type="image/png" href="Images/mafavicon.png" />
	<title></title>
</head>
<body>
	<header class="connexion">
		<h1>Connexion aux emplois du temps - I.U.T Montpellier 2</h1>
	</header>
	<div id="content" class="affichageEdt">
	<table border="1">
		<caption> Emploi du temps </caption> 
		<tr> 
			<th> Horraire </th>
			<th> Lundi </th>
			<th> Mardi </th> 
			<th> Mercredi </th>
			<th> Jeudi </th>
			<th> Vendredi </th>
			<th> Samedi </th>
			<th> Dimanche </th>
		</tr>
<?php
	for($i=0;$i<48;i++){
		echo "<tr>";
		echo "<th> 8:00 </th>";
		for($j=0;$j<7;i++){
			echo "<td></td>";
		}
		echo "</tr>";
	}
?>
	</TABLE> 
	</div>
	<footer class="connexion">
	</footer>
	</div>
</body>
</html>
