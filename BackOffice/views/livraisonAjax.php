<?php
include "../core/livraisonC.php";
$a2=new livraisonC();
$a2->VerifLivreur();
if(isset($_POST["query"]))
{
        $list = $a2->rechercherlivraisons($_POST["query"]);

}
else {
    $list=$a2->afficherlivraison();
}
        ?>
        <?php
        foreach ($list as $lvr) {
            ?>

            <tr>
                <td><?php echo $lvr['id']; ?></td>
                <td><?php echo $lvr['adresse']; ?></td>
                <td><?php echo $lvr['date']; ?></td>
                <td><a href="choisirLivreur.php?id=<?php echo $lvr['id']; ?>"><?php echo $lvr['nom']; ?></a></td>
                <td><?php echo $lvr['prenom']; ?></td>
                <td><a href="ModifStatus.php?id=<?php echo $lvr['id']; ?>"><?php echo $lvr['status']; ?></a></td>
                <td><a href="detailcommande.php?id=<?php echo $lvr['id_commande']; ?>" >Voir Commande</a></td>
                <td><?php echo $lvr['telephone1']; ?></td>
                <td><?php echo $lvr['telephone2']; ?></td>
                <td><a href="supprimerLivraison.php?id=<?PHP echo $lvr['id']; ?>"
                       style="float:left;">Supprimer</a></td>

            </tr>
            <?php
        }
    ?>













