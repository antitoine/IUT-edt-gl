<?php include_once 'Templates/header.php'; ?>
    <div class="content">
        <p>Bienvenue sur votre compte <?php echo $var["user"]->getPrenom(); ?> <?php echo $var["user"]->getNom(); ?></p>
        <?php if (!empty($var["listCours"][0])) { ?>
        <table class="EDT">
            <caption>Votre emploi du temps des 4 jours à venir</caption>

            <thead> <!-- En-tête du tableau -->
            <tr>
                <th>Date</th>
                <th>Horraire début</th>
                <th>Horraire fin</th>
                <th>Salle</th>
                <th>Matière</th>
                <th>Description</th>
            </tr>
            </thead>

            <tbody> <!-- Corps du tableau -->
            <?php for($i=0;$i<count($var["listCours"][0]);$i++) { ?>
                <tr>
                    <td><?php echo $var["listCours"][0][$i]->getDate(); ?></td>
                    <td><?php echo $var["listCours"][0][$i]->getHeureDebut(); ?></td>
                    <td><?php echo $var["listCours"][0][$i]->getHeureFin(); ?></td>
                    <td><?php echo $var["listCours"][0][$i]->getBatiment(); echo $var["listCours"][0][$i]->getnumSalle(); ?></td>
                    <td><?php echo $var["listCours"][0][$i]->getMatiere(); ?></td>
                    <td><?php echo $var["listCours"][0][$i]->getDescription(); ?></td>
                </tr>
            <?php } ?>
            </tbody>
        </table>
        <?php } ?>
    </div>
<?php include_once 'Templates/footer.php'; ?>