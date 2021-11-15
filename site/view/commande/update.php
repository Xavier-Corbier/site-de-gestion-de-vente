<div class="mx-5 py-4">
<form class="text-center" method="post" action="?action=<?php echo $effect ?>&controller=<?php echo static::$object ?>">
    <div class="form-row mb-4">
            <label for="quantite_id">Quantité</label>
            <input class="form-control" type="number" placeholder="Quantité" name="quantite" id="quantite_id" value="<?php echo htmlspecialchars($v->get("quantite"))?>" required/>
    </div>
    <div class="form-row mb-4">
            <label for="date_id">Date de Livraison</label>
            <input class="form-control" type="date" placeholder="" name="date" id="date_id" value="<?php echo htmlspecialchars($v->get("date"))?>" required/>
    </div>
    <div class="form-row mb-4">
            <label for="prixCommande_id">Prix de Commande négocié</label>
            <input class="form-control" type="number" placeholder="Prix" name="prixCommande" id="prixCommande_id" value="<?php echo htmlspecialchars($v->get("prixCommande"))?>" required/>
    </div>
        <input type="hidden" name="idProduit" id="idProduit_id" value="<?php echo htmlspecialchars($_POST['idProduit']); ?>">
        <input id="idProduit" name="idCommande" type="hidden" value="<?php echo htmlspecialchars($v->get("idCommande")); ?>">
        <input type="hidden" name="idFournisseur" id="idFournisseur_id" value="<?php echo htmlspecialchars($_POST['idFournisseur']); ?>">
      	<button class="btn btn-info my-4 btn-block orange accent-4" type="submit">Envoyer</button>
      </form>
</div>

