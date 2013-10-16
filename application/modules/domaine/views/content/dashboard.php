<div>
    <h3><?php e($domaine->NOM_DOMAINE_ACTION); ?>
    </h3>
</div><br />
<table class="table table-striped">
        <thead>
            <tr>
                <th>Nom de l'action</th>
            </tr>
        </thead>
        <tbody>
            <?php if (isset($records) && is_array($records) && count($records)) : ?>
            <?php foreach ($records as $record) : ?>
            <tr>
                <td><?php echo auto_typography($record->NOM_ACTION); ?></td>
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