<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="content-type" content="text/html; charset=utf-8">
    <link rel="stylesheet" media="screen" type="text/css" title="design" href="CSS/design.css" />
    <link rel="shortcut icon" type="image/png" href="Images/mafavicon.png" />
    <title></title>
</head>
<body>
    <header>
        <a id="header-title" rel="home" title="EDT IUT UM2" href="index.php">
            <h1 class="site-title">Emploi du temps IUT UM2</h1>
        </a>
        <a id="header-logo" rel="home" title="CarMap" href="index.php">
            <img alt="logo-carmap" src="image/logo-carmap.png" height="100" width="132">
        </a>
        <div id="navbar">
            <nav id="site-navigation">
                <h3 id="title-menu">Menu</h3>
                <div id="menu-connexion-contener" class="menu-connexion-contener">
                    <div>
                    <ul id="menu-connexion">
                            <?php if (isset($_SESSION['id']) && !empty($_SESSION['id'])) { ?>
                            <li><a href="<?php echo App_Request::getUrl('compte','deconnexion'); ?>">Déconnexion</a></li>
                            <li><a href="<?php echo App_Request::getUrl('compte','moncompte'); ?>">Mon compte</a></li> <?php } else { ?>
                            <li><a href="<?php echo App_Request::getUrl('compte','connexion'); ?>">Connexion</a></li>
                            <li><a href="<?php echo App_Request::getUrl('compte','inscription'); ?>">Inscription</a></li><?php } ?>
                    </ul>
                    </div>
                </div>
                <div id="menu-center-contener"></div>
                <div id="menu-search-contener" class="menu-search-contener">
                    <div>
                        <form action="<?php echo App_Request::getUrl('article','search'); ?>" method="post" role="search">
                            <label for="motcle">Recherche </label>
                            <input type="text" placeholder="Recherche..." name="motcle" id="motcle" />
                            <input alt="image_recherche" src="image/search-icon.png" type="image">
                        </form>
                    </div>
                </div>
                <div id="menu-principal-contener" class="menu-principal-contener">
                    <ul id="menu-principal">
                        <li><a href="<?php echo App_Request::getUrl() ?>">Accueil</a></li>
                        <li><a href="<?php echo App_Request::getUrl('presentation') ?>">Présentation</a></li>
                        <li><a href="<?php echo App_Request::getUrl('telechargement') ?>">Téléchargement</a></li>
                        <li><a href="<?php echo App_Request::getUrl('contact') ?>">Contact</a></li>
                    </ul>
                </div>
            </nav>
        </div>
        <div id="menu-ombre"></div>
    </header>