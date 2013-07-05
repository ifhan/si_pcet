<div class="admin-box">
	<h3><?php echo lang('autres_title') ?></h3>
	<?php echo form_open($this->uri->uri_string()); ?>
		<table class="table table-striped">
			<thead>
				<tr>
					<?php if ($this->auth->has_permission('Autres.Content.Delete') && isset($records) && is_array($records) && count($records)) : ?>
					<th class="column-check"><input class="check-all" type="checkbox" /></th>
					<?php endif;?>
					
					<th>Identifiant</th>
					<th>Nom</th>
					<th>Commentaire</th>
                                        <th>Actions</th>
			</thead>
			<?php if (isset($records) && is_array($records) && count($records)) : ?>
			<tfoot>
				<?php if ($this->auth->has_permission('Autres.Content.Delete')) : ?>
				<tr>
					<td colspan="5">
						<input type="submit" name="delete" id="delete-me" class="btn btn-danger" value="<?php echo lang('bf_action_delete') ?>" onclick="return confirm('<?php e(js_escape(lang('autres_delete_confirm'))); ?>')">
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
					<?php if ($this->auth->has_permission('Autres.Content.Delete')) : ?>
					<td><input type="checkbox" name="checked[]" value="<?php echo $record->id ?>" /></td>
					<?php endif;?>
					
				
                                
                                    <td><?php e($record->ID_STR) ?></td>
                                    <td><?php e($record->NOM) ?></td>
                                    <td><?php e($record->COMMENT) ?></td>
                                    <td>
                                        <?php if ($this->auth->has_permission('Autres.Content.Edit')) : ?>
                                            <?php echo anchor(SITE_AREA .'/content/autres/edit/'. $record->id, '<i class="icon-pencil">&nbsp;</i>Modifier') ?>			
                                        <?php endif; ?>
                                    </td>
				</tr>
			<?php endforeach; ?>
			<?php else: ?>
				<tr>
					<td colspan="5"><?php echo lang('bf_no_record_found'); ?></td>
				</tr>
			<?php endif; ?>
			</tbody>
		</table>
	<?php echo form_close(); ?>
</div>