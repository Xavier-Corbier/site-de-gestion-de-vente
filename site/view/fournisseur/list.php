 <div class="mx-5 py-4">
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
                   foreach ($tab_fournisseur as $Fournisseur) {
                    echo '<tr> <th> '.htmlspecialchars($Fournisseur->get("nomFournisseur")).'</th>';
                    echo '<td>'.'<a href="?action=read&idFournisseur='.rawurlencode($Fournisseur->get("idFournisseur")).'&controller=Fournisseur"><i class="material-icons">settings</i></a>';
                    echo '<a href="?action=delete&idFournisseur='.rawurlencode($Fournisseur->get("idFournisseur")).'&controller=Fournisseur"><i class="material-icons">delete</i></a>';
                    echo '<a href="?action=update&controller=Fournisseur&idFournisseur='.rawurlencode($Fournisseur->get("idFournisseur")).'"><i class="material-icons">edit</i></a>' . '</td></tr>';
                  }
                
        ?>
         </tbody>
</table>
 </div>

<div class="text-center py-3" style="padding-top:40px;">
      <a class="waves-effect waves-light btn orange accent-4 white-text text-lighten-4 effet" href="?action=create&controller=Fournisseur">Créer un Fournisseur</a>
</div>
