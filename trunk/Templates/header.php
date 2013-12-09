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
        <a id="header-title" rel="home" title="EDT IUT UM2" href="<?php echo App_Request::getUrl() ?>">
            <h1 class="site-title">Emploi du temps IUT UM2</h1>
        </a>
        <a id="header-logo" rel="home" title="EDT IUT UM2 Logo" href="<?php echo App_Request::getUrl() ?>">
            <img alt="site-logo" src="Images/logo.png" height="150" width="150">
        </a>
        <div id="navbar">
            <nav id="site-navigation">
                <h3 id="title-menu">Menu</h3>
                <div id="menu-principal-contener" class="menu-principal-contener">
                    <ul id="menu-principal">
                        <li><a <?php if (App_Request::isCurrent()): ?>id="item-actif"<?php endif ?> href="<?php echo App_Request::getUrl() ?>">Accueil</a></li>
                        <li><a <?php if (App_Request::isCurrent('consultation')): ?>id="item-actif"<?php endif ?> href="<?php echo App_Request::getUrl('consultation') ?>">Consulter</a></li>
                        <?php if (isset($var["admin"]) && $var["admin"]): ?>
                            <li><a <?php if (App_Request::isCurrent('modification')): ?>id="item-actif"<?php endif ?> href="<?php echo App_Request::getUrl('modification') ?>">Modifier</a></li>
                        <?php endif ?>
                        <li><a <?php if (App_Request::isCurrent('contacter')): ?>id="item-actif"<?php endif ?> href="<?php echo App_Request::getUrl('contacter') ?>">Contact</a></li>
                        <li><a <?php if (App_Request::isCurrent('mesinfos')): ?>id="item-actif"<?php endif ?> href="<?php echo App_Request::getUrl('mesinfos'); ?>">Mon compte</a></li>
                        <li><a <?php if (App_Request::isCurrent('Index','deconnexion')): ?>id="item-actif"<?php endif ?> href="<?php echo App_Request::getUrl('Index','deconnexion'); ?>">Déconnexion</a></li>
                    </ul>
                </div>
            </nav>
        </div>
    </header>