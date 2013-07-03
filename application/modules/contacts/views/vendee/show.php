<div class="admin-box">
    <h3>
        <?php echo lang('contacts');  ?> : <?php e($structure->NOM_TYPE) ?> - <?php e($structure->Nom_Commune) ?><?php e($structure->Nom_Departement) ?><?php e($structure->NOM_EPCI) ?><?php e($structure->nom_pays) ?><?php e($structure->nom_pnr) ?>
    </h3>
    <table class="table table-striped">
        <thead>
            <tr>
                <th>Civilité</th>
                <th>Nom</th>
                <th>Prénom</th>
                <th>Courriel</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php if (isset($records) && is_array($records) && count($records)) : ?>
            <?php foreach ($records as $record) : ?>
            <tr>
                <td><?php e($record->CIVILITE) ?></td>
                <td><?php e($record->NOM_CONTACT) ?></td>
                <td><?php e($record->PRENOM) ?></td>
                <td><?php echo mailto($record->MAIL, '<i class="icon-envelope">&nbsp;</i> ' .  $record->MAIL, 'target="_blank"'); ?></td>
                <td><?php e($record->POSTE) ?></td>
                <td><?php echo anchor(SITE_AREA .'/vendee/structures/', '<i class="icon-step-backward">&nbsp;</i>Retourner au module "Collectivités"'); ?></td>
            </tr>
            <?php endforeach; ?>
            <?php else: ?>
            <tr>
                <td colspan="4"><?php echo lang('bf_no_record_found'); ?></td>
                <td><?php echo anchor(SITE_AREA .'/vendee/structures/', '<i class="icon-step-backward">&nbsp;</i>Retourner au module "Collectivités"'); ?></td>
            </tr>
            <?php endif; ?>
        </tbody>
    </table>
</div>
