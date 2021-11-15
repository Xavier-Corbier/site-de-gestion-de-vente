
<div class="mx-2 py-3">
<?php

 // vérification si le panier est vide
 if (!isset($_COOKIE['panier'])) {
           echo '<div class="alert alert-danger" role="alert">
                  <h4 class="alert-heading">Vous n\'avez pas d\'article</h4>
                  <p class="mb-0">Vous n\'avez pas de d\'article dans votre panier, veuillez vous rendre à <a href="./index.php" class="alert-link">l\'accueil</a> pour consulter notre catalogue.</p>
                </div>';
 } else {
 	//entête du panier
 	echo '<table class="table product-table">

          <!-- Table head -->
            <thead class="mdb-color lighten-5">
              <tr>
                <th class="font-weight-bold">
                  <strong>Nom</strong>
                </th>
                <th class="font-weight-bold">
                  <strong>Quantité</strong>
                </th>
                <th class="font-weight-bold">
                  <strong>Prix</strong>
                </th>
                <th class="font-weight-bold">
                </th>
              </tr>
            </thead>
            <!-- /.Table head -->
            <tbody>';
        // récupération de la liste des produits dans le $_COOKIE
        $data=unserialize($_COOKIE['panier']);
        foreach ($data as $cle => $valeur){
            // si le produit n'existe plus dans la base de données
            if (ModelProduit::select($cle)==false) {
                // supression de la case dans le pannier dont le produit est inexistant
                unset($data[$cle]);
            } else {
                echo '<tr><th scope="row">'.ModelProduit::select($cle)->get("nomProduit").'</th>';
                echo '<td>'.$valeur.'</td>';
                $prixPromotion = ModelProduit::select($cle)->get("prixProduit") * (1 - ModelProduit::select($cle)->get("promotion"));
                echo '<td>'.$valeur*$prixPromotion.'</td>';
                echo '<td><a href="?action=delete&controller=panier&idProduit='.$cle.'">Supprimer </a><a href="?action=read&controller=produit&idProduit='.$cle.'">Modifier</a></td></tr>';
            }
        }
        // fin du panier
        echo '</tbody>
</table>';

 	// ajout du panier dans la session
  	$_SESSION['panier'] = $data;

  	// calcul du prix du panier
	$resultat=0;
	foreach ($_SESSION['panier'] as $cle => $valeur){
		if (!(ModelProduit::select($cle)==false)) {
		    if (ModelProduit::select($cle)->get("promotion")!="0"){
                $prix = ModelProduit::select($cle)->get("prixProduit") * (1 - ModelProduit::select($cle)->get("promotion"));
            } else {
		        $prix = ModelProduit::select($cle)->get("prixProduit");
            }
			$resultat=$resultat+($prix*$valeur);
		}
	}
	// ajout du prix du panier dans la session.
	$_SESSION['prix']=$resultat;
  	echo "Prix à payer : " . $_SESSION['prix'];
 }
?>
</div>
<div class="text-center py-3">
      <?php
          if (isset($_COOKIE['panier'])) {
            echo '<a class="waves-effect waves-light btn orange accent-4 white-text text-lighten-4 effet" href="?action=deleteAll&controller=Panier">Vider le panier</a><a class="waves-effect waves-light btn orange accent-4 white-text text-lighten-4 effet" href="?action=checkLogged&controller=CommandeClient">Procéder au paiement</a>';
          }
      ?>
</div>