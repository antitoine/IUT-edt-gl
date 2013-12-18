<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="content-type" content="text/html; charset=utf-8">
    <link rel="stylesheet" media="screen" type="text/css" title="design" href="CSS/design.css" />
    <link rel="shortcut icon" type="image/png" href="Images/mafavicon.png" />
    <title>Emploi du temps IUT UM2</title>
</head>
<body>
    <header class="header-connexion">
        <h1>Connexion aux emplois du temps - I.U.T Montpellier 2</h1>
    </header>
    <div class="connexion">
        <div>
            <form class ='formulaire' method='post' action="<?php echo App_Request::getUrl(); ?>">
                <fieldset>
                    <legend>Connexion : </legend>
                    <?php if ($var["comb_prob"]) { ?><span class='alerte'>Votre identifiant ou votre mot de passe n'est pas correct.</span><?php } ?>
                    <p>
                        <label for='identifiant'>Identifiant :</label>
                        <input type='text' placeholder='Identifiant...' name='identifiant' id='identifiant' value='<?php echo $var["identifiant"]; ?>' />
                    </p>
                    <p>
                        <label for='mdp'>Mot de passe :</label>
                        <input type='password' placeholder='Mot de passe...' name='mdp' id='mdp'/>
                    </p>
                    <p>
                        <input type='submit' value='Connexion' />
                    </p>
                </fieldset>
            </form>
        </div>
    </div>
    <footer class="footer-connexion">
    </footer>
</body>
</html>