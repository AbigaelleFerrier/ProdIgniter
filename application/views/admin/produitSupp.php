<div class="container">
    <div class="row">
        <fieldset>
            <legend>Supprimer ?</legend>
            <h3 class="center-align">Etes-vous sûr de vouloir Supprimer le produit ?</h3>
            <div class="col s6 center">
                <a href="<?php echo base_url('Accueil') ?>" class="btn">NON</a>
            </div>
            <div class="col s6 center">
                <a href="<?php echo base_url('AdminProduit/del/'. $ref) ?>" class="btn">OUI</a>
            </div>
        </fieldset>
    </div>
</div>
