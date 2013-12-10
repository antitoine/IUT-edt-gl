<?php include_once 'Templates/header.php'; ?>
    <div class="content">
        <?php if (!empty($var["listCours"])) { 
        		for($j=0;$j<count($var["listCours"]);$j++){ ?>
            <table class="EDT">
                <caption>Emploi du temps</caption>

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
                <?php for($i=0;$i<count($var["listCours"][$j]);$i++) { ?>
                    <tr>
                        <td><?php echo $var["listCours"][$j][$i]->getDate(); ?></td>
                        <td><?php echo $var["listCours"][$j][$i]->getHeureDebut(); ?></td>
                        <td><?php echo $var["listCours"][$j][$i]->getHeureFin(); ?></td>
                        <td><?php echo $var["listCours"][$j][$i]->getBatiment(); echo $var["listCours"][$j][$i]->getnunSalle(); ?></td>
                        <td><?php echo $var["listCours"][$j][$i]->getMatiere(); ?></td>
                        <td><?php echo $var["listCours"][$j][$i]->getDescription(); ?></td>
                    </tr>
                <?php } ?>
                </tbody>
            </table>
        <?php }} ?>
    </div>
<?php include_once 'Templates/footer.php'; ?>
