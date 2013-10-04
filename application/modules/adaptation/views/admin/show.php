<div>
    <h3><?php e($adaptation->ID_PCET.' - '.$structure->NOM_TYPE.' - '.$structure->Nom_Commune.$structure->Nom_Departement.$structure->NOM_EPCI.$structure->nom_pays.$structure->nom_pnr) ?>
    </h3>
</div><br />
<table class="table table-striped table-bordered">  
    <tr>
        <th>Étude de vulnérabilité</th>
        <td>
            <?php if($adaptation->VULNERABLE_ADAPT == '1'): ?>
                <?php echo "Oui"; ?>
            <?php else: ?>
                <?php echo "Non"; ?>
            <?php endif; ?> 
        </td>
    </tr>
    <tr>
        <th>Méthode employée</th>
        <td><?php echo auto_typography($adaptation->METHODE_ADAPT) ?></td>
    </tr>
    <tr>
        <th>Aléas identifiés</th>
        <td><?php echo auto_typography($adaptation->ALEA_ADAPT) ?></td>
    </tr>
</table> 
