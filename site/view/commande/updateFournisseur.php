<div class="mx-5 py-4">
<form class="text-center" method="post" action="?action=<?php echo $effect ?>&controller=<?php echo static::$object ?>">
  <div class="form-row mb-4">
    <select class="browser-default custom-select" name="idFournisseur" id="idFournisseur_id" required>
                <option value="" disabled selected>Choisir un fournisseur</option>
                <?php
                foreach ($tab as $val)
                  echo '<option value="'.htmlspecialchars($val->get("idFournisseur")).'">'.htmlspecialchars($val->get("nomFournisseur")).'</option>';
                ?>
            </select>
    </div>
        <div class="text-center">
          <button class="btn btn-info my-4 btn-block orange accent-4" type="submit">Envoyer</button>
        </div>
</form>
</div>