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
                   foreach ($tab_Categorie as $Categorie){
                   	echo '<tr> <th> '.htmlspecialchars($Categorie->get("valeur")).'</th>';
                    echo '<td><a href="?action=delete&id='.rawurlencode($Categorie->get("id")).'&controller=Categorie"><i class="material-icons">delete</i></a>';
                    echo '<a href="?action=update&controller=Categorie&id='.rawurlencode($Categorie->get("id")).'"><i class="material-icons">edit</i></a>' . '</td>';
                  }
                
        ?>
         </tbody>
</table>
 </div>
<div class="text-center" style="padding-top:40px;">
	  	<a class="waves-effect waves-light btn orange accent-4 white-text text-lighten-4 effet" href="?action=create&controller=Categorie">Créer un Categorie</a>
</div>
