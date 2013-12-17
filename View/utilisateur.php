<?php include_once 'Templates/header.php'; ?>
	<div class="content">
	    <h3>Gestion des utilisateurs</h3>
        <form class ='formulaire-side-left' method='post' action="<?php echo App_Request::getUrl('utilisateur'); ?>">
            <fieldset>
                <legend>Modifier un utilisateur</legend>
                <?php if (isset($var["prob_change"]) && $var["prob_change"]): ?>
                    <p>Problème à la modification</p>
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
                    <p>Problème à la suppression</p>
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
                    <p>Problème à l'ajout</p>
                <?php endif ?>

                <p>
                    <input type="hidden" value="ok" name="add_user" id="add_user" />
                    <input type='submit' value='Ajouter' name='submit' id='submit' />
                </p>
            </fieldset>
        </form>
	</div>
<?php include_once 'Templates/footer.php'; ?>