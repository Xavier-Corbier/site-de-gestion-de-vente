<div class="mx-5 py-5 px-5">
	<div class="card mx-5 py-5 px-5">
		   <?php
        foreach ($tab_v as $v)
            echo '<p> Utilisateur d\'identifiant ' . '<a href="?action=read&controller=Utilisateur&login='.rawurlencode($v->get("login")).'">' .htmlspecialchars($v->get("login")).'</a>' . '</p>';
        ?>
	</div>
</div>
        
