<div class="mx-5 py-4">
<form class="text-center" method="post" action="?action=<?php echo $effect ?>&controller=<?php echo static::$object ?>">
    <div class="form-row mb-4">

    </div>
    <div class="form-row mb-4">
        <?php echo '<p> prix total : '.htmlspecialchars($v->get("prixTotal")).'</p>'?>
        
    </div>
    <div class="form-row mb-4">
        <?php echo 'date de commande : '.$v->get('dateCommande') ?>
        
    </div>
    <div class="form-row mb-4">
        <label for="dateLivraison_id">Date de livraison</label>
        <input class="form-control" type="date" min=" <?php echo $v->get('dateCommande') ?>" placeholder="" name="dateLivraison" id="dateLivraison_id"  required/>
    </div>
    <input type="hidden" name="commandeEnCours" id="cC_id" value="<?php echo base64_encode(serialize($v));?>">
    <input  type="hidden" name="idClient" id="idClient_id" value="<?php echo htmlspecialchars($v->get("idClient"))?>"/>
    
      	<button class="btn btn-info my-4 btn-block orange accent-4" type="submit">Envoyer</button>
      </form>
</div>

    <?php
    
    ?>