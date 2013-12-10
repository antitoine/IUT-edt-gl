<?php include_once 'Templates/header.php'; ?>
    <div class="content">
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
                     <input type='text' placeholder='Groupe de TD...' name='grptd' id='grptd' value='<?php if (isset($var["grptd"])) { echo $var["grptd"]; } ?>' />
                 </p>
                 <p>ou</p>
                 <p>
                     <label for='bat'>Batiment :</label>
                     <input type='text' placeholder='Batiment...' name='bat' id='bat' value='<?php if (isset($var["bat"])) { echo $var["bat"]; } ?>' />
                     <label for='salle'>Numéro salle :</label>
                     <input type='text' placeholder='Numéro salle...' name='salle' id='salle' value='<?php if (isset($var["salle"])) { echo $var["salle"]; } ?>' />
                 </p>
                 <p>
                     <input type="hidden" value="ok" name="envoi" id="envoi" />
                     <input type='submit' value='Recherche' name='submit' id='submit' />
                 </p>
             </fieldset>
         </form>
    </div>

<?php include_once 'Templates/footer.php'; ?>
