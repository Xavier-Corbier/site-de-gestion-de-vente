<script src="css/template/js/addons/directOrder.js" ></script>
<div class="mx-5 py-4">
  <div class="mx-5 py-4 text-center">
        <img class="mx-5" src="./upload/<?php echo htmlspecialchars($_GET['idProduit']); ?>" width="30%">
  </div>
<div class="row">
<div class="col-sm-8">
    <table class="table table-sm">
          <!-- Table head -->
            <thead class="mdb-color lighten-5">
              <tr>
                <th class="font-weight-bold">
                  <strong>Nom</strong>
                </th>
                <th class="font-weight-bold">
                  <strong>Description</strong>
                </th>
                <th class="font-weight-bold">
                  <strong>Prix</strong>
                </th>
                  <?php
                  if (!$Produit->get("promotion") == 0) {
                      echo '<th class="font-weight-bold">
                                <strong>Prix de l\'offre</strong>
                            </th>
                            <th class="font-weight-bold smartphone">
                                <strong>Economisez</strong>
                            </th> ';
                  }
                  ?>
                <th class="font-weight-bold smartphone">
                  <strong>Stock</strong>
                </th>
              </tr>
            </thead>
            <!-- /.Table head -->

            <tbody>
                <tr>
                  <?php
                  echo '<th scope="row">' . htmlspecialchars($Produit->get("nomProduit")) . '</th>';
                  echo '<td>' . htmlspecialchars($Produit->get("descriptionProduit")) . '</td>';
                  if (!$Produit->get("promotion") == 0) {
                      echo '<td><strike>' . htmlspecialchars($Produit->get("prixProduit")) . '</strike></td>';
                      $prixPromotion = $Produit->get("prixProduit") * (1 - $Produit->get("promotion"));
                      echo '<td>' . htmlspecialchars($prixPromotion) . ' <i class="fas fa-euro-sign"></i></td>';
                      echo '<td class="smartphone">' . htmlspecialchars(($Produit->get("prixProduit")) - $prixPromotion) .
                          ' <i class="fas fa-euro-sign"></i> (' . htmlspecialchars($Produit->get("promotion") * 100) . '%)</td>';
                  }
                  else {
                      echo '<td>' . htmlspecialchars($Produit->get("prixProduit")) .
                          ' <i class="fas fa-euro-sign"></i></td>';
                  }
                  echo '<td class="smartphone">' . htmlspecialchars($Produit->get("quantite")) . '</td>';
              ?>
                </tr>
              </tbody>
            </table>

</div>
<div class="col-sm-4">
      <form method="post" name="formProduit" action="?action=add&controller=Panier">
      <input class="form-control" type="number" placeholder="Quantité" min="0" max="<?php echo $Produit->get('quantite'); ?>" name="quantite" id="quantite_id" value="<?php
      if(isset($_SESSION['panier'])){
          if(isset($_SESSION['panier'][$Produit->get("idProduit")])){
              echo $_SESSION['panier'][$Produit->get("idProduit")];
          }
      }
      ?>" required/>
      <input type="hidden" name="idProduit" id="idProduit" value="<?php echo $Produit->get("idProduit") ?>" />
        <div class="center">
          <button class="btn btn-info my-4 btn-block orange accent-4" type="submit">
            Ajouter au panier
          </button>
        </div>
      <div class="center">
          <button class="btn btn-info my-4 btn-block orange accent-4 directOrder" type="submit">
            Acheter en un clic
          </button>
    </div>
       </form>
    
</div>
</div>
</div>
 <?php
 if (count($tab)>1) {
        echo '<div class="mx-5 py-4">';
        echo '<h3>Produit similaire</h3>';
        echo '<div class="mx-5 py-4 row">';
        foreach ($tab as $Produit) {
            if ($Produit->get("idProduit")!=$_GET['idProduit']) {
                echo '<div class="col-sm-2">
                 <div class="card">
             <a href="?action=read&idProduit='.rawurlencode($Produit->get("idProduit")).'&controller=Produit"><img class="card-img-top" src="./upload/'.htmlspecialchars($Produit->get("idProduit")).'" alt="'.htmlspecialchars($Produit->get("nomProduit")).'" height="150px"></a>
            <!-- Card content -->
            <div class="card-body">
              <!-- Title -->
              <h4 class="card-title">';
                if ((strlen($Produit->get("nomProduit"))>12)) {
                    echo htmlspecialchars(substr($Produit->get("nomProduit"), 0,12));
                } else {
                    echo htmlspecialchars($Produit->get("nomProduit"));
                }
                echo '</h4>
            </div>
          </div>
            </div>';
            }
        }
        echo '</div>';
        echo '</div>';
    }
if (Session::is_admin()) {    
echo '
<div class="text-center py-3">
      <a class="waves-effect waves-light btn orange accent-4 white-text text-lighten-4 effet" href="?action=update&controller=Produit&idProduit='. rawurlencode($Produit->get("idProduit")) .'">Modifier</a>
</div>';
                  }
                
        ?>






        
