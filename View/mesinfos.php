<?php include_once 'Templates/header.php'; ?>
	<div class="content">
	<h3>Mes informations</h3>
	<p>
		ID : <?php echo $var["user"]->getId() ?><br />
		Nom : <?php echo $var["user"]->getNom() ?><br />
		Prenom : <?php echo $var["user"]->getPrenom()?><br />
		e-mail : <?php echo $var["user"]->getEmail()?><br />
		Type Compte : 
		<?php 
			if($var["user"]->getType()==0)echo "Etudiant";
			elseif ($var["user"]->getType()==0)echo "Professeur";
			else echo "Admin";
		?>
	</p>
	
	
	</div>

<?php include_once 'Templates/footer.php'; ?>