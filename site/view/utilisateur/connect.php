
<div class="mx-5 py-5 align-middle">
  <!-- Material form login -->
  <?php
  if (isset($login)) {
    echo '<div class="alert alert-danger" role="alert">
          Erreur : vérifiez vos login - mot de passe
        </div>';
  }
  ?>
<div class="card">

  <h5 class="card-header orange accent-4 white-text text-center py-4">
    <strong>Connectez-vous</strong>
  </h5>

  <!--Card content-->
  <div class="card-body px-lg-5 pt-0">

    <!-- Form -->
    <form method="post" class="text-center" style="color: #757575;" action="?controller=utilisateur&action=connected<?php if($effect=='redirect'){echo '&effect=redirect';} ?>">

      <!-- Email -->
      <div class="md-form">
        <input class="form-control" type="text" placeholder="" name="login" id="materialLoginFormEmail" value="<?php if(isset($login)){ echo htmlspecialchars($login); } ?>" required />
        <label for="materialLoginFormEmail">Login</label>
      </div>

      <!-- Password -->
      <div class="md-form">
        <input class="form-control" type="password" name="mdp" id="materialLoginFormPassword" value="" required>
        <label for="materialLoginFormPassword">Password</label>
      </div>

      <!-- Sign in button -->
      <button class="btn orange accent-4 btn-rounded btn-block my-4 white-text waves-effect z-depth-0" type="submit">Connexion</button>

      <!-- Register -->
      <p>Vous n'êtes pas un membre ?
        <a href="./?controller=utilisateur&action=create">Incrivez-vous</a>
      </p>

    </form>
    <!-- Form -->

  </div>

</div>
</div>
<!-- Material form login -->
