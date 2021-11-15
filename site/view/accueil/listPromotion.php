<!--Carousel Wrapper-->
<div id="carousel-example-1z" class="carousel slide carousel-fade" data-ride="carousel" style="height: 50vh;top: -40px;">
    <!--Indicators-->
    <ol class="carousel-indicators">
        <li data-target="#carousel-example-1z" data-slide-to="0" class="active"></li>
        <li data-target="#carousel-example-1z" data-slide-to="1"></li>
        <li data-target="#carousel-example-1z" data-slide-to="2"></li>
    </ol>
    <!--/.Indicators-->
    <!--Slides-->
    <div class="carousel-inner" role="listbox">
        <!--First slide-->
        <div class="carousel-item active">
            <img class="d-block w-100" src="./upload/accueil1"
                 alt="First slide" style="height: 50vh;">
        </div>
        <!--/First slide-->
        <!--Second slide-->
        <div class="carousel-item">
            <img class="d-block w-100" src="./upload/accueil2"
                 alt="Second slide" style="height: 50vh;">
        </div>
        <!--/Second slide-->
        <!--Third slide-->
        <div class="carousel-item">
            <img class="d-block w-100" src="./upload/accueil3"
                 alt="Third slide" style="height: 50vh;">
        </div>
        <!--/Third slide-->
    </div>
    <!--/.Slides-->
    <!--Controls-->
    <a class="carousel-control-prev" href="#carousel-example-1z" role="button" data-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="sr-only">Previous</span>
    </a>
    <a class="carousel-control-next" href="#carousel-example-1z" role="button" data-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="sr-only">Next</span>
    </a>
    <!--/.Controls-->
</div>
<!--/.Carousel Wrapper-->
<div class="mx-5 py-4">
    <table class="table product-table">
        <tbody>
    <?php
    echo '<h3>Promotion du jour</h3>';
        foreach ($tab_Produit as $Produit) {
            echo '<tr> <th> <a href="?action=read&idProduit='.rawurlencode($Produit->get("idProduit")).'&controller=Produit">'.htmlspecialchars($Produit->get("nomProduit")).'</a></th>';

            $prixPromotion = $Produit->get("prixProduit") * (1 - $Produit->get("promotion"));

            if (!$Produit->get("promotion") == 0) {
                echo '<td class="smartphone"> Prix conseillé : <strike>' . htmlspecialchars($Produit->get("prixProduit")) . '</strike> <i class="fas fa-euro-sign"></i></td>';
                echo '<td> Promotion du jour : ' . htmlspecialchars($prixPromotion) . ' <i class="fas fa-euro-sign"></i></td>';
            }

            if (Session::is_admin()) {
                echo '<td><a href="?action=delete&idProduit='.rawurlencode($Produit->get("idProduit")).'&controller=Produit"><i class="material-icons">delete</i></a>';
                echo '<a href="?action=update&controller=Produit&idProduit='.rawurlencode($Produit->get("idProduit")).'"><i class="material-icons">edit</i></a>' . '</td>';
            }
            echo '</tr>';
        }
        ?>
         </tbody>
</table>
     <div>
         <a href="?action=readAll&controller=Produit">Voir tout nos produits</a>
     </div>

 </div>

