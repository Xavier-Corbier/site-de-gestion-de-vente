<?php 
if ($effect=='cancelled'){
    echo '<div class="alert alert-success mx-5" role="alert"> La commande a bien été annulée !</div>';
}
if (Session::is_admin()){
    $admin = true;
} else {
    $admin = false;
}

if($admin){
    echo '<form class="text-center" method="post" action="?action=readAll&controller=commandeClient">
    <select class="browser-default custom-select" name="idClient" id="idClient_id">
    <option value="" disabled selected>Sélectionner un client</option>';  
    foreach ($tab_client as $client){
        $idClient=$client->get("login");
        echo '<option value="'.htmlspecialchars(ModelUtilisateur::select($idClient)->get('idClient')).'">'.htmlspecialchars($idClient).'</option>';
    }
    echo '</select> <button class="btn my-4" type="submit">Selectionner</button></form>';
}
?> 

<script src="css/template/js/addons/ModalArg.js" ></script>
<div class="mx-1 py-4">
    <table class="table product-table">

            <!-- Table head -->
            <thead class="mdb-color lighten-5">
              <tr>
                <?php if(Session::is_admin()){
                    echo '<th class="font-weight-bold">
                  <strong>Nr Client</strong>
                </th>';
                }
                ?>
                <th class="font-weight-bold">
                  <strong>Nr Commande</strong>
                </th>
                <th class="font-weight-bold">
                  <strong>Etat Commande</strong>
                </th>
                  <?php if(Session::is_admin()){
                      echo '<th class="font-weight-bold">
                              <strong>Date</strong>
                            </th>';
                  }
                  ?>
                <th class="font-weight-bold">
                  <strong>Prix</strong>
                </th>
                <th class="font-weight-bold">
                  <strong>Actions</strong>
                </th>
              </tr>
            </thead>
            <!-- /.Table head -->

        <tbody>            
		<?php
                    
                    if (empty($tab_CommandeClient)){
                        echo 'Aucune commande enregistrée';
                    }
                    else{
                   foreach ($tab_CommandeClient as $Commande){
                    if ($admin){                   
                        echo '<tr> <th> '.$Commande->get("idClient").' </th> ';
                        echo '<td>'.htmlspecialchars($Commande->get("idCommandeClient")).' </td> ';
                    }
                    else{
                        echo '<tr> <th> '.htmlspecialchars($Commande->get("idCommandeClient")).' </th> ';
                    }
                    echo '<td> '.$Commande->getEtat().' </td> ';
                    if (Session::is_admin()){
                        echo '<td> '.htmlspecialchars($Commande->get("dateLivraison")).'</td> ';
                    }
                    echo '<td> '.htmlspecialchars($Commande->get("prixTotal")).'</td> ';

                    echo '<td><a href="?action=read&idCommandeClient='.rawurlencode($Commande->get("idCommandeClient")).'&controller=CommandeClient"><i class="material-icons">search</i></a>';
                    if ($Commande->get("etatCommande")<2){
                        if ($admin){echo '<a class="material-icons send" href="?action=send&idCommandeClient='.rawurlencode($Commande->get("idCommandeClient")).'&controller=CommandeClient">send</a>';}
                        echo '<a class="material-icons annuler" data-toggle="modal" data-target="#confirmation" data-id='.rawurlencode($Commande->get("idCommandeClient")).'>cancel</a></td></tr>';
                        
                            }
                            
                        } 
                    }
        ?>
         </tbody>
<!-- prompt de confirmation d annulation de commande -->         
  <div class="modal fade" id="confirmation" tabindex="-1" role="dialog" aria-labelledby="confirmation" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="confirmation">Annuler la commande</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        Voulez-vous vraiment annuler cette commande ?
      </div>
      <div class="modal-footer">
         <form method="post" action="?action=cancel&controller=commandeClient">
        <input type="hidden" name="idCommandeClient" id="idCommandeClient" value=""/>
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Retour</button>
        <button class="btn btn-info my-4 orange accent-4" type="submit">Annuler</button>
         </form>
      </div>
    </div>
  </div>
</div>

</table>
<div class="text-center py-3" style="padding-top:40px;">
      <a class="waves-effect waves-light btn orange accent-4 white-text text-lighten-4 effet" href="?action=read&controller=panier">Acceder au panier</a>
</div>

