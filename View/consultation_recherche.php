<?php include_once 'Templates/header.php'; ?>
    <div class="content">
        <h3>Consulter un emploi du temps</h3>
         <form class ='formulaire' method='post' action="<?php echo App_Request::getUrl('consultation'); ?>">
             <fieldset>
                 <legend>Recherche d'un emploi du temps par ...</legend>
                 <p>
                     <label for='identifiant'>Identifiant :</label>
                     <input type='text' placeholder='Identifiant...' name='id_user' id='id_user' value='<?php if (isset($var["id_user"])) { echo $var["id_user"]; } ?>' />
                 </p>
                 <p>ou</p>
                 <p>
                     <label for='nom'>Nom :</label>
                     <input type='text' placeholder='Nom...' name='nom' id='nom' value='<?php if (isset($var["nom"])) { echo $var["nom"]; } ?>' />
                     <label for='prenom'>Prénom :</label>
                     <input type='text' placeholder='Prénom...' name='prenom' id='prenom' value='<?php if (isset($var["prenom"])) { echo $var["prenom"]; } ?>' />
                 </p>
                 <p>ou</p>
                 <p>
                     <label for='grptd'>Groupe de TD :</label>
                     <select name="grptd">
                         <option value="">Séléctionnez un groupe de TD</option>
                         <?php if (isset($var["listGroup"])):
                             for($i=0;$i<count($var["listGroup"]);$i++): ?>
                                 <option value="<?php echo $var["listGroup"][$i] ?>"><?php echo $var["listGroup"][$i] ?></option>
                             <?php endfor ?>
                         <?php endif ?>
                     </select>
                 </p>
                 <p>ou</p>
                 <p>
                     <label for='salle'>Salle :</label>
                     <select name="salle">
                         <option value="">Séléctionnez une salle</option>
                         <?php if (isset($var["listSalle"])):
                             for($i=0;$i<count($var["listSalle"]["nomBat"]);$i++): ?>
                                 <option value="<?php echo $i ?>"><?php echo $var["listSalle"]["nomBat"][$i]; echo $var["listSalle"]["numeroSalle"][$i] ?></option>
                             <?php endfor ?>
                         <?php endif ?>
                     </select>
                 </p>
                 <p>
                     <input type="hidden" value="ok" name="envoi" id="envoi" />
                     <input type='submit' value='Recherche' name='submit' id='submit' />
                 </p>
             </fieldset>
         </form>
    </div>

<?php include_once 'Templates/footer.php'; ?>
