<a href="./?action=quit&controller=caisse" class="btn btn-danger" style="position: fixed; top: 0; right: 0; z-index: 10">Quitter la caisse</a>
<div>
    <form method="post" action="?action=add&controller=caisse">
        <div class="mx-5 py-4">
            <div class="row">
                <div class="col-md-6">
                    <?php
                    echo "<select class='form-control' name='idProduit' required>";
                    foreach ($tab_Produit as $Produit) {
                        $url = rawurlencode($Produit->get("idProduit"));
                        $hml = htmlspecialchars($Produit->get("nomProduit"));
                        echo " <option value=$url>$hml</option>";
                    }
                    echo "</select>";
                    ?>
                </div>
                <div class="col-md-6">
                    <input class="form-control" id="quantite" name="quantite" type="text" readonly required>
                </div>
            </div>
            <div class="text-center mx-5 py-4">
                <input class="btn btn-danger" type="submit" value="valider">
            </div>
        </div>
    </form>

    <div class="mx-5 py-4">
        <button class="btn btn-success" onclick="add(0)">0</button>
        <button class="btn btn-success" onclick="add(1)">1</button>
        <button class="btn btn-success" onclick="add(2)">2</button>
        <button class="btn btn-success" onclick="add(3)">3</button>
        <button class="btn btn-success" onclick="add(4)">4</button>
        <button class="btn btn-success" onclick="add(5)">5</button>
        <button class="btn btn-success" onclick="add(6)">6</button>
        <button class="btn btn-success" onclick="add(7)">7</button>
        <button class="btn btn-success" onclick="add(8)">8</button>
        <button class="btn btn-success" onclick="add(9)">9</button>
        <button class="btn btn-success" onclick="del()">Supprimer</button>
    </div>

    <div class="row mx-5 py-4">
        <div class="col-md-6 text-center">
            <form method="post" action="?action=deleteAll&controller=caisse">
                <input class="btn btn-danger" type="submit" value="ANNULER TOUT">
            </form>
        </div>
        <div class="col-md-6 text-center">
            <form method="post" action="?action=ValiderCommande&controller=caisse">
                <input class="btn btn-danger" type="submit" value="Fin transaction">
            </form>
        </div>
    </div>

</div>
<hr>
<div class="row">
    <div class="col-md-6">
        <?php
        if (isset($_SESSION['panier'])) {
            echo '<div class="text-center">
                    <h4> Panier </h4>
                  </div>';
            echo '<div class="mx-4 py-4">';
            echo '<div class="mx-4 py-4">';
            foreach ($_SESSION['panier'] as $key => $value) {
                echo "<p> ";
                echo ModelProduit::select($key)->get('nomProduit'); //là t'as le nom
                echo " - quantité : ";
                echo $value ; //là t'as la quantité acheté
                echo "</p>";
            }
            echo "</div>";
            echo "<br>";
            echo '<p>Prix total : '.$_SESSION['prix'].'</p>';
            echo '</div>';
        }
        ?>
    </div>
    <div class="col-md-6">
        <div class="mx-4 py-4">
            <form  method="post" action="?controller=caisse&action=change">
                <select class="browser-default custom-select" name="client">
                    <option value="0" selected>Lier à un client</option>
                    <?php
                    foreach ($user as $val) {
                        echo '<option value="' . htmlspecialchars($val->get("login")) . '">' . htmlspecialchars($val->get("nom")) . '</option>';
                    }
                    ?>
                </select>
                <button class="btn btn-info my-4 btn-block orange accent-4" type="submit">Lier</button>
            </form>
        </div>
    </div>
</div>
<script type="text/javascript">
    var n = "";
    function add(num) {
        n = n.concat(num.toString());
        document.getElementById("quantite").value = n;
    }
    function clears() {
        n = "";
        document.getElementById("quantite").value = n;
    }
    function ok() {
    }
    function del() {
        n = n.substring(0, n.length - 1);
        document.getElementById("quantite").value = n;
    }

</script>