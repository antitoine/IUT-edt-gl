<?php include_once 'Templates/header.php'; ?>
	<div class="content">
	    <h3>Gestion des utilisateurs</h3>
        <form class ='formulaire-side-left' method='post' action="<?php echo App_Request::getUrl('utilisateur'); ?>">
            <fieldset>
                <legend>Modifier un utilisateur</legend>
                <?php if (isset($var["prob_change"]) && $var["prob_change"]): ?>
                    <p class="probleme-form">Problème à la modification</p>
                <?php endif ?>
                <p>
                    <label for='utilisateur'>Utilisateurs à modifier :</label>
                    <select name="utilisateur"">
                        <option value="">Séléctionnez un utilisateur</option>
                        <?php if (isset($var["listUser"])):
                            for($i=0;$i<count($var["listUser"]);$i++): ?>
                                <option value="<?php echo $var["listUser"][$i]->getId() ?>"><?php echo $var["listUser"][$i]->getStatus()." ".$var["listUser"][$i]->getNom()." ".$var["listUser"][$i]->getPrenom()." - ".$var["listUser"][$i]->getId() ?></option>
                            <?php endfor ?>
                        <?php endif ?>
                    </select>
                </p>
                <p>
                    <input type="hidden" value="ok" name="change_user" id="change_user" />
                    <input type='submit' value='Modifier' name='submit' id='submit' />
                </p>
            </fieldset>
        </form>
        <form class ='formulaire-side-right' method='post' action="<?php echo App_Request::getUrl('utilisateur'); ?>"  onsubmit="return(confirm('Etes-vous sûr de vouloir supprimer cet utilisateur ?'));" >
            <fieldset>
                <legend>Supprimer un utilisateur</legend>
                <?php if (isset($var["prob_remove"]) && $var["prob_remove"]): ?>
                    <p class="probleme-form">Problème à la suppression</p>
                <?php endif ?>
                <p>
                    <label for='utilisateur'>Utilisateurs à supprimmer :</label>
                    <select name="utilisateur"">
                    <option value="">Séléctionnez un utilisateur</option>
                    <?php if (isset($var["listUser"])):
                        for($i=0;$i<count($var["listUser"]);$i++): ?>
                            <option value="<?php echo $var["listUser"][$i]->getId() ?>"><?php echo $var["listUser"][$i]->getStatus()." ".$var["listUser"][$i]->getNom()." ".$var["listUser"][$i]->getPrenom()." - ".$var["listUser"][$i]->getId() ?></option>
                        <?php endfor ?>
                    <?php endif ?>
                    </select>
                </p>
                <p>
                    <input type="hidden" value="ok" name="remove_user" id="remove_user" />
                    <input type='submit' value='Supprimer' name='submit' id='submit' />
                </p>
            </fieldset>
        </form>
        <form class ='formulaire-side-center' method='post' action="<?php echo App_Request::getUrl('utilisateur'); ?>">
            <fieldset>
                <legend>Ajouter un utilisateur</legend>
                <?php if (isset($var["prob_add"]) && $var["prob_add"]): ?>
                    <p class="probleme-form">Problème à l'ajout</p>
                <?php endif ?>
                <p>
                    <label for='identifiant'>Identifiant :</label>
                    <input type='text' placeholder='Identifiant ...' name='identifiant' id='identifiant' value='<?php if (isset($var["identifiant"])) { echo $var["identifiant"]; } ?>' />
                </p>
                <p>
                    <label for='nom'>Nom :</label>
                    <input type='text' placeholder='Nom ...' name='nom' id='nom' value='<?php if (isset($var["nom"])) { echo $var["nom"]; } ?>' />
                </p>
                <p>
                    <label for='prenom'>Prenom :</label>
                    <input type='text' placeholder='Prenom ...' name='prenom' id='prenom' value='<?php if (isset($var["prenom"])) { echo $var["prenom"]; } ?>' />
                </p>
                <p>
                    <label for='mdp'>Mot de passe :</label>
                    <input type='password' name='mdp' id='prenom' />
                </p>
                <p>
                    <label for='email'>Email :</label>
                    <input type='email' name='email' id='email' placeholder='exemple@domaine.com ...' value='<?php if (isset($var["email"])) { echo $var["email"]; } ?>' />
                </p>
                <p>
                    <label for='type'>Type d'utilisateur :</label>
                    <select name="type">
                        <option value="-1">Séléctionnez un type</option>
                        <option value="0">Etudiant</option>
                        <option value="1">Professeur</option>
                        <?php //<option value="2">Etudiant</option> ?>
                    </select>
                </p>
                <p>
                    <label for='grptd'>Si le type d'utilisateur est étudiant veillez renseigner son groupe :</label>
                    <select name="grptd">
                        <option value="">Séléctionnez un groupe de TD</option>
                        <?php if (isset($var["listGroup"])):
                            for($i=0;$i<count($var["listGroup"]);$i++): ?>
                                <option value="<?php echo $var["listGroup"][$i] ?>"><?php echo $var["listGroup"][$i] ?></option>
                            <?php endfor ?>
                        <?php endif ?>
                    </select>
                </p>
                <p>
                    <input type="hidden" value="ok" name="add_user" id="add_user" />
                    <input type='submit' value='Ajouter' name='submit' id='submit' />
                </p>
            </fieldset>
        </form>
	</div>
<?php include_once 'Templates/footer.php'; ?>