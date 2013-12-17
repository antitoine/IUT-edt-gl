<?php include_once 'Templates/header.php'; ?>
    <div class="content">
        <form class ='formulaire' method='post' action="<?php echo App_Request::getUrl('utilisateur'); ?>">
            <fieldset>
                <legend>Modifier un utilisateur</legend>
                <p>
                    <label for='nom'>Nom :</label>
                    <input type='text' placeholder='Nom ...' name='nom' id='nom' value='<?php if (isset($var["nom"])) { echo $var["nom"]; } ?>' />
                </p>
                <p>
                    <label for='prenom'>Prenom :</label>
                    <input type='text' placeholder='Prenom ...' name='prenom' id='prenom' value='<?php if (isset($var["prenom"])) { echo $var["prenom"]; } ?>' />
                </p>
                <p>
                    <label for='mdp'>Nouveau mot de passe :</label>
                    <input type='password' name='mdp' id='prenom' />
                </p>
                <p>
                    <label for='email'>Email :</label>
                    <input type='email' name='email' id='email' placeholder='exemple@domaine.com ...' value='<?php if (isset($var["email"])) { echo $var["email"]; } ?>' />
                </p>
                <?php if (isset($var["grptd"]) && !empty($var["grptd"])) : ?>
                    <p>
                        <label for='grptd'>Son groupe de TD :</label>
                        <select name="grptd">
                            <option value="">Séléctionnez un groupe de TD</option>
                            <?php if (isset($var["listGroup"])):
                                for($i=0;$i<count($var["listGroup"]);$i++): ?>
                                    <option <?php if ($var["grptd"] == $var["listGroup"][$i]): ?>selected="selected"<?php endif ?> value="<?php echo $var["listGroup"][$i] ?>"><?php echo $var["listGroup"][$i] ?></option>
                                <?php endfor ?>
                            <?php endif ?>
                        </select>
                    </p>
                <?php endif ?>
                <p>
                    <input type="hidden" value="<?php echo $var["identifiant"] ?>" name="identifiant" id="identifiant" />
                    <input type="hidden" value="<?php echo $var["type"] ?>" name="type" id="type" />
                    <input type="hidden" value="ok" name="change_user" id="change_user" />
                    <input type="hidden" value="ok" name="change_send" id="change_send" />
                    <input type='submit' value='Ajouter' name='submit' id='submit' />
                </p>
            </fieldset>
        </form>
    </div>
<?php include_once 'Templates/footer.php'; ?>