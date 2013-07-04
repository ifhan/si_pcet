<div class="admin-box">
	<h3><?php echo lang('departements_title')?></h3>
	<?php echo form_open($this->uri->uri_string()); ?>
		<table class="table table-striped">
			<thead>
				<tr>
					<?php if ($this->auth->has_permission('Departements.Content.Delete') && isset($records) && is_array($records) && count($records)) : ?>
					<th class="column-check"><input class="check-all" type="checkbox" /></th>
					<?php endif;?>
					
					<th>Code INSEE</th>
					<th>Nom</th>
					<th>Abscisse</th>
					<th>Ordonnée</th>
					<th>Date d'extraction IGN</th>
                                        <th>Actions</th>
				</tr>
			</thead>
			<?php if (isset($records) && is_array($records) && count($records)) : ?>
			<tfoot>
				<?php if ($this->auth->has_permission('Departements.Content.Delete')) : ?>
				<tr>
					<td colspan="7">
						<input type="submit" name="delete" id="delete-me" class="btn btn-danger" value="<?php echo lang('bf_action_delete') ?>" onclick="return confirm('<?php e(js_escape(lang('departements_delete_confirm'))); ?>')">
                                                <?php echo lang('bf_with_selected') ?>
                                        </td>
				</tr>
				<?php endif;?>
			</tfoot>
			<?php endif; ?>
			<tbody>
			<?php if (isset($records) && is_array($records) && count($records)) : ?>
			<?php foreach ($records as $record) : ?>
				<tr>
					
                                    <?php if ($this->auth->has_permission('Departements.Content.Delete')) : ?>
                                    <td><input type="checkbox" name="checked[]" value="<?php echo $record->id ?>" /></td>
                                    <?php endif;?>

                                    <td><?php e($record->INSEE_Departement) ?></td>
                                    <td><?php e($record->Nom_Departement) ?></td>
                                    <td><?php e($record->Abscisse_Departement) ?></td>
                                    <td><?php e($record->Ordonnee_Departement) ?></td>
                                    <td><?php e($record->EXTRACTION_IGN) ?></td>
                                    <td>
                                        <?php if ($this->auth->has_permission('Departements.Content.Edit')) : ?>
                                        <?php echo anchor(SITE_AREA .'/content/departements/edit/'. $record->id, '<i class="icon-pencil">&nbsp;</i>Modifier') ?>
                                        <?php endif; ?>
                                    </td>    
				</tr>
			<?php endforeach; ?>
			<?php else: ?>
				<tr>
					<td colspan="7"><?php echo lang('bf_no_record_found'); ?></td>
				</tr>
			<?php endif; ?>
			</tbody>
		</table>
	<?php echo form_close(); ?>
</div>