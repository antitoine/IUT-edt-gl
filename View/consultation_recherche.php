<?php include_once 'Templates/header.php'; ?>
    <div id="content">
         <form class ='formulaire' method='post' action="<?php echo App_Request::getUrl('consultation'); ?>">
             <fieldset>
                 <legend>Consultation </legend>
                 <p>
                     <label for='identifiant'>Identifiant :</label>
                     <input type='text' placeholder='Identifiant...' name='id_user' id='id_user' value='<?php echo $var["id_user"]; ?>' />
                 </p>
                 <p>
                     <input type='submit' value='Recherche' name='submit' id='submit' />
                 </p>
             </fieldset>
         </form>
    </div>
<?php include_once 'Templates/footer.php'; ?>
