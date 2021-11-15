<div class="mx-1 py-5">
    <div class="card mx-1 py-5 px-5">

        <?php
            echo '<p> Nom d\'Utilisateur : ' . htmlspecialchars($v->get("login")) . '.</p>';
            echo '<p> Nom : ' . htmlspecialchars($v->get("nom")) . '.</p>';
            echo '<p> Prenom : ' . htmlspecialchars($v->get("prenom")) . '.</p>';
            echo '<p> Email : ' . htmlspecialchars($v->get("email")) . '.</p>';
            echo '</div>';
            echo '<div class="text-center">';
 
        if ($v->get("login")===$_SESSION['login'] or Session::is_admin()==true) {
            if ($v->get("login")!="caisse"){
                echo '<a href="?action=delete&controller=Utilisateur&login='.rawurlencode($v->get("login")).'"><button class="btn  btn-info my-4 btn-block orange accent-4" type="submit">Supprimer</button></a>';
                echo '<a href="?action=update&controller=Utilisateur&login='.rawurlencode($v->get("login")).'"><button class="btn btn-info my-4 btn-block orange accent-4" type="submit">Modifier</button></a>';
            }
        }

        ?>
    </div>
</div>