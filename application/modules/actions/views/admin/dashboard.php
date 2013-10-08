<div>
    <h3><?php e($structure->ID_PCET.' - '.$structure->NOM_TYPE.' - '.$structure->Nom_Commune.$structure->Nom_Departement.$structure->NOM_EPCI.$structure->nom_pays.$structure->nom_pnr) ?>
    </h3>
</div><br />
<table class="table table-striped">
        <thead>
            <tr>
                <th>Domaine d'action</th>
                <th>Compétence de la collectivité</th>
                <th>Nom de l'action</th>
                <th>Objectifs</th>
                <th>Indicateurs de suivi</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php if (isset($records) && is_array($records) && count($records)) : ?>
            <?php foreach ($records as $record) : ?>
            <tr>
                <td><?php $record->NOM_DOMAINE_ACTION ?></td>
                <td></td>
                <td><?php $record->NOM_ACTION ?></td>
            </tr>
            <?php endforeach; ?>
            <?php else: ?>
            <tr>
                <td colspan="6"><?php echo lang('bf_no_record_found'); ?></td>
                <td></td>
            </tr>
            <?php endif; ?>
        </tbody>
    </table>
</div>


