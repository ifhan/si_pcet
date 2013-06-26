<div class="admin-box">
	<h3><?php echo lang('aide_title') ?></h3>
	<?php echo form_open($this->uri->uri_string()); ?>
		<table class="table table-striped">
			<thead>
				<tr>
					<?php if ($this->auth->has_permission('Aide.Content.Delete') && isset($records) && is_array($records) && count($records)) : ?>
					<th class="column-check"><input class="check-all" type="checkbox" /></th>
					<?php endif;?>
					
					<th>Titre</th>
					<th>Texte</th>
					<th>Créée le</th>
					<th>Modifiée le</th>
					<th>Archivée</th>
					<th>Catégorie</th>
				</tr>
			</thead>
			<?php if (isset($records) && is_array($records) && count($records)) : ?>
			<tfoot>
				<?php if ($this->auth->has_permission('Aide.Content.Delete')) : ?>
				<tr>
					<td colspan="11">
						<input type="submit" name="delete" id="delete-me" class="btn btn-danger" value="<?php echo lang('bf_action_delete') ?>" onclick="return confirm('<?php e(js_escape(lang('aide_delete_confirm'))); ?>')">
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
					<?php if ($this->auth->has_permission('Aide.Content.Delete')) : ?>
					<td><input type="checkbox" name="checked[]" value="<?php echo $record->id ?>" /></td>
					<?php endif;?>
					
                                    <?php if ($this->auth->has_permission('Aide.Content.Edit')) : ?>
                                    <td><?php echo anchor(SITE_AREA .'/content/aide/edit/'. $record->id, '<i class="icon-pencil">&nbsp;</i>' .  $record->title) ?></td>
                                    <?php else: ?>
                                    <td><?php e($record->title) ?></td>
                                    <?php endif; ?>

                                    <td><?php e($record->body) ?></td>
                                    <td><?php e($record->created_on) ?></td>
                                    <td><?php e($record->modified_on) ?></td>
                                    <td><?php echo $record->deleted > 0 ? lang('aide_true') : lang('aide_false')?></td>
                                    <td><?php e($record->category_id) ?></td>			
				</tr>
			<?php endforeach; ?>
			<?php else: ?>
				<tr>
					<td colspan="11">No records found that match your selection.</td>
				</tr>
			<?php endif; ?>
			</tbody>
		</table>
	<?php echo form_close(); ?>
</div>