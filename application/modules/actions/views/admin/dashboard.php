<div>
    <h3><?php e($structure->ID_PCET.' - '.$structure->NOM_TYPE.' - '.$structure->Nom_Commune.$structure->Nom_Departement.$structure->NOM_EPCI.$structure->nom_pays.$structure->nom_pnr) ?>
    </h3>
</div><br />
<?php foreach($actions as $action): ?>
    <?php $action->NOM_ACTION ?><br />
<?php endforeach; ?>

