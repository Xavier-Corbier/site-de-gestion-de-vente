 <div class="mx-5 py-4">
    <table class="table product-table">

        <tbody>

    <?php
                   foreach ($tab_Produit as $Produit) {
                    echo '<tr> <th> <a href="?action=read&idProduit='.rawurlencode($Produit->get("idProduit")).'&controller=Produit">'.htmlspecialchars($Produit->get("nomProduit")).'</a></th>';
                    echo '<td><a href="?action=read&idProduit='.rawurlencode($Produit->get("idProduit")).'&controller=Produit"><img class="mx-5 smartphone" src="./upload/'.htmlspecialchars($Produit->get("idProduit")).'" alt="Produit '.htmlspecialchars($Produit->get("nomProduit")).'" width="120px"> </a></td>';
                    $prixPromotion = $Produit->get("prixProduit") * (1 - $Produit->get("promotion"));
                    if (!$Produit->get("promotion") == 0) {
                        echo '<td> <p>Prix conseillé : <strike>' . $Produit->get("prixProduit") . '</strike> <i class="fas fa-euro-sign"></i> </p>';
                        echo ' <p>Promotion du jour : ' . $prixPromotion . ' <i class="fas fa-euro-sign"></i></p></td>';
                    }
                    else {
                        echo '<td> Prix : ' . $prixPromotion . ' <i class="fas fa-euro-sign"></i></td>';
                    }
                    if (Session::is_admin()) {
                      echo '<td><a href="?action=delete&idProduit='.rawurlencode($Produit->get("idProduit")).'&controller=Produit"><i class="material-icons">delete</i></a></td>';
                    echo '<td><a href="?action=update&controller=Produit&idProduit='.rawurlencode($Produit->get("idProduit")).'"><i class="material-icons">edit</i></a></td>';
                    }
                    echo '</tr>';
                  }
                
        ?>
         </tbody>
</table>
 </div>
 <?php
if (Session::is_admin()) {
echo '<div class="text-center py-3" style="padding-top:40px;">
	  	<a class="waves-effect waves-light btn orange accent-4 white-text text-lighten-4 effet" href="?action=create&controller=Produit">Créer un Produit</a>
</div>';
                  }
                
        ?>
