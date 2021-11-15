<div class="text-center mx-1 py-4" style="padding-top:40px;">
    <a href="?action=readAll&controller=commandeClient" class="btn btn-info my-4 btn-block orange accent-4">Retour</a>
</div>
<div class="mx-5 py-4">
    <?php
    echo 'Commande Numéro : '.$commandeClient->get('idCommandeClient');
    echo '<br> Date de commande : '.$commandeClient->get('dateCommande');
    echo '<br> Prix total: '.$commandeClient->get('prixTotal');

    $listeProduits=$commandeClient->get('listeProduits');
    ?>
</div>
<div class="mx-2 py-4">
    <table class="table product-table">

        <!-- Table head -->
        <thead class="mdb-color lighten-5">
        <tr>
            <th class="font-weight-bold">
                <strong>Produit</strong>
            </th>
            <th class="font-weight-bold">
                <strong>Quantité</strong>
            </th>
            <th class="font-weight-bold">
                <strong>Prix à l'unité</strong>
            </th>
            <th class="font-weight-bold">
                <strong>Sous-total</strong>
            </th>
        </tr>
        </thead>
        <!-- /.Table head -->

        <tbody>
<?php
foreach($listeProduits as $cle => $valeur){
    $prixUnite=ModelProduit::select($cle)->get("prixProduit");
echo '<tr><th scope="row">'.ModelProduit::select($cle)->get("nomProduit").'</th>';
echo '<td>'.$valeur.'</td>';
echo '<td>'.$prixUnite.'</td>';
echo '<td>'.$valeur*$prixUnite.'</td></tr>';
}
?>
        </tbody>
    </table>
<div class="text-center m-2 py-3" style="padding-top:40px;">
     <a href="?action=reiterate&controller=commandeClient&idCommandeClient=<?php echo $commandeClient->get('idCommandeClient');?>" class="btn btn-info my-4 btn-block orange accent-4">Refaire cette commande</a>
</div>


