<?php
include "../core/livreurC.php";
$livreur=new livreurC();
if(isset($_POST["query"]))
{
    $list = $livreur->rechercherLivreur($_POST["query"]);

}
else {
    $list=$livreur->afficherlivreur();
}
?>
<?php
foreach ($list as $lvr) {
    if($lvr['cin']!=0) {
        ?>

        <tr>
            <td><?php echo $lvr['cin']; ?></td>
            <td><?php echo $lvr['nom']; ?></td>
            <td><?php echo $lvr['prenom']; ?></td>
            <td><?php echo $lvr['adresse']; ?></td>
            <td><?php echo $lvr['ville']; ?></td>
            <td><?php echo $lvr['telephone']; ?></td>
            <td><?php echo $lvr['email']; ?></td>
            <td><?php echo $lvr['status']; ?></td>
            <td><a href="modifierlivreur.php?cin=<?PHP echo $lvr['cin']; ?>" style="float:left;"> Modifier </a></td>
            <td><a href="supprimerlivreur.php?cin=<?PHP echo $lvr['cin']; ?>" style="float:left;">Supprimer</a></td>

        </tr>
        <?php
    }
}
?>












