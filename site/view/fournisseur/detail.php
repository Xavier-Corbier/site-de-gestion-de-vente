<div class="mx-5 py-5">
    <div class="card mx-5 py-5 px-5">
        <?php
            echo '<p> Nom du fournisseur : ' . htmlspecialchars($fournisseur->get("nomFournisseur")) . '.</p>';
            echo '<p> Telephone +33 : ' . htmlspecialchars($fournisseur->get("telephoneFournisseur")) . '.</p>';
            echo '<p> Adresse : ' . htmlspecialchars($fournisseur->get("adresseFournisseur")) . '.</p>';
            echo '</div>';
            echo '<div class="text-center">';
 
            echo '<a href="?action=update&controller=fournisseur&idFournisseur='.rawurlencode($fournisseur->get("idFournisseur")).'"><button class="btn btn-info my-4 btn-block orange accent-4" type="submit">Modifier</button></a>';
       
        ?>
    </div>
</div>