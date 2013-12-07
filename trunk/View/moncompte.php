<?php include_once 'Templates/header.php'; ?>
    <div id="content">
        <p>Bienvenue sur votre compte <?php echo $var["user"]->getPrenom(); ?> <?php echo $var["user"]->getNom(); ?></p>
        <?php if (!empty($var["listCours"])) { ?>
        <table>
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
            <?php for($i=0;$i<count($var["listCours"]);$i++) { ?>
                <tr>
                    <td><?php echo $var["listCours"][$i]->getDate(); ?></td>
                    <td><?php echo $var["listCours"][$i]->getHeureDebut(); ?></td>
                    <td><?php echo $var["listCours"][$i]->getHeureFin(); ?></td>
                    <td><?php echo $var["listCours"][$i]->getBatiment(); echo $var["listCours"][$i]->getnunSalle(); ?></td>
                    <td><?php echo $var["listCours"][$i]->getMatiere(); ?></td>
                    <td><?php echo $var["listCours"][$i]->getDescription(); ?></td>
                </tr>
            <?php } ?>
            </tbody>
        </table>
        <?php } ?>
    </div>
<?php include_once 'Templates/footer.php'; ?>