<div class="mx-5 py-4">
    <table class="table product-table">
        <tr>
            <th class="font-weight-bold">
                <strong>Statistique</strong>
            </th>
            <th class="font-weight-bold">
                <strong>Valeur</strong>
            </th>
        </tr>
        <?php
            echo '<tr><td> Chiffre d\'affaires : </td><td>' . $ca . '</td></tr>';
            echo '<tr><td> Moyenne prix de panier : </td><td>' . $moyPanier . '</td></tr>';
            echo '<tr><td> Produit le plus commandé : </td><td>' . $maxCommande . '</td></tr>';
        ?>
    </table>
</div>
<hr>
<div class="mx-5 py-4">
    <h5>Chiffres d'affaires</h5>
    <form method="post" action="?controller=statistique">
        <label>Debut</label>
        <input type="date" class="form-control" name="debut" min="2018-01-01" max="" required>
        <label>Fin</label>
        <input type="date" class="form-control" name="fin" min="2018-01-01" max=""  required>
        <label>Clients</label>
        <select class="browser-default custom-select" name="client">
            <option value="0" selected>Tout les clients</option>
            <?php
            foreach ($clients as $val) {
                echo '<option value="' . htmlspecialchars($val->get("login")) . '">' . htmlspecialchars($val->get("nom")) . '</option>';
            }
                ?>
        </select>
        <button class="btn btn-info my-4 btn-block orange accent-4" type="submit">Afficher</button>
    </form>
    <hr>
    <br>
    <?php
    if ($client===0){
        $personne='tous les clients';
    } else {
        $personne=ModelUtilisateur::select($client)->get("nom");
    }
    echo '<h6>Chiffre d\'affaire du '.$debut.' au '.$fin.' de '.$personne.' </h6>'; ?>

</div>
<div style="height: 400px">
    <script src="https://cdn.jsdelivr.net/npm/chart.js@2.8.0"></script>
    <div class="chart-container" style="position: relative; height:400px; width:800px; margin: 0 auto;">
        <canvas id="myChart"></canvas>
    </div>
    <script>
        var ctx = document.getElementById('myChart').getContext('2d');
        var myChart = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: [<?php
                    foreach ($caPeriode as $key => $value){
                        echo "'$mois[$key]'".',';
                    }
                    ?>],
                datasets: [{
                    label: 'Chiffres d\'affaires',
                    data: [
                        <?php
                            foreach ($caPeriode as $key => $value){
                                echo $value.',';
                            }
                            ?>
                        ],
                    backgroundColor: [
                        <?php
                        foreach ($caPeriode as $key => $value){
                            echo "'rgba(54, 162, 235, 0.2)',";
                        }
                        ?>
                    ],
                    borderColor: [
                        <?php
                        foreach ($caPeriode as $key => $value){
                            echo "'rgba(54, 162, 235, 1)',";
                        }
                        ?>
                    ],
                    borderWidth: 1
                }]
            },
            options: {
                scales: {
                    yAxes: [{
                        ticks: {
                            beginAtZero: true
                        }
                    }]
                }
            }
        });
    </script>
</div>
<div class="text-center py-3" style="padding-top:40px;">
    <a class="waves-effect waves-light btn orange accent-4 white-text text-lighten-4 effet" href="?action=createFournisseur&controller=facture">Facture fournisseur</a>
</div>
