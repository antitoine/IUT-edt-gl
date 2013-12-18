<?php include_once 'Templates/header.php'; ?>
	<div class="content">
        <?php if (isset($var["modification_succes"])): ?>
            <?php if ($var["modification_succes"]): ?>
                <p>Modifications effectuées avec succès !</p>
            <?php else: ?>
                <p class="probleme-form">Problème à la modification.</p>
            <?php endif ?>
        <?php endif ?>
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
                <fieldset>
                    <legend>Changer son mot de passe</legend>
                    <p>
                        <label for='oldmdp'>Mot de passe actuel :</label>
                        <input type='password' name='oldmdp' id='oldmdp'/>
                    <p/>
                    <p>
                      <label for='mdp'>Nouveau mot de passe :</label>
                      <input type='password' name='mdp' id='mdp'/>
                    <p/>
                    <p>
                        <label for='confmdp'>Confirmation nouveau mot de passe :</label>
                        <input type='password' name='confmdp' id='confmdp'/>
                    <p/>
                </fieldset>
                <p>Ou (changer l'un après l'autre et non les deux en même temps)</p>
                <fieldset>
                    <legend>Changer son adresse email</legend>
                    <p>
                       <label for='email'>Nouvelle email :</label>
                       <input type='email' name='email' id='email' />
                    <p/>
                    <p>
                        <label for='confemail'>Confirmation nouvelle email :</label>
                        <input type='confemail' name='confemail' id='confemail' />
                    <p/>
                </fieldset>
                <p>
                    <input type="hidden" name="send" value="true" />
                    <input type='submit' value='Modifier' name='submit' id='submit' />
                </p>
            </fieldset>
        </form>
	</div>
<?php include_once 'Templates/footer.php'; ?>