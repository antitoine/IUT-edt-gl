<?php include_once 'Templates/header.php'; ?>
    <div id="content">
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
	for($i=0;$i<48;$i++){
		echo "<tr>";
		echo "<th> 8:00 </th>";
		for($j=0;$j<7;$i++){
			echo "<td></td>";
		}
		echo "</tr>";
	}
?>
	</table> 
    </div>
<?php include_once 'Templates/footer.php'; ?>
