<div>
    <h3><?php e($action->ID_PCET.' - '.$structure->NOM_TYPE.' - '.$structure->Nom_Commune.$structure->Nom_Departement.$structure->NOM_EPCI.$structure->nom_pays.$structure->nom_pnr) ?>
    </h3>
</div><br />
<table class="table table-striped table-bordered">
    <tbody>
        <tr>
            <th>Domaine d'action</th>
            <td><?php e($domaine->NOM_DOMAINE_ACTION)?></td>
        </tr>
        <tr>
            <th>Compétence de la collectivité</th>
            <td>
                <?php if($action->COMPETENCE == '1'): ?>
                    <?php echo "Oui"; ?>
                <?php else: ?>
                    <?php echo "Non"; ?>
                <?php endif; ?>
            </td>
        </tr>
        <tr>
            <th>Nom de l'action</th>
            <td><?php echo auto_typography($action->NOM_ACTION)?></td>
        </tr>
        <tr>
            <th>Objectifs</th>
            <td><?php echo auto_typography($action->OBJECTIFS) ?>
        </tr>
        <tr>
            <th>Indicateurs de suivi</th>
            <td><?php echo auto_typography($action->INDICATEUR_SUIVI)?></td>
        </tr>
    </tbody>
</table>