<div class="mx-5 py-4">
  <form class="text-center" method="post" action="?action=<?php echo $effect ?>&controller=<?php echo static::$object ?>">
      <div class="form-row mb-4">
        <input class="form-control" type="text" placeholder="Nom de catégorie" name="valeur" id="valeur_id" value="<?php echo htmlspecialchars($v->get("valeur"))?>" required/>
      </div>
      
      <input type="hidden" name="id" id="hiddenField" value="<?php echo $v->get("id"); ?>" />
      <button class="btn btn-info orange accent-4 my-4 btn-block" type="submit">Envoyer</button>
  </form>
</div>
