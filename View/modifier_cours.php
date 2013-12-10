<?php include_once 'Templates/header.php'; ?>
    <div class="content">
        <form class ='formulaire-side-left' method='post' action="<?php echo App_Request::getUrl('modifier'); ?>">
            <fieldset>
                <legend>Ajouter un cours</legend>
                <p>
                    <label for='date'>Date :</label>
                    <input type='date' placeholder='2013-12-09 ...' name='date' id='date' value='<?php if (isset($var["date"])) { echo $var["date"]; } ?>' />
                </p>
                <p>
                    <label for='heured'>Heure début :</label>
                    <input type='time' placeholder='09:45:00 ...' name='heured' id='heured' value='<?php if (isset($var["heured"])) { echo $var["heured"]; } ?>' />
                </p>
                <p>
                    <label for='heuref'>Heure fin :</label>
                    <input type='time' placeholder='10:45:00 ...' name='heuref' id='heuref' value='<?php if (isset($var["heuref"])) { echo $var["heuref"]; } ?>' />
                </p>
                <p>
                    <label for='salle'>Salle :</label>
                    <select name="salle">
                        <?php if (isset($var["listSalle"])):
                                for($i=0;$i<count($var["listSalle"]["nomBat"]);$i++): ?>
                                    <option value="<?php echo $i ?>"><?php echo $var["listSalle"]["nomBat"][$i]; echo $var["listSalle"]["numeroSalle"][$i] ?></option>
                                <?php endfor ?>
                        <?php endif ?>
                    </select>
                </p>
                <?php if (isset($var["not_prof"]) && $var["not_prof"]) { ?>
                    <p>
                        <label for='prof'>Professeur :</label>
                        <select name="prof">
                            <?php if (isset($var["listProf"])):
                                for($i=0;$i<count($var["listProf"]["id"]);$i++): ?>
                                    <option value="<?php echo $i ?>"><?php echo $var["listProf"]["id"][$i]." (".$var["listProf"]["nom"][$i]." ".$var["listProf"]["prenom"][$i].")" ?></option>
                                <?php endfor ?>
                            <?php endif ?>
                        </select>
                    </p>
                <?php } else { ?>
                    <p>Professeur : <?php echo $var["user"]->getNom()." ".$var["user"]->getPrenom() ?></p>
                <?php } ?>
                <p>
                    <label for='grptd'>Groupe de TD :</label>
                    <select name="grptd">
                        <?php if (isset($var["listGroup"])):
                            for($i=0;$i<count($var["listGroup"]);$i++): ?>
                                <option value="<?php echo $i ?>"><?php echo $var["listGroup"][$i] ?></option>
                            <?php endfor ?>
                        <?php endif ?>
                    </select>
                </p>
                <p>
                    <input type="hidden" value="ok" name="add_cours" id="add_cours" />
                    <input type='submit' value='Ajouter' name='submit' id='submit' />
                </p>
            </fieldset>
        </form>
        <form class ='formulaire-side-right' method='post' action="<?php echo App_Request::getUrl('modifier'); ?>">
            <fieldset>
                <legend>Modifier un cours</legend>
                <p>
                    <label for='cours'>Cours :</label>
                    <select name="cours">
                        <?php if (isset($var["listCours"])):
                            for($i=0;$i<count($var["listCours"]);$i++): ?>
                                <option value="<?php echo $i ?>"><?php echo $var["listCours"][$i]->getDate()." à ".$var["listCours"][$i]->getHeureDebut()." jusqu'à ".$var["listCours"][$i]->getHeureFin()." pour le ".$var["listCours"][$i]->getGroupe()." de ".$var["listCours"][$i]->getMatiere() ?></option>
                            <?php endfor ?>
                        <?php endif ?>
                    </select>
                </p>
                <p>
                    <input type="hidden" value="ok" name="modifier_cours" id="modifier_cours" />
                    <input type='submit' value='Modifier' name='submit' id='submit' />
                </p>
            </fieldset>
        </form>
    </div>
<?php include_once 'Templates/footer.php'; ?>