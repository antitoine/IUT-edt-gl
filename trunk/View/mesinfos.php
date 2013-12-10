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
                elseif ($var["user"]->getType()==1)echo "Professeur";
                else echo "Admin";
            ?>
	    </p>
        <form class ='formulaire' method='post' action="<?php echo App_Request::getUrl('mesinfos'); ?>">
            <fieldset>
                <legend>Modifier ses infos</legend>
                <p>
                  <label for='mdp'>Mot de passe :</label>
                  <input type='password' name='mdp' id='mdp'/>

                <p/>

                <p>
                   <label for='email'>Email :</label>
                   <input type='email' name='email' id='email' />
                <p/>

                <p>
                    <input type="hidden" name="send" value="true" />
                    <input type='submit' value='Modifier' name='submit' id='submit' />
                </p>
            </fieldset>
        </form>
	</div>
<?php include_once 'Templates/footer.php'; ?>