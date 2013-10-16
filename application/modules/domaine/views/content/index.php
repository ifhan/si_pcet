<div class="admin-box">
	<h3><?php echo lang('domaine_title'); ?></h3>
	<?php echo form_open($this->uri->uri_string()); ?>
		<table class="table table-striped">
			<thead>
				<tr>
					<?php if ($this->auth->has_permission('Domaine.Content.Delete') && isset($records) && is_array($records) && count($records)) : ?>
					<th class="column-check"><input class="check-all" type="checkbox" /></th>
					<?php endif;?>
					
					<th>Nom du domaine d'action</th>
                                        <th>Actions</th>
				</tr>
			</thead>
			<?php if (isset($records) && is_array($records) && count($records)) : ?>
			<tfoot>
				<?php if ($this->auth->has_permission('Domaine.Content.Delete')) : ?>
				<tr>
					<td colspan="3">
						<input type="submit" name="delete" id="delete-me" class="btn btn-danger" value="<?php echo lang('bf_action_delete') ?>" onclick="return confirm('<?php e(js_escape(lang('domaine_delete_confirm'))); ?>')">
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
                                    <?php if ($this->auth->has_permission('Domaine.Content.Delete')) : ?>
                                    <td><input type="checkbox" name="checked[]" value="<?php echo $record->id ?>" /></td>
                                    <?php endif;?>
                                    
                                    <td><?php e($record->NOM_DOMAINE_ACTION) ?></td>
                                    <td>
                                        <?php echo anchor(SITE_AREA .'/content/domaine/dashboard/'. $record->id, '<i class="icon-info-sign">&nbsp;</i>Voir les actions de ce domaine') ?><br />
                                        <?php if ($this->auth->has_permission('Domaine.Content.Edit')) : ?>
                                            <?php echo anchor(SITE_AREA .'/content/domaine/edit/'. $record->id, '<i class="icon-pencil">&nbsp;</i>Modifier') ?>
                                        <?php endif; ?>
                                    </td>
				</tr>
			<?php endforeach; ?>
			<?php else: ?>
				<tr>
					<td colspan="3"><?php echo lang('bf_no_record_found'); ?></td>
				</tr>
			<?php endif; ?>
			</tbody>
		</table>
	<?php echo form_close(); ?>
</div>