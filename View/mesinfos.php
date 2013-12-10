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
	<p>
        <h4>Modifier ses infos</h4>
        
        <label for='mdp'>Mot de passe <span class='colons'>:</span></label>
                    <input type='password' name='mdp_Modif' id='mdp_Modif'/>
         
      </p>
      <p>
           <label for='email'>Email <span class='colons'>:</span></label>
           <input type='email' name='email_Modif' id='email_Modif' />
      <p>
                <input type="hidden" name="send" value="true" />
                <input type='submit' value='Envoyer' />
            </p>
	
	
	</div>

<?php include_once 'Templates/footer.php'; ?>