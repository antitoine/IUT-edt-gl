<?php include_once 'Templates/header.php'; ?>
    <div id="content">
        <p>Bienvenue sur votre compte <?php echo $var["user"]->getPrenom(); ?> <?php echo $var["user"]->getNom(); ?></p>
    </div>
<?php include_once 'Templates/footer.php'; ?>