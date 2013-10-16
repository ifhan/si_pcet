<div>
    <h3><?php e($domaine->NOM_DOMAINE_ACTION); ?>
    </h3>
</div><br />
<table class="table table-striped">
        <thead>
            <tr>
                <th>PCET</th>
                <th>Nom de l'action</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php if (isset($records) && is_array($records) && count($records)) : ?>
            <?php foreach ($records as $record) : ?>
            <tr>
                <td></td>
                <td><?php echo auto_typography($record->NOM_ACTION); ?></td>
                <td></td>
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