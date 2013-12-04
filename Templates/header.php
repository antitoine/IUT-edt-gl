<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="content-type" content="text/html; charset=utf-8">
    <link rel="stylesheet" media="screen" type="text/css" title="design" href="CSS/design.css" />
    <link rel="shortcut icon" type="image/png" href="Images/mafavicon.png" />
    <title>Emploi du temps IUT UM2</title>
</head>
<body>
    <header>
        <a id="header-title" rel="home" title="EDT IUT UM2" href="<?php echo App_Request::getUrl(); ?>">
            <h1 class="site-title">Emploi du temps IUT UM2</h1>
        </a>
        <a id="header-logo" rel="home" title="EDT IUT UM2 Logo" href="<?php echo App_Request::getUrl(); ?>">
            <img alt="logo-carmap" src="http://placehold.it/350x150" height="150" width="350">
        </a>
        <div id="navbar">
            <nav id="site-navigation">
                <h3 id="title-menu">Menu</h3>
                <div id="menu-connexion-contener" class="menu-connexion-contener">
                    <div>
                    <ul id="menu-connexion">
                            <li><a href="<?php echo App_Request::getUrl('Index','deconnexion'); ?>">Déconnexion</a></li>
                            <li><a href="<?php echo App_Request::getUrl('compte','moncompte'); ?>">Mon compte</a></li>
                    </ul>
                    </div>
                </div>
                <div id="menu-principal-contener" class="menu-principal-contener">
                    <ul id="menu-principal">
                        <li><a href="<?php echo App_Request::getUrl() ?>">Accueil</a></li>
                        <li><a href="<?php echo App_Request::getUrl('consultation') ?>">Consulter</a></li>
                        <?php if (isset($var["admin"]) && $var["admin"]) { ?>
                        <li><a href="<?php echo App_Request::getUrl('modification') ?>">Modifier</a></li>
                        <?php } ?>
                        <li><a href="<?php echo App_Request::getUrl('contacter') ?>">Contact</a></li>
                    </ul>
                </div>
            </nav>
        </div>
    </header>