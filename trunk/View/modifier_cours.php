<?php include_once 'Templates/header.php'; ?>
    <div class="content">
        <form class ='formulaire' method='post' action="<?php echo App_Request::getUrl('modifier'); ?>">
            <fieldset>
                <legend>Ajouter un cours</legend>
                <p>
                    <label for='date'></label>
                    <input type='text' placeholder='2013-12-09 ...' name='date' id='date' value='<?php if (isset($var["date"])) { echo $var["date"]; } ?>' />
                </p>
                <p>
                    <label for='heured'></label>
                    <input type='text' placeholder='09:45:00 ...' name='heured' id='heured' value='<?php if (isset($var["heured"])) { echo $var["heured"]; } ?>' />
                </p>
                <p>
                    <label for='heuref'></label>
                    <input type='text' placeholder='10:45:00 ...' name='heuref' id='heuref' value='<?php if (isset($var["heuref"])) { echo $var["heuref"]; } ?>' />
                </p>
                <p>
                    <label for='salle'></label>
                    <select name="salle">
                        <option value="">...</option>
                    </select>
                </p>
                <?php if (isset($var["not_prof"]) && $var["not_prof"]) { ?>
                    <p>
                        <label for='prof'></label>
                        <select name="prof">
                            <option value="">...</option>
                        </select>
                    </p>
                <?php } ?>
                <p>
                    <label for='grptd'></label>
                    <select name="grptd">
                        <option value="">...</option>
                    </select>
                </p>
                <p>
                    <input type="hidden" value="ok" name="add_cours" id="add_cours" />
                    <input type='submit' value='Recherche' name='submit' id='submit' />
                </p>
            </fieldset>
        </form>
    </div>
<?php include_once 'Templates/footer.php'; ?>
