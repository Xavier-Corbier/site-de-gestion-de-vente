<div class="mx-5 py-5">
    <!-- Material form register -->
    <div class="card">

        <h5 class="card-header orange accent-4 white-text text-center py-4">
            <strong><?php 
    	if($effect==='created'){
    		echo 'Inscription';
    	} else {
    		echo 'Mettre à jour';
    	}
    	?></strong>
        </h5>

        <!--Card content-->
        <div class="card-body px-lg-5 pt-0">

            <!-- Form -->
            <form class="text-center" style="color: #757575;" method="post" action="?action=<?php echo $effect ?>&controller=<?php echo static::$object ?>">

                <div class="form-row">
                    <div class="col">
                        <!-- First name -->
                        <div class="md-form">
    			<input class="form-control" type="text" placeholder="" name="prenom" id="prenom_id" value="<?php echo htmlspecialchars($v->get("prenom"))?>" required/>
                            <label for="prenom_id">Prenom</label>
                        </div>
                    </div>
                    <div class="col">
                        <!-- Last name -->
                        <div class="md-form">
    			<input type="text" placeholder="" class="form-control" name="nom" id="nom_id" value="<?php echo htmlspecialchars($v->get("nom"))?>" required/>
                            <label for="nom_id">Nom</label>
                        </div>
                    </div>
                </div>

                <div class="form-row">
                    <div class="col">
                        <!-- Login -->
                        <div class="md-form">
    			<input class="form-control" type="text" placeholder="" name="login" id="log_id" value="<?php echo htmlspecialchars($v->get("login")).'" '. $input?> />
                            <label for="log_id">Nom d'utilisateur</label>
                        </div>
                    </div>
                    <div class="col">
                        <!-- Email -->
                        <div class="md-form">
    			<input class="form-control" type="email" placeholder="" name="email" id="email_id" value="<?php echo htmlspecialchars($v->get("email"))?>" required/>
                            <label for="email_id">Email</label>
                        </div>
                    </div>
                </div>
    		<?php
    		if(!Session::is_admin()){
                echo '<div class="form-row">
                    <div class="col">
                        <!-- PSW -->
                        <div class="md-form">
    			<input class="form-control" type="password" name="mdp" id="mdp_id" value="" required>
                            <label for="mdp_id">Mot de passe</label>
                        </div>
                    </div>
                    <div class="col">
                        <!-- PSW BIS -->
                        <div class="md-form">
    			<input class="form-control" type="password" name="mdpbis" id="mdpbis_id" value="" required>
                            <label for="mdpbis_id">Retappez votre mot de passe</label>
                        </div>
                    </div>
                </div>';
    		}
    		?>
    	    <?php
                if ($effect=='updated' && Session::is_admin() && $v->get("login")!="caisse") {
                  echo '
                  <input class="form-control" type="checkbox" id="admin_id" name="admin"  />
                  <label for="admin_id">Administrateur</label>';
                }
                ?>

                <!-- Sign up button -->
                <button class="btn white-text orange accent-4 btn-rounded btn-block my-4 waves-effect z-depth-0" type="submit">Envoyer</button>

                <hr>

                <!-- Terms of service -->
                <p>En vous inscrivant, vous acceptez
                    <a href="" target="_blank"> nos conditions d'utilisations</a> </p>

                    <input  type="hidden" name="idClient" id="idClient_id" value="<?php echo $v->get('idClient')?>" required>
            </form>
            <!-- Form -->

        </div>

    </div>
    <!-- Material form register -->
</div>