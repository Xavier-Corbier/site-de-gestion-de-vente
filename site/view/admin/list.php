
<div class="mx-5 py-5 px-5">
    <div class="row">
        <div class="col-md-6">
            <div class="text-center">
                <h6>Images caroussel Accueil</h6>
            </div>
            <form class="text-center" method="post" action="?action=carousel&controller=<?php echo static::$object ?>" enctype="multipart/form-data">
                <h6>Photo 1</h6>
                <input class="form-control" type="file" name="nom-du-fichier1" required="required">
                <h6>Photo 2</h6>
                <input class="form-control" type="file" name="nom-du-fichier2" required="required">
                <h6>Photo 3</h6>
                <input class="form-control" type="file" name="nom-du-fichier3" required="required">
                <button class="btn btn-info my-4 btn-block orange accent-4" type="submit">Envoyer</button>
            </form>
        </div>
        <div class="col-md-6">
            <div class="text-center"><h6>Produit à réaprovisionner</h6></div>
            <div class="text-center"><h6>(Limite 2)</h6></div>
            <table class="table product-table">

                <!-- Table head -->
                <thead class="mdb-color lighten-5">
                <tr>
                    <th class="font-weight-bold">
                        <strong>Nom</strong>
                    </th>
                    <th class="font-weight-bold">
                        <strong>Action</strong>
                    </th>
                </tr>
                </thead>
                <!-- /.Table head -->

                <tbody>
                <?php
                foreach ($tab as $valeur){
                    echo '<tr> <th> '.htmlspecialchars($valeur->get("nomProduit")).'</th> <td>';
                    if($valeur->get("idFournisseur")==NULL){
                        echo "Le produit n'est plus fourni";
                    } else {
                        echo '<a class="white-text waves-effect waves-light btn orange accent-4 white-text text-lighten-4 effet" href="?action=read&controller=Fournisseur&idFournisseur='.rawurlencode($valeur->get("idFournisseur")).'" style="width: 100%;">Contacter fournisseur</a>';
                        echo '<form method="post" action="?action=create&controller=commande">
                                <input type="hidden" name="idProduit" id="idProduit_id" value="'.htmlspecialchars($valeur->get("idProduit")).'">
                                <input type="hidden" name="idFournisseur" id="idFournisseur_id" value="'.htmlspecialchars($valeur->get("idFournisseur")).'">
                                <div class="white-text">
                                  <button class="btn btn-info my-4 btn-block orange accent-4" type="submit">Commander un nouveau stock ?</button>
                                </div>
                                  </p>
                              </form>';
                    }
                    echo '</td>';;
                }


                ?>
                </tbody>
            </table>

        </div>
        </div>
    </div>



      





